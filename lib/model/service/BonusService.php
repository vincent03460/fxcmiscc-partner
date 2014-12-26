<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class BonusService
{
    function doCalculateSpecialBonus($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_SPECIAL_BONUS . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculateFundManagementBonus($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_FUND_MANAGEMENT . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculatePipsRebateBonus($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_CREDIT_REFUND . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculateGenerationBonus($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_GENERATION_BONUS . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculateOverridingBonus($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_OVERRIDING_BONUS . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculateGrb($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_GDB . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculateDrb($queryDate)
    {
        $query = "SELECT sum(credit - debit) AS SUB_TOTAL FROM mlm_dist_commission_ledger";

        $query .= " WHERE commission_type = '" . Globals::COMMISSION_TYPE_DRB . "'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
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
    function doCalculatePackage($queryDate)
    {
        $c = new Criteria();
        $c->addAscendingOrderByColumn(MlmPackagePeer::PRICE);
        $mlm_packages = MlmPackagePeer::doSelect($c);

        $resultArr = array();
        $count = 0;
        foreach ($mlm_packages as $package) {
            $resultArr[$count]["packageId"] = $package->getPackageId();
            $resultArr[$count]["name"] = $package->getPackageName();
            $resultArr[$count]["price"] = $package->getPrice();

            $totalPurchasePackage = $this->doTotalPurchasePackage($queryDate, $package->getPackageId());
            $totalUpgradePackage = $this->doTotalUpgradePackage($queryDate, $package->getPackageId());
            $resultArr[$count]["qty"] = $totalPurchasePackage + $totalUpgradePackage;
            $count++;
        }

        return $resultArr;
    }
    function doTotalPurchasePackage($queryDate, $packageId)
    {
        $query = "select count(rank_id) as SUB_TOTAL from mlm_distributor
                    where rank_id = ".$packageId;

        $query .= " AND loan_account = 'N'";
        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
        $query .= " group by rank_id";
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
    function doTotalUpgradePackage($queryDate, $packageId)
    {
        $query = "select count(package_id) as SUB_TOTAL from mlm_package_upgrade_history
                    where package_id = ".$packageId;

        $query .= " AND created_on >= '" . $queryDate . " 00:00:00'";
        $query .= " AND created_on <= '" . $queryDate . " 23:59:59'";
        $query .= " group by package_id";
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
}
