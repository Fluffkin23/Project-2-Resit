<?php session_start();
echo $_SESSION['sessionEmail'] ?>
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

    <select name="services" id="services">

        <?php
        // good to show protected content

        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());

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
        ?>

    </select>
    <input type="text" name="description" placeholder="Description">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
        $description = $_POST['description'];
        $status = "NEW";
        $date = date("Y-m-d");
        $_POST['date'] = $date;

        $sql = "INSERT INTO `ticket_table`
                                (EMAIL,SERVICE_NAME,SERVICE_DESCRIPTION,DATE,STATUS) VALUES (?,?,?,?,?)";
        if ($query = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($query, 'sssis', $username, $customerName, $description, $date, $status);
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