<?php

include("../../config/db.php");

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Extract data from the JSON object
    $uid = $data['uid'];
    $name = $data['name'];
    $email = $data['email'];
    $number = $data['number'];
    $price = $data['price'];
    $selectedCategories = $data['selectedCategories'];
    $selectedLanguages = $data['selectedLangauges'];
    $voices = $data['voices'];

    // Insert data into the 'service' table
    $service_query = "INSERT INTO services (uid, media, name, email, phone, price, status) 
                      VALUES (?, '', ?, ?, ?, ?, 'pending')";
    
    $stmt = $conn->prepare($service_query);
    $stmt->bind_param("sssss", $uid, $name, $email, $number, $price);

    if ($stmt->execute()) {
        $service_id = $conn->insert_id; // Get the ID of the last inserted service

        // Move voice files to the specified folder
        $targetFolder = "../../assets/voices/$uid/";
        if (!file_exists($targetFolder)) {
            mkdir($targetFolder, 0777, true);
        }

        $voiceMediaIds = []; // Initialize an array to store media IDs for each voice

        foreach ($voices as $voice) {
            $url = $voice['url'];
            $extension = $voice['extension'];

            // Generate a unique filename
            $filename = uniqid('voice_') . '.' . $extension;

            // Use file_get_contents to fetch the contents of the Blob URL
            $voiceContent = file_get_contents($url);

            // Write the contents to the file in the target folder
            file_put_contents($targetFolder . $filename, $voiceContent);

            // Insert information into the 'media' table
            $media_query = "INSERT INTO media (uid, type, url, path, extension) 
                            VALUES (?, 'audio', ?, '', ?)";
            
            $stmtMedia = $conn->prepare($media_query);
            $stmtMedia->bind_param("sss", $uid, $filename, $extension);

            if ($stmtMedia->execute()) {
                $voiceMediaIds[] = $conn->insert_id; // Store the media ID for this voice
            } else {
                // Handle the case where inserting into the 'media' table failed
                respondWithError('Error inserting media data');
            }
        }

        // Insert information into the 'service_meta' table for each language
        foreach ($selectedLanguages as $language) {
            $language_id = $language['id'];

            foreach ($voiceMediaIds as $voiceMediaId) {
                // Insert information into the 'service_meta' table for each voice
                $service_meta_query = "INSERT INTO service_meta (service_id, meta_id, media_id) 
                                       VALUES (?, ?, ?)";
                
                $stmtServiceMeta = $conn->prepare($service_meta_query);
                $stmtServiceMeta->bind_param("iii", $service_id, $language_id, $voiceMediaId);

                if (!$stmtServiceMeta->execute()) {
                    // Handle the case where inserting into the 'service_meta' table failed
                    respondWithError('Error inserting service_meta data');
                }
            }
        }

        // Insert selected categories into the 'service_meta' table
        foreach ($selectedCategories as $category) {
            $category_id = $category['id'];

            foreach ($voiceMediaIds as $voiceMediaId) {
                // Insert information into the 'service_meta' table for each voice
                $service_meta_query = "INSERT INTO service_meta (service_id, meta_id, media_id) 
                                       VALUES (?, ?, ?)";
                
                $stmtServiceMeta = $conn->prepare($service_meta_query);
                $stmtServiceMeta->bind_param("iii", $service_id, $category_id, $voiceMediaId);

                if (!$stmtServiceMeta->execute()) {
                    // Handle the case where inserting into the 'service_meta' table failed
                    respondWithError('Error inserting service_meta data');
                }
            }
        }

        // Output a response
        respondWithSuccess('Form data received and inserted successfully');
    } else {
        // Handle the case where the service insertion failed
        respondWithError('Error inserting service data');
    }
}

function respondWithSuccess($message) {
    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => $message]);
    exit;
}

function respondWithError($message) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => $message]);
    exit;
}

?>
