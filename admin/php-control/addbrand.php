<?php 
    include_once('config.php');
    if (!isset($_SESSION['logined'])) {
        header('location:login.html');
        exit;
    }
    // Print brand
    $sql_selectbrand = "SELECT * FROM brands";
    $result_brand = executeResult($sql_selectbrand);

    // Process add
    if(isset($_POST['addbrand'])){
        $errors = [] ;

        $brandname = strtolower($_POST['brandname']);

        if(empty($brandname)){
            $errors['brandname'] = "Cannot empty !";
        }

        if(empty($errors)){
            $sql_addbrand = "INSERT INTO brands (BRANDNAME) VALUES ('$brandname')";
            $conn->query($sql_addbrand);
            header('location:addbrand.html');
        }
    }
?>