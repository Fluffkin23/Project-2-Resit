<?php
include_once '../includes/header.php';

?>
    <div class="login-title">
        <h1> All Services </h1>
    </div><table class="table">
    <thead>
    <tr>
        <th scope="col">Contract_id</th>
        <th scope="col">Customer_id</th>
        <th scope="col">Service name</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $get_service_details = "Select * from services ";
    $stmt = $conn->prepare($get_service_details);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {

        $contract_id = $row['ID'];
        $service = $row['SERVICE_NAME'];
        $service_desc=$row['SERVICE_DESCRIPTION'];
        $service_price=$row['SERVICE_PRICE'];


        ?><tr>
        <th scope="row"><?php echo $contract_id?>
        <td><?php echo $service?><br></td>
        <td><?php echo $service_desc?> </td>
        <td><?php echo $service_price?></td>
        </tr>
        <?php
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    ?>
    </tbody>
</table>
<?php
require_once '../includes/footer.php';
?>