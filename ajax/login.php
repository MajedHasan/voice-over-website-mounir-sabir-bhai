<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Check if the required data is present in the JSON
    if (isset($data['email']) && isset($data['password'])) {
        // Assign values from JSON to variables
        $email = $conn->real_escape_string($data['email']);
        $password = $conn->real_escape_string($data['password']);

        // Example query, replace with your actual table structure and column names
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);

        if ($row = $result->fetch_assoc()) {
            // Verify the provided password against the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Passwords match, user is authenticated
                unset($row['password']); // Remove the hashed password from the response
                echo json_encode(array('success' => true, 'data' => $row));
                exit;
            } else {
                // Passwords do not match
                echo json_encode(array('error' => 'Invalid email or password'));
                exit;
            }
        } else {
            // No user found with the provided email
            echo json_encode(array('error' => 'Invalid email or password'));
            exit;
        }
    } else {
        // Return an error if required data is missing
        echo json_encode(array('error' => 'Missing required data'));
        exit;
    }
}
?>
