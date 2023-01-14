<?php

if(isset($_POST['submit'])) {
    require 'database.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];
    $phone = $_POST['number'];

    if(!empty($name) && !empty($email) && !empty($surname) && !empty($password) && !empty($confirmPass) && !empty($phone)) {
        if (preg_match("/^[a-zA-Z0-9]*/", $name)) {
            if ($password === $confirmPass) {
                $sql = "SELECT NAME from customer WHERE NAME = ? AND EMAIL = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo
                    "
          <script>
          alert('sql error');
          document.location.href = '../register/Registration.php';
          </script>
      ";
                } else {
                    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $rowCount = mysqli_stmt_num_rows($stmt);

                    if ($rowCount <= 0) {
                        $sql = "INSERT INTO customer(NAME, SURNAME, EMAIL,PASSWORD, PHONE_NUMBER) VALUES (?,?,?,?,?)";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo
                            "
              <script>
              alert('sql error');
              document.location.href = '../register/Registration.php';
              </script>
      ";
                        } else {
                            $hashPass = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $email, $hashPass, $phone);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            echo
                            "
              <script>
              alert('registered');
              document.location.href = '../register/Registration.php';
              </script>
      ";
                        }
                    } else {
                        echo
                        "
              <script>
              alert('username and email taken');
              document.location.href = '../register/Registration.php';
              </script>
      ";
                    }
                }

            } else {
                echo
                "
          <script>
          alert('password do not match');
          document.location.href = '../register/Registration.php';
          </script>
      ";
            }
        } else {
            echo
            "
          <script>
          alert('invalid username =' . $name);
          document.location.href = '../register/Registration.php';
          </script>
      ";
        }
    } else {
        echo
        "
          <script>
          alert('empty fields');
          document.location.href = '../register/Registration.php';
          </script>
      ";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
