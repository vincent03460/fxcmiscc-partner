<?php

/**
 * marketing actions.
 *
 * @package    sf_sandbox
 * @subpackage marketing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class marketingActions extends sfActions
{
    public function executeDoUpdatePackagePurchaseViaAuto()
    {
        include_once("wr_mq.php");
        include_once("wr_tools.php");
        include_once("wr_cfg.php");

        $c = new Criteria();
        $c->add(MlmDistributorPeer::PACKAGE_PURCHASE_FLAG, "Y");
        //$c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 1);
        $c->setLimit(30);
        $distributorDBs = MlmDistributorPeer::doSelect($c);

        if (count($distributorDBs) > 0) {
            foreach ($distributorDBs as $tbl_distributor) {
                $con = Propel::getConnection(MlmPipCsvPeer::DATABASE_NAME);
                $error = false;
                $errorMessage = "";

                try {
                    $con->begin();

                    $c = new Criteria();
                    $c->add(AppSettingPeer::SETTING_PARAMETER, "MT4_ID");
                    $appSettingDB = AppSettingPeer::doSelectOne($c);

                    if (!$appSettingDB) {
                        print_r("Error, MT4 ID not exits");
                        return sfView::HEADER_ONLY;
                    }

                    $mt4Id = $appSettingDB->getSettingValue();
                    $mt4Password = $this->generateMt4Password();

                    print_r("<br>Distributor ID:".$tbl_distributor->getDistributorId().", Distributor Code:".$tbl_distributor->getDistributorCode().", MT4:".$mt4Id);
                    $tbl_distributor->setPackagePurchaseFlag("N");
                    $tbl_distributor->save();

                    $packageDB = MlmPackagePeer::retrieveByPK($tbl_distributor->getInitRankId());
                    $groupName = 4;
                    $packagePrice = $packageDB->getPrice();

                    $password = $mt4Password;

                    $name = $tbl_distributor->getFullName();
                    $investor = "";
                    $email = $tbl_distributor->getEmail();
                    $email = "";
                    $country = "";
                    $state = "";
                    $city = "";
                    $address = $tbl_distributor->getDistributorCode();
                    $comment = "";
                    $phone = "";
                    $phonePassword = "";
                    $status = "";
                    $zipcode = "";
                    $id = "";
                    $login = $mt4Id;
                    $leverage = "100";
                    $agent = "";
                    $sendReports = "1";
                    $deposit = $packagePrice;

                    $encode = '';
                    foreach(mb_list_encodings() as $val){
                        if($val == 'GB18030' || $val == 'GB2312'){
                            $encode = $val;
                        }
                    }
                    //var_dump("====================================");
                    //var_dump($encode);
                    if(mb_detect_encoding($name, 'UTF-8') == 'UTF-8'){
                        $name = mb_convert_encoding($name, $encode, 'UTF-8');
                    }

                    $query = "NEWACCOUNT MASTER=admin@20140822|IP=".$_SERVER[REMOTE_ADDR]."|GROUP=".$groupName."|NAME=".$name."|PASSWORD=".$password."|INVESTOR=|EMAIL=".$email;
                    $query .= "|COUNTRY=".$country."|STATE=".$state."|CITY=".$city."|ADDRESS=".$address."|COMMENT=|PHONE=".$phone."|PHONE_PASSWORD=".$phonePassword."|STATUS=|ZIPCODE=".$zipcode;
                    $query .= "|ID=|LOGIN=".$login."|LEVERAGE=".$leverage."|AGENT=|SEND_REPORTS=".$sendReports."|DEPOSIT=".$deposit;

                    var_dump($query);
                    $returnStr = MQ_Query($query);
                    $pos = strrpos($returnStr, "OK");
                    if ($pos === false) { // note: three equal signs
                        print_r("***** ERROR".$returnStr);
                        return sfView::HEADER_ONLY;
                    } else {
                        print "<p style='background-color:#EEFFEE'>Account No. <b>".$mt4Id."</b> credited to balance: ".$packagePrice.".</p>";
                    }

                    $mlm_dist_mt4 = new MlmDistMt4();
                    $mlm_dist_mt4->setDistId($tbl_distributor->getDistributorId());
                    $mlm_dist_mt4->setRankId($tbl_distributor->getInitRankId());
                    $mlm_dist_mt4->setMt4UserName($mt4Id);
                    $mlm_dist_mt4->setMt4Password($mt4Password);
                    $mlm_dist_mt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->save();

                    /* ****************************************************
                   * ROI Divident
                   * ***************************************************/
                    $packageDB = MlmPackagePeer::retrieveByPK($tbl_distributor->getInitRankId());

                    $dateUtil = new DateUtil();
                    $currentDate = $dateUtil->formatDate("Y-m-d", $tbl_distributor->getActiveDatetime()) . " 00:00:00";
                    $currentDate_timestamp = strtotime($currentDate);
                    $firstDividendDate = strtotime("+1 months", $currentDate_timestamp);
                    for ($x=1; $x <= Globals::DIVIDEND_TIMES_ENTITLEMENT; $x++) {
                        $dividendDate = strtotime("+" . $x . " months", $currentDate_timestamp);

                        $mlm_roi_dividend = new MlmRoiDividend();
                        $mlm_roi_dividend->setDistId($tbl_distributor->getDistributorId());
                        $mlm_roi_dividend->setIdx($x);
                        $mlm_roi_dividend->setMt4UserName($mt4Id);
                        //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                        $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setFirstDividendDate($firstDividendDate);
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

                    $appSettingDB->setSettingValue($mt4Id + 1);
                    $appSettingDB->save();

                    $this->sendEmailForMt4($mt4Id, $mt4Password, $tbl_distributor->getFullName(), $tbl_distributor->getEmail());

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
            }
        } else {
            $c = new Criteria();
            $c->add(MlmPackageUpgradeHistoryPeer::STATUS_CODE, "ACTIVE");
            $c->add(MlmPackageUpgradeHistoryPeer::TRANSACTION_CODE, "PACKAGE UPGRADE");
            //$c->add(MlmDistributorPeer::DISTRIBUTOR_ID, 1);
            $c->setLimit(30);
            $packageUpgradeHistoryDBs = MlmPackageUpgradeHistoryPeer::doSelect($c);

            foreach ($packageUpgradeHistoryDBs as $packageUpgradeHistoryDB) {
                $con = Propel::getConnection(MlmPipCsvPeer::DATABASE_NAME);
                $error = false;
                $errorMessage = "";

                try {
                    $con->begin();

                    $c = new Criteria();
                    $c->add(AppSettingPeer::SETTING_PARAMETER, "MT4_ID");
                    $appSettingDB = AppSettingPeer::doSelectOne($c);

                    if (!$appSettingDB) {
                        print_r("Error, MT4 ID not exits");
                        return sfView::HEADER_ONLY;
                    }
                    $tbl_distributor = MlmDistributorPeer::retrieveByPK($packageUpgradeHistoryDB->getDistId());
                    $mt4Id = $appSettingDB->getSettingValue();
                    $mt4Password = $this->generateMt4Password();

                    print_r("<br>Distributor ID:".$tbl_distributor->getDistributorId().", Distributor Code:".$tbl_distributor->getDistributorCode().", MT4:".$mt4Id);

                    $packageDB = MlmPackagePeer::retrieveByPK($packageUpgradeHistoryDB->getPackageId());
                    $groupName = 4;
                    $packagePrice = $packageDB->getPrice();

                    $password = $mt4Password;

                    $name = $tbl_distributor->getFullName();
                    $investor = "";
                    $email = $tbl_distributor->getEmail();
                    $email = "";
                    $country = "";
                    $state = "";
                    $city = "";
                    $address = $tbl_distributor->getDistributorCode();
                    $comment = "";
                    $phone = "";
                    $phonePassword = "";
                    $status = "";
                    $zipcode = "";
                    $id = "";
                    $login = $mt4Id;
                    $leverage = "100";
                    $agent = "";
                    $sendReports = "1";
                    $deposit = $packagePrice;

                    $encode = '';
                    foreach(mb_list_encodings() as $val){
                        if($val == 'GB18030' || $val == 'GB2312'){
                            $encode = $val;
                        }
                    }
                    //var_dump("====================================");
                    //var_dump($encode);
                    if(mb_detect_encoding($name, 'UTF-8') == 'UTF-8'){
                        $name = mb_convert_encoding($name, $encode, 'UTF-8');
                    }

                    $query = "NEWACCOUNT MASTER=admin@20140822|IP=".$_SERVER[REMOTE_ADDR]."|GROUP=".$groupName."|NAME=".$name."|PASSWORD=".$password."|INVESTOR=|EMAIL=".$email;
                    $query .= "|COUNTRY=".$country."|STATE=".$state."|CITY=".$city."|ADDRESS=".$address."|COMMENT=|PHONE=".$phone."|PHONE_PASSWORD=".$phonePassword."|STATUS=|ZIPCODE=".$zipcode;
                    $query .= "|ID=|LOGIN=".$login."|LEVERAGE=".$leverage."|AGENT=|SEND_REPORTS=".$sendReports."|DEPOSIT=".$deposit;

                    $returnStr = MQ_Query($query);
                    $pos = strrpos($returnStr, "OK");
                    if ($pos === false) { // note: three equal signs
                        print_r("***** ERROR".$returnStr);
                        return sfView::HEADER_ONLY;
                    } else {
                        print "<p style='background-color:#EEFFEE'>Account No. <b>".$mt4Id."</b> credited to balance: ".$packagePrice.".</p>";
                    }

                    $mlm_dist_mt4 = new MlmDistMt4();
                    $mlm_dist_mt4->setDistId($packageUpgradeHistoryDB->getDistId());
                    $mlm_dist_mt4->setMt4UserName($mt4Id);
                    $mlm_dist_mt4->setMt4Password($password);
                    $mlm_dist_mt4->setRankId($packageUpgradeHistoryDB->getPackageId());
                    $mlm_dist_mt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->save();

                    /* ****************************************************
                   * ROI Divident
                   * ***************************************************/
                    $dateUtil = new DateUtil();
                    $currentDate = $dateUtil->formatDate("Y-m-d", $packageUpgradeHistoryDB->getCreatedOn()) . " 00:00:00";
                    $currentDate_timestamp = strtotime($currentDate);
                    $firstDividendDate = strtotime("+1 months", $currentDate_timestamp);
                    for ($x=1; $x <= 18; $x++) {
                        $dividendDate = strtotime("+" . $x . " months", $currentDate_timestamp);

                        $mlm_roi_dividend = new MlmRoiDividend();
                        $mlm_roi_dividend->setDistId($tbl_distributor->getDistributorId());
                        $mlm_roi_dividend->setIdx($x);
                        $mlm_roi_dividend->setMt4UserName($mt4Id);
                        //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                        $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setFirstDividendDate(date("Y-m-d h:i:s", $dividendDate));
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

                    $appSettingDB->setSettingValue($mt4Id + 1);
                    $appSettingDB->save();

                    $packageUpgradeHistoryDB->setMt4UserName($mt4Id);
                    $packageUpgradeHistoryDB->setMt4Password($mt4Password);
                    $packageUpgradeHistoryDB->setRemarks($remarks);
                    $packageUpgradeHistoryDB->setStatusCode($statusCode);
                    $packageUpgradeHistoryDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

                    $packageUpgradeHistoryDB->save();

                    $this->sendEmailForMt4($mt4Id, $mt4Password, $tbl_distributor->getFullName(), $tbl_distributor->getEmail());

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
            }
        }
        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeTestConnection()
    {
        include_once("wr_mq.php");
        include_once("wr_tools.php");
        include_once("wr_cfg.php");

        $con = Propel::getConnection(MlmPipCsvPeer::DATABASE_NAME);
        $error = false;
        $errorMessage = "";

        $c = new Criteria();
        $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mlmDailyDistMt4CreditDB->getMt4UserName());
        $mlmDistMt4DB = MlmDistMt4Peer::doSelectOne($c);

        if (!$mlmDistMt4DB) {
            print_r("====== ERROR");
            return sfView::HEADER_ONLY;
        }

        $mlmDistDB = MlmDistributorPeer::retrieveByPK($mlmDistMt4DB->getDistId());
        try {
            $con->begin();

            $mt4IdOri = $mlmDailyDistMt4CreditDB->getMt4UserName();
            $mt4Id = $mlmDailyDistMt4CreditDB->getMt4UserName();
            $first3Character = substr($mt4Id, 0, 3);

            if ($first3Character == "745") {
                $mt4Id = substr($mt4Id, 3, strlen($mt4Id));
            }
            $name = $mlmDistDB->getFullName();
            $password = $mlmDistMt4DB->getMt4Password();
            $password = "q1w2e3r4";
            $investor = "";
            $email = $mlmDistDB->getEmail();
            $country = "";
            $state = "";
            $city = "";
            $address = $mlmDistDB->getDistributorCode();
            $comment = "";
            $phone = "";
            $phonePassword = "";
            $status = "";
            $zipcode = "";
            $id = "";
            $login = $mt4Id;
            $leverage = "100";
            $agent = "";
            $sendReports = "1";
            $deposit = $mlmDailyDistMt4CreditDB->getMt4Credit();

            $query = "NEWACCOUNT MASTER=admin@20140822|IP=".$_SERVER[REMOTE_ADDR]."|GROUP=3|NAME=".$name."|PASSWORD=".$password."|INVESTOR=|EMAIL=".$email;
            $query .= "|COUNTRY=".$country."|STATE=".$state."|CITY=".$city."|ADDRESS=".$address."|COMMENT=|PHONE=".$phone."|PHONE_PASSWORD=".$phonePassword."|STATUS=|ZIPCODE=".$zipcode;
            $query .= "|ID=|LOGIN=".$login."|LEVERAGE=".$leverage."|AGENT=|SEND_REPORTS=".$sendReports."|DEPOSIT=".$deposit;

            $returnStr = MQ_Query($query);
            $pos = strrpos($returnStr, "OK");
            if ($pos === false) { // note: three equal signs
                var_dump($query);
                $mlmDailyDistMt4CreditDB->setStatusCode(Globals::STATUS_ERROR);
                $mlmDailyDistMt4CreditDB->setRemark($returnStr);
                $mlmDailyDistMt4CreditDB->save();
                print_r("***** ERROR".$returnStr);
            } else {
                print_r("<br><br>Before:".$mt4IdOri.",after:".$mt4Id);
                $mlmDailyDistMt4CreditDB->setMt4UserName($mt4Id);
                $mlmDailyDistMt4CreditDB->setStatusCode(Globals::STATUS_COMPLETE);
                $mlmDailyDistMt4CreditDB->setRemark($returnStr);
                $mlmDailyDistMt4CreditDB->save();

                $mlmDistMt4DB->setMt4UserName($mt4Id);
                $mlmDistMt4DB->setMt4Password($password);
                $mlmDistMt4DB->save();

                $c = new Criteria();
                $c->add(MlmRoiDividendPeer::MT4_USER_NAME, $mt4IdOri);
                $mlmRoiDividendDBs = MlmRoiDividendPeer::doSelect($c);

                foreach($mlmRoiDividendDBs as $mlmRoiDividendDB) {
                    $mlmRoiDividendDB->setMt4UserName($mt4Id);
                    $mlmRoiDividendDB->save();
                }
                sleep(5);
                print_r("====== DONE");
            }

            $con->commit();
        } catch (PropelException $e) {
            $con->rollback();
            throw $e;
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeCheckBalance()
    {
        require_once('MT4WebRequest.php');

        $login = 2527781;
        $password = "xd3kxGb";
        $mt4 = new MT4WebRequest();
        $data = $mt4->AccountBalance($login);

        var_dump($data);

        if ($data["status"] == "success") {
            var_dump($data["message"]["balance"]);
        } else {
            print_r("invalid");
        }
        /*$data = $mt4->AccountInfo($login, $password);

        var_dump($data);

        if ($data["status"] == "success") {
            var_dump($data["message"]["balance"]);
        } else {
            print_r("invalid");
        }*/
        //array(2) { ["status"]=> string(5) "error" ["message"]=> string(17) "Invalid Account " }
        //array(2) { ["status"]=> string(7) "success" ["message"]=> array(8) { ["account"]=> string(8) "35010081" ["name"]=> string(19) "CALVIN ONG WEE SHAN" ["joined"]=> string(16) "2014.11.20 04:33" ["balance"]=> string(5) "53.92" ["equity"]=> string(5) "53.92" ["margin"]=> string(4) "0.00" ["free_margin"]=> string(5) "53.92" ["margin_level"]=> string(2) "0%" } }
        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeUpdateAdvancePipCommission()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::LOAN_ACCOUNT, "Y");
        $distDBs = MlmDistributorPeer::doSelect($c);

        $pumpLimit = 5000;
        $temp = 0;

        $tradingMonth = 1;
        $tradingYear = 2014;
        foreach ($distDBs as $existDistributor) {
            if ($temp > $pumpLimit)
                break;

            $pipsAmountEntitied = rand(15, 99) + (rand(1, 99) / 100);
            $temp += $pipsAmountEntitied;
            echo $temp."<br>";
            $pipsBalance = $this->getCommissionBalance(3, Globals::COMMISSION_TYPE_PIPS_BONUS);

            $sponsorDistCommissionledger = new MlmDistCommissionLedger();
            $sponsorDistCommissionledger->setMonthTraded($tradingMonth);
            $sponsorDistCommissionledger->setYearTraded($tradingYear);
            $sponsorDistCommissionledger->setDistId(3);
            $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_PIPS_BONUS);
            $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_PIPS_GAIN);
            $sponsorDistCommissionledger->setRefId(0);
            $sponsorDistCommissionledger->setCredit($pipsAmountEntitied);
            $sponsorDistCommissionledger->setDebit(0);
            $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
            $sponsorDistCommissionledger->setBalance($pipsBalance + $pipsAmountEntitied);
            $sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode());
            //$sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode().", tier:".$gap.", volume:".$totalVolume.", pips:".$pipsEntitied);
            $sponsorDistCommissionledger->setPipsDownlineUsername($existDistributor->getDistributorCode());
            $sponsorDistCommissionledger->setPipsMt4Id($existDistributor->getMt4UserName());
            $sponsorDistCommissionledger->setPipsRebate(0);
            $sponsorDistCommissionledger->setPipsLevel(0);
            $sponsorDistCommissionledger->setPipsLotsTraded(0);
            $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $sponsorDistCommissionledger->save();
        }

        echo 'Done';
        return sfView::HEADER_ONLY;
    }
    public function executeManualSendMt4()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "normal.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $counter = 1;
        $totalRow = $data->rowcount($sheet_index = 0);
        for ($x = $totalRow; $x > 0; $x--) {
            $mt4Username = $data->val($x, "B");
            $mt4Password = $data->val($x, "A");
            $email = $data->val($x, "E");
            $status = $data->val($x, "D");
            $fullname = $data->val($x, "C");

            if ($mt4Password == "" || $email == "" || $status != "ACTIVE")
                continue;

            $result = $this->sendEmailForMt4($mt4Username, $mt4Password, $fullname, $email);

            $counter++;
        }
        print_r($totalRow);

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeDummyPipsData()
    {
//        $this->captureDataFromExcel();
        //$this->updateJoinDate();

//        $this->restructureAllMember();
        $this->restructureAllMember();

//        $this->doRestoreEcashWallet();

//        $this->doRestorePipsDist();
    }

    function doRestorePipsDist() {
        $c = new Criteria();
        $distDBs = MlmDistributorPeer::doSelect($c);

        foreach ($distDBs as $mlm_distributor) {
            $distCode = $mlm_distributor->getDistributorCode();

            $query = "update mlm_pips_rebate set dist_id = ".$mlm_distributor->getDistributorId()." where dist_code = '".$distCode."'";

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();
        }
    }

    public function executeCustomerEnquiryAdd()
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmDistributorPeer::DISTRIBUTOR_CODE);
        $this->dists = MlmDistributorPeer::doSelect($c);
    }

    function doRestoreEcashWallet() {
        $c = new Criteria();
        $distDBs = MlmDistributorPeer::doSelect($c);

        foreach ($distDBs as $mlm_distributor) {
            $remark = $mlm_distributor->getRemark();

            $creditRefund = str_replace("USD ","",$remark);

            $mlm_account_ledger = new MlmAccountLedger();
            $mlm_account_ledger->setDistId($mlm_distributor->getDistributorId());
            $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
            $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
            $mlm_account_ledger->setCredit($creditRefund);
            $mlm_account_ledger->setDebit(0);
            $mlm_account_ledger->setBalance($creditRefund);
            $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_account_ledger->save();
        }
    }
    function restructureAllMember() {
        $c = new Criteria();
        $distDBs = MlmDistributorPeer::doSelect($c);

        foreach ($distDBs as $mlm_distributor) {
            $treeLevel = 1;
            $treeStructure = "|".$mlm_distributor->getDistributorId()."|";
            $placementTreeLevel = 1;
            $placementTreeStructure = "|".$mlm_distributor->getDistributorId()."|";

            $uplineDistId = 0;
            $uplineDistCode = $mlm_distributor->getUplineDistCode();
            $treeUplineDistId = 0;
            $treeUplineDistCode = $mlm_distributor->getTreeUplineDistCode();

            print_r($mlm_distributor->getDistributorId().":".$mlm_distributor->getUplineDistCode().":".$mlm_distributor->getTreeUplineDistCode());
            print_r("<br>");

            if ($mlm_distributor->getUplineDistCode() != "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $mlm_distributor->getUplineDistCode());
                $sponsorMember = MlmDistributorPeer::doSelectOne($c);

                $uplineDistId = $sponsorMember->getDistributorId();
                $uplineDistCode = $sponsorMember->getDistributorCode();
                $treeLevel = $sponsorMember->getTreeLevel() + 1;
                $treeStructure = $sponsorMember->getTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            }
            if ($mlm_distributor->getTreeUplineDistCode() != "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $mlm_distributor->getTreeUplineDistCode());
                $sponsorMember = MlmDistributorPeer::doSelectOne($c);

                $treeUplineDistId = $sponsorMember->getDistributorId();
                $treeUplineDistCode = $sponsorMember->getDistributorCode();
                $placementTreeLevel = $sponsorMember->getPlacementTreeLevel() + 1;
                $placementTreeStructure = $sponsorMember->getPlacementTreeStructure() . "|" . $mlm_distributor->getDistributorId() . "|";
            }
            print_r($placementTreeStructure);
            print_r("<br>");
//            $mlm_distributor->setUplineDistId($uplineDistId);
//            $mlm_distributor->setTreeUplineDistId($treeUplineDistId);
            $mlm_distributor->setTreeLevel($treeLevel);
            $mlm_distributor->setTreeStructure($treeStructure);
            $mlm_distributor->setPlacementTreeLevel($placementTreeLevel);
            $mlm_distributor->setPlacementTreeStructure($placementTreeStructure);
            $mlm_distributor->save();
        }
    }
    function updateJoinDate() {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "datetimejoin.txt";

        $file_handle = fopen($physicalDirectory, "rb");

        $idx = 412;
        while (!feof($file_handle)) {
            $line_of_text = fgets($file_handle);

            print_r($idx);
            print_r("<br>");

            $distDB = MlmDistributorPeer::retrieveByPK($idx);
            $distDB->setCreatedOn($line_of_text);
            $distDB->setActiveDatetime($line_of_text);
            $distDB->setPlacementDatetime($line_of_text);
            $distDB->save();

            $idx--;
        }
    }
    function captureDataFromExcel() {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "member_list.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);
        for ($x = $totalRow; $x > 1; $x--) {
            $userName = $data->val($x, "A");
            $password = $data->val($x, "D");
            $securityPassword = $data->val($x, "E");

            if ($securityPassword == "") {
                $securityPassword = $password;
            }

            print_r($x.":".$userName);
            print_r("<br>");

            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $userName);
            $app_user = AppUserPeer::doSelectOne($c);

            if (!$app_user) {
                $app_user = new AppUser();
            }
            $app_user->setUsername($userName);
            $app_user->setKeepPassword($password);
            $app_user->setUserpassword($password);
            $app_user->setKeepPassword2($securityPassword);
            $app_user->setUserpassword2($securityPassword);
            $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
            $app_user->setStatusCode(Globals::STATUS_ACTIVE);
            $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $app_user->save();

            $c = new Criteria();
            $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $userName);
            $mlm_distributor = MlmDistributorPeer::doSelectOne($c);

            if (!$mlm_distributor) {
                $mlm_distributor = new MlmDistributor();
            }
            $mlm_distributor->setDistributorCode($userName);
            $mlm_distributor->setUserId($app_user->getUserId());
            $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_distributor->setFullName($data->val($x, "B"));
            $mlm_distributor->setNickname($data->val($x, "C"));
            $mlm_distributor->setMt4UserName($data->val($x, "F"));
            $mlm_distributor->setMt4Password("");
            $mlm_distributor->setIc("");
            $mlm_distributor->setCountry("");
            $mlm_distributor->setAddress("");
            $mlm_distributor->setAddress2("");
            $mlm_distributor->setCity("");
            $mlm_distributor->setState("");
            $mlm_distributor->setPostcode("");
            $mlm_distributor->setEmail($data->val($x, "G"));
            $mlm_distributor->setAlternateEmail($data->val($x, "G"));
            $mlm_distributor->setContact("");
            $mlm_distributor->setGender("");

            $mlm_distributor->setTotalLeft(0);
            $mlm_distributor->setTotalRight(0);

            $mlm_distributor->setPlacementPosition(strtoupper($data->val($x, "N")));
            $mlm_distributor->setPlacementDatetime(date("Y-m-d h:i:s"));
            $mlm_distributor->setActiveDatetime(date("Y-m-d h:i:s"));

            $originalPackage = $data->val($x, "K");
            $currentPackage = $data->val($x, "J");

            $c = new Criteria();
            $c->add(MlmPackagePeer::PACKAGE_NAME, $originalPackage);
            $packageOriginal = MlmPackagePeer::doSelectOne($c);

            $c = new Criteria();
            $c->add(MlmPackagePeer::PACKAGE_NAME, $currentPackage);
            $packageCurrent = MlmPackagePeer::doSelectOne($c);

            $mlm_distributor->setInitRankId($packageOriginal->getPackageId());
            $mlm_distributor->setInitRankCode($packageOriginal->getPackageName());
            $mlm_distributor->setRankId($packageCurrent->getPackageId());
            $mlm_distributor->setRankCode($packageCurrent->getPackageName());

            $mlm_distributor->setCreatedBy(0);
            $mlm_distributor->setUpdatedBy(0);
            $mlm_distributor->setRemark($data->val($x, "I"));

            $mlm_distributor->save();

            // update placement tree   +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            $sponsorMemberName = $data->val($x, "H");
            $placementMemberName = $data->val($x, "M");

            $treeLevel = 1;
            $treeStructure = "|".$mlm_distributor->getDistributorId()."|";
            $placementTreeLevel = 1;
            $placementTreeStructure = "|".$mlm_distributor->getDistributorId()."|";

            $uplineDistId = 0;
            $uplineDistCode = $sponsorMemberName;
            $treeUplineDistId = 0;
            $treeUplineDistCode = $placementMemberName;

            /*if ($sponsorMemberName != "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorMemberName);
                $sponsorMember = MlmDistributorPeer::doSelectOne($c);

                $uplineDistId = $sponsorMember->getDistributorId();
                $uplineDistCode = $sponsorMember->getDistributorCode();
                $treeLevel = $sponsorMember->getTreeLevel() + 1;
                $treeStructure = $sponsorMember->getTreeStructure() . "|" . $sponsorMember->getDistributorId() . "|";
            }
            if ($placementMemberName != "") {
                $c = new Criteria();
                $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorMemberName);
                $sponsorMember = MlmDistributorPeer::doSelectOne($c);

                $treeUplineDistId = $sponsorMember->getDistributorId();
                $treeUplineDistCode = $sponsorMember->getDistributorCode();
                $placementTreeLevel = $sponsorMember->getTreeLevel() + 1;
                $placementTreeStructure = $sponsorMember->getTreeStructure() . "|" . $sponsorMember->getDistributorId() . "|";
            }*/

            $mlm_distributor->setTreeLevel($treeLevel);
            $mlm_distributor->setTreeStructure($treeStructure);
            $mlm_distributor->setPlacementTreeLevel($placementTreeLevel);
            $mlm_distributor->setPlacementTreeStructure($placementTreeStructure);

            $mlm_distributor->setUplineDistId($uplineDistId);
            $mlm_distributor->setUplineDistCode($uplineDistCode);
            $mlm_distributor->setTreeUplineDistId($treeUplineDistId);
            $mlm_distributor->setTreeUplineDistCode($treeUplineDistCode);
            $mlm_distributor->save();
        }
    }
    public function executeUpdateAccountStatus()
    {
        $count = $this->getRequestParameter('count');
        for ($i= 0; $i < $count; $i++) {
            $requestId = $this->getRequestParameter('request_id_'. $i);

            $mlmMt4DemoRequest = MlmMt4DemoRequestPeer::retrieveByPK($requestId);
            if ($mlmMt4DemoRequest) {
                $mlmMt4DemoRequest->setStatusCode("VIEWED");
                $mlmMt4DemoRequest->save();
            }
        }
        return sfView::HEADER_ONLY;
    }
     public function executeUpdateDebitCardApplicationStatus()
    {
        $count = $this->getRequestParameter('count');
        $status = $this->getRequestParameter('status');
        for ($i= 0; $i < $count; $i++) {
            $requestId = $this->getRequestParameter('card_id'. $i);

            $mlmDebitCardRegistration = MlmDebitCardRegistrationPeer::retrieveByPK($requestId);
            if ($mlmDebitCardRegistration) {
                $mlmDebitCardRegistration->setStatusCode($status);
                $mlmDebitCardRegistration->save();
            }
        }
        return sfView::HEADER_ONLY;
    }
     public function executeUpdateEzyCashCardApplicationStatus()
    {
        $count = $this->getRequestParameter('count');
        $status = $this->getRequestParameter('status');
        for ($i= 0; $i < $count; $i++) {
            $requestId = $this->getRequestParameter('card_id'. $i);

            $mlmEzyCashCard = MlmEzyCashCardPeer::retrieveByPK($requestId);
            if ($mlmEzyCashCard) {
                $mlmEzyCashCard->setStatusCode($status);
                $mlmEzyCashCard->save();
            }
        }
        return sfView::HEADER_ONLY;
    }
    public function executeDemoAccountRequest()
    {
    }
    public function executeLiveAccountRequest()
    {
    }
    public function executeDebitCardApplication()
    {
    }
    public function executeEzyCashCardApplication()
    {
    }
    public function executeCustomerEnquiryList()
    {
    }

    public function executeCustomerEnquiryDetail()
    {
        $enquiryId = $this->getRequestParameter('enquiryId');

        $mlmCustomerEnquiry = MlmCustomerEnquiryPeer::retrieveByPK($enquiryId);

        if (!$mlmCustomerEnquiry) {
            $this->setFlash('errorMsg', $this->getContext()->getI18N()->__("Invalid Action."));
            return $this->redirect('/member/customerEnquiry');
        }
        $mlmCustomerEnquiry->setAdminRead(Globals::TRUE);
        $mlmCustomerEnquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlmCustomerEnquiry->save();

        $c = new Criteria();
        $c->add(MlmCustomerEnquiryDetailPeer::CUSTOMER_ENQUIRY_ID, $enquiryId);
        $mlmCustomerEnquiryDetails = MlmCustomerEnquiryDetailPeer::doSelect($c);

        $this->mlmCustomerEnquiry = $mlmCustomerEnquiry;
        $this->mlmCustomerEnquiryDetails = $mlmCustomerEnquiryDetails;
    }

    public function executeDoCustomerEnquiryDetail()
    {
        $enquiryId = $this->getRequestParameter('enquiryId');
        $message = $this->getRequestParameter('message');

        $mlmCustomerEnquiry = new MlmCustomerEnquiry();
        if ($enquiryId == "") {
            $distId = $this->getRequestParameter('distId');
            $title = $this->getRequestParameter('title');

            $mlmCustomerEnquiry->setDistributorId($distId);
            $mlmCustomerEnquiry->setContactNo("");
            $mlmCustomerEnquiry->setTitle($title);
            $mlmCustomerEnquiry->setAdminUpdated(Globals::TRUE);
            $mlmCustomerEnquiry->setDistributorUpdated(Globals::FALSE);
            $mlmCustomerEnquiry->setAdminRead(Globals::TRUE);
            $mlmCustomerEnquiry->setDistributorRead(Globals::FALSE);
            $mlmCustomerEnquiry->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmCustomerEnquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

            $mlmCustomerEnquiry->save();

            $enquiryId = $mlmCustomerEnquiry->getEnquiryId();
        } else {
            $mlmCustomerEnquiry = MlmCustomerEnquiryPeer::retrieveByPK($enquiryId);
            $mlmCustomerEnquiry->setAdminUpdated(Globals::TRUE);
            $mlmCustomerEnquiry->setDistributorUpdated(Globals::FALSE);
            $mlmCustomerEnquiry->setDistributorRead(Globals::FALSE);
            $mlmCustomerEnquiry->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));

            $mlmCustomerEnquiry->save();
        }

        $mlm_customer_enquiry_detail = new MlmCustomerEnquiryDetail();
        $mlm_customer_enquiry_detail->setCustomerEnquiryId($mlmCustomerEnquiry->getEnquiryId());
        $mlm_customer_enquiry_detail->setMessage($message);
        $mlm_customer_enquiry_detail->setReplyFrom(Globals::ROLE_ADMIN);
        $mlm_customer_enquiry_detail->setStatusCode(Globals::STATUS_ACTIVE);
        $mlm_customer_enquiry_detail->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_customer_enquiry_detail->save();

        $this->setFlash('successMsg', $this->getContext()->getI18N()->__("Your inquiry has been submitted."));
        return $this->redirect('/marketing/customerEnquiryDetail?enquiryId='.$enquiryId);
    }
    public function executeIndex()
    {
        return $this->redirect('/marketing/distList');
    }

    public function executeFundManagementUpload()
    {
        if ($this->getRequest()->getFileName('fundManagement') != '') {
            $uploadedFilename = $this->getRequest()->getFileName('fundManagement');
            $ext = explode(".", $this->getRequest()->getFileName('fundManagement'));
            $extensionName = $ext[count($ext) - 1];

            $filename = "fundManagement_".date("Ymd")."_".rand(1000,9999).".".$extensionName;

            // Validate the file type
            //$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileTypes = array('pdf'); // File extensions
            $fileParts = pathinfo($uploadedFilename);

            if (in_array($fileParts['extension'], $fileTypes)) {
                $this->getRequest()->moveFile('fundManagement', sfConfig::get('sf_upload_dir') . '/fundManagement/' . $filename);

                $mlm_file_download = new MlmFileDownload();
                $mlm_file_download->setFileType("FUND_MANAGEMENT_REPORT");
                $mlm_file_download->setFileSrc(sfConfig::get('sf_upload_dir') . '/fundManagement/' . $filename);
                $mlm_file_download->setFileName($filename);
                $mlm_file_download->setContentType("application/pdf");
                $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_file_download->setRemarks("");
                $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->save();

                $this->setFlash('successMsg', "Upload successful.");
            }
        }
        return $this->redirect('/marketing/uploadFundManagement');
    }

    public function executeUploadMT4()
    {
    }
    public function executeDoUploadMT4()
    {
        if ($this->getRequest()->getFileName('mt4Client') != "") {
            $uploadedFilename = $this->getRequest()->getFileName('mt4Client');

            $this->getRequest()->moveFile('mt4Client', sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "pro4setup.exe");

            $this->setFlash('successMsg', "MT4 upload successfully.");
            return $this->redirect('/marketing/uploadMT4');
        }
    }
    public function executeFxGuideUpload()
    {
    }
    public function executeUploadFundManagement()
    {
    }

    public function executeDoUploadPips()
    {
        if ($this->getRequest()->getFileName('file_upload') != "") {
            $uploadedFilename = $this->getRequest()->getFileName('file_upload');
            $tradingMonth = $this->getRequestParameter('tradingMonth');
            $tradingYear = $this->getRequestParameter('tradingYear');
            $ext = explode(".", $this->getRequest()->getFileName('file_upload'));
            $extensionName = $ext[count($ext) - 1];

            $this->getRequest()->moveFile('file_upload', sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'pips' . DIRECTORY_SEPARATOR . $uploadedFilename);

            $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'pips' . DIRECTORY_SEPARATOR . $uploadedFilename;

            $mlm_file_download = new MlmFileDownload();
            $mlm_file_download->setFileType("PIPS");
            $mlm_file_download->setFileSrc($physicalDirectory);
            $mlm_file_download->setFileName($uploadedFilename);
            $mlm_file_download->setContentType("application/csv");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();
            /* **********************************************
             *      Manipulate PIPS
             * ***********************************************/
            $file_handle = fopen($physicalDirectory, "rb");

            /*$con = Propel::getConnection(MlmFileDownloadPeer::DATABASE_NAME);
            try {
                $con->begin();*/

            while (!feof($file_handle)) {
                $line_of_text = fgets($file_handle);
                $parts = explode('=', $line_of_text);

                $string = $parts[0] . $parts[1];
                $arr = explode(';', $string);

                $status = Globals::STATUS_PIPS_CSV_ACTIVE;
                $remarks = "";
                $mlm_pip_csv = new MlmPipCsv();
                $mlm_pip_csv->setFileId($mlm_file_download->getFileId());
                $mlm_pip_csv->setPipsString($string);

                //var_dump($parts);
                //var_dump($line_of_text);
                //var_dump(count($arr));
                //exit();
                if (count($arr) == 13) {
                    if (is_numeric($arr[0])) {
                        $idx = 0;
                        $mlm_pip_csv->setMonthTraded($tradingMonth);
                        $mlm_pip_csv->setYearTraded($tradingYear);
                        $mlm_pip_csv->setLoginId($arr[$idx++]);
                        $mlm_pip_csv->setLoginName($arr[$idx++]);
                        $mlm_pip_csv->setDeposit($arr[$idx++]);
                        $mlm_pip_csv->setWithdraw($arr[$idx++]);
                        $mlm_pip_csv->setInOut($arr[$idx++]);
                        $mlm_pip_csv->setCredit($arr[$idx++]);
                        $mlm_pip_csv->setVolume($arr[$idx++]);
                        $mlm_pip_csv->setCommission($arr[$idx++]);
                        $mlm_pip_csv->setTaxes($arr[$idx++]);
                        $mlm_pip_csv->setAgent($arr[$idx++]);
                        $mlm_pip_csv->setStorage($arr[$idx++]);
                        $mlm_pip_csv->setProfit($arr[$idx++]);
                        $mlm_pip_csv->setLastBalance($arr[$idx++]);
                        $mlm_pip_csv->setStatusCode($status);
                        $mlm_pip_csv->setRemarks($remarks);
                        $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->save();
                        /* ++++++++++++++++++++++++++++++++++++++++++++++
                       *      Calculate Pips
                       * +++++++++++++++++++++++++++++++++++++++++++++++*/
                        $totalVolume = $mlm_pip_csv->getVolume();
                        $mt4Id = $mlm_pip_csv->getLoginId();

                        //$c = new Criteria();
                        //$c->add(MlmDistributorPeer::MT4_USER_NAME, $mt4Id);
                        //$existDistributor = MlmDistributorPeer::doSelectOne($c);

                        $c = new Criteria();
                        $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                        $mlm_dist_mt4 = MlmDistMt4Peer::doSelectOne($c);

                        if ($mlm_dist_mt4) {

                        } else {
                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                            $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                            $mlm_pip_csv->save();
                        }
                        /* ++++++++++++++++++++++++++++++++++++++++++++++
                       *      ~ END Calculate Pips ~
                       * +++++++++++++++++++++++++++++++++++++++++++++++*/
                    } else {
                        $status = Globals::STATUS_PIPS_CSV_ERROR;
                        $remarks = "FIRST ELEMENT NOT NUMERIC";

                        $mlm_pip_csv->setStatusCode($status);
                        $mlm_pip_csv->setRemarks($remarks);
                        $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->save();
                    }
                } else {
                    $status = Globals::STATUS_PIPS_CSV_ERROR;
                    $remarks = "ARRAY NOT EQUAL TO 13";

                    $mlm_pip_csv->setStatusCode($status);
                    $mlm_pip_csv->setRemarks($remarks);
                    $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->save();
                }
            }
            /*$con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }*/
            $this->setFlash('successMsg', "Files was successfully uploaded.");
            return $this->redirect('/marketing/pipsUpload?doAction=show_pips');
        }
    }

    public function executeDoDemoUploadPips()
    {
        if ($this->getRequest()->getFileName('file_upload') != "") {
            $query = "truncate demo_dist_commission_ledger";
            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            $query = "truncate demo_file_download";
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            $query = "truncate demo_pip_csv";
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            $uploadedFilename = $this->getRequest()->getFileName('file_upload');
            $tradingMonth = $this->getRequestParameter('tradingMonth');
            $tradingYear = $this->getRequestParameter('tradingYear');
            $ext = explode(".", $this->getRequest()->getFileName('file_upload'));
            $extensionName = $ext[count($ext) - 1];

            $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'pips' . DIRECTORY_SEPARATOR . $uploadedFilename;
            $this->getRequest()->moveFile('file_upload', $physicalDirectory);

            error_reporting(E_ALL ^ E_NOTICE);
            require_once 'excel_reader2.php';
            $data = new Spreadsheet_Excel_Reader($physicalDirectory);

            $mlm_file_download = new DemoFileDownload();
            $mlm_file_download->setFileType("PIPS");
            $mlm_file_download->setFileSrc($physicalDirectory);
            $mlm_file_download->setFileName($uploadedFilename);
            $mlm_file_download->setContentType("application/csv");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();
            /* **********************************************
             *      Manipulate PIPS
             * ***********************************************/
            //$file_handle = fopen($physicalDirectory, "rb");

            /*$con = Propel::getConnection(MlmFileDownloadPeer::DATABASE_NAME);
            try {
                $con->begin();*/

            $totalRow = $data->rowcount($sheet_index = 0);
            for ($x = $totalRow; $x > 1; $x--) {

                $string = "";
                $pt2UserName = $data->val($x, "A");
                $balance = $data->val($x, "D");

                $status = Globals::STATUS_PIPS_CSV_ACTIVE;
                $remarks = "";
                $mlm_pip_csv = new DemoPipCsv();
                $mlm_pip_csv->setFileId($mlm_file_download->getFileId());
                $mlm_pip_csv->setPipsString($string);

                if ($pt2UserName == "")
                    continue;
                //print_r($pt2UserName);
                //print_r("<br>");
                $idx = 0;
                $mlm_pip_csv->setMonthTraded($tradingMonth);
                $mlm_pip_csv->setYearTraded($tradingYear);
                //$mlm_pip_csv->setLoginId($pt2UserName);
                $mlm_pip_csv->setLoginName($pt2UserName);
                //$mlm_pip_csv->setDeposit($arr[$idx++]);
                //$mlm_pip_csv->setWithdraw($arr[$idx++]);
                //$mlm_pip_csv->setInOut($arr[$idx++]);
                //$mlm_pip_csv->setCredit($arr[$idx++]);
                $mlm_pip_csv->setVolume($balance);
                //$mlm_pip_csv->setCommission($arr[$idx++]);
                //$mlm_pip_csv->setTaxes($arr[$idx++]);
                //$mlm_pip_csv->setAgent($arr[$idx++]);
                //$mlm_pip_csv->setStorage($arr[$idx++]);
                //$mlm_pip_csv->setProfit($arr[$idx++]);
                $mlm_pip_csv->setLastBalance($balance);
                $mlm_pip_csv->setStatusCode($status);
                $mlm_pip_csv->setRemarks($remarks);
                $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_pip_csv->save();
                /* ++++++++++++++++++++++++++++++++++++++++++++++
               *      Calculate Pips
               * +++++++++++++++++++++++++++++++++++++++++++++++*/
                $totalVolume = $mlm_pip_csv->getVolume();
                $mt4Id = $mlm_pip_csv->getLoginId();

                $c = new Criteria();
                $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                $existDistMt4 = MlmDistMt4Peer::doSelectOne($c);

                if ($existDistMt4) {

                } else {
                    $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                    $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                    $mlm_pip_csv->save();
                }
            }
            /*$con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }*/
            $this->setFlash('successMsg', "Files was successfully uploaded.");
            return $this->redirect('/marketing/demoPipsUpload?doAction=show_pips');
        }
    }

    public function executeDailyPipsUpload()
    {

    }
    public function executeDoDailyPipsUpload()
    {
        if ($this->getRequest()->getFileName('file_upload') != "") {
            $uploadedFilename = $this->getRequest()->getFileName('file_upload');
            $tradingMonth = $this->getRequestParameter('tradingMonth');
            $ext = explode(".", $this->getRequest()->getFileName('file_upload'));

            $this->getRequest()->moveFile('file_upload', sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'pips' . DIRECTORY_SEPARATOR . $uploadedFilename);

            $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . 'pips' . DIRECTORY_SEPARATOR . $uploadedFilename;

            $mlm_file_download = new MlmFileDownload();
            $mlm_file_download->setFileType("PIPS");
            $mlm_file_download->setFileSrc($physicalDirectory);
            $mlm_file_download->setFileName($uploadedFilename);
            $mlm_file_download->setContentType("application/csv");
            $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
            $mlm_file_download->setRemarks("");
            $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlm_file_download->save();
            /* **********************************************
             *      Manipulate PIPS
             * ***********************************************/
            $file_handle = fopen($physicalDirectory, "rb");
            while (!feof($file_handle)) {
                $line_of_text = fgets($file_handle);
                $parts = explode('=', $line_of_text);

                $string = $parts[0] . $parts[1];
                $arr = explode(';', $string);

                $status = Globals::STATUS_PIPS_CSV_ACTIVE;
                $remarks = "";
                $mlm_pip_csv = new MlmPipCsv();
                $mlm_pip_csv->setFileId($mlm_file_download->getFileId());
                $mlm_pip_csv->setPipsString($string);

                if (count($arr) == 13) {
                    if (is_numeric($arr[0])) {
                        $idx = 0;
                        $mlm_pip_csv->setMonthTraded($tradingMonth);
                        $mlm_pip_csv->setYearTraded(date('Y'));
                        $mlm_pip_csv->setLoginId($arr[$idx++]);
                        $mlm_pip_csv->setLoginName($arr[$idx++]);
                        $mlm_pip_csv->setDeposit($arr[$idx++]);
                        $mlm_pip_csv->setWithdraw($arr[$idx++]);
                        $mlm_pip_csv->setInOut($arr[$idx++]);
                        $mlm_pip_csv->setCredit($arr[$idx++]);
                        $mlm_pip_csv->setVolume($arr[$idx++]);
                        $mlm_pip_csv->setCommission($arr[$idx++]);
                        $mlm_pip_csv->setTaxes($arr[$idx++]);
                        $mlm_pip_csv->setAgent($arr[$idx++]);
                        $mlm_pip_csv->setStorage($arr[$idx++]);
                        $mlm_pip_csv->setProfit($arr[$idx++]);
                        $mlm_pip_csv->setLastBalance($arr[$idx++]);
                        $mlm_pip_csv->setStatusCode($status);
                        $mlm_pip_csv->setRemarks($remarks);
                        $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->save();
                        /* ++++++++++++++++++++++++++++++++++++++++++++++
                       *      Calculate Pips
                       * +++++++++++++++++++++++++++++++++++++++++++++++*/
                        $totalVolume = $mlm_pip_csv->getVolume();
                        $mt4Id = $mlm_pip_csv->getLoginId();
                        $c = new Criteria();
                        $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                        $mlm_dist_mt4 = MlmDistMt4Peer::doSelectOne($c);

                        if ($mlm_dist_mt4) {

                        } else {
                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                            $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                            $mlm_pip_csv->save();
                        }
                        /* ++++++++++++++++++++++++++++++++++++++++++++++
                       *      ~ END Calculate Pips ~
                       * +++++++++++++++++++++++++++++++++++++++++++++++*/
                    } else {
                        $status = Globals::STATUS_PIPS_CSV_ERROR;
                        $remarks = "FIRST ELEMENT NOT NUMERIC";

                        $mlm_pip_csv->setStatusCode($status);
                        $mlm_pip_csv->setRemarks($remarks);
                        $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                        $mlm_pip_csv->save();
                    }
                } else {
                    $status = Globals::STATUS_PIPS_CSV_ERROR;
                    $remarks = "ARRAY NOT EQUAL TO 13";

                    $mlm_pip_csv->setStatusCode($status);
                    $mlm_pip_csv->setRemarks($remarks);
                    $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->save();
                }
            }

            $this->setFlash('successMsg', "Files was successfully uploaded.");
            return $this->redirect('/marketing/pipsUpload?doAction=show_pips');
        }
    }
    public function executePipsUpload()
    {
        $array = explode(',', Globals::STATUS_ACTIVE . "," . Globals::STATUS_COMPLETE);
        $c = new Criteria();
        $c->add(MlmFileDownloadPeer::FILE_TYPE, "PIPS");
        $c->add(MlmFileDownloadPeer::STATUS_CODE, $array, Criteria::IN);
        $c->addDescendingOrderByColumn(MlmFileDownloadPeer::CREATED_ON);
        $mlmFileDownloadDB = MlmFileDownloadPeer::doSelectOne($c);

        $fileName = "";
        $uploadDate = "";
        $approvedStatus = "";

        if ($mlmFileDownloadDB) {
            $fileName = $mlmFileDownloadDB->getFileName();
            $uploadDate = $mlmFileDownloadDB->getCreatedOn();
            $approvedStatus = $mlmFileDownloadDB->getStatusCode();
        }

        $this->fileName = $fileName;
        $this->approvedStatus = $approvedStatus;
        $this->uploadDate = $uploadDate;

        /* *************************************
         *   LIST
         * ************************************* */
        $doAction = $this->getRequestParameter('doAction');

        if ($doAction != "") {
            if ($doAction == "show_pips" && $mlmFileDownloadDB) {
                $c = new Criteria();
                $c->add(MlmPipCsvPeer::FILE_ID, $mlmFileDownloadDB->getFileId());
                $c->addAscendingOrderByColumn(MlmPipCsvPeer::PIP_ID);
                $this->pipDBs = MlmPipCsvPeer::doSelect($c);
            } else if ($doAction == "summary_report" && $mlmFileDownloadDB) {
                $this->refId = $mlmFileDownloadDB->getFileId();

                $this->summaryReports = $this->getSummaryReport($this->refId);
            } else if ($doAction == "calc_pips" && $mlmFileDownloadDB) {
                $this->refId = $mlmFileDownloadDB->getFileId();

                $this->totalPipsBonus = $this->getTotalPipsBonus($this->refId);
            } else if ($doAction == "approve_pips" && $mlmFileDownloadDB) {
                $con = Propel::getConnection(MlmPipCsvPeer::DATABASE_NAME);
                try {
                    $con->begin();

                    $this->refId = $mlmFileDownloadDB->getFileId();

                    $c = new Criteria();
                    $c->add(MlmPipCsvPeer::STATUS_CODE, Globals::STATUS_PIPS_CSV_ACTIVE);
                    $c->add(MlmPipCsvPeer::FILE_ID, $mlmFileDownloadDB->getFileId());
                    $mlmPipsCsvDBs = MlmPipCsvPeer::doSelect($c);

                    foreach ($mlmPipsCsvDBs as $mlm_pip_csv) {
                        $totalVolume = $mlm_pip_csv->getVolume();
                        $mt4Id = $mlm_pip_csv->getLoginId();
                        $tradingMonth =  $mlm_pip_csv->getMonthTraded();
                        $tradingYear =  $mlm_pip_csv->getYearTraded();

                        $c = new Criteria();
                        $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                        $existDistMt4 = MlmDistMt4Peer::doSelectOne($c);

                        if ($existDistMt4) {
                            $existDistributor = MlmDistributorPeer::retrieveByPK($existDistMt4->getDistId());

                            $index = 0;
                            $treeLevel = $existDistributor->getTreeLevel();
                            $treeStructure = $existDistributor->getTreeStructure();
                            $affectedDistributorArrs = explode("|", $treeStructure);

                            $toCut = false;

                            for ($y = count($affectedDistributorArrs); $y > 0; $y--) {
                                if ($affectedDistributorArrs[$y] == "") {
                                    continue;
                                }
                                $affectedDistributorId = $affectedDistributorArrs[$y];

                                $affectedDistributor = MlmDistributorPeer::retrieveByPK($affectedDistributorId);

                                $affectedDistributorTreeLevel = $affectedDistributor->getTreeLevel();
                                $affectedDistributorPackageDB = MlmPackagePeer::retrieveByPK($affectedDistributor->getRankId());
                                if ($affectedDistributorPackageDB) {
                                    $generation = $affectedDistributorPackageDB->getGeneration();
                                    $pips = $affectedDistributorPackageDB->getPips();
                                    $generation2 = $affectedDistributorPackageDB->getGeneration2();
                                    $pips2 = $affectedDistributorPackageDB->getPips2();
                                    $generation3 = $affectedDistributorPackageDB->getGeneration3();
                                    $pips3 = $affectedDistributorPackageDB->getPips3();
                                    //$creditRefundByPackage = $affectedDistributorPackageDB->getCreditRefund();
                                    $creditRefundByPackage = 0;

                                    $totalGeneration = $generation + $generation2 + $generation3;

                                    $gap = $treeLevel - $affectedDistributorTreeLevel;
                                    $isEntitled = false;
                                    $pipsAmountEntitied = 0;
                                    $pipsEntitied = 0;
                                    if ($generation == null) {
                                        $isEntitled = true;
                                    } else {
                                        if ($gap <= $totalGeneration) {
                                            $isEntitled = true;

                                            if ($gap <= $generation) {
                                                $pipsAmountEntitied = $pips * $totalVolume;
                                                $pipsEntitied = $pips;
                                            } else if ($gap > $generation && $gap <= ($generation + $generation2)) {
                                                $pipsAmountEntitied = $pips2 * $totalVolume;
                                                $pipsEntitied = $pips2;
                                            } else {
                                                $pipsAmountEntitied = $pips3 * $totalVolume;
                                                $pipsEntitied = $pips3;
                                            }
                                        }
                                    }
                                    //print_r("<br>gap===".$gap.",generation===".$generation.",generation2===".$generation2.",generation3===".$generation3);
                                    //print_r("<br>pips2===".$pips2.",totalVolume===".$totalVolume);
                                    //print_r("<br>isEntitled===".$isEntitled);
                                    if ($isEntitled) {
                                        //print_r("<br>pipsAmountEntitied===".$pipsAmountEntitied);
                                        //print_r("<br>gap===".$gap);
                                        if ($pipsAmountEntitied > 0) {

                                            if ($gap == 0 && $creditRefundByPackage != 0) {
                                                $pipsBalance = $this->getCommissionBalance($affectedDistributor->getDistributorId(), Globals::COMMISSION_TYPE_CREDIT_REFUND);

                                                $creditRefund = $totalVolume * $creditRefundByPackage;

                                                $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                                                $sponsorDistCommissionledger->setMonthTraded($tradingMonth);
                                                $sponsorDistCommissionledger->setYearTraded($tradingYear);
                                                $sponsorDistCommissionledger->setDistId($affectedDistributor->getDistributorId());
                                                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_CREDIT_REFUND);
                                                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_PIPS_TRADED);
                                                $sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                                                $sponsorDistCommissionledger->setCredit($creditRefund);
                                                $sponsorDistCommissionledger->setDebit(0);
                                                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                                                $sponsorDistCommissionledger->setBalance($pipsBalance + $creditRefund);
                                                $sponsorDistCommissionledger->setRemark("USD ".$creditRefundByPackage.", Volume:".$totalVolume);
                                                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->save();

                                                $distAccountEcashBalance = $this->getAccountBalance($affectedDistributor->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                                                $mlm_account_ledger = new MlmAccountLedger();
                                                $mlm_account_ledger->setDistId($affectedDistributor->getDistributorId());
                                                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                                                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_CREDIT_REFUND);
                                                $mlm_account_ledger->setRemark("USD ".$creditRefundByPackage.", Volume:".$totalVolume);
                                                $mlm_account_ledger->setCredit($creditRefund);
                                                $mlm_account_ledger->setDebit(0);
                                                $mlm_account_ledger->setBalance($distAccountEcashBalance + $creditRefund);
                                                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlm_account_ledger->save();

                                            } else if ($gap > 0) {
                                                $pipsBalance = $this->getCommissionBalance($affectedDistributor->getDistributorId(), Globals::COMMISSION_TYPE_PIPS_BONUS);

                                                $sponsorDistCommissionledger = new MlmDistCommissionLedger();
                                                $sponsorDistCommissionledger->setMonthTraded($tradingMonth);
                                                $sponsorDistCommissionledger->setYearTraded($tradingYear);
                                                $sponsorDistCommissionledger->setDistId($affectedDistributor->getDistributorId());
                                                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_PIPS_BONUS);
                                                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_PIPS_GAIN);
                                                $sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                                                $sponsorDistCommissionledger->setCredit($pipsAmountEntitied);
                                                $sponsorDistCommissionledger->setDebit(0);
                                                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                                                $sponsorDistCommissionledger->setBalance($pipsBalance + $pipsAmountEntitied);
                                                $sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode());
                                                //$sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode().", tier:".$gap.", volume:".$totalVolume.", pips:".$pipsEntitied);
                                                $sponsorDistCommissionledger->setPipsDownlineUsername($existDistributor->getDistributorCode());
                                                $sponsorDistCommissionledger->setPipsMt4Id($existDistributor->getMt4UserName());
                                                $sponsorDistCommissionledger->setPipsRebate($pipsEntitied);
                                                $sponsorDistCommissionledger->setPipsLevel($gap);
                                                $sponsorDistCommissionledger->setPipsLotsTraded($totalVolume);
                                                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->save();

                                                $distAccountEcashBalance = $this->getAccountBalance($affectedDistributor->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);

                                                $mlm_account_ledger = new MlmAccountLedger();
                                                $mlm_account_ledger->setDistId($affectedDistributor->getDistributorId());
                                                $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
                                                $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_PIPS_BONUS);
                                                $mlm_account_ledger->setRemark("e-Trader:".$existDistributor->getDistributorCode());
                                                //$mlm_account_ledger->setRemark("e-Trader:".$existDistributor->getDistributorCode().", tier:".$gap.", volume:".$totalVolume.", pips:".$pipsEntitied);
                                                $mlm_account_ledger->setCredit($pipsAmountEntitied);
                                                $mlm_account_ledger->setDebit(0);
                                                $mlm_account_ledger->setBalance($distAccountEcashBalance + $pipsAmountEntitied);
                                                $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $mlm_account_ledger->save();
                                            }
                                        }
                                    }
                                }
                            }

                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_SUCCESS);
                            $mlm_pip_csv->save();
                        } else {
                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                            $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                            $mlm_pip_csv->save();
                        }
                    }
                    $mlmFileDownloadDB->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmFileDownloadDB->save();

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
                //exit();
                return $this->redirect('/marketing/pipsUpload?doAction=summary_report');
            }
        }
    }

    public function executeDemoPipsUpload()
    {
        $array = explode(',', Globals::STATUS_ACTIVE . "," . Globals::STATUS_COMPLETE);
        $c = new Criteria();
        $c->add(DemoFileDownloadPeer::FILE_TYPE, "PIPS");
        $c->add(DemoFileDownloadPeer::STATUS_CODE, $array, Criteria::IN);
        $c->addDescendingOrderByColumn(DemoFileDownloadPeer::CREATED_ON);
        $mlmFileDownloadDB = DemoFileDownloadPeer::doSelectOne($c);

        $fileName = "";
        $uploadDate = "";
        $approvedStatus = "";

        if ($mlmFileDownloadDB) {
            $fileName = $mlmFileDownloadDB->getFileName();
            $uploadDate = $mlmFileDownloadDB->getCreatedOn();
            $approvedStatus = $mlmFileDownloadDB->getStatusCode();
        }

        $this->fileName = $fileName;
        $this->approvedStatus = $approvedStatus;
        $this->uploadDate = $uploadDate;

        /* *************************************
         *   LIST
         * ************************************* */
        $doAction = $this->getRequestParameter('doAction');

        if ($doAction != "") {
            if ($doAction == "show_pips" && $mlmFileDownloadDB) {
                $c = new Criteria();
                $c->add(DemoPipCsvPeer::FILE_ID, $mlmFileDownloadDB->getFileId());
                $c->addAscendingOrderByColumn(DemoPipCsvPeer::PIP_ID);
                $this->pipDBs = DemoPipCsvPeer::doSelect($c);
            } else if ($doAction == "calc_pips" && $mlmFileDownloadDB) {
                $this->refId = $mlmFileDownloadDB->getFileId();

                $this->totalPipsBonus = $this->getTotalPipsBonus($this->refId);

            } else if ($doAction == "summary_report" && $mlmFileDownloadDB) {
                $this->summaryReports = $this->getDemoSummaryReport();

            } else if ($doAction == "approve_pips" && $mlmFileDownloadDB) {
                $con = Propel::getConnection(DemoPipCsvPeer::DATABASE_NAME);
                try {
                    $con->begin();

                    $this->refId = $mlmFileDownloadDB->getFileId();

                    $c = new Criteria();
                    $c->add(DemoPipCsvPeer::STATUS_CODE, Globals::STATUS_PIPS_CSV_ACTIVE);
                    $c->add(DemoPipCsvPeer::FILE_ID, $mlmFileDownloadDB->getFileId());
                    $mlmPipsCsvDBs = DemoPipCsvPeer::doSelect($c);

                    foreach ($mlmPipsCsvDBs as $mlm_pip_csv) {
                        $totalVolume = $mlm_pip_csv->getVolume();
                        $mt4Id = $mlm_pip_csv->getLoginId();
                        $tradingMonth =  $mlm_pip_csv->getMonthTraded();
                        $tradingYear =  $mlm_pip_csv->getYearTraded();

                        $c = new Criteria();
                        $c->add(MlmDistMt4Peer::MT4_USER_NAME, $mt4Id);
                        $existDistMt4 = MlmDistMt4Peer::doSelectOne($c);

                        if ($existDistMt4) {
                            $existDistributor = MlmDistributorPeer::retrieveByPK($existDistMt4->getDistId());
                            $index = 0;
                            $treeLevel = $existDistributor->getTreeLevel();
                            $treeStructure = $existDistributor->getTreeStructure();
                            $affectedDistributorArrs = explode("|", $treeStructure);

                            $toCut = false;
                            $pos = strrpos($existDistributor->getTreeStructure(), "|33|");
                            if ($pos === false) { // note: three equal signs

                            } else {
                                $toCut = true;
                            }

                            for ($y = count($affectedDistributorArrs); $y > 0; $y--) {
                                if ($affectedDistributorArrs[$y] == "") {
                                    continue;
                                }
                                $affectedDistributorId = $affectedDistributorArrs[$y];

                                if ($toCut == true && ($affectedDistributorId == 1 || $affectedDistributorId == 3 || $affectedDistributorId == 4
                                     || $affectedDistributorId == 6 || $affectedDistributorId == 8 || $affectedDistributorId == 11
                                     || $affectedDistributorId == 25 || $affectedDistributorId == 27)) {
                                    continue;
                                }

                                $affectedDistributor = MlmDistributorPeer::retrieveByPK($affectedDistributorId);
                                //print_r("===".$affectedDistributorId);
                                $affectedDistributorTreeLevel = $affectedDistributor->getTreeLevel();
                                $affectedDistributorPackageDB = MlmPackagePeer::retrieveByPK($affectedDistributor->getRankId());
                                if ($affectedDistributorPackageDB) {
                                    $generation = $affectedDistributorPackageDB->getGeneration();
                                    $pips = $affectedDistributorPackageDB->getPips();
                                    $generation2 = $affectedDistributorPackageDB->getGeneration2();
                                    $pips2 = $affectedDistributorPackageDB->getPips2();
                                    $generation3 = $affectedDistributorPackageDB->getGeneration3();
                                    $pips3 = $affectedDistributorPackageDB->getPips3();
                                    //$creditRefundByPackage = $affectedDistributorPackageDB->getCreditRefund();
                                    $creditRefundByPackage = 0;

                                    $totalGeneration = $generation + $generation2 + $generation3;

                                    $gap = $treeLevel - $affectedDistributorTreeLevel;
                                    $isEntitled = false;
                                    $pipsAmountEntitied = 0;
                                    $pipsEntitied = 0;
                                    if ($generation == null) {
                                        $isEntitled = true;
                                    } else {
                                        if ($gap <= $totalGeneration) {
                                            $isEntitled = true;

                                            if ($gap <= $generation) {
                                                $pipsAmountEntitied = $pips * $totalVolume;
                                                $pipsEntitied = $pips;
                                            } else if ($gap > $generation && $gap < ($generation + $generation2)) {
                                                $pipsAmountEntitied = $pips2 * $totalVolume;
                                                $pipsEntitied = $pips2;
                                            } else {
                                                $pipsAmountEntitied = $pips3 * $totalVolume;
                                                $pipsEntitied = $pips3;
                                            }
                                        }
                                    }

                                    if ($isEntitled) {
                                        if ($pipsAmountEntitied > 0) {

                                            if ($gap == 0 && $creditRefundByPackage != 0) {
                                                $pipsBalance = $this->getDemoCommissionBalance($affectedDistributor->getDistributorId(), Globals::COMMISSION_TYPE_CREDIT_REFUND);

                                                $creditRefund = $totalVolume * $creditRefundByPackage;

                                                $sponsorDistCommissionledger = new DemoDistCommissionLedger();
                                                $sponsorDistCommissionledger->setMonthTraded($tradingMonth);
                                                $sponsorDistCommissionledger->setYearTraded($tradingYear);
                                                $sponsorDistCommissionledger->setDistId($affectedDistributor->getDistributorId());
                                                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_CREDIT_REFUND);
                                                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_PIPS_TRADED);
                                                $sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                                                $sponsorDistCommissionledger->setCredit($creditRefund);
                                                $sponsorDistCommissionledger->setDebit(0);
                                                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                                                $sponsorDistCommissionledger->setBalance($pipsBalance + $creditRefund);
                                                $sponsorDistCommissionledger->setRemark("USD ".$creditRefundByPackage.", Volume:".$totalVolume);
                                                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->save();

                                            } else if ($gap > 0) {
                                                $pipsBalance = $this->getDemoCommissionBalance($affectedDistributor->getDistributorId(), Globals::COMMISSION_TYPE_PIPS_BONUS);

                                                $sponsorDistCommissionledger = new DemoDistCommissionLedger();
                                                $sponsorDistCommissionledger->setMonthTraded($tradingMonth);
                                                $sponsorDistCommissionledger->setYearTraded($tradingYear);
                                                $sponsorDistCommissionledger->setDistId($affectedDistributor->getDistributorId());
                                                $sponsorDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_PIPS_BONUS);
                                                $sponsorDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_PIPS_GAIN);
                                                $sponsorDistCommissionledger->setRefId($mlm_pip_csv->getPipId());
                                                $sponsorDistCommissionledger->setCredit($pipsAmountEntitied);
                                                $sponsorDistCommissionledger->setDebit(0);
                                                $sponsorDistCommissionledger->setStatusCode(Globals::STATUS_ACTIVE);
                                                $sponsorDistCommissionledger->setBalance($pipsBalance + $pipsAmountEntitied);
                                                $sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode());
                                                //$sponsorDistCommissionledger->setRemark("e-Trader:".$existDistributor->getDistributorCode().", tier:".$gap.", volume:".$totalVolume.", pips:".$pipsEntitied);
                                                $sponsorDistCommissionledger->setPipsDownlineUsername($existDistributor->getDistributorCode());
                                                $sponsorDistCommissionledger->setPipsMt4Id($existDistMt4->getMt4UserName());
                                                $sponsorDistCommissionledger->setPipsRebate($pipsEntitied);
                                                $sponsorDistCommissionledger->setPipsLevel($gap);
                                                $sponsorDistCommissionledger->setPipsLotsTraded($totalVolume);
                                                $sponsorDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                                                $sponsorDistCommissionledger->save();
                                            }
                                        }
                                    }
                                }
                            }

                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_SUCCESS);
                            $mlm_pip_csv->save();
                        } else {
                            $mlm_pip_csv->setStatusCode(Globals::STATUS_PIPS_CSV_ERROR);
                            $mlm_pip_csv->setRemarks("Invalid MT4 ID");
                            $mlm_pip_csv->save();
                        }
                    }
                    $mlmFileDownloadDB->setStatusCode(Globals::STATUS_COMPLETE);
                    $mlmFileDownloadDB->save();

                    $con->commit();
                } catch (PropelException $e) {
                    $con->rollback();
                    throw $e;
                }
                return $this->redirect('/marketing/demoPipsUpload?doAction=summary_report');
            }
        }
    }

    public function executeManipulatePips()
    {
        $targetFolder = '/uploads/pips'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

            // Validate the file type
            //$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileTypes = array('csv'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                $mlm_file_download = new MlmFileDownload();
                $mlm_file_download->setFileType("PIPS");
                $mlm_file_download->setFileSrc($targetFile);
                $mlm_file_download->setFileName($_FILES['Filedata']['name']);
                $mlm_file_download->setContentType("application/csv");
                $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_file_download->setRemarks("");
                $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->save();

                /*$mlm_pip_csv = new MlmPipCsv();
                $mlm_pip_csv->setFileId($mlm_file_download->getFileId());
                $mlm_pip_csv->setPipsString("test");
                $mlm_pip_csv->setStatusCode("active");
                $mlm_pip_csv->setRemarks("test");
                $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_pip_csv->save();*/

                /* **********************************************
                 *      Manipulate PIPS
                 * ***********************************************/
                $file_handle = fopen($targetFile, "rb");

                while (!feof($file_handle)) {
                    $line_of_text = fgets($file_handle);
                    $parts = explode('=', $line_of_text);

                    $string = $parts[0] . $parts[1];
                    $arr = explode(';', $string);

                    $status = "ACTIVE";
                    $remarks = "";
                    $mlm_pip_csv = new MlmPipCsv();
                    $mlm_pip_csv->setFileId($mlm_file_download->getFileId());
                    $mlm_pip_csv->setPipsString($string);

                    if (count($arr) == 13) {
                        if (is_numeric($arr[0])) {
                            $idx = 0;
                            $mlm_pip_csv->setLoginId($arr[$idx++]);
                            $mlm_pip_csv->setLoginName($arr[$idx++]);
                            $mlm_pip_csv->setDeposit($arr[$idx++]);
                            $mlm_pip_csv->setWithdraw($arr[$idx++]);
                            $mlm_pip_csv->setInOut($arr[$idx++]);
                            $mlm_pip_csv->setCredit($arr[$idx++]);
                            $mlm_pip_csv->setVolume($arr[$idx++]);
                            $mlm_pip_csv->setCommission($arr[$idx++]);
                            $mlm_pip_csv->setTaxes($arr[$idx++]);
                            $mlm_pip_csv->setAgent($arr[$idx++]);
                            $mlm_pip_csv->setStorage($arr[$idx++]);
                            $mlm_pip_csv->setProfit($arr[$idx++]);
                            $mlm_pip_csv->setLastBalance($arr[$idx++]);
                        } else {
                            $status = "ERROR";
                            $remarks = "FIRST ELEMENT NOT NUMERIC";
                        }
                    } else {
                        $status = "ERROR";
                        $remarks = "ARRAY NOT EQUAL TO 13";
                    }
                    $mlm_pip_csv->setStatusCode($status);
                    $mlm_pip_csv->setRemarks($remarks);
                    $mlm_pip_csv->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_pip_csv->save();
                    //print $parts[0] . $parts[1] . "<BR>";
                }

                fclose($file_handle);
                echo 'Files was successfully uploaded.';
            } else {
                echo 'Invalid file type.';
            }
        }
        return sfView::HEADER_ONLY;
    }

    public function executeUploadify()
    {
        $targetFolder = '/uploads/guide'; // Relative to the root

        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath, '/') . '/' . $_FILES['Filedata']['name'];

            // Validate the file type
            //$fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
            $fileTypes = array('pdf'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                move_uploaded_file($tempFile, $targetFile);

                $mlm_file_download = new MlmFileDownload();
                $mlm_file_download->setFileType("GUIDE");
                $mlm_file_download->setFileSrc($targetFile);
                $mlm_file_download->setFileName($_FILES['Filedata']['name']);
                $mlm_file_download->setContentType("application/pdf");
                $mlm_file_download->setStatusCode(Globals::STATUS_ACTIVE);
                $mlm_file_download->setRemarks("");
                $mlm_file_download->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                $mlm_file_download->save();

                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }

    public function executeDistAdd()
    {
        $this->showSuccessfulMsg = $this->getRequestParameter('showSuccessfulMsg');
    }

    public function executeDistList()
    {
    }

    public function executeDistListInDetail()
    {
        $response = $this->getResponse();
        $response->clearHttpHeaders();
        $response->addCacheControlHttpHeader('Cache-control', 'must-revalidate, post-check=0, pre-check=0');
        $response->setContentType('application/xls');
        $response->setHttpHeader('Content-Type', 'application/force-download', TRUE);
        $response->setHttpHeader('Content-Type', 'application/octet-stream', TRUE);
        $response->setHttpHeader('Content-Type', 'application/download', TRUE);
        $response->setHttpHeader('Content-Type', 'charset=UTF-8', TRUE);
        $response->setHttpHeader('Content-Disposition', 'attachment; filename=distributor_list.xls', TRUE);
        $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
        $response->setHttpHeader('Content-Encoding', 'UTF-8', TRUE);

        $response->sendHttpHeaders();

        // Prepare SQL statement.
        $sql = "SELECT dist.distributor_id, dist.distributor_code, package.price, " .
               "epointWallet.SUM_EPOINT, ewalletWallet.SUM_ECASH, tblUser.userpassword, tblUser.userpassword2, " .
               "mt4.mt4_user_name, mt4.mt4_password, dist.full_name, dist.nickname, dist.ic, dist.country, " .
               "dist.address, dist.postcode, dist.email, dist.contact, dist.gender, dist.dob, dist.bank_name, " .
               "dist.bank_acc_no, dist.bank_holder_name, dist.bank_swift_code, dist.visa_debit_card, " .
               "dist.upline_dist_code, dist.status_code, dist.created_on, dist.bank_branch, dist.bank_address " .
               " FROM mlm_distributor dist" .
               " LEFT JOIN (SELECT SUM(credit - debit) AS SUM_EPOINT, dist_id FROM mlm_account_ledger WHERE account_type = 'EPOINT' GROUP BY dist_id) epointWallet ON epointWallet.dist_id = dist.distributor_id" .
               " LEFT JOIN (SELECT SUM(credit - debit) AS SUM_ECASH, dist_id FROM mlm_account_ledger WHERE account_type = 'ECASH' GROUP BY dist_id) ewalletWallet ON ewalletWallet.dist_id = dist.distributor_id" .
               " LEFT JOIN app_user tblUser ON dist.user_id = tblUser.user_id" .
               " LEFT JOIN mlm_package package ON dist.init_rank_id = package.package_id" .
               " LEFT JOIN mlm_distributor parentUser ON dist.upline_dist_id = parentUser.distributor_id";

        if ($this->getRequestParameter('filterMt4Username') != "") {
            $sql .= " INNER JOIN";
        } else {
            $sql .= " LEFT JOIN";
        }

        $sql .= " (SELECT dist_id, mt4_user_name, mt4_password FROM mlm_dist_mt4";

        if ($this->getRequestParameter('filterMt4Username') != "") {
            $sql .= " WHERE mt4_user_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterMt4Username')) . "%'";
        }

        $sql .= " GROUP BY dist_id) mt4 ON mt4.dist_id = dist.distributor_id";
        $sql .= " WHERE 1=1";

        // Set criteria if given by user.
        if ($this->getRequestParameter('filterDistcode') != "") {
            $sql .= " AND dist.distributor_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterDistcode')) . "%'";
        }

        if ($this->getRequestParameter('filterFullName') != "") {
            $sql .= " AND dist.full_name LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterFullName')) . "%'";
        }
        if ($this->getRequestParameter('filterEmail') != "") {
            $sql .= " AND dist.email LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterEmail')) . "%'";
        }
        if ($this->getRequestParameter('filterParentCode') != "") {
            $sql .= " AND dist.upline_dist_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterParentCode')) . "%'";
        }
        if ($this->getRequestParameter('filterStatusCode') != "") {
            $sql .= " AND dist.status_code LIKE '%" . mysql_real_escape_string($this->getRequestParameter('filterStatusCode')) . "%'";
        }

        // Set data ordering.
        $sql .= " ORDER BY dist.distributor_id ASC";

        // Execute SQL and get results.
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($sql);
        $rs = $statement->executeQuery();

        // Prepare XLS format.
        include("PHPExcel.php");
        include('PHPExcel/Writer/Excel5.php');

        $xlsRow = 1;

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $sheet = $objPHPExcel->getActiveSheet();

        // Init header.
        $sheet->setCellValue("A".$xlsRow, "Distributor ID");
        $sheet->setCellValue("B".$xlsRow, "Distributor Code");
        $sheet->setCellValue("C".$xlsRow, "Package");
        $sheet->setCellValue("D".$xlsRow, "ePoint");
        $sheet->setCellValue("E".$xlsRow, "eWallet");
        $sheet->setCellValue("F".$xlsRow, "Password");
        $sheet->setCellValue("G".$xlsRow, "Security Password");
        $sheet->setCellValue("H".$xlsRow, "MT4 ID");
        $sheet->setCellValue("I".$xlsRow, "MT4 Password");
        $sheet->setCellValue("J".$xlsRow, "Full Name");
        $sheet->setCellValue("K".$xlsRow, "Nick Name");
        $sheet->setCellValue("L".$xlsRow, "IC");
        $sheet->setCellValue("M".$xlsRow, "Country");
        $sheet->setCellValue("N".$xlsRow, "Address");
        $sheet->setCellValue("O".$xlsRow, "Postcode");
        $sheet->setCellValue("P".$xlsRow, "Email");
        $sheet->setCellValue("Q".$xlsRow, "Contact");
        $sheet->setCellValue("R".$xlsRow, "Gender");
        $sheet->setCellValue("S".$xlsRow, "DOB");
        $sheet->setCellValue("T".$xlsRow, "Bank Name");
        $sheet->setCellValue("U".$xlsRow, "Bank Account No.");
        $sheet->setCellValue("V".$xlsRow, "Bank Holder Name");
        $sheet->setCellValue("W".$xlsRow, "Bank Swift Code");
        $sheet->setCellValue("X".$xlsRow, "Visa Debit Card");
        $sheet->setCellValue("Y".$xlsRow, "Referral");
        $sheet->setCellValue("Z".$xlsRow, "Status");
        $sheet->setCellValue("AA".$xlsRow, "Add Date");
        $sheet->setCellValue("AB".$xlsRow, "Bank Branch");
        $sheet->setCellValue("AC".$xlsRow, "Bank Address");

        // Print content data.
        $xlsRow = 2;
        while ($rs->next()) {
            $arr = $rs->getRow();

            $packageAmount = $arr['price'] == null ? 0 : $arr['price'];
            $totalUpgradeAmount = $this->getTotalUpgradeAmount($arr['distributor_id']);

            $packageAmount = $packageAmount + $totalUpgradeAmount;

            $sheet->setCellValue("A".$xlsRow, $arr['distributor_id']);
            $sheet->setCellValue("B".$xlsRow, $arr['distributor_code']);
            $sheet->setCellValueExplicit("C".$xlsRow, number_format($packageAmount, 0, ".", ","), PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("D".$xlsRow, number_format($arr['SUM_EPOINT'], 2, ".", ","), PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("E".$xlsRow, number_format($arr['SUM_ECASH'], 2, ".", ","), PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("F".$xlsRow, $arr['userpassword']);
            $sheet->setCellValue("G".$xlsRow, $arr['userpassword2']);
            $sheet->setCellValue("H".$xlsRow, $arr['mt4_user_name']);
            $sheet->setCellValue("I".$xlsRow, $arr['mt4_password']);
            $sheet->setCellValueExplicit("J".$xlsRow, $arr['full_name'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("K".$xlsRow, $arr['nickname'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("L".$xlsRow, $arr['ic'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("M".$xlsRow, $arr['country']);
            $sheet->setCellValueExplicit("N".$xlsRow, $arr['address'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("O".$xlsRow, $arr['postcode']);
            $sheet->setCellValue("P".$xlsRow, $arr['email']);
            $sheet->setCellValueExplicit("Q".$xlsRow, $arr['contact'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("R".$xlsRow, $arr['gender']);
            $sheet->setCellValue("S".$xlsRow, $arr['dob']);
            $sheet->setCellValueExplicit("T".$xlsRow, $arr['bank_name'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("U".$xlsRow, $arr['bank_acc_no'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("V".$xlsRow, $arr['bank_holder_name'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("W".$xlsRow, $arr['bank_swift_code']);
            $sheet->setCellValueExplicit("X".$xlsRow, $arr['visa_debit_card'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValue("Y".$xlsRow, $arr['upline_dist_code']);
            $sheet->setCellValue("Z".$xlsRow, $arr['status_code']);
            $sheet->setCellValue("AA".$xlsRow, $arr['created_on']);
            $sheet->setCellValueExplicit("AB".$xlsRow, $arr['bank_branch'], PHPExcel_Cell_DataType::TYPE_STRING);
            $sheet->setCellValueExplicit("AC".$xlsRow, $arr['bank_address'], PHPExcel_Cell_DataType::TYPE_STRING);

            $xlsRow++;
        }

        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter->save('php://output');

        return sfView::HEADER_ONLY;
    }

    public function executeSuperIbList()
    {
    }

    public function executeDoSaveDist()
    {
        $tbl_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distId'));

        //$tbl_distributor->setMt4UserName($this->getRequestParameter('mt4_user_name'));
        //$tbl_distributor->setMt4Password($this->getRequestParameter('mt4_password'));
        $tbl_distributor->setFullName($this->getRequestParameter('fullname'));
        $tbl_distributor->setNickname($this->getRequestParameter('nickname'));
        $tbl_distributor->setIc($this->getRequestParameter('ic'));
        $tbl_distributor->setCountry($this->getRequestParameter('country'));
        $tbl_distributor->setAddress($this->getRequestParameter('address'));
        $tbl_distributor->setPostcode($this->getRequestParameter('postcode'));
        $tbl_distributor->setEmail($this->getRequestParameter('email'));
        $tbl_distributor->setContact($this->getRequestParameter('contact'));
        $tbl_distributor->setGender($this->getRequestParameter('gender'));
        if ($this->getRequestParameter('dob')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
            $tbl_distributor->setDob("$y-$m-$d");
        }
        $tbl_distributor->setBankName($this->getRequestParameter('bankName'));
        $tbl_distributor->setBankAccNo($this->getRequestParameter('bankAccNo'));
        $tbl_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));
        $tbl_distributor->setBankSwiftCode($this->getRequestParameter('bank_swift_code'));
        $tbl_distributor->setVisaDebitCard($this->getRequestParameter('visa_debit_card'));
        $tbl_distributor->setBankBranch($this->getRequestParameter('bank_branch'));
        $tbl_distributor->setBankAddress($this->getRequestParameter('bank_address'));
        $tbl_distributor->setStatusCode($this->getRequestParameter('status'));
        $tbl_distributor->setRegisterRemark($this->getRequestParameter('register_remark'));
        $tbl_distributor->save();

        $tbl_user = AppUserPeer::retrieveByPk($tbl_distributor->getUserId());

        $tbl_user->setUserpassword($this->getRequestParameter('password'));
        $tbl_user->setUserpassword2($this->getRequestParameter('password2'));

        $tbl_user->save();

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    public function executeDoUpdatePackagePurchase()
    {
        $tbl_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distId'));
        if ($tbl_distributor && $tbl_distributor->getPackagePurchaseFlag() == "Y") {
            $con = Propel::getConnection(MlmPipCsvPeer::DATABASE_NAME);
            try {
                $con->begin();

                $tbl_distributor->setPackagePurchaseFlag("N");
                $tbl_distributor->save();

                $c = new Criteria();
                $c->add(MlmDistMt4Peer::MT4_USER_NAME, $this->getRequestParameter('mt4_user_name'));
                $mlmDistMt4DB = MlmDistMt4Peer::doSelectOne($c);

                if (!$mlmDistMt4DB) {
                    $mlm_dist_mt4 = new MlmDistMt4();
                    $mlm_dist_mt4->setDistId($tbl_distributor->getDistributorId());
                    $mlm_dist_mt4->setRankId($tbl_distributor->getInitRankId());
                    $mlm_dist_mt4->setMt4UserName($this->getRequestParameter('mt4_user_name'));
                    $mlm_dist_mt4->setMt4Password($this->getRequestParameter('mt4_password'));
                    $mlm_dist_mt4->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
                    $mlm_dist_mt4->save();

                    /* ****************************************************
                   * ROI Divident
                   * ***************************************************/
                    $packageDB = MlmPackagePeer::retrieveByPK($tbl_distributor->getInitRankId());

                    $dateUtil = new DateUtil();
                    $currentDate = $dateUtil->formatDate("Y-m-d", $tbl_distributor->getActiveDatetime()) . " 00:00:00";
                    $currentDate_timestamp = strtotime($currentDate);
                    $firstDividendDate = strtotime("+1 months", $currentDate_timestamp);
                    for ($x=1; $x <= Globals::DIVIDEND_TIMES_ENTITLEMENT; $x++) {
                        $dividendDate = strtotime("+" . $x . " months", $currentDate_timestamp);

                        $mlm_roi_dividend = new MlmRoiDividend();
                        $mlm_roi_dividend->setDistId($tbl_distributor->getDistributorId());
                        $mlm_roi_dividend->setIdx($x);
                        $mlm_roi_dividend->setMt4UserName($this->getRequestParameter('mt4_user_name'));
                        //$mlm_roi_dividend->setAccountLedgerId($this->getRequestParameter('account_ledger_id'));
                        $mlm_roi_dividend->setDividendDate(date("Y-m-d h:i:s", $dividendDate));
                        $mlm_roi_dividend->setFirstDividendDate($firstDividendDate);
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

                $con->commit();
            } catch (PropelException $e) {
                $con->rollback();
                throw $e;
            }
            $output = array(
                "error" => false
            );
            echo json_encode($output);

            if ($this->getRequestParameter('mt4_user_name') != "" && $this->getRequestParameter('mt4_password') != "") {
                $this->sendEmailForMt4($this->getRequestParameter('mt4_user_name'), $this->getRequestParameter('mt4_password'), $tbl_distributor->getFullName(), $tbl_distributor->getEmail());
            }
        }

        return sfView::HEADER_ONLY;
    }

    public function executeSponsorTree()
    {
        $id = Globals::FIRST_REGISTERED_DISTRIBUTOR_ID;
        $distinfo = MlmDistributorPeer::retrieveByPk($id);
        $this->doSearch = false;
        $this->distinfo = $distinfo;
        $this->hasChild = $this->checkHasChild($distinfo->getDistributorId());

        /*********************/
        /* Search Function
         * ********************/
        $fullName = $this->getRequestParameter('fullName');
        $arrTree = array();

        if ($fullName != "") {
            $this->doSearch = true;

            $c = new Criteria();
            $c->add(MlmDistributorPeer::FULL_NAME, $fullName);
            $c->add(MlmDistributorPeer::TREE_STRUCTURE, "%|" . $this->getUser()->getAttribute(Globals::SESSION_DISTID) . "|%", Criteria::LIKE);
            $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $searchDist = MlmDistributorPeer::doSelectOne($c);

            if ($searchDist) {
                $parentId = $id;

                $searchDistArr = array();
                $arrs = explode("|", $searchDist->getTreeStructure());
                $idx = 0;
                for ($x = 0; $x < count($arrs); $x++) {
                    if ($arrs[$x] == "") {
                        continue;
                    }
                    $dist = $this->getDistributorInformation($arrs[$x]);
                    $searchDistArr[$idx]["code"] = $arrs[$x];
                    $searchDistArr[$idx]["hasChildren"] = $this->checkHasChild($dist->getDistributorId());
                    $searchDistArr[$idx]["text"] = "<span class='gen_id'>" . $dist->getDistributorCode() . "</span> <span class='gen_active'>" . $dist->getFullname() . "</span> Joined " . date('Y-m-d', strtotime($dist->getCreatedOn())) . " " . $dist->getRankCode();
                    $searchDistArr[$idx]["id"] = $dist->getDistributorId();

                    /************ sibling ************/
                    $c = new Criteria();
                    $c->add(MlmDistributorPeer::UPLINE_DIST_CODE, $dist->getUplineDistCode());
                    $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $arrs[$x], Criteria::NOT_EQUAL);
                    $siblingDists = MlmDistributorPeer::doSelect($c);
                    //var_dump(count($siblingDists));
                    $siblingDistArr = array();
                    $siblingIdx = 0;
                    foreach ($siblingDists as $siblingDist)
                    {
                        /*var_dump($siblingDist->getDistributorCode());
                        var_dump($arrs[$x]);
                        var_dump("<br>");*/
                        if ($arrs[$x] == $siblingDist->getDistributorCode())
                            continue;
                        $siblingDistArr[$siblingIdx]["code"] = $siblingDist->getDistributorCode();
                        $siblingDistArr[$siblingIdx]["hasChildren"] = $this->checkHasChild($siblingDist->getDistributorId());
                        $siblingDistArr[$siblingIdx]["text"] = "<span class='gen_id'>" . $siblingDist->getDistributorCode() . "</span> <span class='gen_active'>" . $siblingDist->getFullname() . "</span> Joined " . date('Y-m-d', strtotime($siblingDist->getCreatedOn())) . " " . $siblingDist->getRankCode();
                        $siblingDistArr[$siblingIdx]["id"] = $siblingDist->getDistributorId();

                        $siblingIdx++;
                    }
                    $searchDistArr[$idx]["sibling"] = $siblingDistArr;
                    $idx++;
                }

                $c = new Criteria();
                $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $parentId);
                $c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
                $dists = MlmDistributorPeer::doSelect($c);

                $idx = 0;
                foreach ($dists as $dist)
                {
                    $arrTree[$idx]["text"] = "<span class='gen_id'>" . $dist->getDistributorCode() . "</span> <span class='gen_active'>" . $dist->getFullname() . "</span> Joined " . date('Y-m-d', strtotime($dist->getCreatedOn())) . " " . $dist->getRankCode();
                    // $arrTree[$idx]["text"] = "<span class='gen_img'><img src='http://www.eslfreedom.com/js/jqtree/images/node70.gif'></span><span class='gen_id'>Olga</span><span class='gen_active'>1300805</span>  <span class='gen_name'>Diamond - A</span><span class='gen_active'>Activated 01/01/1970</span> <span class='gen_jdate'>Joined 31/08/2011</span>";
                    $arrTree[$idx]["id"] = $dist->getDistributorId();
                    $arrTree[$idx]["code"] = $dist->getDistributorCode();
                    $arrTree[$idx]["hasChildren"] = $this->checkHasChild($dist->getDistributorId());
                    $idx++;
                }

                $this->searchDist = $searchDist;
                $this->searchDistArr = $searchDistArr;
            }
        }
        $this->arrTree = $arrTree;
        $this->fullName = $fullName;
    }

    public function executeVerifySponsorId()
    {
        $sponsorId = $this->getRequestParameter('sponsorId');

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

    public function executeVerifyMasterIBId()
    {
        $masterIbCode = $this->getRequestParameter('masterIbCode');

        $c = new Criteria();
        $c->add(MlmMasterIbPeer::MASTER_IB_CODE, $masterIbCode);
        $c->add(MlmMasterIbPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmMasterIbPeer::doSelectOne($c);

        $arr = "";
        if ($existUser) {
            $arr = array(
                'masterIbId' => $existUser->getMasterIbId(),
                'masterIbCode' => $existUser->getMasterIbCode(),
                'masterIbName' => $existUser->getMasterIbName()
            );
            //}
        }

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
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

    public function executeFetchPackage()
    {
        $c = new Criteria();
        $packages = MlmPackagePeer::doSelect($c);

        $packageArray = array();
        $count = 0;
        foreach ($packages as $package) {
            $packageArray[$count]["packageId"] = $package->getPackageId();
            $packageArray[$count]["name"] = $this->getContext()->getI18N()->__($package->getPackageName());
            $packageArray[$count]["price"] = $package->getPrice() == null ? "" : $package->getPrice();
            $count++;
        }

        $arr = array(
            'package' => $packageArray
        );

        echo json_encode($arr);
        return sfView::HEADER_ONLY;
    }

    public function executeDoRegister()
    {
        $sponsorDistId = Globals::SYSTEM_COMPANY_DIST_ID;

        $fcode = $this->generateFcode($this->getRequestParameter('country'));
        $password = $this->getRequestParameter('userpassword');
        $parentId = $this->getRequestParameter('sponsorId');
        $masterIbCode = $this->getRequestParameter('masterIbCode');
        //******************* upline distributor ID
        $uplineDistDB = $this->getDistributorInformation($parentId);
        $this->forward404Unless($uplineDistDB);

        $treeStructure = $uplineDistDB->getTreeStructure() . "|" . $fcode . "|";
        $treeLevel = $uplineDistDB->getTreeLevel() + 1;

        //******************** master IB
        $c = new Criteria();
        $c->add(MlmMasterIbPeer::MASTER_IB_CODE, $masterIbCode);
        $c->add(MlmMasterIbPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $masterIB = MlmMasterIbPeer::doSelectOne($c);
        $this->forward404Unless($masterIB);
        //******************** package
        $sponsoredPackageDB = MlmPackagePeer::retrieveByPK($this->getRequestParameter('rankId'));
        $this->forward404Unless($sponsoredPackageDB);

        //******************** company account
        $c = new Criteria();
        $c->add(MlmAccountPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        $c->add(MlmAccountPeer::DIST_ID, $sponsorDistId);
        $CompanyAccount = MlmAccountPeer::doSelectOne($c);
        $this->forward404Unless($CompanyAccount);

        $app_user = new AppUser();
        $app_user->setUsername(strtoupper($fcode));
        $app_user->setKeepPassword($password);
        $app_user->setUserpassword($password);
        $app_user->setKeepPassword2($password);
        $app_user->setUserpassword2($password);
        $app_user->setUserRole(Globals::ROLE_DISTRIBUTOR);
        $app_user->setStatusCode(Globals::STATUS_ACTIVE);
        $app_user->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $app_user->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $app_user->save();

        // ****************************
        $mlm_distributor = new MlmDistributor();
        $mlm_distributor->setDistributorCode(strtoupper($fcode));
        $mlm_distributor->setUserId($app_user->getUserId());
        $mlm_distributor->setStatusCode(Globals::STATUS_ACTIVE);
        $mlm_distributor->setFullName(strtoupper($this->getRequestParameter('fullname')));
        $mlm_distributor->setNickname($this->getRequestParameter('nickName'));
        $mlm_distributor->setIc($this->getRequestParameter('ic'));
        if ($this->getRequestParameter('country') == 'China') {
            $mlm_distributor->setCountry('China (PRC)');
        } else {
            $mlm_distributor->setCountry($this->getRequestParameter('country'));
        }
        $mlm_distributor->setAddress($this->getRequestParameter('address'));
        $mlm_distributor->setPostcode($this->getRequestParameter('postcode'));
        $mlm_distributor->setEmail($this->getRequestParameter('email'));
        $mlm_distributor->setContact($this->getRequestParameter('contactNumber'));
        $mlm_distributor->setGender($this->getRequestParameter('gender'));
        if ($this->getRequestParameter('dob')) {
            list($d, $m, $y) = sfI18N::getDateForCulture($this->getRequestParameter('dob'), $this->getUser()->getCulture());
            $mlm_distributor->setDob("$y-$m-$d");
        }
        $mlm_distributor->setTreeLevel($treeLevel);
        $mlm_distributor->setTreeStructure($treeStructure);
        $mlm_distributor->setMasterIbId($masterIB->getMasterIbId());
        $mlm_distributor->setMasterIbCode($masterIB->getMasterIbCode());
        $mlm_distributor->setUplineDistId($uplineDistDB->getDistributorId());
        $mlm_distributor->setUplineDistCode($uplineDistDB->getDistributorCode());
        $mlm_distributor->setRankId($sponsoredPackageDB->getPackageId());
        $mlm_distributor->setRankCode($sponsoredPackageDB->getPackageName());

        $mlm_distributor->setBankName($this->getRequestParameter('bankName'));
        $mlm_distributor->setBankAccNo($this->getRequestParameter('bankAccountNo'));
        $mlm_distributor->setBankHolderName($this->getRequestParameter('bankHolderName'));
        $mlm_distributor->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_distributor->save();

        $this->doSaveAccount($mlm_distributor->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH, 0, 0, Globals::ACCOUNT_LEDGER_ACTION_REGISTER, "");

        /* ****************************************************
         * get company last account ledger epoint balance
         * ***************************************************/
        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::DIST_ID, $sponsorDistId);
        $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        $c->addDescendingOrderByColumn(MlmAccountLedgerPeer::CREATED_ON);
        $accountLedgerDB = MlmAccountLedgerPeer::doSelectOne($c);
        $this->forward404Unless($accountLedgerDB);

        $sponsorAccountBalance = $accountLedgerDB->getBalance();

        /* ****************************************************
         * Update distributor account
         * ***************************************************/
        $mlm_account_ledger = new MlmAccountLedger();
        $mlm_account_ledger->setDistId($sponsorDistId);
        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_REGISTER);
        $mlm_account_ledger->setRemark("DIRECT SPONSOR TO " . $mlm_distributor->getDistributorCode());
        $mlm_account_ledger->setCredit(0);
        $mlm_account_ledger->setDebit($sponsoredPackageDB->getPrice());
        $mlm_account_ledger->setBalance($sponsorAccountBalance - $sponsoredPackageDB->getPrice());
        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->save();

        $this->revalidateAccount($sponsorDistId, Globals::ACCOUNT_TYPE_ECASH);

        /**************************************/
        /*  Direct Sponsor Bonus For Upline
        /**************************************/
        $uplineDistPackage = MlmPackagePeer::retrieveByPK($uplineDistDB->getRankId());

        $directSponsorPercentage = $uplineDistPackage->getCommission();
        $directSponsorBonusAmount = $directSponsorPercentage * $sponsoredPackageDB->getPrice() / 100;

        $c = new Criteria();
        $c->add(MlmAccountLedgerPeer::DIST_ID, $uplineDistDB->getDistributorId());
        $c->add(MlmAccountLedgerPeer::ACCOUNT_TYPE, Globals::ACCOUNT_TYPE_ECASH);
        $c->addDescendingOrderByColumn(MlmAccountLedgerPeer::CREATED_ON);
        $accountLedgerDB = MlmAccountLedgerPeer::doSelectOne($c);
        $this->forward404Unless($accountLedgerDB);
        $distAccountEcashBalance = $accountLedgerDB->getBalance();
        var_dump("here3");
        $mlm_account_ledger = new MlmAccountLedger();
        $mlm_account_ledger->setDistId($uplineDistDB->getDistributorId());
        $mlm_account_ledger->setAccountType(Globals::ACCOUNT_TYPE_ECASH);
        $mlm_account_ledger->setTransactionType(Globals::ACCOUNT_LEDGER_ACTION_DRB);
        $mlm_account_ledger->setRemark("DIRECT SPONSOR BONUS AMOUNT (" . $mlm_distributor->getDistributorCode() . ")");
        $mlm_account_ledger->setCredit($directSponsorBonusAmount);
        $mlm_account_ledger->setDebit(0);
        $mlm_account_ledger->setBalance($distAccountEcashBalance + $directSponsorBonusAmount);
        $mlm_account_ledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account_ledger->save();
        var_dump("here4");
        $this->revalidateAccount($uplineDistDB->getDistributorId(), Globals::ACCOUNT_TYPE_ECASH);
        var_dump("here5");
        /******************************/
        /*  Commission
        /******************************/
        $c = new Criteria();
        $c->add(MlmDistCommissionPeer::DIST_ID, $uplineDistDB->getDistributorId());
        $c->add(MlmDistCommissionPeer::COMMISSION_TYPE, Globals::COMMISSION_TYPE_DRB);
        $uplineDistCommissionDB = MlmDistCommissionPeer::doSelectOne($c);
        var_dump("here6");
        $commissionBalance = 0;
        if (!$uplineDistCommissionDB) {
            $uplineDistCommissionDB = new MlmDistCommission();
            $uplineDistCommissionDB->setDistId($uplineDistDB->getDistributorId());
            $uplineDistCommissionDB->setCommissionType(Globals::COMMISSION_TYPE_DRB);
            $uplineDistCommissionDB->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        } else {
            $commissionBalance = $uplineDistCommissionDB->getBalance();
        }
        $uplineDistCommissionDB->setBalance($commissionBalance + $directSponsorBonusAmount);
        $uplineDistCommissionDB->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $uplineDistCommissionDB->save();

        $c = new Criteria();
        $c->add(MlmDistCommissionLedgerPeer::DIST_ID, $uplineDistDB->getDistributorId());
        $c->add(MlmDistCommissionLedgerPeer::COMMISSION_TYPE, Globals::COMMISSION_TYPE_DRB);
        $c->addDescendingOrderByColumn(MlmDistCommissionLedgerPeer::CREATED_ON);
        $uplineDistCommissionLedgerDB = MlmDistCommissionLedgerPeer::doSelectOne($c);

        $dsbBalance = 0;
        if ($uplineDistCommissionLedgerDB)
            $dsbBalance = $uplineDistCommissionLedgerDB->getBalance();

        $uplineDistCommissionledger = new MlmDistCommissionLedger();
        $uplineDistCommissionledger->setDistId($uplineDistDB->getDistributorId());
        $uplineDistCommissionledger->setCommissionType(Globals::COMMISSION_TYPE_DRB);
        $uplineDistCommissionledger->setTransactionType(Globals::COMMISSION_LEDGER_REGISTER);
        $uplineDistCommissionledger->setCredit($directSponsorBonusAmount);
        $uplineDistCommissionledger->setDebit(0);
        $uplineDistCommissionledger->setBalance($dsbBalance + $directSponsorBonusAmount);
        $uplineDistCommissionledger->setRemark("DIRECT SPONSOR BONUS AMOUNT (" . $mlm_distributor->getDistributorCode() . ")");
        $uplineDistCommissionledger->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $uplineDistCommissionledger->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $uplineDistCommissionledger->save();

        /****************************/
        /*****  Send email **********/
        /****************************/
        error_reporting(E_STRICT);

        date_default_timezone_set(date_default_timezone_get());

        include_once('class.phpmailer.php');

        $subject = $this->getContext()->getI18N()->__("Forex International Group Registration email notification", null, 'email');
        $body = $this->getContext()->getI18N()->__("Dear %1%", array('%1%' => $mlm_distributor->getNickname()), 'email') . ",<p><p>

        <p>" . $this->getContext()->getI18N()->__("Your registration request has been successfully sent to Forex International Group", null, 'email') . "</p>
        <p><b>" . $this->getContext()->getI18N()->__("Trader ID", null) . ": " . $fcode . "</b>
        <p><b>" . $this->getContext()->getI18N()->__("Password", null) . ": " . $password . "</b>";

        $mail = new PHPMailer();
        $mail->IsMail(); // telling the class to use SMTP
        $mail->Host = Mails::EMAIL_HOST; // SMTP server
        $mail->Sender = Mails::EMAIL_FROM_NOREPLY;
        $mail->From = Mails::EMAIL_FROM_NOREPLY;
        $mail->FromName = Mails::EMAIL_FROM_NOREPLY_NAME;
        $mail->Subject = $subject;
        $mail->CharSet = "utf-8";

        $text_body = $body;

        $mail->Body = $body;
        $mail->AltBody = $text_body;
        $mail->AddAddress($mlm_distributor->getEmail(), $mlm_distributor->getNickname());
        $mail->AddBCC("r9projecthost@gmail.com", "jason");

        if (!$mail->Send()) {
            echo $mail->ErrorInfo;
        }
        $this->setFlash("successMsg", "Trader has been registered successfully.<br><br>Your Trader ID : <span id='LabelMemberName'>" . $fcode . "</span>");
        return $this->redirect('/marketing/distAdd');
    }

    public function executeManipulateSponsorTree()
    {
        $parentId = $this->getRequestParameter('root');
        $arrTree = array();
        if ($parentId != "") {
            $c = new Criteria();
            $c->add(MlmDistributorPeer::UPLINE_DIST_ID, $parentId);
            $c->addAnd(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
            $dists = MlmDistributorPeer::doSelect($c);

            $idx = 0;
            foreach ($dists as $dist)
            {
                $arrTree[$idx]["text"] = "<span class='gen_id'>" . $dist->getDistributorCode() . "</span> <span class='gen_active'>" . $dist->getFullname() . "</span> Joined " . date('Y-m-d', strtotime($dist->getCreatedOn())) . " " . $dist->getRankCode();
                // $arrTree[$idx]["text"] = "<span class='gen_img'><img src='http://www.eslfreedom.com/js/jqtree/images/node70.gif'></span><span class='gen_id'>Olga</span><span class='gen_active'>1300805</span>  <span class='gen_name'>Diamond - A</span><span class='gen_active'>Activated 01/01/1970</span> <span class='gen_jdate'>Joined 31/08/2011</span>";
                $arrTree[$idx]["id"] = $dist->getDistributorId();
                $arrTree[$idx]["hasChildren"] = $this->checkHasChild($dist->getDistributorId());
                $idx++;
            }
        }


        echo json_encode($arrTree);
        return sfView::HEADER_ONLY;
    }

    /************************************************************************************************************************
     * function
     ************************************************************************************************************************/
    function getParentId($sponsorId)
    {
        $userId = 0;

        $c = new Criteria();
        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $sponsorId);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $existUser = MlmDistributorPeer::doSelectOne($c);

        if ($existUser) {
            $userId = $existUser->getDistributorId();
        }

        return $userId;
    }

    function generateFcode($country = 'China (PRC)')
    {
        if ($country == 'Malaysia') {
            $max_digit = 999999;
            $digit = 6;
        } elseif ($country == 'Indonesia') {
            $max_digit = 9999999;
            $digit = 7;
        } elseif ($country == 'China (PRC)' || $country == 'China') {
            $max_digit = 99999999;
            $digit = 8;
        } else {
            $max_digit = 999999999;
            $digit = 9;
        }

        while (true) {
            $fcode = rand(0, $max_digit) . "";
            $fcode = str_pad($fcode, $digit, "0", STR_PAD_LEFT);
            /*
            for ($x=0; $x < ($digit - strlen($fcode)); $x++) {
                $fcode = "0".$fcode;
            }
			*/
            $c = new Criteria();
            $c->add(AppUserPeer::USERNAME, $fcode);
            $existUser = AppUserPeer::doSelectOne($c);

            if (!$existUser) {
                break;
            }
        }
        return $fcode;
    }

    function format2decimal($d)
    {
        return ceil($d * 100) / 100;
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

    function getDistributorInformation($distCode)
    {
        $c = new Criteria();

        $c->add(MlmDistributorPeer::DISTRIBUTOR_CODE, $distCode);
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $distDB = MlmDistributorPeer::doSelectOne($c);
        $this->forward404Unless($distDB);

        return $distDB;
    }

    function doSaveAccount($distId, $accountType, $credit, $debit, $transactionType, $remarks)
    {
        $mlm_account = new MlmAccount();
        $mlm_account->setDistId($distId);
        $mlm_account->setAccountType($accountType);
        $mlm_account->setBalance($credit - $debit);
        $mlm_account->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
        $mlm_account->save();

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
        }

        $tbl_account->setBalance($balance);
        $tbl_account->save();
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

    function getDemoCommissionBalance($distributorId, $commissionType)
    {
        $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM demo_dist_commission_ledger WHERE dist_id = " . $distributorId . " AND commission_type = '" . $commissionType . "'";

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
    function getTotalPipsBonus($refId)
    {
        $query = "select SUM(bonus.credit) AS SUB_TOTAL
            FROM demo_dist_commission_ledger bonus
        LEFT JOIN demo_pip_csv csv ON csv.pip_id = bonus.ref_id
                where csv.file_id = ".$refId;

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
    function getDemoSummaryReport()
    {
        $query = "select dist.distributor_code, dist.mt4_user_name, dist.full_name
            , Coalesce(pips.bonusAmount,0)
            , (Coalesce(pips.bonusAmount,0)) as _sum
        from mlm_distributor dist
                LEFT JOIN
                    (
                        SELECT SUM(credit-debit) AS bonusAmount, dist_id
                            FROM demo_dist_commission_ledger
                            WHERE commission_type = 'PIPS BONUS'
                            group by dist_id order by dist_id
                    ) pips ON pips.dist_id  = dist.distributor_id
        HAVING  _sum > 0 order by 4 desc";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $result = array();
        while ($resultset->next()) {
            $arr = $resultset->getRow();
            $result[count($result)] = $arr;
        }
        return $result;
    }
    function getSummaryReport($refId)
    {
        $c = new Criteria();
        $c->add(MlmPipCsvPeer::STATUS_CODE, Globals::STATUS_PIPS_CSV_SUCCESS);
        $c->add(MlmPipCsvPeer::FILE_ID, $refId);
        $mlmPipsCsvDB = MlmPipCsvPeer::doSelectOne($c);

        $result = array();
        if ($mlmPipsCsvDB) {
            $tradingMonth =  $mlmPipsCsvDB->getMonthTraded();
            $tradingYear =  $mlmPipsCsvDB->getYearTraded();

            $query = "select dist.distributor_code, dist.mt4_user_name, dist.full_name
            , Coalesce(pips.bonusAmount,0)
            , (Coalesce(pips.bonusAmount,0)) as _sum
        from mlm_distributor dist
                LEFT JOIN
                    (
                        SELECT SUM(credit-debit) AS bonusAmount, dist_id
                            FROM demo_dist_commission_ledger
                            WHERE commission_type = 'PIPS BONUS'
                                AND month_traded = ".$tradingMonth." AND year_traded = ".$tradingYear."
                            group by dist_id order by dist_id
                    ) pips ON pips.dist_id  = dist.distributor_id
        HAVING  _sum > 0 order by 4 desc";

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            while ($resultset->next()) {
                $arr = $resultset->getRow();
                $result[count($result)] = $arr;
            }
        }
        return $result;
    }
    function getTotalSponsor($distributorId)
    {
        $query = "SELECT count(1) AS SUB_TOTAL FROM mlm_distributor WHERE upline_dist_id = " . $distributorId . " AND status_code = '" . Globals::STATUS_ACTIVE . "'";

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

    public function executeDownloadNric()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('q'));

        if ($distDB) {
            $fileName = $distDB->getFileNric();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/octet-stream');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/nric/".$fileName);
        }

        return sfView::NONE;
    }

    public function executeDownloadProofOfResidence()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('q'));

        if ($distDB) {
            $fileName = $distDB->getFileProofOfResidence();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/octet-stream');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/proof_of_residence/".$fileName);
        }

        return sfView::NONE;
    }

    public function executeDownloadBankPassBook()
    {
        $distDB = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('q'));

        if ($distDB) {
            $fileName = $distDB->getFileBankPassBook();

            $response = $this->getResponse();
            $response->clearHttpHeaders();
            $response->addCacheControlHttpHeader('Cache-control','must-revalidate, post-check=0, pre-check=0');
            $response->setContentType('application/octet-stream');
            $response->setHttpHeader('Content-Transfer-Encoding', 'binary', TRUE);
            $response->setHttpHeader('Content-Disposition','attachment; filename='.$fileName, TRUE);
            $response->sendHttpHeaders();

            readfile(sfConfig::get('sf_upload_dir')."/bank_pass_book/".$fileName);
        }

        return sfView::NONE;
    }

    public function executeDoSendMemberMT4()
    {
        $tbl_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distId'));

        $c = new Criteria();
        $c->add(MlmDistMt4Peer::DIST_ID, $this->getRequestParameter('distId'));
        $distMt4s = MlmDistMt4Peer::doSelect($c);

        if (count($distMt4s) >= 1) {
            foreach ($distMt4s as $distMt4) {
                $this->sendEmailForMt4($distMt4->getMt4UserName(), $distMt4->getMt4Password(), $tbl_distributor->getFullName(), $tbl_distributor->getEmail(), $tbl_distributor);
            }
        }

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    public function executeDoSendMemberPassword()
    {
        $tbl_distributor = MlmDistributorPeer::retrieveByPk($this->getRequestParameter('distId'));
        $tbl_user = AppUserPeer::retrieveByPk($tbl_distributor->getUserId());

        $this->sendEmailForLoginPassword($tbl_distributor, $tbl_user->getUsername(), $tbl_user->getUserpassword(), $tbl_user->getUserpassword2());

        $output = array(
            "error" => false
        );
        echo json_encode($output);
        return sfView::HEADER_ONLY;
    }

    function sendEmailForMt4($mt4UserName, $mt4Password, $fullName, $email)
    {
        if ($mt4UserName != "" && $mt4Password != "") {
            $subject = "Your live trading account with FX-CMISC has been activated 您的FX-CMISC户口已被激活";

            $body = "<table border='0' cellpadding='0' cellspacing='0' width='698' align='center' style='border:1px solid #eeeeee'>
    <tbody>
    <tr valign='top'>
        <td>
            <table border='0' cellpadding='0' cellspacing='0' width='698'>
                <tbody>
                <tr valign='top'>
                    <td><img src='http://partner.fxcmiscc.com/images/email/top.jpg'
                            alt='FX-CMISC' border='0'></td>
                </tr>
                <tr valign='top'>
                    <td>
                        <table width='670' border='0' cellpadding='0' cellspacing='0'
                               style='margin-left:14px;margin-right:14px'>
                            <tbody>
                            <tr>
                                <td style='border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;padding:0 0 23px 0;font-size:12px;line-height:18px;font-family:Arial;color:#222222;padding:0px 24px 18px 24px'>
                                        Dear <strong>" . $fullName . "</strong>,<br><br>
										Congratulations! Your live trading account with FX-CMISC
										has been activated! Please find the details of your trading account as
										per below :<br><br>

									<p style='padding:7px 10px 8px 10px;margin:0;display:block;background-color:#eeeeee;color:#245498;font-weight:normal;font-size:12px;font-family:Arial,Helvetica,sans-serif;line-height:18px;text-decoration:none'>
										Live MT4 Trading Account ID : <strong>" . $mt4UserName . "</strong><br>
										Live MT4 Trading Account password : <strong>" . $mt4Password . "</strong>
									</p>
									<br>

										The Login ID and Password is strictly confidential and should not be
										disclosed to anyone. Should someone with access to your password wish,
										all of your account information can be changed. You will be held
										liable for any activity that may occur as a result of you losing your
										password. Therefore, if you feel that your password has been
										compromised, you should immediately contact us by email to
										<strong>support@fxcmiscc.com</strong> to rectify the situation.<br><br>
										We look forward to your custom in the near future. Should you have any
										queries, please do not hesitate to get back to us.<br>


                                    <br><br>
                                    This is an automated message, please do not reply. Thank you for visiting, and have fun!<br><br>
                                    From <b> FX-CMISC Account Opening Team </b>
                                    <br><br>
                                </td>
                            </tr>
							<tr>
								<td style='border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;padding:0 0 23px 0;font-size:12px;line-height:18px;font-family:Arial;color:#222222;padding:0px 24px 18px 24px'>
								<br>
								<table width='100%' cellpadding='0' cellspacing='0' border='0'>
									<tbody><tr>
										<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
										<td style='font-size:0;line-height:0' width='85'>

										</td>
										<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
										<td style='font-size:0;line-height:0' width='85'>

										</td>
										<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
										<td style='font-size:0;line-height:0' width='85'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform.gif' width='85' height='60'></td>
												</tr>
												<tr>
													<td style='line-height:15px'>
														<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
															<strong>MT4 Terminal</strong>
														</font>
													</td>
												</tr>
												<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
												<tr>
													<td style='font-size:0;line-height:0'><a href='http://files.metaquotes.net/5563/mt4/fxcmiscc4setup.exe' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download.png' height='26' width='85' border='0'></a></td>
												</tr>
											</tbody></table>
										</td><td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
										<td style='font-size:0;line-height:0' width='85'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform1.gif' width='85' height='60'></td>
												</tr>
												<tr>
													<td style='line-height:15px'>
														<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
															<strong>IOS Terminal</strong>
														</font>
													</td>
												</tr>
												<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
												<tr>
													<td style='font-size:0;line-height:0'><a href='https://itunes.apple.com/en/app/metatrader-4/id496212596?mt=8' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download.png' height='26' width='85' border='0'></a></td>
												</tr>
											</tbody></table>
										</td>
<td style='font-size:0;line-height:0' width='10'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='10' height='1'></td>
										<td style='font-size:0;line-height:0' width='91'>
											<table width='100%' cellpadding='0' cellspacing='0' border='0'>
												<tbody><tr>
													<td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/img-platform2.gif' width='85' height='60'></td>
												</tr>
												<tr>
													<td style='line-height:15px'>
														<font face='Arial, Verdana, sans-serif' size='3' color='#58584b' style='font-size:11px;line-height:15px'>
															<strong>Android Terminal</strong>
														</font>
													</td>
												</tr>
												<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
												<tr>
													<td style='font-size:0;line-height:0'><a href='https://play.google.com/store/apps/details?id=net.metaquotes.metatrader4' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/btn-download.png' height='26' width='85' border='0'></a></td>
												</tr>
											</tbody></table>
										</td>
									</tr>
								</tbody></table>
								<br>
								</td>
							</tr>
                            <tr>
                                <td style='background-color:#f3f3f3;border-top:1px solid #bac1c8;border-left:1px solid #bac1c8;border-right:1px solid #bac1c8;font-size:11px;line-height:16px;padding:26px 24px 18px 24px'>

                                        CONFIDENTIALITY: This e-mail and any files transmitted with it are confidential and intended solely for the use of the recipient(s) only. Any review, retransmission, dissemination or other use of, or taking any action in reliance upon this information by persons or entities other than the intended recipient(s) is prohibited. If you have received this e-mail in error please notify the sender immediately and destroy the material whether stored on a computer or otherwise.
									<br><br>DISCLAIMER: Any views or opinions presented within this e-mail are solely those of the author and do not necessarily represent those of FX-CMISC, unless otherwise specifically stated. The content of this message does not constitute Investment Advice.
									<br><br>RISK WARNING: Forex, spread bets, and CFDs carry a high degree of risk to your capital and it is possible to lose more than your initial investment. Only speculate with money you can afford to lose. As with any trading, you should not engage in it unless you understand the nature of the transaction you are entering into and, the true extent of your exposure to the risk of loss. These products may not be suitable for all investors, therefore if you do not fully understand the risks involved, please seek independent advice.
									<br><br>
<br><br>保密条款: 本邮件及其附件仅限于发送给上面地址中列出的个人、群组。禁止任何其他人以任何形式使用（包括但不限于全部或部分的泄露、复制、或散发）本邮件中的信息。如果您错收了本邮件，请您立即电话或邮件通知发件人，并删除任何您存于电脑或者其他终端的本邮件！
<br><br>免责声明: 本邮件中任何观点和意见仅代表邮件发件人个人观点； 且除非特别声明，本邮件中的任何观点或意见并不代表FX-CMISC的立场。另本邮件中所含信息并不构成投资建议。
<br><br>风险警示:外汇、差价赌注、差价合同交易均为高风险操作，您的损失可能会超出您的初始投入。 请根据您可以承受的损失程度理性参与投资。 在您决定参与任何交易前，请一定了解您正在接触的交易其本质，并全面理解您个人的风险暴露程度。这些产品可能不适用于所有的投资者，所以若您未能充分了解所涉及的风险，请您寻求独立意见。
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td><img src='http://partner.fxcmiscc.com/images/email/bottom.jpg'
                            alt='' border='0' usemap='#1461c343c4ce9442_Map2'></td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody ></table>";


            $sendMailService = new SendMailService();
            return $sendMailService->sendMail($email, $fullName, $subject, $body);
        }
    }

    function sendEmailForLoginPassword($existDistributor, $username, $password, $password2)
    {
        if ($existDistributor && $username != "" && $password != "" && $password2 != "") {
            $subject = "FX-CMISC - Account Password Retrieval";

            $body = "<table width='800' align='center' cellpadding='0' cellspacing='0' border='0'>
			<tbody><tr>
				<td valign='top' colspan='3'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr>
							<td style='font-size:0;line-height:0' width='201' valign='top'><img src='http://partner.fxcmiscc.com/images/email/bg-top.png' width='201' height='226'></td>
							<td valign='top' width='551'>
								<table width='100%' cellpadding='0' cellspacing='0' border='0'>
									<tbody><tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='71'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td valign='top' style='line-height:17px'>
                                            <font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:14px;line-height:17px'>
                                                Dear <strong>".$existDistributor->getFullName()."</strong>,<br>
                                                <br>" . $this->getContext()->getI18N()->__("Username", null) . ": <b>" . $username . "</b>
                                                <br>" . $this->getContext()->getI18N()->__("Login Password", null) . ": <b>" . $password . "</b>
                                                <br>" . $this->getContext()->getI18N()->__("Security Password", null) . ": <b>" . $password2 . "</b>
                                                <br><br>" . $this->getContext()->getI18N()->__("If you do not requested for this password retrieval, you can simply ignore this email since only you will receive this email. For more information, please contact us.", null, 'email') . "
                                            </font>
										</td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='32'></td></tr>
									<tr>
										<td valign='top' style='font-size:0;line-height:0' width='86'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='86' height='1'></td>
										<td style='font-size:0;line-height:0' bgcolor='#0080C8'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='1'></td>
									</tr>
									<tr><td style='font-size:0;line-height:0' colspan='2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='10'></td></tr>
									<tr>
										<td valign='top' style='line-height:15px;text-align:right' colspan='2' align='right'>
											<font face='Arial, Verdana, sans-serif' size='3' color='#000000' style='font-size:12px;line-height:15px'>
												<em>
													Best Regards,<br>
													<strong>FX-CMISC</strong><br>
													E mail : support@fxcmiscc.com
												</em>
											</font>
										</td>
									</tr>
								</tbody></table>
							</td>
							<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='48' height='1'></td>
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td style='font-size:0;line-height:0' width='63'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='63' height='1'></td>
				<td valign='top' width='689'>
					<table width='100%' cellpadding='0' cellspacing='0' border='0'>
						<tbody><tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='28'></td></tr>
						<tr>
							<td align='right' style='text-align:right;font-size:0;line-height:0'>
								<a href='http://www.fxcmiscc.com/' target='_blank'><img src='http://partner.fxcmiscc.com/images/email/logo.png' height='87' border='0'></a>
							</td>
						</tr>
						<tr><td style='font-size:0;line-height:0'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='16'></td></tr>
					</tbody></table>
				</td>
				<td style='font-size:0;line-height:0' width='48'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' width='48' height='1'></td>
			</tr>
			<tr><td colspan='3' style='font-size:0;line-height:0' bgcolor='#D2D2D2'><img src='http://partner.fxcmiscc.com/images/email/transparent.gif' height='34'></td></tr>
		</tbody></table>";
                $sendMailService = new SendMailService();
                $sendMailService->sendForgetPassword($existDistributor, $subject, $body);
        }
    }

    function getTotalUpgradeAmount($distId)
    {
        $query = "SELECT SUM(package.price) AS _sum
                        FROM mlm_distributor newDist
                            LEFT JOIN mlm_package_upgrade_history history ON history.dist_id = newDist.distributor_id
                            LEFT JOIN mlm_package package ON package.package_id = history.package_id
                        WHERE newDist.loan_account = 'N'
                            AND history.transaction_code = 'PACKAGE UPGRADE' AND newDist.distributor_id = ".$distId."
                        group by dist_id";
        //var_dump($query);
        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $count = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["_sum"] != null) {
                $count = $arr["_sum"];
            } else {
                $count = 0;
            }
        }
        return $count;
    }

    function generateMt4Password()
    {
        $max_digit = 999999;
        $digit = 6;

        $char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));

        $fcode = rand(0, $max_digit) . "";
        $fcode = str_pad($fcode, $digit, "0", STR_PAD_LEFT);

        return $char.$fcode;
    }
}