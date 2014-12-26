<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class EShareTradingDto {
    private $paperEshareQuantity = 0;
    private $averagePriceBuy = 0;
    private $unrealizedProfitLoss = 0;
    private $ecash = 0;
    private $esharePrice = 0;

    public function setAveragePriceBuy($averagePriceBuy)
    {
        $this->averagePriceBuy = $averagePriceBuy;
    }

    public function getAveragePriceBuy()
    {
        return $this->averagePriceBuy;
    }

    public function setEsharePrice($esharePrice)
    {
        $this->esharePrice = $esharePrice;
    }

    public function getEsharePrice()
    {
        return $this->esharePrice;
    }

    public function setPaperEshareQuantity($paperEshareQuantity)
    {
        $this->paperEshareQuantity = $paperEshareQuantity;
    }

    public function getPaperEshareQuantity()
    {
        return $this->paperEshareQuantity;
    }

    public function setUnrealizedProfitLoss($unrealizedProfitLoss)
    {
        $this->unrealizedProfitLoss = $unrealizedProfitLoss;
    }

    public function getUnrealizedProfitLoss()
    {
        return $this->unrealizedProfitLoss;
    }

    public function setEcash($ecash)
    {
        $this->ecash = $ecash;
    }

    public function getEcash()
    {
        return $this->ecash;
    }
}
