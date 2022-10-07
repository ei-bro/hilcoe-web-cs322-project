<?php

session_start();

if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}

if (isset($_SESSION['username'])) {
	unset($_SESSION['username']);
}
if (isset($_SESSION['errMsg'])) {
	unset($_SESSION['errMsg']);
}

if (isset($_SESSION['succesMsg'])) {
	unset($_SESSION['succesMsg']);
}
if (isset($_SESSION['exists'])) {
	unset($_SESSION['exists']);
}
header("Location: login.php");
die;
