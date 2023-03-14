<?php
include_once "./config.php";

$ecomm = new ECOMM();

$ecomm->editProduct($_POST['product'], $_POST['name'], $_POST['categoryId'], $_POST['description'], $_POST['price'], $_POST['stock'], $_FILES['image']['name'], $_FILES['image']['tmp_name']);
