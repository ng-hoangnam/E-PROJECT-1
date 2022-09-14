<?php
define('DB_SEVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chic_lighting');

$conn = mysqli_connect(DB_SEVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if ($conn === false) {
    die("ERROR");
}

function executeResult($sql)
{
    $conn = mysqli_connect(DB_SEVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $resultset = mysqli_query($conn , $sql);
    $list = [] ;
    while($row = mysqli_fetch_array($resultset , 1))
    {
        $list[] = $row;
    }
    mysqli_close($conn);
    return $list;
}
