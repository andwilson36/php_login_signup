<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputSignup($username, $password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput");
        exit();
    }
    if (invalidUid($username) !== false) {
        header("location: ../signup.php?error=invaldUid");
        exit();
    }
    if (passwordMatch($password, $passwordRepeat) !== false) {
        header("location: ../signup.php?error=matchfail");
        exit();
    }
    if (uidExists($connection, $username) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($connection, $username, $password);
} 
else {
    header("location: ../signup.php");
    exit();
}