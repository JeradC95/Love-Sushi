<?php

class DataSushi
{

    function connect()
    {

    }

    function insertOrder()
    {

    }

    function insertCustomer()
    {

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
