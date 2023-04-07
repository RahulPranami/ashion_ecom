<?php $products = $ecomm->getProducts('', '', '', 1); ?>
<?php $categories = $ecomm->getCategories(); ?>

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New product</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active mixitup-control-active" data-filter="*">All</li>
                    <?php while ($category = $categories->fetch_assoc()) : ?>
                        <li data-filter=".<?= $category['name'] ?>"><?= $category['name'] ?></li>
                    <?php endwhile ?>
                </ul>
            </div>
        </div>
        <div class="row property__gallery">
            <?php while ($product = $products->fetch_assoc()) : ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $product['cName'] ?>">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="./assets/images/<?= basename($product['image']) ?>">
                            <div class="label <?= $product['quantity'] <= 0 ? "stockout stockblue" : "new" ?> ">
                                <?= $product['quantity'] <= 0 ? "Out Of Stock" : "Available" ?>
                            </div>
                            <ul class="product__hover">
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#productModal" data-id="<?= $product['id'] ?>" data-productname="<?= $product['name'] ?? "Furry hooded parka" ?>" data-productprice="<?= $product['price'] ?? '59.0' ?>" data-productdesc="<?= $product['description'] ?>" data-setbg="./assets/images/<?= basename($product['image']) ?>" data-availability="<?= $product['quantity'] == 0 ? 0 : 1 ?>"><span class="arrow_expand"></span></a></li>

                                <li><a href="javascript:void(0);" onclick="addToWishlist('<?= $product['id'] ?>','add')"><span class="icon_heart_alt"></span></a></li>

                                <li class="addToCart <?= $product['quantity'] <= 0 ? "out_of_stock" : "" ?>" id="<?= $product['id'] ?>" qty="<?= $product['quantity'] <= 0 ? 0 : 1 ?>"><a href="javascript:void(0);"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?= $product['name'] ?></a></h6>
                            <div class="rating">
                                <?php for ($i = 0; $i < 5; $i++) : ?>
                                    <i class="fa <?= $ecomm->getRating($product['id']) > $i ? "fa-star" : "fa-star-o" ?>"></i>
                                <?php endfor ?>
                                <span class="small pl-2">( <?= $product['views'] ?> )</span>
                            </div>
                            <div class="product__price">$ <?= $product['price'] ?></div>
                        </div>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>
</section>
<!-- Product Section End -->