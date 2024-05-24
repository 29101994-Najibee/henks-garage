<?php declare(strict_types=1);
function check_signup_errors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p class="errors_form">' . $error . '</p>';
        }
        unset($_SESSION['errors_signup']);
        
    } elseif (isset($_GET['signup']) && $_GET['signup'] === 'success') {
        echo '<br>';
        echo '<p class="form_success">Signup success!</p>';
    }
}