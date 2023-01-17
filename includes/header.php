<?php
session_start();
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar">

    <div class="logo">
        <img src="../res/logo.png" alt="logo">
    </div>

    <ul class="nav-links">

        <div class="menu">
            <li><a href="../Index/index.php">Home</a></li>
            <li><a href="../ShowAllServices/showServices.php">All Services</a></li>
            <?php
            if (isset($_SESSION["sessionEmail"])) {
                echo "<li><a href='../login/logout-inc.php'>Log Out</a></li>";
                echo "<li><a href='../CustomerServices/services.php'>Services</a></li>";
                echo "<li><a href='../CustomerServices/myservices.php'>My Services</a></li>";
                echo "<li><a href='../Ticket/ticket.php'>My Tickets</a></li>";
            } else {
                echo "<li><a href='../register/Registration.php'>Sign Up</a></li>";
                echo "<li><a href='../login/login.php'>Log in</a></li>";
            }
            ?>
        </div>
    </ul>
</nav>