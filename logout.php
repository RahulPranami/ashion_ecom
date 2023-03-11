<?php
include_once "./Config/config.php";

$ecomm = new ECOMM();

$_SESSION["email"] = "";
session_destroy();
echo "Hello From Logout";

header('location: ./index.php');
// return true;
