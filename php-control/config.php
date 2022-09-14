<?php

session_start();
//Config Database
$connect = new mysqli('localhost', 'root', '', 'chic_lighting');

if ($connect === false) {
    die("ERROR: Could not connect..." . $connect->connect_error);
}

// Hàm lấy danh sách dữ liệu từ database
function select_list($sql)
{
    global $connect;
    $result = mysqli_query($connect, $sql);
    $connect->close();
    if (!$result) {
        die('Lỗi khi thực hiện truy vấn');
    }
    $list = array();
    while ($row = $result->fetch_assoc()) {
        $list[] = $row;
    }
    mysqli_free_result($result);
    return $list;
}

// Hàm lấy 1 dòng dữ liệu từ database
function select_row($sql)
{
    global $connect;
    $result = mysqli_query($connect, $sql);
    $connect->close();
    if (!$result) {
        die('Lỗi khi thực hiện truy vấn');
    }
    $row = $result->fetch_assoc();
    return $row;
}

// Hàm thêm dữ liệu vào database
function insert_data($table, $data = array())
{
    global $connect;
    $field = '';
    $values = '';

    foreach ($data as $key => $val) {
        $field .= $key . ",";
        $values .= "'" . mysqli_real_escape_string($connect, $val) . "'" . ",";
    }

    $sql = 'INSERT INTO ' . $table . ' (' . trim($field, ',') . ') VALUES (' . trim($values, ',') . ')';
    return mysqli_query($connect, $sql);
    $connect->close();
}

//Hàm update dữ liệu
function update_data($table, $idfield, $idvalue, $data = array())
{
    global $connect;
    $set = '';
    foreach ($data as $key => $val) {
        $set .= $key . '=' . "'" . mysqli_real_escape_string($connect, $val) . "'" . ",";
    }

    $sql = 'UPDATE ' . $table . ' SET ' . trim($set, ',') . ' WHERE ' . $idfield . ' = ' . (int) $idvalue;
    return mysqli_query($connect, $sql);
    $connect->close();
}

//Hàm xóa dữ liệu
function delete_data($table, $idfield, $idvalue)
{
    global $connect;
    $sql = 'DELETE FROM ' . $table . ' WHERE ' . $idfield . ' = ' . (int) $idvalue . '';
    return mysqli_query($connect, $sql);
    $connect->close();
}

//Hàm đếm dữ liệu
function count_data($sql, $counts)
{
    global $connect;
    $result = mysqli_query($connect, $sql);
    $connect->close();
    if (!$result) {
        die('Lỗi khi thực hiện truy vấn');
    }
    $row = $result->fetch_assoc();
    if ($row) {
        return $row[$counts];
    } else {
        return 0;
    }
}
//$data = array(
//    'fullname' => 'Thanh test',
//    'email' => 'thanhnt@gmail.com',
//    'comment' => 'Thanh comment',
//    'experience' => 'good',
//    'crtdate' => '2022-08-23'
//);
//
//$var = insert_data('feedback',$data);
//var_dump($var);

//$list = select_row("SELECT * FROM Feedback WHERE comment LIKE '%fsdfsd%'");
//var_dump($list);
