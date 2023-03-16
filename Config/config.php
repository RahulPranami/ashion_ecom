<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

class ECOMM
{
    private $conn;

    function __construct()
    {
        $this->conn =  @new mysqli("localhost", "root", "root", "php_ecommerce") or die("<p>Could not connect to the server!!!</p>" . "<p>Error Code " . mysqli_connect_errno() . " : " . mysqli_connect_error() . "</p>");
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

    // public function checkrole()
    // {
    //     $query = "SELECT role FROM user WHERE email='admin@gmail.com'; ";
    //     $result = $this->conn->query($query);
    //     $numRows = $result->num_rows;

    //     echo $numRows;
    //     if ($numRows == 1) {
    //         $role = $result->fetch_assoc();
    //         echo $role;
    //         return true;
    //     } else {
    //         echo 404;
    //         return false;
    //     }
    // }

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
        }
    }

    public function checkUserLogin()
    {
        if (isset($_SESSION['email'])) {
            if ($_SESSION["email"]) {
                return true;
            }
        } else {
            // header('location: ./login.php');
            return;
        }
    }

    public function getRole()
    {
        if (isset($_SESSION['email'])) {
            // echo "Please <a href=g_login.php>login</a> to use this page ";
            echo "<span> Welcome <strong> $_SESSION[email] </strong> </span>";
            // echo '<br/>';
            echo "<a href='./logout.php' class='signout'>";
            echo "<i class='fa fa-sign-out' aria-hidden='true'></i>";
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

    public function getUsers()
    {
        $query = "SELECT * FROM user WHERE role='user'";
        return $this->conn->query($query);
    }
    public function getUserDetails($id)
    {
        $query = "SELECT * FROM user WHERE id=$id";
        return $this->conn->query($query)->fetch_assoc();
    }

    public function getProducts($id = '')
    {
        $query = "SELECT p.id, p.name, p.categoryId, c.name as cName, p.description, p.price, p.image, p.quantity FROM product as p JOIN category as c ON p.categoryId=c.id";

        if ($id != '') {
            $query .= " WHERE categoryId=$id";
        }

        return $this->conn->query($query);
    }

    public function getCategories()
    {
        $query = "SELECT * FROM category";
        return $this->conn->query($query);
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
        return $this->conn->query($query)->fetch_assoc();
    }

    public function getCategoryName($id)
    {
        $fetch = "SELECT `name` FROM `category` WHERE `id`=$id";

        return $this->conn->query($fetch)->fetch_assoc();
    }

    public function getCategory($id)
    {
        $fetch = "SELECT * FROM `category` WHERE `id`=$id";

        return $this->conn->query($fetch)->fetch_assoc();
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

    // public function placeOrder()
    // {
    public function placeOrder($userId, $fname, $lname, $address, $zip, $phone, $email, $total)
    {
        // $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('1','1','1','1','1','1','1','1','1')";

        // create a query to join the orders table with the order details table
        // $query = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id";

        // insert cart details into the order details table
        // $query = "INSERT INTO order_details (order_id, product_id, quantity, price) VALUES (1, 1, 1, 1)";

        // generate a join query for order and order details
        // $query = "SELECT * FROM orders JOIN order_details ON orders.id = order_details.order_id";
        // create a function for placing order from cart items for ecommerce website using php
        $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `total`) VALUES ('$userId','$fname','$lname','$address','$zip','$phone','$email','$total')";
        // $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('1','1','1','1','1','1','1','1','1')";

        if ($this->conn->query($query)) {

            $lastID = $this->conn->insert_id;

            $cart = $this->getCart();

            while ($cartItem = $cart->fetch_assoc()) {
                $query = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `price`) VALUES ('$lastID','" . $cartItem['product_id'] . "','" . $cartItem['quantity'] . "','" . $cartItem['price'] . "')";
                $this->conn->query($query);
            }
            //   endwhile;
            // for($i = 0; $length = count($foodValues) > $i; $i++){
            //     $stmt->bind_param("is", $lastID, $food);
            //     $food = $foodValues[$i];
            //     $stmt->execute();
            // }

            // $query = "INSERT INTO `order_details`(`order_id`, `product_id`, `quantity`, `price`) VALUES ('1','1','1','1')";


            // echo 201;
            return true;
        } else {
            // echo 400;
            echo $this->conn->error;
            return false;
        }
    }
    // public function placeOrder($user, $fname, $lname, $address, $zip, $phone, $email, $products, $total)
    // {
    //     $product = json_encode($products);

    //     $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('$user','$fname','$lname','$address','$zip','$phone','$email','$product','$total')";

    //     if ($this->conn->query($query)) {
    //         echo 201;
    //         return true;
    //     } else {
    //         // echo 400;
    //         echo $this->conn->error;
    //         return false;
    //     }

    //  INSERT INTO orders (userid, timestamp) SELECT o.userid, o.timestamp FROM users u INNER JOIN orders o ON  o.userid = u.id


    // // Declare the query
    // $sql = "INSERT INTO userTable(name) VALUES(?)";

    // // Prepare and bind
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("s", $name);

    // // Execute the query
    // $stmt->execute();

    // // Fetch last inserted id
    // $lastID = $conn->insert_id;

    // $sql = "INSERT INTO foodTable(userId, food) VALUES(?, ?)";
    // $stmt = $conn->prepare($sql);

    // for($i = 0; $length = count($foodValues) > $i; $i++){
    //     $stmt->bind_param("is", $lastID, $food);
    //     $food = $foodValues[$i];
    //     $stmt->execute();
    // }
    // // Commits the query / queries
    // $conn->commit();

    // // Close connection
    // $stmt->close();
    // $conn->close();

    //     // INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')
    // }

    public function getCart()
    {
        $this->checkUserLogin();
        $userId = $this->getUser()['id'];
        $query = "SELECT * FROM `cart` WHERE userId=$userId";

        return $this->conn->query($query);
    }

    public function getCartTotal()
    {
        $this->checkUserLogin();
        $userId = $this->getUser()['id'];
        $query = "SELECT SUM(`subTotal`) FROM `cart` WHERE userId=$userId";
        return $this->conn->query($query)->fetch_array();
    }

    public function getProductPrice($pid)
    {
        $fetch = "SELECT `price` FROM `product` WHERE `id`=$pid";

        return $this->conn->query($fetch)->fetch_assoc();
    }

    public function addProductToCart($pid, $qty)
    {
        $product = $this->getProductDetails($pid);

        $this->checkUserLogin();
        $userId = $this->getUser()['id'];

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
        $this->checkUserLogin();

        // $query = "SELECT * FROM `cart` WHERE userId=$userId ";
        $userId = $this->getUser()['id'];
        $subtotal = $this->getProductPrice($pid)['price'] * $qty;
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
        // return $this->conn->query($query);

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
        // if (isset($_SESSION['cart'][$pid])) {
        //     unset($_SESSION['cart'][$pid]);
        //     return count($_SESSION['cart']);
        // }
        $this->checkUserLogin();

        $userId = $this->getUser()['id'];
        $query = "DELETE FROM `cart` WHERE userId=$userId";
        // return $this->conn->query($query);

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

            return $this->conn->query($query)->fetch_assoc()['totalItems'];
        }
    }
}
