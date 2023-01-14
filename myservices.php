<?php
include_once 'includes/header.php';

?>
    <div class="login-title">
        <h1> My Services </h1>
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
    $id = $_SESSION['sessionId'];
    $get_service_details = "Select * from contract WHERE customer_id=?";
    $stmt = $conn->prepare($get_service_details);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {

       $contract_id = $row['contract_id'];
       $service = $row['service_name'];
       $email = $row['email'];


       ?><tr>
        <th scope="row"><?php echo $contract_id?>
        <br><a href="order_pdf.php?id=<?php echo $contract_id?>">PDF</a></th>
        <td><?php echo $id?><br></td>
        <td><?php echo $service?> </td>
        <td><?php echo $email?></td>
        </tr>
<?php
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    ?>
    </tbody>
</table>


<?php
require_once 'includes/footer.php';
?>