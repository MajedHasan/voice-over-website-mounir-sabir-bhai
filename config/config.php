<?php 
    require("./config/db.php");

    $server = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


    $query = "SELECT * FROM users WHERE id = '1' ";
    $result = $conn->query($query);

    $loggedInUser = $result->fetch_assoc();
    
?>