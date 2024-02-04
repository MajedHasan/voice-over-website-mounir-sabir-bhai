<?php

    require("./config/config.php");

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the root URL or any other desired location
    header("Location: /");
    exit; // Ensure script stops here

?>