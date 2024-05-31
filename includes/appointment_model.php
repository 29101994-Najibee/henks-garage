<?php declare(strict_types=1);
 require_once 'dbh.inc.php';
function get_appointment(object $pdo, string $idAppointment)

{
    $query = 'SELECT idAppointment FROM appointment WHERE idAppointment = :idAppointment;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idAppointment', $idAppointment);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function add_appointment(object $pdo, string $idCutomer, string $AppointmentDate, string $Status, string $Notes, string $Problem, string $Mileage)
{
    $query = 'INSERT INTO appointment (idCutomer, AppointmentDate, Status, Notes, Problem, Mileage) VALUES (:idCutomer, :AppointmentDate, :Status, :Notes, :Problem, :Mileage);';
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':idCutomer', $idCutomer);
    $stmt->bindParam(':AppointmentDate', $AppointmentDate);
    $stmt->bindParam(':Status', $Status);
    $stmt->bindParam(':Notes', $Notes);
    $stmt->bindParam(':Problem', $Problem);
    $stmt->bindParam(':Mileage', $Mileage);

    $stmt->execute();
}
function validate_date(string $AppointmentDate): bool
{
    $date = DateTime::createFromFormat('d-m-Y', $AppointmentDate);
    $now = new DateTime();

    return $date && $date->format('d-m-Y') === $AppointmentDate && $date >= $now;
}

function check_Appointment_errors()

{
    if (isset($_SESSION['errors_appointment'])) {
        $errors = $_SESSION['errors_appointment'];
        echo '<br>';
        foreach ($errors as $error) {
            echo '<p class="errors_form">' . $error . '</p>';
        }
        unset($_SESSION['errors_appointment']);
        
    } elseif (isset($_GET['appointment']) && $_GET['appointment'] === 'success') {
        
        echo '<br>';
        echo '<p class="form_success">appointment success!</p>';
    }
}
function get_reserved_dates(object $pdo= NULL) {
    $query = 'SELECT AppointmentDate FROM appointment';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}
function get_problem(object $pdo){
    $query = "SELECT DISTINCT Problem FROM appointment";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
