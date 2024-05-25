<?php

    // $dbHost = "127.0.0.1";
    // $dbUser = "root";
    // $dbPass = "";
    // $dbName = "voices";
    // $dbPort = 3306; 

    $dbHost = "185.166.188.103";
    $dbUser = "u674860995_voices";
    $dbPass = "u674860995_Voices";
    $dbName = "u674860995_voices";
    $dbPort = 3306;

    $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);
    // $conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

    // if(mysqli_connect_errno()){
    //    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    //     exit();
    // }

?>