<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "service_it";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if (!$conn) {
    echo "Not connected";
}
