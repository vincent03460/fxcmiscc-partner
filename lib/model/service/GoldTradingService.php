<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class GoldTradingService
{

    public function fetchGoldSell()
    {
        $goldSell = 0;
        $c = new Criteria();
        $c->add(TblSettingPeer::F_PARAMETER, Globals::SETTING_GOLD_PRICE);
        $exist = TblSettingPeer::doSelectOne($c);
        if($exist) $goldSell = $exist->getFValue();

        return number_format($goldSell, 4);
    }
    public function fetchGoldBuy($goldSell)
    {
        if ($goldSell == null) {
            $goldSell = $this->fetchGoldSell();
        }
        $goldBuy = $goldSell - 0.2;

        return $goldBuy;
    }
    public function fetchAllGoldTradingData($distributorId)
    {
        $goldTradingDto = new GoldTradingDto();

        if (isset($distributorId) && trim($distributorId) != '') {
            $tradingMarginAvailable = 0;
            $tradingMarginBalance = 0;
            $paperGoldQuantity = 0;
            $averagePriceBuy = 0;
            $unrealizedProfitLoss = 0;
            $ecash = 0;
            $goldSell = 0;
            $goldBuy = 0;

            /**********************************/
            // goldSell
            /**********************************/
            $goldSell = $this->fetchGoldSell();
            /**********************************/
            // goldBuy
            /**********************************/
            $goldBuy = $this->fetchGoldBuy($goldSell);

            /**********************************/
            // tradingMarginAvailable
            /**********************************/
            $query = "SELECT SUM(f_credit) AS SUB_TOTAL FROM tbl_account_ledger
                    WHERE f_action IN ('".Globals::ACCOUNT_LEDGER_ACTION_REGISTER."', '".Globals::ACCOUNT_LEDGER_ACTION_REINVEST_CPS."')
                    AND f_type='".Globals::ACCOUNT_TYPE_TRADING_POINT."' AND f_dist_id = ".$distributorId;

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($arr["SUB_TOTAL"] != null) {
                    $tradingMarginAvailable = $arr["SUB_TOTAL"];
                }
            }
            /**********************************/
            // tradingMarginBalance
            /**********************************/

            $c = new Criteria();
            $c->add(TblAccountPeer::F_DIST_ID, $distributorId);
            $c->addAnd(TblAccountPeer::F_TYPE, Globals::ACCOUNT_TYPE_TRADING_POINT);
            $exist = TblAccountPeer::doSelectOne($c);
            if($exist) $tradingMarginBalance = $exist->getFBalance();

            /*************************************/
            // paperGoldQuantity
            /*************************************/
            $query = "SELECT SUM(f_gram) AS SUB_TOTAL FROM tbl_egold_account
                    WHERE f_dist_id = ".$distributorId;

            $connection = Propel::getConnection();
            $statement = $connection->prepareStatement($query);
            $resultset = $statement->executeQuery();

            if ($resultset->next()) {
                $arr = $resultset->getRow();
                if ($arr["SUB_TOTAL"] != null) {
                    $paperGoldQuantity = $arr["SUB_TOTAL"];
                }
            }
            /**********************************/
            // averagePriceBuy
            /**********************************/
            $c = new Criteria();
            $c->add(TblEgoldAccountPeer::F_DIST_ID, $distributorId);
            $c->addAnd(TblEgoldAccountPeer::F_GRAM, 0, Criteria::NOT_EQUAL);
            $goldAccounts = TblEgoldAccountPeer::doSelect($c);

            $totalGold = 0;
            $totalOriPrice = 0;
            foreach($goldAccounts as $goldAccount){
                $qtyGold = $goldAccount->getFGram();
                $c = new Criteria();
                $c->add(TblEgoldLedgerPeer::F_EGOLD_ACCOUNT_ID, $goldAccount->getFId());
                $exist = TblEgoldLedgerPeer::doSelectOne($c);

                if ($exist) {
                    $totalGold += $qtyGold;
                    $totalOriPrice += ($qtyGold * $goldAccount->getFPrice());
                }
            }

            $averagePriceBuy = $totalOriPrice / $totalGold;
            /**********************************/
            // unrealizedProfitLoss
            /**********************************/
            $unrealizedProfitLoss = ($goldBuy - $averagePriceBuy) * $paperGoldQuantity;
            /**********************************/
            // ecash
            /**********************************/
            $c = new Criteria();
            $c->add(TblAccountPeer::F_DIST_ID, $distributorId);
            $c->addAnd(TblAccountPeer::F_TYPE, Globals::ACCOUNT_TYPE_ECASH);
            $exist = TblAccountPeer::doSelectOne($c);
            if($exist) $ecash = $exist->getFBalance();


            $goldTradingDto->setTradingMarginAvailable($tradingMarginAvailable);
            $goldTradingDto->setTradingMarginBalance($tradingMarginBalance);
            $goldTradingDto->setPaperGoldQuantity($paperGoldQuantity);
            $goldTradingDto->setAveragePriceBuy($averagePriceBuy);
            $goldTradingDto->setUnrealizedProfitLoss($unrealizedProfitLoss);
            $goldTradingDto->setEcash($ecash);
            $goldTradingDto->setGoldSell($goldSell);
            $goldTradingDto->setGoldBuy($goldBuy);
        }

        return $goldTradingDto;
    }

    function format2decimal($d){
        return ceil($d * 100) / 100;
    }
}
