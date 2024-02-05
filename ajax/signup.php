<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Check if the required data is present in the JSON
    if (isset($data['email']) && isset($data['password']) && isset($data['name']) && isset($data['username'])) {
        // Assign values from JSON to variables
        $email = $conn->real_escape_string($data['email']);
        $password = $conn->real_escape_string($data['password']);
        $username = $conn->real_escape_string($data['username']);
        $name = $conn->real_escape_string($data['name']);

        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM users WHERE email = '$email' ";
        $result = $conn->query($query);
        if($result->num_rows > 0){
            echo json_encode(array('success' => false, 'message' => 'User already exists with this email'));
            exit;
        }

        // Example query, replace with your actual table structure and column names
        $query = "INSERT INTO users (username, name, email, password, role) VALUES ('$username', '$name', '$email', '$hashedPassword', '')";

        // Execute the query
        if ($conn->query($query)) {
            // If the query was successful, return a success response
            echo json_encode(array('success' => true, 'message' => 'User registered successfully'));
            exit;
        } else {
            // If there was an error with the query, return an error response
            echo json_encode(array('error' => 'Error inserting user data: ' . $conn->error));
            exit;
        }
    } else {
        // Return an error if required data is missing
        echo json_encode(array('error' => 'Missing required data'));
        exit;
    }
}

?>
