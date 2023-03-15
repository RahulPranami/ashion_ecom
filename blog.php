<!DOCTYPE html>
<html lang="zxx">

<?php
require_once "./Config/config.php";
// require_once "./Config/cart.php";

$ecomm = new ECOMM();
// $cart = new CART();
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <?php include_once "./include_css.php"; ?>
</head>

<body>
    <?php include_once "./UI/loader.php"; ?>
    <?php include_once "./UI/offCanvasMenu.php"; ?>

    <?php // include_once "./UI/Blog/header.php"; 
    ?>
    <?php include_once "./UI/header.php"; ?>

    <?php include_once "./UI/Blog/blog_breadcrumb.php"; ?>
    <?php include_once "./UI/Blog/blog_section.php"; ?>

    <?php include_once "./UI/instagram.php"; ?>
    <?php include_once "./UI/footer.php"; ?>
    <?php include_once "./UI/search.php"; ?>

    <?php include_once "./include_js.php"; ?>
</body>

</html>