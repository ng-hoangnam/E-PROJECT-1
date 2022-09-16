<?php
    include('./php-control/config.php');

    if(isset($_POST['delete'])){
        $id_delete = $_POST['id'];

        for($i=0 ; $i < count($_SESSION['cart']) ; $i++){
            if($_SESSION['cart'][$i][0] == $id_delete){
                array_splice($_SESSION['cart'] ,$i,1);
           }
        }

        if(count($_SESSION['cart']) == 0){
            unset($_SESSION['cart']);
        }

        header('location:cart.html');
    }

    if(isset($_GET['up'])){
        for($i=0 ; $i < count($_SESSION['cart']) ; $i++){
            if($_SESSION['cart'][$i][0] == $_GET['up']){
                $_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] + 1 ;
           }
        }
        header('location:cart.html');
    }

    if(isset($_GET['down'])){
        for($i=0 ; $i < count($_SESSION['cart']) ; $i++){
            if($_SESSION['cart'][$i][0] == $_GET['down']){
                if($_SESSION['cart'][$i][1] > 1){
                    $_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] - 1 ;
                }
           }
        }

        header('location:cart.html');
    }
