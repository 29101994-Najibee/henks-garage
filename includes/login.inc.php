<?php
declare(strict_types=1);
require_once '../includes/config_session.inc.php'; // Zorg ervoor dat dit bestand session_start() bevat

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Mail = $_POST['Mail'];
    $Password = $_POST['Password'];

    try {
        require_once 'dbh.inc.php'; // Zorg ervoor dat dit bestand de databaseverbinding initialiseert
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        $errors = [];
        if (is_input_empty($Mail, $Password)) {
            $errors['empty_input'] = 'Fill in all fields!';
        }

        $result = get_user($pdo, $Mail);
        if ($result === false || is_Mail_wrong($result)) {
            $errors['login_incorrect'] = 'Incorrect Mail or password!';
        } else {
            if (is_password_wrong($Password, $result['Password'])) {
                $errors['login_incorrect'] = 'Incorrect Mail or password!';
            }
        }

        if ($errors) {
            $_SESSION['errors_login'] = $errors;
            header('Location: ../login.php');
            exit(); // Gebruik exit() in plaats van die() na header() redirect
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . '_' . $result['id'];
        session_id($sessionId);
        $_SESSION['user_id'] = $result['id'];
        $_SESSION['user_Mail'] = $result['Mail']; // Geen htmlspecialchars() hier
        $_SESSION['last_regeneration'] = time();

        header('Location: ../appointment.php');
        exit();
    } catch (PDOException $e) {
        die('Query failed: ' . $e->getMessage());
    }
} else {
    // Geen POST-gegevens ontvangen, misschien omleiden naar een andere pagina
    header('Location: ../index.php');
    exit();
}
?>
