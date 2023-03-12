<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// session_start();

class CART
{
    public function addProduct($pid, $qty = 1)
    {
        $_SESSION['cart'][$pid]['qty'] = $qty;
    }
    public function updateProduct($pid, $qty)
    {
        if (isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] = $qty;
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
            return 0;
        }
    }
}
