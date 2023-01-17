<?php
$connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function fetch_array($result)
{
    return mysqli_fetch_array($result);
}

function escape_string($string)
{
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function redirect($location)
{
    header("Location: $location");
    exit();
}

function get_products()
{
    $query = query("SELECT * FROM services");
    while ($row = fetch_array($query)) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['ID']}</td>
                <td>{$row['SERVICE_NAME']} </td>
                <td>{$row['SERVICE_DESCRIPTION']}</td>
                <td>{$row['SERVICE_PRICE']}</td>
                <td> <a class='btn btn-danger' href = "delete_service.php?delete&id={$row['ID']}"><span class='glyphicon glyphicon-remove'></span></a></td>
                <td> <a class='btn btn-danger' href = "edit_service.php?edit&id={$row['ID']}"><span class='glyphicon glyphicon-edit'></span></a></td>

            </tr>
    DELIMETER;
        echo $product;
    }
}

function add_Service()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addService'])) {
        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
        $name = $_POST['service_name'];
        $description = $_POST['service_description'];
        $price = $_POST['service_price'];

        $sql = "INSERT INTO `services`
                        (SERVICE_NAME,SERVICE_DESCRIPTION,SERVICE_PRICE) VALUES (?,?,?)";
        if ($query = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($query, 'ssd', $name, $description, $price);
        }
        mysqli_stmt_execute($query);
        if ($query) {
            echo "<script> window.location.href = 'services.php';</script>";
        } else {
            echo "error";
        }
    }
}

function add_Admin()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addAdmin'])) {
        $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
        $username = $_POST['username'];
        $password = $_POST['password'];
        $usertype = "admin";
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO `login`
                        (ID,EMAIL,PASSWORD,USERTYPE) VALUES (0,?,?,?)";
        if ($query = mysqli_prepare($connection, $sql)) {
            mysqli_stmt_bind_param($query, 'sss', $username, $hashedpassword, $usertype);
        }
        mysqli_stmt_execute($query);
        if ($query) {
            echo "Entry Successfull";
        } else {
            echo "error";
        }
    }
}

function get_users()
{
    $query = query("SELECT * FROM customer ");
    while ($row = fetch_array($query)) {
        $user = <<<DELIMETER
            <tr>
                <td>{$row['CUSTOMER_ID']} </td>
                <td>{$row['NAME']} </td>
                <td>{$row['EMAIL']}</td>
                <td>{$row['PHONE_NUMBER']}</td>
               <td> <a class='btn btn-danger' href = "delete_customer.php?delete&id={$row['CUSTOMER_ID']}"><span class='glyphicon glyphicon-remove'></span></a></td>                     
            </tr>
DELIMETER;
        echo $user;
    }
}

function updateService()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    if (isset($_POST['update'])) {
        $sql = $connection->prepare("UPDATE services SET SERVICE_NAME=? , SERVICE_DESCRIPTION=? , SERVICE_PRICE=? WHERE ID = ?");
        $service_name = $_POST['service_name'];
        $service_description = $_POST['service_description'];
        $service_price = $_POST['service_price'];
        $sql->bind_param("sssi", $service_name, $service_description, $service_price, $_GET["id"]);
        if ($sql->execute()) {
            $success_message = "Edited Successfully";
            echo "<script> window.location.href = 'services.php';</script>";
        } else {
            $error_message = "Problem in Editing Record";
        }
    }
}

function getStatusInProgess()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());


    if (isset($_GET['id'])) {
        $sql = $connection->prepare("UPDATE ticket_table SET STATUS = ? WHERE TICKET_ID = ?");
        $service_name = "IN PROGRESS";

        $sql->bind_param("si", $service_name, $_GET["id"]);
        if ($sql->execute()) {
            $success_message = "Edited Successfully";
            echo "<script> window.location.href = 'ticket.php';</script>";
        } else {
            $error_message = "Problem in Editing Record";
        }
    }
}

function get_ticket()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $sql = "SELECT * FROM ticket_table";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function get_request_service()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $sql = "SELECT * FROM reqeust_services";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['email']} </td>
                <td>{$row['customer_id']}</td>
                <td>{$row['service_name']}</td>
                <td>{$row['customer_name']} </td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function ticket_done()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $status = "DONE";
    $sql = "SELECT * FROM ticket_table WHERE STATUS=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function ticket_in_progress()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $status = "IN PROGRESS";
    $sql = "SELECT * FROM ticket_table WHERE STATUS=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function ticket_Desc()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $sql = "SELECT * FROM ticket_table ORDER BY date(RECEIVE_DATE) DESC";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function ticket_Asc()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $sql = "SELECT * FROM ticket_table ORDER BY date(RECEIVE_DATE) ASC";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

function ticket_new()
{
    $connection = mysqli_connect("localhost", "root", "", "service_it") or die("Connection Failed" . mysqli_connect_error());
    $status = "NEW";
    $sql = "SELECT * FROM ticket_table WHERE STATUS=?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $status);

    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $product = <<<DELIMETER
            <tr>
                <td>{$row['TICKET_ID']}</td>
                <td>{$row['EMAIL']} </td>
                <td>{$row['SERVICE_NAME']}</td>
               <td>{$row['SERVICE_DESCRIPTION']}</td>
                  <td>{$row['RECEIVE_DATE']}</td>
                <td>{$row['STATUS']}</td>
               <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
               <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
            </tr>
            DELIMETER;
        echo $product;
    }
}

?>
