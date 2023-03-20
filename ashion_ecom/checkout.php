<!DOCTYPE html>
<html lang="en">

<?php require_once "./Config/config.php";
$ecomm = new ECOMM();
// print_r($_SESSION);
// if ($ecomm->checkUserLogin() == 404) header("location: ./login.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Checkout</title>

    <?php include_once "./include_css.php"; ?>
</head>

<body>
    <?php include_once "./UI/loader.php"; ?>
    <?php include_once "./UI/offCanvasMenu.php"; ?>

    <?php include_once "./UI/header.php"; ?>

    <?php include_once "./UI/Checkout/breadcrumb.php"; ?>
    <?php isset($_GET['buyNow']) ? include_once "./UI/Checkout/buyNow.php" : include_once "./UI/Checkout/Checkout_section.php"; ?>

    <?php include_once "./UI/instagram.php"; ?>
    <?php include_once "./UI/footer.php"; ?>
    <?php include_once "./UI/search.php"; ?>

    <?php include_once "./include_js.php"; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <script src="./script.js"></script>
</body>

</html>