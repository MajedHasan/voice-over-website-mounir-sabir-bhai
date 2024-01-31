<?php

    $dbHost = "127.0.0.1";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "voices";
    $dbPort = 3306; 

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

    if(mysqli_connect_errno()){
       echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>