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


    //Set Arrays
    $f3->set('frolls', getRolls());
    $f3->set('srolls', getRolls());
    $f3->set('drinks', getDrinks());
    $f3->set('alcohols', getAlc());

    $view = new Template();
    echo $view->render('views/order.html');
});

//run fat free
$f3->run();