<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->addCategory($_POST['name']);

// echo "Hello";
