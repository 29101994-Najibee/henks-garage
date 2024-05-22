<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../includes/config_session.inc.php';
    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Mail = $_POST['Mail'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Streetname = $_POST['Streetname'];
    $HouseNumber = $_POST['HouseNumber'];
    $Zipcode = $_POST['Zipcode'];
    $Password = $_POST['Password'];

    try {
        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        $errors = [];
        if (is_input_empty($Firstname, $Lastname, $Mail, $PhoneNumber, $Streetname, $HouseNumber, $Zipcode, $Password)) {
            $errors['empty_input'] = 'Fill in all fields!';
        }

        if (is_Mail_invalid($Mail)) {
            $errors['invalid_email'] = 'Invalid email used!';
        }

        if (is_Mail_registred($pdo, $Mail)) {
            $errors['email_used'] = 'This Email is already registered';
        }

        if ($errors) {
            $_SESSION['errors_signup'] = $errors;
            $_SESSION['signup_data'] = [
                'Firstname' => $Firstname,
                'Lastname' => $Lastname,
                'Mail' => $Mail,
                'PhoneNumber' => $PhoneNumber,
                'Streetname' => $Streetname,
                'HouseNumber' => $HouseNumber,
                'Zipcode' => $Zipcode,
                'Password' => $Password
            ];
            header('Location: ../register.php');
            exit();
        }

        create_user($pdo, $Firstname, $Lastname, $Mail, $PhoneNumber, $Streetname, $HouseNumber, $Zipcode, $Password);
        header('Location: ../login.php');
        exit();

    } catch (PDOException $e) {
        die('Query Failed: ' . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>
