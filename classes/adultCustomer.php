<?php

/**
 * This class is a subclass of
 * customer that holds extra information
 * Class AdultCustomer
 */
class AdultCustomer extends Customer
{
    private $_dob;

    /**
     * get the date of birth
     * @return mixed
     */
    public function getDob()
    {
        return $this->_dob;
    }

    /**
     * set the date of birth
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->_dob =$dob;
    }


}
