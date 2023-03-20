<?php
include_once "./config.php";

$ecomm = new ECOMM();

// if ($_POST['type'] == "buyNow") {
echo $ecomm->placeOrder($_SESSION['email'], $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['zip'], $_POST['phone'], $_POST['email'], $_POST['total'], $_POST['paymentMethod'], $_POST['type'] ?? '');
// } else {
    // echo $ecomm->placeOrder($_SESSION['email'], $_POST['fname'], $_POST['lname'], $_POST['address'], $_POST['zip'], $_POST['phone'], $_POST['email'], $_POST['total'], $_POST['paymentMethod']);
// }
