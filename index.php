<?php

//This is my CONTROLLER

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');


//Create an instance of Base class
$f3 = Base::instance();
$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    echo "Hello";
    $view = new Template();
    echo $view->render('views/home.html');
});

//define a default route(admin page)
$f3->route('GET /admin', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/admin.html');
});

//define a default route(confirmation page)
$f3->route('GET /confirmation', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/confirmation.html');
});

//define a default route(login page)
$f3->route('GET /login', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/login.html');
});

//define a default route(order page)
$f3->route('GET /order', function() {
    //echo "Hello";
    $view = new Template();
    echo $view->render('views/order.html');
});

//run fat free
$f3->run();