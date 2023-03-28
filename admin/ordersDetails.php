<?php
include_once "../Config/config.php";

$ecomm = new ECOMM();
$ecomm->checklogin();
$ecomm->checkRole();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin - Orders</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php include './UI/sidebar.php'; ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include './UI/navbar.php'; ?>
                <?php include './UI/ordersDetails.php'; ?>
            </div>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <?php include './UI/scroll_to_top.php'; ?>
    <?php include './UI/logout_modal.php'; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="./js/jquery.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="./js/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="./js/sb-admin-2.min.js"></script>
    <script src="./script.js"></script>
</body>

</html>