<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->updateUser($_POST['id'], $_POST['name'], $_POST['email'], $_POST['number'], $_POST['address']);

// echo "Hello";
