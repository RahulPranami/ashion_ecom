<?php $result = $ecomm->getOrders(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <i class="fas fa-plus-square"></i> -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Orders</h1>
        <!-- <a href="./addProduct.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square text-white-50 mr-2"></i>Add a Product</a> -->
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Users Table Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No.</th>
                                <th scope="col">User Email</th>
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
                        <tbody id="tBody">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['userId'] ?></td>
                                    <td><?= $row['FirstName'] ?></td>
                                    <td><?= $row['LastName'] ?></td>
                                    <td><?= $row['Address'] ?></td>
                                    <td><?= $row['Postcode'] ?></td>
                                    <td><?= $row['Phone'] ?></td>
                                    <td><?= $row['Email'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $row['paymentMethod'] ?></td>
                                    <td><a href="./ordersDetails.php?id=<?= $row['id']; ?>"> <button class="btn btn-sm btn-outline-success see-more-btn" id="<?= $row['id'] ?>">See More</button></a></td>
                                    <td><button class="btn btn-sm btn-outline-danger delete-order-btn" id="<?= $row['id'] ?>">Delete</button></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>