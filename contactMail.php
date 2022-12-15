<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if(isset($_POST['send'])) 
{
  if((!empty($_POST['email']))&& (!empty($_POST['subject']))&&(!empty($_POST['message'])))
  {
    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {

      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->SMTPAuth = true;
      $mail->Username = 'kaisersunny2016@gmail.com';
      $mail->Password = 'ouadtfpdgngnsmxw';
      $mail->Port = 465;

      $mail->setFrom('kaisersunny2016#gmail.com');

      $mail->addAddress($_POST['email']);

      $mail->isHTML(true);

      $mail->Subject = $_POST['subject'];
      $mail->Body = $_POST['message'];

      $mail->send();

      echo
      "
      <script>
        alert('Email Sent successfully');
        document.location.href = 'contactMail.php';
      </script>
      ";
    }else
    {
      echo
      "
      <script>
      alert('Email not valid');
      document.location.href = 'contactMail.php';
      </script>
      ";
    }
    } else 
    {
      echo
      "
      <script>
      alert('Email not sent successfully! please fill up email, subject and message');
      document.location.href = 'contactMail.php';
      </script>
      ";
  }
}
?>

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
    <form class="contact-form" action="<?= htmlentities($_SERVER['PHP_SELF']);?>" method="post">
      <input type="text" class="contact-form-text" placeholder="Your name">
      <input type="text" name="email" class="contact-form-text" placeholder="Your email">
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