<?php
    include_once('config.php');
    if(isset($_SESSION['logined'])){
        header('location:./index.html');
    }
    if(isset($_POST['login'])){
        $errors = [] ;

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)){
            $errors['username'] = "Username cannot empty!";
        }elseif(strlen($username) < 3){
            $errors['username'] = "Username need more than 3 characters";
        }

        if(empty($password)){
            $errors['password'] = "Password cannot empty!";
        }elseif(strlen($password) <3){
            $errors['password'] = "Password need more than 3 characters";
        }

        if(empty($errors)){
            $hash_pass = sha1($password);
            $check_login = "SELECT * FROM admin WHERE USERNAME = '$username' && PASSWORD = '$hash_pass'";
            $result = $conn->query($check_login);
            $row = mysqli_num_rows($result);
            if($row > 0 ){
                $_SESSION['logined'] = $username ;
                header('location:index.html');
            }else{
                $errors['username'] = 'Wrong username or password';
                $errors['password'] = 'Wrong username or password';
            }
        }
    }
?>