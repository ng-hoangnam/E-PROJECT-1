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

// Validate Log-in Form
$errors = array();

if (isset($_POST['feedback'])) {

    $experience = ($_POST['experience']);
    $comments = ($_POST['comments']);
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $experience = ($_POST['experience']);

    if (empty($name)) {
        $errors['name'] = 'Your name cannot empty';
    }

    if (empty($email)) {
        $errors['email'] = 'Email cannot empty';
    }

    //Insert Register Data
    if (!isset($errors['name']) && !isset($errors['email'])) {
        $name = $connect->real_escape_string($_POST['name']);
        $email = $connect->real_escape_string($_POST['email']);
        $date = date('Y-m-d');
        $insertData = "INSERT INTO Feedback VALUES (DEFAULT, '$name', '$email', '$comments', '$experience', '$date')";

        if ($connect->query($insertData) == TRUE) {
            echo '
                    <script type="text/javascript">
                        alert("Thank you for your feedback!");
                    </script>';

        } else
            echo '
                    <script type="text/javascript">
                        alert("Error");
                    </script>';
    }

    //Quay lai trang index
//    if ($connect->query($insertData) == TRUE) {
//        header('Location: index.html');
//        exit;
//    }

}