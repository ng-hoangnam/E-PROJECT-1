<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:45 PM
 */

// Include File Config Database
include('./php-control/config.php');

session_start();

$sql = "SELECT * FROM products A JOIN brands B ON A.BRANDID = B.BRANDID";
$product_list = select_list($sql);


?>