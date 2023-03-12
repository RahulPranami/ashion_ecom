<?php
include_once "./config.php";
include_once "./cart.php";

$ecomm = new ECOMM();
$cart = new CART();

if ($_POST['type'] == "add") {
    $cart->addProduct($_POST['productId']);
    // echo "Type is add";
    // print_r($_POST);
}
// if ($type == "add") {
//     $cart->addProduct($_POST['pid'], $_POST['qty']);
//     # code...
// }

echo $cart->totalProduct();
// $ecomm->addCategory($_POST['name']);
// echo "Hello";
