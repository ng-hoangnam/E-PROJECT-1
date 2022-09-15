<?php

// Include File Config Database
include('./php-control/config.php');

$sql = "SELECT * FROM products A JOIN brands B ON A.BRANDID = B.BRANDID";
$product_list = select_list($sql);

if(isset($_POST['addtocart'])) {
    $productid = $_POST['productid'];
    if (!isset($_SESSION['chiclight_cart'])) {
        $_SESSION['chiclight_cart'] = [];
        $addtocart = [$productid];
        $_SESSION['chiclight_cart'][] = $addtocart;
    }else {
        $checkcart = 0;
        for ($i = 0; $i < count($_SESSION['chiclight_cart']); $i++) {
            if ($_SESSION['chiclight_cart'][$i][0] == $productid) {
                $checkcart = 1;
            }
        }
        if ($checkcart == 0) {
            $addtocart = [$productid];
            array_push($_SESSION['chiclight_cart'], $addtocart);
        }
    }
};
?>
