<!-- Content Row -->
<div class="row">
    <!-- Total User Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col  mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= $ecomm->getTotalCount('user')['total'] ?? "Error" ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Categories Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col  mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Categories</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ecomm->getTotalCount('category')['total'] ?? "Error" ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Products Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Products</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ecomm->getTotalCount('product')['total'] ?? "Error" ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>