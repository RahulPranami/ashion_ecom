<!DOCTYPE html>
<html lang="en">
<?php

include_once "./Config/config.php";
$ecomm = new ECOMM();
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <?php include_once "./include_css.php"; ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    <?php include_once "./UI/loader.php"; ?>
    <?php include_once "./UI/offCanvasMenu.php"; ?>

    <?php include_once "./UI/Home/header.php"; ?>

    <?php
    // include_once "./UI/user/login.php";
    include_once "./UI/user/signup.php";
    ?>

    <?php include_once "./UI/footer.php"; ?>
    <?php include_once "./UI/search.php"; ?>

    <?php include_once "./include_js.php"; ?>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"> </script>
    <script src="./script.js"></script>
</body>

</html>