<?php
include('./php-control/config.php');
// Process delete item in cart
if (isset($_POST['delete'])) {
    $id_delete = $_POST['id'];

    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $id_delete) {
            array_splice($_SESSION['cart'], $i, 1);
        }
    }

    if (count($_SESSION['cart']) == 0) {
        unset($_SESSION['cart']);
    }

    header('location:cart.html');
}

// Process quantity item cart
if (isset($_GET['up'])) {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $_GET['up']) {
            $_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] + 1;
        }
    }
    header('location:cart.html');
}

// Process quantity item cart
if (isset($_GET['down'])) {
    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $_GET['down']) {
            if ($_SESSION['cart'][$i][1] > 1) {
                $_SESSION['cart'][$i][1] = $_SESSION['cart'][$i][1] - 1;
            }
        }
    }
    header('location:cart.html');
}

// Process place order
if (isset($_GET['placeorder']) && $_GET['placeorder'] == "true") {
    var_dump($_SESSION['cart']);
} else if (isset($_GET['placeorder']) && $_GET['placeorder'] != "true") {
    header('location:./cart.html');
}

if (isset($_POST['placeorder'])) {
    $firstname = $_POST['firstnamePHP'];
    $lastname = $_POST['lastnamePHP'];
    $address = $_POST['addressPHP'];
    $phone = $_POST['phonePHP'];
    $payment = $_POST['paymentPHP'];
    $note = $_POST['notePHP'];
    $email = $_POST['emailPHP'];
    if (!isset($_SESSION['username'])) {
        exit('plslogin');
    } else {
        $user_username = $_SESSION['username'];
        $sql_selectiduser = "SELECT * from users WHERE USERNAME = '$user_username'";
        $result_iduser = mysqli_fetch_array($connect->query($sql_selectiduser));
        $userid = $result_iduser['USERID'];
        $date = date("Ymd");
        $time = time();
        $orderid = $date . $time . $userid;
        $sql_insertorder = "INSERT INTO orders(ORDERID,USERID,FIRSTNAME,LASTNAME,ADDRESS,EMAIL,PHONE,PAYMENT,STATUS) VALUES ('$orderid' , '$userid' , '$firstname' , '$lastname' , '$address' , '$email' , '$phone' , '$payment' , '$note')";
        $connect->query($sql_insertorder);

        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            $orderdetail_productid = $_SESSION['cart'][$i][0];
            $orderdetail_quantity = $_SESSION['cart'][$i][1];
            $orderdetail_price = $_SESSION['cart'][$i][2];
            $sql_insertorderdetail = "INSERT INTO ordersdetail(ORDERID,PRODUCTID,QUANTITY,PRICE) VALUES('$orderid' , '$orderdetail_productid' , '$orderdetail_quantity' , '$orderdetail_price')";
            $connect->query($sql_insertorderdetail);
            $sql_downquantity = "UPDATE products SET QUANTITY = QUANTITY - '$orderdetail_quantity' WHERE id = '$orderdetail_productid'";
            $connect->query($sql_downquantity);
        }
        unset($_SESSION['cart']);
        exit('success');
    }
}
