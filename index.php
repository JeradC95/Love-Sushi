<?php

//This is my CONTROLLER

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//require the autoload file
require_once('vendor/autoload.php');

//Start a session
session_start();

require  $_SERVER['DOCUMENT_ROOT'].'/../config.php';
//Login info
require $_SERVER['DOCUMENT_ROOT'].'/../logincreds.php';

//Create an instance of Base class
$f3 = Base::instance();
$validator = new ValidateSushi();
$dataLayer = new DataLayerSushi();
$database = new DataSushi();
$controller = new SushiController($f3);

$f3->set('DEBUG', 3);

//define a default route(home page)
$f3->route('GET /', function() {
    global $controller;
    $controller->home();
});

//define order page
$f3->route('GET|POST /order', function($f3) {
    global $controller;
    $controller->order();
});

//define confirmation page
$f3->route('GET /confirmation', function() {
    global $controller;
    $controller->confirmation();
});

//define login page
$f3->route('GET|POST /admin-login', function() {
    global $controller;
    $controller->login();
});

//define admin page
$f3->route('GET /admin', function() {
    global $controller;
    $controller->admin();
});

//define login page
$f3->route('GET|POST /logout', function() {
    global $controller;
    $controller->logout();
});

//run fat free
$f3->run();