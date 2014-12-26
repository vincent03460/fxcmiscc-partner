<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class EShareTradingService
{
    public function verifyShareAmount()
    {
        /* *****************************************
         * verify share amount
         * ******************************************/
        $query = "SELECT SUM(debit) AS SUB_TOTAL FROM mlm_account_ledger
                WHERE account_type = '" . Globals::ACCOUNT_TYPE_ECASH . "' AND transaction_type ='" . Globals::ACCOUNT_LEDGER_ACTION_BUY_ESHARE ."'";

        $connection = Propel::getConnection();
        $statement = $connection->prepareStatement($query);
        $resultset = $statement->executeQuery();

        $totalShareSoldValue = 0;
        if ($resultset->next()) {
            $arr = $resultset->getRow();
            if ($arr["SUB_TOTAL"] != null) {
                $totalShareSoldValue = $arr["SUB_TOTAL"];
            }
        }

        $c = new Criteria();
        $c->add(MlmEsharePriceSettingPeer::STATUS_CODE, Globals::STATUS_ACTIVE);
        $c->add(MlmEsharePriceSettingPeer::VOLUME, $totalShareSoldValue, Criteria::GREATER_THAN);
        $c->addAscendingOrderByColumn(MlmEsharePriceSettingPeer::SETTING_ID);
        $esharePriceSettingDB = MlmEsharePriceSettingPeer::doSelectOne($c);
        $eshareSell = $esharePriceSettingDB->getShareValue();

        /* ***************************************
         *  Update Application Setting CPS
         *****************************************/
        $c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, GLOBALS::SETTING_CPS);
        $exist = AppSettingPeer::doSelectOne($c);
        $exist->setSettingValue($eshareSell);

        /* ***************************************
         *  Update mlm_eshare_log
         *****************************************/
        $dateUtil = new DateUtil();
        $currentDate = $dateUtil->formatDate("Y-m-d H:i:s", date("Y-m-d"));
        $c = new Criteria();
        $c->add(MlmEshareLogPeer::CREATED_ON, $currentDate, Criteria::EQUAL);
        $eshareLog = MlmEshareLogPeer::doSelectOne($c);

        if (!$eshareLog) {
            $eshareLog = new MlmEshareLog();
            $eshareLog->setCreatedBy(Globals::SYSTEM_USER_ID);
        }
        $eshareLog->setShareValue($eshareSell);
        $eshareLog->setCreatedOn($currentDate);
        $eshareLog->setUpdatedBy(Globals::SYSTEM_USER_ID);
        $eshareLog->save();
    }

    public function fetchEsharePrice()
    {
        $eshareSell = 0;
        $c = new Criteria();
        $c->add(AppSettingPeer::SETTING_PARAMETER, GLOBALS::SETTING_CPS);
        $exist = AppSettingPeer::doSelectOne($c);
        if ($exist) $eshareSell = $exist->getSettingValue();

        return number_format($eshareSell, 2);
    }

    public function fetchAllShareTradingData($distributorId)
    {
        $this->verifyShareAmount();
        $shareTradingDto = new EShareTradingDto();
        if (isset($distributorId) && trim($distributorId) != '') {
            $paperShareQuantity = 0;
            $averagePriceBuy = 0;
            $unrealizedProfitLoss = 0;
            $ecash = 0;
            $esharePrice = 0;

            /**********************************/
            // eshare Price
            /**********************************/
            $esharePrice = $this->fetchEsharePrice();

            /*************************************/
            // paperShareQuantity
            /*************************************/
            $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_dist_eshare_account
                    WHERE dist_id = " . $distributorId;

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($arr["SUB_TOTAL"] != null) {
                    $paperShareQuantity = $arr["SUB_TOTAL"];
                }
            }

            /**********************************/
            // averagePriceBuy
            /**********************************/
            $c = new Criteria();
            $c->add(MlmDistEshareAccountPeer::DIST_ID, $distributorId);
            $c->addAnd(MlmDistEshareAccountPeer::SHARE_BALANCE, 0, Criteria::NOT_EQUAL);
            $c->addAnd(MlmDistEshareAccountPeer::STATUS_CODE, Globals::ESHARE_ACCOUNT_STATUS_ACTIVE, Criteria::EQUAL);
            $distEshareAccounts = MlmDistEshareAccountPeer::doSelect($c);

            $totalShare = 0;
            $totalOriPrice = 0;
            if (count($distEshareAccounts) > 0) {
                foreach ($distEshareAccounts as $distEshareAccount) {
                    $totalShare += $distEshareAccount->getCredit();
                    $totalOriPrice += ($distEshareAccount->getCredit() * $distEshareAccount->getBuyPrice());
                }

                if ($totalOriPrice != 0) {
                    $averagePriceBuy =  $totalOriPrice / $totalShare;
                }
            }
//            var_dump($totalShare);
//            var_dump($totalOriPrice);
//            exit();
            /**********************************/
            // unrealizedProfitLoss
            /**********************************/
            $unrealizedProfitLoss = ($esharePrice - $averagePriceBuy) * $paperShareQuantity;

            /**********************************/
            // ecash
            /**********************************/
            $query = "SELECT SUM(credit-debit) AS SUB_TOTAL FROM mlm_account_ledger
            WHERE dist_id = " . $distributorId . " AND account_type = '" . Globals::ACCOUNT_TYPE_ECASH . "'";

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($arr["SUB_TOTAL"] != null) {
                    $ecash = $arr["SUB_TOTAL"];
                }
            }

            $shareTradingDto->setPaperEshareQuantity($paperShareQuantity);
            $shareTradingDto->setAveragePriceBuy($averagePriceBuy);
            $shareTradingDto->setUnrealizedProfitLoss($unrealizedProfitLoss);
            $shareTradingDto->setEcash($ecash);
            $shareTradingDto->setEsharePrice($esharePrice);
        }

        return $shareTradingDto;
    }

    function format2decimal($d)
    {
        return ceil($d * 100) / 100;
    }
}
