<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// session_start();

class CART
{
    public function addProduct($pid, $qty)
    {
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }
    public function updateProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;

            $price = $_SESSION['cart'][$pid]['price'];
            // $_SESSION['cart'][$pid]
            $_SESSION['cart'][$pid]['subTotal'] = $price * $qty;
        }
    }
    public function removeProduct($pid)
    {
        if (isset($_SESSION['cart'][$pid])) {
            unset($_SESSION['cart'][$pid]);
        }
    }
    public function emptyProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            unset($_SESSION['cart'][$pid]);
        }
    }
    public function totalProduct()
    {
        // $total = 0;
        // foreach ($_SESSION['cart'] as $pid => $product) {
        //     $total += $product['qty'];
        // }
        // return $total;
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']);
        } else {
            return;
        }
    }
    // public function placeOrder($user, $fname, $lname, $address, $zip, $phone, $email, $products, $total)
    // {
    //     $query = "INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('$user','$fname','$lname','$address','$zip','$phone','$email','$products','$total')";
    //     // print_r($products);

    //     // echo $query;

    //     if ($this->conn->query($query)) {
    //         echo 201;
    //         return true;
    //     } else {
    //         echo 400;
    //         return false;
    //     }

    //     // INSERT INTO `orders`(`userId`, `FirstName`, `LastName`, `Address`, `Postcode`, `Phone`, `Email`, `products`, `total`) VALUES ('[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]')

    // }
}
