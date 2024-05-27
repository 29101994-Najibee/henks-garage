<?php declare(strict_types=1);

function get_appointment(object $pdo, string $idAppointment)

{
    $query = 'SELECT idAppointment FROM appointment WHERE idAppointment = :idAppointment;';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':idAppointment', $idAppointment);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function add_appointment(object $pdo, string $AppointmentDate, string $Status, string $Notes, string $Problem, string $Mileage)
{
    $query = 'INSERT INTO appointment (AppointmentDate, Status, Notes, Problem, Mileage) VALUES (:AppointmentDate, :Status, :Notes, :Problem, :Mileage);';
$stmt = $pdo->prepare($query);

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