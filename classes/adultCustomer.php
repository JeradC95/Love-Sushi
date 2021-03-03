<?php
class AdultCustomer extends Customer
{
    private $_dob;

    /**
     * @return mixed
     */
    public function getDob()
    {
        return $this->_dob;
    }

    /**
     * @param mixed $dob
     */
    public function setDob($dob)
    {
        $this->_dob = $dob;
    }


}
