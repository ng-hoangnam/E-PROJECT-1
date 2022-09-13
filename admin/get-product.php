<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:45 PM
 */

// Include File Config Database
include('./php-control/config.php');
$connect = null;
$data = null;

$stmt = $connect->prepare("SELECT * FROM `products`");
$stmt->execute();

$data = [];

foreach ($stmt->fetchAll() as $key => $value) {
    $data[] = array(
        'productid' => $value['productid'],
        'productname' => $value['productname'],
        'detail' => $value['detail'],
        'quantity' => $value['quantity'],
        'status' => $value['status'],
        'brandid' => $value['brandid'],
        'price' => $value['price']
    );
}

die(json_encode($data));
