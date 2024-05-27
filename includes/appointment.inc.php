<?php
declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../includes/config_session.inc.php';
    $idCustomer = $_POST['idCustomer'];
    // $AppointmentDate = $_POST['AppointmentDate'];
    $Status = $_POST['Status'];
    // $Notes = $_POST['Notes'];
    // $Problem = $_POST['Problem'];
    // $idEmployee = $_POST['idEmployee'];
    // $Mileage = $_POST['Mileage'];
  
    $AppointmentDate = isset($_POST['AppointmentDate']) ? $_POST['AppointmentDate'] : '';
    $Notes = isset($_POST['Notes']) ? $_POST['Notes'] : '';
    $Problem = isset($_POST['Problem']) ? $_POST['Problem'] : '';
    //$idEmployee = isset($_POST['idEmployee']) ? $_POST['idEmployee'] : '';
    $Mileage = isset($_POST['Mileage']) ? $_POST['Mileage'] : '';
    try {
        require_once 'dbh.inc.php';
        require_once 'appointment_model.php';
        require_once 'appointment_contr.php';

        $errors = [];
        
        if (is_input_empty_appointment( $idCustomer,$AppointmentDate, $Status ,$Problem, $Notes, $Mileage)){
            $errors['empty_input'] = 'Fill in all fields!';
        }

        if (validate_date($AppointmentDate)) {
            $errors['invalid_date'] = 'Invalid date used!';
        }

        if ($errors) {
            $_SESSION['errors_appointment'] = $errors;
            $_SESSION['appointment_data'] = [
                'idCustomer' => $idCustomer,
                'AppointmentDate' => $AppointmentDate,
                'Status' => $Status,
                'Problem' => $Problem,
                'Notes' => $Notes,
                
                // 'idEmployee' => $idEmployee,
                'Mileage' => $Mileage
               
            ];
            header('Location: ../appointment.php');
            exit();
        }

        add_appointment( $pdo, $AppointmentDate, $Status, $Problem, $Notes, $Mileage);
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
