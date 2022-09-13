<?php
    // Include File Config Database
    include('./php-control/config.php');

    // Validate Register Form
    $errors = array();

    if (isset($_POST['register'])) {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'First Name cannot empty';
        }; 
        
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Last Name cannot empty';
        }; 

        if (empty($_POST['address'])) {
            $errors['address'] = 'Address cannot empty';
        }; 
        
        if (empty($_POST['username'])) {
            $errors['username'] = 'Username cannot empty';
        } elseif (strlen($_POST['username']) < 5){
            $errors['username'] = '* Username must have at least 6 characters';
        };
        
        if (empty($_POST['email'])) {
            $errors['email'] = 'Email cannot empty';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Email must follow this format: your-email@mail.com';
        }; 
        
        if (empty($_POST['userpassword'])) {
            $errors['userpassword'] = 'Password cannot empty';
        } elseif (strlen($_POST['userpassword']) < 5){
            $errors['userpassword'] = '* Password must have at least 6 characters';
        };
        
        if (empty($_POST['confirm-password'])) {
            $errors['confirm-password'] = 'Confirm Password cannot empty';
        } elseif ($_POST['confirm-password'] !== $_POST['userpassword']) {
            $errors['confirm-password'] = 'Password does not match! Try again';
        };

        //Insert Register Data
        if (count($errors) == 0) {
            //Get Data
            $first_name = htmlspecialchars($_POST['firstname']);
            $last_name = htmlspecialchars($_POST['lastname']);
            $address = htmlspecialchars($_POST['address']);
            $user_name = htmlspecialchars($_POST['username']);
            $email = htmlspecialchars($_POST['email']);
            $user_password = htmlspecialchars($_POST['userpassword']);

            $FIRST_NAME_RES = $connect->real_escape_string($first_name);
            $LAST_NAME_RES = $connect->real_escape_string($last_name);
            $ADDRESS_RES = $connect->real_escape_string($address);
            $USERNAME_RES = $connect->real_escape_string($user_name);
            $EMAIL_RES = $connect->real_escape_string($email);
            $PASSWORD_RES = $connect->real_escape_string($user_password);
                $PASSWORD_HASH = sha1($PASSWORD_RES);
            $CRT_DATE = date("d/m/Y");
            
            $data = array(
                "USERID" => "DEFAULT",
                "FIRSTNAME" => $FIRST_NAME_RES,
                "LASTNAME" => $LAST_NAME_RES,
                "ADDRESS" => $ADDRESS_RES,
                "EMAIL" => $EMAIL_RES,
                "USERNAME" => $USERNAME_RES,
                "PASSWORD" => $PASSWORD_HASH,
                "CRTDATE" => $CRT_DATE,
            );

            $insertRegData = insert_data('users', $data);
    
            if ($insertRegData == TRUE) {
                echo '
                    <script type="text/javascript">
                        alert("Sign up successfully!");
                    </script>';
            };
        };

    }
    // Get back sign in
    if (isset($_POST['getbacksignin'])) {
        header('Location: ./login.html');
        exit;
    };
?>