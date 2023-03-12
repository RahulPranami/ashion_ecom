<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a Product</h1>
        <a href="./products.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backspace text-white-50 mr-2"></i> Go Back</a>
    </div>
    <hr>

    <div class="bootstrap snippets bootdey">
        <div class="row">
            <div class="container col-md-12 personal-info">
                <h3 class="text-primary">Product info</h3>

                <!-- <form> -->
                <form class="form-horizontal" role="form" id="addProd" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name">Product Name:</label>
                        <div class="col-lg-8">
                            <input type="text" id="name" class="form-control" name="name" data-error="#nameErr" onkeyup="document.getElementById('nameErr').textContent=''" />
                        </div>
                        <small id="nameErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="col-lg-3 control-label" for="name">Product Category:</label>
                        <!-- <label class="form-label" for="categoryId">Product Category</label> -->
                        <div class="col-lg-8">
                            <?php $result = $ecomm->getCategories(); ?>
                            <select name="categoryId" id="categoryId" class="form-control" data-error="#catErr">
                                <option value="">Not Selected</option>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                <?php endwhile ?>
                            </select>
                        </div>
                        <small id="catErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="col-lg-3 control-label" for="name">Product Description:</label>
                        <div class="col-lg-8">
                            <input type="text" id="description" name="description" class="form-control" />
                        </div>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="col-lg-3 control-label" for="name">Product Image:</label>
                        <div class="col-lg-8">
                            <input type="file" class="form-control-file" name="image" id="image" placeholder="Your Image" />
                        </div>
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label col-lg-3" for="price">Product Price:</label>
                        <div class="col-lg-8">
                            <input type="text" id="price" name="price" class="form-control" />
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary ml-4 mb-4" id="add-prod-btn"> Add Product </button>
                </form>
            </div>
        </div>
    </div>
</div>