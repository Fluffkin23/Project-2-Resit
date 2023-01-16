<?php
require_once '../vendor/autoload.php';

include_once '../includes/header.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';


if (isset($_POST['send'])) {
    $services = $_POST['services'];
    $customer = $_POST['customer'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (empty($services) || empty($customer) || empty($email) || empty($phone)) {
        echo
        "
          <script>
          alert('Email not sent successfully! please fill up name, email, services, phone and date');
          document.location.href = 'services.php';
          </script>
      ";
    } else if (!preg_match("/^[a-zA-Z0-9]*/", "$customer")) {
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
    } else if (!filter_var($_SESSION['sessionEmail'], FILTER_VALIDATE_EMAIL) || $email !== $_SESSION['sessionEmail']) {
        echo
        "
      <script>
          alert('Invalid email');
          document.location.href = 'services.php';
          </script>
      ";
    } else {
        $username = $_SESSION['sessionEmail'];
        $get_user = "SELECT * from customer WHERE EMAIL =?";
        $stmt = $conn->prepare($get_user);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $user_id = $row['CUSTOMER_ID'];
        }

        $sql1 = "INSERT into reqeust_services (customer_id,service_name, customer_name,email) VALUES (?,?,?,?)";
        $stmt1 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt1, $sql1)) {
            header("Location: services.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt1, "isss", $user_id, $services, $customer, $email);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_store_result($stmt1);


            $sql = "INSERT into contract (customer_id,service_name, email) VALUES (?,?,?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: services.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "iss", $user_id, $services, $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);

            }

        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);

        $mpdf = new \Mpdf\Mpdf();

        $data = "";

        $data .= "<h1>Your Contract details</h1>";

        $data .= "<strong>Customer name:</strong> " . $customer . "<br>";
        $data .= "<strong>Service:</strong> " . $services . "<br>";
        $data .= "<strong>Email:</strong> " . $email . "<br>";
        $data .= "<strong>Phone:</strong> " . $phone . "<br>";

        $mpdf->WriteHTML($data);

        $pdf = $mpdf->Output(" ", "S");
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
    }


}


?>
<div class="contact-section">
    <h1>Choose services</h1>
</div>
<div class="border"></div>
<form class="contact-form" action="services.php" method="post">
    <input type="text" name="customer" class="contact-form-text">
    <input type="text" name="email" class="contact-form-text" value="<?php echo $_SESSION['sessionEmail'] ?>">
    <input type="text" name="phone" class="contact-form-text">
    <select name="services" class="contact-form-text">
        <option value="">--Select Services--</option>
        <option value="html">HTML</option>
        <option value="php">PHP</option>
        <option value="javascript">JAVASCRIPT</option>
        <option value="java">JAVA PROGRAMMING</option>
    </select>
    <input type="submit" name="send" class="contact-form-btn" value="Send">
</form>
</div>

<div class="footer">
    <h1>The future of change: are you ready?</h1>
</div>
</body>
</html>