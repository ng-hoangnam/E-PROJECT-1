<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator <taithanh95.dev@gmail.com>
 * Date: 10/08/2022
 * Time: 2:40 PM
 */

//Config Database
$connect = mysqli_connect('localhost' , 'root' , '' , 'chiclighting');

if ($connect === false) {
    die("ERROR: Could not connect..." . $connect->connect_error);
}

?>

