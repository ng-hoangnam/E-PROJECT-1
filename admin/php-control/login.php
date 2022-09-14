<?php 
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
            $check_login = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
        }
    }
?>