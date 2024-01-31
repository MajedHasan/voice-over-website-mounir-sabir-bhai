<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Get user ID from the JSON data
    $limit = $conn->real_escape_string($data['limit']);

    // Fetch user information from multiple tables
    $query = "SELECT mt.*, m.url
              FROM meta mt
              LEFT JOIN media m ON m.id = mt.meta_media
              WHERE meta_type = 'category' ";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch all rows into an array
        $categoryData = array();
        while ($row = $result->fetch_assoc()) {
            $serviceId = $row['id'];

            // Check if the service ID already exists in the array
            if (!isset($categoryData[$serviceId])) {
                $categoryData[$serviceId] = array(
                    'id' => $row['id'],
                    'meta_name' => $row['meta_name'],
                    'meta_type' => $row['meta_type'],
                    'media_url' => $row['url'],
                );
            }
        }

        // Convert the associative array to a simple array
        $categoryData = array_values($categoryData);

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($categoryData);
        exit;
    } else {
        // Debugging statement
        echo json_encode(array('error' => 'User not found or SQL query error: ' . $conn->error));
        exit;
    }
}

?>
