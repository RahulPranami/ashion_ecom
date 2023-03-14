<?php $cURL = explode('.', basename($_SERVER['REQUEST_URI']))[0] ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <div class="text-center py-3">
        <a href="../index.php"><img src="img/logo.png" alt=""></a>
    </div>
    <!-- </a> -->

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= ($cURL == "index") ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manage
    </div>

    <!-- Nav Item - Users -->
    <li class="nav-item <?= ($cURL == "profile" || $cURL == "editUser") ? 'active' : ''; ?>">
        <a class="nav-link" href="profile.php">
            <i class="fas fa-user mr-2"></i>
            <span>Profile</span></a>
    </li>

    <!-- Nav Item - Users -->
    <li class="nav-item <?= ($cURL == "users" || $cURL == "addUser" || $cURL == "updateUser") ? 'active' : ''; ?>">
        <a class="nav-link" href="users.php">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($cURL == "products" || $cURL == "addProduct" || $cURL == "editProduct") ? 'active' : ''; ?>">
        <a class="nav-link" href="products.php">
            <i class="fab fa-product-hunt"></i>
            <span>Products</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item <?= ($cURL == "categories" || $cURL == "addCategory" || $cURL == "editCategory") ? 'active' : ''; ?>">
        <a class="nav-link" href="categories.php">
            <i class="fas fa-fw fa-folder"></i>
            <span>Categories</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <!-- <div class="sidebar-card d-none d-flex">
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Log Out</a>
            </div> -->

</ul>
<!-- End of Sidebar -->

<!-- Nav Item - Pages Collapse Menu -->
<!-- <li class="nav-item">
                 <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                     <i class="fas fa-fw fa-folder"></i>
                     <span>Pages</span>
                 </a>
                 <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                         <h6 class="collapse-header">Login Screens:</h6>
                         <a class="collapse-item" href="login.php">Login</a>
                         <a class="collapse-item" href="register.php">Register</a>
                         <a class="collapse-item" href="forgot-password.php">Forgot Password</a>
                         <div class="collapse-divider"></div>
                         <h6 class="collapse-header">Other Pages:</h6>
                         <a class="collapse-item" href="404.php">404 Page</a>
                         <a class="collapse-item" href="blank.php">Blank Page</a>
                     </div>
                 </div>
             </li> -->