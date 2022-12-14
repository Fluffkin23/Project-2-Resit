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
<div class="contact-section">

    <h1>Contact Us</h1>
    <div class="border"></div>
    <form class="contact-form" action="send.php" method="post">
      <input type="text" class="contact-form-text" placeholder="Your name">
      <input type="email" name="email" class="contact-form-text" placeholder="Your email">
      <input type="text" name="subject" class="contact-form-text" placeholder="subject">
      <textarea class="contact-form-text" name="message" placeholder="Your message"></textarea>
      <input type="submit" name="send" class="contact-form-btn" value="Send">
    </form>
  </div>


<footer class="login-footer">
        <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div>
</footer> 
</body>
</html>