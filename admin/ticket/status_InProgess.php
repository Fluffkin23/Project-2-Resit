<?php
$connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
if (isset($_GET['id']))
{
    $sql = $connection->prepare("UPDATE ticket_table SET STATUS = ? WHERE TICKET_ID = ?");
    $service_name = "IN PROGRESS";

    $sql->bind_param("si", $service_name, $_GET["id"]);
    if ($sql->execute()) {
        $success_message = "Edited Successfully";
        echo "<script> window.location.href = 'ticket.php';</script>";
    } else {
        $error_message = "Problem in Editing Record";
    }
}
?>