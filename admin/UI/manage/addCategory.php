<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add a Category</h1>
        <a href="./categories.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backspace text-white-50 mr-2"></i> Go Back</a>
    </div>
    <hr>

    <div class="bootstrap snippets bootdey">
        <div class="row">
            <div class="container col-md-12 personal-info">
                <h3 class="text-primary">Category info</h3>

                <form class="form-horizontal" role="form" method="post" id="addCat">
                    <!-- Name input -->
                    <div class="form-group">
                        <label class="col-lg-3 control-label" for="name">Name:</label>
                        <div class="col-lg-8">
                            <input type="text" id="name" class="form-control" name="name" data-error="#nameErr" onkeyup="document.getElementById('nameErr').textContent=''" />
                        </div>
                        <small id="nameErr" class="text-danger ml-3 errorTxt"></small>
                    </div>

                    <button type="submit" class="btn btn-primary ml-4 mb-4" id="add-cat-btn"> Add Category </button>
                </form>
            </div>
        </div>
    </div>
</div>