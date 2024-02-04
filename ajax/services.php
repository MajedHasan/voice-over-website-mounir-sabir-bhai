<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    $skip = 0;
    $limit = 5;
    $category = "";
    $language = "";

    // Get user ID from the JSON data
    if(isset($data['skip'])){
        $skip = $conn->real_escape_string($data['skip']);
    }
    if(isset($data['limit'])){
        $limit = $conn->real_escape_string($data['limit']);
    }
    if(isset($data['category'])){
        $category = $conn->real_escape_string($data['category']);
    }
    if(isset($data['language'])){
        $language = $conn->real_escape_string($data['language']);
    }

    // Fetch user information from multiple tables
    $query = "SELECT s.*, m.url, mt.meta_name, mt.meta_type, sm.media_id
            FROM services s
            LEFT JOIN service_meta sm ON sm.service_id = s.id
            LEFT JOIN meta mt ON mt.id = sm.meta_id
            LEFT JOIN media m ON m.id = sm.media_id 
            WHERE s.status = 'published' ";

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

        if ($category == "" || $language == "" || $category == "All" || $language == "All") {

            // Apply the limit to the filtered data
            if ($limit != "" && $skip != "") {
                $userData = array_slice($userData, $skip, $limit);
            }
            else if ($limit != "") {
                $userData = array_slice($userData, 0, $limit);
            }
            else if ($skip != "") {
                $userData = array_slice($userData, $skip);
            }

            // Convert the associative array to a simple array
            $userData = array_values($userData);

            header('Content-Type: application/json');
            // Return unfiltered data
            echo json_encode($userData);
            exit;
            
        } else {

            if($category != "" && $language != ""){
                // Filter the array based on meta_type == 'category' and meta_name == 'example'
                $filteredData = array_filter($userData, function ($item) use ($category, $language) {
                    return isset($item['meta']['category']) && in_array($category, array_column($item['meta']['category'], 'meta_name'))
                        && isset($item['meta']['language']) && in_array($language, array_column($item['meta']['language'], 'meta_name'));
                });

            }
            else if($category != ""){
                $filteredData = array_filter($userData, function ($item) use ($category) {
                    return isset($item['meta']['category']->meta_name) && in_array("$category", array_column($item['meta']['category'], 'meta_name'));
                });
            }
            else if($language != ""){
                $filteredData = array_filter($userData, function ($item) use ($language) {
                    return isset($item['meta']['language']->meta_name) && in_array("$language", array_column($item['meta']['language'], 'meta_name'));
                });
            }

            // Apply the limit to the filtered data
            if ($limit != "" && $skip != "") {
                $filteredData = array_slice($filteredData, $skip, $limit);
            }
            else if ($limit != "") {
                $filteredData = array_slice($filteredData, 0, $limit);
            }
            else if ($skip != "") {
                $filteredData = array_slice($filteredData, $skip);
            }

            // Convert the associative array to a simple array
            $filteredData = array_values($filteredData);
 
            header('Content-Type: application/json');
            // Return JSON response
            echo json_encode($filteredData);
            exit;

        }

    } else {
        // Debugging statement
        echo json_encode(array('error' => 'Services not found or SQL query error: ' . $conn->error));
        exit;
    }
}

?>
