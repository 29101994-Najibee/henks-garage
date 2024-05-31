<?php 
declare(strict_types=1);
function is_input_empty_appointment(string $idCutomer, string $AppointmentDate, string $Status, string $Notes, string $Problem, string $Mileage)
{
    if (empty($idCutomer) || empty($AppointmentDate) || empty($Status) || empty($Notes) || empty($Problem)  || empty($Mileage)) {
        return true;
    } else {
        return false;
    }
}
function get_employee(object $pdo, string $idEmployee){
    $query  = "SELECT * FROM appointment WHERE ";

}
