<?php

//This is my CONTROLLER

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//Start a session
session_start();

//Create an instance of Base class
$f3 = Base::instance();
$validator = new ValidateSushi();
$dataLayer = new DataLayerSushi();

$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

//define a default route(admin page)
$f3->route('GET /admin', function() {
    $view = new Template();
    echo $view->render('views/admin.html');
});

//define a default route(confirmation page)
$f3->route('GET /confirmation', function() {
    $view = new Template();
    echo $view->render('views/confirmation.html');
});

//define a default route(login page)
$f3->route('GET /login1', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/login.html');
});

//define a default route(order page)
$f3->route('GET|POST /order', function($f3) {
    global $validator;
    global $dataLayer;

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Get Required Data
        $userFroll = $_POST['froll'];
        $userSroll = $_POST['sroll'];
        $userDrink = $_POST['drink'];

        if (!$validator->validChoice($userFroll, $dataLayer->getRolls())) {
            $f3->set('errors["froll"]', "Please select a valid roll.");
        }

        if (!$validator->validChoice($userSroll, $dataLayer->getRolls())) {
            $f3->set('errors["sroll"]', "Please select a valid roll.");
        }

        if (!$validator->validChoice($userDrink, $dataLayer->getDrinks())) {
            $f3->set('errors["drink"]', "Please select a drink.");
        }

        //get data from post array
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);

        //Validate
        if(!$validator->validName($fname)) {
            $f3->set('errors["fname"]',"First name cannot be blank.");
        }
        if(!$validator->validName($lname)) {
            $f3->set('errors["lname"]',"Last name cannot be blank.");
        }
        if(!$validator->validPhone($phone)) {
            $f3->set('errors["phone"]',"Please type a valid phone number.");
        }

        if (!$validator->validEmail($email)) {
            $f3->set('errors["email"]', "Email required.");
        }

        //Alcohol option
        if(isset($_POST['terms'])) {
            $_SESSION['terms'] = $_POST['terms'];

            $userAlcohol = $_POST['alcohol'];
            if (!$validator->validChoice($userAlcohol, $dataLayer->getAlc())) {
                $f3->set('errors["alcohol"]', "Please choose an alcohol to add.");
            }

            $birthday = $_POST['birthday'];
            if (!empty($birthday)) {
                $date = explode("/", $birthday);
                $day = $date[1];
                $month = $date[0];
                $year = $date[2];
                if(count($date) == 3) {


                if(!checkdate($month, $day, $year)) {
                    $f3->set('errors["birthday"]', "Must be in mm/dd/yyyy format");
                }
                else {
                    if(!$validator->validBirthday($birthday)) {
                        $f3->set('errors["birthday"]', "You must be over 21 to get alcohol.");
                    }
                }

            }
                else {
                $f3->set('errors["birthday"]', "Please verify birthdate.");
                }
            }
        }

        //if there are no errors, redirect
        if (empty($f3->get('errors'))) {

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
            $f3->reroute('/confirmation');  //get
        }
    }

    //Set Arrays
    $f3->set('frolls', $dataLayer->getRolls());
    $f3->set('srolls', $dataLayer->getRolls());
    $f3->set('drinks', $dataLayer->getDrinks());
    $f3->set('alcohols', $dataLayer->getAlc());

    //Sticky Values
    $f3->set('userSroll', isset($userSroll) ? $userSroll : "");
    $f3->set('userFroll', isset($userFroll) ? $userFroll : "");
    $f3->set('userDrink', isset($userDrink) ? $userDrink : "");
    $f3->set('userAlcohol', isset($userAlcohol) ? $userAlcohol : "");
    $f3->set('fname', isset($fname) ? $fname : "");
    $f3->set('lname', isset($lname) ? $lname : "");
    $f3->set('phone', isset($phone) ? $phone : "");
    $f3->set('email', isset($email) ? $email : "");

    $view = new Template();
    echo $view->render('views/order.html');
});

//run fat free
$f3->run();