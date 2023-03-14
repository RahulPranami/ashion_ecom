<?php
include_once "./config.php";
include_once "./cart.php";

$ecomm = new ECOMM();
$cart = new CART();

if ($_POST['type'] == "add") {
    $cart->addProduct($_POST['productId'], $_POST['qty']);
    // echo "Type is add";
    // print_r($_POST);
}
// echo $cart->totalProduct();

if ($_POST['type'] == "remove") {
    $cart->removeProduct($_POST['productId']);
}

if ($_POST['type'] == "update") {
    $cart->updateProduct($_POST['productId'], $_POST['qty']);
}
