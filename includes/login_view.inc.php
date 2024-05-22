<?php declare(strict_types=1);
function output_username()
{
    if (isset($_SESSION['user_id'])) {
        echo 'You are Logged in as' . $_SESSION['user_Mail'];
    } else {
        echo 'Login is not successed!';
    }
}

function check_login_errors()
{
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p class="errors_form">' . htmlspecialchars($error) . '</p>';
        }
        unset($_SESSION['errors_login']);
    }
}
?>
