<?php
require_once("connectionDB.php");
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

        <select name="services" id="services">

            <?php
            if (isset($_SESSION['EMAIL']) && $_SESSION['PASSWORD']['loggedIn']) {
                // good to show protected content
            

                $sql = "SELECT SERVICE_NAME FROM request_services" . $_SESSION['EMAIL'];
                ;
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['SERVICE_NAME'];
                    $service = $row['SERVICE_NAME'];
                    echo "<option value='$id'>$service</option>";
                }
            }
        ?>

        </select>
        <input type="text" name="description" placeholder="Description">
        <input type="submit" name="submit" value="Submit">

    </form>

    <?php

    if (isset($_SESSION['EMAIL']) && $_SESSION['PASSWORD']['loggedIn']) {
        // good to show protected content
    

        if (isset($_POST['submit'])) {
            $serviceName = $_POST['services'];
            $description = $_POST['description'];

            $sql = "INSERT INTO ticket_table (SERVICE_NAME, SERVICE_DESCRIPTION) VALUES ('$serviceName', '$description')" or die(mysqli_error($db)) . $_SESSION['EMAIL'];
            ;
            $result = mysqli_query($connection, $sql) or trigger_error("Query Failed! SQL: $sql - Error: " . mysqli_error($connection), E_USER_ERROR);
            if (!$result) {
                die('Query FAILED' . mysqli_error($connection));
            } else {
                echo '<script type="text/javascript">
            window.onload = function () { alert("Record created!"); } 
        </script>';
            }
        }



        //get results from database
        $result = mysqli_query($connection, "SELECT SERVICE_NAME, SERVICE_DESCRIPTION, DATE, STATUS FROM ticket_table");
        $all_property = array(); //declare an array for saving property
    


        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "Service name: " . $row["SERVICE_NAME"] . " - Service description: " . $row["SERVICE_DESCRIPTION"] . " - Date " . $row["DATE"] . " - Status " . $row["STATUS"] . "<br>";
            }
        } else {
            echo "0 results";
        }
    }
$connection->close();
    ?>
</body>

</html>