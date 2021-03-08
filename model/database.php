<?php

class DataSushi
{

    function connect()
    {
        require  $_SERVER['DOCUMENT_ROOT'].'/../config.php';
    }

    function insertOrder()
    {
        $sql = "INSERT INTO sushi_order(main_roll, side_roll, drink, alcohol) VALUES (:main_roll, :side_roll, :drink, :alcohol)";

        $statement = $dbh->prepare($sql);

        //bind parameter
        $main_roll=$_SESSION['meal']->getMainRoll();
        $side_roll=$_SESSION['meal']->getSideRoll();
        $drink=$_SESSION['meal']->getDrink();
        $alcohol=$_SESSION['meal']->getAlcohol();

        $statement->bindParam(':main_roll', $main_roll, PDO::PARAM_STR);
        $statement->bindParam(':side_roll', $side_roll, PDO::PARAM_STR);
        $statement->bindParam(':drink', $drink, PDO::PARAM_STR);
        $statement->bindParam(':alcohol', $alcohol, PDO::PARAM_STR);

        //execute
        $statement->execute();
        $_SESSION['meal']->setMealId($dbh->lastInsertId());
    }

    function insertCustomer()
    {
        $sql = "INSERT INTO sushi_customer(fname, lname, phone, email, dob, order_id) VALUES (:fname, :lname, :phone, :email, :dob, :order_id)";

        $statement = $dbh->prepare($sql);

        //bind parameter
        $type = "cat";
        $name = "Jay";
        $color = "red";

        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':color', $color, PDO::PARAM_STR);

        //execute
        $statement->execute();
    }

    function getCustomers()
    {
        $sql = "SELECT * FROM sushi_customer";
        //Prepare the statement
        $statement = $dbh->prepare($sql);

        //Execute
        $statement ->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo "Customer Id" . $row['customer_id'];
        }
    }

    function getOrders()
    {
        $sql = "SELECT * FROM sushi_order";
        //Prepare the statement
        $statement = $dbh->prepare($sql);

        //Execute
        $statement ->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            echo "Order Id" . $row['meal_id'];
        }
    }

    function getRollOptions()
    {
        $sql = "SELECT * FROM sushi_roll";
        //Prepare the statement
        $statement = $dbh->prepare($sql);

        //Execute
        $statement ->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        echo "Name" . $row['name'];
        }
    }
}
