<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Email</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">

<div class="logo">
    <img src="/res/logo.png" alt="logo">
</div>

<ul class="nav-links">

    <div class="menu">
        <li><a href="/contracts.html">Contracts</a></li>
        <li><a href="/services.php">Services</a></li>
        <li><a href="/ticket.html">Ticket</a></li>
        <li><a href="/contactsUs.html">Contact Us</a></li>
        <li><a href="/login.html">Log In</a></li>
    </div>

</ul>
</nav>
<main class="login_container">
            <div class="login-title">
                <h1> Contact Form </h1>
            </div>
            <div class="login-form">
                <form action="send.php" method="post">
                    <div class="login-data">
                        <div class="email">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email">
                        </div>
                        <div class="password">
                            <label for="Subject">Subject</label>
                            <input type="text" name="subject" id="subject">
                        </div> 
                        <div class="password">
                            <label for="Message">Message</label>
                            <input type="text" name="message" id="message">
                        </div> 
                    </div>
                    <div class="submit-button">
                        <input type="submit" name="send" value="Send Email">
                    </div>
                </form>
            </div>
</main>

<!-- <footer class="login-footer">
            <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div>
        </footer> -->
</body>
</html>