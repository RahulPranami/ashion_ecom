<?php
include_once "./config.php";

$ecomm = new ECOMM();

echo $ecomm->deleteData($_POST['id'], $_POST['tbl']);
