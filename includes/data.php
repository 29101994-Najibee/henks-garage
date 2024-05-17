<?php
function callApi($user) {
    // API endpoint
    $api_url = 'https://localhost:7180/api/Customer/Login?mail=' . $user .'&password=wachtwoord123';

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
        // Handle error gracefully or return
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
            // Handle error gracefully or return
            return;
        }

        //return $data;
        var_dump($data);
    } else {
        echo 'No response received from the API.';
    }
}
