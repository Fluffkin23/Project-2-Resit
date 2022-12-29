<?php
require_once __DIR__ . '/vendor/autoload.php';

include "conn.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpMailer/Exception.php';
require 'phpMailer/PHPMailer.php';
require 'phpMailer/SMTP.php';

if(isset($_POST['send'])) {
    $services = $_POST['services'];
    $customer = $_POST['customer'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $message = $_POST['message'];


    if (empty($services) || empty($customer) || empty($email) || empty($message)) {
        echo
        "
          <script>
          alert('Email not sent successfully! please fill up name, email, services and message');
          document.location.href = 'services.php';
          </script>
      ";
    } else if (!preg_match('~^[A-Z]{4,8}[0-9]{0,4}$|^[a-z]{4,12}$~', "$customer")) {
        echo
        "
          <script>
          alert('Invalid customer name');
          document.location.href = 'services.php';
          </script>
      ";
    } else if (!preg_match('/^[0-9]{10}+$/', "$phone")) {
        echo
        "
          <script>
          alert('Invalid phone number');
          document.location.href = 'services.php';
          </script>
      ";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        echo
        "
      <script>
          alert('Invalid email');
          document.location.href = 'services.php';
          </script>
      ";
    } else {
        $sql = "INSERT into request_services (SERVICE_NAME, CUSTOMER_NAME) VALUES (?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: services.php?error=sqlerror");
            exit();

        } else {
            mysqli_stmt_bind_param($stmt, "ss", $services, $customer);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $last_id = mysqli_insert_id($conn);
            $sql = "INSERT into contract (id,SERVICE_NAME,CUSTOMER_NAME,PHONE,CITY,EMAIL) VALUES (?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, "isssss", $last_id,$services, $customer, $phone, $city, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
            $mpdf = new \Mpdf\Mpdf();

            $data = "";

            $data .= "<h1>Your Contract details</h1>";

            $data .="<strong>Customer name:</strong> " . $customer . "<br>";
            $data .="<strong>Service:</strong> " . $services . "<br>";
            $data .="<strong>Email:</strong> " . $email . "<br>";
            $data .="<strong>Phone:</strong> " . $phone . "<br>";
            $data .="<strong>City:</strong> " . $city . "<br>";

            $mpdf->WriteHTML($data);

            $pdf = $mpdf->Output(" ","S");
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl';
            $mail->SMTPAuth = true;
            $mail->Username = 'kaisersunny2016@gmail.com';
            $mail->Password = 'ouadtfpdgngnsmxw';
            $mail->Port = 465;

            $mail->setFrom('kaisersunny2016@gmail.com');

            $mail->addAddress($_POST['email']);

            $mail->addStringAttachment($pdf, 'myattachement.pdf');
            $mail->isHTML(true);

            $mail->Subject = $services;
            $mail->Body = '<h3>Requested service from</h3>' . "<h3>" . $customer . "</h3>";

            $mail->send();

            echo
            "
              <script>
                alert('Email Sent successfully');
                document.location.href = 'services.php';
              </script>
            ";
            //$mpdf->Output('my_filename.pdf','D');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <nav class="navbar">

            <div class="logo">
                <img src="res/logo.png" alt="logo">
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
        <div class="contact-section">
            <h1>Choose services</h1>
        </div>
        <div class="border"></div>
        <form class="contact-form" action="services.php" method="post" enctype="multipart/form-data">
            <input type="text" name="customer" class="contact-form-text" placeholder="Your name">
            <input type="text" name="email" class="contact-form-text" placeholder="Your email">
            <input type="text" name="phone" class="contact-form-text" placeholder="Your phone">
            <input type="text" name="city" class="contact-form-text" placeholder="Your city">
            <select name ="services"class="contact-form-text">
                <option value ="">--Select Services--</option>
                <option value ="html">HTML</option>
                <option value ="php">PHP</option>
                <option value ="javascript">JAVASCRIPT</option>
                <option value ="java">JAVA PROGRAMMING</option>
            </select>
            <textarea class="contact-form-text" name="message" placeholder="Your message"></textarea>
            <input type="submit" name="send" class="contact-form-btn" value="Send">
        </form>
        </div>

        <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div>
    </body>
</html>