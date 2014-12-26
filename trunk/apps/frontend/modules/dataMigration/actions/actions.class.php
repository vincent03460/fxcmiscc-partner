<?php

/**
 * dataMigration actions.
 *
 * @package    sf_sandbox
 * @subpackage dataMigration
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class dataMigrationActions extends sfActions
{
    public function executeQuote()
    {
    }
    public function executeCreateBigLeg()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "bigleg.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);

        for ($x = 2; $x < $totalRow; $x++) {
            print_r("total:".$totalRow."::x:".$x.":".$data->val($x, "B")."<br>");
            $password = "q1w2e3r4t5";
            $app_user = new AppUser();
            $app_user->setUsername($data->val($x, "B"));
            $app_user->setKeepPassword($password);
            $app_user->setUserpassword($password);
            $app_user->setKeepPassword2($password);
            $app_user->setUserpassword2($password);
            $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
            $app_user->setStatusCode(Globals::STATUS_INACTIVE);
            $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->save();

            $mlm_distributor = new MlmDistributor();
            $mlm_distributor->setDistributorCode($data->val($x, "B"));
            $mlm_distributor->setUserId($app_user->getUserId());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);

            $fullName = trim($data->val($x, "E"));
            $fullName = strtoupper($fullName);

            $mlm_distributor->setFullName($fullName);
            $mlm_distributor->setNickname($data->val($x, "F"));
            $mlm_distributor->setIc("");
            $mlm_distributor->setCountry($data->val($x, "I"));
            $mlm_distributor->setAddress($data->val($x, "J"));
            $mlm_distributor->setAddress2($data->val($x, "K"));
            $mlm_distributor->setCity($data->val($x, "L"));
            $mlm_distributor->setState($data->val($x, "M"));
            $mlm_distributor->setPostcode($data->val($x, "N"));
            $mlm_distributor->setEmail($data->val($x, "O"));
            $mlm_distributor->setAlternateEmail($data->val($x, "P"));
            $mlm_distributor->setContact($data->val($x, "Q"));
            $mlm_distributor->setGender($data->val($x, "R"));
            //$mlm_distributor->setDob($data->val($x, "S"));
            $mlm_distributor->setBankName($data->val($x, "T"));
            $mlm_distributor->setBankAccNo($data->val($x, "W"));
            $mlm_distributor->setBankHolderName($data->val($x, "X"));

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $data->val($x, "AI"));
            $uplineDistDB = MlmDistributorPeer::doSelectOne($c);

            if (!$uplineDistDB) {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, "chia_wee_keat");
                $uplineDistDB = MlmDistributorPeer::doSelectOne($c);
            }

            $mlm_distributor->setTreeLevel($uplineDistDB->getTreeLevel() + 1);
            $mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
            $mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());

            //$mlm_distributor->setLeverage($this->getRequestParameter('leverage'));
            //$mlm_distributor->setSpread($this->getRequestParameter('spread'));
            //$mlm_distributor->setDepositCurrency($this->getRequestParameter('deposit_currency'));
            //$mlm_distributor->setDepositAmount($this->getRequestParameter('deposit_amount'));
            //$mlm_distributor->setSignName($this->getRequestParameter('sign_name'));
            //$mlm_distributor->setSignDate(date("Y/m/d h:i:s A"));
            //$mlm_distributor->setTermCondition($this->getRequestParameter('term_condition'));

            $packageDB = MlmPackagePeer::retrieveByPK($data->val($x, "AP"));
            if (!$packageDB) {
                $packageDB = MlmPackagePeer::retrieveByPK(6);
            }

            $mlm_distributor->setRankId($packageDB->getPackageId());
            $mlm_distributor->setRankCode($packageDB->getPackageName());
            $mlm_distributor->setMt4RankId($packageDB->getPackageId());
            $mlm_distributor->setInitRankId($packageDB->getPackageId());
            $mlm_distributor->setInitRankCode($packageDB->getPackageName());
            $mlm_distributor->setRemark("loan account");
            $mlm_distributor->setLoanAccount("Y");
            $mlm_distributor->setPackagePurchaseFlag("N");
            $mlm_distributor->setActiveDatetime(date("Y/m/d h:i:s A"));
            $mlm_distributor->setActivatedBy($this->getUser()->getAttribute(Globals::SESSION_DISTID));
            $mlm_distributor->setProductMte("Y");
            $mlm_distributor->setProductFxgold("Y");
            $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_distributor->save();

            $treeStructure = $uplineDistDB->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            $mlm_distributor->setTreeStructure($treeStructure);
            $mlm_distributor->save();
        }
        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeGenerateOctoberRoi()
    {
        $query = "UPDATE mlm_roi_dividend set status_code = 'SUCCESS' WHERE dividend_date <= '2013-09-30 23:59:59'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        print_r("+++++ ROI Dividend +++++<br>");
        $con = Propel::getConnection(MlmDailyBonusLogPeer::DATABASE_NAME);

        try {
            $con->begin();

            $dateUtil = new DateUtil();
            $bonusDate = "2013-11-06 23:59:59";

            $format = 'Y-m-d H:i:s';
            $date = date($format, strtotime($bonusDate));

            $c = new Criteria();
            $c->add(MlmRoiDividendPeer::STATUS_CODE, Globals::DIVIDEND_STATUS_PENDING);
            $c->add(MlmRoiDividendPeer::DIVIDEND_DATE, $date, Criteria::LESS_EQUAL);
            $mlmRoiDividendDBs = MlmRoiDividendPeer::doSelect($c);
            var_dump(count($mlmRoiDividendDBs));
            foreach ($mlmRoiDividendDBs as $mlmRoiDividend) {
                $distId = $mlmRoiDividend->getDistId();
                $mt4UserName = $mlmRoiDividend->getMt4UserName();
                $packagePrice = $mlmRoiDividend->getPackagePrice();
                $dividendDate = $mlmRoiDividend->getDividendDate();
                print_r("DistId " . $distId . "<br>");
                print_r("dividendDate " . $dividendDate . "<br>");

                //$dividendDateStr = $dateUtil->formatDate("Y-m-j", $dividendDate);
                $dividendDateStr = "2013-11-06";
                $dividendDateFrom = $dividendDateStr . " 00:00:00";
                $dividendDateTo = "2013-11-07 23:59:59";

                $dividendDateFromTS = strtotime($dividendDateFrom);
                $dividendDateToTS = strtotime($dividendDateTo);

                $query = "SELECT mt4_credit, credit_id FROM mlm_daily_dist_mt4_credit WHERE 1=1 "
                     . " AND dist_id = '" . $distId . "' AND mt4_user_name = '" . $mt4UserName . "'"
                     . " AND traded_datetime >= '" . date("Y-m-d H:i:s", $dividendDateFromTS) . "' AND traded_datetime <= '" . date("Y-m-d H:i:s", $dividendDateToTS) . "'";

                //var_dump($query);
                //exit();
                $connection = Propel::getConnection();
                $statement = $connection->prepareStatement($query);
                $resultset = $statement->executeQuery();

                if ($resultset->next()) {
                    $arr = $resultset->getRow();
                    if ($packagePrice > $arr["mt4_credit"]) {
                        $packagePrice = $arr["mt4_credit"];
                    }

                    if ($packagePrice < 0) {
                        $packagePrice = 0;
                    }

                    $dividendAmount = $packagePrice * $mlmRoiDividend->getRoiPercentage();

                    $accountBalance = $this->getAccountBalance($distId, Globals::ACCOUNT_TYPE_ECASH);

                    $mlm_account_ledger = new MlmAccountLedger();
                    $mlm_account_ledger->setDistId($distId);
                    $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                    $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_FUND_MANAGEMENT);
                    $mlm_account_ledger->setRemark(("Performance Return:".$mlmRoiDividend->getRoiPercentage() * 100)."%, Fund:".$packagePrice);
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
                    $sponsorDistCommissionledger->setRemark(("Performance Return:".$mlmRoiDividend->getRoiPercentage() * 100)."%, Fund:".$packagePrice);
                    $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $sponsorDistCommissionledger->save();

                    $mt4Username = $mlmRoiDividend->getMt4UserName();
                    // new implement ********************************************************************
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
                    // new implement end ~ ********************************************************************

                    print_r($mlmRoiDividend->getMt4UserName() . ":" . $packagePrice . "<br>");
                    $mlmRoiDividend->setAccountLedgerId($mlm_account_ledger->getAccountId());
                    $mlmRoiDividend->setDividendAmount($dividendAmount);
                    $mlmRoiDividend->setMt4Balance($packagePrice);
                    $mlmRoiDividend->setStatusCode(Globals::DIVIDEND_STATUS_SUCCESS);
                    //$mlm_gold_dividend->setRemarks($this->getRequestParameter('remarks'));
                    $mlmRoiDividend->save();
                }
            }
            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeGenerateRoi()
    {
        print_r("executeGenerateRoi<br>");
        $c = new Criteria();
        $distMt4s = MlmDistMt4Peer::doSelect($c);

        $idx = 1;
        foreach ($distMt4s as $distMt4) {
            $distDB = MlmDistributorPeer::retrieveByPK($distMt4->getDistId());

            print_r($idx++.":distDB:".$distDB->getDistributorCode()."<br>");
            /* ****************************************************
           * ROI Divident
           * ***************************************************/
            $dateUtil = new DateUtil();
            $currentDate = $dateUtil->formatDate("Y-m-d", $distDB->getActiveDatetime()) . " 00:00:00";
            $currentDate_timestamp = strtotime($currentDate);
            //$dividendDate = $dateUtil->addDate($currentDate, 30, 0, 0);
            $firstDividendDate = strtotime("+1 months", $currentDate_timestamp);
            for ($x=1; $x <= 18; $x++) {
                $dividendDate = strtotime("+" . $x . " months", $currentDate_timestamp);

                $packageDB = MlmPackagePeer::retrieveByPK($distMt4->getRankId());

                $mlm_roi_dividend = new MlmRoiDividend();
                $mlm_roi_dividend->setDistId($distDB->getDistributorId());
                $mlm_roi_dividend->setIdx($x);
                $mlm_roi_dividend->setMt4UserName($distMt4->getMt4UserName());
                //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                $mlm_roi_dividend->setFirstDividendDate(date("Y-m-d h:i:s", $firstDividendDate));
                $mlm_roi_dividend->setPackageId($packageDB->getPackageId());
                $mlm_roi_dividend->setPackagePrice($packageDB->getPrice());
                $mlm_roi_dividend->setRoiPercentage($packageDB->getMonthlyRoi());
                //$mlm_roi_dividend->setDevidendAmount($this->getRequestParameter('devidend_amount'));
                //$mlm_roi_dividend->setRemarks($this->getRequestParameter('remarks'));
                $mlm_roi_dividend->setStatusCode(Globals::DIVIDEND_STATUS_PENDING);
                $mlm_roi_dividend->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_roi_dividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_roi_dividend->save();
            }
        }
        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeMigradeMt4()
    {
        print_r("executeMigradeMt4<br>");
        $c = new Criteria();
        $dists = MlmDistributorPeer::doSelect($c);

        $idx = 1;
        foreach ($dists as $dist) {
            $mt4Username = $dist->getMt4UserName();
            $mt4Password = $dist->getMt4Password();
            $rankId = $dist->getRankId();

            print_r($idx++.":".$mt4Username."<br>");
            if ($mt4Username == "" || $mt4Username == null) {
                continue;
            }

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Username);
            $existDistMt4 = MlmDistMt4Peer::doSelectOne($c);

            if (!$existDistMt4) {
                print_r($mt4Username."<br>");
                $mlmDistMt4 = new MlmDistMt4();
                $mlmDistMt4->setDistId($dist->getDistributorId());
                $mlmDistMt4->setMt4UserName($mt4Username);
                $mlmDistMt4->setMt4Password($mt4Password);
                $mlmDistMt4->setRankId($rankId);
                $mlmDistMt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistMt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlmDistMt4->save();
            }
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeMigrateMt4Rank()
    {
        $query = "UPDATE mlm_distributor SET mt4_rank_id = rank_id";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    public function executeTest() {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 4);
        $dist = MlmDistributorPeer::doSelectOne($c);

        $uplinePackageDB = MlmPackagePeer::retrieveByPK(10);

        $upgraded = $this->doCheckingMaster($dist, $uplinePackageDB);

        if ($upgraded == false) {
            $distId = $dist->getDistributorId();
            //$upgraded = $this->doCheckingProfessional($dist, $uplinePackageDB);

            $totalStandardAccount = $this->getTotalPackage($distId, "5");
            var_dump($totalStandardAccount);
            $totalGroupSales = $this->getTotalGroupSales($distId);
            var_dump($totalGroupSales);

            exit();
        }
    }
    public function executeMigratePackage()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 647);
        $c->addDescendingOrderByColumn(MlmDistributorPeer::TREE_LEVEL);
        $dists = MlmDistributorPeer::doSelect($c);

        $idx = 1;
        foreach ($dists as $dist) {
            print_r($idx++.":".$dist->getDistributorCode()."<br>");

            $distId = $dist->getDistributorId();
            $packageId = $dist->getRankId();
            $uplinePackageDB = MlmPackagePeer::retrieveByPK($packageId);

            if ($uplinePackageDB) {
                //Upgrade Conditions
                //MIRCO (1,2) TO MINI (3,4)
                //11	PROFESSIONAL ACCOUNT
                //12	MASTER ACCOUNT
                //13	GRAND MASTER ACCOUNT
                //MINI TO STANDARD (5,6,7,8,9,10)
                if ($packageId == 1 || $packageId == 2) {
                    /*$upgraded = $this->doCheckingGrandMaster($dist, $uplinePackageDB);
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingMaster($dist, $uplinePackageDB);
                    }
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingProfessional($dist, $uplinePackageDB);
                    }
                    if ($upgraded == false) {*/
                        $upgraded = $this->doCheckingStandard($dist, $uplinePackageDB);
                    //}
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingMini($dist, $uplinePackageDB);
                    }
                } else if ($packageId == 3 || $packageId == 4) {
                    /*$upgraded = $this->doCheckingGrandMaster($dist, $uplinePackageDB);
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingMaster($dist, $uplinePackageDB);
                    }
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingProfessional($dist, $uplinePackageDB);
                    }
                    if ($upgraded == false) {*/
                        $upgraded = $this->doCheckingStandard($dist, $uplinePackageDB);
                    //}
                } else if ($packageId == 5 || $packageId == 6 || $packageId == 7 || $packageId == 8 || $packageId == 9 || $packageId == 10) {
                    /*$upgraded = $this->doCheckingGrandMaster($dist, $uplinePackageDB);
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingMaster($dist, $uplinePackageDB);
                    }
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingProfessional($dist, $uplinePackageDB);
                    }*/
                } else if ($packageId == 11) {
                   /* $upgraded = $this->doCheckingGrandMaster($dist, $uplinePackageDB);
                    if ($upgraded == false) {
                        $upgraded = $this->doCheckingMaster($dist, $uplinePackageDB);
                    }*/
                } else if ($packageId == 12) {
                    //$upgraded = $this->doCheckingGrandMaster($dist, $uplinePackageDB);
                }
            } else {
                print_r("################################################### not exist");
            }
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    function doCheckingMaster($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        $totalMircoAccount = $this->getTotalPackage($distId, "1");
        $totalMiniAccount = $this->getTotalPackage($distId, "3");
        $totalStandardAccount = $this->getTotalPackage($distId, "5");
        $totalProfessionAccount = $this->getTotalPackage($distId, "11");

        if ($totalProfessionAccount >= 5) {
            $totalGroupSales = $this->getTotalGroupSales($distId);

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
        //var_dump($totalMircoAccount);
        //exit();
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
        //$totalMircoAccount = $this->getTotalPackage($distId, "1");
        $totalMiniAccount = $this->getTotalPackage($distId, "3");
        var_dump($totalMiniAccount);
        exit();
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
    function doCheckingProfessional($dist, $uplinePackageDB)
    {
        $distId = $dist->getDistributorId();
        //$totalMircoAccount = $this->getTotalPackage($distId, "1");
        //$totalMiniAccount = $this->getTotalPackage($distId, "3");
        $totalStandardAccount = $this->getTotalPackage($distId, "5");

        if ($totalStandardAccount >= 5) {
            $totalGroupSales = $this->getTotalGroupSales($distId);

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
                $mlmPackageUpgradeHistory->setRemarks("PACKAGE UPGRADED FROM ".$fromPackageName." => ".$promotePackageName.", PACKAGE NAME:".$promotePackageName.", TOTAL PACKAGE:".$totalStandardAccount. ", TOTAL GROUP SALES:".$totalGroupSales);
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
        //$totalMircoAccount = $this->getTotalPackage($distId, "1");
        //$totalMiniAccount = $this->getTotalPackage($distId, "3");
        //$totalStandardAccount = $this->getTotalPackage($distId, "5");
        //$totalProfessionAccount = $this->getTotalPackage($distId, "11");
        $totalMasterAccount = $this->getTotalPackage($distId, "12");

        if ($totalMasterAccount >= 5) {
            $totalGroupSales = $this->getTotalGroupSales($distId);

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
    function getTotalGroupSales($distributorId)
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

    function executeMigrateMt4Password()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "mt4_password.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);
        for ($x = $totalRow; $x > 0; $x--) {
            $mt4Username = $data->val($x, "B");
            $mt4Password = $data->val($x, "C");

            $c = new Criteria();
            $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Username);
            $mlmDistMt4 = MlmDistMt4Peer::doSelectOne($c);

            if ($mlmDistMt4) {
                $mlmDistMt4->setMt4Password($mt4Password);
                $mlmDistMt4->save();
            }
        }
        print_r("Done");
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
                        $totalCount += 1;
                    }
                }
            }
        }
        return $totalCount;
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
}
