<?php
include_once "./config.php";

$ecomm = new ECOMM();

// print_r($_POST);

// if (isset($_POST['product'])) {
//     echo $ecomm->deleteData($_POST['id'], $_POST['tbl']);
// }
// if (isset($_POST['user'])) {
//     echo $ecomm->deleteData($_POST['id'], $_POST['tbl']);
// }
// if (isset($_POST['cat'])) {
//     echo $ecomm->deleteData($_POST['id'], $_POST['tbl']);
// }

echo $ecomm->deleteData($_POST['id'], $_POST['tbl']);
