<?php
    // Include File Config Database
    include('./php-control/config.php');
    session_start();

    // Validate Log-in Form
    $errors = array();

    if (isset($_POST['login'])) {

        $account = htmlspecialchars($_POST['account']);
        $password = htmlspecialchars($_POST['password']);

        if (empty($account)) {
            $errors['account'] = '* Username cannot empty';
        } elseif (strlen($account) < 5) {
            $errors['account'] = '* Username must have at least 6 characters';
        };

        if (empty($password)) {
            $errors['password'] = '* Password cannot empty';
        } elseif (strlen($password) < 5) {
            $errors['password'] = '* Password must have at least 6 characters';
        };

        if (count($errors) == 0) {
            $ESCAPE_STRING_ACCOUNT = $connect->real_escape_string($account);
            $ESCAPE_STRING_PASSWORD = $connect->real_escape_string($password);
                $PASSWORD_HASH = sha1($password);

            $checkUsers = "SELECT * FROM users WHERE USERNAME = '$ESCAPE_STRING_ACCOUNT' AND PASSWORD = '$PASSWORD_HASH'";
            $result = $connect->query($checkUsers);

            if($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                var_dump($user);
                
                $_SESSION['username'] = $user['USERNAME'];
                $_SESSION['customer_name'] = $user['FIRSTNAME'] . ' ' .  $user['LASTNAME'];
                
                // // Set up Cookie for Remember-me checkbox
                // if (!empty($_POST['remember'])) {
                //     setcookie('account', $account, time()+(10*365*24*60*60));
                //     setcookie('password', $password, time()+(10*365*24*60*60));
                // } else {
                //     if(isset($_COOKIE['account'])) {
                //         setcookie('account','');
                //     };
                //     if(isset($_COOKIE['password'])) {
                //         setcookie('password','');
                //     };
                // };

                header('Location: product.html');
                
            } else {
                $errors['log-in-fail'] = '*Wrong username or password';
            }
        };
    }

    // Directional - Turn to Register Form
    if (isset($_POST['signup'])) {
        header('Location: register.html');
        exit;
    };
?>