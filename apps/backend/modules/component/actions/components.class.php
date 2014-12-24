<?php

class componentComponents extends sfComponents
{
    public function executePackageInformation()
    {
        $c = new Criteria();
        $packages = MlmPackagePeer::doSelect($c);
        $packageArray = array();
        $count = 0;
        foreach ($packages as $package) {
            $packageArray[$count]["package"] = $package;
            $packageArray[$count]["total"] = $this->getTotalMember(Globals::STATUS_ACTIVE, $package->getPackageId());
            $count++;
        }
        $this->packageArray = $packageArray;
    }
    public function executeCountrySelectOption()
    {
        $this->countrySelected = $this->countrySelected;
        $this->countryName = $this->countryName;
        $this->countryId = $this->countryId;
    }
    public function executeHeaderInformation()
    {
        $c = new Criteria();
        $c->add(MlmDistributorPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(MlmDistributorPeer::DISTRIBUTOR_ID, $this->param);
        $componentDistributor = MlmDistributorPeer::doSelectOne($c);

        $ecash = 0;
        $epoint = 0;
        $eshare = 0;
        $maintenance = 0;
        $monthlySales = 0;
        $lastLogin = "";
        if ($componentDistributor) {
            $existUser = AppUserPeer::retrieveByPK($componentDistributor->getUserId());

            if ($existUser) {
                //$timeStamp = strtotime($existUser->getLastLoginDatetime());
                //$lastLogin = date(Globals::FULL_DATETIME_FORMAT, $timeStamp);
                $lastLogin = $existUser->getLastLoginDatetime();
            }

            $this->componentDistributor = $componentDistributor;

            $dateUtil = new DateUtil();
            $d = $dateUtil->getMonth();
            $firstOfMonth = date('Y-m-j', $d["first_of_month"])." 00:00:00";
            $lastOfMonth = date('Y-m-j', $d["last_of_month"])." 23:59:59";

            $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_dist_pairing_ledger WHERE dist_id = " . $componentDistributor->getDistributorId()
                     . " AND transaction_type = '" . Globals::PAIRING_LEDGER_REGISTER ."'"
                     . " AND created_on >= '". $firstOfMonth . "' AND created_on <= '". $lastOfMonth ."'";

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();
            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($arr["SUB_TOTAL"] != null) {
                    $monthlySales = $arr["SUB_TOTAL"];
                } else {
                    $monthlySales = 0;
                }
            }
        } else {
            $componentDistributor = new MlmDistributor();
        }
        $this->ecash = $ecash;
        $this->epoint = $epoint;
        $this->eshare = $eshare;
        $this->maintenance = $maintenance;
        $this->monthlySales = $monthlySales;
        $this->lastLogin = $lastLogin;
        $this->componentDistributor = $componentDistributor;
    }

    function getTotalMember($statusCode, $rankId)
    {
        $c = new Criteria();
        if ($statusCode != null) {
            $c->add(MlmDistributorPeer::STATUS_CODE, $statusCode);
        }
        if ($rankId != null) {
            $c->add(MlmDistributorPeer::MT4_RANK_ID, $rankId);
        }
        $totalNetworks = MlmDistributorPeer::doCount($c);

        return $totalNetworks;
    }
}