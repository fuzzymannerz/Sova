<?php
session_start();

if (!$_SESSION["adminlogin"]) {
	header('Location: login.php');
}

session_unset("adminlogin");
session_destroy("adminlogin");
header('Location: index.php');