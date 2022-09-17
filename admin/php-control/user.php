<?php 
    include_once('config.php');
    if(!isset($_SESSION['logined'])){
        header('location:login.html');
    }

    $sql_selectuser = "SELECT * FROM users";
    $result_user = executeResult($sql_selectuser);
?>