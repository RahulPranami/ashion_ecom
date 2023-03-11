<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->addProduct($_POST['name']);

// echo "Hello";
