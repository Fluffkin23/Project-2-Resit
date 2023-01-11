<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar">

            <div class="logo">
                <img src="../res/logo.png" alt="logo">
            </div>

            <ul class="nav-links">

                <div class="menu">
                    <li><a href="/Contract/contracts.html">Contracts</a></li>
                    <li><a href="/Services/services.html">Services</a></li>
                    <li><a href="/Ticket/ticket.html">Ticket</a></li>
                    <li><a href="/contactsUs.html">Contact Us</a></li>
                    <?php
                        if (isset($_SESSION["CUSTOMER_ID"])){
                            echo "<li><a href='/profile.php'>Profile Page</a></li>";
                            echo "<li><a href='../login/logout.inc.php'>Log Out</a></li>";
                        }
                        else{
                            echo "<li><a href='../register/signup.php'>Sign Up</a></li>";
                            echo "<li><a href='../login/login.php'>Log In</a></li>";
                        }
                    ?>


                </div>

            </ul>
        </nav>
    </header>
</body>

</html>