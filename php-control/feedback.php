<?php

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

        $data = array(
            'fullname' => $name,
            'email' => $email,
            'comment' => $comments,
            'experience' => $experience,
            'crtdate' => $date
        );

        $var = insert_data('feedback',$data);
        if ($var == TRUE) {
            echo '
                    <script type="text/javascript">
                        Swal.fire({
                            position: \'top-end\',
                            icon: \'success\',
                            title: \'Your work has been saved\',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';

        } else {
            echo '
                    <script type="text/javascript">
                    Swal.fire({
                        position: \'top-end\',
                        icon: \'fail\',
                        title: \'Something went wrong!\',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    </script>';
        }
    }
};
?>