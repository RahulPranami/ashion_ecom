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

    public function checkrole()
    {
        $query = "SELECT role FROM user WHERE email='admin@gmail.com'; ";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        echo $numRows;
        if ($numRows == 1) {
            $role = $result->fetch_assoc();
            echo $role;
            return true;
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
        if ($_SESSION["email"] == true) {
            return true;
        } else {
            header('location: ../login.php');
            return false;
        }
    }

    public function logout()
    {
        $_SESSION["email"] = "";
        session_destroy();
        echo "Hello From Logout";
        // header('location: /index.php');
        // return true;
    }

    public function redirect($url)
    {
        header("Location: $url");
    }

    public function getRole()
    {
        if (isset($_SESSION['email'])) {
            // echo "Please <a href=g_login.php>login</a> to use this page ";
            echo "<span> Welcome $_SESSION[email] </span>";
            // echo '<br/>';
            echo "<a href='./logout.php' class='signout'>";
            echo "<i class='fa fa-sign-out' aria-hidden='true'></i>";
            echo "</a>";
        } else {
            echo '<a href=./login.php class="px-1">Login</a>';
            echo '<a href="./signup.php" class="px-2">Register</a>';
        }
    }

    public function getUser()
    {
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
        $query = "SELECT * FROM user";
        return $this->conn->query($query);
    }

    public function getProducts()
    {
        // $start_from = ($pn - 1) * $limit;
        $query = "SELECT p.id, p.name, c.name as cName, p.description, p.price FROM product as p JOIN category as c ON p.categoryId=c.id;";

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


    public function addProduct($name)
    {
        $query = "SELECT * FROM category WHERE name='$name';";
        $result = $this->conn->query($query);
        $numRows = $result->num_rows;

        if ($numRows == 1) {
            echo 303;
            return false;
        } else {
            $insert = "INSERT INTO `category`(`name`) VALUES ('$name')";

            if ($this->conn->query($insert)) {
                echo 201;
                return true;
            } else {
                echo 400;
                return false;
            }
        }
    }
}
