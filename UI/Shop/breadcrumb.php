<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <?php if (isset($_GET['catId'])) : ?>
                        <a href="./shop.php"> Shop</a>
                        <span><?= $ecomm->getCategoryName($_GET['catId'])['name'] ?? "" ?></span>
                    <?php else : ?>
                        <span>Shop</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->