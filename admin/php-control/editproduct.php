<?php
    include_once('config.php');
    
    // Check link
    if(!isset($_GET['id'])){
        header('location:./index.html');
    }
    $id_edit = $_GET['id'];
    $sql_selectproduct = "SELECT * FROM products WHERE PRODUCTID = '$id_edit'";
    $result_product = $conn->query($sql_selectproduct);
    $row_product = mysqli_num_rows($result_product);

    // Print product
    if($row_product > 0){
        $product = mysqli_fetch_array($result_product);
    }else{
        header('location:./index.html');
    }

    // Print brand
    $sql_selectbrand = "SELECT * FROM brands";
    $result_brand = executeResult($sql_selectbrand);

    // Push DTB
    if(isset($_POST['apply'])){
        $productname = $_POST['productname'];
        $productquantity = $_POST['productquantity'];
        $productprice = $_POST['productprice'];
        $productstatus = $_POST['productstatus'];
        $productsaleprice = $_POST['productsaleprice'];
        $productbrand = $_POST['productbrand'];
        
    }
?>