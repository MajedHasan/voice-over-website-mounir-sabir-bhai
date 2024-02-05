<?php 

    require("../config/db.php");

    session_start();

    $server = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Use the null coalescing operator to simplify the check
    $loggedInUser = $_SESSION['loggedInUser'] ?? null;

    echo "<pre>";
    print_r($_SESSION['loggedInUser']['role'] != 'admin');
    echo "</pre>";

    if(empty($_SESSION['loggedInUser']) || $_SESSION['loggedInUser']['role'] != 'admin'){
        header("Location: /");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle; ?></title>

    <?php
    
        if(isset($pageStyleSheets) && $pageStyleSheets != ""){
            echo $pageStyleSheets;
        }

    ?>

</head>
<body>
