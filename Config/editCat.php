<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->editCategory($_POST['id'], $_POST['name']);

// echo "Hello";
