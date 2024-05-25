<?php 

    require("../config/db.php");

    session_start();

    $server = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    // Use the null coalescing operator to simplify the check
    $loggedInUser = $_SESSION['loggedInUser'] ?? null;

    // echo "<pre>";
    // print_r($_SESSION['loggedInUser']['role'] != 'admin');
    // echo "</pre>";

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

    <!-- Font Awesome Icon CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <!-- Font Awesome Icon Not CDN -->
    <link rel="stylesheet" href="/assets/css/fontAwesome.css">

    <!-- Diasy UI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Diasy UI Not CDN -->
    <link rel="stylesheet" href="/assets/css/daisyUI.css">

    <!-- Swiper JS CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Toastify CSS CDN -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <?php
    
        if(isset($pageStyleSheets) && $pageStyleSheets != ""){
            echo $pageStyleSheets;
        }

    ?>

</head>
<body>

    <main class="flex w-full h-screen">

        <?php 
            include("../includes/admin/sidebar.php");
        ?>