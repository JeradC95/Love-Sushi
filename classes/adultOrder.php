<?php

class AdultOrder extends SushiOrder
{
    private $_alcohol;
    const PRICE = 14.99;

    public function getPrice(){
        return self::PRICE;
    }

    /**
     * @return mixed
     */
    public function getAlcohol()
    {
        return $this->_alcohol;
    }

    /**
     * @param mixed $alcohol
     */
    public function setAlcohol($alcohol)
    {
        $this->_alcohol = $alcohol;
    }


}