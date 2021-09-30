<?php 

function emptyInputSignup($username, $password, $passwordRepeat) {
    $result = false;
    if (empty($username) || empty($password) || empty($passwordRepeat)) {
        $result = true;
    } 
    return $result;
}

function invalidUid($username) {
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } 
    return $result;
}

function passwordMatch($password, $passwordRepeat) {
    $result = false;
    if ($password !== $passwordRepeat) {
        $result = true;
    } 
    return $result;
}

function uidExists($connection, $username) {
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $statement = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($statement, "s", $username);
    mysqli_stmt_execute($statement);

    $resultData = mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($statement);
}

function createUser($connection, $username, $password) {
    $sql = "INSERT INTO users (usersUid, usersPassword) VALUES (?, ?);";
    $statement = mysqli_stmt_init($connection);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement, "ss", $username, $hash);
    mysqli_stmt_execute($statement);
    mysqli_stmt_close($statement);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($username, $password) {
    $result = false;
    if (empty($username) || empty($password)) {
        $result = true;
    } 
    return $result;
}

function loginUser($connection, $username, $password) {
    $uidExists = uidExists($connection, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $hash = $uidExists["usersPassword"];
    $checkPassword = password_verify($password, $hash);

    if ($checkPassword === false) {
        header("location: ../login.php?error=wronglogin");
        exit(); 
    }
    else if ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"]; 
        $_SESSION["useruid"] = $uidExists["usersUid"]; 
        header("location: ../index.php");
        exit(); 
    }
}