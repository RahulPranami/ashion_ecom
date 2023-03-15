<?php
include_once "./config.php";
// include_once "./cart.php";

$ecomm = new ECOMM();
// $cart = new CART();

if ($_POST['type'] == "add") {
    echo $ecomm->addProductToCart($_POST['productId'], $_POST['qty']);
}

if ($_POST['type'] == "remove") {
    echo $ecomm->removeProductFromCart($_POST['productId']);
}

if ($_POST['type'] == "update") {
    echo $ecomm->updateProductFromCart($_POST['productId'], $_POST['qty']);
}

if ($_POST['type'] == "empty") {
    echo $ecomm->emptyProductFromCart();
}
