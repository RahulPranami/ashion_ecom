<?php $categories = $ecomm->getCategories(); ?>
<?php $products = $ecomm->getProducts($_GET['catId'] ?? '', $_GET['page'] ?? 1, 6); ?>

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

                    <?php if ($products->num_rows == 0) : ?>
                        <div class="container py-5">
                            <div class="col-lg-12 d-flex justify-content-center align-items-center">
                                <div class="col-8">
                                    <div class="border border-3 border-secondary"></div>
                                    <div class="card bg-white shadow p-5">
                                        <div class="text-center">
                                            <h3 class="py-2">There are no products in this category !</h3>
                                            <br />
                                            <a href="./shop.php" class="btn btn-outline-secondary">Back To Shop</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php while ($product = $products->fetch_assoc()) : ?>
                        <div class="col-lg-4 col-md-6 <?= $product['cName'] ?>">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="./assets/images/<?= basename($product['image']) ?>">
                                    <div class="label <?= $product['quantity'] == 0 ? "stockout stockblue" : "new" ?> ">
                                        <?= $product['quantity'] == 0 ? "Out Of Stock" : "Available" ?>
                                    </div>
                                    <ul class="product__hover">
                                        <li><a href="#" data-toggle="modal" data-target="#productModal" data-id="<?= $product['id'] ?>" data-productname="<?= $product['name'] ?? "Furry hooded parka" ?>" data-productprice="<?= $product['price'] ?? '59.0' ?>" data-productdesc="<?= $product['description'] ?>" data-setbg="./assets/images/<?= basename($product['image']) ?>" data-availability="<?= $product['quantity'] == 0 ? 0 : 1 ?>"><span class="arrow_expand"></span></a></li>

                                        <li><a href="javascript:void(0);" onclick="addToWishlist('<?= $product['id'] ?>','add')"><span class="icon_heart_alt"></span></a></li>

                                        <li class="addToCart <?= $product['quantity'] == 0 ? "out_of_stock" : "" ?>" id="<?= $product['id'] ?>" qty="<?= $product['quantity'] == 0 ? 0 : 1 ?>"><a href="javascript:void(0);"><span class="icon_bag_alt"></span>
                                                <?php if ($ecomm->isProductInCart($product['id']) == 1) : ?>
                                                    <div class="tip" id="cart_qty">1</div>
                                                <?php endif ?>
                                            </a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#"><?= $product['name'] ?></a></h6>
                                    <div class="rating">
                                        <?php for ($i = 0; $i < 5; $i++) : ?>
                                            <i class="fa <?= $ecomm->getRating($product['id']) > $i ? "fa-star" : "fa-star-o" ?>"></i>
                                        <?php endfor ?>
                                    </div>
                                    <div class="product__price">$ <?= $product['price'] ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile ?>

                    <div class="col-lg-12 text-center">
                        <div class="pagination__option">
                            <?= $ecomm->prPageNos('product', $_GET['page'] ?? 1, 6, $_GET['catId'] ?? '') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->