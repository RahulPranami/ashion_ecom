<!DOCTYPE html>
<html lang="en">

<?php require_once "./Config/config.php";
$ecomm = new ECOMM(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Home</title>

    <?php include_once "./include_css.php"; ?>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include_once "./UI/loader.php"; ?>
    <?php include_once "./UI/offCanvasMenu.php"; ?>

    <?php include_once "./UI/header.php"; ?>

    <?php include_once "./UI/Home/categories.php"; ?>
    <?php include_once "./UI/Home/products.php"; ?>
    <?php include_once "./UI/Home/banner.php"; ?>
    <?php include_once "./UI/Home/trend.php"; ?>
    <?php include_once "./UI/Home/discount.php"; ?>
    <?php include_once "./UI/Home/services.php"; ?>

    <?php include_once "./UI/instagram.php"; ?>
    <?php include_once "./UI/footer.php"; ?>
    <?php include_once "./UI/search.php"; ?>
    <?php include_once "./UI/product_modal.php"; ?>

    <?php include_once "./include_js.php"; ?>
    <script src="./script.js"></script>
</body>

</html>