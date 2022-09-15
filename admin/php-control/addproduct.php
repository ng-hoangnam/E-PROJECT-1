<?php
include_once('config.php');
if (!isset($_SESSION['logined'])) {
    header('location:login.html');
    exit;
}
// Print brand
$sql_selectbrand = "SELECT * FROM brands";
$result_brand = executeResult($sql_selectbrand);

if (isset($_POST['add'])) {
    $errors = [];

    $productname = $_POST['productname'];
    $productbrand = $_POST['productbrand'];
    $productprice = $_POST['productprice'];
    $productquantity = $_POST['productquantity'];
    $productstatus = $_POST['productstatus'];
    $productsaleprice = $_POST['productsaleprice'];
    $productdetail = $_POST['productdetail'];

    if(!empty($_FILES['file']['name'])){
        $file = $_FILES['file'];
        $file_name = $_FILES['file']['name'];
        $file_tmpname = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];

        $file_ext = explode('.' , $file_name);
        $file_actuaext = strtolower(end($file_ext));

        $allowed = array('jpg' , 'jpeg' , 'png' , 'pdf');

        if(in_array($file_actuaext , $allowed)){
            if($file_error === 0){
                if($file_size < 1000000){
                    $file_namenew = uniqid('',true) . "." . $file_actuaext ;
                    $fie_destination = '../assets/img/lightType/' . $file_namenew;
                    move_uploaded_file($file_tmpname, $fie_destination);
                }else{
                    $errors['file'] = 'Your file is too BIG !';
                }
            }else{
                $errors['file'] = 'There was an error uploading your IMG !';
            }
        }else{
            $errors['file'] = 'You cannot upload file of this type !';
        }
    }else{
        $errors['file'] = "IMG cannot empty !";
    }

    if(empty($productname)){
        $errors['productname'] = "Cannot empty !";
    }

    if(empty($productprice)){
        $errors['productprice'] = "Cannot empty !";
    }

    if(empty($productquantity)){
        $errors['productquantity'] = "Cannot empty !";
    }

    if(empty($productstatus)){
        $errors['productstatus'] = "Cannot empty !";
    }

    if(empty($productdetail)){
        $errors['productdetail'] = "Cannot empty !";
    }

    if(empty($errors)){
        $sql_addproduct = "INSERT INTO products (PRODUCTNAME , DETAIL , QUANTITY , STATUS , BRANDID , PRICE , SALEPRICE , SOURCE) VALUES ( '$productname' , '$productdetail' , '$productquantity' , '$productstatus' , '$productbrand' , '$productprice' , '$productsaleprice' , $file_namenew ) ";
        $conn->query($sql_addproduct);
        header('location:product.html');
    }
}
