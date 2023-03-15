<?php
include_once "./config.php";
// include_once "./cart.php";

$ecomm = new ECOMM();
// $cart = new CART();

// print_r(json_encode($_POST['products']));
// print_r(json_decode(json_encode($_POST['products'])));
// print_r($_POST);

$ecomm->placeOrder($_SESSION['email'], $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['zip'], $_POST['phone'], $_POST['email'], $_POST['products'], $_POST['total']);
