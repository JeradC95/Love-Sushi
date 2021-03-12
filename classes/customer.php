<?php

class Customer
{
private $_fname;
private $_lname;
private $_phone;
private $_email;
private $_order;
private $_customerId;

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
     * Gets first name
     * @return mixed
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * Sets first name
     * @param String $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * Gets last name
     * @return String $lname
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * Sets last name
     * @param String $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * Gets phone number
     * @return String $phoneNumber
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * Sets phone number
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * Gets email
     * @return d
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

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->_customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = $customerId;
    }
}