<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    $serviceId = 0;

    // Get user ID from the JSON data
    if(isset($data['service_id'])){
        $serviceId = $conn->real_escape_string($data['service_id']);
    }

    // Fetch user information from multiple tables
    $query = "SELECT s.*, m.url, mt.meta_name, mt.meta_type, sm.media_id
            FROM services s
            LEFT JOIN service_meta sm ON sm.service_id = s.id
            LEFT JOIN meta mt ON mt.id = sm.meta_id
            LEFT JOIN media m ON m.id = sm.media_id 
            WHERE s.id = '$serviceId' ";

    // $query .= " LIMIT $limit";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch all rows into an array
        $userData = array();
        $filteredData = array();

        while ($row = $result->fetch_assoc()) {
            $serviceId = $row['id'];

            // Check if the service ID already exists in the array
            if (!isset($userData[$serviceId])) {
                $userData[$serviceId] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'price' => $row['price'],
                    'meta' => array(), // Initialize an array for meta
                );
            }

            // Add the meta information to the array based on meta_type
            $metaType = $row['meta_type'];
            $metaName = $row['meta_name'];
            $url = $row['url'];

            // If metaType doesn't exist, initialize it
            if (!isset($userData[$serviceId]['meta'][$metaType])) {
                $userData[$serviceId]['meta'][$metaType] = array();
            }

            // Add meta information to the array
            $userData[$serviceId]['meta'][$metaType][] = array(
                'meta_name' => $metaName,
                'url' => $url,
            );
        }

        // Convert the associative array to a simple array
        $userData = array_values($userData);

        header('Content-Type: application/json');
        // Return unfiltered data
        echo json_encode($userData);
        exit;


    } else {
        // Debugging statement
        echo json_encode(array('error' => 'Service not found or SQL query error: ' . $conn->error));
        exit;
    }
}

?>
