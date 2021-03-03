<?php

class AdultOrder extends SushiOrder
{
    private $_alcohol;

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