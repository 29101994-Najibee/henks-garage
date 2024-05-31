<?php 
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../includes/config_session.inc.php';
    $idCutomer = $_POST['idCutomer'];
    $Status = $_POST['Status'] ?? 'Waiting';
    $AppointmentDate = isset($_POST['AppointmentDate']) ? $_POST['AppointmentDate'] : '';
    $Notes = isset($_POST['Notes']) ? $_POST['Notes'] : '';
    $Problem = isset($_POST['Problem']) ? $_POST['Problem'] : '';
    $Mileage = isset($_POST['Mileage']) ? $_POST['Mileage'] : '';

    try {
        require_once 'dbh.inc.php';
        require_once 'appointment_model.php';
        require_once 'appointment_contr.php';

        $errors = [];

        if (is_input_empty_appointment($idCutomer, $AppointmentDate, $Status, $Problem, $Notes, $Mileage)) {
            $errors['empty_input'] = 'Fill in all fields!';
        }

        if (validate_date($AppointmentDate)) {
            $errors['invalid_date'] = 'Invalid date used!';
        }

        $reserved_dates = get_reserved_dates($pdo);
        if (in_array($AppointmentDate, $reserved_dates)) {
            $errors['reserved_date'] = 'This date is already reserved. Please choose another date.';
        }

        if ($errors) {
            $_SESSION['errors_appointment'] = $errors;
            $_SESSION['appointment_data'] = [
                'idCustomer' => $idCutomer,
                'AppointmentDate' => $AppointmentDate,
                'Status' => $Status,
                'Problem' => $Problem,
                'Notes' => $Notes,
                'Mileage' => $Mileage
            ];
            header('Location: ../appointment.php');
            exit();
        }

        add_appointment($pdo, $idCutomer, $AppointmentDate, $Status, $Problem, $Notes, $Mileage);
        header('Location: ../client-panel.php');
        exit();

    } catch (PDOException $e) {
        die('Query Failed: ' . $e->getMessage());
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>
