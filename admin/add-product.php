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

try {
    $stmt = $connect->prepare("INSERT INTO `products` VALUES ()");
    $stmt->execute();
    $stmt = $connect->prepare("SELECT `id` from `products` WHERE `productid` IS NULL");
    $stmt->execute();
    $id = $stmt->fetch()['id'];

    foreach ($data as $key => $value) {
        $stmt = $connect->prepare("UPDATE `products` SET $key = :value WHERE id = :id");
        $stmt->bindParam('value', $value);
        $stmt->bindParam('id', $id);
        $stmt->execute();
    }
    die("Update Success");
} catch (PDOException $e) {
    die($e);
}
