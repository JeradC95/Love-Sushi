<?php

/**
 * Class AdultOrder is a subclass of order and creates
 * an object with an alcoholic beverage
 */
class AdultOrder extends SushiOrder
{
    private $_alcohol;
    const PRICE = 14.99;

    /**
     * Gets the price
     * @return float $price
     */
    public function getPrice(){
        return self::PRICE;
    }

    /**
     * gets alcohol
     * @return string $alcohol
     */
    public function getAlcohol()
    {
        return $this->_alcohol;
    }

    /**
     * sets alcohol
     * @param string $alcohol
     */
    public function setAlcohol($alcohol)
    {
        $this->_alcohol = $alcohol;
    }


}