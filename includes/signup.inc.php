<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
} 
else {
    header("location: ../signup.php");
}