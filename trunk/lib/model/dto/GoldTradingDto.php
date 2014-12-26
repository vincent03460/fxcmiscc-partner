<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class GoldTradingDto {
    private $tradingMarginAvailable = 0;
    private $tradingMarginBalance = 0;
    private $paperGoldQuantity = 0;
    private $averagePriceBuy = 0;
    private $unrealizedProfitLoss = 0;
    private $ecash = 0;
    private $goldSell = 0;
    private $goldBuy = 0;


    public function setAveragePriceBuy($averagePriceBuy)
    {
        $this->averagePriceBuy = $averagePriceBuy;
    }

    public function getAveragePriceBuy()
    {
        return number_format($this->averagePriceBuy, 4);
    }

    public function setEcash($ecash)
    {
        $this->ecash = $ecash;
    }

    public function getEcash()
    {
        return $this->ecash;
    }

    public function setGoldSell($goldSell)
    {
        $this->goldSell = $goldSell;
    }

    public function getGoldSell()
    {
        return $this->goldSell;
    }

    public function setPaperGoldQuantity($paperGoldQuantity)
    {
        $this->paperGoldQuantity = $paperGoldQuantity;
    }

    public function getPaperGoldQuantity()
    {
        return $this->paperGoldQuantity;
    }

    public function setTradingMarginAvailable($tradingMarginAvailable)
    {
        $this->tradingMarginAvailable = $tradingMarginAvailable;
    }

    public function getTradingMarginAvailable()
    {
        return $this->tradingMarginAvailable;
    }

    public function setTradingMarginBalance($tradingMarginBalance)
    {
        $this->tradingMarginBalance = $tradingMarginBalance;
    }

    public function getTradingMarginBalance()
    {
        return $this->tradingMarginBalance;
    }

    public function setUnrealizedProfitLoss($unrealizedProfitLoss)
    {
        $this->unrealizedProfitLoss = $unrealizedProfitLoss;
    }

    public function getUnrealizedProfitLoss()
    {
        return $this->unrealizedProfitLoss;
    }

    public function getUnrealizedProfitLoss4Decimals()
    {
        return number_format($this->unrealizedProfitLoss,4);
    }

    public function setGoldBuy($goldBuy)
    {
        $this->goldBuy = $goldBuy;
    }

    public function getGoldBuy()
    {
        return $this->goldBuy;
    }
}
