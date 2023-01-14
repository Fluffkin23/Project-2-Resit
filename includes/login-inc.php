<?php

if(isset($_POST['submit'])) {
    require 'database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        echo
        "
          <script>
          alert('empty fields');
          document.location.href = '/project/index.php';
          </script>
      ";
    }else{
        $sql = "SELECT * FROM login WHERE EMAIL = ?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo
            "
          <script>
          alert('sqlerror');
          document.location.href = '/project/index.php';
          </script>
      ";
        }else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['PASSWORD']);
                if($passCheck == false){
                    echo
                    "
          <script>
          alert('wrong password');
          document.location.href = '/project/index.php';
          </script>
      ";
                }elseif ($passCheck == true){
                    if($row['USERTYPE'] == "user") {
                        session_start();
                       // $_SESSION['sessionId'] = $row['CUSTOMER_ID'];
                        $_SESSION['sessionEmail'] = $row['EMAIL'];
                        $_SESSION['sessionName'] = $row['NAME'];
                        $_SESSION['sessionPhone_number'] = $row['PHONE_NUMBER'];
                        echo
                        "
          <script>
          alert('logged in!');
          document.location.href = '/project/index.php';
          </script>
      ";
                    }
                    else {
                        if ($row['USERTYPE'] == "admin") {
                            session_start();
                            $_SESSION['adminUsername'] = $row['EMAIL'];

                            echo
                            "
          <script>
          alert('logged in!');
          document.location.href = '/project/index.php';
          </script>
      ";
                        }
                    }
                }else{
                    echo
                    "
          <script>
          alert('wrong password');
          document.location.href = '/project/index.php';
          </script>
      ";
                }
            }else {
                echo
                "
          <script>
          alert('no user found');
          document.location.href = '/project/index.php';
          </script>
      ";
            }
        }
    }
}