<?php
/**
 * login.php
 * Jerad Clark
 * 11/30/2020
 * login page
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

//var_dump($_POST);

$err = false;
$username = "";
$adminUsr = 'admin';
$adminPwrd = '@dm1n';
/**
 * editor would not pick up the variables from credentials.php
 * it would throw an error but still know the exact source of the variables
 * so i'm putting it directly in the login page
 */

if($_SERVER['REQUEST_METHOD']=='POST'){


    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);

    require_once 'credentials.php';

    if($username == $adminUsr && $password == $adminPwrd){
        $_SESSION['loggedin'] = true;
        header("location: ../admin.php");
    }
    $err = true;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <style>
        .err{
            color: darkred;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Login Page</h1>
    <form action="#" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username"
<!--            --><?php //echo"value ='$username'">
//            ?>

        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">

        </div>

        <?php
        if($err){
            echo'<span class="err">Incorrect login</span><br>';
        }
        ?>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>
</div>
<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>