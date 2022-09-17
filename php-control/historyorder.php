<?php 
include('./php-control/config.php');

$username = $_SESSION['username'];
$sql_selectuser = "SELECT * FROM users WHERE USERNAME = '$username'";
$result_user = $connect->query($sql_selectuser);
$datauser = mysqli_fetch_array($result_user);
$datauser_id = $datauser['USERID'];

$sql_selectorder = "SELECT * FROM orders WHERE USERID = '$datauser_id' ";
$dataorder = executeResult($sql_selectorder);
