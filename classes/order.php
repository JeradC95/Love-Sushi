<?php

class SushiOrder
{
    private $_mainRoll;
    private $_sideRoll;
    private $_drink;

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

}