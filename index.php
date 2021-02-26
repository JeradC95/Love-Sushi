<?php

//This is my CONTROLLER

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
require_once('model/validate.php');


//Create an instance of Base class
$f3 = Base::instance();
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

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Get Required Data
        $userFroll = $_POST['froll'];

        if (validChoice($userFroll, getRolls())) {
            $_SESSION['userFroll'] = $userFroll;
        } else {
            $f3->set('errors["froll"]', "Please select a valid roll.");
        }

        $userSroll = $_POST['sroll'];

        if (validChoice($userSroll, getRolls())) {
            $_SESSION['userSroll'] = $userSroll;
        } else {
            $f3->set('errors["sroll"]', "Please select a valid roll.");
        }
        $userDrink = $_POST['drink'];

        if (validChoice($userDrink, getDrinks())) {
            $_SESSION['userDrink'] = $userDrink;
        } else {
            $f3->set('errors["drink"]', "Please select a drink.");
        }

        //get data from post array
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);

        //Validate
        if(validName($fname)) {
            $_SESSION['fname'] = $fname;
        }
        //data is not valid, set error in f3 hive
        else {
            $f3->set('errors["fname"]',"First name cannot be blank.");
        }
        if(validName($lname)) {
            $_SESSION['lname'] = $lname;
        }
        //data is not valid, set error in f3 hive
        else {
            $f3->set('errors["lname"]',"Last name cannot be blank.");
        }
        if(validPhone($phone)) {
            $_SESSION['phone'] = $phone;
        }
        //data is not valid, set error in f3 hive
        else {
            $f3->set('errors["phone"]',"Please type a valid phone number.");
        }

        if (validEmail($email)) {
            $_SESSION['email'] = $email;
        } else {
            $f3->set('errors["email"]', "Email required.");
        }

        //Alcohol option
        if(isset($_POST['terms'])) {
            $_SESSION['terms'] = $_POST['terms'];

            $alcohol = $_POST['alcohol'];
            if (validChoice($alcohol, getAlc())) {
                $_SESSION['alcohol'] = $alcohol;
            } else {
                $f3->set('errors["alcohol"]', "Please choose an alcohol to add.");
            }

//            $birthday = $_POST['birthday'];
//            if (!empty($birthday)) {
//                if(validDate($birthday)) {
//                    $_SESSION['birthday'] = $birthday;
//                }else {
//                    $f3->set('errors["birthday"]', "You must be over 21 to get alcohol.");
//                }
//            } else {
//                $f3->set('errors["birthday"]', "Please verify birthdate.");
//            }
        }

        //if there are no errors, redirect
        if (empty($f3->get('errors'))) {
            $f3->reroute('/confirmation');  //get
        }
    }

    //Set Arrays
    $f3->set('frolls', getRolls());
    $f3->set('srolls', getRolls());
    $f3->set('drinks', getDrinks());
    $f3->set('alcohols', getAlc());

    //Sticky Values
    $f3->set('userSroll', isset($userSroll) ? $userSroll : "");
    $f3->set('userFroll', isset($userFroll) ? $userFroll : "");
    $f3->set('userDrink', isset($userDrink) ? $userDrink : "");
    $f3->set('fname', isset($fname) ? $fname : "");
    $f3->set('lname', isset($lname) ? $lname : "");
    $f3->set('phone', isset($phone) ? $phone : "");
    $f3->set('email', isset($email) ? $email : "");

    $view = new Template();
    echo $view->render('views/order.html');
});

//run fat free
$f3->run();