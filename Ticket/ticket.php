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

        $sql = "SELECT SERVICE_NAME FROM request_services";
        $result = mysqli_query($connection, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['SERVICE_NAME'];
            $service = $row['SERVICE_NAME'];
            echo "<option value='$id'>$service</option>";
        }
        ?>

    </select>
    <input type="text" name="description" placeholder="Description">
    <input type="submit" name="submit" value="Submit">

</form>

<?php


if (isset($_POST['submit'])) {
    $serviceName = $_POST['services'];
    $description = $_POST['description'];

    $sql = "INSERT INTO ticket_table (SERVICE_NAME, SERVICE_DESCRIPTION) VALUES ('$serviceName', '$description')" or die(mysqli_error($db));
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
$result = mysqli_query($connection, "SELECT * FROM ticket_table");
$all_property = array(); //declare an array for saving property

//showing property
echo '<table class="data-table">
        <tr class="data-heading">'; //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td class=tdStyle>' . $property->name . '</td>'; //get field name for header
    $all_property[] = $property->name; //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "
    </table>";
?>
</body>

</html>