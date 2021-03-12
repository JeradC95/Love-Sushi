<?php

/**
 * Class SushiOrder Creates a meal object based on user input
 */
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

    /**
     * Gets price
     * @return float $PRICE
     */
    public function getPrice(){
        return self::PRICE;
    }

    /**
     * gets the first roll
     * @return string $mainRoll
     */
    public function getMainRoll()
    {
        return $this->_mainRoll;
    }

    /**
     * Sets the first roll
     * @param string $mainRoll
     */
    public function setMainRoll($mainRoll)
    {
        $this->_mainRoll = $mainRoll;
    }

    /**
     * Gets the second roll
     * @return string $sideRoll
     */
    public function getSideRoll()
    {
        return $this->_sideRoll;
    }

    /**
     * Sets the second roll
     * @param string $sideRoll
     */
    public function setSideRoll($sideRoll)
    {
        $this->_sideRoll = $sideRoll;
    }

    /**
     * Gets the drink
     * @return string $drink
     */
    public function getDrink()
    {
        return $this->_drink;
    }

    /**
     * Sets the drink
     * @param string $drink
     */
    public function setDrink($drink)
    {
        $this->_drink = $drink;
    }
    /**
     * Gets the meal ID
     * @return string $mealId
     */
    public function getMealId()
    {
        return $this->_mealId;
    }

    /**
     * sets mealId
     * @param string $mealId
     */
    public function setMealId($mealId)
    {
        $this->_mealId = $mealId;
    }
}
