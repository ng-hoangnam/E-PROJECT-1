<?php

// Include File Config Database
include('./php-control/config.php');

//Directional - Get back Log-in Form by Log-out Button
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: index.html');
    exit;
};

$sql = "SELECT * FROM products A JOIN brands B ON A.BRANDID = B.BRANDID";
$product_list = select_list($sql);

if(isset($_POST['addtocart'])) {
    
};
