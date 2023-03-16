<?php $result = $ecomm->getOrders($_SESSION['email']); ?>

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <!-- <div class="mx-auto col-lg-11"> -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="h6 table-responsive">
                    <!-- <div class="shop__cart__table h6 table-responsive"> -->
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <!-- <th scope="col">User Email</th> -->
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">PostCode</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment <br> Method</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <th scope="row"><?= $row['id'] ?></th>
                                    <!-- <td><?= $row['id'] ?></td> -->
                                    <!-- <td><?= $row['userId'] ?></td> -->
                                    <td><?= $row['FirstName'] ?></td>
                                    <td><?= $row['LastName'] ?></td>
                                    <td><?= $row['Address'] ?></td>
                                    <td><?= $row['Postcode'] ?></td>
                                    <td><?= $row['Phone'] ?></td>
                                    <td><?= $row['Email'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $row['paymentMethod'] ?></td>
                                    <td><a href="./orders.php?orderid=<?= $row['id']; ?>"> <button class="btn btn-sm btn-outline-success see-more-btn" id="<?= $row['id'] ?>">See More</button></a></td>
                                    <td><button class="btn btn-sm btn-outline-danger delete-order-btn" id="<?= $row['id'] ?>">Delete</button></td>
                                </tr>
                            <?php endwhile ?>
                            <!-- <?php // while ($cartItem = $cart->fetch_assoc()) : 
                                    ?>
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
                            <?php // endwhile 
                            ?> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shop Cart Section End -->