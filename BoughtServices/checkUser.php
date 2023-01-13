<?php 

    $host = "127.0.0.1";
    $user = "root";
    $pass = "";
    $db_name = "service_it";

    //create connection
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $db = mysqli_connect($host, $user, $pass, $db_name);

$username = $_SESSION['username'];

$ID_login = mysqli_query($db,"SELECT * FROM `login` WHERE ID=''");
$ID_bought_services = mysqli_query($db,"SELECT * FROM `bought_services` WHERE CUSTOMER_ID=''");

if ($ID_login === $ID_bought_services) {
    require_once("showServices.php");
} else if ($ID_login !== $ID_bought_services) {
    require_once("force_Logout.php");
    echo "Something went wrong, your Customer ID is not matching the Customer Login ID";
}