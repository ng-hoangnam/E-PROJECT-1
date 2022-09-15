<?php

// Include File Config Database
include('./php-control/config.php');

$sql = "SELECT * FROM products A JOIN brands B ON A.BRANDID = B.BRANDID";
$product_list = select_list($sql);

if(isset($_POST['addtocart'])) {
    $index = $_GET['id'];

};
?>
