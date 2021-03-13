<?php

/**
 * Class ValidateSushi contains validate functions
 */
Class ValidateSushi
{
    private  $_dataLayer;
    function __construct()
    {
        $this->_dataLayer = new DataLayerSushi();
    }

    /** validName() returns true if Name is not empty
     * @param $name
     * @return bool
     */
    function validName($name)
    {
        return !empty($name && ctype_alpha($name));
    }

    /** validPhone returns true if phone is only numbers and is 9 characters long
     * @param $phone string phone number
     * @return bool valid number
     */
    function validPhone($phone)
    {
        if (strlen($phone) == 10) {
            return is_numeric($phone);
        }
        return false;
    }

    /** validEmail returns true if email contains @ and .
     * @param $email string
     * @return bool
     */
    function validEmail($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return (filter_var($email, FILTER_VALIDATE_EMAIL));

    }


    /** validChoice() returns true if the selected roll is in the list
     * of valid options
     * @param String $selected
     * @param $foodArray
     * @return boolean
     */
    function validChoice($selected, $foodArray)
    {
        $validChoice = $foodArray;
        return (in_array($selected, $validChoice));
    }

    /**
     * validBirthday returns true if the user is over 21
     * @param $birthday
     * @return bool $today
     */
    function validBirthday($birthday)
    {
        $dob = strtotime($birthday);
        $today = strtotime("+21 years", $dob);

        return (time() > $today);
    }
}

