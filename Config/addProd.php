<?php
include_once "./config.php";

$ecomm = new ECOMM();

// print_r($_FILES);
$ecomm->addProduct($_POST['name'], $_POST['categoryId'], $_POST['description'], $_POST['price'], $_POST['stock'], $_FILES['image']['name'], $_FILES['image']['tmp_name']);
