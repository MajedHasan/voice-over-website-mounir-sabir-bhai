<?php 

    require("./config/db.php");

    session_start();

    $server = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Use the null coalescing operator to simplify the check
    $loggedInUser = $_SESSION['loggedInUser'] ?? null;

    if (isset($_GET['loggedInUser'])) {
        // Decode the URL parameter and parse the JSON string
        $loggedInUserData = json_decode(urldecode($_GET['loggedInUser']), true);

        // Store data in session or perform other actions
        $_SESSION['loggedInUser'] = $loggedInUserData;

        // Redirect to the root URL
        header("Location: /");
        exit; // Ensure script stops here
    }

?>