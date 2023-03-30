<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->signup($_POST['name'], $_POST['email'], $_POST['number'], $_POST['address'], $_POST['password']);
