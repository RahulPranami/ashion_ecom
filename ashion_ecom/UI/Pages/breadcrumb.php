<?php $product = $ecomm->getProductDetails($_GET['pid']); ?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.php"> Shop</a>
                    <a href="./shop.php?catId=<?= $product['categoryId'] ?>"> <?= $ecomm->getCategoryName($product['categoryId'])['name'] ?> </a>
                    <!-- <a href="#">Women’s </a> -->
                    <span><?= $product['name'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->