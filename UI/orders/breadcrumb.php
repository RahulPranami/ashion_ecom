<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <!-- <a href="./shop.php"> Shop</a> -->
                    <a href="./orders.php"> Orders </a>
                    <?php if (isset($_GET['orderid'])) : ?>
                        <span> Orders Details </span>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Breadcrumb End -->