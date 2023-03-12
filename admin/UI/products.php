<?php $result = $ecomm->getProducts(); ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <i class="fas fa-plus-square"></i> -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a href="./addProduct.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-square text-white-50 mr-2"></i>Add a Product</a>
    </div>
    <hr>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <!-- Users Table Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-sm table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="tBody">
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['cName'] ?></td>
                                    <td> <img style="height: 75px;" src="<?= $row['image'] ?>" class="img-fluid img-thumbnail" alt="Not Found"> </td>
                                    <td><?= $row['description'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><a href="./editProduct.php?id=<?= $row['id']; ?>"> <button class="btn btn-sm btn-outline-success">Edit</button> </a> </td>
                                    <td><button name="btnDel" class="btn btn-sm btn-outline-danger" onclick="deleteData('<?= $row['id'] ?>')">Delete</button></td>
                                </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>