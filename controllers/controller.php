<?php

class SushiController
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function order()
    {
        global $validator;
        global $dataLayer;
        global $database;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get Required Data
            $userFroll = $_POST['froll'];
            $userSroll = $_POST['sroll'];
            $userDrink = $_POST['drink'];

            if (!$validator->validChoice($userFroll, $dataLayer->getRolls())) {
                $this->_f3->set('errors["froll"]', "Please select a valid roll.");
            }

            if (!$validator->validChoice($userSroll, $dataLayer->getRolls())) {
                $this->_f3->set('errors["sroll"]', "Please select a valid roll.");
            }

            if (!$validator->validChoice($userDrink, $dataLayer->getDrinks())) {
                $this->_f3->set('errors["drink"]', "Please select a drink.");
            }

            //get data from post array
            $fname = trim($_POST['fname']);
            $lname = trim($_POST['lname']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);

            //Validate
            if(!$validator->validName($fname)) {
                $this->_f3->set('errors["fname"]',"First name cannot be blank.");
            }
            if(!$validator->validName($lname)) {
                $this->_f3->set('errors["lname"]',"Last name cannot be blank.");
            }
            if(!$validator->validPhone($phone)) {
                $this->_f3->set('errors["phone"]',"Please type a valid phone number.");
            }

            if (!$validator->validEmail($email)) {
                $this->_f3->set('errors["email"]', "Email required.");
            }

            //Alcohol option
            if(isset($_POST['terms'])) {
                $_SESSION['terms'] = $_POST['terms'];

                $userAlcohol = $_POST['alcohol'];
                if (!$validator->validChoice($userAlcohol, $dataLayer->getAlc())) {
                    $this->_f3->set('errors["alcohol"]', "Please choose an alcohol to add.");
                }

                $birthday = $_POST['birthday'];
                if (!empty($birthday)) {
                    $date = explode("/", $birthday);
                    $day = $date[1];
                    $month = $date[0];
                    $year = $date[2];
                    if(count($date) == 3) {


                        if(!checkdate($month, $day, $year)) {
                            $this->_f3->set('errors["birthday"]', "Must be in mm/dd/yyyy format");
                        }
                        else {
                            if(!$validator->validBirthday($birthday)) {
                                $this->_f3->set('errors["birthday"]', "You must be over 21 to get alcohol.");
                            }
                        }

                    }
                    else {
                        $this->_f3->set('errors["birthday"]', "Please verify birthdate.");
                    }
                }
            }

            //if there are no errors, redirect
            if (empty($this->_f3->get('errors'))) {

                //check if an adult meal
                if(isset($_POST['terms'])) {
                    $customer = new AdultCustomer($fname, $lname, $phone, $email);
                    $customer->setDob($birthday);
                    $meal = new AdultOrder($userFroll, $userSroll, $userDrink);
                    $meal->setAlcohol($userAlcohol);
                }
                else {
                    $customer = new Customer($fname, $lname, $phone, $email);
                    $meal = new SushiOrder($userFroll, $userSroll, $userDrink);
                }
                $_SESSION['user'] = $customer;
                $_SESSION['meal'] = $meal;
                $database->insertOrder();
                $database->insertCustomer();
                $this->_f3->reroute('/confirmation');  //get
            }
        }

        //Set Arrays
        $this->_f3->set('frolls', $dataLayer->getRolls());
        $this->_f3->set('srolls', $dataLayer->getRolls());
        $this->_f3->set('drinks', $dataLayer->getDrinks());
        $this->_f3->set('alcohols', $dataLayer->getAlc());

        //Sticky Values
        $this->_f3->set('userSroll', isset($userSroll) ? $userSroll : "");
        $this->_f3->set('userFroll', isset($userFroll) ? $userFroll : "");
        $this->_f3->set('userDrink', isset($userDrink) ? $userDrink : "");
        $this->_f3->set('userAlcohol', isset($userAlcohol) ? $userAlcohol : "");
        $this->_f3->set('fname', isset($fname) ? $fname : "");
        $this->_f3->set('lname', isset($lname) ? $lname : "");
        $this->_f3->set('phone', isset($phone) ? $phone : "");
        $this->_f3->set('email', isset($email) ? $email : "");

        $view = new Template();
        echo $view->render('views/order.html');
    }

    function confirmation()
    {

        $view = new Template();
        echo $view->render('views/confirmation.html');
    }

    function login()
    {

    //If the form has been submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Get the username and password
            $username = strtolower(trim($_POST['username']));
            $password = trim($_POST['password']);

            //Actual username and password need to be stored in a seperate file
            //Should be moved to home directory ABOVE public-html
            $adminUser = "admin";
            $adminPassword = "@dm1n";

            //If they are correct
            if ($username == $adminUser && $password == $adminPassword) {

                $_SESSION['loggedin'] = true;
            }
            else {
            $this->_f3->set('errors["username"]', "Incorrect login information.");
            }
        }

        if($_SESSION['loggedin']){
            $this->_f3->reroute('/admin');  //get
        }
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function admin()
    {
        if(!($_SESSION['loggedin'])){
            $this->_f3->reroute('/admin-login');  //get
        }

        global $database;

        $customers = array();
        $orders = array();
        $result = $database->getOrders();
        foreach ($result as $row) {
            $orders['full'] = $row['fname'] . " ". $row['lname'];
            $orders['phone'] = $row['phone'];
            $orders['email'] = $row['email'];
            $orders['dob'] = $row['dob'];

            $orders['main'] = $row['main_roll'];
            $orders['side'] = $row['side_roll'];
            $orders['drink'] = $row['drink'];
            $orders['alcohol'] = $row['alcohol'];
            $orders['placed'] = date("M d, Y g:i a",
                strtotime( $row['placed'] . '-3 hours'));

            $customers[] = $orders;
        }

        $this->_f3->set('customers', $customers);

        $view = new Template();
        echo $view->render('views/admin.html');
    }

    function logout()
    {
        session_destroy();

        $this->_f3->reroute('/admin-login');
    }
}