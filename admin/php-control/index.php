<?php
    if(!isset($_SESSION['logined'])){
        header('location:login.html');
    }
?>