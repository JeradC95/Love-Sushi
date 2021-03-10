<?php

class SushiOrder
{
    private $_mainRoll;
    private $_sideRoll;
    private $_drink;
    private $_mealId;
    const PRICE = 12.99;

    /**
     * Order constructor.
     * @param $_mainRoll
     * @param $_sideRoll
     * @param $_drink
     */
    public function __construct($_mainRoll, $_sideRoll, $_drink)
    {
        $this->_mainRoll = $_mainRoll;
        $this->_sideRoll = $_sideRoll;
        $this->_drink = $_drink;
    }

    public function getPrice(){
        return self::PRICE;
    }

    /**
     * @return mixed
     */
    public function getMainRoll()
    {
        return $this->_mainRoll;
    }

    /**
     * @param mixed $mainRoll
     */
    public function setMainRoll($mainRoll)
    {
        $this->_mainRoll = $mainRoll;
    }

    /**
     * @return mixed
     */
    public function getSideRoll()
    {
        return $this->_sideRoll;
    }

    /**
     * @param mixed $sideRoll
     */
    public function setSideRoll($sideRoll)
    {
        $this->_sideRoll = $sideRoll;
    }

    /**
     * @return mixed
     */
    public function getDrink()
    {
        return $this->_drink;
    }

    /**
     * @param mixed $drink
     */
    public function setDrink($drink)
    {
        $this->_drink = $drink;
    }
    /**
     * @return mixed
     */
    public function getMealId()
    {
        return $this->_mealId;
    }

    /**
     * @param mixed $mealId
     */
    public function setMealId($mealId)
    {
        $this->_mealId = $mealId;
    }
}
