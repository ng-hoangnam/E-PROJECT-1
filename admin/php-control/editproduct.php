<?php
if(!isset($_SESSION['logined'])){
    header('location:login.html');
}
include_once('config.php');
// Check link
if (!isset($_GET['id'])) {
    header('location:./index.html');
}
$id_edit = $_GET['id'];
$sql_selectproduct = "SELECT * FROM products WHERE PRODUCTID = '$id_edit'";
$result_product = $conn->query($sql_selectproduct);
$row_product = mysqli_num_rows($result_product);

// Print product
if ($row_product > 0) {
    $product = mysqli_fetch_array($result_product);
} else {
    header('location:./index.html');
}

// Print brand
$sql_selectbrand = "SELECT * FROM brands";
$result_brand = executeResult($sql_selectbrand);

// Push DTB
$errors = [];
if (isset($_POST['apply'])) {

    $productname = $_POST['productname'];
    $productquantity = $_POST['productquantity'];
    $productprice = $_POST['productprice'];
    $productstatus = $_POST['productstatus'];
    $productsaleprice = $_POST['productsaleprice'];
    $productbrand = $_POST['productbrand'];
    $productdetail = $_POST['productdetail'];

    if (!empty($_FILES['file']['name'])) {
        $file = $_FILES['file'];
        $file_name = $_FILES['file']['name'];
        $file_tmpname = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];
        $file_type = $_FILES['file']['type'];

        $file_ext = explode('.', $file_name);
        $file_actuaext = strtolower(end($file_ext));

        $allowed = array('jpg', 'jpeg', 'png', 'pdf');

        if (in_array($file_actuaext, $allowed)) {
            if ($file_error === 0) {
                if ($file_size < 1000000) {
                    $file_namenew = uniqid('', true) . "." . $file_actuaext;
                    $fie_destination = '../assets/img/lightType/' . $file_namenew;
                    move_uploaded_file($file_tmpname, $fie_destination);
                    $path = '../assets/img/lightType/' . $product['SOURCE'];
                    unlink($path);
                } else {
                    $errors['file'] = "Your file is too long !";
                }
            } else {
                $errors['file'] = "There was an error uploading your file";
            }
        } else {
            $errors['file'] = "You cannot upload file of this type !";
        }
    } else {
        $file_namenew = $product['SOURCE'];
        $file_error = 0;
    }

    if (empty($productname)) {
        $errors['productname'] = "Name cannot empty!";
    } elseif (strlen($productname) < 3) {
        $errors['productname'] = "Name is too short";
    }

    if (empty($productprice)) {
        $errors['productprice'] = "Price cannot empty !";
    }

    if (empty($productquantity)) {
        $errors['productquantity'] = "Cannot empty";
    }

    if (empty($productstatus)) {
        $errors['productstatus'] = "Cannot empty";
    }


    if (empty($productdetail)) {
        $errors['productdetail'] = "Cannot empty";
    }

    if (empty($errors) && $file_error === 0) {
        $sql_pushedited = "UPDATE products SET PRODUCTNAME = '$productname' , DETAIL = '$productdetail' , QUANTITY = '$productquantity' , STATUS = '$productstatus' , BRANDID = '$productbrand' , PRICE = '$productprice' , SALEPRICE = '$productsaleprice' , SOURCE = '$file_namenew' WHERE PRODUCTID = '$id_edit' ";
        $conn->query($sql_pushedited);
        header('location:product.html');
    }
}
