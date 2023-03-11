<?php
include_once "./config.php";

$ecomm = new ECOMM();
$ecomm->login($_POST['email'], $_POST['password']);
