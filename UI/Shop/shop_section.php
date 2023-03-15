<?php $categories = $ecomm->getCategories(); ?>
<?php $products = $ecomm->getProducts($_GET['catId'] ?? ''); ?>

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading active">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="./shop.php">All</a></li>
                                                <?php while ($category = $categories->fetch_assoc()) : ?>
                                                    <li><a href="?catId=<?= $category['id'] ?>"><?= $category['name'] ?></a></li>
                                                <?php endwhile ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    <?php while ($product = $products->fetch_assoc()) : ?>
                        <div class="col-lg-4 col-md-6 <?= $product['cName'] ?>">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/<?= basename($product['image']) ?>">
                                    <div class="label <?= $product['quantity'] == 0 ? "stockout stockblue" : "new" ?> ">
                                        <?= $product['quantity'] == 0 ? "Out Of Stock" : "Available" ?>
                                    </div>
                                    <ul class="product__hover">
                                        <li><a href="#" data-toggle="modal" data-target="#productModal" data-id="<?= $product['id'] ?>" data-productname="<?= $product['name'] ?? "Furry hooded parka" ?>" data-productprice="<?= $product['price'] ?? '59.0' ?>" data-productdesc="<?= $product['description'] ?>" data-setbg="./assets/images/<?= basename($product['image']) ?>"><span class="arrow_expand"></span></a></li>
                                        <li><a href="javascript:void(0);" onclick="addToWishlist('<?= $product['id'] ?>','add')"><span class="icon_heart_alt"></span></a></li>
                                        <li class="disabled <?= $product['quantity'] == 0 ? "out_of_stock" : "" ?>"><a href="javascript:void(0);" onclick="addToCart('<?= $product['id'] ?>','add')"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= $product['name'] ?></a></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price">$ <?= $product['price'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>

                    <div class="col-lg-12 text-center">
                        <div class="pagination__option">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->