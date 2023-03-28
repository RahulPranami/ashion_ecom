<?php

// declare(strict_types=1);
ini_set('display_errors', 1);
error_reporting(E_ALL);


session_start();

class ECOMM
{
    private $conn;
    // private $db = "php_ecommerce";
    // NOTE: Change DB as Per requirement
    private $db = "ashion_ecom";

    function __construct()
    {
        $this->conn =  @new mysqli("localhost", "root", "root", $this->db) or die("<p>Could not connect to the server!!!</p>" . "<p>Error Code " . mysqli_connect_errno() . " : " . mysqli_connect_error() . "</p>");
    }

    public function login($email, $passwd)
    {
        $query = "SELECT * FROM user WHERE email='$email';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            $user = $result->fetch_assoc();
            if ($passwd == $user['password']) {
                // session_start();
                $_SESSION["email"] = $user['email'];

                if ($user['role'] == 'admin') {
                    echo 'admin';
                    // return;
                } else if ($user['role'] == 'user') {
                    echo 'user';
                    // return;
                }
                // echo 200;
                return true;
            } else {
                echo 403;
                return false;
            }
        } else {
            echo 404;
            return false;
        }
    }

    public function signup($name, $email, $contactNumber, $address, $passwd)
    {
        $query = "SELECT * FROM user WHERE email='$email';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            echo 303;
            return false;
        } else {
            $insert = "INSERT INTO `user`(`name`, `contactNumber`, `email`,`address`, `password`) VALUES ('$name','$contactNumber','$email', '$address','$passwd')";

            if ($this->conn->query($insert)) {
                echo 201;
                return true;
            } else {
                echo 400;
                return false;
            }
        }
    }

    public function updateUser($id, $name, $email, $contactNumber, $address)
    {
        $update = "UPDATE `user` SET `name`='$name',`contactNumber`='$contactNumber',`email`='$email',`address`='$address' WHERE `id`=$id";

        if ($this->conn->query($update)) {
            echo 201;
            return true;
        } else {
            echo 400;
            return false;
        }
    }

    public function checklogin()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION["email"]) {
                return true;
            } else {
                header('location: ../login.php');
                return false;
            }
        } else {
            header('location: ../login.php');
            return false;
        }
    }

    public function checkRole()
    {
        if (isset($_SESSION['email']))
            if ($_SESSION["email"])
                if ($this->getRole()['role'] == 'admin')
                    return true;
                else
                    header('location: ../index.php');
    }

    public function checkUserLogin()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION["email"]) {
                return true;
            }
        } else {
            // header('location: ./login.php');
            // echo 404;
            // return;
            return 404;
        }
    }

    public function getRole()
    {
        if (isset($_SESSION['email'])) {
            // echo "Please <a href=g_login.php>login</a> to use this page ";
            echo "<span> Welcome <strong> $_SESSION[email] </strong> </span>";
            // echo '<br/>';
            // echo "<a href='./user.php' class='signout'>";
            // echo '<i class="fa fa-fw fa-user" aria-hidden="true"></i>';
            // echo "</a>";
            echo "<a href='./logout.php' class='signout'>";
            echo "<i class='fa fa-fw fa-sign-out' aria-hidden='true'></i>";
            echo "</a>";
        } else {
            echo '<a href="./login.php" class="px-1">Login</a>';
            echo '<a href="./signup.php" class="px-2">Register</a>';
        }
    }

    public function getUser()
    {
        if (isset($_SESSION['email'])) {
            $email = $_SESSION["email"];

            $query = "SELECT * FROM user WHERE email='$email';";
            $result = $this->conn->query($query);
            $numRows = $result->num_rows;

            if ($numRows == 1) {
                return $result->fetch_assoc();
            } else {
                echo 404;
                return false;
            }
        }
    }

    public function getTotalCount($tbl)
    {
        $query = "SELECT COUNT(*) as total FROM $tbl;";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            return $result->fetch_assoc();
        } else {
            echo 404;
            return false;
        }
    }

    public function getUsers($pn = '', $limit = 5)
    {
        $query = "SELECT * FROM user WHERE role='user'";
        if ($pn != '') {
            $query .= " LIMIT " . ($pn - 1) * $limit . ", $limit";
        }

        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function getUserDetails($id)
    {
        $query = "SELECT * FROM user WHERE id=$id";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function getProducts($id = '', $pn = '', $limit = 5, $ordBy = '')
    {
        $query = "SELECT p.id, p.name, p.categoryId, c.name as cName, p.description, p.price, p.image, p.quantity, p.views FROM product as p JOIN category as c ON p.categoryId=c.id";

        if ($id != '') {
            $query .= " WHERE categoryId=$id";
        }
        if ($ordBy != '') {
            $query .= " ORDER BY views DESC ";
        }
        if ($pn != '') {
            $query .= " LIMIT " . ($pn - 1) * $limit . ", $limit";
        }

        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function getCategories($pn = '', $limit = 5)
    {
        // $query = "SELECT * FROM category";

        $query = "SELECT category.id , category.name, COUNT(product.categoryId) AS prCount  FROM `category` LEFT JOIN product ON product.categoryId=category.id GROUP BY category.id ";
        // $query = "select c.*, count(p.categoryId) as total_products from category c left join product p on p.categoryId = c.id group by c.id;";
        if ($pn != '') {
            $query .= " LIMIT " . ($pn - 1) * $limit . ", $limit";
        }

        // return $query;
        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function addCategory($name)
    {
        $query = "SELECT * FROM category WHERE name='$name';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            echo 303;
            return false;
        } else {
            $query = "INSERT INTO `category` (`name`) VALUES ('$name')";

            if ($this->conn->query($query)) {
                echo 201;
                return true;
            } else {
                echo 400;
                return false;
            }
        }
    }

    public function editCategory($id, $name)
    {
        $update = "UPDATE `category` SET `name`='$name' WHERE id=$id";

        if ($this->conn->query($update)) {
            echo 201;
            return true;
        } else {
            echo 400;
            // echo $this->conn->error;
            return false;
        }
    }

    public function addProduct($name, $categoryId, $desc, $price, $stock, $imgName, $imgTName)
    {
        $file = "../assets/images/" . $imgName;
        move_uploaded_file($imgTName, $file);

        $query = "INSERT INTO `product` (`name`,`categoryId`,`description`,`price`, `quantity`,`image`) VALUES ('$name','$categoryId','$desc','$price','$stock' ,'$file')";

        if ($this->conn->query($query)) {
            echo 201;
            return true;
        } else {
            // echo 400;
            echo $this->conn->error;
            return false;
        }
    }

    public function editProduct($id, $name, $categoryId, $desc, $price, $stock, $imgName, $imgTName)
    {
        if ($imgTName != '') {
            $file = "../assets/images/" . $imgName;
            move_uploaded_file($imgTName, $file);
            $query = "UPDATE `product` SET `name`='$name',`categoryId`='$categoryId',`image`='$file',`description`='$desc',`price`='$price' ,`quantity`='$stock' WHERE id='$id'";
        } else {
            $query = "UPDATE `product` SET `name`='$name',`categoryId`='$categoryId',`description`='$desc',`price`='$price',`quantity`='$stock' WHERE id='$id'";
        }

        if ($this->conn->query($query)) {
            echo 201;
            return true;
        } else {
            echo 400;
            return false;
        }
    }

    public function getProductDetails($id)
    {
        $query = "SELECT * FROM product WHERE `id`='$id';";
        return $this->conn->query($query)->fetch_assoc() ?? $this->conn->error;;
    }

    public function setProductViews($pid)
    {
        $query = "UPDATE `product` SET `views`=`views` + 1 WHERE `id`=$pid";
        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function getRating($pid)
    {
        // $query = "SELECT round( AVG(views)* 5 ) as rating  FROM `product`;";
        // $query = "SELECT views*100 /(SELECT SUM(views) as v from product) from product;";

        // for getting into a 5 floating point number
        // $query = "SELECT views*5 / (SELECT SUM(views) as v from product) from product;";

        // for getting into a 5 real number 
        $query = "SELECT ROUND(views*5/(SELECT SUM(views) AS v FROM product)) AS star FROM product WHERE `id`='$pid'";

        return $this->conn->query($query)->fetch_assoc()['star'] ?? $this->conn->error;
    }

    public function getCategoryName($id)
    {
        $fetch = "SELECT `name` FROM `category` WHERE `id`=$id";

        return $this->conn->query($fetch)->fetch_assoc() ?? $this->conn->error;;
    }

    public function getCategory($id)
    {
        $fetch = "SELECT * FROM `category` WHERE `id`=$id";

        return $this->conn->query($fetch)->fetch_assoc() ?? $this->conn->error;;
    }

    public function deleteData($id, $tbl)
    {
        if ($this->conn->query("DELETE FROM `$tbl` WHERE id='$id'")) {
            return 200;
        } else if ($this->conn->errno == 1451) {
            return 1451;
        } else {
            return $this->conn->error;
        }
    }

    public function getCart()
    {
        $userId = $this->getUser()['id'];
        $query = "SELECT * FROM `cart` WHERE userId=$userId";

        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function getCartTotal()
    {
        $userId = $this->getUser()['id'];
        $query = "SELECT SUM(`subTotal`) FROM `cart` WHERE userId=$userId";
        return $this->conn->query($query)->fetch_array() ?? $this->conn->error;;
    }

    public function addProductToCart($pid, $qty)
    {
        $product = $this->getProductDetails($pid);

        $userId = $this->getUser()['id'];

        // return $product['quantity'];
        if ($qty > $product['quantity']) {
            return 429;
        }

        $productId = $product['id'];
        $productName = $product['name'];
        $productPrice = $product['price'];
        $productImage = $product['image'];

        $subtotal = $productPrice * $qty;

        $query =  "INSERT INTO `cart`(`userId`, `product_id`, `product_price`,`qty`,`product_name`,`product_image`, `subTotal`) VALUES ('$userId','$productId','$productPrice','$qty','$productName','$productImage','$subtotal')";

        if ($this->conn->query($query)) {
            return 200;
        } else {
            return $this->conn->errno;
        }
    }

    public function updateProductFromCart($pid, $qty)
    {
        // $this->checkUserLogin();

        $product = $this->getProductDetails($pid);
        // $query = "SELECT * FROM `cart` WHERE userId=$userId ";
        $userId = $this->getUser()['id'];

        if ($qty > $product['quantity']) {
            return 429;
        }

        $subtotal = $product['price'] * $qty;
        // $query = "SELECT * FROM (SELECT * FROM `cart` WHERE userId=$userId) AS userCart WHERE product_id=$pid;";
        // $query = "SELECT * FROM `cart` WHERE userId=$userId && product_id=$pid;";

        $query = "UPDATE `cart` SET `qty`='$qty',`subTotal`='$subtotal' WHERE userId=$userId && product_id=$pid;";

        if ($this->conn->query($query)) {
            return 200;
        } else {
            return $this->conn->errno;
        }
    }

    public function removeProductFromCart($pid)
    {
        $this->checkUserLogin();

        $userId = $this->getUser()['id'];
        $query = "DELETE FROM `cart` WHERE userId=$userId && product_id=$pid;";
        // return $this->conn->query($query) ?? $this->conn->error;

        if ($this->conn->query($query)) {
            return 200;
        } else if ($this->conn->errno == 1451) {
            return 1451;
        } else {
            return $this->conn->error;
        }
    }

    public function emptyProductFromCart()
    {
        $this->checkUserLogin();

        $userId = $this->getUser()['id'];
        $query = "DELETE FROM `cart` WHERE userId=$userId";
        // return $this->conn->query($query) ?? $this->conn->error;

        if ($this->conn->query($query)) {
            return 200;
        } else if ($this->conn->errno == 1451) {
            return 1451;
        } else {
            return $this->conn->error;
        }
    }

    public function totalProduct()
    {
        if (isset($_SESSION['email'])) {
            // $this->checkUserLogin();
            $userId = $this->getUser()['id'];
            $query = "SELECT COUNT(`product_id`) as totalItems FROM `cart` WHERE userId=$userId";

            return $this->conn->query($query)->fetch_assoc()['totalItems'] ?? $this->conn->error;;
        }
    }

    public function placeOrder($userId, $fname, $lname, $address, $zip, $phone, $email, $total, $paymentMethod, $type = '')
    {
        $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `total`,`paymentMethod`) VALUES ('$userId','$fname','$lname','$address','$zip','$phone','$email','$total','$paymentMethod')";

        if ($this->conn->query($query)) {

            $lastID = $this->conn->insert_id;

            if ($type == "buyNow") {
                $pid = $_SESSION['cart']['pid'];

                $product = $this->getProductDetails($pid);

                $price = $product['price'];
                // $total = $product['price'];
                $qty = 1;

                $query = "INSERT INTO `order_details`(`order_id`, `product_id`, `product_qty`, `product_price`, `subTotal`) VALUES ('$lastID','$pid',$qty,'$price','$price')";
                // return 101;

                if ($this->conn->query($query)) {
                    $this->updateStock($pid, $qty);
                } else {
                    return $this->conn->error;
                }

                // $this->emptyProductFromCart();
                return 201;
            } else {

                $cart = $this->getCart();

                while ($cartItem = $cart->fetch_assoc()) :
                    $price = $cartItem['product_price'];
                    // $uid = $cartItem['userId'];
                    $pid = $cartItem['product_id'];
                    // $pname = $cartItem['product_name'];
                    $pqty = $cartItem['qty'];
                    $ptotal = $cartItem['subTotal'];

                    // $query .= "('$lastID','$pid','$pqty','$price','$ptotal')";
                    $query = "INSERT INTO `order_details`(`order_id`, `product_id`, `product_qty`, `product_price`, `subTotal`) VALUES ('$lastID','$pid','$pqty','$price','$ptotal')";

                    if ($this->conn->query($query)) {
                        $this->updateStock($pid, $pqty);
                    } else {
                        return $this->conn->error;
                    }
                endwhile;

                $this->emptyProductFromCart();
                return 201;
            }
            // return;
        } else {
            return $this->conn->error;
        }
    }

    public function updateStock($pid, $qty)
    {
        $currentStockQuery = "SELECT `quantity` FROM `product` WHERE `id`=$pid";
        $cStock = $this->conn->query($currentStockQuery)->fetch_assoc()['quantity'];

        // $newStock = $cStock - $qty;

        // $query = "UPDATE `product` SET `quantity`='$newStock' WHERE `id`=$pid";
        $query = "UPDATE `product` SET `quantity`=`quantity` - $qty WHERE `id`=$pid";

        if ($this->conn->query($query)) {
        } else {
            return $this->conn->error;
        }
    }

    public function getOrders($id = '', $pn = '', $limit = 5)
    {
        // $query = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id";
        $query = "SELECT * FROM orders";
        if ($id != '') {
            $query .= " WHERE `userId`='$id'";
        }

        if ($pn != '')
            $query .= " LIMIT " . ($pn - 1) * $limit . ", $limit";

        // return $query;
        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function getOrderDetails($id = '', $pn = '', $limit = 5)
    {
        // $query = "SELECT * FROM order_details JOIN product ON order_details.product_id = product.id";

        $query = "SELECT od.id, od.order_id, p.name as product_name, p.image, od.product_qty, od.product_price, od.subTotal FROM order_details as od JOIN product as p ON od.product_id = p.id ";
        if ($id != '')
            $query .= " WHERE order_id=$id";

        if ($pn != '')
            $query .= " LIMIT " . ($pn - 1) * $limit . ", $limit";
        // return $query;
        return $this->conn->query($query) ?? $this->conn->error;
    }

    public function pages($tbl, $pn, $limit = 5)
    {
        $total_pages = ceil($this->conn->query("SELECT COUNT(*) FROM $tbl")->fetch_row()[0] / $limit);
        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<li class='active page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li class='page-item'><a class='page-link' href='?page=" . $i . "'>" . $i . "</a></li>";
            }
        };
        return $pagLink;
    }

    public function prPageNos($tbl, $pn, $limit = 5)
    {
        $total_pages = ceil($this->conn->query("SELECT COUNT(*) FROM $tbl")->fetch_row()[0] / $limit);

        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<a class='activeLink' href='?page=" . $i . "'>" . $i . "</a>";
            } else {
                $pagLink .= "<a class='' href='?page=" . $i . "'>" . $i . "</a>";
            }
        };
        return $pagLink;
    }

    public function orderDetailsPageNos($id, $pn, $limit = 5)
    {
        $total_pages = ceil($this->conn->query("SELECT COUNT(*) FROM `order_details` WHERE order_id=$id")->fetch_row()[0] / $limit);

        $pagLink = "";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $pn) {
                $pagLink .= "<li class='active page-item'><a class='page-link' href='?id=" . $id . "&page=" . $i . "'>" . $i . "</a></li>";
            } else {
                $pagLink .= "<li class='page-item'><a class='page-link' href='?id=" . $id . "&page=" . $i . "'>" . $i . "</a></li>";
            }
        };
        return $pagLink;
    }
}
