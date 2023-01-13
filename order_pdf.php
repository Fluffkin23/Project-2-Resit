    <?php
    include_once 'includes/header.php';

    include ('vendor/autoload.php');
    $html='<table class="table">
      <thead>
        <tr>
          <th scope="col">Contract id</th>
          <th scope="col">Customer id</th>
          <th scope="col">Service name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>';
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
     $html .= '<tr>
          <th scope="row">' . $contract_id . '</th>
          <td colspan="2">' . $id . '</td>
          <td>' . $service . '</td>
          <td>' . $email . '</td>
        </tr>';
    }
      $html.='</tbody>
    </table>';
    
    $mpdf =new \Mpdf\Mpdf();
    $mpdf->WriteHtml($html);
    $file=time().'.pdf';
    $mpdf->Output();

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    ?>

