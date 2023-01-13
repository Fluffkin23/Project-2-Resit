<?php

$host = "127.0.0.1";
$user = "root";
$pass = "";
$db_name = "service_it";

//create connection
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connection = mysqli_connect($host, $user, $pass, $db_name);

?>