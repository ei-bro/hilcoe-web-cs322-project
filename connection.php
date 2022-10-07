<?php

$dbhost = "localhost";
$dbuser = "productStoreManager";
$dbpass = "123456789";
$dbname = "productStore";

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {

    die("failed to connect!");
};
