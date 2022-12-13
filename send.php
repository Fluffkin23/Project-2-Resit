<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if(isset($_POST['send'])) 
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
}


