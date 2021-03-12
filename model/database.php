<?php

/**
 * Class DataSushi connects to our database and inserts SQL statements
 */
class DataSushi
{

    /**
     * Connects to the database
     */
    function connect()
    {
        require  $_SERVER['DOCUMENT_ROOT'].'/../config.php';
    }

    /**
     * Inserts data from the form into the database
     */
    function insertOrder()
    {
        global $dbh;
        $sql = "INSERT INTO sushi_order(main_roll, side_roll, drink, alcohol) VALUES (:main_roll, :side_roll, :drink, :alcohol)";

        $statement = $dbh->prepare($sql);

        //bind parameter
        $main_roll=$_SESSION['meal']->getMainRoll();
        $side_roll=$_SESSION['meal']->getSideRoll();
        $drink=$_SESSION['meal']->getDrink();
        if($_SESSION['meal'] instanceof AdultOrder) {
        $alcohol=$_SESSION['meal']->getAlcohol();
        }

        $statement->bindParam(':main_roll', $main_roll, PDO::PARAM_STR);
        $statement->bindParam(':side_roll', $side_roll, PDO::PARAM_STR);
        $statement->bindParam(':drink', $drink, PDO::PARAM_STR);
        $statement->bindParam(':alcohol', $alcohol, PDO::PARAM_STR);

        //execute
        $statement->execute();
        $_SESSION['meal']->setMealId($dbh->lastInsertId());
    }

    /**
     * Inserts data from customer info into the database
     */
    function insertCustomer()
    {
        global $dbh;
        $sql = "INSERT INTO sushi_customer(fname, lname, phone, email, dob, order_id) VALUES (:fname, :lname, :phone, :email, :dob, :order_id)";

        $statement = $dbh->prepare($sql);

        $fname = $_SESSION['user']->getFname();
        $lname = $_SESSION['user']->getLname();
        $phone = $_SESSION['user']->getPhone();
        $email = $_SESSION['user']->getEmail();
        $order_id = $_SESSION['meal']->getMealId();

        if($_SESSION['user'] instanceof AdultCustomer) {
            $dob = $_SESSION['user']->getDob();
        }


        $statement->bindParam(':fname', $fname, PDO::PARAM_STR);
        $statement->bindParam(':lname', $lname, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $statement->bindParam(':dob', $dob, PDO::PARAM_STR);


        //execute
        $statement->execute();
    }

    /**
     * Grabs the order from database and the customer from database
     * @return array $result
     */
    function getOrders()
    {
        global $dbh;
        $sql = "SELECT * FROM sushi_order JOIN sushi_customer on order_id=meal_id";
        //Prepare the statement
        $statement = $dbh->prepare($sql);

        //Execute
        $statement ->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Gets the roll options from database
     * @return array $result
     */
    function getRollOptions()
    {
        global $dbh;
        $sql = "SELECT * FROM sushi_roll";
//        //Prepare the statement
        $statement = $dbh->prepare($sql);
//
//        //Execute
        $statement ->execute();
//
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}
