<?php

    $serverName = "127.0.0.1";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "service_it";

    $conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

    if(!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }