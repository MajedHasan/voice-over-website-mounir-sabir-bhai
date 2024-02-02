<?php

// include("../config/db.php");

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Get JSON data from the AJAX request
//     $json_data = file_get_contents("php://input");
//     $data = json_decode($json_data, true);

//     // Get user ID from the JSON data
//     $limit = $conn->real_escape_string($data['limit']);

//     // Fetch user information from multiple tables
//     $query = "SELECT s.*, m.url, mt.meta_name, mt.meta_type
//             FROM services s
//             LEFT JOIN media m ON s.media = m.id
//             LEFT JOIN service_meta sm ON sm.service_id = s.id
//             LEFT JOIN meta mt ON mt.id = sm.meta_id";

//     // $query .= " LIMIT $limit";

//     $result = $conn->query($query);

//     if ($result->num_rows > 0) {
//         // Fetch all rows into an array
//         $userData = array();
//         while ($row = $result->fetch_assoc()) {
//             $serviceId = $row['id'];

//             // Check if the service ID already exists in the array
//             if (!isset($userData[$serviceId])) {
//                 $userData[$serviceId] = array(
//                     'id' => $row['id'],
//                     'name' => $row['name'],
//                     'email' => $row['email'],
//                     'price' => $row['price'],
//                     'url' => $row['url'],
//                     'meta' => array(), // Initialize an array for meta
//                 );
//             }

//             // Add the meta information to the array based on meta_type
//             $metaType = $row['meta_type'];
//             $metaName = $row['meta_name'];
//             $userData[$serviceId]['meta'][$metaType][] = $metaName;
//         }

//         // Convert the associative array to a simple array
//         $userData = array_values($userData);

//         // Return JSON response
//         header('Content-Type: application/json');
//         echo json_encode($userData);
//         exit;
//     } else {
//         // Debugging statement
//         echo json_encode(array('error' => 'User not found or SQL query error: ' . $conn->error));
//         exit;
//     }
// }

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
        $totalRows = 0;

        while ($row = $result->fetch_assoc()) {
            $serviceId = $row['id'];

            // Check if the service ID already exists in the array
            if (!isset($userData['data'][$serviceId])) {
                $userData['data'][$serviceId] = array(
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'price' => $row['price'],
                    'meta' => array(), // Initialize an array for meta
                );
                $totalRows++;
            }

            // Add the meta information to the array based on meta_type
            $metaType = $row['meta_type'];
            $metaName = $row['meta_name'];
            $url = $row['url'];

            // If metaType doesn't exist, initialize it
            if (!isset($userData['data'][$serviceId]['meta'][$metaType])) {
                $userData['data'][$serviceId]['meta'][$metaType] = array();
            }

            // Add meta information to the array
            $userData['data'][$serviceId]['meta'][$metaType][] = array(
                'meta_name' => $metaName,
                'url' => $url,
            );
        }

        if ($category == "") {


            // Apply the limit to the filtered data
            if ($limit != "" && $skip != "") {
                $userData['data'] = array_slice($userData['data'], $skip, $limit);
            }
            else if ($limit != "") {
                $userData['data'] = array_slice($userData['data'], 0, $limit);
            }
            else if ($skip != "") {
                $userData['data'] = array_slice($userData['data'], $skip);
            }

            // Convert the associative array to a simple array
            $userData['data'] = array_values($userData['data']);
            $userData['total'] = $totalRows;

            header('Content-Type: application/json');
            // Return unfiltered data
            echo json_encode($userData);
            exit;
            
        } else {

            // Filter the array based on meta_type == 'category' and meta_name == 'example'
            $filteredData = array_filter($userData['data'], function ($item) use ($category) {
                return isset($item['meta']['category']) && in_array("$category", array_column($item['meta']['category'], 'meta_name'));
            });

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
            $filteredData['data'] = array_values($filteredData);
            $filteredData['total'] = $totalRows;
 
            header('Content-Type: application/json');
            // Return JSON response
            echo json_encode($filteredData);
            exit;

        }



    } else {
        // Debugging statement
        echo json_encode(array('error' => 'User not found or SQL query error: ' . $conn->error));
        exit;
    }
}

?>
