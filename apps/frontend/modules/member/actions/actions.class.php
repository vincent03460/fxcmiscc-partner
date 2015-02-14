<?php

/**
 * member actions.
 *
 * @package    sf_sandbox
 * @subpackage member
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class memberActions extends sfActions
{
    public function executeCreditedToMt4()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "MT2_Amount.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once('MT4WebRequest.php');
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);

        //for ($x = 2; $x < $totalRow; $x++) {
            //print_r("total:".$totalRow."::x:".$x.":".$data->val($x, "A")."<br>");

            $login = 2088510975;
            $mt4 = new MT4WebRequest();
            $data = $mt4->ChangeBalance($login, 6, 1);
            //$data = $mt4->AccountBalance($login);

            var_dump($data);

            if ($data["status"] == "success") {
                var_dump($data["message"]["balance"]);
            } else {
                print_r("invalid");
            }
        //}
        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeSetTreeStructure()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmDistributorPeer::TREE_LEVEL);
        $mlm_distributors = MlmDistributorPeer::doSelect($c);

        $idx = 0;
        foreach ($mlm_distributors as $mlm_distributor) {
            $idx++;
            if ($idx == 1) {
                continue;
            }
            print_r("<br>".$mlm_distributor->getDistributorCode());
            $uplineDistDB = MlmDistributorPeer::retrieveByPK($mlm_distributor->getUplineDistId());

            $mlm_distributor->setTreeLevel($uplineDistDB->getTreeLevel() + 1);
            $mlm_distributor->setTreeStructure($uplineDistDB->getTreeStructure()."|". $mlm_distributor->getDistributorId() ."|");

            print_r("<br>".$mlm_distributor->getTreeLevel(). "::".$mlm_distributor->getTreeStructure()."<br><br>");

            $mlm_distributor->save();
        }

        return sfView::HEADER_ONLY;
    }
    public function executeMigrateMt4()
    {
        $c = new Criteria();
        $c->add(MlmDailyDistMt4CreditPeer::STATUS_CODE, "COMPLETE");
        $mlmDailyDistMt4CreditDBs = MlmDailyDistMt4CreditPeer::doSelect($c);

        foreach ($mlmDailyDistMt4CreditDBs as $mlmDailyDistMt4CreditDB) {
            //var_dump($mlmDailyDistMt4CreditDB);
            $mt4Id = $mlmDailyDistMt4CreditDB->getMt4UserName();
            $remark = $mlmDailyDistMt4CreditDB->getRemark();

            $arrs = explode('@@@', $remark);

            $fullName = strtoupper($arrs[0]);
            $mt4Password = $arrs[1];

            $memberId = str_replace(" ","",$fullName);
            $memberId = strtoupper($memberId);
            var_dump($fullName);
            var_dump($memberId);
            var_dump("<br>");
            //continue;
            $app_user = new AppUser();
            $app_user->setUsername($memberId);
            $app_user->setKeepPassword($mt4Password);
            $app_user->setUserpassword($mt4Password);
            $app_user->setKeepPassword2($mt4Password);
            $app_user->setUserpassword2($mt4Password);
            $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
            $app_user->setStatusCode(Globals::STATUS_ACTIVE);
            $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->save();

            $mlm_distributor = new MlmDistributor();
            $mlm_distributor->setDistributorCode($memberId);
            $mlm_distributor->setUserId($app_user->getUserId());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);

            $fullName = trim($this->getRequestParameter('fullname'));
            $fullName = strtoupper($fullName);

            $mlm_distributor->setFullName($fullName);
            $mlm_distributor->setNickname($memberId);
            $mlm_distributor->setIc($this->getRequestParameter('nric'));
            if ($this->getRequestParameter('country') == 'China') {
                $mlm_distributor->setCountry('China (PRC)');
            } else {
                $mlm_distributor->setCountry($this->getRequestParameter('country'));
            }
            $mlm_distributor->setAddress($this->getRequestParameter('address'));
            $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
            $mlm_distributor->setCity($this->getRequestParameter('city'));
            $mlm_distributor->setState($this->getRequestParameter('state'));
            $mlm_distributor->setPostcode($this->getRequestParameter('zip'));
            $mlm_distributor->setEmail($this->getRequestParameter('email'));
            $mlm_distributor->setAlternateEmail($this->getRequestParameter('alt_email'));
            $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
            $mlm_distributor->setGender($this->getRequestParameter('gender'));
            if ($this->getRequestParameter('dob')) {
                list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
                $mlm_distributor->setDob("$y-$m-$d");
            }
            $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
            $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccountNo'));
            $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));

            //$mlm_distributor->setTreeLevel($treeLevel);
            //$mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
            //$mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

            $mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
            $mlm_distributor->setSpread($this->getRequestParameter('spread'));
            $mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
            $mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
            $mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
            $mlm_distributor->setSignDate(date("Y/m/d h:i:s A"));
            $mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));

            //$mlm_distributor->setRankId($packageDB->getPackageId());
            //$mlm_distributor->setRankCode($packageDB->getPackageName());
            //$mlm_distributor->setMt4RankId($packageDB->getPackageId());
            //$mlm_distributor->setInitRankId($packageDB->getPackageId());
            //$mlm_distributor->setInitRankCode($packageDB->getPackageName());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_distributor->setPackagePurchaseFlag("N");
            $mlm_distributor->setActiveDatetime(date("Y/m/d h:i:s A"));
            $mlm_distributor->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->save();

            //$treeStructure = $uplineDistDB->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            //$mlm_distributor->setTreeStructure($treeStructure);
            //$mlm_distributor->setRegisterRemark($this->getRequestParameter('registerRemark'));
            $mlm_distributor->save();

            $mlmDistMt4 = new MlmDistMt4();
            $mlmDistMt4->setDistId($mlm_distributor->getDistributorId());
            $mlmDistMt4->setMt4UserName($mt4Id);
            $mlmDistMt4->setMt4Password($mt4Password);
            $mlmDistMt4->setRankId(0);
            $mlmDistMt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistMt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistMt4->save();
            //print_r($mt4Id.":".$fullName.":".$mt4Password."=".$remark);
            //print_r("<br>");
        }

        return sfView::HEADER_ONLY;
    }
    public function executeMigrateMemberData()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR ."MemberList.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);
        for ($x = 1; $x <= $totalRow; $x++) {
            $memberId = $data->val($x, "A");
            $fullName = $data->val($x, "B");
            $email = $data->val($x, "C");
            $uplineMemberId = $data->val($x, "D");
            $packageName = strtoupper($data->val($x, "E"));

            print_r("<br>");
            print_r($memberId . " : " .$fullName . " : " .$email . " : " .$uplineMemberId . " : " .$packageName);
            $packageId = 0;

            if ($packageName == "PLATINUM") {
                $packageId = 3000;
            } else if ($packageName == "GOLD") {
                $packageId = 1000;
            }  else if ($packageName == "SILVER") {
                $packageId = 500;
            } else if ($packageName == "VIP") {
                $packageId = 5000;
            } else if ($packageName == "PREMIER") {
                $packageId = 10000;
            }

            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $memberId);
            $app_user = AppUserPeer::doSelectOne($c);

            if (!$app_user) {
                var_dump("<br><br><br>****".$memberId);

                $mt4Password = "SUSPENDED";

                $app_user = new AppUser();
                $app_user->setUsername($memberId);
                $app_user->setKeepPassword($mt4Password);
                $app_user->setUserpassword($mt4Password);
                $app_user->setKeepPassword2($mt4Password);
                $app_user->setUserpassword2($mt4Password);
                $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
                $app_user->setStatusCode("SUSPEND");
                $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $app_user->save();

                $mlm_distributor = new MlmDistributor();
                $mlm_distributor->setDistributorCode($memberId);
                $mlm_distributor->setUserId($app_user->getUserId());
                $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);

                $fullName = trim($this->getRequestParameter('fullname'));
                $fullName = strtoupper($fullName);

                $mlm_distributor->setFullName($fullName);
                $mlm_distributor->setNickname($memberId);
                $mlm_distributor->setIc($this->getRequestParameter('nric'));
                if ($this->getRequestParameter('country') == 'China') {
                    $mlm_distributor->setCountry('China (PRC)');
                } else {
                    $mlm_distributor->setCountry($this->getRequestParameter('country'));
                }
                $mlm_distributor->setAddress($this->getRequestParameter('address'));
                $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
                $mlm_distributor->setCity($this->getRequestParameter('city'));
                $mlm_distributor->setState($this->getRequestParameter('state'));
                $mlm_distributor->setPostcode($this->getRequestParameter('zip'));
                $mlm_distributor->setEmail($email);
                $mlm_distributor->setAlternateEmail($this->getRequestParameter('alt_email'));
                $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
                $mlm_distributor->setGender($this->getRequestParameter('gender'));
                if ($this->getRequestParameter('dob')) {
                    list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
                    $mlm_distributor->setDob("$y-$m-$d");
                }
                $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
                $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccountNo'));
                $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));

                //$mlm_distributor->setTreeLevel($treeLevel);
                //$mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
                //$mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

                $mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
                $mlm_distributor->setSpread($this->getRequestParameter('spread'));
                $mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
                $mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
                $mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
                $mlm_distributor->setSignDate(date("Y/m/d h:i:s A"));
                $mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));

                //$mlm_distributor->setRankId($packageDB->getPackageId());
                //$mlm_distributor->setRankCode($packageDB->getPackageName());
                //$mlm_distributor->setMt4RankId($packageDB->getPackageId());
                //$mlm_distributor->setInitRankId($packageDB->getPackageId());
                //$mlm_distributor->setInitRankCode($packageDB->getPackageName());
                $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_distributor->setPackagePurchaseFlag("N");
                $mlm_distributor->setActiveDatetime(date("Y/m/d h:i:s A"));
                $mlm_distributor->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_distributor->save();

                //$treeStructure = $uplineDistDB->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
                //$mlm_distributor->setTreeStructure($treeStructure);
                //$mlm_distributor->setRegisterRemark($this->getRequestParameter('registerRemark'));
                $mlm_distributor->save();
            }
            //continue;
            $app_user->setStatusCode(Globals::STATUS_ACTIVE);
            $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->save();

            $c = new Criteria();
            $c->add(MlmDistributorPeer::USER_ID, $app_user->getUserId());
            $mlm_distributor = MlmDistributorPeer::doSelectOne($c);

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $uplineMemberId);
            $uplineDistDB = MlmDistributorPeer::doSelectOne($c);

            if (!$uplineDistDB) {
                $mt4Password = "SUSPEND";
                $memberId = $uplineMemberId;

                $app_user = new AppUser();
                $app_user->setUsername($memberId);
                $app_user->setKeepPassword($mt4Password);
                $app_user->setUserpassword($mt4Password);
                $app_user->setKeepPassword2($mt4Password);
                $app_user->setUserpassword2($mt4Password);
                $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
                $app_user->setStatusCode("SUSPEND");
                $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $app_user->save();

                $mlm_distributorUpline = new MlmDistributor();
                $mlm_distributorUpline->setDistributorCode($memberId);
                $mlm_distributorUpline->setUserId($app_user->getUserId());
                $mlm_distributorUpline->setStatusCode(Globals::STATUS_ACTIVE);

                $fullName = $memberId;

                $mlm_distributorUpline->setFullName($fullName);
                $mlm_distributorUpline->setNickname($memberId);
                if ($this->getRequestParameter('dob')) {
                    list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
                    $mlm_distributorUpline->setDob("$y-$m-$d");
                }

                $mlm_distributorUpline->setTreeLevel(3);
                $mlm_distributorUpline->setUplineDistId(2);
                $mlm_distributorUpline->setUplineDistCode("TENGCHEEKENT");

                $mlm_distributorUpline->setSignDate(date("Y/m/d h:i:s A"));

                $mlm_distributorUpline->setRankId(500);
                $mlm_distributorUpline->setRankCode("SILVER");
                $mlm_distributorUpline->setMt4RankId(500);
                $mlm_distributorUpline->setInitRankId(500);
                $mlm_distributorUpline->setInitRankCode("SILVER");
                $mlm_distributorUpline->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_distributorUpline->setPackagePurchaseFlag("N");
                $mlm_distributorUpline->setActiveDatetime(date("Y/m/d h:i:s A"));
                $mlm_distributorUpline->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $mlm_distributorUpline->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_distributorUpline->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_distributorUpline->save();

                $treeStructure = "|1||2|" . $mlm_distributorUpline->getDistributorId() . "|";
                $mlm_distributorUpline->setTreeStructure($treeStructure);
                $mlm_distributorUpline->save();

                $uplineDistDB = $mlm_distributorUpline;
            }

            if ($uplineDistDB->getTreeLevel() == null) {
                $uplineDistDB->setTreeLevel(3);
                $uplineDistDB->setUplineDistId(2);
                $uplineDistDB->setUplineDistCode("TENGCHEEKENT");
                $uplineDistDB->setRankId(500);
                $uplineDistDB->setRankCode("SILVER");
                $uplineDistDB->setMt4RankId(500);
                $uplineDistDB->setInitRankId(500);
                $uplineDistDB->setInitRankCode("SILVER");
                $uplineDistDB->setStatusCode(Globals::STATUS_ACTIVE);

                $treeStructure = "|1||2|" . $uplineDistDB->getDistributorId() . "|";
                $uplineDistDB->setTreeStructure($treeStructure);
                $uplineDistDB->save();
            }
            $treeLevel = $uplineDistDB->getTreeLevel() + 1;

            $mlm_distributor->setFullName($fullName);
            $mlm_distributor->setEmail($email);

            $mlm_distributor->setTreeLevel($treeLevel);
            $mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
            $mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

            $mlm_distributor->setRankId($packageId);
            $mlm_distributor->setRankCode($packageName);
            $mlm_distributor->setMt4RankId($packageId);
            $mlm_distributor->setInitRankId($packageId);
            $mlm_distributor->setInitRankCode($packageName);
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->save();

            $treeStructure = $uplineDistDB->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            $mlm_distributor->setTreeStructure($treeStructure);
            $mlm_distributor->save();
        }

        return sfView::HEADER_ONLY;
    }

    public function executeIndex()
    {
        return $this->redirect('/member/summary');
    }

    public function executeWithdrawal()
    {
    }

    public function executeDownload()
    {
    }

    public function executeAgreement()
    {
    }

    // TODO

    public function executeDoRoiPassiveSharing()
    {
        return sfView::HEADER_ONLY;

        $drbDateFrom = "2014-11-01 00:00:00";
        $drbDateTo = "2014-11-30 23:59:59";
        $accountTypeArr = array(6,7,21,22,33);

        $c = new Criteria();
        $c->add(MlmDistributorPeer::RANK_ID, $accountTypeArr , Criteria::IN);
        $c->add(MlmDistributorPeer::LOAN_ACCOUNT, "N");
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 1, Criteria::NOT_EQUAL);
        $distDBs = MlmDistributorPeer::doSelect($c);

        foreach ($distDBs as $distDB) {
            $bonusPercentage1 = 0.01;
            $totalGeneration1 = 0;
            $bonusPercentage2 = 0.01;
            $totalGeneration2 = 0;
            $bonusPercentage3 = 0.01;
            $totalGeneration3 = 0;
            $bonusPercentage4 = 0.01;
            $totalGeneration4 = 0;

            if ($distDB->getRankId() == 6) {
                $bonusPercentage1 = 0.01;
                $totalGeneration1 = 1;
                $bonusPercentage2 = 0;
                $totalGeneration2 = 0;
                $bonusPercentage3 = 0;
                $totalGeneration3 = 0;
                $bonusPercentage4 = 0;
                $totalGeneration4 = 0;
            } else if ($distDB->getRankId() == 7) {
                $bonusPercentage1 = 0.01;
                $totalGeneration1 = 1;
                $bonusPercentage2 = 0.005;
                $totalGeneration2 = 1;
                $bonusPercentage3 = 0.00;
                $totalGeneration3 = 0;
                $bonusPercentage4 = 0;
                $totalGeneration4 = 0;
            } else if ($distDB->getRankId() == 21) {
                $bonusPercentage1 = 0.01;
                $totalGeneration1 = 2;
                $bonusPercentage2 = 0.005;
                $totalGeneration2 = 2;
                $bonusPercentage3 = 0.00;
                $totalGeneration3 = 0;
                $bonusPercentage4 = 0;
                $totalGeneration4 = 0;
            } else if ($distDB->getRankId() == 22) {
                $bonusPercentage1 = 0.02;
                $totalGeneration1 = 1;
                $bonusPercentage2 = 0.01;
                $totalGeneration2 = 2;
                $bonusPercentage3 = 0.005;
                $totalGeneration3 = 2;
                $bonusPercentage4 = 0.0025;
                $totalGeneration4 = 1;
            } else if ($distDB->getRankId() == 33) {
                $bonusPercentage1 = 0.02;
                $totalGeneration1 = 2;
                $bonusPercentage2 = 0.01;
                $totalGeneration2 = 2;
                $bonusPercentage3 = 0.005;
                $totalGeneration3 = 2;
                $bonusPercentage4 = 0.0025;
                $totalGeneration4 = 2;
            }

            $totalGeneration = $totalGeneration1 + $totalGeneration2 + $totalGeneration3 + $totalGeneration4;
            if ($totalGeneration > 0) {
                var_dump($distDB->getTreeLevel());
                var_dump($distDB->getTreeLevel() + $totalGeneration);
                $c = new Criteria();
                $c->addAnd(MlmDistributorPeer::TREE_LEVEL, $distDB->getTreeLevel(), Criteria::GREATER_THAN);
                $c->addAnd(MlmDistributorPeer::TREE_LEVEL, ($distDB->getTreeLevel() + $totalGeneration), Criteria::LESS_EQUAL);
                $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|".$distDB->getDistributorId()."|%", Criteria::LIKE);
                $distDownlineDBs = MlmDistributorPeer::doSelect($c);
                print_r("<br><br><br>+===========================================+<br>");
                print_r("<br>".$distDB->getDistributorId().":rank=".$distDB->getRankId().":distcode=".$distDB->getDistributorCode());
                print_r("<br>".$totalGeneration);
                foreach ($distDownlineDBs as $distDownlineDB) {
                    print_r("<br>==>".$distDownlineDB->getDistributorId().":distcode=".$distDownlineDB->getDistributorCode());
                    //continue;
                    $gap = $distDownlineDB->getTreeLevel() - $distDB->getTreeLevel();

                    $bonusPercentage = 0;
                    if ($gap <= $totalGeneration1) {
                        $bonusPercentage = $bonusPercentage1;
                    } else if ($gap > $totalGeneration1 && $gap <= ($totalGeneration1 + $totalGeneration2)) {
                        $bonusPercentage = $bonusPercentage2;
                    } else if ($gap > $totalGeneration2 && $gap <= ($totalGeneration1 + $totalGeneration2 + $totalGeneration3)) {
                        $bonusPercentage = $bonusPercentage3;
                    } else if ($gap > $totalGeneration3 && $gap <= ($totalGeneration1 + $totalGeneration2 + $totalGeneration3 + $totalGeneration4)) {
                        $bonusPercentage = $bonusPercentage4;
                    }

                    $totalRoiAndPassiveIncome = $this->getTotalRoiAndPassiveIncome($distDownlineDB->getDistributorId(), $drbDateFrom, $drbDateTo);
                    $totalRoiAndPassiveIncomeMatching = $totalRoiAndPassiveIncome * $bonusPercentage;
                    print_r("<br>TotalDRB==>".$totalRoiAndPassiveIncome);
                    print_r("<br>Gap==>".$gap);
                    print_r("<br>BonusPercentage==>".$bonusPercentage);
                    if ($totalRoiAndPassiveIncomeMatching > 0) {
                        $accountBalance = $this->getAccountBalance($distDB->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distDB->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_PROFIT_SHARING);
                        $mlm_account_ledger->setRemark("#".$distDownlineDB->getDistributorCode());
                        $mlm_account_ledger->setCredit($totalRoiAndPassiveIncomeMatching);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($accountBalance + $totalRoiAndPassiveIncomeMatching);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        $fundManagementBalance = $this->getCommissionBalance($distDB->getDistributorId(), Globals::ACCOUNT_LEDGER_ACTION_PROFIT_SHARING);

                        $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                        $sponsorDistCommissionledger->setMonthTraded(date('m'));
                        $sponsorDistCommissionledger->setYearTraded(date('Y'));
                        $sponsorDistCommissionledger->setDistId($distDB->getDistributorId());
                        $sponsorDistCommissionledger->setCommissionType(Globals::ACCOUNT_LEDGER_ACTION_PROFIT_SHARING);
                        $sponsorDistCommissionledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                        $sponsorDistCommissionledger->setCredit($totalRoiAndPassiveIncomeMatching);
                        $sponsorDistCommissionledger->setDebit(0);
                        $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                        $sponsorDistCommissionledger->setBalance($fundManagementBalance + $totalRoiAndPassiveIncomeMatching);
                        $sponsorDistCommissionledger->setRemark("TIER:".$gap.", "."TOTAL:".$totalRoiAndPassiveIncome." #".($bonusPercentage * 100)."% (".$distDownlineDB->getDistributorCode().")");
                        $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->save();
                    }
                }
            }
            //break;
        }

        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
    public function executeDoGenerationBonus()
    {

        return sfView::HEADER_ONLY;

        $drbDateFrom = "2014-11-01 00:00:00";
        $drbDateTo = "2014-11-30 23:59:59";
        $groupBonusDateFrom = "2014-12-01 00:00:00";
        $groupBonusDateTo = "2014-12-30 23:59:59";
        $accountTypeArr = array(21,22,33);

        $c = new Criteria();
        $c->add(MlmDistributorPeer::RANK_ID, $accountTypeArr , Criteria::IN);
        $c->add(MlmDistributorPeer::LOAN_ACCOUNT, "N");
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 1, Criteria::NOT_EQUAL);
        $distDBs = MlmDistributorPeer::doSelect($c);

        foreach ($distDBs as $distDB) {
            $bonusPercentage = 0.01;
            $totalGeneration = 0;

            if ($distDB->getRankId() == 21) {
                $totalGeneration = 4;
            } else if ($distDB->getRankId() == 22) {
                $totalGeneration = 6;
            } else if ($distDB->getRankId() == 33) {
                $totalGeneration = 8;
            }

            if ($totalGeneration > 0) {
                var_dump($distDB->getTreeLevel());
                var_dump($distDB->getTreeLevel() + $totalGeneration);
                $c = new Criteria();
                $c->addAnd(MlmDistributorPeer::TREE_LEVEL, $distDB->getTreeLevel(), Criteria::GREATER_THAN);
                $c->addAnd(MlmDistributorPeer::TREE_LEVEL, ($distDB->getTreeLevel() + $totalGeneration), Criteria::LESS_EQUAL);
                $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|".$distDB->getDistributorId()."|%", Criteria::LIKE);
                $distDownlineDBs = MlmDistributorPeer::doSelect($c);
                print_r("<br><br><br>+===========================================+<br>");
                print_r("<br>".$distDB->getDistributorId().":rank=".$distDB->getRankId().":distcode=".$distDB->getDistributorCode());
                print_r("<br>".$totalGeneration);
                foreach ($distDownlineDBs as $distDownlineDB) {
                    print_r("<br>==>".$distDownlineDB->getDistributorId().":distcode=".$distDownlineDB->getDistributorCode());
                    //continue;
                    $totalDrb = $this->getTotalDRB($distDownlineDB->getDistributorId(), $drbDateFrom, $drbDateTo);
                    $totalGroupBonus = $this->getTotalGroupBonus($distDownlineDB->getDistributorId(), $groupBonusDateFrom, $groupBonusDateTo);

                    $totalDrbMatching = $totalDrb * $bonusPercentage;
                    $totalGroupBonusMatching = $totalGroupBonus * $bonusPercentage;
                    print_r("<br>TotalDRB==>".$totalDrb);
                    print_r("<br>TotalGroupBonus==>".$totalGroupBonus);
                    if ($totalDrbMatching > 0) {
                        $accountBalance = $this->getAccountBalance($distDB->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distDB->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_GENERATION_BONUS);
                        $mlm_account_ledger->setRemark("TOTAL DRB:".$totalDrb." #1% (".$distDownlineDB->getDistributorCode().")");
                        $mlm_account_ledger->setCredit($totalDrbMatching);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($accountBalance + $totalDrbMatching);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        $fundManagementBalance = $this->getCommissionBalance($distDB->getDistributorId(), Globals::COMMISSION_TYPE_GENERATION_BONUS);

                        $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                        $sponsorDistCommissionledger->setMonthTraded(date('m'));
                        $sponsorDistCommissionledger->setYearTraded(date('Y'));
                        $sponsorDistCommissionledger->setDistId($distDB->getDistributorId());
                        $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_GENERATION_BONUS);
                        $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_TYPE_DRB);
                        $sponsorDistCommissionledger->setCredit($totalDrbMatching);
                        $sponsorDistCommissionledger->setDebit(0);
                        $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                        $sponsorDistCommissionledger->setBalance($fundManagementBalance + $totalDrbMatching);
                        $sponsorDistCommissionledger->setRemark("TOTAL DRB:".$totalDrb." #1% (".$distDownlineDB->getDistributorCode().")");
                        $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->save();
                    }
                    if ($totalGroupBonusMatching > 0) {
                        $accountBalance = $this->getAccountBalance($distDB->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distDB->getDistributorId());
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_GENERATION_BONUS);
                        $mlm_account_ledger->setRemark("GROUP BONUS:".$totalGroupBonus." #1% (".$distDownlineDB->getDistributorCode().")");
                        $mlm_account_ledger->setCredit($totalGroupBonusMatching);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($accountBalance + $totalGroupBonusMatching);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        $fundManagementBalance = $this->getCommissionBalance($distDB->getDistributorId(), Globals::COMMISSION_TYPE_GENERATION_BONUS);

                        $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                        $sponsorDistCommissionledger->setMonthTraded(date('m'));
                        $sponsorDistCommissionledger->setYearTraded(date('Y'));
                        $sponsorDistCommissionledger->setDistId($distDB->getDistributorId());
                        $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_GENERATION_BONUS);
                        $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_TYPE_GROUP_BONUS);
                        $sponsorDistCommissionledger->setCredit($totalGroupBonusMatching);
                        $sponsorDistCommissionledger->setDebit(0);
                        $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                        $sponsorDistCommissionledger->setBalance($fundManagementBalance + $totalGroupBonusMatching);
                        $sponsorDistCommissionledger->setRemark("GROUP BONUS:".$totalGroupBonus." #1% (".$distDownlineDB->getDistributorCode().")");
                        $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->save();
                    }
                }
            }
            //break;
        }

        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
    public function executeUpdateRoiDate()
    {
        $c = new Criteria();
        $c->add(MlmDistMt4Peer::MT4_ID, $this->getRequestParameter('q'), Criteria::GREATER_EQUAL);
        $c->addAscendingOrderByColumn(MlmDistMt4Peer::MT4_ID);
        $mlmDistMt4DBs = MlmDistMt4Peer::doSelect($c);

        foreach($mlmDistMt4DBs as $mlmDistMt4DB) {
            $mt4Username = $mlmDistMt4DB->getMt4UserName();
            print_r("<br>".$mlmDistMt4DB->getMt4Id().":".$mt4Username);
            // new implement ********************************************************************
            $c = new Criteria();
            $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mt4Username);
            $c->addAscendingOrderByColumn(MlmRoiDividendPeer::IDX);
            $mlmRoiDividends = MlmRoiDividendPeer::doSelect($c);

            $firstDividendTime = null;
            foreach($mlmRoiDividends as $mlm_roi_dividend){
                $idx = $mlm_roi_dividend->getIdx();

                if ($firstDividendTime == null) {
                    $firstDividendTime = strtotime($mlm_roi_dividend->getDividendDate());
                }

                $monthAdded = $idx - 1;
                $dividendDate = strtotime("+".$monthAdded." months", $firstDividendTime);

                $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                $mlm_roi_dividend->setFirstDividendDate($firstDividendTime);
                $mlm_roi_dividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_roi_dividend->save();

                $idx = $idx + 1;
            }

            $c = new Criteria();
            $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mt4Username);
            $totalRecords = MlmRoiDividendPeer::doCount($c);

            if ($totalRecords < Globals::DIVIDEND_TIMES_ENTITLEMENT) {
                $c = new Criteria();
                $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mt4Username);
                $c->addDescendingOrderByColumn(MlmRoiDividendPeer::IDX);
                $mlmRoiDividendDB = MlmRoiDividendPeer::doSelectOne($c);

                if ($mlmRoiDividendDB) {
                    $idx = $mlmRoiDividendDB->getIdx() + 1;
                    for ($i = $idx; $i <= Globals::DIVIDEND_TIMES_ENTITLEMENT; $i++) {
                        $firstDividendTime = strtotime($mlmRoiDividendDB->getFirstDividendDate());

                        $monthAdded = $idx - 1;
                        $dividendDate = strtotime("+".$monthAdded." months", $firstDividendTime);

                        $mlm_roi_dividend = new MlmRoiDividend();
                        $mlm_roi_dividend->setDistId($mlmRoiDividendDB->getDistId());
                        $mlm_roi_dividend->setMt4UserName($mlmRoiDividendDB->getMt4UserName());
                        $mlm_roi_dividend->setIdx($idx);
                        //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                        $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setFirstDividendDate($mlmRoiDividendDB->getFirstDividendDate());
                        $mlm_roi_dividend->setPackageId($mlmRoiDividendDB->getPackageId());
                        $mlm_roi_dividend->setPackagePrice($mlmRoiDividendDB->getPackagePrice());
                        $mlm_roi_dividend->setRoiPercentage($mlmRoiDividendDB->getRoiPercentage());
                        //$mlm_roi_dividend->setDevidendAmount($this->getRequestParameter('devidend_amount'));
                        //$mlm_roi_dividend->setRemarks($this->getRequestParameter('remarks'));
                        $mlm_roi_dividend->setStatusCode($mlmRoiDividendDB->getStatusCode());
                        $mlm_roi_dividend->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_roi_dividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_roi_dividend->save();

                        $idx = $idx + 1;
                    }
                }
            }
        }

        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
    public function executeTest()
    {
        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::TRANSACTION_TYPE, "REGISTER");
        $c->add(MlmAccountLedgerPeer::DEBIT, 0, Criteria::GREATER_THAN);
        $c->addAscendingOrderByColumn(MlmAccountLedgerPeer::TRANSACTION_TYPE, "REGISTER");
        $mlmAccountLedgers = MlmAccountLedgerPeer::doSelect($c);

        foreach ($mlmAccountLedgers as $mlmAccountLedger) {
            $remark = $mlmAccountLedger->getRemark();

            $arrs = explode(' ', $remark);
            $distCode = trim($arrs[count($arrs) - 1]);

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distCode);
            $existDist = MlmDistributorPeer::doSelectOne($c);

            print_r("Dist Code:".$distCode);
            if (!$existDist) {
                print_r("+++ Dist Code:".$distCode);
            } else {
                $mlmAccountLedger->setRefId($existDist->getDistributorId());
                $mlmAccountLedger->setRefType("DISTRIBUTOR");
                $mlmAccountLedger->save();
            }
        }

        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
    public function executeTestPackage()
    {
        $sponsorUplineDistId = 211;
        if ($sponsorUplineDistId != "") {
            $uplineDistDB = MlmDistributorPeer::retrieveByPK($sponsorUplineDistId);

            $level = 0;
            while ($level < 100) {
                if (!$uplineDistDB)
                    break;

                $distId = $uplineDistDB->getDistributorId();
                $packageId = $uplineDistDB->getRankId();
                $uplinePackageDB = MlmPackagePeer::retrieveByPK($packageId);
                $upgraded = false;
                if ($uplinePackageDB) {
                    //var_dump($distId);
//                        var_dump($packageId);
//                        exit();
                    if ($packageId == 1) {
                        $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);

                        if ($upgraded == false) {
                            $upgraded = $this->doCheckingSilver($uplineDistDB, $uplinePackageDB);
                            if ($upgraded == false) {
                                $upgraded = $this->doCheckingCopper($uplineDistDB, $uplinePackageDB);
                            }
                        }
                    } else if ($packageId == 2) {
                        $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);
                        if ($upgraded == false) {
                            $upgraded = $this->doCheckingSilver($uplineDistDB, $uplinePackageDB);
                        }
                    } else if ($packageId == 3) {
                        $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);
                    /*} else if ($packageId == 4 || $packageId == 5 || $packageId == 6 || $packageId == 7) {
                        $upgraded = $this->doCheckingDiamond($uplineDistDB, $uplinePackageDB);*/
                    } else if ($packageId == 4 || $packageId == 5) {
                        $upgraded = $this->doCheckingDiamond($uplineDistDB, $uplinePackageDB);
                    } else if ($packageId == 6) {
                        $upgraded = $this->doCheckingDiamondByPearl($uplineDistDB, $uplinePackageDB);
                    } else if ($packageId == 7) {
                        $upgraded = $this->doCheckingVipByGem($uplineDistDB, $uplinePackageDB);
                        if ($upgraded == false) {
                            $upgraded = $this->doCheckingDiamondByPearl($uplineDistDB, $uplinePackageDB);
                        }
                    } else if ($packageId == 21) {
                        $upgraded = $this->doCheckingVip($uplineDistDB, $uplinePackageDB);

                    } else if ($packageId == 22) {
                        $upgraded = $this->doCheckingDegold($uplineDistDB, $uplinePackageDB);
                    }
                }

                /*if ($upgraded == false) {
                    break;
                }*/

                $uplineDistId = $uplineDistDB->getUplineDistId();
                //print_r("uplineDistId:".$uplineDistId);
                //print_r("<br>");
                if ($uplineDistId == null || $uplineDistId == "")
                    break;
                //var_dump($uplineDistId);
                $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);
                //var_dump($uplineDistDB);
                $level += 1;
            }
        }
        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
    public function executeCheckStandardPromote()
    {
        print_r("Start<br>");

        $array = explode(',', "5,6,7,8,9,10,14");

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 254);
        $c->add(MlmDistributorPeer::RANK_ID, $array, Criteria::IN);
        $c->add(MlmDistributorPeer::LOAN_ACCOUNT, "N");
        $existDists = MlmDistributorPeer::doSelect($c);

        foreach ($existDists as $uplineDistDB) {
            $packageId = $uplineDistDB->getRankId();
            $uplinePackageDB = MlmPackagePeer::retrieveByPK($packageId);

            $totalStandardAccount = $this->getTotalPackage($uplineDistDB->getDistributorId(), "5");
            print_r($totalStandardAccount);

            if ($totalStandardAccount >= 5) {
                $dateUtil = new DateUtil();
                $currentDate = $dateUtil->formatDate("Y-m-d", date("Y-m-d")) . " 00:00:00";
                $currentDateFrom_timestamp = strtotime($currentDate);

                $currentDate = $dateUtil->formatDate("Y-m-d", date("Y-m-d")) . " 23:59:59";
                $currentDateTo_timestamp = strtotime($currentDate);

                for ($i = 0; $i < 3; $i++) {
                    $challengeDateFrom = strtotime("+".$i." months", $currentDateFrom_timestamp);
                    $challengeDateTo = strtotime("+".($i + 1)." months", $currentDateTo_timestamp);
                    $challengeDateTo = strtotime("-1 days", $challengeDateTo);

                    $mlmPackageChallenge = new MlmPackageChallenge();
                    $mlmPackageChallenge->setDistId($uplineDistDB->getDistributorId());
                    $mlmPackageChallenge->setChallengeType(Globals::PACKAGE_PROFESSIONAL);
                    $mlmPackageChallenge->setDateFrom($challengeDateFrom);
                    $mlmPackageChallenge->setDateTo($challengeDateTo);
                    $mlmPackageChallenge->setTotalSales(0);
                    $mlmPackageChallenge->setRemark("");
                    $mlmPackageChallenge->setInternalRemark("");
                    $mlmPackageChallenge->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageChallenge->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageChallenge->save();
                }
            }
//            $upgraded = $this->doCheckingProfessional($uplineDistDB, $uplinePackageDB);

        }
        print_r("<br>Done");
        return sfView::HEADER_ONLY;
    }
     public function executeAccountSummary() {
        //$this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        //$this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "ACCOUNT_SUMMARY");

        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_WALLET, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=W');
        }

        $distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if (!$distributor)
            return $this->redirect('/home/logout');

        $tradingBalance = 0;
        $currentBalance = 0;
        $totalNetworks = 0;
        $ranking = "";
        $currencyCode = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);

        if ($distributor) {
            $existUser = AppUserPeer::retrieveByPK($distributor->getUserId());

            if ($existUser) {
                $lastLogin = $existUser->getLastLoginDatetime();
            }

            $packageDB = MlmPackagePeer::retrieveByPK($distributor->getRankId());
            if ($packageDB) {
                $ranking = $packageDB->getPackageName();
            }

            $tradingBalance = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
            $currentBalance = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

            $c = new Criteria();
            $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $distributor->getDistributorId());
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $totalNetworks = MlmDistributorPeer::doCount($c);
        }

        $this->tradingBalance = $tradingBalance;
        $this->currentBalance = $currentBalance;
        $this->totalNetworks = $totalNetworks;
        $this->ranking = $ranking;
        $this->colorArr = $this->getRankColorArr();
        $this->currencyCode = $currencyCode;
        $this->distributor = $distributor;
        $this->lastLogin = $lastLogin;
    }
    public function executeTransferMG() {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "TRANSFER_MG");
    }
    public function executeRedeemMp() {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "REDEEM_MP");
    }
    public function executeGozSuccessRedirect() {
        //var_dump(date("Ymd"));
        //exit();
//        print_r("<br>ver:".$this->getRequestParameter('ver'));
//        print_r("<br>merid:".$this->getRequestParameter('merid'));
//        print_r("<br>orderid:".$this->getRequestParameter('orderid'));
//        print_r("<br>amount:".$this->getRequestParameter('amount'));
//        print_r("<br>orderdate:".$this->getRequestParameter('orderdate'));
//        print_r("<br>curtype:".$this->getRequestParameter('curtype'));
//        print_r("<br>paytype:".$this->getRequestParameter('paytype'));
//        print_r("<br>lang:".$this->getRequestParameter('lang'));
//        print_r("<br>returnurl:".$this->getRequestParameter('returnurl'));
//        print_r("<br>errorurl:".$this->getRequestParameter('errorurl'));
//        print_r("<br>remark1:".$this->getRequestParameter('remark1'));
//        print_r("<br>enctype:".$this->getRequestParameter('enctype'));
//        print_r("<br>notifytype:".$this->getRequestParameter('notifytype'));
//        print_r("<br>urltype:".$this->getRequestParameter('urltype'));
//        print_r("<br>s2surl:".$this->getRequestParameter('s2surl'));
//        print_r("<br>goodsname:".$this->getRequestParameter('goodsname'));
//        print_r("<br>channelid:".$this->getRequestParameter('channelid'));
//        print_r("<br>sign:".$this->getRequestParameter('sign'));

        $sign = $this->getRequestParameter("sign");
        $transtat = $this->getRequestParameter("transtat");
        $amount = $this->getRequestParameter("amount");

        $c = new Criteria();
        $c->add(MlmDistEpointPurchasePeer::PG_SIGNATURE, $sign);
        $mlmDistEpointPurchase = MlmDistEpointPurchasePeer::doSelectOne($c);

        /*mysql_select_db('dfff_a', $con);
        mysql_query("SET CHARACTER SET UTF8");
        $sql = "SELECT *  FROM `cn` WHERE `amount` = '" . $amount . "' AND `sign` = '" . $sign . "' LIMIT 1";
        $rs = mysql_query($sql);
        $count = count($rs);
        if ($coun != 1) {
            die("Valid result!");
        } else {
            if ($transtat == '000') {
                die("OK");
            } else {
                die("Valid result!");
            }
        }*/
        if ($mlmDistEpointPurchase) {
            if ($transtat == '000') {
                $dist = MlmDistributorPeer::retrieveByPK($mlmDistEpointPurchase->getDistId());
                $companyEpoint = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_MP);
                $distEpoint = $this->getAccountBalance($dist->getDistributorId(), Globals::ACCOUNT_TYPE_MP);

                $totalEpoint = $mlmDistEpointPurchase->getAmount();

                $mlmDistEpointPurchase->setPgSuccess("Y");
                $mlmDistEpointPurchase->setPgMsg("SUCCESS");
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_COMPLETE);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));

                $mlmDistEpointPurchase->save();

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_MP);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                $mlm_account_ledger->setRemark("EPOINT PURCHASE (" . $dist->getDistributorCode() . ")");
                $mlm_account_ledger->setCredit(0);
                $mlm_account_ledger->setDebit($totalEpoint);
                $mlm_account_ledger->setBalance($companyEpoint - $totalEpoint);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setDistId($dist->getDistributorId());
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_MP);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                $mlm_account_ledger->setRemark("");
                $mlm_account_ledger->setCredit($totalEpoint);
                $mlm_account_ledger->setDebit(0);
                $mlm_account_ledger->setBalance($distEpoint + $totalEpoint);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Transaction Successful."));
                return $this->redirect('/member/fundsDeposit?pg=Y');
            } else {
                $mlmDistEpointPurchase->setPgSuccess("N");
                $mlmDistEpointPurchase->setPgMsg("transtat not 000");
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->save();

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
                return $this->redirect('/member/fundsDeposit');
            }
        } else {
            $mlmDistEpointPurchase->setPgSuccess("N");
            $mlmDistEpointPurchase->setPgMsg("Invalid Signature");
            $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID));
            $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
            $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
            $mlmDistEpointPurchase->save();

            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/fundsDeposit');
        }
        return sfView::HEADER_ONLY;
    }
    public function executeGozErrorRedirect() {
        return sfView::HEADER_ONLY;
    }
    public function executeFundsDeposit() {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REGISTRATION");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "FUNDS_DEPOSIT");

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if (!$distDB)
            return $this->redirect('/home/logout');
        $this->distDB = $distDB;

        $this->tradingCurrencyOnMT4 = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);

        $this->bankName = $this->getAppSetting(Globals::SETTING_BANK_NAME);
        $this->bankSwiftCode = $this->getAppSetting(Globals::SETTING_BANK_SWIFT_CODE);
        $this->iban = $this->getAppSetting(Globals::SETTING_IBAN);
        $this->bankAccountHolder = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_HOLDER);
        $this->bankAccountNumber = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_NUMBER);
        $this->cityOfBank = $this->getAppSetting(Globals::SETTING_CITY_OF_BANK);
        $this->countryOfBank = $this->getAppSetting(Globals::SETTING_COUNTRY_OF_BANK);

        /*$this->bankName2 = $this->getAppSetting(Globals::SETTING_BANK_NAME_2);
        $this->bankSwiftCode2 = $this->getAppSetting(Globals::SETTING_BANK_SWIFT_CODE_2);
        $this->iban2 = $this->getAppSetting(Globals::SETTING_IBAN_2);
        $this->bankAccountHolder2 = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_HOLDER_2);
        $this->bankAccountNumber2 = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_NUMBER_2);
        $this->cityOfBank2 = $this->getAppSetting(Globals::SETTING_CITY_OF_BANK_2);
        $this->countryOfBank2 = $this->getAppSetting(Globals::SETTING_COUNTRY_OF_BANK_2);*/
        $this->pg = $this->getRequestParameter('pg','N');

        if ($this->getRequestParameter('fundAmount') != "") {
            $amount = $this->getRequestParameter('fundAmount');
            //$paymentReference = $this->generatePaymentReference();
            $dispAmount = $amount;
            $paymentMethod = $this->getRequestParameter('paymentMethod', 'LB');

            $mlmDistEpointPurchase = new MlmDistEpointPurchase();
            $mlmDistEpointPurchase->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            //$mlmDistEpointPurchase->setPaymentMethod($paymentMethod);
            $mlmDistEpointPurchase->setAmount($amount);
            $mlmDistEpointPurchase->setPaymentReference("");
            $mlmDistEpointPurchase->setTransactionType(Globals::PURCHASE_EPOINT_BANK_TRANSFER);
            $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_PENDING);
            $mlmDistEpointPurchase->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistEpointPurchase->save();

            $mlmDistEpointPurchase->setPaymentReference($mlmDistEpointPurchase->getPurchaseId());
            $mlmDistEpointPurchase->save();

            $paymentReference = $mlmDistEpointPurchase->getPaymentReference();
            $this->setFlash('purchaseId', $mlmDistEpointPurchase->getPurchaseId());
            $this->setFlash('amount', $amount);
            $this->setFlash('paymentReference', $paymentReference);
            $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your requests has been submitted, to complete the funding, please proceed to remit the payment to the account, with details as indicated below:"));
            return $this->redirect('/member/fundsDeposit');
        }
    }
    public function executeFundsDepositTesting() {
        $distDB = MlmDistributorPeer::retrieveByPk(1);

        if ($this->getRequestParameter('fundAmount') != "") {
            $amount = $this->getRequestParameter('fundAmount');
            $amount = $this->getRequestParameter('fundAmount');
            //$paymentReference = $this->generatePaymentReference();
            $dispAmount = $amount;
            $paymentMethod = $this->getRequestParameter('paymentMethod', 'PG');

            if ($paymentMethod == "PG" && $amount > 200000) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Maximum Payment RMB 200,000 per transaction"));
                return $this->redirect('/member/fundsDepositTesting');
            }

            $mlmDistEpointPurchase = new MlmDistEpointPurchase();
            $mlmDistEpointPurchase->setDistId($distDB->getDistributorCode());
            //$mlmDistEpointPurchase->setPaymentMethod($paymentMethod);
            $mlmDistEpointPurchase->setAmount($amount);
            $mlmDistEpointPurchase->setPaymentReference("");
            $mlmDistEpointPurchase->setTransactionType(Globals::PURCHASE_EPOINT_BANK_TRANSFER);
            $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_PENDING);
            $mlmDistEpointPurchase->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistEpointPurchase->save();

//            $paymentReference = md5(uniqid());
            $paymentReference = $mlmDistEpointPurchase->getPurchaseId();
            $mlmDistEpointPurchase->setPaymentReference($paymentReference);
            $mlmDistEpointPurchase->save();

            $paymentReference = $mlmDistEpointPurchase->getPaymentReference();

            if ($paymentMethod == "PG") {
                require_once ("paymentGateway_config.php");

                $timeStart = date('YmdHis');
                $timeExpire = date('YmdHis')+3600;

                $parameters = array(
                    "version" => trim($config['version']),
                    "charset" => trim($config['charset']),
                    "signMethod" => 'MD5',
                    "transType" => trim($config['trans_type']),
                    "merId" => trim($config['mer_id']),
                    "merCode" => trim($config['mer_code']),
                    "backEndUrl" => trim($config['benotify']),
                    "frontEndUrl" => trim($config['ftnotify']),
                    'orderTime' => date('Y-m-d H:i:s', time()),
					"orderNumber" => $paymentReference, //generate order id, must be unqiue.
                    'commodityName' => $timeStart,
                    'commodityUrl' => "",
                    'commodityUnitPrice' => "0",
                    'commodityQuantity' => "0",
                    'transferFee' => "0",
                    'commodityDiscount' => "0",
                    "orderAmount" => $amount,
                    'orderCurrency' => trim($config['mer_currency_code']),
                    'customerName' => $distDB->getFullName(),
                    'cutomerCardNumber' => "",
                    'bankNumber' => $this->getRequestParameter('bank_type'),
                    'transTimeout' => trim($config['trans_timeout']),
                    'customerIp' => $this->getRequest()->getHttpHeader('addr','remote'),
                    'origQid' => '',
                    'merReserved' => ''
				);
                $paymentReference = "8fddf6972dc86ca3968a31fb27c2333f";
                $parameters = array(
                    "version" => trim($config['version']),
                    "charset" => trim($config['charset']),
                    "signMethod" => 'MD5',
                    "transType" => trim($config['trans_type']),
                    "merId" => trim($config['mer_id']),
                    "merCode" => trim($config['mer_code']),
                    "backEndUrl" => trim($config['benotify']),
                    "frontEndUrl"=>trim($config['ftnotify']),
                    'orderTime'=>date('Y-m-d H:i:s', time()),
                    'orderNumber'=>$paymentReference, //genebackEndUrlrate order id, must be unqiue.
                    'commodityName'=>"",
                    'commodityUrl'=>"",
                    'commodityUnitPrice'=>"1",
                    'commodityQuantity'=>"",
                    'transferFee'=>"1",
                    'commodityDiscount'=>"",
                    'orderAmount'=>$amount,
                    'orderCurrency'=> trim($config['mer_currency_code']),
                    'customerName'=>$distDB->getFullName(),
                    'cutomerCardNumber'=>"",
                    'bankNumber'=>$this->getRequestParameter('bank_type'),
                    'transTimeout'=>trim($config['trans_timeout']),
                    'customerIp'=>$this->getRequest()->getHttpHeader('addr','remote'),
                    'origQid'=>'',
                    'merReserved'=>''
                );
                $preStr = "";
                foreach ($parameters as $key => $value){
                    if(isset($value))
                        $preStr .= $key.'='.$value.'&';    //将数组组成 'key1=value1&key2=value2'字符串
                }

                $preStr = substr($preStr, 0, strlen($preStr)-1); //删掉最一个字符，这里指多余的'&'

                $mlmDistEpointPurchase->setTimeStart($timeStart);
                $mlmDistEpointPurchase->setTimeExpire($timeExpire);
                $mlmDistEpointPurchase->setBillCreateIp($this->getRequest()->getHttpHeader('addr','remote'));
                $mlmDistEpointPurchase->setBankCode($this->getRequestParameter('bank_type'));
                $mlmDistEpointPurchase->setCurrencyType($config['mer_currency_code']);
                $mlmDistEpointPurchase->setPgSignature($preStr);
                $mlmDistEpointPurchase->save();

                $this->payment_parameters = $parameters;

                $Submit = new Submit();
                $result = $Submit->getMsg($parameters, $config['purchase'], $config);

                //var_dump($result);
                //exit();
                if ($result) {
                    if ($result->{'respCode'} == "00") { //no error;
                        if ($result->{'formData'}) {
                            $params = $Submit->buildForm($result->{'formData'}, $result->{'url'}, "post", $config);
                            echo $params;

                            $mlmDistEpointPurchase->setPgSuccess("Y");
                            $mlmDistEpointPurchase->setPgMsg("waiting: ".$params);
                            //$mlmDistEpointPurchase->setStatusCode(Globals::STATUS_COMPLETE);
                            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            //$mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                            //$mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));

                            $mlmDistEpointPurchase->save();

                            $actionMessage = $this->getContext()->getI18N()->__("Transaction Successful.");
                            exit;
                        } else {
                            $content = 'Malformed message';

                            $mlmDistEpointPurchase->setPgSuccess("N");
                            $mlmDistEpointPurchase->setPgMsg("err001:".$content);
                            $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                            $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                            $mlmDistEpointPurchase->save();
                        }
                    } else {
                        $content = $result->{'respMsg'};

                        $mlmDistEpointPurchase->setPgSuccess("N");
                        $mlmDistEpointPurchase->setPgMsg("err002:".$content);
                        $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                        $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                        $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                        $mlmDistEpointPurchase->save();
                    }
                } else {
                    $content = 'request timesout';

                    $mlmDistEpointPurchase->setPgSuccess("N");
                    $mlmDistEpointPurchase->setPgMsg("err003:".$content);
                    $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                    $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                    $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                    $mlmDistEpointPurchase->save();
                }

                $this->result = $result;

                print_r("Done");
                return sfView::HEADER_ONLY;
            } else {
                $this->setFlash('purchaseId', $mlmDistEpointPurchase->getPurchaseId());
                $this->setFlash('amount', $amount);
                $this->setFlash('paymentReference', $paymentReference);
                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your requests has been submitted, to complete the funding, please proceed to remit the payment to the account, with details as indicated below:"));
                return $this->redirect('/member/fundsDeposit');
            }
        }
    }

    public function executePgSuccessRedirect() {
        require_once ("paymentGateway_config.php");

        $c = new Criteria();
        $c->add(MlmDistEpointPurchasePeer::PAYMENT_REFERENCE, $this->getRequestParameter('paymentId'));
        //$c->add(MlmDistEpointPurchasePeer::STATUS_CODE, Globals::STATUS_PENDING);
        $mlmDistEpointPurchase = MlmDistEpointPurchasePeer::doSelectOne($c);
        //var_dump($mlmDistEpointPurchase);
        $this->debugMessage("==================>".$preStr);
        if (!$mlmDistEpointPurchase) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/fundsDeposit');
        }

        $isError = false;
        $redirect = "";
        $actionMessage = "";

        $Notify = new Notify($config);
        $verify_result = $Notify->verifyReturn();
        if($verify_result) {//verify succeed
            if($_POST["respCode"] != "00") {
                $msg = $_POST["respMsg"];

                echo $_POST["respMsg"]; exit;
            } elseif ($_POST['status'] == '1') {
                //payment succeed
                //place ur code here
                $msg = '支付成功';
                //$dist = MlmDistributorPeer::retrieveByPK($mlmDistEpointPurchase->getDistId());

                if ($mlmDistEpointPurchase->getStatusCode() == Globals::STATUS_PENDING) {
                    $mlmDistEpointPurchase->setPgSuccess("Y");
                    $mlmDistEpointPurchase->setPgMsg("Success: ".$msg);
                    $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                    $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    $mlmDistEpointPurchase->save();

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId(0);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                    $mlm_account_ledger->setRemark("FUND: ".$mlmDistEpointPurchase->getAmount().", REF: ".$mlmDistEpointPurchase->getPaymentReference());
                    $mlm_account_ledger->setCredit($this->getRequestParameter('orderAmount'));
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($this->getRequestParameter('orderAmount'));
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();
                }

                $actionMessage = $this->getContext()->getI18N()->__("Transaction Successful.");
                $redirect = '/member/fundsDeposit?pg=Y';
            }elseif($_POST['status'] == '0'){
                //payment processing
                //place ur code here
                $msg = '支付处理中';

                $mlmDistEpointPurchase->setPgSuccess("N");
                $mlmDistEpointPurchase->setPgMsg($msg);
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->save();

                $isError = true;
                $actionMessage = $this->getContext()->getI18N()->__("Invalid Action.");
                $redirect = '/member/fundsDeposit';
            }elseif($_POST['status'] == '2'){
                //payment failure
                //place ur code here
                $msg = '支付失败';

                $mlmDistEpointPurchase->setPgSuccess("N");
                $mlmDistEpointPurchase->setPgMsg($msg);
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->save();

                $isError = true;
                $actionMessage = $this->getContext()->getI18N()->__("Invalid Action.");
                $redirect = '/member/fundsDeposit';
            }else{
                $msg = $_POST["respMsg"];

                $mlmDistEpointPurchase->setPgSuccess("N");
                $mlmDistEpointPurchase->setPgMsg($msg);
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->save();

                $isError = true;
                $actionMessage = $this->getContext()->getI18N()->__("Invalid Action.");
                $redirect = '/member/fundsDeposit';
            }
        } else {
            //signature failure
            //place ur code here
            $msg =  "验签失败";

            $mlmDistEpointPurchase->setPgSuccess("N");
            $mlmDistEpointPurchase->setPgMsg("Fail: ".$msg);
            $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
            $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
            $mlmDistEpointPurchase->save();

            $isError = true;
            $actionMessage = $this->getContext()->getI18N()->__("Invalid Action.");
            $redirect = '/member/fundsDeposit';

            echo "signature failure";
        }

        $mlmDistEpointPurchase->setReturnString("return:".$msg);
        $mlmDistEpointPurchase->save();

        $isError = false;
        $redirect = "";
        $actionMessage = "";
        $con = Propel::getConnection(MlmDistributorPeer::DATABASE_NAME);
        try {
            $con->begin();

            //$mlmDistEpointPurchase->setPgBillNo($ipsbillno);
            //$mlmDistEpointPurchase->setPgRetEncodeType($retEncodeType);
            //$mlmDistEpointPurchase->setPgCurrencyType($currency_type);

            if($this->getRequestParameter('status') == '0'){
                $actionMessage = $this->getContext()->getI18N()->__("Transaction Successful.");
                $redirect = '/member/fundsDeposit?pg=Y';
            } else {
                $isError = true;
                $actionMessage = $this->getContext()->getI18N()->__("Invalid Action.");
                $redirect = '/member/fundsDeposit';
            }

            if ($isError == true) {
                $this->setFlash('errorMsg', $actionMessage);
            } else {
                $this->setFlash('successMsg', $actionMessage);
            }
            $con->commit();

            return $this->redirect($redirect);
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }

    public function executePgRedirect()
    {
        require_once ("paymentGateway_config.php");
        $Notify = new Notify($config);
        $verify_result = $Notify->verifyNotify();


        $c = new Criteria();
        $c->add(MlmDistEpointPurchasePeer::PAYMENT_REFERENCE, $this->getRequestParameter('paymentId'));
        //$c->add(MlmDistEpointPurchasePeer::STATUS_CODE, Globals::STATUS_PENDING);
        $mlmDistEpointPurchase = MlmDistEpointPurchasePeer::doSelectOne($c);
        //var_dump($mlmDistEpointPurchase);
        $this->debugMessage("==================>".$preStr);
        if (!$mlmDistEpointPurchase) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/fundsDeposit');
        }

        $isError = false;
        $redirect = "";
        $actionMessage = "";

        if ($verify_result) { //verify succeed

            if ($_POST["respCode"] != "00") {
                echo $_POST["respMsg"];
                exit;
            } elseif ($_POST['status'] == '1') {
                //payment excuted succeed
                //place ur code here

                //payment succeed
                //place ur code here
                $msg = '支付成功';
                //$dist = MlmDistributorPeer::retrieveByPK($mlmDistEpointPurchase->getDistId());

                if ($mlmDistEpointPurchase->getStatusCode() == Globals::STATUS_PENDING) {
                    $mlmDistEpointPurchase->setPgSuccess("Y");
                    $mlmDistEpointPurchase->setPgMsg("Success: ".$msg);
                    $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                    $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));

                    $mlmDistEpointPurchase->save();

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId(0);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_POINT_PURCHASE);
                    $mlm_account_ledger->setRemark("FUND: ".$mlmDistEpointPurchase->getAmount().", REF: ".$mlmDistEpointPurchase->getPaymentReference());
                    $mlm_account_ledger->setCredit($this->getRequestParameter('orderAmount'));
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($this->getRequestParameter('orderAmount'));
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();
                }
            } elseif ($_POST['status'] == '0') {
                //payment processing
                //place ur code here
            } elseif ($_POST['status'] == '2') {
                //payment failure
                //place ur code here

                $mlmDistEpointPurchase->setPgSuccess("N");
                $mlmDistEpointPurchase->setPgMsg($msg);
                $mlmDistEpointPurchase->setStatusCode(Globals::STATUS_REJECT);
                $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistEpointPurchase->setApproveRejectDatetime(date("Y/m/d h:i:s A"));
                $mlmDistEpointPurchase->setApprovedByUserid($this->getUser()->getAttribute(Globals::SESSION_USERID));
                $mlmDistEpointPurchase->save();
            } else {
                echo $_POST["respMsg"];
                exit;
            }
        }
        else {
            //signature failure
            //place ur code here
            echo "signature failure";
        }

        return sfView::HEADER_ONLY;
    }

    public function executePasswordSetting()
    {
        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_PASSWORD_SETTING, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=P');
        }
    }

    public function executeSecurityPasswordRequired()
    {
        $doAction = $this->getRequestParameter('doAction', "VP");
        $this->doAction = $doAction;

        if ($this->getRequestParameter('transactionPassword')) {
            $c = new Criteria();
            $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
            $c->add(AppUserPeer::USERPASSWORD2, $this->getRequestParameter('transactionPassword'));
            $exist = AppUserPeer::doSelectOne($c);

            if (!$exist) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Security password is not valid."));
                return $this->redirect('/member/securityPasswordRequired?doAction='.$doAction);
            }

            if ($doAction == "VP") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_VIEW_PROFILE, true);
                return $this->redirect('/member/viewProfile');
            } else if ($doAction == "G") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_GENEALOGY, true);
                return $this->redirect('/member/sponsorTree');
            } else if ($doAction == "C") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_COMMISSION, true);
                return $this->redirect('/member/bonusDetails');
            } else if ($doAction == "W") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_WALLET, true);
                return $this->redirect('/member/accountSummary');
            } else if ($doAction == "TL") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_TRADING_LOG, true);
                return $this->redirect('/member/tradingLog');
            } else if ($doAction == "CL") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_CURRENT_LOG, true);
                return $this->redirect('/member/currentLog');
            } else if ($doAction == "P") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_PASSWORD_SETTING, true);
                return $this->redirect('/member/passwordSetting');
            } else if ($doAction == "CONVERT") {
                $this->getUser()->setAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_CONVERT, true);
                return $this->redirect('/member/accountConversion');
            }
        }
    }
    public function executeTestSendReport()
    {
        //$this->sendDailyReport();

        $c = new Criteria();
        //$c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|933|%");
        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|33|%", Criteria::LIKE);
        $c->addAscendingOrderByColumn(MlmDistributorPeer::TREE_LEVEL);

        $mlmDistributors = MlmDistributorPeer::doSelect($c);

        foreach ($mlmDistributors as $mlmDistributor) {
            print_r($mlmDistributor->getDistributorId()."<br>");
            $uplineDistDB = MlmDistributorPeer::retrieveByPK($mlmDistributor->getUplineDistId());

            $mlmDistributor->setTreeLevel($uplineDistDB->getTreeLevel() + 1);
            $mlmDistributor->setTreeStructure($uplineDistDB->getTreeStructure()."|".$mlmDistributor->getDistributorId()."|");
            $mlmDistributor->save();
        }
        /*$c = new Criteria();
        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|933|%", Criteria::LIKE);
        $c->addAscendingOrderByColumn(MlmDistributorPeer::TREE_LEVEL);

        $mlmDistributors = MlmDistributorPeer::doSelect($c);

        foreach ($mlmDistributors as $mlmDistributor) {
            print_r($mlmDistributor->getDistributorId()."<br>");
            $uplineDistDB = MlmDistributorPeer::retrieveByPK($mlmDistributor->getUplineDistId());

            $mlmDistributor->setTreeLevel($uplineDistDB->getTreeLevel() + 1);
            $mlmDistributor->setTreeStructure($uplineDistDB->getTreeStructure()."|".$mlmDistributor->getDistributorId()."|");
            $mlmDistributor->save();
        }*/

        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    public function executeDoCustomerEnquiry()
    {
        $contactNoEmail = $this->getRequestParameter('contactNoEmail');
        $title = $this->getRequestParameter('title');
        $message = $this->getRequestParameter('message');
        $transactionPassword = $this->getRequestParameter('transactionPassword');

        if ($this->getRequestParameter('transactionPassword') == "") {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Security password is blank."));
            return $this->redirect('/member/customerEnquiry');
        }

        $appUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));
        if (strtoupper($appUser->getUserPassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
            return $this->redirect('/member/customerEnquiry');
        }
        //var_dump($contactNoEmail);
        //var_dump($title);
        //var_dump($message);
        //var_dump($transactionPassword);

        $mlm_customer_enquiry = new MlmCustomerEnquiry();
        $mlm_customer_enquiry->setDistributorId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $mlm_customer_enquiry->setContactNo($contactNoEmail);
        $mlm_customer_enquiry->setTitle($title);
        $mlm_customer_enquiry->setAdminUpdated(Globals::FALSE);
        $mlm_customer_enquiry->setDistributorUpdated(Globals::TRUE);
        $mlm_customer_enquiry->setAdminRead(Globals::FALSE);
        $mlm_customer_enquiry->setDistributorRead(Globals::TRUE);
        $mlm_customer_enquiry->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

        $mlm_customer_enquiry->save();

        $mlm_customer_enquiry_detail = new MlmCustomerEnquiryDetail();
        $mlm_customer_enquiry_detail->setCustomerEnquiryId($mlm_customer_enquiry->getEnquiryId());
        $mlm_customer_enquiry_detail->setMessage($message);
        $mlm_customer_enquiry_detail->setReplyFrom(Globals::ROLE_DISTRIBUTOR);
        $mlm_customer_enquiry_detail->setStatusCode(Globals::STATUS_ACTIVE);
        $mlm_customer_enquiry_detail->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->save();

        $message = "Member ID: ".$this->getUser()->getAttribute(Globals::SESSION_USERNAME)."<br>Contact No: ".$contactNoEmail."<br><br>Message: ".$message;

        $sendMailService = new SendMailService();
        $sendMailService->sendMail("support@fxcmiscc.com", "support", "[Customer Enquiry]".$title, $message);

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your inquiry has been submitted."));
        return $this->redirect('/member/customerEnquiry');
    }

    public function executeDoCustomerEnquiryDetail()
    {
        $enquiryId = $this->getRequestParameter('enquiryId');
        $message = $this->getRequestParameter('message');
        $transactionPassword = $this->getRequestParameter('transactionPassword');

        if ($this->getRequestParameter('transactionPassword') == "") {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Security password is blank."));
            return $this->redirect('/member/customerEnquiryDetail?enquiryId='.$enquiryId);
        }

        $appUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));
        if (strtoupper($appUser->getUserPassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
            return $this->redirect('/member/customerEnquiryDetail?enquiryId='.$enquiryId);
        }

        $mlmCustomerEnquiry = MlmCustomerEnquiryPeer::retrieveByPK($enquiryId);
        $mlmCustomerEnquiry->setDistributorUpdated(Globals::TRUE);
        $mlmCustomerEnquiry->setAdminUpdated(Globals::TRUE);
        $mlmCustomerEnquiry->setAdminRead(Globals::FALSE);
        $mlmCustomerEnquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

        $mlmCustomerEnquiry->save();

        $mlm_customer_enquiry_detail = new MlmCustomerEnquiryDetail();
        $mlm_customer_enquiry_detail->setCustomerEnquiryId($mlmCustomerEnquiry->getEnquiryId());
        $mlm_customer_enquiry_detail->setMessage($message);
        $mlm_customer_enquiry_detail->setReplyFrom(Globals::ROLE_DISTRIBUTOR);
        $mlm_customer_enquiry_detail->setStatusCode(Globals::STATUS_ACTIVE);
        $mlm_customer_enquiry_detail->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->save();

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your inquiry has been submitted."));
        return $this->redirect('/member/customerEnquiryDetail?enquiryId='.$enquiryId);
    }
    public function executeCustomerEnquiry()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "CS_CENTER");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "CS_CENTER");

        $this->username = $this->getUser()->getAttribute(Globals::SESSION_USERNAME);
    }
    public function executeCustomerEnquiryDetail()
    {
        $enquiryId = $this->getRequestParameter('enquiryId');

        $mlmCustomerEnquiry = MlmCustomerEnquiryPeer::retrieveByPK($enquiryId);

        if (!$mlmCustomerEnquiry) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/customerEnquiry');
        }
        $mlmCustomerEnquiry->setDistributorRead(Globals::TRUE);
        $mlmCustomerEnquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlmCustomerEnquiry->save();

        if ($mlmCustomerEnquiry->getDistributorId() != $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/customerEnquiry');
        }

        $c = new Criteria();
        $c->add(MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID, $enquiryId);
        $mlmCustomerEnquiryDetails = MlmCustomerEnquiryDetailPeer::doSelect($c);

        $this->mlmCustomerEnquiry = $mlmCustomerEnquiry;
        $this->mlmCustomerEnquiryDetails = $mlmCustomerEnquiryDetails;
    }
    public function executeVerifyActivePlacementDistId()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');
        $placementDistId = $this->getRequestParameter('placementDistId');

        $distId = $this->getDistributorIdByCode($sponsorId);

        //$array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $placementDistId);
        $c->add(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, "%".$distId."%", Criteria::LIKE);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        $arr = "";
        if ($existUser) {
            //if ($existUser->getDistributorId() <> $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
            $arr = array(
                'userId' => $existUser->getDistributorId(),
                'userName' => $existUser->getDistributorCode(),
                'fullname' => $existUser->getFullName(),
                'nickname' => $existUser->getNickname()
            );
            //}
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }
    public function executePurchasePackageViaTree()
    {
        $uplineDistCode = $this->getRequestParameter('distcode');
        $position = $this->getRequestParameter('position');

        $c = new Criteria();
        $c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        $packageDBs = MlmPackagePeer::doSelect($c);

        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->pointAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->ecashAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $this->packageDBs = $packageDBs;

        $this->uplineDistCode = $uplineDistCode;
        $this->position = $position;
    }
    public function executePurchasePackageViaTree2()
    {
        $this->uplineDistCode = $this->getRequestParameter('uplineDistCode');
        $this->position = $this->getRequestParameter('position');
        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        //var_dump($this->getRequestParameter('uplineDistCode'));
        if ($this->getRequestParameter('pid') <> "") {
            $ledgerEPointBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
            $ledgerECashBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
            $selectedPackage = MlmPackagePeer::retrieveByPK($this->getRequestParameter('pid'));
            $this->forward404Unless($selectedPackage);

            $amountNeeded = $selectedPackage->getPrice();

            $epointPaid = $this->getRequestParameter('epointPaid');
            $ecashPaid = $this->getRequestParameter('ecashPaid');

            /*if ($selectedPackage->getPackageId() == Globals::MAX_PACKAGE_ID) {
                $amountNeeded = $this->getRequestParameter('specialPackagePrice');
            }*/

            $existDist = MlmDistributorPeer::retrieveByPK($this->getRequestParameter('sponsorId', $this->getUser()->getAttribute(Globals::SESSION_DISTID)));
            $this->forward404Unless($existDist);
            $this->sponsorId = $existDist->getDistributorCode();
            $this->sponsorName = $existDist->getFullName();

            if ($epointPaid > $ledgerEPointBalance) {
                $this->setFlash('errorMsg', "In-sufficient RP Wallet amount");
                return $this->redirect('/member/purchasePackageViaTree?distcode='.$this->uplineDistCode.'&position='.$this->position);
            }
            if ($ecashPaid > $ledgerECashBalance) {
                $this->setFlash('errorMsg', "In-sufficient EP Wallet amount");
                return $this->redirect('/member/purchasePackageViaTree?distcode='.$this->uplineDistCode.'&position='.$this->position);
            }
            $totalPaid = $epointPaid + $ecashPaid;
            if ($totalPaid < $amountNeeded) {
                $this->setFlash('errorMsg', "In-sufficient fund to purchase package");
                return $this->redirect('/member/purchasePackageViaTree?distcode='.$this->uplineDistCode.'&position='.$this->position);
            }
            if ($totalPaid > $amountNeeded) {
                $this->setFlash('errorMsg', "Amount Paid is not tally with package price");
                return $this->redirect('/member/purchasePackageViaTree?distcode='.$this->uplineDistCode.'&position='.$this->position);
            }
            if ($amountNeeded > $ledgerEPointBalance) {
                $this->setFlash('errorMsg', "In-sufficient RP Wallet amount");
                return $this->redirect('/member/purchasePackageViaTree?distcode='.$this->uplineDistCode.'&position='.$this->position);
            }

            $this->selectedPackage = $selectedPackage;
            $this->epointPaid = $epointPaid;
            $this->ecashPaid = $ecashPaid;
            $this->amountNeeded = $amountNeeded;
            $this->productCode = $this->getRequestParameter('productCode');

            $c = new Criteria();
            $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $totalNetworks = MlmDistributorPeer::doCount($c);

            $this->totalNetworks = $totalNetworks;
        } else {
            return $this->redirect('/member/placementTree');
        }
    }
    public function executeUpgradePackageViaTree()
    {
        $distCode = $this->getRequestParameter('distcode');
        $c = new Criteria();
        $c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        $c->addAscendingOrderByColumn(MlmPackagePeer::PRICE);
        $packageDBs = MlmPackagePeer::doSelect($c);

        /*$c = new Criteria();
        $c->addDescendingOrderByColumn(MlmPackagePeer::PRICE);
        $highestPackageDB = MlmPackagePeer::doSelectOne($c);*/

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distCode);
        $distDB = MlmDistributorPeer::doSelectOne($c);
        $this->forward404Unless($distDB);

        $distPackage = MlmPackagePeer::retrieveByPK($distDB->getRankId());

        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->pointAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->packageDBs = $packageDBs;
        $this->distPackage = $distPackage;
        $this->distDB = $distDB;
        //$this->highestPackageDB = $highestPackageDB;
        $this->distCode = $distCode;
    }
    public function executeUnderMaintenance()
    {
    }
    public function executeExchange()
    {
    }
    public function executeDailyFxGuide()
    {
    }
    public function executeGenerateRoi() {
        //$this->retrieveDailyPt2Balance($this->getRequestParameter('q'));

        $dateUtil = new DateUtil();
        $bonusDate = $dateUtil->formatDate("Y-m-d", date("Y-m-d"))." 23:59:59";

        $query = "SELECT dist_id FROM mlm_roi_dividend
                WHERE status_code = '".Globals::DIVIDEND_STATUS_PENDING."' AND dividend_date <= '".$bonusDate."'
                GROUP BY dist_id";
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $arrPassive = array();
        while ($resultset->next()) {
            $arr = $resultset->getRow();
            $arrPassive[] = $arr['dist_id'];
        }

        $con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);

        try {
            $con->begin();

            print_r("+++++ CP4 +++++<br>");
            foreach ($arrPassive as $distId) {
                $cp4Balance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_CP4);
                $distBeneficial = MlmDistributorPeer::retrieveByPK($distId);

                if ($cp4Balance > 0) {
                    $distPackageDB = MlmPackagePeer::retrieveByPK($distBeneficial->getMt4RankId());
                    $dividendAmount = $cp4Balance * $distPackageDB->getMonthlyRoi() / 100;

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($distId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_CP4);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_PASSIVE_INCOME);
                    $mlm_account_ledger->setRemark("CP4:".$cp4Balance." (".$distPackageDB->getMonthlyRoi()."%)");
                    $mlm_account_ledger->setCredit($dividendAmount);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($cp4Balance + $dividendAmount);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();
                }
            }
            print_r("+++++ CP4 END +++++<br>");

            print_r("+++++ ROI Dividend +++++<br>");
            $c = new Criteria();
            $c->add(MlmRoiDividendPeer::STATUS_CODE, Globals::DIVIDEND_STATUS_PENDING);
            $c->add(MlmRoiDividendPeer::DIVIDEND_DATE, $bonusDate, Criteria::LESS_EQUAL);
            //$c->add(MlmRoiDividendPeer::DIST_ID, 351, Criteria::EQUAL);
            $mlmRoiDividendDBs = MlmRoiDividendPeer::doSelect($c);
            print_r("bonusDate " . $bonusDate . "<br>");
            $str = "";
            //var_dump(count($mlmRoiDividendDBs));
            foreach ($mlmRoiDividendDBs as $mlmRoiDividend) {
                $distId = $mlmRoiDividend->getDistId();
                $mt4UserName = $mlmRoiDividend->getMt4UserName();
                $packagePrice = $mlmRoiDividend->getPackagePrice();
                $dividendDate = $mlmRoiDividend->getDividendDate();
                print_r("DistId " . $distId . "<br>");

                $dividendDateStr = $dateUtil->formatDate("Y-m-j", $dividendDate);
                $dividendDateFrom = $dividendDateStr . " 00:00:00";
                $dividendDateTo = $dividendDateStr . " 23:59:59";

                $dividendDateFromTS = strtotime($dividendDateFrom);
                $dividendDateToTS = strtotime($dividendDateTo);

                $c = new Criteria();
                $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4UserName);
                $mlmDistMt4DB = MlmDistMt4Peer::doSelectOne($c);

                require_once('MT4WebRequest.php');

                $mlmDistributorDB = MlmDistributorPeer::retrieveByPK($mlmRoiDividend->getDistId());

                $login = $mlmDistMt4DB->getMt4UserName();
                $password = $mlmDistMt4DB->getMt4Password();
                $mt4 = new MT4WebRequest();
                //$data = $mt4->AccountInfo($login, $password);

                if ($mlmDistributorDB->getProductFxgold() == "Y") {
                    $data = array();
                    $data["status"] = "success";
                    $data["message"] = $packagePrice;
                    print_r("<br>+++++++++packagePrice+++++++++++");
                } else {
                    $data = $mt4->AccountBalance((int) $login);
                    print_r("<br>++++++++$mt4->AccountBalance++++++++++++");
                }

                //$data["status"] = "success";
                //$data["message"] = 4599.09;
                //$data["message"] = 2000;

                $minPackagePrice = $packagePrice;
                var_dump($data);
                print_r("<br><br>");

                if ($data["status"] == "success") {
                    if ($packagePrice > $data["message"]) {
                        $packagePrice = $data["message"];
                    }

                    if ($packagePrice < 0) {
                        $packagePrice = 0;
                    }
                    $roiPercentage = $mlmRoiDividend->getRoiPercentage();

                    $dividendDate = strtotime($mlmRoiDividend->getDividendDate());
                    $dividendDateDay = date("d", $dividendDate);

                    $activeDate = strtotime($mlmDistributorDB->getActiveDatetime());
                    $activeDateDay = date("d", $activeDate);
                    var_dump($dividendDateDay);
                    //var_dump($activeDateDay);

                    $c = new Criteria();
                    if ($dividendDateDay == "01") {
                        if ($dividendDateDay == $activeDateDay) {
                            $c->add(MlmRoiForecastPeer::DATE_MONTH, date('m'));
                            var_dump("same" . date('m'));
                        } else {
                            $c->add(MlmRoiForecastPeer::DATE_MONTH, date('m') - 1);
                            var_dump("not same");
                        }
                    } else {
                        $c->add(MlmRoiForecastPeer::DATE_MONTH, date('m'));
                    }
                    $c->add(MlmRoiForecastPeer::DATE_YEAR, date('Y'));
                    $mlmRoiForecastDB = MlmRoiForecastPeer::doSelectOne($c);
                    //exit();
                    if ($mlmRoiForecastDB) {
                        if ($mlmRoiDividend->getPackagePrice() <= 5000) {
                            $roiPercentage = $mlmRoiForecastDB->getRoi3k5k();
                        } else if ($mlmRoiDividend->getPackagePrice() >= 10000 && $mlmRoiDividend->getPackagePrice() <= 15000) {
                            $roiPercentage = $mlmRoiForecastDB->getRoi10k15k();
                        } else if ($mlmRoiDividend->getPackagePrice() >= 30000) {
                            $roiPercentage = $mlmRoiForecastDB->getRoi30k50k();
                        }
                    }
                    $mlmRoiDividend->setRoiPercentage($roiPercentage);
                    var_dump($mlmDistributorDB->getDistributorCode().":".$roiPercentage."<br>");
                    $dividendAmount = 0;
                    if ($minPackagePrice < $packagePrice) {
                        $packagePrice = $minPackagePrice;
                    }
                    $dividendAmount = $packagePrice * $roiPercentage / 100;
                    //var_dump($dividendAmount);
                    //var_dump($minPackagePrice);
                    //var_dump($packagePrice);
                    //exit();
                    $accountBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_CP4);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($distId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_CP4);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                    $mlm_account_ledger->setRemark(("Performance Return:".$roiPercentage)."%, Fund:".$packagePrice);
                    $mlm_account_ledger->setCredit($dividendAmount);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($accountBalance + $dividendAmount);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    $fundManagementBalance = $this->getCommissionBalance($distId, Globals::COMMISSION_TYPE_FUND_MANAGEMENT);

                    $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                    $sponsorDistCommissionledger->setMonthTraded(date('m'));
                    $sponsorDistCommissionledger->setYearTraded(date('Y'));
                    $sponsorDistCommissionledger->setDistId($distId);
                    $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_FUND_MANAGEMENT);
                    $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_DIVIDEND);
                    //$sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                    $sponsorDistCommissionledger->setCredit($dividendAmount);
                    $sponsorDistCommissionledger->setDebit(0);
                    $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                    $sponsorDistCommissionledger->setBalance($fundManagementBalance + $dividendAmount);
                    $sponsorDistCommissionledger->setRemark(("Performance Return:".$roiPercentage)."%, Fund:".$packagePrice);
                    $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->save();

                    $mt4Username = $mlmRoiDividend->getMt4UserName();
                    print_r($mlmRoiDividend->getMt4UserName() . ":" . $packagePrice . "<br>");

                    $mlmRoiDividend->setAccountLedgerId($mlm_account_ledger->getAccountId());
                    $mlmRoiDividend->setDividendAmount($dividendAmount);
                    $mlmRoiDividend->setMt4Balance($packagePrice);
                    $mlmRoiDividend->setStatusCode(Globals::DIVIDEND_STATUS_SUCCESS);
                    //$mlm_gold_dividend->setRemarks($this->getRequestParameter('remarks'));
                    $mlmRoiDividend->save();

                    if ($dividendAmount == 0) {
                        print_r($mlmRoiDividend->getMt4UserName() . ":++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++<br>");

                        $c = new Criteria();
                        $c->add(MlmRoiDividendPeer::STATUS_CODE, Globals::DIVIDEND_STATUS_PENDING);
                        $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mlmRoiDividend->getMt4UserName());
                        $mlmRoiDividendCompletes = MlmRoiDividendPeer::doSelect($c);

                        foreach ($mlmRoiDividendCompletes as $mlmRoiDividendComplete) {
                            $mlmRoiDividendComplete->setDividendAmount($dividendAmount);
                            //$mlmRoiDividendComplete->setMt4Balance(0);
                            $mlmRoiDividendComplete->setStatusCode(Globals::DIVIDEND_STATUS_COMPLETE);
                            $mlmRoiDividendComplete->save();
                        }
                    }

                    $str .= $distId.",";

                    sleep(2);
                }
            }
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
        // roi dividend end~

        print_r($str."Done");
        return sfView::HEADER_ONLY;
    }
    function retrieveDailyPt2Balance($file)
    {
        if ($file == null || $file == "") {
            return true;
        }
        $con = Propel::getConnection(MlmDailyPipsFilePeer::DATABASE_NAME);
        try {
            $con->begin();

            $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "fundManagement".DIRECTORY_SEPARATOR.$file.".xls";

            error_reporting(E_ALL ^ E_NOTICE);
            require_once 'excel_reader2.php';
            $data = new Spreadsheet_Excel_Reader($physicalDirectory);

            $totalRow = $data->rowcount($sheet_index = 0);
            for ($x = $totalRow; $x > 0; $x--) {
                $mt4Username = $data->val($x, "B");
                $balance = $data->val($x, "P");
                //var_dump($mt4Username);
                //var_dump("<br>");
                //var_dump($balance);
                //var_dump("<br>");
                $balance = str_replace(",", "", $balance);
                $balance = str_replace("??", "", $balance);
                //var_dump($balance);
                //var_dump("<br>");
                //exit();
                $c = new Criteria();
                $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Username);
                $mlm_dist_mt4 = MlmDistMt4Peer::doSelectOne($c);

                if ($mlm_dist_mt4) {
                    $mlmDailyDistMt4Credit = new MlmDailyDistMt4Credit();
                    $mlmDailyDistMt4Credit->setDistId($mlm_dist_mt4->getDistId());
                    $mlmDailyDistMt4Credit->setMt4UserName($mlm_dist_mt4->getMt4UserName());
                    $mlmDailyDistMt4Credit->setMt4Credit($balance);
                    $mlmDailyDistMt4Credit->setTradedDatetime($file);
                    $mlmDailyDistMt4Credit->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmDailyDistMt4Credit->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmDailyDistMt4Credit->save();
                } else {

                }
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }
    }
    public function executeFundManagementReport()
    {
    }
    public function executeFundManagementReturn()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "FUND_MANAGEMENT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "FUND_MANAGEMENT");

        $this->fundManagements = $this->findFundManagementList($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        /*$c = new Criteria();
        $c->add(MlmDistMt4Peer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->distMt4s = MlmDistMt4Peer::doSelect($c);*/
    }

    function findFundManagementList($distId) {

        $query = "SELECT DISTINCT dist_id, mt4_user_name
	                FROM mlm_roi_dividend WHERE dist_id = ".$distId;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        $resultArray = array();
        $count = 0;
        while ($resultset->next()) {
            $arr = $resultset->getRow();

            $resultArray[$count]["dist_id"] = $arr["dist_id"];
            $resultArray[$count]["mt4_user_name"] = $arr["mt4_user_name"];
            $resultArray[$count]["unrealized_profit"] = $this->getUnrealizedProfit($arr["mt4_user_name"]);
            $resultArray[$count]["realized_rofit"] = $this->getRealizedProfit($arr["mt4_user_name"]);

            $count++;
        }
        return $resultArray;
    }

    public function executeInitData()
    {
        var_dump($_SERVER['HTTP_HOST']);
        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    public function executePrintBankInformation()
    {
        $purchaseId = $this->getRequestParameter('p');

        $c = new Criteria();
        $c->add(MlmDistEpointPurchasePeer::PURCHASE_ID, $purchaseId);
        $c->add(MlmDistEpointPurchasePeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $distEpointPurchase = MlmDistEpointPurchasePeer::doSelectOne($c);

        $bankId = 1;
        if ($distEpointPurchase) {
            $this->purchaseId = $distEpointPurchase->getPurchaseId();
            $this->amount = $distEpointPurchase->getAmount();
            $this->paymentReference = $distEpointPurchase->getPaymentReference();
            $bankId = $distEpointPurchase->getBankId();
        } else {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action"));
            return $this->redirect('/member/summary');
        }
        $dateUtil = new DateUtil();
        $this->currentDate = $dateUtil->formatDate("d M Y", $distEpointPurchase->getCreatedOn());

        $this->mlmDistributorDB = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));;
        $this->distEpointPurchase = $distEpointPurchase;
        $this->tradingCurrencyOnMT4 = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->bankName = $this->getAppSetting(Globals::SETTING_BANK_NAME);
        $this->bankSwiftCode = $this->getAppSetting(Globals::SETTING_BANK_SWIFT_CODE);
        $this->iban = $this->getAppSetting(Globals::SETTING_IBAN);
        $this->bankAccountHolder = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_HOLDER);
        $this->bankAccountNumber = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_NUMBER);
        $this->cityOfBank = $this->getAppSetting(Globals::SETTING_CITY_OF_BANK);
        $this->countryOfBank = $this->getAppSetting(Globals::SETTING_COUNTRY_OF_BANK);
        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
    }

    public function executePackagePurchaseViaBankTransfer() {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(MlmPackagePeer::PRICE);
        $packages = MlmPackagePeer::doSelect($c);

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($distDB);
        $this->packages = $packages;
        $this->distDB = $distDB;

        if ($this->getRequestParameter('packageTypeId') != "" && $this->getRequest()->getFileName('bankSlip') != '') {
            $packageDB = MlmPackagePeer::retrieveByPk($this->getRequestParameter('packageTypeId'));
            $this->forward404Unless($packageDB);

            $uploadedFilename = $this->getRequest()->getFileName('bankSlip');
            $ext = explode(".", $this->getRequest()->getFileName('bankSlip'));
            $extensionName = $ext[count($ext) - 1];

            $filename = date("Ymd")."_".$distDB->getDistributorCode()."_".rand(1000,9999).".".$extensionName;
            $this->getRequest()->moveFile('bankSlip', sfConfig::get('sf_upload_dir') . '/bankslip/' . $filename);

            $mlmDistPackagePurchase = new MlmDistPackagePurchase();
            $mlmDistPackagePurchase->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $mlmDistPackagePurchase->setRankId($packageDB->getPackageId());
            $mlmDistPackagePurchase->setRankCode($packageDB->getPackageName());
            //$mlmDistPackagePurchase->setInitRankId($packageDB->getPackageId());
            //$mlmDistPackagePurchase->setInitRankCode($packageDB->getPackageName());
            $mlmDistPackagePurchase->setAmount($packageDB->getPrice());
            $mlmDistPackagePurchase->setTransactionType(Globals::PURCHASE_PACKAGE_BANK_TRANSFER);
            $mlmDistPackagePurchase->setImageSrc($_SERVER['HTTP_HOST']."/uploads/bankslip/".$filename);
            $mlmDistPackagePurchase->setStatusCode(Globals::STATUS_PENDING);
            //$mlmDistPackagePurchase->setRemarks($this->getRequestParameter('remarks'));
            $mlmDistPackagePurchase->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDistPackagePurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

            $mlmDistPackagePurchase->save();

            $distDB->setStatusCode(Globals::STATUS_PAYMENT_PENDING);
            $distDB->save();
            $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your requests has been submitted."));
            return $this->redirect('/member/summary');
        }
    }

    public function executeDoUploadFile() {
        if ($this->getRequest()->getFileName('bankPassBook') != '') {
            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $this->forward404Unless($distDB);

            $uploadedFilename = $this->getRequest()->getFileName('bankPassBook');
            $ext = explode(".", $this->getRequest()->getFileName('bankPassBook'));
            $extensionName = $ext[count($ext) - 1];

            $filename = "bankPassBook_".date("Ymd")."_".$distDB->getDistributorCode()."_".rand(1000,9999).".".$extensionName;
            $this->getRequest()->moveFile('bankPassBook', sfConfig::get('sf_upload_dir') . '/bank_pass_book/' . $filename);

            $distDB->setFileBankPassBook($filename);
            $distDB->save();

            $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Upload successful."));
        }
        if ($this->getRequest()->getFileName('proofOfResidence') != '') {
            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $this->forward404Unless($distDB);

            $uploadedFilename = $this->getRequest()->getFileName('proofOfResidence');
            $ext = explode(".", $this->getRequest()->getFileName('proofOfResidence'));
            $extensionName = $ext[count($ext) - 1];

            $filename = "proofOfResidence_".date("Ymd")."_".$distDB->getDistributorCode()."_".rand(1000,9999).".".$extensionName;
            $this->getRequest()->moveFile('proofOfResidence', sfConfig::get('sf_upload_dir') . '/proof_of_residence/' . $filename);

            $distDB->setFileProofOfResidence($filename);
            $distDB->save();

            $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Upload successful."));
        }
        if ($this->getRequest()->getFileName('nric') != '') {
            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $this->forward404Unless($distDB);

            $uploadedFilename = $this->getRequest()->getFileName('nric');
            $ext = explode(".", $this->getRequest()->getFileName('nric'));
            $extensionName = $ext[count($ext) - 1];

            $filename = "nric_".date("Ymd")."_".$distDB->getDistributorCode()."_".rand(1000,9999).".".$extensionName;
            $this->getRequest()->moveFile('nric', sfConfig::get('sf_upload_dir') . '/nric/' . $filename);

            $distDB->setFileNric($filename);
            $distDB->save();

            $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Upload successful."));
        }
        return $this->redirect('/member/viewProfile');
    }

    public function executeUploadBankReceipt() {
        if ($this->getRequestParameter('purchaseId') != "" && $this->getRequest()->getFileName('bankSlip') != '') {
            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $this->forward404Unless($distDB);
            $this->distDB = $distDB;

            $uploadedFilename = $this->getRequest()->getFileName('bankSlip');
            $ext = explode(".", $this->getRequest()->getFileName('bankSlip'));
            $extensionName = $ext[count($ext) - 1];

            $filename = date("Ymd")."_".$distDB->getDistributorCode()."_".rand(1000,9999).".".$extensionName;
            $this->getRequest()->moveFile('bankSlip', sfConfig::get('sf_upload_dir') . '/bankslip/' . $filename);

            $mlmDistEpointPurchase = MlmDistEpointPurchasePeer::retrieveByPK($this->getRequestParameter('purchaseId'));
            $mlmDistEpointPurchase->setImageSrc("http://".$_SERVER['HTTP_HOST']."/uploads/bankslip/".$filename);
            $mlmDistEpointPurchase->setBankId($this->getRequestParameter('bankId'));
            $mlmDistEpointPurchase->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

            $mlmDistEpointPurchase->save();

            $this->setFlash('banksuccessMsg', $this->getContext()->getI18N()->__("Bank receipt upload successful."));
            return $this->redirect('/member/fundsDeposit');
        }
    }

    public function executeUpdateTermCondition() {
        $mlm_distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($mlm_distributor);

        $mlm_distributor->setTermCondition(Globals::YES);
        $mlm_distributor->save();
        return $this->redirect('/member/summary');
    }

    public function executeRegister()
    {
        $char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 2));
        // Concatenate the random string onto the random numbers
        // The font 'Anorexia' doesn't have a character for '8', so the numbers will only go up to 7
        // '0' is left out to avoid confusion with 'O'

        $str = rand(1, 7) . rand(1, 7) . $char;
        $this->getUser()->setAttribute(Globals::SYSTEM_CAPTCHA_ID, $str);
    }

    public function executeMemberRegistration()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REGISTRATION");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "REGISTRATION");

        $c = new Criteria();
        $c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        $c->addAscendingOrderByColumn(MlmPackagePeer::PACKAGE_ID);
        $packageDBs = MlmPackagePeer::doSelect($c);

        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->pointAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->ecashAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $this->promoAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);
        $this->packageDBs = $packageDBs;
    }
    public function executeMemberRegistration2()
    {
        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        if ($this->getRequestParameter('packageId') <> "") {
            $ledgerPointBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
            $ledgerEcashBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
            $ledgerPromoBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);
            $selectedPackage = MlmPackagePeer::retrieveByPK($this->getRequestParameter('packageId'));
            if (!$selectedPackage) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Package"));
                return $this->redirect('/member/memberRegistration');
            }
            $packageTotalInvested = $selectedPackage->getPrice();

            if (($this->getRequestParameter('ePointPaid') + Globals::REGISTER_FEE) > $ledgerPointBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient RP Wallet"));
                return $this->redirect('/member/memberRegistration');
            }
            if ($this->getRequestParameter('eCashPaid') > $ledgerEcashBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient EP Wallet"));
                return $this->redirect('/member/memberRegistration');
            }
            if ($this->getRequestParameter('promoPaid') > $ledgerPromoBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient Promo Wallet"));
                return $this->redirect('/member/memberRegistration');
            }
            if ($packageTotalInvested != ($this->getRequestParameter('ePointPaid') + $this->getRequestParameter('eCashPaid') + $this->getRequestParameter('promoPaid'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("The total funds is not match with package price"));
                return $this->redirect('/member/memberRegistration');
            }
            $this->selectedPackage = $selectedPackage;
            $this->amountNeeded = $packageTotalInvested;

            $mlm_distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $this->distributor = $mlm_distributor;
            $this->sponsorId = $mlm_distributor->getDistributorCode();
            $this->sponsorName = $mlm_distributor->getFullName();
            $this->ePointPaid = $this->getRequestParameter('ePointPaid');
            $this->eCashPaid = $this->getRequestParameter('eCashPaid');
            $this->promoPaid = $this->getRequestParameter('promoPaid');
        } else {
            return $this->redirect('/member/memberRegistration');
        }
    }

    public function executeRegisterInfo()
    {
        if (!$this->getUser()->hasAttribute(Globals::SESSION_USERNAME)) {
            return $this->redirect('/member/register');
        }
    }

    public function executeUpdateProfile()
    {
        $mlm_distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if (!$mlm_distributor)
            return $this->redirect('/home/logout');

        //$mlm_distributor->setNickname($this->getRequestParameter('nickName'));
        //$mlm_distributor->setFullName($this->getRequestParameter('fullname'));
        if ($mlm_distributor->getIc() == "") {
            $mlm_distributor->setIc($this->getRequestParameter('nric'));
        }

        if ($this->getRequestParameter('country') == 'China') {
            $mlm_distributor->setCountry('China (PRC)');
        } else {
            $mlm_distributor->setCountry($this->getRequestParameter('country'));
        }
        $mlm_distributor->setAddress($this->getRequestParameter('address'));
        $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
        $mlm_distributor->setCity($this->getRequestParameter('city'));
        $mlm_distributor->setState($this->getRequestParameter('state'));
        $mlm_distributor->setPostcode($this->getRequestParameter('zip'));
        $mlm_distributor->setEmail($this->getRequestParameter('email'));
        $mlm_distributor->setAlternateEmail($this->getRequestParameter('alt_email'));
        $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
        $mlm_distributor->setGender($this->getRequestParameter('gender'));
        if ($this->getRequestParameter('dob')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
            $mlm_distributor->setDob("$y-$m-$d");
        }
        //$mlm_distributor->setBankName($this->getRequestParameter('bankName'));
        //$mlm_distributor->setBankAccNo($this->getRequestParameter('bankNo'));
        //$mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolder'));
        $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->save();

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Profile update successfully"));

        return $this->redirect('/member/viewProfile');
    }

    public function executeUpdateBankInformation()
    {
        $mlm_distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($mlm_distributor);

        $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
        $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccNo'));
        $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));
        $mlm_distributor->setBankSwiftCode($this->getRequestParameter('bankSwiftCode'));
        $mlm_distributor->setVisaDebitCard($this->getRequestParameter('visaDebitCard'));
        $mlm_distributor->setBankAddress($this->getRequestParameter('bankState'));
        $mlm_distributor->setBankBranch($this->getRequestParameter('bankBranch'));
        $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->save();

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Bank Account Information update successfully"));

        //return $this->redirect('/member/viewBankInformation');
        return $this->redirect('/member/viewProfile');
    }

    public function executeDoRegister()
    {
        require_once('recaptchalib.php');
        $privatekey = "6LfhJtYSAAAAALocUxn6PpgfoWCFjRquNFOSRFdb";
        $resp = recaptcha_check_answer ($privatekey,
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["recaptcha_challenge_field"],
                                    $_POST["recaptcha_response_field"]);

        if (!$resp->is_valid) {
            $this->setFlash('errorMsg', "The CAPTCHA wasn't entered correctly. Go back and try it again.");
            return $this->redirect('home/login');
        }

        //$fcode = $this->generateFcode($this->getRequestParameter('country'));
        $fcode = $this->getRequestParameter('userName');
        $password = $this->getRequestParameter('userpassword');

        $c = new Criteria();
        $c->add(AppUserPeer::USERNAME, $fcode);
        $exist = AppUserPeer::doSelectOne($c);
        //$this->forward404Unless(!$exist);
        $parentId = $this->getDistributorIdByCode($this->getRequestParameter('sponsorId'));
        $this->forward404Unless($parentId <> 0);

        //******************* upline distributor ID
        $uplineDistDB = $this->getDistributorInformation($this->getRequestParameter('sponsorId'));
        $this->forward404Unless($uplineDistDB);

        $treeStructure = $uplineDistDB->getTreeStructure() . "|" . $fcode . "|";
        $treeLevel = $uplineDistDB->getTreeLevel() + 1;

        $app_user = new AppUser();
        $app_user->setUsername($fcode);
        $app_user->setKeepPassword($password);
        $app_user->setUserpassword($password);
        $app_user->setKeepPassword2($password);
        $app_user->setUserpassword2($password);
        $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
        $app_user->setStatusCode(Globals::STATUS_PENDING);
        $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $app_user->save();

        // ****************************
        $mlm_distributor = new MlmDistributor();
        $mlm_distributor->setDistributorCode($fcode);
        $mlm_distributor->setUserId($app_user->getUserId());
        $mlm_distributor->setStatusCode(Globals::STATUS_PENDING);
        $mlm_distributor->setFullName($this->getRequestParameter('fullname'));
        $mlm_distributor->setNickname($fcode);
        $mlm_distributor->setIc($this->getRequestParameter('ic'));
        if ($this->getRequestParameter('country') == 'China') {
            $mlm_distributor->setCountry('China (PRC)');
        } else {
            $mlm_distributor->setCountry($this->getRequestParameter('country'));
        }
        $mlm_distributor->setAddress($this->getRequestParameter('address'));
        $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
        $mlm_distributor->setCity($this->getRequestParameter('city'));
        $mlm_distributor->setState($this->getRequestParameter('state'));
        $mlm_distributor->setPostcode($this->getRequestParameter('zip'));
        $mlm_distributor->setEmail($this->getRequestParameter('email'));
        $mlm_distributor->setAlternateEmail($this->getRequestParameter('alt_email'));
        $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
        $mlm_distributor->setGender($this->getRequestParameter('gender'));
        if ($this->getRequestParameter('dob')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
            $mlm_distributor->setDob("$y-$m-$d");
        }
        $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
        $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccountNo'));
        $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));

        $mlm_distributor->setTreeLevel($treeLevel);
        $mlm_distributor->setTreeStructure($treeStructure);
        $mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
        $mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

        $mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
        $mlm_distributor->setSpread($this->getRequestParameter('spread'));
        $mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
        $mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
        $mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
        $mlm_distributor->setSignDate(date("Y/m/d h:i:s A"));
        $mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));

        if ($this->getRequestParameter('productCode') == "fxgold") {
            $mlm_distributor->setProductMte("Y");
        }
        if ($this->getRequestParameter('productCode') == "mte") {
            $mlm_distributor->setProductFxgold("Y");
        }

        $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->save();

        $this->getUser()->setAttribute(Globals::SESSION_USERNAME, $fcode);

        /****************************/
        /*****  Send email **********/
        /****************************/
        /*error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');

        $subject = $this->getContext()->getI18N()->__("Vital Universe Group Registration email notification", null, 'email');
        $body = $this->getContext()->getI18N()->__("Dear %1%", array('%1%' => $mlm_distributor->getNickname()), 'email') . ",<p><p>

        <p>" . $this->getContext()->getI18N()->__("Your registration request has been successfully sent to Vital Universe Group", null, 'email') . "</p>
        <p><b>" . $this->getContext()->getI18N()->__("Trader ID", null) . ": " . $fcode . "</b>
        <p><b>" . $this->getContext()->getI18N()->__("Password", null) . ": " . $password . "</b>";

        $mail = new PHPMailer();
        $mail->IsMail(); // telling the class to use SMTP
        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->Sender = Mails::EMAIL_FROM_NOREPLY;
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet="utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($mlm_distributor->getEmail(), $mlm_distributor->getNickname());
        $mail->AddBCC("r9projecthost@gmail.com", "jason");

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }*/
        return $this->redirect('/member/registerInfo');
    }

    public function executeDoMemberRegistration()
    {
        $userName = $this->getRequestParameter('userName','');
        $password = $this->getRequestParameter('userpassword');
        $password2 = $this->getRequestParameter('securityPassword');
        $packageId = $this->getRequestParameter('packageId');
        $ePointPaid = $this->getRequestParameter('ePointPaid');
        //$eCashPaid = $this->getRequestParameter('eCashPaid');
        $promoPaid = $this->getRequestParameter('promoPaid');
        $amountPaid = $ePointPaid + $promoPaid;

        $userName = trim($userName);
        //$fcode = $this->generateFcode($this->getRequestParameter('country'));
        if ($userName == '') {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid action."));
            return $this->redirect('/member/memberRegistration');
        }
        $userName = strtoupper($userName);
//            $userName = $this->generateFcode();

        $c = new Criteria();
        $c->add(AppUserPeer::USERNAME, $userName);
        $exist = AppUserPeer::doSelectOne($c);

        if ($exist) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("User Name already exist."));
            return $this->redirect('/member/memberRegistration');
        }

        $packageDB = MlmPackagePeer::retrieveByPK($packageId);

        //$this->setFlash('warningMsg', $this->getContext()->getI18N()->__("Temporary out of service."));
        //return $this->redirect('/member/memberRegistration');

        if (!$packageDB) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/memberRegistration');
        }
        $amountNeeded = $packageDB->getPrice();
        $sponsorAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $sponsorEcashBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $sponsorPromoBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);

        if ($this->getUser()->getAttribute(Globals::SESSION_MASTER_LOGIN) == Globals::TRUE && $this->getUser()->getAttribute(Globals::SESSION_DISTID) == Globals::LOAN_ACCOUNT_CREATOR_DIST_ID) {

        } else {
            if ($amountNeeded != $amountPaid) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("The total funds is not match with package price"));
                return $this->redirect('/member/memberRegistration');
            }
            if (($ePointPaid + Globals::REGISTER_FEE) > $sponsorAccountBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to purchase package"));
                return $this->redirect('/member/memberRegistration');
            }
            if ($ePointPaid > $sponsorAccountBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to purchase package"));
                return $this->redirect('/member/memberRegistration');
            }
            /*if ($eCashPaid > $sponsorEcashBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to purchase package"));
                return $this->redirect('/member/memberRegistration');
            }*/
            if ($promoPaid > $sponsorPromoBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to purchase package"));
                return $this->redirect('/member/memberRegistration');
            }
            if (($amountNeeded * 0.3) > $ePointPaid) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Minimum RP required is ") . ($amountNeeded * 0.3));
                return $this->redirect('/member/memberRegistration');
            }
        }

        $con = Propel::getConnection(MlmDistributorPeer::DATABASE_NAME);
        try {
            $con->begin();
            //******************* upline distributor ID
            $uplineDistCode = $this->getRequestParameter('sponsorId');

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $uplineDistCode);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|".$this->getUser()->getAttribute(Globals::SESSION_DISTID)."|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $uplineDistDB = MlmDistributorPeer::doSelectOne($c);
            //var_dump($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            //var_dump($uplineDistCode);
            //var_dump($uplineDistDB);
            //exit();
            if (!$uplineDistDB) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Referrer ID"));
                return $this->redirect('/member/memberRegistration');
            }

            $uplineDistId = $uplineDistDB->getDistributorId();
            $treeLevel = $uplineDistDB->getTreeLevel() + 1;

            //$password = $this->generateFcode();
            //$password2 = $this->generateFcode();
            $app_user = new AppUser();
            $app_user->setUsername($userName);
            $app_user->setKeepPassword($password);
            $app_user->setUserpassword($password);
            $app_user->setKeepPassword2($password2);
            $app_user->setUserpassword2($password2);
            $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
            $app_user->setStatusCode(Globals::STATUS_ACTIVE);
            $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->save();

            // ****************************
            $mlm_distributor = new MlmDistributor();
            $mlm_distributor->setDistributorCode($userName);
            $mlm_distributor->setUserId($app_user->getUserId());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);

            $fullName = trim($this->getRequestParameter('fullname'));
            $fullName = strtoupper($fullName);

            $mlm_distributor->setFullName($fullName);
            $mlm_distributor->setNickname($userName);
            $mlm_distributor->setIc($this->getRequestParameter('nric'));
            if ($this->getRequestParameter('country') == 'China') {
                $mlm_distributor->setCountry('China (PRC)');
            } else {
                $mlm_distributor->setCountry($this->getRequestParameter('country'));
            }
            $mlm_distributor->setAddress($this->getRequestParameter('address'));
            $mlm_distributor->setAddress2($this->getRequestParameter('address2'));
            $mlm_distributor->setCity($this->getRequestParameter('city'));
            $mlm_distributor->setState($this->getRequestParameter('state'));
            $mlm_distributor->setPostcode($this->getRequestParameter('zip'));
            $mlm_distributor->setEmail($this->getRequestParameter('email'));
            $mlm_distributor->setAlternateEmail($this->getRequestParameter('alt_email'));
            $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
            $mlm_distributor->setGender($this->getRequestParameter('gender'));
            if ($this->getRequestParameter('dob')) {
                list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
                $mlm_distributor->setDob("$y-$m-$d");
            }
            $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
            $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccountNo'));
            $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));

            $mlm_distributor->setTreeLevel($treeLevel);
            $mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
            $mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

            $mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
            $mlm_distributor->setSpread($this->getRequestParameter('spread'));
            $mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
            $mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
            $mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
            $mlm_distributor->setSignDate(date("Y/m/d h:i:s A"));
            $mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));

            $mlm_distributor->setRankId($packageDB->getPackageId());
            $mlm_distributor->setRankCode($packageDB->getPackageName());
            $mlm_distributor->setMt4RankId($packageDB->getPackageId());
            $mlm_distributor->setInitRankId($packageDB->getPackageId());
            $mlm_distributor->setInitRankCode($packageDB->getPackageName());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
            if ($this->getUser()->getAttribute(Globals::SESSION_MASTER_LOGIN) == Globals::TRUE && $this->getUser()->getAttribute(Globals::SESSION_DISTID) == Globals::LOAN_ACCOUNT_CREATOR_DIST_ID) {
                $mlm_distributor->setPackagePurchaseFlag("N");
                $mlm_distributor->setRemark("loan account");
                $mlm_distributor->setLoanAccount("Y");
            } else {
                $mlm_distributor->setPackagePurchaseFlag("Y");
            }
            $mlm_distributor->setActiveDatetime(date("Y/m/d h:i:s A"));
            $mlm_distributor->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));

            if ($this->getRequestParameter('productCode') == "fxgold") {
                $mlm_distributor->setProductMte("Y");
            }
            if ($this->getRequestParameter('productCode') == "mte") {
                $mlm_distributor->setProductFxgold("Y");
            }

            $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->save();

            $treeStructure = $uplineDistDB->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            $mlm_distributor->setTreeStructure($treeStructure);
            $mlm_distributor->setRegisterRemark($this->getRequestParameter('registerRemark'));
            $mlm_distributor->save();

            $sponsorId = $mlm_distributor->getDistributorId();
            /**************************************/
            /*  Direct REFERRAL Bonus For Upline
            /**************************************/
            $packagePrice = $amountNeeded;
            $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
            $directSponsorPercentage = 0;

            if ($uplineDistDB->getIsIb() == Globals::YES) {
                $directSponsorPercentage = $uplineDistDB->getIbCommission();
            }

            if ($directSponsorPercentage < $uplineDistPackage->getCommission()) {
                $directSponsorPercentage = $uplineDistPackage->getCommission();
            }

            $directSponsorBonusAmount = $directSponsorPercentage * $packagePrice / 100;

            $totalBonusPayOut = $directSponsorPercentage;

            $this->doSaveAccount($sponsorId, Globals::ACCOUNT_TYPE_ECASH, 0, 0, Globals::ACCOUNT_LEDGER_ACTION_REGISTER, "");
            $this->doSaveAccount($sponsorId, Globals::ACCOUNT_TYPE_EPOINT, 0, 0, Globals::ACCOUNT_LEDGER_ACTION_REGISTER, "");

            /* ****************************************************
             * Update upline distributor account
             * ***************************************************/
             //$sponsorAccountBalance = $sponsorAccountBalance - $packagePrice;
            if ($this->getUser()->getAttribute(Globals::SESSION_MASTER_LOGIN) == Globals::TRUE && $this->getUser()->getAttribute(Globals::SESSION_DISTID) == Globals::LOAN_ACCOUNT_CREATOR_DIST_ID) {

            } else {
                // ******       Account ledger      ****************
                $tbl_account_ledger = new MlmAccountLedger();
                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                $tbl_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().") - ".$mlm_distributor->getDistributorCode());
                $tbl_account_ledger->setCredit(0);
                $tbl_account_ledger->setDebit($ePointPaid);
                $tbl_account_ledger->setBalance($sponsorAccountBalance - $ePointPaid);
                $tbl_account_ledger->setRefId($sponsorId);
                $tbl_account_ledger->setRefType("DISTRIBUTOR");
                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->save();

                /*if (Globals::REGISTER_FEE > 0) {
                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER_FEE);
                    $tbl_account_ledger->setRemark("PACKAGE PURCHASE (" . $packageDB->getPackageName() . ") - " . $mlm_distributor->getDistributorCode());
                    $tbl_account_ledger->setCredit(0);
                    $tbl_account_ledger->setDebit(Globals::REGISTER_FEE);
                    $tbl_account_ledger->setBalance($sponsorAccountBalance - $ePointPaid - Globals::REGISTER_FEE);
                    $tbl_account_ledger->setRefId($sponsorId);
                    $tbl_account_ledger->setRefType("DISTRIBUTOR");
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();
                }*/

                /*if ($eCashPaid > 0) {
                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                    $tbl_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().") - ".$mlm_distributor->getDistributorCode());
                    $tbl_account_ledger->setCredit(0);
                    $tbl_account_ledger->setDebit($eCashPaid);
                    $tbl_account_ledger->setBalance($sponsorEcashBalance - $eCashPaid);
                    $tbl_account_ledger->setRefId($sponsorId);
                    $tbl_account_ledger->setRefType("DISTRIBUTOR");
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();
                }*/

                if ($promoPaid > 0) {
                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
                    $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                    $tbl_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().") - ".$mlm_distributor->getDistributorCode());
                    $tbl_account_ledger->setCredit(0);
                    $tbl_account_ledger->setDebit($promoPaid);
                    $tbl_account_ledger->setBalance($sponsorPromoBalance - $promoPaid);
                    $tbl_account_ledger->setRefId($sponsorId);
                    $tbl_account_ledger->setRefType("DISTRIBUTOR");
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();
                }

                /******************************/
                /*  Direct Sponsor Bonus
                /******************************/
                $firstForDRB = true;
                while ($totalBonusPayOut <= Globals::TOTAL_BONUS_PAYOUT) {
                    if ($uplineDistId == null || $uplineDistId == "") {
                        break;
                    }
                    $distAccountEcashBalance = $this->getAccountBalance($uplineDistId, Globals::ACCOUNT_TYPE_ECASH);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($uplineDistId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
                    $mlm_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().") ".$directSponsorPercentage."% (" . $mlm_distributor->getDistributorCode() . ")");
                    $mlm_account_ledger->setCredit($directSponsorBonusAmount);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($distAccountEcashBalance + $directSponsorBonusAmount);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    /******************************/
                    /*  Commission
                    /******************************/
                    $c = new Criteria();
                    $c->add(MlmDistCommissionLedgerPeer::DIST_ID, $uplineDistId);
                    $c->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, Globals::COMMISSION_TYPE_DRB);
                    $c->addDescendingOrderByColumn(MlmDistCommissionLedgerPeer::CREATED_ON);
                    $sponsorDistCommissionLedgerDB = MlmDistCommissionLedgerPeer::doSelectOne($c);

                    $dsbBalance = 0;
                    if ($sponsorDistCommissionLedgerDB)
                        $dsbBalance = $sponsorDistCommissionLedgerDB->getBalance();

                    $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                    $sponsorDistCommissionledger->setDistId($uplineDistId);
                    $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
                    $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_REGISTER);
                    $sponsorDistCommissionledger->setCredit($directSponsorBonusAmount);
                    $sponsorDistCommissionledger->setDebit(0);
                    $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                    $sponsorDistCommissionledger->setBalance($dsbBalance + $directSponsorBonusAmount);
                    if ($firstForDRB == true) {
                        $sponsorDistCommissionledger->setRemark("DRB FOR PACKAGE PURCHASE ".$directSponsorPercentage."% (".$packageDB->getPackageName().") for ".$mlm_distributor->getDistributorCode());
                        $firstForDRB = false;
                    } else {
                        $sponsorDistCommissionledger->setRemark("GRB FOR PACKAGE PURCHASE ".$directSponsorPercentage."% (".$packageDB->getPackageName().") for ".$mlm_distributor->getDistributorCode());
                    }
                    $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->save();

                    break;
                    /*if ($totalBonusPayOut < Globals::TOTAL_BONUS_PAYOUT) {

                        if ($uplineDistDB->getUplineDistId() == null)
                            break;

                        $checkCommission = true;
                        $uplineDistId = $uplineDistDB->getUplineDistId();
                        while ($checkCommission == true) {
                            $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);

                            if (!$uplineDistDB) {
                                break;
                            }
                            //print_r("totalBonusPayOut:".$totalBonusPayOut."<br>");
                            //print_r("$uplineDistId:".$uplineDistId."<br>");
                            //print_r("getIsIb:".$uplineDistDB->getIsIb()."<br>");
                            $directSponsorPercentage = 0;
                            if ($uplineDistDB->getIsIb() == Globals::YES) {
                                $directSponsorPercentage = $uplineDistDB->getIbCommission();
                            }
                            $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());

                            if ($directSponsorPercentage < $uplineDistPackage->getCommission()) {
                                $directSponsorPercentage = $uplineDistPackage->getCommission();
                            }

                            if ($directSponsorPercentage > $totalBonusPayOut) {
                                $directSponsorPercentage = $directSponsorPercentage - $totalBonusPayOut;
                                $totalBonusPayOut += $directSponsorPercentage;
                                if ($totalBonusPayOut > Globals::TOTAL_BONUS_PAYOUT) {
                                    $directSponsorPercentage = $directSponsorPercentage - ($totalBonusPayOut - Globals::TOTAL_BONUS_PAYOUT);
                                }
                            } else {
                                if ($uplineDistDB->getUplineDistId() == null)
                                    break;
                                $uplineDistId = $uplineDistDB->getUplineDistId();
                                continue;
                            }

                            $directSponsorBonusAmount = $directSponsorPercentage * $packageDB->getPrice() / 100;
                            $checkCommission == false;
                            break;
                        }
                    } else {
                        break;
                    }*/
                }
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        /****************************/
        /*****  Send email **********/
        /****************************/
        $receiverEmail = $this->getRequestParameter('email', $mlm_distributor->getEmail());
        $receiverFullname = $this->getRequestParameter('fullname', $mlm_distributor->getFullName());
        $subject = "FX-CMISC - Thank you for your registration";

        $body = "<table width='100%' cellspacing='0' cellpadding='0' border='0' bgcolor='#fff' align='center'>
	<tbody>
		<tr>
			<td style='padding:20px 0px'>
				<table width='606' cellspacing='0' cellpadding='0' align='center' style='background:white;font-family:Arial,Helvetica,sans-serif;border: 1px rgb(0, 128, 200) solid;padding: 10px;border-radius:10px;-webkit-border-radius:10px;-moz-border-radius:10px;'>
					<tbody>
						<tr>
							<td colspan='2' style='text-align:center;'>
								<a target='_blank' href='#'><img height='41' border='0' src='http://partner.fxcmisc.com/images/logo.png' alt='FX CMISC'></a></td>
						</tr>

						<tr>
							<td colspan='2'>
								<table cellspacing='0' cellpadding='10' border='0'>
									<tbody>
										<tr>
											<td colspan='2'>
												<table>
													<tbody>
														<tr>
															<td valign='top' style='padding-top:15px;padding-left:10px'>
															    <table cellpadding='5' cellspacing='1'>
															        <tr><td>Full Name:</td><td>" . $receiverFullname . "</td></tr>
															        <tr><td>Username:</td><td>" . $userName . "</td></tr>
															        <tr><td>Password:</td><td>" . $password . "</td></tr>
															        <tr><td>Security Password:</td><td>" . $password2 . "</td></tr>
															        <tr><td>Email:</td><td>" . $this->getRequestParameter('email') . "</td></tr>
															        <tr><td>Contact Number:</td><td>" . $this->getRequestParameter('contactNumber') . "</td></tr>
															        <tr><td>Country:</td><td>" . $this->getRequestParameter('country') . "</td></tr>
															        <tr><td>Package:</td><td>" . $packageDB->getPackageName(). " (USD".number_format($packageDB->getPrice(),0).")</td></tr>
															    </table>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>

						<tr>
							<td width='606'>
							<img src='http://partner.fxcmisc.com/images/transparent.gif' height='1'>
							</td>
						</tr>


						<tr>
							<td width='606'>
							<img src='http://partner.fxcmisc.com/images/transparent.gif' height='1'>
							</td>
						</tr>
						<tr>
							<td width='606' style='font-size:0;line-height:0' colspan='2'>
								<img src='http://partner.fxcmisc.com/images/transparent.gif' height='10'>
							</td>
						</tr>

						<tr>
							<td width='606' style='padding:15px 15px 0px;color:rgb(153,153,153);font-size:11px' colspan='2' align='right'>
							<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
								<em>
									Best Regards,<br>
									<strong>FX CMISC Account Opening Team</strong><br>
								</em>
							</font>
							<br>
						</tr>

						<tr>
							<td width='606' style='font-size:0;line-height:0' bgcolor='#0080C8'>
							<img src='http://partner.fxcmisc.com/images/transparent.gif' height='1'>
							</td>
						</tr>

						<tr>
							<td width='606' style='padding:5px 15px 20px;color:rgb(153,153,153);font-size:11px' colspan='2'>
							<p align='justify'>
								<font face='Arial, Verdana, sans-serif' size='3' color='#666666' style='font-size:10px;line-height:15px'>
									CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of FX CMISC, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
								</font>
							</p>
						</tr>
					</tbody>
				</table>
			</td>
		</tr>
	</tbody>
</table>";

        $sendMailService = new SendMailService();
        $sendMailService->sendMail($receiverEmail, $receiverFullname, $subject, $body);

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Member ". $userName ." Registered Successfully."));
        return $this->redirect('/member/memberRegistration');
    }

    // **********************************************************************************************
    // *****************************         For broker registeration          **********************
    // **********************************************************************************************
    function generateFcode()
    {
        /*$max_digit = 999999;
        $digit = 6;

        $fcode = rand(0, $max_digit) . "";
        $fcode = str_pad($fcode, $digit, "0", STR_PAD_LEFT);

        return $fcode;*/

        $max_digit = 99999999;
        $digit = 12;
        $fcode = 0;
        while (true) {
            $fcode = rand(10000000, $max_digit) . "";
            //$fcode = str_pad($fcode, $digit, "0", STR_PAD_LEFT);
            /*
            for ($x=0; $x < ($digit - strlen($fcode)); $x++) {
                $fcode = "0".$fcode;
            }
			*/
            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $fcode);
            $existCode = AppUserPeer::doSelectOne($c);

            if (!$existCode) {
                break;
            }
        }
        return $fcode;
    }

    // **********************************************************************************************
    // *******************   ~ end      For broker registeration       end ~   **********************
    // **********************************************************************************************

    public function executeVerifySameGroupSponsorId()
    {
        //var_dump($this->getUser()->getAttribute(Globals::SESSION_USERNAME));
        $sponsorId = $this->getRequestParameter('sponsorId');
        //var_dump($sponsorId);

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
        $existDist = MlmDistributorPeer::doSelectOne($c);

        $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
        $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        $arr = "";
        if (!$existUser && $existDist) {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $existDist->getDistributorId() . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = MlmDistributorPeer::doSelectOne($c);

            if ($existUser) {
                $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
                $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
                $existUser = MlmDistributorPeer::doSelectOne($c);
            }
        }

        if ($existUser) {
            //if ($existUser->getDistributorId() <> $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
            $arr = array(
                'userId' => $existUser->getDistributorId(),
                'userName' => $existUser->getDistributorCode(),
                'fullname' => $existUser->getFullName(),
                'nickname' => $existUser->getNickname()
            );
            //}
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeVerifySponsorId()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');

        $arr = "";
        if ($sponsorId != "") {
            $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|".$this->getUser()->getAttribute(Globals::SESSION_DISTID)."|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = MlmDistributorPeer::doSelectOne($c);

            if ($existUser) {
                //if ($existUser->getDistributorId() <> $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
                $arr = array(
                    'userId' => $existUser->getDistributorId(),
                    'userName' => $existUser->getDistributorCode(),
                    'fullname' => $existUser->getFullName(),
                    'nickname' => $existUser->getNickname()
                );
                //}
            }
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    function generatePaymentReference()
    {
        $max_digit = 9999999999;
        $digit = 12;

        while (true) {
            $fcode = rand(1000000000, $max_digit) . "";
            //$fcode = str_pad($fcode, $digit, "0", STR_PAD_LEFT);
            /*
            for ($x=0; $x < ($digit - strlen($fcode)); $x++) {
                $fcode = "0".$fcode;
            }
			*/
            $c = new Criteria();
            $c->add(MlmDistEpointPurchasePeer::PAYMENT_REFERENCE, $fcode);
            $existCode = MlmDistEpointPurchasePeer::doSelectOne($c);

            if (!$existCode) {
                break;
            }
        }
        return $fcode;
    }

    public function executeVerifyActiveSponsorId()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');

        //$array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        $arr = "";
        if ($existUser) {
            //if ($existUser->getDistributorId() <> $this->getUser()->getAttribute(Globals::SESSION_DISTID)) {
            $arr = array(
                'userId' => $existUser->getDistributorId(),
                'userName' => $existUser->getDistributorCode(),
                'fullname' => $existUser->getFullName(),
                'nickname' => $existUser->getNickname()
            );
            //}
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeFetchPackage()
    {
        $account = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $ecashAccount = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);

        $arr = array(
            'packageId' => 0,
            'point' => 0,
            'ecash' => 0,
            'package' => ""
        );
        if (($account) && ($ecashAccount)) {
            $max = $ecashAccount->getBalance();

            if ($account->getBalance() > $ecashAccount->getBalance())
                $max = $account->getBalance();

            $c = new Criteria();
            //$c->add(MlmPackagePeer::PRICE, $max, Criteria::LESS_EQUAL);
            if ($this->getRequestParameter('publicPurchase') == "") {
                $c->add(MlmPackagePeer::PUBLIC_PURCHASE, Globals::YES);
            } else {
                $c->add(MlmPackagePeer::PUBLIC_PURCHASE, $this->getRequestParameter('publicPurchase'));
            }

            $c->addDescendingOrderByColumn(MlmPackagePeer::PRICE);

            $packages = MlmPackagePeer::doSelect($c);

            $packageArray = array();
            $count = 0;
            foreach ($packages as $package) {
                $packageArray[$count]["packageId"] = $package->getPackageId();
                $packageArray[$count]["name"] = $this->getContext()->getI18N()->__($package->getPackageName());
                $packageArray[$count]["price"] = $package->getPrice();
                $count++;
            }

            $arr = array(
                'point' => $account->getBalance(),
                'ecash' => $ecashAccount->getBalance(),
                'package' => $packageArray
            );
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeFetchTopupPackage()
    {
        $account = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $ecashAccount = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($distDB);

        $distPackage = MlmPackagePeer::retrieveByPK($distDB->getRankId());
        $currentPackageAmount = $distPackage->getPrice();

        if ($currentPackageAmount == null)
            $currentPackageAmount = 99999999;

        $arr = array(
            'packageId' => 0,
            'point' => 0,
            'ecash' => 0,
            'package' => ""
        );
        if (($account) && ($ecashAccount)) {
            $totalEcash = $ecashAccount->getBalance() + $currentPackageAmount;
            $totalEpoint = $account->getBalance() + $currentPackageAmount;

            $max = $totalEcash;

            if ($totalEpoint > $totalEcash)
                $max = $totalEpoint;

            $c = new Criteria();
            $c->add(MlmPackagePeer::PRICE, $max, Criteria::LESS_EQUAL);
            $c->addAnd(MlmPackagePeer::PRICE, $currentPackageAmount, Criteria::GREATER_THAN);
            $c->addAnd(MlmPackagePeer::PRICE, null, Criteria::ISNOTNULL);

            if ($this->getRequestParameter('publicPurchase') == "") {
                $c->add(MlmPackagePeer::PUBLIC_PURCHASE, Globals::YES);
            } else {
                $c->add(MlmPackagePeer::PUBLIC_PURCHASE, $this->getRequestParameter('publicPurchase'));
            }

            $c->addDescendingOrderByColumn(MlmPackagePeer::PRICE);

            $packages = MlmPackagePeer::doSelect($c);

            $packageArray = array();
            $count = 0;
            foreach ($packages as $package) {
                $packageArray[$count]["packageId"] = $package->getPackageId();
                $packageArray[$count]["name"] = $this->getContext()->getI18N()->__($package->getPackageName());
                $packageArray[$count]["price"] = $package->getPrice() - $currentPackageAmount;
                $count++;
            }

            $arr = array(
                'point' => $totalEpoint,
                'ecash' => $totalEcash,
                'package' => $packageArray
            );
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeSummary()
    {
        $c = new Criteria();
        $c->add(MlmAnnouncementPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->addDescendingOrderByColumn(MlmAnnouncementPeer::CREATED_ON);
        $c->setLimit(5);
        $this->announcements = MlmAnnouncementPeer::doSelect($c);

        $distributor = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if (!$distributor)
            return $this->redirect('/home/logout');

        $ecash = 0;
        $epoint = 0;
        $fxcmiscc = 0;
        $promo = 0;
        $passiveWallet = 0;
        $totalNetworks = 0;
        $distMt4s = null;
        $ranking = "";
        $mt4Ranking = "";
        $currencyCode = "";

        $c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_SYSTEM_CURRENCY);
        $settingDB = AppSettingPeer::doSelectOne($c);
        if ($settingDB) {
            $currencyCode = $settingDB->getSettingValue();
        }
        if ($distributor) {
            $existUser = AppUserPeer::retrieveByPK($distributor->getUserId());

            if ($existUser) {
                $lastLogin = $existUser->getLastLoginDatetime();
            }

            $ecash = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);
            $epoint = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);
            $fxcmiscc = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_FXCMISCC);
            $passiveWallet = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_CP4);
            $promo = $this->getAccountBalance($distributor->getDistributorId(), Globals::ACCOUNT_TYPE_PROMO);

            $packageDB = MlmPackagePeer::retrieveByPK($distributor->getRankId());
            if ($packageDB) {
                $ranking = $packageDB->getPackageName();
            }
            $packageDB = MlmPackagePeer::retrieveByPK($distributor->getMt4RankId());
            if ($packageDB) {
                $mt4Ranking = $packageDB->getPackageName();
            }

            $c = new Criteria();
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|".$distributor->getDistributorId()."|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $totalNetworks = MlmDistributorPeer::doCount($c);

            if ($distributor->getDistributorId() == 2) {
                $totalNetworks = $totalNetworks + 2000;
            } else if ($distributor->getDistributorId() == 14) {
                $totalNetworks = $totalNetworks + 600;
            }

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::DIST_ID, $distributor->getDistributorId());
            $distMt4s = MlmDistMt4Peer::doSelect($c);
        }

        $this->distributor_code = $distributor->getDistributorCode();
        $this->email = $distributor->getEmail();
        $this->contact = $distributor->getContact();
        $this->country = $distributor->getCountry();
        $this->bankName = $distributor->getBankName();
        $this->bankHolderName = $distributor->getBankHolderName();
        $this->bankAccNo = $distributor->getBankAccNo();
        $this->promo = $promo;
        $this->ecash = $ecash;
        $this->epoint = $epoint;
        $this->totalNetworks = $totalNetworks;
        $this->ranking = $ranking;
        $this->mt4Ranking = $mt4Ranking;
        $this->colorArr = $this->getRankColorArr();
        $this->currencyCode = $currencyCode;
        $this->distributor = $distributor;
        $this->lastLogin = $lastLogin;
        $this->distMt4s = $distMt4s;
        $this->fxcmiscc = $fxcmiscc;
        $this->passiveWallet = $passiveWallet;
    }

    public function executeAnnouncementList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        /******   total records  *******/
        $c = new Criteria();
        $c->add(MlmAnnouncementPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $totalRecords = MlmAnnouncementPeer::doCount($c);

        /******   total filtered records  *******/
        /*if ($this->getRequestParameter('filterAction') != "") {
            $c->addAnd(MlmAnnouncementPeer::TRANSACTION_TYPE, "%" . $this->getRequestParameter('filterAction') . "%", Criteria::LIKE);
        }*/
        $totalFilteredRecords = MlmAnnouncementPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmAnnouncement', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $title = $result->getTitle();
            $createdOn = $result->getCreatedOn();

            if ($this->getUser()->getCulture() == "cn") {
                $title = $result->getTitleCn();
                $createdOn = $result->getCreatedOn();
            }
            $arr[] = array(
                $result->getAnnouncementId(),
                $title,
                $createdOn
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeBonusDetailList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        /******   total records  *******/
        $c = new Criteria();
        $c->add(MlmDistCommissionLedgerPeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        //$c->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, Globals::ACCOUNT_LEDGER_ACTION_DRB);
        $c->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, $this->getRequestParameter('filterBonusType'));
        $totalRecords = MlmDistCommissionLedgerPeer::doCount($c);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterMonth') != "" && $this->getRequestParameter('filterYear') != "") {
            $dateUtil = new DateUtil();
            $month = $this->getRequestParameter('filterMonth');
            $year = $this->getRequestParameter('filterYear');
            $d = $dateUtil->getMonth($month, $year);

            $firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
            $lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

            $c->add(MlmDistCommissionLedgerPeer::CREATED_ON, $firstOfMonth, Criteria::GREATER_EQUAL);
            $c->addAnd(MlmDistCommissionLedgerPeer::CREATED_ON, $lastOfMonth, Criteria::LESS_EQUAL);
        }

        $totalFilteredRecords = MlmDistCommissionLedgerPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmDistCommissionLedger', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $extraRemark = "";
            if (Globals::STATUS_COMPLETE == $result->getStatusCode()) {
                $dateString = $result->getUpdatedOn();
                $dateArr = explode(" ", $dateString);
                $extraRemark = "Successful credited into MT4 Fund (".$dateArr[0].")";
            }
            $arr[] = array(
                $result->getCommissionId() == null ? "0" : $result->getCommissionId(),
                $result->getCreatedOn() == null ? "" : $result->getCreatedOn(),
                $result->getCommissionType() == null ? ""
                        : $this->getContext()->getI18N()->__($result->getCommissionType()),
                $result->getCredit() == null ? "0" : number_format($result->getCredit(), 2),
                $result->getDebit() == null ? "0" : number_format($result->getDebit(), 2),
                $result->getRemark() == null ? "" : $result->getRemark(),
                $extraRemark
            );
        }

        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeDelete()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_PENDING);
        $c->addAnd(MlmDistributorPeer::DISTRIBUTOR_ID, $this->getRequestParameter('distid'));
        $mlmDistributor = MlmDistributorPeer::doSelectOne($c);
        if (!$mlmDistributor)
            return $this->redirect('/home/logout');

        $mlmDistributor->setStatusCode(Globals::STATUS_CANCEL);
        $mlmDistributor->save();

        $appUser = AppUserPeer::retrieveByPk($mlmDistributor->getUserId());
        if (!$appUser)
            return $this->redirect('/home/logout');
        $appUser->setStatusCode(Globals::STATUS_CANCEL);
        $appUser->save();

        return $this->redirect('/member/summary');
    }

    public function executeVerifyTransactionPassword()
    {
        $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
        $c = new Criteria();
        $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
        $c->add(AppUserPeer::USERPASSWORD2, $this->getRequestParameter('transactionPassword'));
        $c->add(AppUserPeer::USER_ROLE, Globals::ROLE_DISTRIBUTOR);
        //$c->add(AppUserPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(AppUserPeer::STATUS_CODE, $array, Criteria::IN);

        $existUser = AppUserPeer::doSelectOne($c);

        if ($existUser) {
            echo 'true';
        } else {
            echo 'false';
        }

        return sfView::HEADER_ONLY;
    }

    public function executeVerifyIB()
    {
        $c = new Criteria();
        $c->add(MlmIbPeer::IB_CODE, $this->getRequestParameter('reg_ib'));
        $c->add(MlmIbPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $exist = MlmIbPeer::doSelectOne($c);

        if ($exist) {
            echo 'true';
        } else {
            echo 'false';
        }

        return sfView::HEADER_ONLY;
    }

    public function executeActivateMember()
    {
        $memberId = $this->getRequestParameter('memberId');
        $doAction = $this->getRequestParameter('doAction');

        $error = false;
        $errorMsg = "";

        $c = new Criteria();
        $c->add(MlmIbPeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $c->add(MlmIbPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $mlmIb = MlmIbPeer::doSelectOne($c);

        if (!$mlmIb) {
            $this->setFlash('errorMsg', "You are not valid outlet");
            return $this->redirect('/member/activeMember');
        }

        $mpBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_MP);

        if ($mpBalance < Globals::BASIC_MEMBER_CHARGE) {
            $this->setFlash('errorMsg', "In-sufficient MP");
            return $this->redirect('/member/activeMember');
        }


        $distDB = MlmDistributorPeer::retrieveByPK($memberId);
        if (!$distDB) {
            $this->setFlash('errorMsg', "Invalid member ID");
            return $this->redirect('/member/activeMember');
        }

        $appUserDB = AppUserPeer::retrieveByPK($distDB->getUserId());
        if (!$appUserDB) {
            $this->setFlash('errorMsg', "Invalid User ID");
            return $this->redirect('/member/activeMember');
        }

        $con = Propel::getConnection(MlmDistributorPeer::DATABASE_NAME);
        try {
            $con->begin();

            if ("ACTIVE" == $doAction) {
                $appUserDB->setStatusCode(Globals::STATUS_ACTIVE);
                $distDB->setPackagePurchaseFlag("Y");
                $distDB->setActiveDatetime(date("Y/m/d h:i:s A"));
                $distDB->setStatusCode(Globals::STATUS_ACTIVE);

                $this->setFlash('successMsg', "Member activated Successfully.");
            } else if ("DELETE" == $doAction) {
                $appUserDB->setStatusCode(Globals::STATUS_CANCEL);
                $distDB->setStatusCode(Globals::STATUS_CANCEL);

                $this->setFlash('warningMsg', "Member deleted Successfully.");
            }
            $appUserDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $appUserDB->save();

            $distDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $distDB->save();

            if ("ACTIVE" == $doAction && $distDB->getUplineDistId() != null && $distDB->getUplineDistId() != "") {
                $uplineDist = MlmDistributorPeer::retrieveByPK($distDB->getUplineDistId());

                if ($uplineDist) {
                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($uplineDist->getDistributorId());
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_MP);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                    $mlm_account_ledger->setRemark("DRB FOR MEMBER SIGN UP (" . $distDB->getDistributorCode() . ")");
                    $mlm_account_ledger->setCredit(0);
                    $mlm_account_ledger->setDebit(Globals::BASIC_MEMBER_CHARGE);
                    $mlm_account_ledger->setBalance($mpBalance - Globals::BASIC_MEMBER_CHARGE);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    $uplineCommission = Globals::BASIC_MEMBER_CHARGE * 0.3;

                    $drbCommissionBalance = $this->getCommissionBalance($uplineDist->getDistributorId(), Globals::COMMISSION_TYPE_DRB);

                    $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                    $sponsorDistCommissionledger->setDistId($uplineDist->getDistributorId());
                    $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
                    $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_REGISTER);
                    $sponsorDistCommissionledger->setCredit($uplineCommission);
                    $sponsorDistCommissionledger->setDebit(0);
                    $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                    $sponsorDistCommissionledger->setBalance($drbCommissionBalance + $uplineCommission);
                    $sponsorDistCommissionledger->setRemark("DRB FOR MEMBER SIGN UP (" . $distDB->getDistributorCode() . ")");
                    $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->save();

                    $mgBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($uplineDist->getDistributorId());
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
                    $mlm_account_ledger->setRemark("DRB FOR MEMBER SIGN UP (" . $distDB->getDistributorCode() . ")");
                    $mlm_account_ledger->setCredit($uplineCommission);
                    $mlm_account_ledger->setDebit(0);
                    $mlm_account_ledger->setBalance($mgBalance + $uplineCommission);
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    /* ****************************************************
                    * card_mp_return
                    * ***************************************************/
                    $dateUtil = new DateUtil();
                    $currentDate = $dateUtil->formatDate("Y-m-d", $distDB->getActiveDatetime()) . " 00:00:00";
                    $currentDate_timestamp = strtotime($currentDate);
                    $dividendDate = strtotime("+1 months", $currentDate_timestamp);

                    $cardMpReturn = new CardMpReturn();
                    $cardMpReturn->setDistId($distDB->getDistributorId());
                    $cardMpReturn->setIdx(1);
                    $cardMpReturn->setReturnDate(date("Y-m-d h:i:s", $dividendDate));
                    $cardMpReturn->setFirstReturnDate(date("Y-m-d h:i:s", $dividendDate));
                    $cardMpReturn->setStatusCode(Globals::DIVIDEND_STATUS_PENDING);
                    $cardMpReturn->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $cardMpReturn->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $cardMpReturn->save();
                }
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        return $this->redirect('/member/activeMember');
    }

    public function executePlacementTree()
    {
        $c = new Criteria();
        //$c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        $this->packageDBs = MlmPackagePeer::doSelect($c);

        if ($this->getRequestParameter('doAction') == "save") {
            $uplineDistCode = $this->getRequestParameter('uplineDistCode');
            $uplinePosition = $this->getRequestParameter('uplinePosition');
            $sponsorDistId = $this->getRequestParameter('sponsorDistId');

            $uplineDistDB = $this->getDistributorInformation($uplineDistCode);
            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $sponsorDB = MlmDistributorPeer::retrieveByPk($sponsorDistId);
            $this->forward404Unless($distDB);
            $this->forward404Unless($sponsorDB);

            $treeStructure = $uplineDistDB->getPlacementTreeStructure() . "|" . $sponsorDB->getDistributorId() . "|";
            $treeLevel = $uplineDistDB->getPlacementTreeLevel() + 1;

            $sponsorDB->setPlacementDatetime(date("Y/m/d h:i:s A"));
            $sponsorDB->setPlacementPosition($uplinePosition);
            //$sponsorDB->setUplineDistId($uplineDistDB->getDistributorId());
            //$sponsorDB->setUplineDistCode($uplineDistDB->getDistributorCode());
            $sponsorDB->setPlacementTreeStructure($treeStructure);
            $sponsorDB->setPlacementTreeLevel($treeLevel);
            $sponsorDB->setTreeUplineDistId($uplineDistDB->getDistributorId());
            $sponsorDB->setTreeUplineDistCode($uplineDistDB->getDistributorCode());
            $sponsorDB->save();

            $sponsoredPackageDB = MlmPackagePeer::retrieveByPK($sponsorDB->getRankId());
            $this->forward404Unless($sponsoredPackageDB);
            $pairingPoint = $sponsoredPackageDB->getPrice();
            /*if ($sponsoredPackageDB->getPackageId() == Globals::MAX_PACKAGE_ID) {
                $pairingPoint = $amountNeeded;
            }*/
            // recalculate Total left and total right for $uplineDistDB
            $arrs = explode("|", $uplineDistDB->getPlacementTreeStructure());
            for ($x = count($arrs); $x > 0; $x--) {
                if ($arrs[$x] == "") {
                    continue;
                }
                $uplineDistDB = $this->getDistributorInformation($arrs[$x]);
                $this->forward404Unless($uplineDistDB);
                $totalLeft = $this->getTotalPosition($arrs[$x], Globals::PLACEMENT_LEFT);
                $totalRight = $this->getTotalPosition($arrs[$x], Globals::PLACEMENT_RIGHT);
                $uplineDistDB->setTotalLeft($totalLeft);
                $uplineDistDB->setTotalRight($totalRight);
                $uplineDistDB->save();
            }

            /******************************/
            /*  store Pairing points
            /******************************/
            if ($sponsorDB->getTreeUplineDistId() != 0 && $sponsorDB->getTreeUplineDistCode() != null) {
                $level = 0;
                $uplineDistDB = MlmDistributorPeer::retrieveByPk($sponsorDB->getTreeUplineDistId());
                $sponsoredDistributorCode = $sponsorDB->getDistributorCode();
                while ($level < 100) {
                    //var_dump($uplineDistDB->getUplineDistId());
                    //var_dump($uplineDistDB->getUplineDistCode());
                    //print_r("<br>");
                    $c = new Criteria();
                    $c->add(MlmDistPairingPeer::DIST_ID, $uplineDistDB->getDistributorId());
                    $sponsorDistPairingDB = MlmDistPairingPeer::doSelectOne($c);

                    $addToLeft = 0;
                    $addToRight = 0;
                    $leftBalance = 0;
                    $rightBalance = 0;
                    if (!$sponsorDistPairingDB) {
                        $sponsorDistPairingDB = new MlmDistPairing();
                        $sponsorDistPairingDB->setDistId($uplineDistDB->getDistributorId());

                        $packageDB = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
                        $this->forward404Unless($packageDB);

                        $sponsorDistPairingDB->setLeftBalance($leftBalance);
                        $sponsorDistPairingDB->setRightBalance($rightBalance);
                        $sponsorDistPairingDB->setFlushLimit($packageDB->getDailyMaxPairing());
                        $sponsorDistPairingDB->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    } else {
                        $leftBalance = $sponsorDistPairingDB->getLeftBalance();
                        $rightBalance = $sponsorDistPairingDB->getRightBalance();
                    }
                    $sponsorDistPairingDB->setLeftBalance($leftBalance + $addToLeft);
                    $sponsorDistPairingDB->setRightBalance($rightBalance + $addToRight);
                    $sponsorDistPairingDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistPairingDB->save();

                    $c = new Criteria();
                    $c->add(MlmDistPairingLedgerPeer::DIST_ID, $uplineDistDB->getDistributorId());
                    $c->add(MlmDistPairingLedgerPeer::LEFT_RIGHT, $uplinePosition);
                    $c->addDescendingOrderByColumn(MlmDistPairingLedgerPeer::CREATED_ON);
                    $sponsorDistPairingLedgerDB = MlmDistPairingLedgerPeer::doSelectOne($c);

                    $legBalance = 0;
                    if ($sponsorDistPairingLedgerDB) {
                        $legBalance = $sponsorDistPairingLedgerDB->getBalance();
                    }

                    $sponsorDistPairingledger = new MlmDistPairingLedger();
                    $sponsorDistPairingledger->setDistId($uplineDistDB->getDistributorId());
                    $sponsorDistPairingledger->setLeftRight($uplinePosition);
                    $sponsorDistPairingledger->setTransactionType(Globals::PAIRING_LEDGER_REGISTER);
                    $sponsorDistPairingledger->setCredit($pairingPoint);
                    $sponsorDistPairingledger->setDebit(0);
                    $sponsorDistPairingledger->setBalance($legBalance + $pairingPoint);
                    $sponsorDistPairingledger->setRemark("PAIRING POINT AMOUNT (" . $sponsoredDistributorCode . ")");
                    $sponsorDistPairingledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistPairingledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistPairingledger->save();

                    $this->revalidatePairing($uplineDistDB->getDistributorId(), $uplinePosition);

                    if ($uplineDistDB->getTreeUplineDistId() == 0 || $uplineDistDB->getTreeUplineDistCode() == null) {
                        break;
                    }

                    $uplinePosition = $uplineDistDB->getPlacementPosition();
                    $uplineDistDB = MlmDistributorPeer::retrieveByPk($uplineDistDB->getTreeUplineDistId());
                    $level++;
                }
            }
            /******************************/
            /*  Pairing             ~ END ~
            /******************************/
            return $this->redirect('/member/placementTree?distcode=' . $this->getRequestParameter('distcode', $this->getUser()->getAttribute(Globals::SESSION_USERNAME)));
        }
        $distcode = $this->getRequestParameter('distcode', $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
        $pageDirection = $this->getRequestParameter('p', "");

        $this->pageDirection = $pageDirection;
        $anode = array();
        //      0
        //  1       2
        //3   4   5   6

        // TO_HIDE_DIST_GROUP
        $hideDistGroup = false;
        $pos = strrpos(Globals::TO_HIDE_DIST_GROUP, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
        if ($pos === false) { // note: three equal signs

        } else {
            $hideDistGroup = true;
        }
        $this->hideDistGroup = $hideDistGroup;
        // TO_HIDE_DIST_GROUP end ~

        $c = new Criteria();
        $c1 = $c->getNewCriterion(MlmDistributorPeer::DISTRIBUTOR_CODE, $distcode);
        $c2 = $c->getNewCriterion(MlmDistributorPeer::NICKNAME, $distcode);
        $c1->addOr($c2);
        $c->add($c1);
        //$c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distcode);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
        $distDB = MlmDistributorPeer::doSelectOne($c);

        if (!$distDB) {
            $this->errorSearch = true;
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
            $distDB = MlmDistributorPeer::doSelectOne($c);
        }

        // TO_HIDE_DIST_GROUP
        if ($hideDistGroup) {
            $pos = strrpos($distDB->getPlacementTreeStructure(), Globals::HIDE_DIST_GROUP);
            if ($pos === false) { // note: three equal signs

            } else {
                $this->errorSearch = true;
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
                $distDB = MlmDistributorPeer::doSelectOne($c);
            }
        }
        // TO_HIDE_DIST_GROUP end ~

        $leftOnePlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
        $rightTwoPlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
        $anode[0]["distCode"] = $distDB->getDistributorCode();
        $anode[0]["_self"] = $distDB;
        $anode[0]["_left"] = $leftOnePlacement;
        $anode[0]["_right"] = $rightTwoPlacement;
        $anode[0]["_available"] = false;
        $anode[0]["_left_this_month_sales"] = $this->getThisMonthSales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
        $anode[0]["_right_this_month_sales"] = $this->getThisMonthSales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
        $anode[0]["_dist_pairing_ledger"] = $this->queryDistPairing($distDB->getDistributorId());
        $anode[0]["_accumulate_left"] = $this->getLegTotalMember($leftOnePlacement);
        $anode[0]["_accumulate_right"] = $this->getLegTotalMember($rightTwoPlacement);
        //        $anode[0]["_accumulate_left"] = $this->getAccumulateGroupBvs($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
        //        $anode[0]["_accumulate_right"] = $this->getAccumulateGroupBvs($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
        $anode[0]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
        $anode[0]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
        $anode[0]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[0]["_today_left"];
        $anode[0]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[0]["_today_right"];
        $anode[0]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
        $anode[0]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);

        if ($leftOnePlacement == null) {
            $anode[1]["distCode"] = "";
            $anode[1]["_self"] = new MlmDistributor();
            $anode[1]["_left"] = null;
            $anode[1]["_right"] = null;
            $anode[1]["_available"] = true;
            $anode[1]["_left_this_month_sales"] = null;
            $anode[1]["_right_this_month_sales"] = null;
            $anode[1]["_dist_pairing_ledger"] = null;
            $anode[1]["_accumulate_left"] = null;
            $anode[1]["_accumulate_right"] = null;
            $anode[1]["_today_left"] = null;
            $anode[1]["_today_right"] = null;
            $anode[1]["_carry_left"] = null;
            $anode[1]["_carry_right"] = null;
            $anode[1]["_sales_left"] = null;
            $anode[1]["_sales_right"] = null;

            $anode[3]["distCode"] = "";
            $anode[3]["_self"] = new MlmDistributor();
            $anode[3]["_left"] = null;
            $anode[3]["_right"] = null;
            $anode[3]["_available"] = false;
            $anode[3]["_left_this_month_sales"] = null;
            $anode[3]["_right_this_month_sales"] = null;
            $anode[3]["_dist_pairing_ledger"] = null;
            $anode[3]["_accumulate_left"] = null;
            $anode[3]["_accumulate_right"] = null;
            $anode[3]["_today_left"] = null;
            $anode[3]["_today_right"] = null;
            $anode[3]["_carry_left"] = null;
            $anode[3]["_carry_right"] = null;
            $anode[3]["_sales_left"] = null;
            $anode[3]["_sales_right"] = null;

            $anode[4]["distCode"] = "";
            $anode[4]["_self"] = new MlmDistributor();
            $anode[4]["_left"] = null;
            $anode[4]["_right"] = null;
            $anode[4]["_available"] = false;
            $anode[4]["_left_this_month_sales"] = null;
            $anode[4]["_right_this_month_sales"] = null;
            $anode[4]["_dist_pairing_ledger"] = null;
            $anode[4]["_accumulate_left"] = null;
            $anode[4]["_accumulate_right"] = null;
            $anode[4]["_today_left"] = null;
            $anode[4]["_today_right"] = null;
            $anode[4]["_carry_left"] = null;
            $anode[4]["_carry_right"] = null;
            $anode[4]["_sales_left"] = null;
            $anode[4]["_sales_right"] = null;

        } else {
            $distDB = $this->getDistributorInformation($leftOnePlacement->getDistributorCode());
            $leftThreePlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
            $rightFourPlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);

            $anode[1]["distCode"] = $leftOnePlacement->getDistributorCode();
            $anode[1]["_self"] = $distDB;
            $anode[1]["_left"] = $leftThreePlacement;
            $anode[1]["_right"] = $rightFourPlacement;
            $anode[1]["_available"] = false;
            $anode[1]["_left_this_month_sales"] = $this->getThisMonthSales($leftOnePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
            $anode[1]["_right_this_month_sales"] = $this->getThisMonthSales($leftOnePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[1]["_dist_pairing_ledger"] = $this->queryDistPairing($leftOnePlacement->getDistributorId());
            $anode[1]["_accumulate_left"] = $this->getLegTotalMember($leftThreePlacement);
            $anode[1]["_accumulate_right"] = $this->getLegTotalMember($rightFourPlacement);
            //            $anode[1]["_accumulate_left"] = $this->getAccumulateGroupBvs($leftOnePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
            //            $anode[1]["_accumulate_right"] = $this->getAccumulateGroupBvs($leftOnePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[1]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
            $anode[1]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[1]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[1]["_today_left"];
            $anode[1]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[1]["_today_right"];
            $anode[1]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
            $anode[1]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);

            if ($leftThreePlacement == null) {
                $anode[3]["distCode"] = "";
                $anode[3]["_self"] = new MlmDistributor();
                $anode[3]["_left"] = null;
                $anode[3]["_right"] = null;
                $anode[3]["_available"] = true;
                $anode[3]["_left_this_month_sales"] = null;
                $anode[3]["_right_this_month_sales"] = null;
                $anode[3]["_dist_pairing_ledger"] = null;
                $anode[3]["_accumulate_left"] = null;
                $anode[3]["_accumulate_right"] = null;
                $anode[3]["_today_left"] = null;
                $anode[3]["_today_right"] = null;
                $anode[3]["_carry_left"] = null;
                $anode[3]["_carry_right"] = null;
                $anode[3]["_sales_left"] = null;
                $anode[3]["_sales_right"] = null;
            } else {
                $distOne = $this->getPlacementDistributorInformation($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $distTwo = $this->getPlacementDistributorInformation($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);

                $distDB = $this->getDistributorInformation($leftThreePlacement->getDistributorCode());
                $anode[3]["distCode"] = $leftThreePlacement->getDistributorCode();
                $anode[3]["_self"] = $distDB;
                $anode[3]["_left"] = null;
                $anode[3]["_right"] = null;
                $anode[3]["_available"] = false;
                $anode[3]["_left_this_month_sales"] = $this->getThisMonthSales($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[3]["_right_this_month_sales"] = $this->getThisMonthSales($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[3]["_dist_pairing_ledger"] = $this->queryDistPairing($leftThreePlacement->getDistributorId());
                $anode[3]["_accumulate_left"] = $this->getLegTotalMember($distOne);
                $anode[3]["_accumulate_right"] = $this->getLegTotalMember($distTwo);
                //                $anode[3]["_accumulate_left"] = $this->getAccumulateGroupBvs($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                //                $anode[3]["_accumulate_right"] = $this->getAccumulateGroupBvs($leftThreePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[3]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[3]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[3]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[3]["_today_left"];
                $anode[3]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[3]["_today_right"];
                $anode[3]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
                $anode[3]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);
            }
            if ($rightFourPlacement == null) {
                $anode[4]["distCode"] = "";
                $anode[4]["_self"] = new MlmDistributor();
                $anode[4]["_left"] = null;
                $anode[4]["_right"] = null;
                $anode[4]["_available"] = true;
                $anode[4]["_left_this_month_sales"] = null;
                $anode[4]["_right_this_month_sales"] = null;
                $anode[4]["_dist_pairing_ledger"] = null;
                $anode[4]["_accumulate_left"] = null;
                $anode[4]["_accumulate_right"] = null;
                $anode[4]["_today_left"] = null;
                $anode[4]["_today_right"] = null;
                $anode[4]["_carry_left"] = null;
                $anode[4]["_carry_right"] = null;
                $anode[4]["_sales_left"] = null;
                $anode[4]["_sales_right"] = null;
            } else {
                $distDB = $this->getDistributorInformation($rightFourPlacement->getDistributorCode());

                $distOne = $this->getPlacementDistributorInformation($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $distTwo = $this->getPlacementDistributorInformation($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);

                $anode[4]["distCode"] = $rightFourPlacement->getDistributorCode();
                $anode[4]["_self"] = $distDB;
                $anode[4]["_left"] = null;
                $anode[4]["_right"] = null;
                $anode[4]["_available"] = false;
                $anode[4]["_left_this_month_sales"] = $this->getThisMonthSales($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[4]["_right_this_month_sales"] = $this->getThisMonthSales($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[4]["_dist_pairing_ledger"] = $this->queryDistPairing($rightFourPlacement->getDistributorId());

                $anode[4]["_accumulate_left"] = $this->getLegTotalMember($distOne);
                $anode[4]["_accumulate_right"] = $this->getLegTotalMember($distTwo);
                //                $anode[4]["_accumulate_left"] = $this->getAccumulateGroupBvs($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                //                $anode[4]["_accumulate_right"] = $this->getAccumulateGroupBvs($rightFourPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[4]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[4]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[4]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[4]["_today_left"];
                $anode[4]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[4]["_today_right"];
                $anode[4]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
                $anode[4]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);
            }
        }

        if ($rightTwoPlacement == null) {
            $anode[2]["distCode"] = "";
            $anode[2]["_self"] = new MlmDistributor();
            $anode[2]["_left"] = null;
            $anode[2]["_right"] = null;
            $anode[2]["_available"] = true;
            $anode[2]["_left_this_month_sales"] = null;
            $anode[2]["_right_this_month_sales"] = null;
            $anode[2]["_dist_pairing_ledger"] = null;
            $anode[2]["_accumulate_left"] = null;
            $anode[2]["_accumulate_right"] = null;
            $anode[2]["_today_left"] = null;
            $anode[2]["_today_right"] = null;
            $anode[2]["_carry_left"] = null;
            $anode[2]["_carry_right"] = null;
            $anode[2]["_sales_left"] = null;
            $anode[2]["_sales_right"] = null;

            $anode[5]["distCode"] = "";
            $anode[5]["_self"] = new MlmDistributor();
            $anode[5]["_left"] = null;
            $anode[5]["_right"] = null;
            $anode[5]["_available"] = false;
            $anode[5]["_left_this_month_sales"] = null;
            $anode[5]["_right_this_month_sales"] = null;
            $anode[5]["_dist_pairing_ledger"] = null;
            $anode[5]["_accumulate_left"] = null;
            $anode[5]["_accumulate_right"] = null;
            $anode[5]["_today_left"] = null;
            $anode[5]["_today_right"] = null;
            $anode[5]["_carry_left"] = null;
            $anode[5]["_carry_right"] = null;
            $anode[5]["_sales_left"] = null;
            $anode[5]["_sales_right"] = null;

            $anode[6]["distCode"] = "";
            $anode[6]["_self"] = new MlmDistributor();
            $anode[6]["_left"] = null;
            $anode[6]["_right"] = null;
            $anode[6]["_available"] = false;
            $anode[6]["_left_this_month_sales"] = null;
            $anode[6]["_right_this_month_sales"] = null;
            $anode[6]["_dist_pairing_ledger"] = null;
            $anode[6]["_accumulate_left"] = null;
            $anode[6]["_accumulate_right"] = null;
            $anode[6]["_today_left"] = null;
            $anode[6]["_today_right"] = null;
            $anode[6]["_carry_left"] = null;
            $anode[6]["_carry_right"] = null;
            $anode[6]["_sales_left"] = null;
            $anode[6]["_sales_right"] = null;
        } else {
            $distDB = $this->getDistributorInformation($rightTwoPlacement->getDistributorCode());
            $leftFivePlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
            $rightSixPlacement = $this->getPlacementDistributorInformation($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);

            $anode[2]["distCode"] = $rightTwoPlacement->getDistributorCode();
            $anode[2]["_self"] = $distDB;
            $anode[2]["_left"] = $leftFivePlacement;
            $anode[2]["_right"] = $rightSixPlacement;
            $anode[2]["_available"] = false;
            $anode[2]["_left_this_month_sales"] = $this->getThisMonthSales($rightTwoPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
            $anode[2]["_right_this_month_sales"] = $this->getThisMonthSales($rightTwoPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[2]["_dist_pairing_ledger"] = $this->queryDistPairing($rightTwoPlacement->getDistributorId());

            $anode[2]["_accumulate_left"] = $this->getLegTotalMember($leftFivePlacement);
            $anode[2]["_accumulate_right"] = $this->getLegTotalMember($rightSixPlacement);
            //            $anode[2]["_accumulate_left"] = $this->getAccumulateGroupBvs($rightTwoPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
            //            $anode[2]["_accumulate_right"] = $this->getAccumulateGroupBvs($rightTwoPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[2]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
            $anode[2]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
            $anode[2]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[2]["_today_left"];
            $anode[2]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[2]["_today_right"];
            $anode[2]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
            $anode[2]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);


            if ($leftFivePlacement == null) {
                $anode[5]["distCode"] = "";
                $anode[5]["_self"] = new MlmDistributor();
                $anode[5]["_left"] = null;
                $anode[5]["_right"] = null;
                $anode[5]["_available"] = true;
                $anode[5]["_left_this_month_sales"] = null;
                $anode[5]["_right_this_month_sales"] = null;
                $anode[5]["_dist_pairing_ledger"] = null;
                $anode[5]["_accumulate_left"] = null;
                $anode[5]["_accumulate_right"] = null;
                $anode[5]["_today_left"] = null;
                $anode[5]["_today_right"] = null;
                $anode[5]["_carry_left"] = null;
                $anode[5]["_carry_right"] = null;
                $anode[5]["_sales_left"] = null;
                $anode[5]["_sales_right"] = null;
            } else {
                $distDB = $this->getDistributorInformation($leftFivePlacement->getDistributorCode());
                $distOne = $this->getPlacementDistributorInformation($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $distTwo = $this->getPlacementDistributorInformation($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[5]["distCode"] = $leftFivePlacement->getDistributorCode();
                $anode[5]["_self"] = $distDB;
                $anode[5]["_left"] = null;
                $anode[5]["_right"] = null;
                $anode[5]["_available"] = false;
                $anode[5]["_left_this_month_sales"] = $this->getThisMonthSales($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[5]["_right_this_month_sales"] = $this->getThisMonthSales($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[5]["_dist_pairing_ledger"] = $this->queryDistPairing($leftFivePlacement->getDistributorId());

                $anode[5]["_accumulate_left"] = $this->getLegTotalMember($distOne);
                $anode[5]["_accumulate_right"] = $this->getLegTotalMember($distTwo);
                //                $anode[5]["_accumulate_left"] = $this->getAccumulateGroupBvs($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                //                $anode[5]["_accumulate_right"] = $this->getAccumulateGroupBvs($leftFivePlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[5]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[5]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[5]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[5]["_today_left"];
                $anode[5]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[5]["_today_right"];
                $anode[5]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
                $anode[5]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);
            }
            if ($rightSixPlacement == null) {
                $anode[6]["distCode"] = "";
                $anode[6]["_self"] = new MlmDistributor();
                $anode[6]["_left"] = null;
                $anode[6]["_right"] = null;
                $anode[6]["_available"] = true;
                $anode[6]["_left_this_month_sales"] = null;
                $anode[6]["_right_this_month_sales"] = null;
                $anode[6]["_dist_pairing_ledger"] = null;
                $anode[6]["_accumulate_left"] = null;
                $anode[6]["_accumulate_right"] = null;
                $anode[6]["_today_left"] = null;
                $anode[6]["_today_right"] = null;
                $anode[6]["_carry_left"] = null;
                $anode[6]["_carry_right"] = null;
                $anode[6]["_sales_left"] = null;
                $anode[6]["_sales_right"] = null;
            } else {
                $distDB = $this->getDistributorInformation($rightSixPlacement->getDistributorCode());
                $distOne = $this->getPlacementDistributorInformation($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $distTwo = $this->getPlacementDistributorInformation($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[6]["distCode"] = $rightSixPlacement->getDistributorCode();
                $anode[6]["_self"] = $distDB;
                $anode[6]["_left"] = null;
                $anode[6]["_right"] = null;
                $anode[6]["_available"] = false;
                $anode[6]["_left_this_month_sales"] = $this->getThisMonthSales($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[6]["_right_this_month_sales"] = $this->getThisMonthSales($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[6]["_dist_pairing_ledger"] = $this->queryDistPairing($rightSixPlacement->getDistributorId());
                $anode[6]["_accumulate_left"] = $this->getLegTotalMember($distOne);
                $anode[6]["_accumulate_right"] = $this->getLegTotalMember($distTwo);
                //                $anode[6]["_accumulate_left"] = $this->getAccumulateGroupBvs($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_LEFT);
                //                $anode[6]["_accumulate_right"] = $this->getAccumulateGroupBvs($rightSixPlacement->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[6]["_today_left"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_LEFT);
                $anode[6]["_today_right"] = $this->getTodaySales($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT);
                $anode[6]["_carry_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null) - $anode[6]["_today_left"];
                $anode[6]["_carry_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null) - $anode[6]["_today_right"];
                $anode[6]["_sales_left"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_LEFT, null);
                $anode[6]["_sales_right"] = $this->findPairingLedgers($distDB->getDistributorId(), Globals::PLACEMENT_RIGHT, null);
            }
        }

        $this->distcode = $distcode;
        $this->anode = $anode;
        $this->colorArr = $this->getRankColorArr();

        $isTop = false;
        if (strtoupper($distcode) == strtoupper($this->getUser()->getAttribute(Globals::SESSION_USERNAME))) {
            $isTop = true;
        }
        $this->isTop = $isTop;

        //if ($this->getUser()->getAttribute(Globals::SESSION_PLACEMENT_TREE_PASSWORD_REQUIRED, false) == false) {
        //    $this->setTemplate('placementTreeInList');
        //} else
        if ($pageDirection == "stat") {
            $this->setTemplate('placementTreeStat');
        }
    }

    public function executePendingMemberList()
    {
        $sColumns = $this->getRequestParameter('sColumns');
        $aColumns = explode(",", $sColumns);

        $iColumns = $this->getRequestParameter('iColumns');

        $offset = $this->getRequestParameter('iDisplayStart');
        $sEcho = $this->getRequestParameter('sEcho');
        $limit = $this->getRequestParameter('iDisplayLength');
        $arr = array();

        /******   total records  *******/
        $c = new Criteria();
        $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(MlmDistributorPeer::PLACEMENT_TREE_LEVEL, null, Criteria::ISNULL);
        $c->add(MlmDistributorPeer::TREE_UPLINE_DIST_ID, null, Criteria::ISNULL);
        $c->add(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, null, Criteria::ISNULL);
        $totalRecords = MlmDistributorPeer::doCount($c);

        /******   total filtered records  *******/
        if ($this->getRequestParameter('filterFullname') != "") {
            $c->addAnd(MlmDistributorPeer::FULL_NAME, "%" . $this->getRequestParameter('filterFullname') . "%", Criteria::LIKE);
        }
        if ($this->getRequestParameter('filterNickname') != "") {
            $c->addAnd(MlmDistributorPeer::NICKNAME, "%" . $this->getRequestParameter('filterNickname') . "%", Criteria::LIKE);
        }
        $totalFilteredRecords = MlmDistributorPeer::doCount($c);

        /******   sorting  *******/
        for ($i = 0; $i < intval($this->getRequestParameter('iSortingCols')); $i++)
        {
            if ($this->getRequestParameter('bSortable_' . intval($this->getRequestParameter('iSortCol_' . $i))) == "true") {
                if ("asc" == $this->getRequestParameter('sSortDir_' . $i)) {
                    $c->addAscendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                } else {
                    $c->addDescendingOrderByColumn($aColumns[intval($this->getRequestParameter('iSortCol_' . $i))]);
                }
            }
        }

        /******   pagination  *******/
        $pager = new sfPropelPager('MlmDistributor', $limit);
        $pager->setCriteria($c);
        $pager->setPage(($offset / $limit) + 1);
        $pager->init();

        foreach ($pager->getResults() as $result) {
            $arr[] = array(
                $result->getDistributorId() == null ? "" : $result->getDistributorId(),
                $result->getDistributorId() == null ? "" : $result->getDistributorId(),
                $result->getCreatedOn() == null ? "" : $result->getActiveDatetime(),
                $result->getDistributorCode() == null ? "" : $result->getDistributorCode(),
                $result->getFullName() == null ? "" : $result->getFullName(),
                $result->getNickname() == null ? "" : $result->getNickname(),
                $result->getIc() == null ? "" : $result->getIc(),
                $result->getRankCode() == null ? "" : $result->getRankCode(),
            );
        }
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalFilteredRecords,
            "aaData" => $arr
        );
        echo json_encode($output);

        return sfView::HEADER_ONLY;
    }

    public function executeReloadTopup()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REGISTRATION");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "RELOAD_MT4_FUND");

        $ledgerBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->ledgerBalance = $ledgerBalance;

        $distributorDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->distributorDB = $distributorDB;

        $c = new Criteria();
        $c->add(MlmDistMt4Peer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $distMt4DBs = MlmDistMt4Peer::doSelect($c);
        $this->distMt4DBs = $distMt4DBs;

        $pt2Amount = $this->getRequestParameter('pt2Amount');
        $pointNeeded = $this->getRequestParameter('pt2Amount');
        $pt2UserName = $this->getRequestParameter('pt2UserName', "");

        if ($pt2Amount > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            if ($pointNeeded > $ledgerBalance) {
                $this->setFlash('errorMsg', "In-sufficient RP Wallet");

            } elseif (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', "Invalid Security password");

            } elseif ($pt2UserName == "") {
                $this->setFlash('errorMsg', "Invalid MT4 ID.");

            } else {
                $tbl_account_ledger = new MlmAccountLedger();
                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TOPUP_MT4);
                $tbl_account_ledger->setCredit(0);
                $tbl_account_ledger->setDebit($pointNeeded);
                $tbl_account_ledger->setBalance($ledgerBalance - $pointNeeded);
                $tbl_account_ledger->setRemark("MT4 Fund :".$pt2Amount);
                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->save();

                $mlmMt4ReloadFund = new MlmMt4ReloadFund();
                $mlmMt4ReloadFund->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $mlmMt4ReloadFund->setMt4UserName($pt2UserName);
                $mlmMt4ReloadFund->setAmount($this->getRequestParameter('pt2Amount'));
                $mlmMt4ReloadFund->setStatusCode(Globals::STATUS_PENDING);
                $mlmMt4ReloadFund->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmMt4ReloadFund->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmMt4ReloadFund->save();

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your MT4 Fund Reload has been submitted."));

                return $this->redirect('/member/reloadTopup');
            }
        }
    }

    public function executeTransferPromo()
    {
        $ledgerAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);
        $this->ledgerAccountBalance = $ledgerAccountBalance;

        $processFee = 0;
        /*$c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_TRANSFER_PROCESS_FEE);
        $settingDB = AppSettingPeer::doSelectOne($c);
        if ($settingDB) {
            $processFee = $settingDB->getSettingValue();
        }*/
        $this->processFee = $processFee;

        if ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('ecashAmount') > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            $appUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            $sponsorId = $this->getRequestParameter('sponsorId');

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $existDist = MlmDistributorPeer::doSelectOne($c);

            if ($existDist->getIsIb() == 1) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("You are not allowed to transfer Promo Wallet."));
                return $this->redirect('/member/transferPromo');
            }

            $array = explode(',', Globals::STATUS_ACTIVE . "," . Globals::STATUS_PENDING);
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = MlmDistributorPeer::doSelectOne($c);

            if (!$existUser && $existDist) {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
                $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $existDist->getDistributorId() . "|%", Criteria::LIKE);
                $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
                $existUser = MlmDistributorPeer::doSelectOne($c);

                if (!$existUser) {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid User ID."));
                    return $this->redirect('/member/transferPromo');
                }
            }

            if (($this->getRequestParameter('ecashAmount') + $processFee) > $ledgerAccountBalance) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient Promo Wallet Amount"));
                return $this->redirect('/member/transferPromo');
            } elseif (strtoupper($appUser->getUserPassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
                return $this->redirect('/member/transferPromo');
            } elseif (strtoupper($this->getRequestParameter('sponsorId')) == $this->getUser()->getAttribute(Globals::SESSION_USERNAME)) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("You are not allow to transfer to own account."));
                return $this->redirect('/member/transferPromo');
            } elseif ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('ecashAmount') > 0) {

                $con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);

                try {
                    $con->begin();

                    $ecashBalance = $this->getAccountBalance($existDist->getDistributorId(), Globals::ACCOUNT_TYPE_PROMO);

                    $toId = $existDist->getDistributorId();
                    $toCode = $existDist->getDistributorCode();
                    $toName = $existDist->getNickname();
                    $toBalance = $ecashBalance;
                    $fromId = $this->getUser()->getAttribute(Globals::SESSION_DISTID);
                    $fromCode = $this->getUser()->getAttribute(Globals::SESSION_USERNAME);
                    $fromName = $this->getUser()->getAttribute(Globals::SESSION_NICKNAME);
                    $fromBalance = $ledgerAccountBalance;

                    $remark = "";
                    if ($this->getRequestParameter('remark')) {
                        $remark = ", ".$this->getRequestParameter('remark');
                    }

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
                    $mlm_account_ledger->setDistId($fromId);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
                    $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $toCode . $remark);
                    $mlm_account_ledger->setCredit(0);
                    $mlm_account_ledger->setDebit($this->getRequestParameter('ecashAmount'));
                    $mlm_account_ledger->setBalance($fromBalance - $this->getRequestParameter('ecashAmount'));
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    //$this->revalidateAccount($fromId, Globals::ACCOUNT_TYPE_ECASH);

                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
                    $tbl_account_ledger->setDistId($toId);
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM);
                    $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . " " . $fromCode . " (" . $fromName . ")" . $remark);
                    $tbl_account_ledger->setCredit($this->getRequestParameter('ecashAmount'));
                    $tbl_account_ledger->setDebit(0);
                    $tbl_account_ledger->setBalance($toBalance + $this->getRequestParameter('ecashAmount'));
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    //throw $e;
                }

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Transfer success"));

                return $this->redirect('/member/transferPromo');
            }
        }
    }
    public function executeTransferEcash()
    {
        $ledgerAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $this->ledgerAccountBalance = $ledgerAccountBalance;

        $processFee = 0;
        /*$c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_TRANSFER_PROCESS_FEE);
        $settingDB = AppSettingPeer::doSelectOne($c);
        if ($settingDB) {
            $processFee = $settingDB->getSettingValue();
        }*/
        $this->processFee = $processFee;

        if ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('ecashAmount') > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            $appUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            $sponsorId = $this->getRequestParameter('sponsorId');

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $existDist = MlmDistributorPeer::doSelectOne($c);

            if ($existDist->getIsIb() == 1) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("You are not allowed to transfer EP Wallet."));
                return $this->redirect('/member/transferEcash');
            }

            $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = MlmDistributorPeer::doSelectOne($c);

            if (!$existUser && $existDist) {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
                $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $existDist->getDistributorId() . "|%", Criteria::LIKE);
                $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
                $existUser = MlmDistributorPeer::doSelectOne($c);

                if (!$existUser) {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid User ID."));
                    return $this->redirect('/member/transferEcash');
                }
            }

            if (($this->getRequestParameter('ecashAmount') + $processFee) > $ledgerAccountBalance) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient EP Wallet Amount"));
                return $this->redirect('/member/transferEcash');
            } elseif (strtoupper($appUser->getUserPassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
                return $this->redirect('/member/transferEcash');
            } elseif (strtoupper($this->getRequestParameter('sponsorId')) == $this->getUser()->getAttribute(Globals::SESSION_USERNAME)) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("You are not allow to transfer to own account."));
                return $this->redirect('/member/transferEcash');
            } elseif ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('ecashAmount') > 0) {

                $con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);

                try {
                    $con->begin();

                    $ecashBalance = $this->getAccountBalance($existDist->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                    $toId = $existDist->getDistributorId();
                    $toCode = $existDist->getDistributorCode();
                    $toName = $existDist->getNickname();
                    $toBalance = $ecashBalance;
                    $fromId = $this->getUser()->getAttribute(Globals::SESSION_DISTID);
                    $fromCode = $this->getUser()->getAttribute(Globals::SESSION_USERNAME);
                    $fromName = $this->getUser()->getAttribute(Globals::SESSION_NICKNAME);
                    $fromBalance = $ledgerAccountBalance;

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $mlm_account_ledger->setDistId($fromId);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
                    $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $toCode);
                    $mlm_account_ledger->setCredit(0);
                    $mlm_account_ledger->setDebit($this->getRequestParameter('ecashAmount'));
                    $mlm_account_ledger->setBalance($fromBalance - $this->getRequestParameter('ecashAmount'));
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    //$this->revalidateAccount($fromId, Globals::ACCOUNT_TYPE_ECASH);

                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $tbl_account_ledger->setDistId($toId);
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM);
                    $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . " " . $fromCode . "(" . $fromName . ")");
                    $tbl_account_ledger->setCredit($this->getRequestParameter('ecashAmount'));
                    $tbl_account_ledger->setDebit(0);
                    $tbl_account_ledger->setBalance($toBalance + $this->getRequestParameter('ecashAmount'));
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    //throw $e;
                }

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Transfer success"));

                return $this->redirect('/member/transferEcash');
            }
        }
    }

    public function executeEwalletLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "EWALLET_LOG");
    }
    public function executeEpointLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "EPOINT_LOG");
    }
    public function executeDegoldLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "DEGOLD_LOG");
    }
    public function executePassiveLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "PASSIVE_LOG");
    }
    public function executePromoLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "PROMO_LOG");
    }
    public function executeTransferEpoint()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "EPOINT_TRANSFER");

        $ledgerAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->ledgerAccountBalance = $ledgerAccountBalance;

        $processFee = 0;
        /*$c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, Globals::SETTING_TRANSFER_PROCESS_FEE);
        $settingDB = AppSettingPeer::doSelectOne($c);
        if ($settingDB) {
            $processFee = $settingDB->getSettingValue();
        }*/
        $this->processFee = $processFee;

        if ($this->getRequestParameter('sponsorId') <> "" && $this->getRequestParameter('epointAmount') > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            $appUser = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            $sponsorId = $this->getRequestParameter('sponsorId');
            $epointAmount = $this->getRequestParameter('epointAmount');
            $epointAmount = str_replace(",", "", $epointAmount);

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $existDist = MlmDistributorPeer::doSelectOne($c);

            $array = explode(',', Globals::STATUS_ACTIVE.",".Globals::STATUS_PENDING);
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
            $existUser = MlmDistributorPeer::doSelectOne($c);

            if (!$existUser && $existDist) {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
                $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $existDist->getDistributorId() . "|%", Criteria::LIKE);
                $c->add(MlmDistributorPeer::STATUS_CODE, $array, Criteria::IN);
                $existUser = MlmDistributorPeer::doSelectOne($c);

                if (!$existUser) {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid User ID."));
                    return $this->redirect('/member/transferEpoint');
                }
            }

            if (($epointAmount + $processFee) > $ledgerAccountBalance) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient RP Wallet"));
                return $this->redirect('/member/transferEpoint');

            } elseif (strtoupper($appUser->getUserPassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
                return $this->redirect('/member/transferEpoint');

            } elseif (strtoupper($this->getRequestParameter('sponsorId')) == $this->getUser()->getAttribute(Globals::SESSION_USERNAME)) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("You are not allow to transfer to own account."));
                return $this->redirect('/member/transferEpoint');

            } elseif ($this->getRequestParameter('sponsorId') <> "" && $epointAmount > 0) {
                $epointBalance = $this->getAccountBalance($existDist->getDistributorId(), Globals::ACCOUNT_TYPE_EPOINT);

                $toId = $existDist->getDistributorId();
                $toCode = $existDist->getDistributorCode();
                $toName = $existDist->getNickname();
                $toBalance = $epointBalance;
                $fromId = $this->getUser()->getAttribute(Globals::SESSION_DISTID);
                $fromCode = $this->getUser()->getAttribute(Globals::SESSION_USERNAME);
                $fromName = $this->getUser()->getAttribute(Globals::SESSION_NICKNAME);
                $fromBalance = $ledgerAccountBalance;

                $remark = "";
                if ($this->getRequestParameter('remark')) {
                    $remark = ", ".$this->getRequestParameter('remark');
                }

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                $mlm_account_ledger->setDistId($fromId);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO);
                $mlm_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_TO . " " . $toCode . $remark);
                $mlm_account_ledger->setCredit(0);
                $mlm_account_ledger->setDebit($epointAmount);
                $mlm_account_ledger->setBalance($fromBalance - $epointAmount);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                //$this->revalidateAccount($fromId, Globals::ACCOUNT_TYPE_EPOINT);

                $tbl_account_ledger = new MlmAccountLedger();
                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                $tbl_account_ledger->setDistId($toId);
                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM);
                $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_TRANSFER_FROM . " " . $fromCode . " (" . $fromName . ")" . $remark);
                $tbl_account_ledger->setCredit($epointAmount);
                $tbl_account_ledger->setDebit(0);
                $tbl_account_ledger->setBalance($toBalance + $epointAmount);
                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->save();

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Transfer success"));

                return $this->redirect('/member/transferEpoint');
            }
        }
    }

    public function executeCurrentLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "CURRENT_LOG");

        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_CURRENT_LOG, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=CL');
        }
    }
    public function executeTradingLog()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "TRADING_LOG");

        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_TRADING_LOG, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=TL');
        }
    }
    public function executeMt4Log()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "MT4_LOG");
    }
    public function executeMaintenanceLog()
    {
    }

    public function executeFetchAnnouncementById()
    {
        $arr = "";
        if ($this->getRequestParameter('announcementId') <> "") {
            $announcement = MlmAnnouncementPeer::retrieveByPk($this->getRequestParameter('announcementId'));

            if ($announcement) {
                $title = $announcement->getTitle();
                $content = $announcement->getContent();
                if ($this->getUser()->getCulture() == 'cn') {
                    $title = $announcement->getTitleCn();
                    $content = $announcement->getContentCn();
                }
                $arr = array(
                    'title' => $title,
                    'content' => $content
                );
            }
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeLoginPassword()
    {
        if ($this->getRequestParameter('oldPassword')) {
            /*$c = new Criteria();
            $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
            $c->add(AppUserPeer::USERPASSWORD2, $this->getRequestParameter('changePasswordSecurityPassword'));
            $exist = AppUserPeer::doSelectOne($c);

            if (!$exist) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Security password is not valid."));
                return $this->redirect('/member/viewProfile');
            }*/

            $c = new Criteria();
            $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
            $c->add(AppUserPeer::USERPASSWORD, $this->getRequestParameter('oldPassword'));
            $exist = AppUserPeer::doSelectOne($c);

            if (!$exist) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Old password is not valid."));
            } else {
                $exist->setUserpassword($this->getRequestParameter('newPassword'));
                //$exist->setKeepPassword($this->getRequestParameter('newPassword'));
                $exist->save();
                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Password updated"));
            }
            //return $this->redirect('/member/loginPassword');
        }
        return $this->redirect('/member/passwordSetting');
    }

    public function executeTransactionPassword()
    {
        if ($this->getRequestParameter('oldSecurityPassword')) {
            $c = new Criteria();
            $c->add(AppUserPeer::USER_ID, $this->getUser()->getAttribute(Globals::SESSION_USERID));
            $c->add(AppUserPeer::USERPASSWORD2, $this->getRequestParameter('oldSecurityPassword'));
            $exist = AppUserPeer::doSelectOne($c);

            if (!$exist) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Old Security password is not valid."));
            } else {
                $exist->setUserpassword2($this->getRequestParameter('newSecurityPassword'));
                //$exist->setKeepPassword2($this->getRequestParameter('newSecurityPassword'));
                $exist->save();
                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Security Password updated"));
            }
            //return $this->redirect('/member/transactionPassword');
        }
        return $this->redirect('/member/passwordSetting');
    }

    public function executeAnnouncement()
    {
        $announcement = MlmAnnouncementPeer::retrieveByPK($this->getRequestParameter('id'));
        $this->forward404Unless($announcement);

        $this->announcement = $announcement;
    }

    public function executeConsultantSalesList()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "BUSINESS_NETWORK");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "SALES_LIST");

        $this->distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        if ($this->distDB->getIsIb() != 1) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action"));
            return $this->redirect('/member/summary');
        }
    }

    public function executeSalesList()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "BUSINESS_NETWORK");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "SALES_LIST");

        $thisMonthStart = date("Y-m-1");
        $thisMonthEnd = date("Y-m-t");
        $last1MonthStart = date("Y-m-1", strtotime("-1 month"));
        $last1MonthEnd = date("Y-m-t", strtotime("-1 month"));
        $last2MonthStart = date("Y-m-1", strtotime("-2 month"));
        $last2MonthEnd = date("Y-m-t", strtotime("-2 month"));
        $last3MonthStart = date("Y-m-1", strtotime("-3 month"));
        $last3MonthEnd = date("Y-m-t", strtotime("-3 month"));

        $this->totalCurrentMonth = $this->getTotalSales($this->getUser()->getAttribute(Globals::SESSION_DISTID), $thisMonthStart, $thisMonthEnd);
        $this->totalPrevious1Month = $this->getTotalSales($this->getUser()->getAttribute(Globals::SESSION_DISTID), $last1MonthStart, $last1MonthEnd);
        $this->totalPrevious2Month = $this->getTotalSales($this->getUser()->getAttribute(Globals::SESSION_DISTID), $last2MonthStart, $last2MonthEnd);
        $this->totalPrevious3Month = $this->getTotalSales($this->getUser()->getAttribute(Globals::SESSION_DISTID), $last3MonthStart, $last3MonthEnd);
    }

    function getTotalSales($distributorId, $dateFrom, $dateTo, $dateTimeFrom = null, $dateTimeTo = null)
    {
        $totalSponsor = 0;
        $totalUpgrade = 0;
        $query = "SELECT SUM(package.price) AS SUB_TOTAL
            FROM mlm_distributor dist
                LEFT JOIN mlm_package package ON package.package_id = dist.init_rank_id
            WHERE dist.status_code = 'ACTIVE' AND tree_structure like '%|". $distributorId ."|%'";

        if ($dateFrom != null) {
            $query .= " AND dist.active_datetime >= '" . $dateFrom . " 00:00:00'";
        }
        if ($dateTimeFrom != null) {
            $query .= " AND dist.active_datetime > '" . $dateTimeFrom . "'";
        }
        if ($dateTo != null) {
            $query .= " AND dist.active_datetime <= '" . $dateTo . " 23:59:59'";
        }
        if ($dateTimeTo != null) {
            $query .= " AND dist.active_datetime <= '" . $dateTimeTo . "'";
        }

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
//        var_dump($query);
//        exit();
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalSponsor = $arr["SUB_TOTAL"];
            }
        }

        $query = "SELECT SUM(upgradeHistory.amount) AS SUB_TOTAL
            FROM mlm_distributor dist
                LEFT JOIN mlm_package_upgrade_history upgradeHistory ON upgradeHistory.dist_id = dist.distributor_id
            WHERE dist.status_code = 'ACTIVE' AND tree_structure like '%|". $distributorId ."|%'
                AND upgradeHistory.transaction_code = 'PACKAGE UPGRADE'";

        if ($dateFrom != null) {
            $query .= " AND upgradeHistory.created_on >= '" . $dateFrom . " 00:00:00'";
        }
        if ($dateTo != null) {
            $query .= " AND upgradeHistory.created_on <= '" . $dateTo . " 23:59:59'";
        }
        if ($dateTimeFrom != null) {
            $query .= " AND upgradeHistory.created_on > '" . $dateTimeFrom . "'";
        }
        if ($dateTimeTo != null) {
            $query .= " AND upgradeHistory.created_on <= '" . $dateTimeTo . "'";
        }

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalUpgrade = $arr["SUB_TOTAL"];
            }
        }
        return $totalSponsor + $totalUpgrade;
    }

    public function executeSponsorTree()
    {
        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_GENEALOGY, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=G');
        }

        $id = $this->getUser()->getAttribute(Globals::SESSION_DISTID);
        $distinfo = MlmDistributorPeer::retrieveByPk($id);
        $this->distinfo = $distinfo;
        $this->hasChild = $this->checkHasChild($distinfo->getDistributorId());

        /*********************/
        /* Search Function
         * ********************/
        $fullName = $this->getRequestParameter('fullName');
        $arrTree = array();
        if ($fullName != "") {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $fullName);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $distinfo = MlmDistributorPeer::doSelectOne($c);

            if (!$distinfo) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Member is not exist."));
                return $this->redirect('/member/sponsorTree');
            }

            $this->distinfo = $distinfo;
            $this->hasChild = $this->checkHasChild($distinfo->getDistributorId());
        }

        $color = "blue";
        $packageName = "";

        $package = MlmPackagePeer::retrieveByPK($distinfo->getRankId());
        if ($package) {
            $color = $package->getColor();
            $packageName = $package->getPackageName();
        }
        if ($distinfo->getStatusCode() != Globals::STATUS_ACTIVE) {
            $headColor = "black";
        }
        $totalGroupSale = 0;

        $totalGroupSale = number_format($this->getTotalGroupSales($distinfo->getDistributorId(), null, null), 0);
        //var_dump($totalGroupSale);
        //exit();
        $this->headColor = $color;
        $this->arrTree = $arrTree;
        $this->fullName = $fullName;
        $this->packageName = $packageName;
        $this->totalGroupSale = $totalGroupSale;

        //$c = new Criteria();
        //$c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        //$this->packageDBs = MlmPackagePeer::doSelect($c);
    }

    public function executeManipulateSponsorTree()
    {
        $parentId = $this->getRequestParameter('root');
        $arrTree = array();
        $html = "";
        if ($parentId != "") {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $parentId);
            //$c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $dists = MlmDistributorPeer::doSelect($c);

            $idx = 0;
            $count = count($dists);
            foreach ($dists as $dist)
            {
                $idx++;
                $hasChild = $this->checkHasChild($dist->getDistributorId());

                $treeLine = "tree-controller-lplus-line";
                $treeLine2 = "tree-controller-lplus-right";
                $treeLineNoChild = "tree-controller-t-line";
                $treeLineNoChild2 = "tree-controller-t-right";
                $treeControllerWrap = "tree-controller-wrap";
                $img = "<img class='tree-plus-button' src='/css/network/plus.png'>";
                if ($idx == $count) {
                    $treeLineNoChild = "tree-controller-l-line";
                    $treeLineNoChild2 = "tree-controller-l-right";
                    $treeControllerWrap = "tree-controller-l-wrap";
                }

                if ($hasChild) {
                } else {
                    $img = "";
                    $treeLine = $treeLineNoChild;
                    $treeLine2 = $treeLineNoChild2;
                }

                $headColor = "blue";
                $packageName = "";

                $package = MlmPackagePeer::retrieveByPK($dist->getRankId());
                if ($package) {
                    $headColor = $package->getColor();
                    $packageName = $package->getPackageName();
                }
                if ($dist->getStatusCode() != Globals::STATUS_ACTIVE) {
                    $headColor = "black";
                }

                $totalGroupSale = number_format($this->getTotalGroupSales($dist->getDistributorId(), null, null), 0);

                $distributorCode = $dist->getDistributorCode();

                $pos = strrpos($dist->getTreeStructure(), "|2545|");
                if ($pos === false) { // note: three equal signs

                } else {
                    $lastChar = substr($distributorCode, -1);
                    if ($lastChar == "_") {
                        $distributorCode = substr($distributorCode, 0, -1);
                    }
                }

                $html .= "<div class='".$treeControllerWrap."'>
                        <div class='controller-node-con'>
                            <div class='tree-controller ".$treeLine."'>
                                <div class='tree-controller-in ".$treeLine2."'>
                                    ".$img."
                                </div>
                            </div>
                            <div class='node-info-raw' id='node-id-".$dist->getDistributorId()."'>
                                <div class='node-info'>
                                    <span class='user-rank'><img
                                            src='/css/network/".$headColor."_head.png'></span>
                                    <span class='user-id'>".$distributorCode . "<br/>(" . $dist->getFullName() . ")" . "</span>
                                    <span class='user-joined'>".$this->getContext()->getI18N()->__("Joined")." ".date('Y-m-d', strtotime($dist->getActiveDatetime()))."</span>
                                    <span class='user-joined'>".$this->getContext()->getI18N()->__("Group Sales").": ".$totalGroupSale."</span>
                                    <span class='user-joined'>".$this->getContext()->getI18N()->__("Rank").": ".$this->getContext()->getI18N()->__($packageName)."</span>
                                </div>
                            </div>
                        </div>";
                if ($hasChild) {
                    $html .= "<div id='node-wrapper-".$dist->getDistributorId()."' class='ajax-more'></div>";
                }
                $html .= "</div>";
            }
        }


        //echo json_encode($arrTree);
        echo $html;
        return sfView::HEADER_ONLY;
    }

    public function executeEwalletWithdrawal()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "WITHDRAWAL");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "CURRENT_WITHDRAWAL");

        $ledgerAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $this->ledgerAccountBalance = $ledgerAccountBalance;
        $distributorDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->distributorDB = $distributorDB;

        $withdrawAmount = $this->getRequestParameter('ecashAmount');

        if ($this->getRequestParameter('ecashAmount') > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            /*if ((date("d") >= 1 && date("d") <= 7) || date("d") >= 16 && date("d") <= 20) {

            } else {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Withdrawal request must be done during the first 7 days of each month or 16th - 20th of each month"));
                return $this->redirect('/member/ewalletWithdrawal');
            }*/

            if ($distributorDB->getBankAccNo() == "" || $distributorDB->getBankAccNo() == null
                || $distributorDB->getBankName() == "" || $distributorDB->getBankName() == null
                || $distributorDB->getBankBranch() == "" || $distributorDB->getBankBranch() == null
                || $distributorDB->getBankAddress() == "" || $distributorDB->getBankAddress() == null
                || $distributorDB->getBankHolderName() == "" || $distributorDB->getBankHolderName() == null
                || $distributorDB->getFileBankPassBook() == "" || $distributorDB->getFileBankPassBook() == null
                || $distributorDB->getFileNric() == "" || $distributorDB->getFileNric() == null) {

                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            }

            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            //$processFee = 0;
            $processFee = 50;
            $processFee2 = $this->getRequestParameter('ecashAmount') * 0.05;

            if ($processFee2 > $processFee) {
                $processFee = $processFee2;
            }

            if (($withdrawAmount + $processFee) > $ledgerAccountBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient funds in EP Wallet account"));

            } elseif (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));

            } elseif ($withdrawAmount > 0) {
                $tbl_account_ledger = new MlmAccountLedger();
                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_WITHDRAWAL);
                $tbl_account_ledger->setCredit(0);
                $tbl_account_ledger->setDebit($withdrawAmount + $processFee);
                $tbl_account_ledger->setBalance($ledgerAccountBalance - $withdrawAmount - $processFee);
                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->save();

                // ******       company account      ****************
                $companyEcashBalance = $this->getAccountBalance(Globals::SYSTEM_COMPANY_DIST_ID, Globals::ACCOUNT_TYPE_ECASH);

                $tbl_account_ledger = new MlmAccountLedger();
                $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                $tbl_account_ledger->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_WITHDRAWAL);
                $tbl_account_ledger->setRemark(Globals::ACCOUNT_LEDGER_ACTION_WITHDRAWAL . " " . $this->getUser()->getAttribute(Globals::SESSION_USERNAME));
                $tbl_account_ledger->setCredit($processFee);
                $tbl_account_ledger->setDebit(0);
                $tbl_account_ledger->setBalance($companyEcashBalance + $processFee);
                $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_account_ledger->save();

                $tbl_ecash_withdraw = new MlmEcashWithdraw();
                $tbl_ecash_withdraw->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $tbl_ecash_withdraw->setDeduct($withdrawAmount);
                $tbl_ecash_withdraw->setAmount($withdrawAmount + $processFee);
                $tbl_ecash_withdraw->setStatusCode(Globals::WITHDRAWAL_PENDING);
                $tbl_ecash_withdraw->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_ecash_withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $tbl_ecash_withdraw->save();

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your withdrawal has been submitted."));

                return $this->redirect('/member/ewalletWithdrawal');
            }
        }
    }

    public function executeMt4Withdrawal()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "WITHDRAWAL");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "MT4_WITHDRAWAL");

        $distributorDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->distributorDB = $distributorDB;

        $c = new Criteria();
        $c->add(MlmDistMt4Peer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $distMt4DBs = MlmDistMt4Peer::doSelect($c);
        $this->distMt4DBs = $distMt4DBs;

        if ($this->getRequestParameter('pt2Amount') > 0 && $this->getRequestParameter('transactionPassword') <> "" && $this->getRequestParameter('paymentType') <> "") {
            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            if (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));

            } else if (!$this->getRequestParameter('pt2Id')) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid MT4 ID."));

            } else {
                $paymentType = $this->getRequestParameter('paymentType');
                $usdAmount = $this->getRequestParameter('pt2Amount');
                $mt4Id =  $this->getRequestParameter('pt2Id');

                $mt4Withdraw = new MlmMt4Withdraw();
                $mt4Withdraw->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                $mt4Withdraw->setMt4UserName($mt4Id);
                $mt4Withdraw->setStatusCode(Globals::WITHDRAWAL_PENDING);

                $minHandlingFee = 0;
                $myrAmount = 0;
                $handlingFee = 0;
                $currencyCode = "USD";
                $grandAmount = 0;

                $currencyCode = "USD";

                $handlingCharge = 50;
                $percentageHandlingCharge = $usdAmount * 5 / 100;

                $handlingCharge = 0;
                $percentageHandlingCharge = 0;
                if ($percentageHandlingCharge > $handlingCharge)
                    $handlingCharge = $percentageHandlingCharge;

                $grandAmount = $usdAmount - $handlingCharge;

                $mt4Withdraw->setAmountRequested($usdAmount);

                $mt4Withdraw->setHandlingFee($handlingCharge);
                $mt4Withdraw->setGrandAmount($grandAmount);
                $mt4Withdraw->setPaymentType($paymentType);
                $mt4Withdraw->setCurrencyCode($currencyCode);

                $mt4Withdraw->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mt4Withdraw->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mt4Withdraw->save();

                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your MT4 withdrawal has been submitted."));

                return $this->redirect('/member/mt4Withdrawal');
            }
        }
    }

    public function executeBonusDetails()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "COMMISSION");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "COMMISSION");

        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_COMMISSION, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=C');
        }

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($distDB);

        $joinDate = $distDB->getActiveDatetime();

        $dsb = $this->getCommissionBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::COMMISSION_TYPE_DRB);
        $pipsBonus = $this->getCommissionBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::COMMISSION_TYPE_PIPS_BONUS);
        $creditRefunds = $this->getCommissionBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::COMMISSION_TYPE_CREDIT_REFUND);
        $fundManagements = $this->getCommissionBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::COMMISSION_TYPE_FUND_MANAGEMENT);
        $pairingBonus = $this->getCommissionBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::COMMISSION_TYPE_GDB);
        $specialBonus = 0;
        $totalLotTraded = 0;

        $this->dsb = number_format($dsb, 2);
        $this->pipsBonus = number_format($pipsBonus, 2);
        $this->creditRefund = number_format($creditRefunds, 2);
        $this->fundManagement = number_format($fundManagements, 2);
        $this->pairingBonus = number_format($pairingBonus, 2);
        $this->specialBonus = number_format($specialBonus, 2);
        $this->totalLotTraded = number_format($totalLotTraded, 2);

        $this->total = number_format($dsb + $pipsBonus + $creditRefunds + $fundManagements + $pairingBonus + $specialBonus, 2);

        /* *************************
         *  PIPS DETAIL
         * **************************/
        $currentMonth = date('m');
        $currentYear = date('Y');

        $anode = array();

        $idx = 0;
        if ($joinDate != null) {
            $joinMonth = date('m', strtotime($joinDate));
            $joinYear = date('Y', strtotime($joinDate));
            for ($x = intval($joinYear); $x <= intval($currentYear); $x++) {
                if ($x != $currentYear) {
                    for ($i = intval($joinMonth); $i <= 12; $i++) {
                        $anode[$idx]["year"] = $x;
                        $anode[$idx]["month"] = $i;
                        $anode[$idx]["rb_bonus"] = $this->getRbDetailByMonth($distDB->getDistributorId(), $i, $x);
                        $anode[$idx]["paring_bonus"] = $this->getPairingDetailByMonth($distDB->getDistributorId(), $i, $x);
                        $idx++;
                    }
                } else {
                    if ($joinYear != $currentYear) {
                        $joinMonth = 1;
                    }
                    for ($i = intval($joinMonth); $i <= intval($currentMonth); $i++) {
                        $anode[$idx]["year"] = $x;
                        $anode[$idx]["month"] = $i;
                        $anode[$idx]["rb_bonus"] = $this->getRbDetailByMonth($distDB->getDistributorId(), $i, $x);
                        $anode[$idx]["paring_bonus"] = $this->getPairingDetailByMonth($distDB->getDistributorId(), $i, $x);
                        $idx++;
                    }
                }
            }
        }
        $this->anode = $anode;
    }

    public function executeProfile()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "SUMMARY");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "VIEW_PROFILE");
    }

    public function executeRegistration()
    {
    }

    public function executeVerifyNickName()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::NICKNAME, $this->getRequestParameter('nickName'));
        $exist = MlmDistributorPeer::doSelectOne($c);

        if ($exist) {
            echo 'false';
        } else {
            echo 'true';
        }

        return sfView::HEADER_ONLY;
    }

    public function executeVerifyUserName()
    {
        $c = new Criteria();
        $c->add(AppUserPeer::USERNAME, $this->getRequestParameter('userName'));
        $exist = AppUserPeer::doSelectOne($c);

        if ($exist) {
            echo 'false';
        } else {
            echo 'true';
        }

        return sfView::HEADER_ONLY;
    }

    public function executeVerifyFullName()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::FULL_NAME, $this->getRequestParameter('fullname'));
        $exist = MlmDistributorPeer::doSelectOne($c);

        if ($exist) {
            echo 'false';
        } else {
            echo 'true';
        }

        return sfView::HEADER_ONLY;
    }

    public function executeViewProfile()
    {
        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_VIEW_PROFILE, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=VP');
        }

        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "SUMMARY");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "VIEW_PROFILE");

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($distDB);

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, $distDB->getUplineDistId());
        $sponsor = MlmDistributorPeer::doSelectOne($c);
        if (!$sponsor) {
            $sponsor = new MlmDistributor();
        }

        $this->sponsor = $sponsor;
        $this->distDB = $distDB;
    }

    public function executeBankInformation()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $this->forward404Unless($distDB);

        $this->distDB = $distDB;

        $this->bankName2 = $this->getAppSetting(Globals::SETTING_BANK_NAME_2);
        $this->bankSwiftCode2 = $this->getAppSetting(Globals::SETTING_BANK_SWIFT_CODE_2);
        $this->iban2 = $this->getAppSetting(Globals::SETTING_IBAN_2);
        $this->bankAccountHolder2 = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_HOLDER_2);
        $this->bankAccountNumber2 = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_NUMBER_2);
        $this->cityOfBank2 = $this->getAppSetting(Globals::SETTING_CITY_OF_BANK_2);
        $this->countryOfBank2 = $this->getAppSetting(Globals::SETTING_COUNTRY_OF_BANK_2);

        $this->bankName = $this->getAppSetting(Globals::SETTING_BANK_NAME);
        $this->bankSwiftCode = $this->getAppSetting(Globals::SETTING_BANK_SWIFT_CODE);
        $this->iban = $this->getAppSetting(Globals::SETTING_IBAN);
        $this->bankAccountHolder = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_HOLDER);
        $this->bankAccountNumber = $this->getAppSetting(Globals::SETTING_BANK_ACCOUNT_NUMBER);
        $this->cityOfBank = $this->getAppSetting(Globals::SETTING_CITY_OF_BANK);
        $this->countryOfBank = $this->getAppSetting(Globals::SETTING_COUNTRY_OF_BANK);
    }

    public function executeDailyBonus()
    {
        $con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);
        try {
            $con->begin();
            //$this->getUser()->setCulture("cn");
            print_r("Start<br>");
            /*$c = new Criteria();
            $c->add(MlmDailyBonusLogPeer::BONUS_TYPE, Globals::DAILY_BONUS_LOG_TYPE_DAILY);
            $c->addDescendingOrderByColumn(MlmDailyBonusLogPeer::BONUS_DATE);
            $mlmDailyBonusLogDB = MlmDailyBonusLogPeer::doSelectOne($c);
            print_r("Fetch Daily Bonus Log<br>");

            $dateUtil = new DateUtil();
            $currentDate = $dateUtil->formatDate("Y-m-d", date("Y-m-d"));
            print_r("currentDate=".$currentDate."<br>");

            if ($mlmDailyBonusLogDB) {
                $bonusDate = $dateUtil->formatDate("Y-m-d", $mlmDailyBonusLogDB->getBonusDate());
                print_r("bonusDate=".$bonusDate."<br>");*/

                //$level = 0;
                //while ($level < 10) {
                    //print_r("level start ".$level."<br><br>");
                    //if ($bonusDate == $currentDate) {
                        //print_r("break<br>");
                        //break;
                    //}

            $c = new Criteria();
            $c->add(MlmDistInvestmentPackageBatchPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $c->add(MlmDistInvestmentPackageBatchPeer::BONUS_DATE, date("Y/m/d h:i:s A"), Criteria::LESS_THAN);
            $mlm_dist_investment_package_batch = MlmDistInvestmentPackageBatchPeer::doSelectOne($c);

            $dateUtil = new DateUtil();
            $date = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), Globals::BONUS_CALCULATION_DAY, 0, 0));

            if ($mlm_dist_investment_package_batch) {
                $mlm_dist_investment_package_batch_new = new MlmDistInvestmentPackageBatch();
                $mlm_dist_investment_package_batch_new->setTotalPackage(0);
                $mlm_dist_investment_package_batch_new->setBonusDate($date);
                $mlm_dist_investment_package_batch_new->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_dist_investment_package_batch_new->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch_new->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch_new->save();

                $mlm_dist_investment_package_batch->setStatusCode(Globals::STATUS_PROCESSING);
                $mlm_dist_investment_package_batch->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch->save();

                //$totalInvestmentPackageSold = $this->getTotalCurrentInvestmentPackageSold();
                $totalPackageSoldFromSystem = $this->getTotalInvestmentPackageSold(null);

                $totalPackageInvested = $this->toFreezeAndCalculateInvestmentPackage($mlm_dist_investment_package_batch->getBatchId());
                // 1000 * 0.9 (10 percent give to system maintenenace) * 0.9 (direct sponsor payout) * $totalPackageInvested / $totalPackageSoldFromSystem
                $eachInvestmentPackageFundReturn = (Globals::INVESTMENT_PACKAGE_PRICE * Globals::TOTAL_INVESTMENT_BONUS_PAYOUT * Globals::TOTAL_INVESTMENT_BONUS_PAYOUT) * $totalPackageInvested / $totalPackageSoldFromSystem;

                $eachInvestmentPackageFundReturn = $this->format2decimal($eachInvestmentPackageFundReturn);

                $eachPackageEarn = $eachInvestmentPackageFundReturn;
                print_r("totalPackageSoldFromSystem= ".$totalPackageSoldFromSystem."<br><br>");
                print_r("totalPackageInvested= ".$totalPackageInvested."<br><br>");
                print_r("eachPackageEarn= ".$eachPackageEarn."<br><br>");

                $query = "SELECT SUM(package.total_package) AS _SUM, package.dist_id
                            FROM mlm_dist_investment_package package
                        LEFT JOIN mlm_distributor dist ON dist.distributor_id = package.dist_id
                        WHERE package.status_code = '".Globals::STATUS_ACTIVE."'
                            AND dist.status_code = '".Globals::STATUS_ACTIVE."'
                            AND package.bonus_release <> '".Globals::STATUS_PENDING."'
                        GROUP BY package.dist_id";
                //var_dump($query);

                $connection = Propel::getConnection();
                $statement = $connection->prepareStatement($query);
                $resultset = $statement->executeQuery();

                $totalPaidOutBonus = 0;
                while ($resultset->next()) {
                    $arr = $resultset->getRow();
                    if ($arr["_SUM"] != null) {
                        $distTotalInvestedPackage = $arr["_SUM"];
                        $distIdInvested = $arr["dist_id"];

                        print_r("Dist Id= ".$distIdInvested."<br><br>");
                        if ($distIdInvested == Globals::SYSTEM_COMPANY_DIST_ID)
                            continue;
                        /******************************/
                        /*  package investment
                        /******************************/
                        // total networks
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $distIdInvested);
                        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
                        $totalNetworks = MlmDistributorPeer::doCount($c);

                        // getTotalTreePackageInvested
                        $totalTreePackageInvested = $this->getTotalTreePackageInvested($distIdInvested);
                        $totalFundManagementGain = $this->getTotalFundManagementGain($distIdInvested);

                        $bonusAmount = $this->format2decimal($eachPackageEarn * $distTotalInvestedPackage);
                        $totalPaidOutBonus += $bonusAmount;

                        if ($bonusAmount <= 0)
                            continue;

                        $distAccountEcashBalance = $this->getAccountBalance($distIdInvested, Globals::ACCOUNT_TYPE_ECASH);
                        $distAccountEcashBalance = $distAccountEcashBalance + $bonusAmount;

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distIdInvested);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit($bonusAmount);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distAccountEcashBalance);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        $accountId = $mlm_account_ledger->getAccountId();

                        $maintenanceCommission = $bonusAmount / 2;

                        $distAccountEcashBalance = $distAccountEcashBalance - $maintenanceCommission;

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distIdInvested);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_MAINTENANCE);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit(0);
                        $mlm_account_ledger->setDebit($maintenanceCommission);
                        $mlm_account_ledger->setBalance($distAccountEcashBalance);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        /******************************/
                        /*  Flushing
                        /******************************/
                        $flushLimit = 9999999999;
                        if ($totalNetworks == 0) {
                            $flushLimit = $distTotalInvestedPackage * 2 * Globals::INVESTMENT_PACKAGE_PRICE;
                        } else {
                            if ($totalTreePackageInvested >= ($distTotalInvestedPackage * 2 * Globals::INVESTMENT_PACKAGE_PRICE)) {
                                // infinity;
                            } else {
                                $flushLimit = $distTotalInvestedPackage * 4 * Globals::INVESTMENT_PACKAGE_PRICE;
                            }
                        }
                        $totalFundManagementGain = $totalFundManagementGain + $maintenanceCommission;

                        print_r("distIdInvested= ".$distIdInvested."<br>");
                        print_r("totalFundManagementGain= ".$totalFundManagementGain."<br>");
                        print_r("totalTreePackageInvested= ".$totalTreePackageInvested."<br>");
                        print_r("distTotalInvestedPackage= ".$distTotalInvestedPackage."<br>");
                        print_r("totalNetworks= ".$totalNetworks."<br>");
                        if ($flushLimit < $totalFundManagementGain) {
                            $flushAmount = $totalFundManagementGain - $flushLimit;

                            if ($flushAmount > $maintenanceCommission) {
                                $flushAmount = $maintenanceCommission;
                            }
                            print_r("flushAmount= ".$flushAmount."<br><br>");
                            $mlm_account_ledger = new MlmAccountLedger();
                            $mlm_account_ledger->setDistId($distIdInvested);
                            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FLUSH);
                            $mlm_account_ledger->setRemark("Total Fund Management Gain:".$totalFundManagementGain.", Total Invested Package:".$distTotalInvestedPackage.", Total Networks:".$totalNetworks.", FLUSH LIMIT:".$flushLimit);
                            $mlm_account_ledger->setCredit(0);
                            $mlm_account_ledger->setDebit($flushAmount);
                            $mlm_account_ledger->setBalance($distAccountEcashBalance - $flushAmount);
                            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->save();

                            $distributorTerminatedDB = MlmDistributorPeer::retrieveByPK($distIdInvested);
                            $distributorTerminatedDB->setStatusCode(Globals::STATUS_TERMINATE);
                            $distributorTerminatedDB->save();
                        }

                        /******************************/
                        /*  Maintenance
                        /******************************/
                        $distAccountMaintenanceBalance = $this->getAccountBalance($distIdInvested, Globals::ACCOUNT_TYPE_MAINTENANCE);

                        $mlm_account_ledger = new MlmAccountLedger();
                        $mlm_account_ledger->setDistId($distIdInvested);
                        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_MAINTENANCE);
                        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                        $mlm_account_ledger->setRemark("");
                        $mlm_account_ledger->setCredit($maintenanceCommission);
                        $mlm_account_ledger->setDebit(0);
                        $mlm_account_ledger->setBalance($distAccountMaintenanceBalance + $maintenanceCommission);
                        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_account_ledger->save();

                        /******************************/
                        /*  Commission
                        /******************************/
                        $commissionBalance = $this->getCommissionBalance($distIdInvested, Globals::COMMISSION_TYPE_FUND_MANAGEMENT);

                        $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                        $sponsorDistCommissionledger->setDistId($distIdInvested);
                        $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_FUND_MANAGEMENT);
                        $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_INVESTMENT_PACKAGE);
                        $sponsorDistCommissionledger->setCredit($bonusAmount);
                        $sponsorDistCommissionledger->setDebit(0);
                        $sponsorDistCommissionledger->setAccountId($accountId);
                        $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                        $sponsorDistCommissionledger->setBalance($commissionBalance + $bonusAmount);
                        $sponsorDistCommissionledger->setRemark("");
                        $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $sponsorDistCommissionledger->save();

                        /******************************/
                        /*  Direct Sponsor Bonus
                        /******************************/
                        // 1000 * 0.9 (10 percent give to system maintenenace) * 0.9 (direct sponsor payout) * $totalInvestmentPackageSold / $totalPackageSoldFromSystem
                        //$eachInvestmentPackageFundReturn = (Globals::INVESTMENT_PACKAGE_PRICE * Globals::TOTAL_INVESTMENT_BONUS_PAYOUT * Globals::TOTAL_INVESTMENT_BONUS_PAYOUT) * $totalInvestmentPackageSold / $totalPackageSoldFromSystem;

                        $bonusPayout = $bonusAmount  / (Globals::TOTAL_INVESTMENT_BONUS_PAYOUT * 10); // the 10% from the bonus
                        $firstLevel = $bonusPayout * 0.5;
                        $secondLevel = $bonusPayout * 0.3;
                        $thirdLevel = $bonusPayout * 0.2;

                        $level = 1;
                        $distributorDB = MlmDistributorPeer::retrieveByPK($distIdInvested);
                        $bonusDistributorCode = $distributorDB->getDistributorCode();
                        $uplineDistId = $distributorDB->getUplineDistId();

                        while ($level <= 3) {
                            if ($uplineDistId == null) {
                                break;
                            }
                            $remarks = "PURCHASE INVESTMENT PACKAGE (" . $bonusDistributorCode . "), tier:". $level.", bonus amount:". $bonusAmount;
                            $remarksCN = $this->getContext()->getI18N()->__("PURCHASE INVESTMENT PACKAGE (%1%), tier:%2%, bonus amount:%3%", array('%1%' => $bonusDistributorCode, '%2%' => $level, '%3%' => $bonusAmount));

                            $distributorDB = MlmDistributorPeer::retrieveByPK($uplineDistId);
                            if (!$distributorDB) {
                                break;
                            }

                            if ($distributorDB->getStatusCode() != Globals::STATUS_ACTIVE || $this->entitiedInvestmentPackageBonus($uplineDistId) == false) {
                                $uplineDistId = $distributorDB->getUplineDistId();
                                //$level++;
                                continue;
                            }
                            //******************************
                            //*  upline commission ecash
                            //******************************

                            $distAccountEcashBalance = $this->getAccountBalance($uplineDistId, Globals::ACCOUNT_TYPE_ECASH);

                            $drbCommission = 0;
                            if ($level == 1) {
                                $drbCommission = $firstLevel;
                            } else if ($level == 2) {
                                $drbCommission = $secondLevel;
                            } else if ($level == 3) {
                                $drbCommission = $thirdLevel;
                            }
                            $distAccountEcashBalance = $distAccountEcashBalance + $drbCommission;

                            $mlm_account_ledger = new MlmAccountLedger();
                            $mlm_account_ledger->setDistId($uplineDistId);
                            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
                            $mlm_account_ledger->setRemark($remarks);
                            $mlm_account_ledger->setCredit($drbCommission);
                            $mlm_account_ledger->setDebit(0);
                            $mlm_account_ledger->setBalance($distAccountEcashBalance);
                            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->save();

                            $accountId = $mlm_account_ledger->getAccountId();

                            $commissionBalance = $this->getCommissionBalance($uplineDistId, Globals::COMMISSION_TYPE_GDB);

                            $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                            $sponsorDistCommissionledger->setDistId($uplineDistId);
                            $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
                            $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_INVESTMENT);
                            $sponsorDistCommissionledger->setCredit($drbCommission);
                            $sponsorDistCommissionledger->setDebit(0);
                            $sponsorDistCommissionledger->setAccountId($accountId);
                            $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                            $sponsorDistCommissionledger->setBalance($commissionBalance + $drbCommission);
                            $sponsorDistCommissionledger->setRemark($remarks);
                            $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $sponsorDistCommissionledger->save();

                            if ($distributorDB) {
                                $uplineDistId = $distributorDB->getUplineDistId();
                            } else {
                                break;
                            }
                            $level++;
                        }
                    }
                }

                $this->unFreezeInvestmentPackage();

                $mlm_dist_investment_package_batch->setTotalPackage($totalPackageInvested);
                $mlm_dist_investment_package_batch->setPaidOutBonus($totalPaidOutBonus);
                $mlm_dist_investment_package_batch->setBonusPerPackage($eachInvestmentPackageFundReturn);
                $mlm_dist_investment_package_batch->setStatusCode(Globals::STATUS_COMPLETE);
                $mlm_dist_investment_package_batch->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package_batch->save();
            }

            // auto purchase investment package
            $sql = "SELECT dist_id, SUM(credit - debit) as maintenance_credit
                        FROM mlm_account_ledger WHERE account_type = 'MAINTENANCE'
                    GROUP BY dist_id  HAVING SUM(credit - debit) >= ".Globals::INVESTMENT_PACKAGE_PRICE;

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($sql);
            $resultset = $statement->executeQuery();

            print_r("maintenance_credit<br>");

            while ($resultset->next()) {
                $arr = $resultset->getRow();
                $maintenance_credit = $arr["maintenance_credit"];
                $distIdInvested = $arr["dist_id"];

                //$modulusPrice = $maintenance_credit % Globals::INVESTMENT_PACKAGE_PRICE;
                $investmentPackageUnit = $maintenance_credit / Globals::INVESTMENT_PACKAGE_PRICE;

                $totalAmount = floor($investmentPackageUnit) * Globals::INVESTMENT_PACKAGE_PRICE;
                $totalAmount = $totalAmount;
                $maintenance_credit = $maintenance_credit - $totalAmount;

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setDistId($distIdInvested);
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_MAINTENANCE);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_INVESTMENT);
                $mlm_account_ledger->setRemark("PURCHASE INVESTMENT PACKAGE");
                $mlm_account_ledger->setCredit(0);
                $mlm_account_ledger->setDebit($totalAmount);
                $mlm_account_ledger->setBalance($maintenance_credit);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                /******************************/
                /*  mlm_dist_investment_package
                /******************************/
                $c = new Criteria();
                $c->add(MlmDistInvestmentPackageBatchPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
                $mlm_dist_investment_package_batch = MlmDistInvestmentPackageBatchPeer::doSelectOne($c);

                if (!$mlm_dist_investment_package_batch) {
                    $dateUtil = new DateUtil();
                    $date = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), Globals::BONUS_CALCULATION_DAY, 0, 0));

                    $mlm_dist_investment_package_batch = new MlmDistInvestmentPackageBatch();
                    $mlm_dist_investment_package_batch->setTotalPackage($investmentPackageUnit);
                    $mlm_dist_investment_package_batch->setBonusDate($date);
                    $mlm_dist_investment_package_batch->setStatusCode(Globals::STATUS_ACTIVE);
                    $mlm_dist_investment_package_batch->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_investment_package_batch->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_investment_package_batch->save();
                } else {
                    $totalPackage = $investmentPackageUnit + $mlm_dist_investment_package_batch->getTotalPackage();
                    $mlm_dist_investment_package_batch->setTotalPackage($totalPackage);
                    $mlm_dist_investment_package_batch->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_investment_package_batch->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_investment_package_batch->save();
                }

                $mlm_dist_investment_package = new MlmDistInvestmentPackage();
                $mlm_dist_investment_package->setBatchId($mlm_dist_investment_package_batch->getBatchId());
                $mlm_dist_investment_package->setDistId(Globals::SYSTEM_COMPANY_DIST_ID);
                $mlm_dist_investment_package->setTotalPackage($investmentPackageUnit);
                $mlm_dist_investment_package->setTotalAmount($totalAmount);
                $mlm_dist_investment_package->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_dist_investment_package->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_dist_investment_package->save();
            }

            $c = new Criteria();
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $dists = MlmDistributorPeer::doSelect($c);
            foreach ($dists as $dist) {
                $c = new Criteria();
                $c->add(MlmDistInvestmentPeer::DIST_ID, $dist->getDistributorId());
                $c->add(MlmDistInvestmentPeer::EXPIRED_DATE, date("Y/m/d h:i:s A"), Criteria::GREATER_THAN);
                $mlmDistInvestment = MlmDistInvestmentPeer::doSelectOne($c);


                //print_r("<br>");
                if (!$mlmDistInvestment) {
                    //print_r("not exist");
                    $dist->setStatusCode(Globals::STATUS_INACTIVE);
                    $dist->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $dist->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $dist->save();
                } else {
                    //print_r("exist");
                }
            }

            //$bonusDate = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate($bonusDate, 1, 0, 0));
            $mlm_daily_bonus_log = new MlmDailyBonusLog();
            $mlm_daily_bonus_log->setAccessIp($this->getRequest()->getHttpHeader('addr','remote'));
            $mlm_daily_bonus_log->setBonusType(Globals::DAILY_BONUS_LOG_TYPE_DAILY);
            $mlm_daily_bonus_log->setBonusDate(date("Y/m/d h:i:s A"));
            $mlm_daily_bonus_log->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_daily_bonus_log->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_daily_bonus_log->save();
                    //$level++;
                //}
            //}
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            //throw $e;
        }

        print_r("<br>sendDailyReport<br>");
        $this->sendDailyReport();
        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    function sendDailyReport()
    {
        $body = "";
        $body .= $this->getAllBonusData();
        $body .= $this->getPackageSaleData();

        $sendMailService = new SendMailService();
        $dateUtil = new DateUtil();
        $subject = "Daily Report ".$dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), -1, 0, 0));

        $sendMailService->sendMail("support@fxcmiscc.com", "Boss", $subject, $body, Mails::EMAIL_SENDER, "r9projecthost@gmail.com");
    }

    function getAllBonusData() {

        $bonusService = new BonusService();

        $body = "<h3>All Bonus Data</h3><table width='100%' style='border-color: #DDDDDD -moz-use-text-color -moz-use-text-color #DDDDDD;border-image: none; border-style: solid none none solid;border-width: 1px 0 0 1px;'>
                    <thead>
                    <tr>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>DATE</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>DRB</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>GENERATION BONUS</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>OVERRIDING BONUS</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>PAIRING BONUS</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>UP 1 DOWN 3</th>
                    </tr>
                    </thead>
                    <tbody>";

        $dateUtil = new DateUtil();

        for ($i = 0; $i < 3; $i++) {
            $queryDate = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), ($i + 1) * -1, 0, 0));
            $queryDateForGrb = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), $i * -1, 0, 0));

            $totalDrb = $bonusService->doCalculateDrb($queryDate);
            $totalGenerationBonus = $bonusService->doCalculateGenerationBonus($queryDate);
            $overridingBonus = $bonusService->doCalculateOverridingBonus($queryDate);
            $pairingBonus = 0;
            $up1Down3 = 0;

            $body .= "<tr class='sf_admin_row_1'>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".$queryDate."</td>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($totalDrb,2)."</td>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($totalGenerationBonus,2)."</td>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($overridingBonus,2)."</td>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($pairingBonus,2)."</td>
                    <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($up1Down3,2)."</td>
                </tr>";
        }

        $body .= "</tbody>
                </table>";

        return $body;
    }

    function getPackageSaleData() {
        $bonusService = new BonusService();
        $dateUtil = new DateUtil();
        $queryDate = $dateUtil->formatDate("Y-m-d", $dateUtil->addDate(date("Y-m-d"), -1, 0, 0));
        $packageArrs = $bonusService->doCalculatePackage($queryDate);

        $body = "<h3>Sales for today</h3><table width='100%' style='border-color: #DDDDDD -moz-use-text-color -moz-use-text-color #DDDDDD;border-image: none; border-style: solid none none solid;border-width: 1px 0 0 1px;'>
                    <thead>
                    <tr>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>Package Name</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>Qty</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>Price</th>
                        <th style='background-color: #CCCCFF; padding: 2px; text-align: left;'>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>";

        $totalAmount = 0;
        foreach ($packageArrs as $packageArr) {
            $totalAmount = $totalAmount + ($packageArr["qty"] * $packageArr["price"]);
            $body .= "<tr class='sf_admin_row_1'>
                        <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".$packageArr['name']."</td>
                        <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".$packageArr['qty']."</td>
                        <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($packageArr['price'],2)."</td>
                        <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".number_format($packageArr["qty"] * $packageArr["price"],2)."</td>
                    </tr>";
        }
        $body .= "<tr class='sf_admin_row_1'>
            <td colspan='3' align='right' style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>Total Amount</td>
            <td style='background-color: #EEEEFF; border-bottom: 1px solid #DDDDDD; border-right: 1px solid #DDDDDD; padding: 3px;'>".$totalAmount."</td>
        </tr>";
        $body .= "</tbody>
                </table>";

        return $body;
    }

    public function executeDownloadMt4()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/exe');
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Disposition','attachment; filename=pro4setup.exe', TRUE);
        $response->sendHttpHeaders();
        readfile(sfConfig::get('sf_upload_dir')."/pro4setup.exe");
        return sfView::NONE;
    }

    public function executeAccountConversion()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "MY_ACCOUNT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "ACCOUNT_CONVERT");

        if ($this->getUser()->getAttribute(Globals::SESSION_SECURITY_PASSWORD_REQUIRED_CONVERT, false) == false) {
            return $this->redirect('/member/securityPasswordRequired?doAction=CONVERT');
        }

        $ecashAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $fxcmisccAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_FXCMISCC);
        $passiveAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_CP4);
        $this->ecashAccountBalance = $ecashAccountBalance;
        $this->fxcmisccAccountBalance = $fxcmisccAccountBalance;
        $this->passiveAccountBalance = $passiveAccountBalance;

        $convertAmount = $this->getRequestParameter('convertAmount');
        $doAction = $this->getRequestParameter('doAction');

        if ($this->getRequestParameter('convertAmount') > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            if (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
                return $this->redirect('/member/accountConversion');
            }

            if ($doAction == "CURRENT_TO_EWALLET") {
                if ($convertAmount > $fxcmisccAccountBalance) {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient funds from FXCMISCC Wallet"));
                    return $this->redirect('/member/accountConversion');
                } else {
                    if ($convertAmount > 0) {
                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_FXCMISCC);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FXCMISCC_TO_EWALLET);
                        $tbl_account_ledger->setCredit(0);
                        $tbl_account_ledger->setDebit($convertAmount);
                        $tbl_account_ledger->setBalance($fxcmisccAccountBalance - $convertAmount);
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();

                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_CONVERT_FROM_FXCMISCC);
                        $tbl_account_ledger->setCredit($convertAmount);
                        $tbl_account_ledger->setDebit(0);
                        $tbl_account_ledger->setBalance($ecashAccountBalance + $convertAmount);
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();

                        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Account Conversion successful."));

                        return $this->redirect('/member/accountConversion');
                    }
                }
            } else if ($doAction == "PASSIVE_TO_EWALLET") {
                if ($convertAmount > $passiveAccountBalance) {
                    $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient funds from Passive Wallet"));
                    return $this->redirect('/member/accountConversion');
                } else {
                    if ($convertAmount > 0) {
                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_CP4);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_PASSIVE_TO_EWALLET);
                        $tbl_account_ledger->setCredit(0);
                        $tbl_account_ledger->setDebit($convertAmount);
                        $tbl_account_ledger->setBalance($passiveAccountBalance - $convertAmount);
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();

                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_CONVERT_FROM_PASSIVE);
                        $tbl_account_ledger->setCredit($convertAmount);
                        $tbl_account_ledger->setDebit(0);
                        $tbl_account_ledger->setBalance($ecashAccountBalance + $convertAmount);
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();

                        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Account Conversion successful."));

                        return $this->redirect('/member/accountConversion');
                    }
                }
            }
        }
    }

    public function executePurchasePackage()
    {
        $pendingDistId = $this->getRequestParameter('p');

        $c = new Criteria();

        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, $pendingDistId);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_PENDING);
        $pendingDistDB = MlmDistributorPeer::doSelectOne($c);
        $this->forward404Unless($pendingDistDB);

        $c = new Criteria();
        $c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
        $packageDBs = MlmPackagePeer::doSelect($c);

        $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
        $this->pointAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
        $this->pendingDistDB = $pendingDistDB;
        $this->packageDBs = $packageDBs;
    }

    public function executePackageUpgrade()
    {
        if ($this->getRequestParameter('transactionPassword') <> "" && $this->getRequestParameter('packageId') <> "") {
            $packageId = $this->getRequestParameter('packageId');
            $ePointPaid = $this->getRequestParameter('ePointPaid');
            $eCashPaid = $this->getRequestParameter('eCashPaid');
            $promoPaid = $this->getRequestParameter('promoPaid');
            $amountPaid = $ePointPaid + $eCashPaid + $promoPaid;

            $packageDB = MlmPackagePeer::retrieveByPK($packageId);
            if (!$packageDB) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
                return $this->redirect('/member/packageUpgrade');
            }
            $amountNeeded = $packageDB->getPrice();
            $ledgerEPointBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
            $sponsorEcashBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
            $sponsorPromoBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);

            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $distId = $distDB->getDistributorId();
            $distPackage = MlmPackagePeer::retrieveByPK($distDB->getMt4RankId());

            if ($amountNeeded != $amountPaid) {
                $this->setFlash('errorMsg', "The total funds is not match with package price");
                return $this->redirect('/member/packageUpgrade');
            }
            if (($ePointPaid + Globals::REGISTER_FEE) > $ledgerEPointBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to upgrade package"));
                return $this->redirect('/member/packageUpgrade');
            }
            if ($ePointPaid > $ledgerEPointBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to upgrade package"));
                return $this->redirect('/member/packageUpgrade');
            }
            if ($eCashPaid > $sponsorEcashBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to upgrade package"));
                return $this->redirect('/member/packageUpgrade');
            }
            if ($promoPaid > $sponsorPromoBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient fund to upgrade package"));
                return $this->redirect('/member/packageUpgrade');
            }
            if (($amountNeeded / 2) > $ePointPaid) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Minimum RP Wallet required is ") . ($amountNeeded / 2));
                return $this->redirect('/member/packageUpgrade');
            }

            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));
            if (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));
                return $this->redirect('/member/packageUpgrade');
            } else {
                $con = Propel::getConnection(MlmDistributorPeer::DATABASE_NAME);
                try {
                    $con->begin();

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_UPGRADE);
                    $mlm_account_ledger->setRemark("PACKAGE UPGRADED FROM ".$distPackage->getPackageName()." => ".$packageDB->getPackageName());
                    $mlm_account_ledger->setCredit(0);
                    $mlm_account_ledger->setDebit($ePointPaid);
                    $mlm_account_ledger->setBalance($ledgerEPointBalance - $ePointPaid);
                    $mlm_account_ledger->setRefId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $mlm_account_ledger->setRefType("DISTRIBUTOR");
                    $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_account_ledger->save();

                    if (Globals::REGISTER_FEE > 0) {
                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER_FEE);
                        $tbl_account_ledger->setRemark("PACKAGE UPGRADED FROM ".$distPackage->getPackageName()." => ".$packageDB->getPackageName());
                        $tbl_account_ledger->setCredit(0);
                        $tbl_account_ledger->setDebit(Globals::REGISTER_FEE);
                        $tbl_account_ledger->setBalance($ledgerEPointBalance - $ePointPaid - Globals::REGISTER_FEE);
                        $tbl_account_ledger->setRefId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setRefType("DISTRIBUTOR");
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();
                    }

                    if ($eCashPaid > 0) {
                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                        $tbl_account_ledger->setRemark("PACKAGE UPGRADED FROM ".$distPackage->getPackageName()." => ".$packageDB->getPackageName());
                        $tbl_account_ledger->setCredit(0);
                        $tbl_account_ledger->setDebit($eCashPaid);
                        $tbl_account_ledger->setBalance($sponsorEcashBalance - $eCashPaid);
                        $tbl_account_ledger->setRefId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setRefType("DISTRIBUTOR");
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();
                    }

                    if ($promoPaid > 0) {
                        $tbl_account_ledger = new MlmAccountLedger();
                        $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
                        $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
                        $tbl_account_ledger->setRemark("PACKAGE UPGRADED FROM ".$distPackage->getPackageName()." => ".$packageDB->getPackageName());
                        $tbl_account_ledger->setCredit(0);
                        $tbl_account_ledger->setDebit($promoPaid);
                        $tbl_account_ledger->setBalance($sponsorPromoBalance - $promoPaid);
                        $tbl_account_ledger->setRefId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                        $tbl_account_ledger->setRefType("DISTRIBUTOR");
                        $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $tbl_account_ledger->save();
                    }

                    // ******       Package Upgrade History      ****************
                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_UPGRADE);
                    $mlmPackageUpgradeHistory->setAmount($amountNeeded);
                    $mlmPackageUpgradeHistory->setPackageId($packageDB->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_ACTIVE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$distPackage->getPackageName(). " (" . $distPackage->getPrice(). ") => ".$packageDB->getPackageName(). " (" . $packageDB->getPrice(). ")");
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $distDB->setMt4RankId($packageDB->getPackageId());

                    if ($distDB->getRankId() < $packageDB->getPackageId()) {
                        $distDB->setRankId($packageDB->getPackageId());
                        $distDB->setRankCode($packageDB->getPackageName());
                    }
                    $distDB->save();

                    $sponsorId = $distDB->getDistributorId();
                    if ($distDB->getUplineDistId()) {
                        $uplineDistDB = MlmDistributorPeer::retrieveByPK($distDB->getUplineDistId());
                        /**************************************/
                        /*  Direct REFERRAL Bonus For Upline
                        /**************************************/
                        $packagePrice = $amountNeeded;
                        $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
                        //$directSponsorPercentage = $uplineDistPackage->getCommission();

                        $directSponsorPercentage = 0;
                        if ($uplineDistDB->getIsIb() == Globals::YES) {
                            $directSponsorPercentage = $uplineDistDB->getIbCommission();
                        }

                        if ($directSponsorPercentage < $uplineDistPackage->getCommission()) {
                            $directSponsorPercentage = $uplineDistPackage->getCommission();
                        }
                        $directSponsorBonusAmount = $directSponsorPercentage * $packagePrice / 100;

                        $totalBonusPayOut = $directSponsorPercentage;

                        /******************************/
                        /*  Direct Sponsor Bonus
                        /******************************/
                        $firstForDRB = true;
                        $uplineDistId = $uplineDistDB->getDistributorId();
                        while ($totalBonusPayOut <= Globals::TOTAL_BONUS_PAYOUT) {
                            if ($uplineDistId == null || $uplineDistId == "") {
                                break;
                            }
                            $distAccountEcashBalance = $this->getAccountBalance($uplineDistId, Globals::ACCOUNT_TYPE_ECASH);

                            $mlm_account_ledger = new MlmAccountLedger();
                            $mlm_account_ledger->setDistId($uplineDistId);
                            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
                            $mlm_account_ledger->setRemark("PACKAGE UPGRADE TO ".$packageDB->getPackageName()." (" . $packageDB->getPrice(). ") ".$directSponsorPercentage."% (" . $distDB->getDistributorCode() . ")");
                            $mlm_account_ledger->setCredit($directSponsorBonusAmount);
                            $mlm_account_ledger->setDebit(0);
                            $mlm_account_ledger->setBalance($distAccountEcashBalance + $directSponsorBonusAmount);
                            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $mlm_account_ledger->save();

                            /******************************/
                            /*  Commission
                            /******************************/
                            $c = new Criteria();
                            $c->add(MlmDistCommissionLedgerPeer::DIST_ID, $uplineDistId);
                            $c->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, Globals::COMMISSION_TYPE_DRB);
                            $c->addDescendingOrderByColumn(MlmDistCommissionLedgerPeer::CREATED_ON);
                            $sponsorDistCommissionLedgerDB = MlmDistCommissionLedgerPeer::doSelectOne($c);

                            $dsbBalance = 0;
                            if ($sponsorDistCommissionLedgerDB)
                                $dsbBalance = $sponsorDistCommissionLedgerDB->getBalance();

                            $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                            $sponsorDistCommissionledger->setDistId($uplineDistId);
                            $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
                            $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_REGISTER);
                            $sponsorDistCommissionledger->setCredit($directSponsorBonusAmount);
                            $sponsorDistCommissionledger->setDebit(0);
                            $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                            $sponsorDistCommissionledger->setBalance($dsbBalance + $directSponsorBonusAmount);
                            if ($firstForDRB == true) {
                                $sponsorDistCommissionledger->setRemark("DRB FOR PACKAGE UPGRADE TO ".$packageDB->getPackageName()." (" . $packageDB->getPrice(). ") ".$directSponsorPercentage."% (" . $distDB->getDistributorCode() . ")");
                                $firstForDRB = false;
                            } else {
                                $sponsorDistCommissionledger->setRemark("GRB FOR PACKAGE UPGRADE TO ".$packageDB->getPackageName()." (" . $packageDB->getPrice(). ") ".$directSponsorPercentage."% (" . $distDB->getDistributorCode() . ")");
                            }
                            $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                            $sponsorDistCommissionledger->save();

                            if ($totalBonusPayOut < Globals::TOTAL_BONUS_PAYOUT) {
                                if ($uplineDistDB->getUplineDistId() == null)
                                    break;

                                    $checkCommission = true;
                                    $uplineDistId = $uplineDistDB->getUplineDistId();
                                    while ($checkCommission == true) {
                                        $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);

                                        if (!$uplineDistDB) {
                                            break;
                                        }
                                        //print_r("totalBonusPayOut:".$totalBonusPayOut."<br>");
                                        //print_r("$uplineDistId:".$uplineDistId."<br>");
                                        //print_r("getIsIb:".$uplineDistDB->getIsIb()."<br>");
                                        $directSponsorPercentage = 0;
                                        if ($uplineDistDB->getIsIb() == Globals::YES) {
                                            $directSponsorPercentage = $uplineDistDB->getIbCommission();
                                        }
                                        $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());

                                        if ($directSponsorPercentage < $uplineDistPackage->getCommission()) {
                                            $directSponsorPercentage = $uplineDistPackage->getCommission();
                                        }

                                        if ($directSponsorPercentage > $totalBonusPayOut) {
                                            $directSponsorPercentage = $directSponsorPercentage - $totalBonusPayOut;
                                            $totalBonusPayOut += $directSponsorPercentage;
                                            if ($totalBonusPayOut > Globals::TOTAL_BONUS_PAYOUT) {
                                                $directSponsorPercentage = $directSponsorPercentage - ($totalBonusPayOut - Globals::TOTAL_BONUS_PAYOUT);
                                            }
                                        } else {
                                            if ($uplineDistDB->getUplineDistId() == null)
                                                break;
                                            $uplineDistId = $uplineDistDB->getUplineDistId();
                                            continue;
                                        }

                                        $directSponsorBonusAmount = $directSponsorPercentage * $packageDB->getPrice() / 100;
                                        $checkCommission == false;
                                        break;
                                    }
                                } else {
                                    break;
                                }
                        }
                    }

                    $sponsorUplineDistId = $distDB->getUplineDistId();
                    if ($sponsorUplineDistId != "") {
                        $uplineDistDB = MlmDistributorPeer::retrieveByPK($sponsorUplineDistId);

                        $level = 0;
                        while ($level < 100) {
                            if (!$uplineDistDB)
                                break;

                            $distId = $uplineDistDB->getDistributorId();
                            $packageId = $uplineDistDB->getRankId();
                            $uplinePackageDB = MlmPackagePeer::retrieveByPK($packageId);
                            $upgraded = false;
                            if ($uplinePackageDB) {
                                //var_dump($distId);
        //                        var_dump($packageId);
        //                        exit();
                                if ($packageId == 1) {
                                    $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);

                                    if ($upgraded == false) {
                                        $upgraded = $this->doCheckingSilver($uplineDistDB, $uplinePackageDB);
                                        if ($upgraded == false) {
                                            $upgraded = $this->doCheckingCopper($uplineDistDB, $uplinePackageDB);
                                        }
                                    }
                                } else if ($packageId == 2) {
                                    $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);
                                    if ($upgraded == false) {
                                        $upgraded = $this->doCheckingSilver($uplineDistDB, $uplinePackageDB);
                                    }
                                } else if ($packageId == 3) {
                                    $upgraded = $this->doCheckingGold($uplineDistDB, $uplinePackageDB);
                                } else if ($packageId == 4 || $packageId == 5 || $packageId == 6 || $packageId == 7) {
                                    $upgraded = $this->doCheckingDiamond($uplineDistDB, $uplinePackageDB);
                                /*} else if ($packageId == 4 || $packageId == 5) {
                                    $upgraded = $this->doCheckingDiamond($uplineDistDB, $uplinePackageDB);
                                } else if ($packageId == 6) {
                                    $upgraded = $this->doCheckingDiamondByPearl($uplineDistDB, $uplinePackageDB);
                                } else if ($packageId == 7) {
                                    $upgraded = $this->doCheckingVipByGem($uplineDistDB, $uplinePackageDB);
                                    if ($upgraded == false) {
                                        $upgraded = $this->doCheckingDiamondByPearl($uplineDistDB, $uplinePackageDB);
                                    }*/
                                } else if ($packageId == 21) {
                                    $upgraded = $this->doCheckingVip($uplineDistDB, $uplinePackageDB);

                                } else if ($packageId == 22) {
                                    $upgraded = $this->doCheckingDegold($uplineDistDB, $uplinePackageDB);
                                }
                            }

                            /*if ($upgraded == false) {
                                break;
                            }*/

                            $uplineDistId = $uplineDistDB->getUplineDistId();
                            //print_r("uplineDistId:".$uplineDistId);
                            //print_r("<br>");
                            if ($uplineDistId == null || $uplineDistId == "")
                                break;
                            //var_dump($uplineDistId);
                            $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);
                            //var_dump($uplineDistDB);
                            $level += 1;
                        }
                    }
                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
                $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Package upgraded successful."));

                return $this->redirect('/member/packageUpgrade');
            }
        } else {
            $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REGISTRATION");
            $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "PACKAGE_UPGRADE");

            $c = new Criteria();
            $c->add(MlmPackagePeer::PUBLIC_PURCHASE, 1);
            $c->addAscendingOrderByColumn(MlmPackagePeer::PACKAGE_ID);
            $packageDBs = MlmPackagePeer::doSelect($c);

            $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            if (!$distDB)
                return $this->redirect('/home/logout');

            $distPackage = MlmPackagePeer::retrieveByPK($distDB->getMt4RankId());

            $this->systemCurrency = $this->getAppSetting(Globals::SETTING_SYSTEM_CURRENCY);
            $this->pointAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_EPOINT);
            $this->ecashAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
            $this->promoAvailable = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);
            $this->packageDBs = $packageDBs;
            $this->distPackage = $distPackage;
            $this->distDB = $distDB;
        }
    }

    public function executeConvertEcashToPromo()
    {
        $ledgerAccountBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);
        $this->ledgerAccountBalance = $ledgerAccountBalance;

        $ecashAmount = $this->getRequestParameter('ecashAmount');
        $ecashAmount = str_replace(",", "", $ecashAmount);
        $distDB = MlmDistributorPeer::retrieveByPK($this->getUser()->getAttribute(Globals::SESSION_DISTID));

        if ($ecashAmount > 0 && $this->getRequestParameter('transactionPassword') <> "") {
            if ($this->checkIsDebitedAccount($this->getUser()->getAttribute(Globals::SESSION_DISTID), null, Globals::YES_Y, null, null, null, null, null, null)) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Convert e-Wallet To EP temporary out of service."));
                return $this->redirect('/member/convertEcashToPromo');
            }

            $tbl_user = AppUserPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_USERID));

            if ($ecashAmount > $ledgerAccountBalance) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("In-sufficient e-Wallet credit."));

            } elseif (strtoupper($tbl_user->getUserpassword2()) <> strtoupper($this->getRequestParameter('transactionPassword'))) {
                $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Security password"));

            } elseif ($ecashAmount > 0) {
                $con = Propel::getConnection();
                try {
                    $con->begin();

                    $ledgerPromoBalance = $this->getAccountBalance($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);

                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_CONVERT_PROMO);
                    $tbl_account_ledger->setCredit(0);
                    $tbl_account_ledger->setDebit($ecashAmount);
                    $tbl_account_ledger->setRemark("CONVERT ECASH (EW) TO PROMO (EP)");
                    $tbl_account_ledger->setBalance($ledgerAccountBalance - $ecashAmount);
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();

//                    $this->mirroringAccountLedger($tbl_account_ledger, "43");

                    $promoConvertedAmount = floor($ecashAmount * 1.05);

                    $tbl_account_ledger = new MlmAccountLedger();
                    $tbl_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_PROMO);
                    $tbl_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
                    $tbl_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_CONVERT);
                    $tbl_account_ledger->setCredit($promoConvertedAmount);
                    $tbl_account_ledger->setDebit(0);
                    $tbl_account_ledger->setRemark("CONVERT ECASH (EW) TO PROMO (EP), 5% EXTRA, ECASH: ".$ecashAmount);
                    $tbl_account_ledger->setBalance($ledgerPromoBalance + $promoConvertedAmount);
                    $tbl_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $tbl_account_ledger->save();

//                    $this->mirroringAccountLedger($tbl_account_ledger, "44");

                    $this->revalidateAccount($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_PROMO);
                    $this->revalidateAccount($this->getUser()->getAttribute(Globals::SESSION_DISTID), Globals::ACCOUNT_TYPE_ECASH);

                    $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Convert e-Wallet to EP successful."));

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
                return $this->redirect('/member/convertEcashToPromo');
            }
        }
    }

    /************************************************************************************************************************
     * function
     ************************************************************************************************************************/
    function getDistributorIdByCode($sponsorCode)
    {
        $userId = 0;

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorCode);
        //$c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        if ($existUser) {
            $userId = $existUser->getDistributorId();
        }

        return $userId;
    }

    function getDistributorInformation($distCode)
    {
        $c = new Criteria();

        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distCode);
        //$c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $distDB = MlmDistributorPeer::doSelectOne($c);
        if (!$distDB) {
            return null;
        }

        return $distDB;
    }

    function getCommissionBalance($distributorId, $commissionType)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger WHERE dist_id = " . $distributorId . " AND commission_type = '" . $commissionType . "'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function revalidatePairing($distributorId, $leftRight)
    {
        $balance = $this->getPairingBalance($distributorId, $leftRight);

        $c = new Criteria();
        $c->add(MlmDistPairingPeer::DIST_ID, $distributorId);
        $tbl_account = MlmDistPairingPeer::doSelectOne($c);

        if (!$tbl_account) {
            $tbl_account = new MlmDistPairing();
            $tbl_account->setDistId($distributorId);
            $tbl_account->setLeftBalance(0);
            $tbl_account->setRightBalance(0);
        }
        if (Globals::PLACEMENT_LEFT == $leftRight) {
            $tbl_account->setLeftBalance($balance);
        } else if (Globals::PLACEMENT_RIGHT == $leftRight) {
            $tbl_account->setRightBalance($balance);
        }

        $tbl_account->save();
    }

    function getPairingBalance($distributorId, $leftRight)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_dist_pairing_ledger WHERE dist_id = " . $distributorId . " AND left_right = '" . $leftRight . "'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $count = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getAccountBalance($distributorId, $accountType)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_account_ledger WHERE dist_id = " . $distributorId . " AND account_type = '" . $accountType . "'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function checkHasChild($distId)
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $distId);
        $c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $list = MlmDistributorPeer::doSelect($c);
        if ($list) {
            return true;
        }
        return false;
    }

    function doActivateAccount($uplineDistId, $sponsorId, $packageId, $paymentType)
    {
        $packageDB = MlmPackagePeer::retrieveByPK($packageId);
        $this->forward404Unless($packageDB);
        $packageAmount = $packageDB->getPrice();

        /* ****************************************************
         * get distributor last account ledger epoint balance
         * ***************************************************/
        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if ("epoint" == $paymentType) {
            $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_EPOINT);
        } else if ("ecash" == $paymentType) {
            $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        }
        $c->addDescendingOrderByColumn(MlmAccountLedgerPeer::CREATED_ON);
        $accountLedgerDB = MlmAccountLedgerPeer::doSelectOne($c);
        if (!$accountLedgerDB) {
            $accountLedgerDB = new MlmAccountLedger();
            $accountLedgerDB->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $accountLedgerDB->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            $accountLedgerDB->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
            $accountLedgerDB->setRemark("");
            $accountLedgerDB->setCredit(0);
            $accountLedgerDB->setDebit(0);
            $accountLedgerDB->setBalance(0);
            $accountLedgerDB->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $accountLedgerDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $accountLedgerDB->save();
        }

        $sponsorAccountBalance = $accountLedgerDB->getBalance();

        /* ****************************************************
         * get sponsored distributor and user
         * ***************************************************/
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, $sponsorId);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_PENDING);
        $sponsoredDistDB = MlmDistributorPeer::doSelectOne($c);
        $this->forward404Unless($sponsoredDistDB);

        $userDB = AppUserPeer::retrieveByPK($sponsoredDistDB->getUserId());
        $this->forward404Unless($userDB);

        /* ****************************************************
         * update sponsored distributor and user
         * ***************************************************/
        $sponsoredDistDB->setRankId($packageDB->getPackageId());
        $sponsoredDistDB->setRankCode($packageDB->getPackageName());
        $sponsoredDistDB->setInitRankId($packageDB->getPackageId());
        $sponsoredDistDB->setInitRankCode($packageDB->getPackageName());
        $sponsoredDistDB->setStatusCode(Globals::STATUS_ACTIVE);
        $sponsoredDistDB->setPackagePurchaseFlag("Y");
        $sponsoredDistDB->setActiveDatetime(date("Y/m/d h:i:s A"));
        $sponsoredDistDB->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $sponsoredDistDB->save();

        $userDB->setStatusCode(Globals::STATUS_ACTIVE);
        $userDB->save();

        /**************************************/
        /*  Direct REFERRER Bonus For Upline
        /**************************************/
        $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);
        if ($uplineDistDB) {
            //if ($uplineDistDB->getIbRankId() != null) {
            if ($uplineDistDB->getIsIb() == Globals::YES) {
                $directSponsorPercentage = $uplineDistDB->getIbCommission() * 100;
                $directSponsorBonusAmount = $directSponsorPercentage * $packageDB->getPrice() / 100;
            } else {
                $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
                $directSponsorPercentage = $uplineDistPackage->getCommission();
                $directSponsorBonusAmount = $directSponsorPercentage * $packageDB->getPrice() / 100;
            }
            $totalBonusPayOut = $directSponsorPercentage;

            $this->doSaveAccount($sponsorId, Globals::ACCOUNT_TYPE_ECASH, 0, 0, Globals::ACCOUNT_LEDGER_ACTION_REGISTER, "");
            $this->doSaveAccount($sponsorId, Globals::ACCOUNT_TYPE_EPOINT, 0, 0, Globals::ACCOUNT_LEDGER_ACTION_REGISTER, "");
            /* ****************************************************
           * Update upline distributor account
           * ***************************************************/
            $sponsorAccountBalance = $sponsorAccountBalance - $packageDB->getPrice();

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            if ("epoint" == $paymentType) {
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_EPOINT);
            } else if ("ecash" == $paymentType) {
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            }
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
            $mlm_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().")");
            $mlm_account_ledger->setCredit(0);
            $mlm_account_ledger->setDebit($packageDB->getPrice());
            $mlm_account_ledger->setBalance($sponsorAccountBalance);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();

            /******************************/
            /*  Direct Sponsor Bonus
            /******************************/
            $firstForDRB = true;
            while ($totalBonusPayOut <= Globals::TOTAL_BONUS_PAYOUT) {
                $distAccountEcashBalance = $this->getAccountBalance($uplineDistId, Globals::ACCOUNT_TYPE_ECASH);

                $mlm_account_ledger = new MlmAccountLedger();
                $mlm_account_ledger->setDistId($uplineDistId);
                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
                $mlm_account_ledger->setRemark("PACKAGE PURCHASE (".$packageDB->getPackageName().") ".$directSponsorPercentage."% (" . $sponsoredDistDB->getDistributorCode() . ")");
                $mlm_account_ledger->setCredit($directSponsorBonusAmount);
                $mlm_account_ledger->setDebit(0);
                $mlm_account_ledger->setBalance($distAccountEcashBalance + $directSponsorBonusAmount);
                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_account_ledger->save();

                //$this->revalidateAccount($uplineDistId, Globals::ACCOUNT_TYPE_ECASH);

                /******************************/
                /*  Commission
                /******************************/
                $dsbBalance = $this->getCommissionBalance($uplineDistId, Globals::COMMISSION_TYPE_DRB);

                $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                $sponsorDistCommissionledger->setDistId($uplineDistId);
                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_REGISTER);
                $sponsorDistCommissionledger->setCredit($directSponsorBonusAmount);
                $sponsorDistCommissionledger->setDebit(0);
                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                $sponsorDistCommissionledger->setBalance($dsbBalance + $directSponsorBonusAmount);
                if ($firstForDRB == true) {
                    $sponsorDistCommissionledger->setRemark("DRB FOR PACKAGE PURCHASE ".$directSponsorPercentage."% (".$packageDB->getPackageName().") for ".$sponsoredDistDB->getDistributorCode());
                    $firstForDRB = false;
                } else {
                    $sponsorDistCommissionledger->setRemark("GRB FOR PACKAGE PURCHASE ".$directSponsorPercentage."% (".$packageDB->getPackageName().") for ".$sponsoredDistDB->getDistributorCode());
                }
                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $sponsorDistCommissionledger->save();

                //$this->revalidateCommission($uplineDistId, Globals::COMMISSION_TYPE_DRB);
                //var_dump("==>1");
                if ($totalBonusPayOut < Globals::TOTAL_BONUS_PAYOUT) {
                    //var_dump("==>2");
                    $checkCommission = true;
                    $uplineDistId = $uplineDistDB->getUplineDistId();
                    while ($checkCommission == true) {
                        //var_dump("==>3**".$uplineDistId);
                        $uplineDistDB = MlmDistributorPeer::retrieveByPK($uplineDistId);

                        //var_dump("==>3$$".$uplineDistId);
                        $this->forward404Unless($uplineDistDB);

                        if ($uplineDistDB->getIsIb() == Globals::YES) {
                            /*if ($uplineDistDB->getIbRankId() != null) {
                                $uplineDistPackage = MlmIbPackagePeer::retrieveByPK($uplineDistDB->getIbRankId());
                            } else {
                                $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
                            }*/
                            $directSponsorPercentage = $uplineDistDB->getIbCommission() * 100;
                        } else {
                            $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());
                            $directSponsorPercentage = $uplineDistPackage->getCommission();
                        }
                        if ($directSponsorPercentage > $totalBonusPayOut) {
                            //var_dump("==>6");
                            $directSponsorPercentage = $directSponsorPercentage - $totalBonusPayOut;
                            $totalBonusPayOut += $directSponsorPercentage;
                            if ($totalBonusPayOut > Globals::TOTAL_BONUS_PAYOUT) {
                                //var_dump("==>7");
                                $directSponsorPercentage = $directSponsorPercentage - ($totalBonusPayOut - Globals::TOTAL_BONUS_PAYOUT);
                            }
                        } else {
                            //var_dump("==>8");
                            $uplineDistId = $uplineDistDB->getUplineDistId();
                            continue;
                        }

                        $directSponsorBonusAmount = $directSponsorPercentage * $packageDB->getPrice() / 100;
                        $checkCommission == false;
                        break;
                        //var_dump("==>9");
                    }
                } else {
                    break;
                    //var_dump("==>^^");
                }
            }
        }

    }

    function getAppSetting($parameter)
    {
        $result = "";
        $c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, $parameter);
        $settingDB = AppSettingPeer::doSelectOne($c);
        if ($settingDB) {
            $result = $settingDB->getSettingValue();
        }
        return $result;
    }

    function doSaveAccount($distId, $accountType, $credit, $debit, $transactionType, $remarks)
    {
        $mlm_account_ledger = new MlmAccountLedger();
        $mlm_account_ledger->setDistId($distId);
        $mlm_account_ledger->setAccountType($accountType);
        $mlm_account_ledger->setTransactionType($transactionType);
        $mlm_account_ledger->setRemark($remarks);
        $mlm_account_ledger->setCredit($credit);
        $mlm_account_ledger->setDebit($debit);
        $mlm_account_ledger->setBalance($credit - $debit);
        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->save();
    }

    function getPlacementDistributorInformation($uplineDistId, $placeLocation)
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::TREE_UPLINE_DIST_ID, $uplineDistId);
        $c->add(MlmDistributorPeer::PLACEMENT_POSITION, $placeLocation);
        //$c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);

        $placeDB = MlmDistributorPeer::doSelectOne($c);
        return $placeDB;
    }

    function getTotalPosition($distId, $position)
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::PLACEMENT_POSITION, $position);
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, $distId, Criteria::NOT_EQUAL);
        $c->add(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, "%|" . $distId . "|%", Criteria::LIKE);
        //$c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);

        $totalDis = MlmDistributorPeer::doCount($c);
        return $totalDis;
    }

    function getDsbAmount($distributorId, $date)
    {
        $query = "SELECT SUM(credit) AS SUB_TOTAL FROM mlm_dist_commission_ledger WHERE dist_id = " . $distributorId
                 . " AND commission_type = '" . Globals::ACCOUNT_LEDGER_ACTION_DRB . "'";

        $query .= " AND created_on >= '" . $date . " 00:00:00'";
        $query .= " AND created_on <= '" . $date . " 23:59:59'";

        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function toFreezeAndCalculateInvestmentPackage($batchId)
    {
        $connection = Propel::getConnection();

        $query = "UPDATE mlm_dist_investment_package set bonus_release = '".Globals::STATUS_PROCESSING."' WHERE status_code = '".Globals::STATUS_ACTIVE."'
            AND bonus_release = '".Globals::STATUS_PENDING."' AND batch_id = ".$batchId;

        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $query = "SELECT SUM(total_package) AS SUB_TOTAL FROM mlm_dist_investment_package
            WHERE bonus_release  = '".Globals::STATUS_PROCESSING."' AND batch_id = ".$batchId;

        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function unFreezeInvestmentPackage()
    {
        $connection = Propel::getConnection();

        $query = "UPDATE mlm_dist_investment_package set bonus_release = '".Globals::STATUS_COMPLETE."' WHERE status_code = '".Globals::STATUS_ACTIVE."'
            AND bonus_release = '".Globals::STATUS_PROCESSING."'";

        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
    }

    function updateDistPairingLeader($distId, $position, $debit, $remark="PAIRED", $transactionType=Globals::PAIRING_LEDGER_PAIRED)
    {
        /*$c = new Criteria();
        $c->add(MlmDistPairingLedgerPeer::DIST_ID, $distId);
        $c->add(MlmDistPairingLedgerPeer::LEFT_RIGHT, $position);
        $c->addDescendingOrderByColumn(MlmDistPairingLedgerPeer::CREATED_ON);
        $sponsorDistPairingLedgerDB = MlmDistPairingLedgerPeer::doSelectOne($c);

        $legBalance = 0;
        if ($sponsorDistPairingLedgerDB) {
            $legBalance = $sponsorDistPairingLedgerDB->getBalance();
        }*/
        $legBalance = $this->findPairingLedgers($distId, $position, null);
        // update pairing balance
        $distPairingledger = new MlmDistPairingLedger();
        $distPairingledger->setDistId($distId);
        $distPairingledger->setLeftRight($position);
        $distPairingledger->setTransactionType($transactionType);
        $distPairingledger->setCredit(0);
        $distPairingledger->setDebit($debit);
        $distPairingledger->setBalance($legBalance - $debit);
        $distPairingledger->setRemark($remark);
        $distPairingledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $distPairingledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $distPairingledger->save();

        $this->revalidatePairing($distId, $position);
    }

    function flushDistPairingLeader($distId, $position, $minBalance, $remark)
    {
        $distPairingledger = new MlmDistPairingLedger();
        $distPairingledger->setDistId($distId);
        $distPairingledger->setLeftRight($position);
        $distPairingledger->setTransactionType(Globals::PAIRING_LEDGER_FLUSH);
        $distPairingledger->setCredit(0);
        $distPairingledger->setDebit($minBalance);
        $distPairingledger->setBalance(0);
        $distPairingledger->setRemark($remark);
        $distPairingledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $distPairingledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $distPairingledger->save();

        $this->revalidatePairing($distId, $position);
    }

    function getRbDetailByMonth($distributorId, $month, $year)
    {
        $dateUtil = new DateUtil();

        $d = $dateUtil->getMonth($month, $year);
        $firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
        $lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

        $query = "SELECT SUM(bonus.credit-bonus.debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger bonus
                        WHERE 1=1 "
                 . " AND bonus.commission_type = '" . Globals::COMMISSION_TYPE_DRB . "'"
                 . " AND bonus.created_on >= '" . $firstOfMonth . "' AND bonus.created_on <= '" . $lastOfMonth . "'";

        if ($distributorId != null) {
            $query = $query." AND bonus.dist_id = ".$distributorId;
        }
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getPairingDetailByMonth($distributorId, $month, $year)
    {
        $dateUtil = new DateUtil();

        $d = $dateUtil->getMonth($month, $year);
        $firstOfMonth = date('Y-m-j', $d["first_of_month"]) . " 00:00:00";
        $lastOfMonth = date('Y-m-j', $d["last_of_month"]) . " 23:59:59";

        $query = "SELECT SUM(bonus.credit-bonus.debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger bonus
                        WHERE 1=1 "
                 . " AND bonus.commission_type = '" . Globals::COMMISSION_TYPE_GDB . "'"
                 . " AND bonus.created_on >= '" . $firstOfMonth . "' AND bonus.created_on <= '" . $lastOfMonth . "'";

        if ($distributorId != null) {
            $query = $query." AND bonus.dist_id = ".$distributorId;
        }
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalInvestmentPackageInWallet($distId)
    {
        $query = "SELECT SUM(total_package) AS _SUM FROM mlm_dist_investment_package";

        $query .= " WHERE dist_id = ".$distId;
        $query .= " AND status_code = '".Globals::STATUS_ACTIVE."'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }
    function getTotalPackageInTheGame()
    {
        $query = "SELECT SUM(total_package) AS _SUM FROM mlm_dist_investment_package
                WHERE status_code = '".Globals::STATUS_ACTIVE."'
                    AND bonus_release <> '".Globals::STATUS_PENDING."' ";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalCurrentInvestmentPackageSold()
    {
        $query = "SELECT SUM(total_package) AS _SUM FROM mlm_dist_investment_package";

        $query .= " WHERE status_code = '".Globals::STATUS_ACTIVE."' AND bonus_release = '".Globals::STATUS_PENDING."'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalInvestmentPackageSold($date)
    {
        $query = "SELECT SUM(total_package) AS _SUM FROM mlm_dist_investment_package package";

        $query .= " LEFT JOIN mlm_distributor dist ON dist.distributor_id = package.dist_id" ;
        $query .= " WHERE package.status_code = '".Globals::STATUS_ACTIVE."' AND dist.status_code = '".Globals::STATUS_ACTIVE."' AND package.dist_id <> ".Globals::SYSTEM_COMPANY_DIST_ID ;
        if ($date != null) {
            $dateFrom = $date . " 00:00:00";
            $dateTo = $date . " 23:59:59";

            $query .= " AND package.created_on >= '".$dateFrom."' AND package.created_on <='".$dateTo."'";
        }
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalTreePackageInvested($distId)
    {
        $query = "SELECT SUM(package.total_package) AS _SUM, package.dist_id
                    FROM mlm_dist_investment_package package
                LEFT JOIN mlm_distributor dist ON dist.distributor_id = package.dist_id
                        WHERE package.status_code = '".Globals::STATUS_ACTIVE."'
                    AND dist.status_code = '".Globals::STATUS_ACTIVE."'
                    AND package.bonus_release <> '".Globals::STATUS_PENDING."'
                    AND tree_structure LIKE '%|".$distId."|%'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalFundManagementGain($distId)
    {
        $query = "SELECT SUM(credit - debit) AS _SUM
                    FROM mlm_account_ledger
                where dist_id = ".$distId."
                AND account_type = '".Globals::ACCOUNT_TYPE_ECASH."'
                AND transaction_type = '".Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT."'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getRankColor($packageId)
    {
        $color = "blue";

        $package = MlmPackagePeer::retrieveByPK($packageId);
        if ($package) {
            $color = $package->getColor();
        }

        return $color;
    }
    function getRankColorArr()
    {
        $packageArray = array();
        $c = new Criteria();
        $packages = MlmPackagePeer::doSelect($c);
        foreach ($packages as $package) {
            $packageArray[$package->getPackageId()] = $package->getColor();
        }

        return $packageArray;
    }

    function getLegTotalMember($distributor)
    {
        if ($distributor) {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::PLACEMENT_TREE_STRUCTURE, "%|" . $distributor->getDistributorId() . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);

            $totalDis = MlmDistributorPeer::doCount($c);
            return $totalDis;
        }

        return 0;
    }

    function entitiedInvestmentPackageBonus($distId)
    {
        $c = new Criteria();
        $c->add(MlmDistInvestmentPackagePeer::DIST_ID, $distId);
        $c->add(MlmDistInvestmentPackagePeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        //$c->add(MlmDistInvestmentPackagePeer::BONUS_RELEASE, Globals::STATUS_COMPLETE);

        $totalInvestmentPackage = MlmDistributorPeer::doCount($c);
        if ($totalInvestmentPackage > 0)
            return true;
        return false;
    }

    function fetchMemberWithoutUploadDocument($date) {
        $dateFrom = $date . " 00:00:00";
        $dateTo = $date . " 23:59:59";

        $query = "SELECT distributor_id, distributor_code, full_name, email
	                    FROM mlm_distributor where (file_bank_pass_book is null or file_proof_of_residence is null or file_nric is null)
	                    and email is not null
	                    and active_datetime >= '" . $dateFrom . "' AND created_on <= '" . $dateTo . "'
	                    and status_code = '".Globals::STATUS_ACTIVE."'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        $resultArray = array();
        $count = 0;
        while ($resultset->next()) {
            $arr = $resultset->getRow();

            $resultArray[$count]["distributor_id"] = $arr["distributor_id"];
            $resultArray[$count]["distributor_code"] = $arr["distributor_code"];
            $resultArray[$count]["full_name"] = $arr["full_name"];
            $resultArray[$count]["email"] = $arr["email"];
            $count++;
        }
        return $resultArray;
    }

    function getMaxSponsorPackagePrice($sponsorUplineDistId) {
        $query = "SELECT max(package.price) as MAX_PRICE
                    FROM mlm_distributor dist
                        LEFT JOIN mlm_package package ON package.package_id = dist.rank_id
                    WHERE dist.upline_dist_id = ".$sponsorUplineDistId;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        $resultArray = array();
        $result = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();

            $result = $arr["MAX_PRICE"];
        }
        return $result;
    }
    function getTotalPackages($sponsorUplineDistId, $packagePrice) {
        $query = "SELECT count(dist.distributor_id) AS _count FROM mlm_distributor dist
                    LEFT JOIN mlm_package pack ON pack.package_id = dist.rank_id
                WHERE dist.upline_dist_id = ".$sponsorUplineDistId." AND pack.price >=". $packagePrice;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        $resultArray = array();
        $result = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();

            $result = $arr["_count"];
        }
        return $result;
    }

    function getUnrealizedProfit($mt4Username) {
        $result = 0;

        $c = new Criteria();

        $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mt4Username);
        $c->add(MlmRoiDividendPeer::IDX, 1);
        $mlmRoiDividendDB = MlmRoiDividendPeer::doSelectOne($c);

        if ($mlmRoiDividendDB) {
            $result = $mlmRoiDividendDB->getPackagePrice() * $mlmRoiDividendDB->getRoiPercentage() / 100 * Globals::DIVIDEND_TIMES_ENTITLEMENT;
        }

        return $result;
    }

    function getRealizedProfit($mt4Username) {

        $query = "SELECT SUM(dividend_amount) AS _SUM FROM mlm_roi_dividend
                WHERE mt4_user_name = '".$mt4Username."' AND status_code = '".Globals::DIVIDEND_STATUS_SUCCESS."'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();
        $resultArray = array();
        $result = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();

            $result = $arr["_SUM"];
        }
        return $result;
    }

    function format2decimal($d)
    {
        return ceil($d * 100) / 100;
    }

    function doCheckingMaster($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        //$totalMiniAccount = $this->getTotalPackage($distId, "3,4");
        //$totalStandardAccount = $this->getTotalPackage($distId, "5,6,7,8,9,10");
        $totalProfessionAccount = $this->getTotalPackage($distId, "11");

        if ($totalProfessionAccount >= 5) {
            $totalGroupSales = $this->getTotal3MonthsGroupSales($distId);

            if ($totalGroupSales >= 500000) {
                $upgradedPackage = MlmPackagePeer::retrieveByPK(12);

                $promotePackageName = $upgradedPackage->getPackageName();
                $fromPackageName = $uplinePackageDB->getPackageName();

                $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                $mlmPackageUpgradeHistory->setDistId($distId);
                $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                $mlmPackageUpgradeHistory->setAmount(0);
                $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalProfessionAccount. ", TOTAL GROUP SALES:".$totalGroupSales);
                $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->save();

                $dist->setRankId($upgradedPackage->getPackageId());
                $dist->setRankCode($upgradedPackage->getPackageName());
                $dist->save();

                return true;
            }
        }

        return false;
    }
    function doCheckingMini($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        $totalMircoAccount = $this->getTotalPackage($distId, "1");

        if ($totalMircoAccount >= 5) {
            $upgradedPackage = MlmPackagePeer::retrieveByPK(3);

            $promotePackageName = $upgradedPackage->getPackageName();
            $fromPackageName = $uplinePackageDB->getPackageName();

            $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
            $mlmPackageUpgradeHistory->setDistId($distId);
            $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
            $mlmPackageUpgradeHistory->setAmount(0);
            $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
            $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
            $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMircoAccount);
            $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->save();

            $dist->setRankId($upgradedPackage->getPackageId());
            $dist->setRankCode($upgradedPackage->getPackageName());
            $dist->save();

            return true;
        }

        return false;
    }
    function doCheckingStandard($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        $totalMiniAccount = $this->getTotalPackage($distId, "3");

        if ($totalMiniAccount >= 5) {
            $upgradedPackage = MlmPackagePeer::retrieveByPK(5);

            $promotePackageName = $upgradedPackage->getPackageName();
            $fromPackageName = $uplinePackageDB->getPackageName();

            $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
            $mlmPackageUpgradeHistory->setDistId($distId);
            $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
            $mlmPackageUpgradeHistory->setAmount(0);
            $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
            $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
            $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMiniAccount);
            $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->save();

            $dist->setRankId($upgradedPackage->getPackageId());
            $dist->setRankCode($upgradedPackage->getPackageName());
            $dist->save();

            return true;
        }

        return false;
    }
    function doCheckingCopper($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        $totalMiniAccount = $this->getTotalPackage($distId, "1");

        if ($totalMiniAccount >= 5) {
            $upgradedPackage = MlmPackagePeer::retrieveByPK(2);

            $promotePackageName = $upgradedPackage->getPackageName();
            $fromPackageName = $uplinePackageDB->getPackageName();

            $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
            $mlmPackageUpgradeHistory->setDistId($distId);
            $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
            $mlmPackageUpgradeHistory->setAmount(0);
            $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
            $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
            $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMiniAccount);
            $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->save();

            $dist->setRankId($upgradedPackage->getPackageId());
            $dist->setRankCode($upgradedPackage->getPackageName());
            $dist->save();

            return true;
        }

        return false;
    }
    function doCheckingSilver($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        $totalMiniAccount = $this->getTotalPackage($distId, "2");

        if ($totalMiniAccount >= 5) {
            $upgradedPackage = MlmPackagePeer::retrieveByPK(3);

            $promotePackageName = $upgradedPackage->getPackageName();
            $fromPackageName = $uplinePackageDB->getPackageName();

            $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
            $mlmPackageUpgradeHistory->setDistId($distId);
            $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
            $mlmPackageUpgradeHistory->setAmount(0);
            $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
            $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
            $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMiniAccount);
            $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->save();

            $dist->setRankId($upgradedPackage->getPackageId());
            $dist->setRankCode($upgradedPackage->getPackageName());
            $dist->save();

            return true;
        }

        return false;
    }
    function doCheckingGold($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        $totalMiniAccount = $this->getTotalPackage($distId, "3");

        if ($totalMiniAccount >= 5) {
            $upgradedPackage = MlmPackagePeer::retrieveByPK(5);

            $promotePackageName = $upgradedPackage->getPackageName();
            $fromPackageName = $uplinePackageDB->getPackageName();

            $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
            $mlmPackageUpgradeHistory->setDistId($distId);
            $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
            $mlmPackageUpgradeHistory->setAmount(0);
            $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
            $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
            $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMiniAccount);
            $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmPackageUpgradeHistory->save();

            $dist->setRankId($upgradedPackage->getPackageId());
            $dist->setRankCode($upgradedPackage->getPackageName());
            $dist->save();

            return true;
        }

        return false;
    }
    function doCheckingDiamond($qualifyDistDB, $uplinePackageDB)
    {
        $distId = $qualifyDistDB->getDistributorId();
        $totalPackages = $this->getTotalPackage($distId, "4");
        //var_dump($totalPackages);
        if ($totalPackages >= 5) {
            if ($qualifyDistDB->getDiamondStatus() == null || $qualifyDistDB->getDiamondStatus() == "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $qualifyDistDB->getDistributorId());
                $existFirstLevelDists = MlmDistributorPeer::doSelect($c);

                $distIsStr = "";
                if (count($existFirstLevelDists) > 0) {
                    foreach ($existFirstLevelDists as $firstLevelDists) {
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $firstLevelDists->getDistributorId() . "|%", Criteria::LIKE);
                        $c->add(MlmDistributorPeer::RANK_ID, 4, Criteria::GREATER_EQUAL);
                        $eachLineDists = MlmDistributorPeer::doSelect($c);

                        if (count($eachLineDists) > 0) {
                            foreach ($eachLineDists as $eachLineDist) {
                                $distIsStr .= $eachLineDist->getDistributorId()."|";
                            }
                            $distIsStr = substr_replace($distIsStr, "", -1);
                        } else {
                            continue;
                        }
                        /*$diamondDownlineId = $qualifyDistDB->getDiamondDownlineId();
                          if ($diamondDownlineId != "" && $diamondDownlineId != null) {
                              $diamondDownlineId = $diamondDownlineId.",";
                          }
                          $diamondDownlineId .= $distIsStr;*/
                        //var_dump($distIsStr);
                        $distIsStr = $distIsStr.",";
                    }
                    $distIsStr = substr_replace($distIsStr, "", -1);

                    $qualifyDistDB->setDiamondDownlineId($distIsStr);
                    $qualifyDistDB->save();

                    $downlineArr = explode(",", $distIsStr);

//                    var_dump($distIsStr);
//                    var_dump($downlineArr);
//                    exit();
                    if (count($downlineArr) >= 5) {
                        $currentDate_timestamp = strtotime(date("Y/m/d h:i:s A"));
                        $dividendDate = strtotime("+2 months", $currentDate_timestamp);

                        $qualifyDistDB->setDiamondStatus(Globals::STATUS_ACTIVE);
                        $qualifyDistDB->setDiamondDateStart(date("Y/m/d h:i:s A"));
                        $qualifyDistDB->setDiamondDateEnd($dividendDate);
                        $qualifyDistDB->save();
                    }
                }
            }

            if ($qualifyDistDB->getDiamondStatus() == Globals::STATUS_ACTIVE) {
                $totalAmount = $this->getTotalSales($distId, null, null, $qualifyDistDB->getDiamondDateStart(), null);
//                var_dump("<br>total sales:".$totalAmount);
//                exit();
                $qualifyDistDB->setDiamondSales($totalAmount);
                $qualifyDistDB->save();

                if ($totalAmount >= 300000) {
                    $upgradedPackage = MlmPackagePeer::retrieveByPK(21);

                    $promotePackageName = $upgradedPackage->getPackageName();
                    $fromPackageName = $uplinePackageDB->getPackageName();

                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                    $mlmPackageUpgradeHistory->setAmount(0);
                    $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName);
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $qualifyDistDB->setRankId($upgradedPackage->getPackageId());
                    $qualifyDistDB->setRankCode($upgradedPackage->getPackageName());
                    $qualifyDistDB->setDiamondStatus(Globals::STATUS_COMPLETE);
                    $qualifyDistDB->setDiamondDateAchieve(date("Y/m/d h:i:s A"));
                    $qualifyDistDB->save();

                    return true;
                }
            }
        }

        return false;
    }
    function doCheckingDiamondByPearl($qualifyDistDB, $uplinePackageDB)
    {
        $distId = $qualifyDistDB->getDistributorId();
        $totalPackages = $this->getTotalPackage($distId, "6");
        //var_dump($totalPackages);
        if ($totalPackages >= 5) {
            if ($qualifyDistDB->getDiamondStatus() == null || $qualifyDistDB->getDiamondStatus() == "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $qualifyDistDB->getDistributorId());
                $existFirstLevelDists = MlmDistributorPeer::doSelect($c);

                $distIsStr = "";
                if (count($existFirstLevelDists) > 0) {
                    foreach ($existFirstLevelDists as $firstLevelDists) {
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $firstLevelDists->getDistributorId() . "|%", Criteria::LIKE);
                        $c->add(MlmDistributorPeer::RANK_ID, 6, Criteria::GREATER_EQUAL);
                        $eachLineDists = MlmDistributorPeer::doSelect($c);

                        if (count($eachLineDists) > 0) {
                            foreach ($eachLineDists as $eachLineDist) {
                                $distIsStr .= $eachLineDist->getDistributorId()."|";
                            }
                            $distIsStr = substr_replace($distIsStr, "", -1);
                        } else {
                            continue;
                        }
                        /*$diamondDownlineId = $qualifyDistDB->getDiamondDownlineId();
                          if ($diamondDownlineId != "" && $diamondDownlineId != null) {
                              $diamondDownlineId = $diamondDownlineId.",";
                          }
                          $diamondDownlineId .= $distIsStr;*/
                        //var_dump($distIsStr);
                        $distIsStr = $distIsStr.",";
                    }
                    $distIsStr = substr_replace($distIsStr, "", -1);

                    $qualifyDistDB->setDiamondDownlineId($distIsStr);
                    $qualifyDistDB->save();

                    $downlineArr = explode(",", $distIsStr);

//                    var_dump($distIsStr);
//                    var_dump($downlineArr);
//                    exit();
                    if (count($downlineArr) >= 5) {
                        $currentDate_timestamp = strtotime(date("Y/m/d h:i:s A"));
                        $dividendDate = strtotime("+2 months", $currentDate_timestamp);

                        $qualifyDistDB->setDiamondStatus(Globals::STATUS_ACTIVE);
                        $qualifyDistDB->setDiamondDateStart(date("Y/m/d h:i:s A"));
                        $qualifyDistDB->setDiamondDateEnd($dividendDate);
                        $qualifyDistDB->save();
                    }
                }
            }

            if ($qualifyDistDB->getDiamondStatus() == Globals::STATUS_ACTIVE) {
                $totalAmount = $this->getTotalSales($distId, null, null, $qualifyDistDB->getDiamondDateStart(), null);
//                var_dump("<br>total sales:".$totalAmount);
//                exit();
                $qualifyDistDB->setDiamondSales($totalAmount);
                $qualifyDistDB->save();

                if ($totalAmount >= 150000) {
                    $upgradedPackage = MlmPackagePeer::retrieveByPK(21);

                    $promotePackageName = $upgradedPackage->getPackageName();
                    $fromPackageName = $uplinePackageDB->getPackageName();

                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                    $mlmPackageUpgradeHistory->setAmount(0);
                    $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName);
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $qualifyDistDB->setRankId($upgradedPackage->getPackageId());
                    $qualifyDistDB->setRankCode($upgradedPackage->getPackageName());
                    $qualifyDistDB->setDiamondStatus(Globals::STATUS_COMPLETE);
                    $qualifyDistDB->setDiamondDateAchieve(date("Y/m/d h:i:s A"));
                    $qualifyDistDB->save();

                    return true;
                }
            }
        }

        return false;
    }
    function doCheckingVipByGem($qualifyDistDB, $uplinePackageDB)
    {
        $distId = $qualifyDistDB->getDistributorId();
        $totalPackages = $this->getTotalPackage($distId, "7");
        //var_dump($totalPackages);
        if ($totalPackages >= 5) {
            if ($qualifyDistDB->getVipStatus() == null || $qualifyDistDB->getVipStatus() == "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $qualifyDistDB->getDistributorId());
                $existFirstLevelDists = MlmDistributorPeer::doSelect($c);

                $distIsStr = "";
                if (count($existFirstLevelDists) > 0) {
                    foreach ($existFirstLevelDists as $firstLevelDists) {
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $firstLevelDists->getDistributorId() . "|%", Criteria::LIKE);
                        $c->add(MlmDistributorPeer::RANK_ID, 7, Criteria::GREATER_EQUAL);
                        $eachLineDists = MlmDistributorPeer::doSelect($c);

                        if (count($eachLineDists) > 0) {
                            foreach ($eachLineDists as $eachLineDist) {
                                $distIsStr .= $eachLineDist->getDistributorId()."|";
                            }
                            $distIsStr = substr_replace($distIsStr, "", -1);
                        } else {
                            continue;
                        }
                        /*$diamondDownlineId = $qualifyDistDB->getDiamondDownlineId();
                          if ($diamondDownlineId != "" && $diamondDownlineId != null) {
                              $diamondDownlineId = $diamondDownlineId.",";
                          }
                          $diamondDownlineId .= $distIsStr;*/
                        //var_dump($distIsStr);
                        $distIsStr = $distIsStr.",";
                    }
                    $distIsStr = substr_replace($distIsStr, "", -1);

                    $qualifyDistDB->setVipDownlineId($distIsStr);
                    $qualifyDistDB->save();

                    $downlineArr = explode(",", $distIsStr);

//                    var_dump($distIsStr);
//                    var_dump($downlineArr);
//                    exit();
                    if (count($downlineArr) >= 5) {
                        $currentDate_timestamp = strtotime(date("Y/m/d h:i:s A"));
                        $dividendDate = strtotime("+2 months", $currentDate_timestamp);

                        $qualifyDistDB->setVipStatus(Globals::STATUS_ACTIVE);
                        $qualifyDistDB->setVipDateStart(date("Y/m/d h:i:s A"));
                        $qualifyDistDB->setVipDateEnd($dividendDate);
                        $qualifyDistDB->save();
                    }
                }
            }

            if ($qualifyDistDB->getVipStatus() == Globals::STATUS_ACTIVE) {
                $totalAmount = $this->getTotalSales($distId, null, null, $qualifyDistDB->getVipDateStart(), null);
//                var_dump("<br>total sales:".$totalAmount);
//                exit();
                $qualifyDistDB->setVipSales($totalAmount);
                $qualifyDistDB->save();

                if ($totalAmount >= 1500000) {
                    $upgradedPackage = MlmPackagePeer::retrieveByPK(22);

                    $promotePackageName = $upgradedPackage->getPackageName();
                    $fromPackageName = $uplinePackageDB->getPackageName();

                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                    $mlmPackageUpgradeHistory->setAmount(0);
                    $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName);
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $qualifyDistDB->setRankId($upgradedPackage->getPackageId());
                    $qualifyDistDB->setRankCode($upgradedPackage->getPackageName());
                    $qualifyDistDB->setVipStatus(Globals::STATUS_COMPLETE);
                    $qualifyDistDB->setVipDateAchieve(date("Y/m/d h:i:s A"));
                    $qualifyDistDB->save();

                    return true;
                }
            }
        }

        return false;
    }
    function doCheckingVip($qualifyDistDB, $uplinePackageDB)
    {
        $distId = $qualifyDistDB->getDistributorId();
        $totalPackages = $this->getTotalPackage($distId, "21");

        if ($totalPackages >= 5) {
            if ($qualifyDistDB->getVipStatus() == null || $qualifyDistDB->getVipStatus() == "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $qualifyDistDB->getDistributorId());
                $existFirstLevelDists = MlmDistributorPeer::doSelect($c);

                $distIsStr = "";
                if (count($existFirstLevelDists) > 0) {
                    foreach ($existFirstLevelDists as $firstLevelDists) {
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $firstLevelDists->getDistributorId() . "|%", Criteria::LIKE);
                        $c->add(MlmDistributorPeer::RANK_ID, 21, Criteria::GREATER_EQUAL);
                        $eachLineDists = MlmDistributorPeer::doSelect($c);

                        if (count($eachLineDists) > 0) {
                            foreach ($eachLineDists as $eachLineDist) {
                                $distIsStr .= $eachLineDist->getDistributorId()."|";
                            }
                            $distIsStr = substr_replace($distIsStr, "", -1);
                        } else {
                            continue;
                        }
                        //var_dump($distIsStr);
                        $distIsStr = $distIsStr.",";
                    }
                    $distIsStr = substr_replace($distIsStr, "", -1);

                    $qualifyDistDB->setVipDownlineId($distIsStr);
                    $qualifyDistDB->save();

                    $downlineArr = explode(",", $distIsStr);

//                    var_dump($distIsStr);
//                    var_dump($downlineArr);
//                    exit();
                    if (count($downlineArr) >= 5) {
                        $currentDate_timestamp = strtotime(date("Y/m/d h:i:s A"));
                        $dividendDate = strtotime("+2 months", $currentDate_timestamp);

                        $qualifyDistDB->setVipStatus(Globals::STATUS_ACTIVE);
                        $qualifyDistDB->setVipDateStart(date("Y/m/d h:i:s A"));
                        $qualifyDistDB->setVipDateEnd($dividendDate);
                        $qualifyDistDB->save();
                    }
                }
            }
            //var_dump($qualifyDistDB->getVipStatus());
            if ($qualifyDistDB->getVipStatus() == Globals::STATUS_ACTIVE) {
                $totalAmount = $this->getTotalSales($distId, null, null, $qualifyDistDB->getVipDateStart(), null);
//                var_dump("<br>total sales:".$totalAmount);
//                exit();
                $qualifyDistDB->setVipSales($totalAmount);
                $qualifyDistDB->save();

                if ($totalAmount >= 500000) {
                    $upgradedPackage = MlmPackagePeer::retrieveByPK(22);

                    $promotePackageName = $upgradedPackage->getPackageName();
                    $fromPackageName = $uplinePackageDB->getPackageName();

                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                    $mlmPackageUpgradeHistory->setAmount(0);
                    $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName);
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $qualifyDistDB->setRankId($upgradedPackage->getPackageId());
                    $qualifyDistDB->setRankCode($upgradedPackage->getPackageName());
                    $qualifyDistDB->setVipStatus(Globals::STATUS_COMPLETE);
                    $qualifyDistDB->setVipDateAchieve(date("Y/m/d h:i:s A"));
                    $qualifyDistDB->save();

                    return true;
                }
            }
        }

        return false;
    }
    function doCheckingDegold($qualifyDistDB, $uplinePackageDB)
    {
        $distId = $qualifyDistDB->getDistributorId();
        $totalPackages = $this->getTotalPackage($distId, "22");

        if ($totalPackages >= 5) {
            if ($qualifyDistDB->getDegoldStatus() == null || $qualifyDistDB->getDegoldStatus() == "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $qualifyDistDB->getDistributorId());
                $existFirstLevelDists = MlmDistributorPeer::doSelect($c);

                $distIsStr = "";
                if (count($existFirstLevelDists) > 0) {
                    foreach ($existFirstLevelDists as $firstLevelDists) {
                        $c = new Criteria();
                        $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|". $firstLevelDists->getDistributorId() . "|%", Criteria::LIKE);
                        $c->add(MlmDistributorPeer::RANK_ID, 22, Criteria::GREATER_EQUAL);
                        $eachLineDists = MlmDistributorPeer::doSelect($c);

                        if (count($eachLineDists) > 0) {
                            foreach ($eachLineDists as $eachLineDist) {
                                $distIsStr .= $eachLineDist->getDistributorId()."|";
                            }
                            $distIsStr = substr_replace($distIsStr, "", -1);
                        } else {
                            continue;
                        }
                        //var_dump($distIsStr);
                        $distIsStr = $distIsStr.",";
                    }
                    $distIsStr = substr_replace($distIsStr, "", -1);

                    $qualifyDistDB->setDegoldDownlineId($distIsStr);
                    $qualifyDistDB->save();

                    $downlineArr = explode(",", $distIsStr);

//                    var_dump($distIsStr);
//                    var_dump($downlineArr);
//                    exit();
                    if (count($downlineArr) >= 5) {
                        $currentDate_timestamp = strtotime(date("Y/m/d h:i:s A"));
                        $dividendDate = strtotime("+2 months", $currentDate_timestamp);

                        $qualifyDistDB->setDegoldoldStatus(Globals::STATUS_ACTIVE);
                        $qualifyDistDB->setDegoldDateStart(date("Y/m/d h:i:s A"));
                        $qualifyDistDB->setDegoldDateEnd($dividendDate);
                        $qualifyDistDB->save();
                    }
                }
            }

            if ($qualifyDistDB->getDegoldStatus() == Globals::STATUS_ACTIVE) {
                $totalAmount = $this->getTotalSales($distId, null, null, $qualifyDistDB->getDegoldDateStart(), null);
                //var_dump("<br>total sales:".$totalAmount);
                //exit();
                $qualifyDistDB->setDegoldSales($totalAmount);
                $qualifyDistDB->save();

                if ($totalAmount >= 1000000) {
                    $upgradedPackage = MlmPackagePeer::retrieveByPK(33);

                    $promotePackageName = $upgradedPackage->getPackageName();
                    $fromPackageName = $uplinePackageDB->getPackageName();

                    $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                    $mlmPackageUpgradeHistory->setDistId($distId);
                    $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                    $mlmPackageUpgradeHistory->setAmount(0);
                    $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                    $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName);
                    $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlmPackageUpgradeHistory->save();

                    $qualifyDistDB->setRankId($upgradedPackage->getPackageId());
                    $qualifyDistDB->setRankCode($upgradedPackage->getPackageName());
                    $qualifyDistDB->setDegoldStatus(Globals::STATUS_COMPLETE);
                    $qualifyDistDB->setDegoldDateAchieve(date("Y/m/d h:i:s A"));
                    $qualifyDistDB->save();

                    return true;
                }
            }
        }

        return false;
    }
    function doCheckingProfessional($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        //$totalMiniAccount = $this->getTotalPackage($distId, "3,4");
        $totalStandardAccount = $this->getTotalPackage($distId, "5");

        if ($totalStandardAccount >= 5) {
            $totalGroupSales = $this->getTotal3MonthsGroupSales($distId);

            if ($totalGroupSales >= 200000) {
                $upgradedPackage = MlmPackagePeer::retrieveByPK(11);

                $promotePackageName = $upgradedPackage->getPackageName();
                $fromPackageName = $uplinePackageDB->getPackageName();

                $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                $mlmPackageUpgradeHistory->setDistId($distId);
                $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                $mlmPackageUpgradeHistory->setAmount(0);
                $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalStandardAccount);
                $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->save();

                $dist->setRankId($upgradedPackage->getPackageId());
                $dist->setRankCode($upgradedPackage->getPackageName());
                $dist->save();

                return true;
            }
        }

        return false;
    }
    function doCheckingGrandMaster($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1,2");
        //$totalMiniAccount = $this->getTotalPackage($distId, "3,4");
        //$totalStandardAccount = $this->getTotalPackage($distId, "5,6,7,8,9,10");
        //$totalProfessionAccount = $this->getTotalPackage($distId, "11");
        $totalMasterAccount = $this->getTotalPackage($distId, "12");

        if ($totalMasterAccount >= 5) {
            $totalGroupSales = $this->getTotal3MonthsGroupSales($distId);

            if ($totalGroupSales >= 1000000) {
                $upgradedPackage = MlmPackagePeer::retrieveByPK(13);

                $promotePackageName = $upgradedPackage->getPackageName();
                $fromPackageName = $uplinePackageDB->getPackageName();

                $mlmPackageUpgradeHistory = new MlmPackageUpgradeHistory();
                $mlmPackageUpgradeHistory->setDistId($distId);
                $mlmPackageUpgradeHistory->setTransactionCode(Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_PROMO);
                $mlmPackageUpgradeHistory->setAmount(0);
                $mlmPackageUpgradeHistory->setPackageId($upgradedPackage->getPackageId());
                $mlmPackageUpgradeHistory->setStatusCode(Globals::STATUS_COMPLETE);
                $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalMasterAccount. ", TOTAL GROUP SALES:".$totalGroupSales);
                $mlmPackageUpgradeHistory->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmPackageUpgradeHistory->save();

                $dist->setRankId($upgradedPackage->getPackageId());
                $dist->setRankCode($upgradedPackage->getPackageName());
                $dist->save();

                return true;
            }
        }

        return false;
    }
    function getTotal3MonthsGroupSales($distributorId)
    {
        $currentDate = date("Y-m-d");
        $currentDateTime = strtotime($currentDate);
        $month3Date = strtotime("-3 months", $currentDateTime);

        $dateUtil = new DateUtil();
        $dateFrom = $dateUtil->formatDate("Y-m-d", $month3Date);
        $dateTo = $dateUtil->formatDate("Y-m-d", $currentDate);

        $query = "SELECT SUM(package.price) as SUB_TOTAL
                    FROM mlm_distributor dist
                        LEFT JOIN mlm_package package ON package.package_id = dist.mt4_rank_id
                    WHERE dist.tree_structure like '%|".$distributorId."|%'
                        AND dist.status_code = '".Globals::STATUS_ACTIVE ."'
                        AND dist.distributor_id <> ".$distributorId;

        $dateFrom = $dateFrom . " 00:00:00";
        $dateTo = $dateTo . " 23:59:59";

        $query .= " AND dist.created_on >= '".$dateFrom."' AND dist.created_on <='".$dateTo."'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                return $arr["SUB_TOTAL"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalGroupSales($distributorId, $dateFrom, $dateTo)
    {
        $dateUtil = new DateUtil();
        $dateFromStr = $dateUtil->formatDate("Y-m-d", $dateFrom). " 00:00:00";
        $dateToStr = $dateUtil->formatDate("Y-m-d", $dateTo). " 23:59:59";

        $query = "SELECT SUM(package.price) as SUB_TOTAL
                    FROM mlm_distributor dist
                        LEFT JOIN mlm_package package ON package.package_id = dist.mt4_rank_id
                    WHERE dist.tree_structure like '%|".$distributorId."|%'
                        AND dist.status_code = '".Globals::STATUS_ACTIVE ."'
                        AND dist.distributor_id <> ".$distributorId;

        if ($dateFrom != null && $dateTo != null) {
            $query .= " AND dist.created_on >= '".$dateFromStr."' AND dist.created_on <='".$dateToStr."'";
        }

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $totalSales = 0;

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalSales = $arr["SUB_TOTAL"];
            } else {
                $totalSales = 0;
            }
        }

        $query = "SELECT SUM(upgrade.amount) as SUB_TOTAL
	        FROM mlm_package_upgrade_history upgrade
        LEFT JOIN mlm_distributor dist ON dist.distributor_id = upgrade.dist_id
            WHERE upgrade.transaction_code = '".Globals::ACCOUNT_LEDGER_ACTION_PACKAGE_UPGRADE."'
                    AND dist.tree_structure like '%|".$distributorId."|%'
                        AND dist.status_code = '".Globals::STATUS_ACTIVE ."'
                        AND dist.distributor_id <> ".$distributorId;

        if ($dateFrom != null && $dateTo != null) {
            $query .= " AND upgrade.created_on >= '".$dateFromStr."' AND upgrade.created_on <='".$dateToStr."'";
        }

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $totalUpgradeSales = 0;

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalUpgradeSales = $arr["SUB_TOTAL"];
            } else {
                $totalUpgradeSales = 0;
            }
        }

        return $totalSales + $totalUpgradeSales;
    }

    public function executeVerifyNric()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');
        $nric = $this->getRequestParameter('nric');

        $c = new Criteria();
        $c->add(MlmDistributorPeer::IC, $nric);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existIcDist = MlmDistributorPeer::doSelectOne($c);

        $arr = array(
            'result' => "false"
        );
        if ($existIcDist) {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
            $existDist = MlmDistributorPeer::doSelectOne($c);

            if ($existDist) {
                $pos = strrpos($existDist->getTreeStructure(), "|".$existIcDist->getDistributorId()."|");
                if ($pos === false) { // note: three equal signs

                } else {
                    $arr = array(
                        'result' => "true"
                    );
                }
            }
        } else {
            $arr = array(
                'result' => "true"
            );
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    function getTotalPackage($distId, $packageIdString)
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $distId);
        $dists = MlmDistributorPeer::doSelect($c);

        $totalCount = 0;
        foreach ($dists as $dist)
        {
            $query = "SELECT count(rank_id) AS SUB_TOTAL
	            FROM mlm_distributor WHERE status_code = '".Globals::STATUS_ACTIVE."'
                    AND tree_structure like '%|".$dist->getDistributorId()."|%' AND rank_id >= ".$packageIdString;
//	                AND tree_structure like '%|".$dist->getDistributorId()."|%' AND rank_id IN (".$packageIdString.")";

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();

                if ($arr["SUB_TOTAL"] != null) {
                    if ($arr["SUB_TOTAL"] > 0) {
                        //print_r($distId."=".$dist->getDistributorId()."<br>");
                        $totalCount += 1;
                    }
                }
            }
        }
        return $totalCount;
    }

    function executeMemo()
    {
    }

    function getTotalDRB($distId, $dateFrom, $dateTo)
    {
        $query = "SELECT SUM(credit) AS _SUM
                    FROM mlm_account_ledger
                where dist_id = ".$distId."
                AND account_type = '".Globals::ACCOUNT_TYPE_ECASH."'
                AND transaction_type = '".Globals::ACCOUNT_LEDGER_ACTION_DRB."'
                AND created_on >= '".$dateFrom."'
                AND created_on <= '".$dateTo."'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalGroupBonus($distId, $dateFrom, $dateTo)
    {
        $query = "SELECT SUM(credit) AS _SUM
                    FROM mlm_account_ledger
                where dist_id = ".$distId."
                AND account_type = '".Globals::ACCOUNT_TYPE_ECASH."'
                AND transaction_type = '".Globals::ACCOUNT_LEDGER_ACTION_GROUP_BONUS."'
                AND created_on >= '".$dateFrom."'
                AND created_on <= '".$dateTo."'";
        //var_dump($query);

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function getTotalRoiAndPassiveIncome($distId, $dateFrom, $dateTo)
    {
        $query = "SELECT SUM(credit) AS _SUM
                    FROM mlm_account_ledger
                where dist_id = ".$distId."
                AND account_type = '".Globals::ACCOUNT_TYPE_CP4."'
                AND transaction_type IN ('".Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT."','".Globals::ACCOUNT_LEDGER_ACTION_PASSIVE_INCOME."')
                AND created_on >= '".$dateFrom."'
                AND created_on <= '".$dateTo."'";
        //var_dump($query);
        //exit();
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_SUM"] != null) {
                return $arr["_SUM"];
            } else {
                return 0;
            }
        }
        return 0;
    }

    function revalidateAccount($distributorId, $accountType)
    {
        $balance = $this->getAccountBalance($distributorId, $accountType);

        $c = new Criteria();
        $c->add(MlmAccountPeer::ACCOUNT_TYPE, $accountType);
        $c->add(MlmAccountPeer::DIST_ID, $distributorId);
        $tbl_account = MlmAccountPeer::doSelectOne($c);

        if (!$tbl_account) {
            $tbl_account = new MlmAccount();
            $tbl_account->setDistId($distributorId);
            $tbl_account->setAccountType($accountType);
            $tbl_account->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $tbl_account->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        }

        $tbl_account->setBalance($balance);
        $tbl_account->save();
    }

    function checkIsDebitedAccount($distId, $convertRpToCp1, $convertCp3ToCp1, $cp3Withdrawal, $convertCp2ToCp1, $ecashWithdrawal, $transferCp1, $transferCp2, $transferCp3) {
        $c = new Criteria();

        $c->add(MlmDebitAccountPeer::DIST_ID, $distId);
        if ($convertRpToCp1 != null) {
            $c->add(MlmDebitAccountPeer::CONVERT_RP_TO_CP1, $convertRpToCp1);
        }
        if ($convertCp3ToCp1 != null) {
            $c->add(MlmDebitAccountPeer::CONVERT_CP3_TO_CP1, $convertCp3ToCp1);
        }
        if ($convertCp2ToCp1 != null) {
            $c->add(MlmDebitAccountPeer::CONVERT_CP2_TO_CP1, $convertCp2ToCp1);
        }
        if ($ecashWithdrawal != null) {
            $c->add(MlmDebitAccountPeer::ECASH_WITHDRAWAL, $ecashWithdrawal);
        }
        if ($cp3Withdrawal != null) {
            $c->add(MlmDebitAccountPeer::CP3_WITHDRAWAL, $cp3Withdrawal);
        }
        if ($transferCp1 != null) {
            $c->add(MlmDebitAccountPeer::TRANSFER_CP1, $transferCp1);
        }
        if ($transferCp2 != null) {
            $c->add(MlmDebitAccountPeer::TRANSFER_CP2, $transferCp2);
        }
        if ($transferCp3 != null) {
            $c->add(MlmDebitAccountPeer::TRANSFER_CP3, $transferCp3);
        }
        $debitAccountDB = MlmDebitAccountPeer::doSelectOne($c);

        if ($debitAccountDB) {
            return true;
        }
        return false;
    }
}


