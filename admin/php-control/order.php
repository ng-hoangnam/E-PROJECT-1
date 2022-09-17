<?php
    include_once('config.php');
    if(!isset($_SESSION['logined'])){
        header('location:login.html');
    }

    $sql_selectorder = "SELECT * FROM orders";
    $result_order = executeResult($sql_selectorder);

?>