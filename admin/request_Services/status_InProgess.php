<?php
$connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
if (isset($_GET['id'])) {
    $sql = $connection->prepare("UPDATE reqeust_services SET status = ? WHERE id = ?");
    $service_name = "IN PROGRESS";
    $sql->bind_param("si", $service_name, $_GET["id"]);
    if ($sql->execute()) {
        $success_message = "Edited Successfully";
        echo "<script> window.location.href = 'request_Services.php';</script>";
    } else {
        $error_message = "Problem in Editing Record";
    }
}
?>