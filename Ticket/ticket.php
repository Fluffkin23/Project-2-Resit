<?php session_start();
$date = date('y-m-d h:i:s');
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/style.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>

<body>

<form action="" method="POST">
    <div class="reg-title">Need help? Open your ticket below:</div>
    <h1>Please select your service</h1>
    <select name="services" id="services">

        <?php
        // good to show protected content

        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
        if ($_SESSION['sessionEmail']) {
            $username = $_SESSION['sessionEmail'];
            $get_user = "SELECT * from reqeust_services WHERE EMAIL =?";
            $stmt = $connection->prepare($get_user);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<option value=\"owner1\">" . $row['service_name'] . "</option>";
                $customerName = $row['service_name'];
            }
        } else {
            header("Location: ticket.php?error=sessionerror");
        }
        ?>

    </select>
    <input type="text" class="description" name="description" placeholder="Describe your problem:">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        if ($_POST['description'] == null) {
            echo "Please type a description";
        }
        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
        $description = $_POST['description'];
        $status = "NEW";

        date('Y-m-d H:i:s', strtotime($date));

        $sql = "INSERT INTO `ticket_table`
                                (EMAIL,SERVICE_NAME,SERVICE_DESCRIPTION,RECEIVE_DATE,STATUS) VALUES (?,?,?,?,?)";
        if ($query = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($query, 'sssss', $username, $customerName, $description, $date, $status);
        }
        mysqli_stmt_execute($query);
        if ($query) {
            echo "Entry Successfull";
        } else {
            echo "error";
        }
    }
    ?>
    <input type="submit" name="submit" value="Submit">
</form>
</body>

</html>