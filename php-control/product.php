<?php
// Include File Config Database
include('./php-control/config.php');

$sql = "SELECT * FROM products A JOIN brands B ON A.BRANDID = B.BRANDID";
$product_list = select_list($sql);

if(isset($_POST['addtocart'])) {
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [] ;
        
        $product_name = $_POST['productname'] ;
        $product_id = $_POST['productid'];
        $product_quantity = $_POST['productquantity'];
        if($_POST['productsaleprice'] != NULL){
            $product_price = $_POST['productsaleprice'];
        }else{
            $product_price = $_POST['productprice'];
        }
        $product_img = $_POST['productimg'];

        $addtocart = [$product_id , $product_quantity , $product_price , $product_img , $product_name ];

        $_SESSION['cart'][] = $addtocart;

        header('location:product.html');
    }else{
        $product_name = $_POST['productname'] ;
        $product_id = $_POST['productid'];
        $product_quantity = $_POST['productquantity'];
        if($_POST['productsaleprice'] != NULL){
            $product_price = $_POST['productsaleprice'];
        }else{
            $product_price = $_POST['productprice'];
        }
        $product_img = $_POST['productimg'];

        $checkcart = 0 ;

        for($i = 0 ; $i < count($_SESSION['cart']) ; $i++){
            if($_SESSION['cart'][$i][0] == $product_id){
                $checkcart = 1;
                $product_quantity_new = $product_quantity = $_POST['productquantity'] + $_SESSION['cart'][$i][1] ;
                $_SESSION['cart'][$i][1] = $product_quantity_new ;
            }
        }

        if ($checkcart == 0) {
            $addtocart = [$product_id , $product_quantity , $product_price , $product_img , $product_name ];
            array_push($_SESSION['cart'], $addtocart);
        }
        header('location:product.html');
    }
};
?>
