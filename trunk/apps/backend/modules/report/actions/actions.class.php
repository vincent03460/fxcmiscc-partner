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
    public function executeLeaderSales()
    {
        $accountTypeArr = array(21,22,33);

        $c = new Criteria();
        $c->add(MlmDistributorPeer::RANK_ID, $accountTypeArr , Criteria::IN);
        $c->add(MlmDistributorPeer::LOAN_ACCOUNT, "N");
        $c->addAscendingOrderByColumn(MlmDistributorPeer::TREE_LEVEL);
        $distDBs = MlmDistributorPeer::doSelect($c);

        $thisMonthStart = date("Y-m-1");
        $thisMonthEnd = date("Y-m-t");
        $last1MonthStart = date("Y-m-1", strtotime("-1 month"));
        $last1MonthEnd = date("Y-m-t", strtotime("-1 month"));
//        var_dump($last1MonthStart);
//        var_dump($last1MonthEnd);
//        exit();
        $resultArray = array();
        foreach ($distDBs as $dist) {
            $totalCurrentMonth = $this->getTotalSales($dist->getDistributorId(), $thisMonthStart, $thisMonthEnd);
            $totalPrevious1Month = $this->getTotalSales($dist->getDistributorId(), $last1MonthStart, $last1MonthEnd);

            $mlmPackage = MlmPackagePeer::retrieveByPK($dist->getRankId());

            $resultArray[$dist->getDistributorId()]['rank_code'] = $mlmPackage->getPackageName();
            $resultArray[$dist->getDistributorId()]['percentage'] = $mlmPackage->getLeaderBonus();
            $resultArray[$dist->getDistributorId()]['totalCurrentMonth'] = $totalCurrentMonth;
            $resultArray[$dist->getDistributorId()]['totalPrevious1Month'] = $totalPrevious1Month;
        }

        $this->distDBs = $distDBs;
        $this->resultArray = $resultArray;
    }
    public function executeConvertEcashToEpoint()
    {
    }
    public function executeEpointTransfer()
    {
    }
    public function executeGroupSales()
    {
    }
    public function executeIndividualTraderSales()
    {
    }
    public function executeMt4Withdrawal()
    {
    }
    public function executeReferralBonus()
    {
    }
    public function executeTotalMt4Reload()
    {
    }
    public function executeTotalPackagePurchase()
    {
    }
    public function executeTotalPackageUpgrade()
    {
    }
    public function executeTotalVolumeTraded()
    {
    }

    function getTotalSales($distributorId, $dateFrom, $dateTo)
    {
        $totalSponsor = 0;
        $totalUpgrade = 0;
        $query = "SELECT SUM(package.price) AS SUB_TOTAL
            FROM mlm_distributor dist
                LEFT JOIN mlm_package package ON package.package_id = dist.init_rank_id
            WHERE dist.status_code = 'ACTIVE' AND tree_structure like '%|". $distributorId ."|%'"
                 . " AND dist.active_datetime >= '" . $dateFrom . " 00:00:00'"
                 . " AND dist.active_datetime <= '" . $dateTo . " 23:59:59'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalSponsor = $arr["SUB_TOTAL"];
            }
        }

        $query = "SELECT SUM(upgradeHistory.amount) AS SUB_TOTAL
            FROM mlm_package_upgrade_history upgradeHistory
                LEFT JOIN mlm_distributor dist ON upgradeHistory.dist_id = dist.distributor_id
            WHERE dist.status_code = 'ACTIVE' AND dist.tree_structure like '%|". $distributorId ."|%' AND upgradeHistory.transaction_code = 'PACKAGE UPGRADE'"
                . " AND upgradeHistory.created_on >= '" . $dateFrom . " 00:00:00'"
                . " AND upgradeHistory.created_on <= '" . $dateTo . " 23:59:59'";
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
}
