<?php 
    include_once('config.php');
    if(!isset($_SESSION['logined'])){
        header('location:login.html');
    }
    // Select all product
    $sql_selectproduct = "SELECT * FROM products JOIN brands ON products.BRANDID = brands.BRANDID ORDER BY PRODUCTID ASC ";
    $result_selectproduct = executeResult($sql_selectproduct);

    // Delete product
    if(isset($_POST['delete'])){
        $id_delete = $_POST['delete'];
        
        $sql_delete = "DELETE FROM products WHERE PRODUCTID = '$id_delete'";
        $conn->query($sql_delete);

        header('location:./product.html');
    }
?>