<?php

$serverName = "localhost";
$dBuserName = "root";
$dBPassword = "";
$dBName = "phpwebsite";

$connection = mysqli_connect($serverName, $dBuserName, $dBPassword, $dBName);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}