<?php $cart = $ecomm->getCart(); ?>

<?php if ($cart->num_rows == 0) : ?>
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="border border-3 border-info"></div>
                        <div class="card bg-white shadow p-5">
                            <div class="text-center">
                                <h3 class="py-2">Cart is Empty !</h3>
                                <p>Add some items to the cart ...</p>
                                <a href="./shop.php" class="btn btn-outline-info">Back To Shop</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php return; ?>
<?php endif; ?>

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($cartItem = $cart->fetch_assoc()) : ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="./assets/images/<?= basename($cartItem['product_image']) ?>" alt="" class="img-thumbnail" style="height: 150px;">
                                        <div class="cart__product__item__title">
                                            <h6><?= $cartItem['product_name'] ?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?= $cartItem['product_price'] ?></td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty" id="<?= $cartItem['product_id'] ?>">
                                            <input type="text" value="<?= $cartItem['qty'] ?>">
                                        </div>
                                    </td>
                                    <td class="cart__total">$ <span> <?= $cartItem['subTotal'] ?> </span> </td>
                                    <td class="cart__close"><span class="icon_close" value="<?= $cartItem['product_id'] ?>"></span></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-between align-items-center">
            <div>
                <a href=" ./shop.php" class="btn btn-outline-secondary">
                    < < Continue Shopping </a>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-2 text-center">
                <div class="py-2 border border-warning border-rounded d-flex justify-content-around bg-light">
                    <h5 class=""> Total :- </h5>
                    <span class="text-secondary">$ <?= $ecomm->getCartTotal()[0] ?? 0 ?></span>
                </div>
            </div>
            <div class="">
                <a href="./checkout.php" class="btn btn-outline-danger">Proceed to checkout > ></a>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->