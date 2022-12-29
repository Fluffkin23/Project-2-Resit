<?php
include "conn.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>
        <nav class="navbar">

            <div class="logo">
                <img src="/res/logo.png" alt="logo">
            </div>

            <ul class="nav-links">

                <div class="menu">
                    <li><a href="/contracts.php">Contracts</a></li>
                    <li><a href="/services.php">Services</a></li>
                    <li><a href="/ticket.html">Ticket</a></li>
                    <li><a href="/contactsUs.html">Contact Us</a></li>
                    <li><a href="/login.html">Log In</a></li>
                </div>

            </ul>
        </nav>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">CONTRACT_ID</th>
                <th scope="col">CUSTOMER_ID</th>
                <th scope="col">SERVICE_NAME</th>
                <th scope="col">CUSTOMER_NAME</th>
                <th scope="col">PHONE</th>
                <th scope="col">CITY</th>
                <th scope="col">EMAIL</th>


                <?php

                ?></th>
            </tr>
            </thead>
            <tbody>

            <?php
            $query = "SELECT * FROM `contract`";

            $statement = mysqli_prepare($conn, $query);

                if (mysqli_stmt_execute($statement)) {

                    mysqli_stmt_bind_result($statement, $contractid,$customerid, $servicename, $custmername, $phone, $city, $email);
                    mysqli_stmt_store_result($statement);
                    if (mysqli_stmt_num_rows($statement) > 0) {
                        while (mysqli_stmt_fetch($statement)) {
                            echo '<tr>
                              <th scope="row"> ' . $contractid . '</th>
                              <td>' . $customerid . '</td>
                              <td>' . $servicename . '</td>
                              <td>' . $custmername . '</td>
                              <td>' . $phone . '</td>
                              <td>' . $city . '</td>
                              <td>' . $email . '</td>
                              
            </tr>';
                        }
                    }
                }else{
                    echo "No records found";
                }
                mysqli_stmt_close($statement);
                mysqli_close($conn);
            ?>
            </tbody>
        </table>
        <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div>
    </body
</html>