<?php

// https://localhost:7180/api/Appointment/AppointmentsByCustomerId?customerId=5
// https://localhost:7180/api/Customer/Login?mail=jan.jansen%40example.com&password=wachtwoord123

function callApi($type) {
    // $_SESSION['user_id'] = 1;
    // $_SESSION['user'] = 'jan.jansen@example.com';
     //$_SESSION['password'] = 'wachtwoord123';

    $user_id = $_SESSION['idCustomer'];
    //  $user = $_SESSION['user_Mail'];
    //$password = $_SESSION['password'];

    $api_url = 'https://localhost:7180/api/';

    switch($type) {
        // case "login":
        //     $api_url .= 'Customer/Login?mail=' . $user . '&password=' . $password;
        // break;
        case "appointment":
            $api_url .= 'Appointment/AppointmentsByCustomerId?customerId=' . $user_id;
        break;

        case "receptionist":
            $api_url .= 'Appointment/AllAppointments';
        break;
        case "status_open":
            $api_url .= 'Appointment/GetAppointmentByStatus?status=0';
        break;
        case "status_closed":
            $api_url .= 'Appointment/GetAppointmentByStatus?status=3';
        break;

        default:
        break;
    }

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    // If your SSL certificate is self-signed, you might need to disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute the request
    $response = curl_exec($ch);

    // Check for errors
    if($response === false) {
        echo 'Curl error: ' . curl_error($ch);
        return;
    }

    // Close cURL session
    curl_close($ch);

    // Process API response
    if($response) {

        // Decode JSON response into a PHP array
        $data = json_decode($response, true);

        // Check if JSON decoding was successful
        if($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo 'Error decoding JSON: ' . json_last_error_msg();
            return;
        }

        return $data;
        //var_dump($data);
    } else {
        echo 'No response received from the API.';
    }
}

function formatDate($data) {
    $date = new DateTime($data);
    $formattedDate = $date->format('d-m-Y');
    return $formattedDate;
}

function daysUntilAppointment($data) {
    $currentDate = new DateTime();
    $appointmentDate = new DateTime($data);

    // Reset time to 00:00 to consider whole days
    $currentDate->setTime(0, 0);
    $appointmentDate->setTime(0, 0);

    if ($currentDate >= $appointmentDate) {
        return "Afgehandeld";
    }

    $interval = $currentDate->diff($appointmentDate);

    // Handle singular and plural form
    $days = $interval->days;
    $dayText = $days === 1 ? 'dag' : 'dagen';

    return 'Afspraak over ' . $days . ' ' . $dayText;
}
