<!DOCTYPE html>
<html lang="en">

<?php require_once "./Config/config.php";
$ecomm = new ECOMM();
// if ($ecomm->checkUserLogin() == 404) header("location: ./login.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Orders</title>

    <?php include_once "./include_css.php"; ?>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php include_once "./UI/loader.php"; ?>
    <?php include_once "./UI/offCanvasMenu.php"; ?>

    <?php include_once "./UI/header.php"; ?>

    <?php include_once "./UI/orders/breadcrumb.php"; ?>

    <?php isset($_GET['id']) ? include_once "./UI/orders/orderDetails.php" : include_once "./UI/orders/orders.php"; ?>

    <?php include_once "./UI/instagram.php"; ?>
    <?php include_once "./UI/footer.php"; ?>
    <?php include_once "./UI/search.php"; ?>

    <?php include_once "./include_js.php"; ?>
    <script src="./script.js"></script>

</body>

</html>