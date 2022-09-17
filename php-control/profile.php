<?php 
include('./php-control/config.php');
$username = $_SESSION['username'];
$sql_seletuser = "SELECT * FROM users WHERE username = '$username'";
$result_user = mysqli_fetch_array($connect->query($sql_seletuser)) ;

if(isset($_POST['changepass'])){
    $currentpass = sha1($_POST['currentpassPHP']);
    $newpass = sha1($_POST['newpassPHP']);

    $sql_checkpass = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$currentpass'";
    $check = mysqli_num_rows(($connect->query($sql_checkpass)));

    if($check > 0){
        $sql_changepass = "UPDATE users SET PASSWORD = '$newpass' WHERE USERNAME = '$username'";
        if($connect->query($sql_changepass)){
            exit('success');
        }else{
            exit('disconnect');
        }
    }else{
        exit('false');
    }
}
?>