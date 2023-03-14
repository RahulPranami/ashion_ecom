<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->updateCategory($_POST['id'],$_POST['name']);

// echo "Hello";
