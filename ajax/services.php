<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Get user ID from the JSON data
    $uid = $conn->real_escape_string($data['uid']);
    $limit = $conn->real_escape_string($data['limit']);
    $category = $conn->real_escape_string($data['category']);
    $language = $conn->real_escape_string($data['language']);

    // Fetch user information from multiple tables
    $query = "SELECT s.*, m.url, mt.meta_name, mt.meta_type
            FROM services s
            LEFT JOIN media m ON s.media = m.id
            LEFT JOIN service_meta sm ON sm.service_id = s.id
            LEFT JOIN meta mt ON mt.id = sm.meta_id";

    if (!empty($category) && !empty($language)) {
        $query = "SELECT s.*, m.url, mt.meta_name, mt.meta_type
            FROM services s
            LEFT JOIN media m ON s.media = m.id
            LEFT JOIN service_meta sm ON sm.service_id = s.id
            LEFT JOIN meta mt ON mt.id = sm.meta_id AND mt.meta_name = '$category' ";
            // LEFT JOIN meta mt ON mt.id = sm.meta_id AND ((mt.meta_name = '$category' AND mt.meta_type = 'category') OR (mt.meta_name = '$language' AND mt.meta_type = 'language')) ";
    }

    // $query .= " LIMIT $limit";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch all rows into an array
        $userData = array();
        while ($row = $result->fetch_assoc()) {
            $serviceId = $row['id'];

            // Check if the service ID already exists in the array
            if (!isset($userData[$serviceId])) {
                $userData[$serviceId] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'price' => $row['price'],
                    'url' => $row['url'],
                    'meta' => array(), // Initialize an array for meta
                );
            }

            // Add the meta information to the array based on meta_type
            $metaType = $row['meta_type'];
            $metaName = $row['meta_name'];
            $userData[$serviceId]['meta'][$metaType][] = $metaName;
        }

        // Convert the associative array to a simple array
        $userData = array_values($userData);

        // Return JSON response
        header('Content-Type: application/json');
        echo json_encode($userData);
        exit;
    } else {
        // Debugging statement
        echo json_encode(array('error' => 'User not found or SQL query error: ' . $conn->error));
        exit;
    }
}

?>
