<?php

include("../config/db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the AJAX request
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);

    // Define variables to store values from JSON data
    $uid = $data['uid'];
    $service_id = $data['service_id'];
    $price = $data['price'];
    $name = $data['name'];
    $email = $data['email'];
    $whatsapp = $data['whatsapp'];
    $language = $data['language'];
    $textForRecording = $data['textForRecording'];
    $paymentType = $data['payment_type'];

    // Additional variables based on payment_type
    $content;
    $codContent = $data['cod_content'] ?? '';
    $cardNumber = $data['card_number'] ?? '';
    $card_holder_name = $data['card_holder_name'] ?? '';
    $cardExpirationData = $data['cardExpirationData'] ?? '';
    $cardCVC = $data['card_cvc'] ?? '';

    // Perform actions based on payment_type
    if ($paymentType === 'COD') {
        // Process COD payment
        $content = json_encode(['cod_content' => $codContent]);
    } elseif ($paymentType === 'Card') {
        // Process Card payment
        // You can use $cardNumber, $card_holder_name, $cardCVC here
        $discountPercentage = 10;
        $discountAmount = ($price * $discountPercentage) / 100;
        $price = $price - $discountAmount;

        $content = json_encode(['card_number' => $cardNumber, 'card_holder_name' => $card_holder_name, 'cardCVC' => $cardCVC, 'cardExpirationData' => $cardExpirationData]);
    } else {
        // Handle other payment types if needed
        $content = 'Unknown payment type';
    }

    // Insert data into the 'orders' table
    $query = "INSERT INTO orders (uid, service_id, name, email, whats_app, language_id, message, payment_type, price, status, payment_info) 
          VALUES ('$uid', '$service_id', '$name', '$email', '$whatsapp', '$language', '$textForRecording', '$paymentType', '$price', 'pending', '$content')";


    if ($conn->query($query) === TRUE) {
        echo json_encode(array('success' => true, 'data' => 'Order placed successfully'));
        exit;
    } else {
        echo json_encode(array('error' => 'Error placing order: ' . $conn->error));
        exit;
    }
}

?>
