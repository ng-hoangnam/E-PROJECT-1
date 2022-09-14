<?php 
    include_once('config.php');

    // Select all product
    $sql_selectproduct = "SELECT * FROM products";
    $result_selectproduct = executeResult($sql_selectproduct);
?>