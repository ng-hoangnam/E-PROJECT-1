<?php 
    include_once('config.php');
    if(!isset($_GET['id']) && $_GET['id'] == ""){
        header('location:product.html');
        exit();
    }

    $id_productdetail = $_GET['id'];
    $sql_selectproduct = "SELECT * FROM products WHERE PRODUCTID = '$id_productdetail'";
    $result = mysqli_fetch_array($connect->query($sql_selectproduct));
?>