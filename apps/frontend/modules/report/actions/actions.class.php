<?php

/**
 * report actions.
 *
 * @package    sf_sandbox
 * @subpackage report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class reportActions extends sfActions
{
    /**
     * Executes index action
     *
     */
    public function executeIndex()
    {
        return $this->redirect('/report/dailyReport');
    }
    public function executeDailyReport()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REPORT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "DAILY_REPORT");

        $queryDate = $this->getRequestParameter('queryDate', date("Y")."-".date("m"));

        $arr = explode("-", $queryDate);
        $dateUtil = new DateUtil();
        $d = $dateUtil->getMonth($arr[1], $arr[0]);
        $firstOfMonth = date('Y-m-j', $d["first_of_month"])." 00:00:00";
        $lastOfMonth = date('Y-m-j', $d["last_of_month"])." 23:59:59";

        /*$c = new Criteria();
        $c->add(MlmRoiDividendPeer::DIST_ID, $this->getUser()->getAttribute(Globals::SESSION_DISTID));
        $c->add(MlmRoiDividendPeer::STATUS_CODE, Globals::DIVIDEND_STATUS_SUCCESS);
        $c->add(MlmRoiDividendPeer::DIVIDEND_DATE, $firstOfMonth, Criteria::GREATER_EQUAL);
        $c->add(MlmRoiDividendPeer::DIVIDEND_DATE, $lastOfMonth, Criteria::LESS_EQUAL);
        $c->addAscendingOrderByColumn(MlmRoiDividendPeer::DIVIDEND_DATE);
        $this->mlmRoiDividends = MlmRoiDividendPeer::doSelect($c);*/
        $this->mlmRoiDividends = $this->getMlmRoiDividends($firstOfMonth, $lastOfMonth);

        $this->queryDate = $queryDate;
    }
    public function executeMonthlyReport()
    {
        $this->getUser()->setAttribute(Globals::SESSION_MAIN_MENU, "REPORT");
        $this->getUser()->setAttribute(Globals::SESSION_SUB_MENU, "MONTHLY_REPORT");

        $distDB = MlmDistributorPeer::retrieveByPk($this->getUser()->getAttribute(Globals::SESSION_DISTID));
        if (!$distDB) {
            return $this->redirect('/member/summary');
        }

        $joinDate = $distDB->getActiveDatetime();

        $currentMonth = date('m');
        $currentYear = date('Y');

        $anode = array();

        $idx = 0;
        if ($joinDate != null) {
            $joinMonth = date('m', strtotime($joinDate));
            $joinYear = date('Y', strtotime($joinDate));
            for ($y = date("Y"); $y >= $joinYear; $y--) {
                if ($y == 2012) {
                    for ($m = 12; $m >= $joinMonth; $m--) {
                        if ($m < 10) {
                            $m = "0".$m;
                        }

                        $dateUtil = new DateUtil();
                        $d = $dateUtil->getMonth($m, $y);
                        $firstOfMonth = date('Y-m-j', $d["first_of_month"])." 00:00:00";
                        $lastOfMonth = date('Y-m-j', $d["last_of_month"])." 23:59:59";

                        $query = "SELECT devidend_id, dist_id, report_id, account_ledger_id
                            , dividend_date, package_id, package_price, roi_percentage
                            , dividend_amount, remarks, status_code, created_by, created_on, updated_by, updated_on
                                    FROM mlm_roi_dividend
                            WHERE dist_id = ".$this->getUser()->getAttribute(Globals::SESSION_DISTID) .
                                " AND status_code = '".Globals::DIVIDEND_STATUS_SUCCESS . "'" .
                                " AND dividend_date >= '".$firstOfMonth . "'" .
                                " AND dividend_date <= '".$lastOfMonth . "'" ;

                        $connection = Propel::getConnection();
                        $statement = $connection->prepareStatement($query);
                        $resultset = $statement->executeQuery();

                        $averageDay = 0;
                        $amount = 0;
                        $totalRate = 0;
                        $totalReturn = 0;
                        while ($resultset->next()) {
                            $arr = $resultset->getRow();
                            $amount += $arr['package_price'];
                            $totalRate += $arr['roi_percentage'];
                            $totalReturn += $arr['dividend_amount'];

                            $averageDay++;
                        }
                        $anode[$idx]["year"] = $y;
                        $anode[$idx]["month"] = $m;
                        $anode[$idx]["amount"] = $amount / $averageDay;
                        $anode[$idx]["total_rate"] = $totalRate;
                        $anode[$idx]["total_return"] = $totalReturn;
                        $idx++;
                    }
                } else if ($y = date("Y")) {
                    for ($m = date("m"); $m >= 1; $m--) {
                        if ($m < 10) {
                            $m = "0".$m;
                        }
                        $dateUtil = new DateUtil();
                        $d = $dateUtil->getMonth($m, $y);
                        $firstOfMonth = date('Y-m-j', $d["first_of_month"])." 00:00:00";
                        $lastOfMonth = date('Y-m-j', $d["last_of_month"])." 23:59:59";

                        $query = "SELECT devidend_id, dist_id, report_id, account_ledger_id
                            , dividend_date, package_id, package_price, roi_percentage
                            , dividend_amount, remarks, status_code, created_by, created_on, updated_by, updated_on
                                    FROM mlm_roi_dividend
                            WHERE dist_id = ".$this->getUser()->getAttribute(Globals::SESSION_DISTID) .
                                " AND status_code = '".Globals::DIVIDEND_STATUS_SUCCESS . "'" .
                                " AND dividend_date >= '".$firstOfMonth . "'" .
                                " AND dividend_date <= '".$lastOfMonth . "'" ;

                        $connection = Propel::getConnection();
                        $statement = $connection->prepareStatement($query);
                        $resultset = $statement->executeQuery();

                        $averageDay = 0;
                        $amount = 0;
                        $totalRate = 0;
                        $totalReturn = 0;
                        while ($resultset->next()) {
                            $arr = $resultset->getRow();
                            $amount += $arr['package_price'];
                            $totalRate += $arr['roi_percentage'];
                            $totalReturn += $arr['dividend_amount'];

                            $averageDay++;
                        }
                        $anode[$idx]["year"] = $y;
                        $anode[$idx]["month"] = $m;
                        $anode[$idx]["amount"] = $amount / $averageDay;
                        $anode[$idx]["total_rate"] = $totalRate;
                        $anode[$idx]["total_return"] = $totalReturn;
                        $idx++;
                    }
                } else {
                    for ($m = 12; $m >= 1; $m--) {
                        if ($m < 10) {
                            $m = "0".$m;
                        }
                        $dateUtil = new DateUtil();
                        $d = $dateUtil->getMonth($m, $y);
                        $firstOfMonth = date('Y-m-j', $d["first_of_month"])." 00:00:00";
                        $lastOfMonth = date('Y-m-j', $d["last_of_month"])." 23:59:59";

                        $query = "SELECT devidend_id, dist_id, report_id, account_ledger_id
                            , dividend_date, package_id, package_price, roi_percentage
                            , dividend_amount, remarks, status_code, created_by, created_on, updated_by, updated_on
                                    FROM mlm_roi_dividend
                            WHERE dist_id = ".$this->getUser()->getAttribute(Globals::SESSION_DISTID) .
                                " AND status_code = '".Globals::DIVIDEND_STATUS_SUCCESS . "'" .
                                " AND dividend_date >= '".$firstOfMonth . "'" .
                                " AND dividend_date <= '".$lastOfMonth . "'" ;

                        $connection = Propel::getConnection();
                        $statement = $connection->prepareStatement($query);
                        $resultset = $statement->executeQuery();

                        $averageDay = 0;
                        $amount = 0;
                        $totalRate = 0;
                        $totalReturn = 0;
                        while ($resultset->next()) {
                            $arr = $resultset->getRow();
                            $amount += $arr['package_price'];
                            $totalRate += $arr['roi_percentage'];
                            $totalReturn += $arr['dividend_amount'];

                            $averageDay++;
                        }
                        $anode[$idx]["year"] = $y;
                        $anode[$idx]["month"] = $m;
                        $anode[$idx]["amount"] = $amount / $averageDay;
                        $anode[$idx]["total_rate"] = $totalRate;
                        $anode[$idx]["total_return"] = $totalReturn;
                        $idx++;
                    }
                }
            }
        }
        $this->anodes = $anode;
    }
    public function executeManipulateBonus()
    {
        $dateUtil = new DateUtil();
        $currentDate_timestamp = strtotime("2013-09-30 00:00:00");

        for ($x=1; $x <= 365; $x++) {
            $dividendDate = strtotime("+".$x." days", $currentDate_timestamp);

            $mlmDailyFundReport = new MlmDailyFundReport();
            $mlmDailyFundReport->setOperationRate($this->getRandomOperationRate());
            $mlmDailyFundReport->setReportDate($dividendDate);
            $mlmDailyFundReport->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDailyFundReport->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDailyFundReport->save();

            print_r($mlmDailyFundReport->getReportDate().":".$mlmDailyFundReport->getOperationRate()."<br>");
        }

        print_r("Done");
        return sfView::HEADER_ONLY;
    }
    public function executeManipulateRandom()
    {
        $physicalDirectory = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "random.xls";

        error_reporting(E_ALL ^ E_NOTICE);
        require_once 'excel_reader2.php';
        $data = new Spreadsheet_Excel_Reader($physicalDirectory);

        $totalRow = $data->rowcount($sheet_index = 0);
        for ($x = $totalRow; $x > 0; $x--) {
            $date = $data->val($x, "A");
            $operationAmount = $data->val($x, "B");
            $operationRate = $data->val($x, "C");
            $operationProfit = $data->val($x, "D");

            $mlmDailyFundReport = new MlmDailyFundReport();
            $mlmDailyFundReport->setReportDate($date);
            $mlmDailyFundReport->setOperationRate($operationRate);
            $mlmDailyFundReport->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDailyFundReport->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmDailyFundReport->save();

            $mlmRoiRandom = new MlmRoiRandom();
            $mlmRoiRandom->setOperationRate($operationRate);
            $mlmRoiRandom->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmRoiRandom->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmRoiRandom->save();

            $mlmRoiDividend = new MlmRoiDividend();
            $mlmRoiDividend->setDistId(1);
            $mlmRoiDividend->setReportId($mlmDailyFundReport->getDailyId());
            $mlmRoiDividend->setMt4UserName("8003333");
            //$mlmRoiDividend->setAccountLedgerId("");
            $mlmRoiDividend->setDividendDate($date);
            $mlmRoiDividend->setPackageId(1);
            $mlmRoiDividend->setPackagePrice(1000000);
            $mlmRoiDividend->setRoiPercentage($operationRate);
            $mlmRoiDividend->setMt4Balance($operationAmount);
            $mlmRoiDividend->setDividendAmount($operationProfit);
            $mlmRoiDividend->setStatusCode(Globals::STATUS_SUCCESS);
            $mlmRoiDividend->setCreatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmRoiDividend->setUpdatedBy($this->getUser()->getAttribute(Globals::SESSION_USERID, Globals::SYSTEM_USER_ID));
            $mlmRoiDividend->save();
        }
        print_r("Done");
        return sfView::HEADER_ONLY;
    }

    function getMlmRoiDividends($firstOfMonth, $lastOfMonth)
    {
        $query = "SELECT devidend_id, dist_id, report_id, account_ledger_id
            , dividend_date, package_id, package_price, roi_percentage
            , dividend_amount, remarks, status_code, created_by, created_on, updated_by, updated_on
                	FROM mlm_roi_dividend
            WHERE dist_id = ".$this->getUser()->getAttribute(Globals::SESSION_DISTID) .
                " AND status_code = '".Globals::DIVIDEND_STATUS_SUCCESS . "'" .
                " AND dividend_date >= '".$firstOfMonth . "'" .
                " AND dividend_date <= '".$lastOfMonth . "'" ;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $resultArr = array();
        while ($resultset->next()) {
            $arr = $resultset->getRow();
            $resultArr[count($resultArr)] = $arr;
        }
        return $resultArr;
    }

    function getRandomOperationRate()
    {
        $query = "SELECT operation_rate
                      FROM mlm_roi_random ORDER BY RAND()
                     LIMIT 1" ;

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $resultArr = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            $resultArr = $arr['operation_rate'];
        }
        return $resultArr;
    }
}
