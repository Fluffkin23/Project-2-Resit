<?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
    }
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create account</title>
</head>
<body>
<header>
    <nav class="navbar">

        <div class="logo">
            <img src="/res/logo.png" alt="logo">
        </div>

        <ul class="nav-links">

            <div class="menu">
                <li><a href="/contracts.html">Contracts</a></li>
                <li><a href="/services.html">Services</a></li>
                <li><a href="/ticket.html">Ticket</a></li>
                <li><a href="/contactsUs.html">Contact Us</a></li>
                <li><a href="/login.html">Log In</a></li>
            </div>

        </ul>
    </nav>
</header>
<div class="reg-container">
    <main class="reg">
        <div class="reg-title">
            Ready?  Create your account.
        </div>
        <form>
            <div class="reg-form">
                <div class="reg-name">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="reg-email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="reg-surname">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="surname">
                </div>
                <div class="reg-phone">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="number" id="number">
                </div>
            </div>
            <div class="reg-submit">
                <input type="submit" value="Create Account" name="submit">
            </div>
        </form>
    </main>
    <footer>
        <!-- <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div> -->
    </footer>
</div>

</body>
</html>