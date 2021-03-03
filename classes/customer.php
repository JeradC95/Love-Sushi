<?php

class Customer
{
private $_fname;
private $_lname;
private $_phone;
private $_email;
private $_order;

    /**
     * Customer constructor.
     * @param $_fname
     * @param $_lname
     * @param $_phone
     * @param $_email
     */
    public function __construct($_fname, $_lname, $_phone, $_email)
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_phone = $_phone;
        $this->_email = $_email;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->_order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->_order = $order;
    }


}