<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:45 PM
 */
$connect = null;

// Include File Config Database
include('./php-control/config.php');

$query = "SELECT * FROM Products";
$res = $connect -> query($query);
$rows = $res -> fetch_all(MYSQLI_ASSOC);