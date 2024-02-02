<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Check if the required data is present in the JSON
    if(isset($data['name']) && isset($data['email']) && isset($data['number']) && isset($data['message']) && isset($data['contactType'])) {
        // Assign values from JSON to variables
        $name = is_array($data['name']) ? '' : $conn->real_escape_string($data['name']);
        $email = is_array($data['email']) ? '' : $conn->real_escape_string($data['email']);
        $number = is_array($data['number']) ? '' : $conn->real_escape_string($data['number']);
        $message = is_array($data['message']) ? '' : $conn->real_escape_string($data['message']);
        $subject = is_array($data['subject'] ?? '') ? '' : $conn->real_escape_string($data['subject'] ?? '');
        $category = is_array($data['category'] ?? '') ? '' : $conn->real_escape_string($data['category'] ?? '');
        $advice = is_array($data['advice'] ?? '') ? '' : $conn->real_escape_string($data['advice'] ?? '');
        $contactType = is_array($data['contactType']) ? '' : $conn->real_escape_string($data['contactType']);


        // Example query, replace with your actual table structure and column names
        $query = "INSERT INTO contact (name, email, number, subject, category, message, advice, status, is_open, contact_type) 
          VALUES ('$name', '$email', '$number', '$subject', '$category', '$message', '$advice', 'submited', '0', '$contactType')";


       if ($conn->query($query)) {
            echo json_encode(array('success' => true,'message' => 'Data inserted successfully'));
            exit;
        } else {
            echo json_encode(array('error' => 'SQL query error: ' . $conn->error));
            exit;
        }

    } else {
        // Return an error if required data is missing
        echo json_encode(array('error' => 'Missing required data'));
        exit;
    }
}
?>
