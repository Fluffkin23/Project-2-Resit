<?php

    include "dbh.inc.php";

    function emptyInputSignup($name, $email, $phoneNumber, $password, $rpassword){
        $result;

        if(empty($name)  || empty($email) || empty($phoneNumber) || empty($password) || empty($rpassword)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($name){
        $result;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $name)){
            $result = true;
        }
            else{
                $result = false;
            }
        return $result;
    }

    function invalidEmail($email){
        $result;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result = true;
        }
        else{
            $result = false;
        }
            return $result;
        }

    function passwordMatch($password, $rpassword){
        $result;

        if($password !== $rpassword){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }


    function uidExists($conn, $email,$password){
       $sql = "SELECT * FROM customer WHERE EMAIL = ?;";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location: ../Resources/signup.php?error=stmtfailed");
           exit();
       }

       mysqli_stmt_bind_param($stmt, "s", $email);
       mysqli_stmt_execute($stmt);

       $resultData = mysqli_stmt_get_result($stmt);

       if($row = mysqli_fetch_assoc($resultData)){
           return $row;
       }
       else{
           $result = false;
           return $result;
       }

       mysqli_stmt_close($stmt);
    }

    function createUser($conn,$email, $password,$name,$phoneNumber){
        $sql = "INSERT INTO login (EMAIL,PASSWORD,USERTYPE) 
                VALUES (?, ?,?)";
        $stmt = mysqli_stmt_init($conn);

        $sql2 = "INSERT INTO customer (NAME,EMAIL,PHONE_NUMBER) 
                VALUES (?, ?,?)";
        $stmt2 = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        if(!mysqli_stmt_prepare($stmt2, $sql2)){
            header("location: ../register/signup.php?error=stmtfailed");
            exit();
        }

        $usertype = "user";
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sss", $email, $hashedpassword,$usertype);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        mysqli_stmt_bind_param($stmt2, "ssi", $name, $email, $phoneNumber);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);


        header("location: ../register/signup.php?error=none");
        exit();
    }

    function emptyInputLogin($email, $password){
        $result;

        if (empty($email) || empty($password)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function loginUser()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Get input values
            $email = $_POST["email"];
            $passwordCustomer = $_POST["password"];


            //Connect to DB and Select DB
            if ($conn = mysqli_connect('localhost','root','')) {
                mysqli_select_db($conn, 'service_it');

                //Select the record with user data from DB
                $sql = "SELECT `EMAIL`, `PASSWORD`, `USERTYPE` FROM `login` WHERE `EMAIL`= ?";
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $email);

                    //Execute statement if preparation is successful
                    if (mysqli_stmt_execute($stmt)) {
                    } else {echo "Error. Failed to check staff ID. Try again later";}

                } else {echo "Preparation error. Try again later";}

                //Bind results
                mysqli_stmt_bind_result($stmt, $userName, $password, $userType);
                mysqli_stmt_store_result($stmt);


                if (mysqli_stmt_num_rows($stmt) > 0) {
                    mysqli_stmt_fetch($stmt);
                    if ($email == $userName AND password_verify($passwordCustomer,$password) == True) {
                        //If credentials are correct
                        if($userType == "user")
                        {
                            $_SESSION["$email"] = $email;
                            //Redirect user to staff page
                            echo '<script type="text/javascript">location.href = "../Index/index.php";</script>';
                        }
                        else
                        {
                            echo '<script type="text/javascript">location.href = "../admin/services/services.php";</script>';

                        }
                    } else {
                        //Credentials are incorrect
                        session_destroy();
                        echo "<script type='text/javascript'>alert('Incorrect Employee ID or Password');</script>";
                        echo '<script type="text/javascript">location.href = "employeeLogin.html";</script>';
                    }
                } else {
                    //No employee ID found
                    session_destroy();
                    echo "<script type='text/javascript'>alert('Input Employee ID does not exist. Please try again');</script>";
                    echo '<script type="text/javascript">location.href = "employeeLogin.html";</script>';
                }
            } else {echo "Connection error. Try again later";}
        }
    }

    function getTicketTest($conn)
    {
        $sql = "SELECT * FROM ticket_table WHERE STATUS = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../Resources/signup.php?error=stmtfailed");
            exit();
        }

        $status = "DONE";
        mysqli_stmt_bind_param($stmt, "s", $status);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($resultData)) {
            $product = <<<DELIMETER
<tr>
    <td>{$row['TICKET_ID']}</td>
    <td>{$row['CUSTOMER_ID']}</td>
    <td>{$row['SERVICE_ID']} </td>
    <td>{$row['SERVICE_NAME']}</td>
   <td>{$row['SERVICE_DESCRIPTION']}</td>
      <td>{$row['DATE']}</td>
    <td>{$row['STATUS']}</td>
   <td> <a class='btn btn-danger' href = "status_InProgess.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-check'></span></a></td>
   <td> <a class='btn btn-danger' href = "status_Done.php?update&id={$row['TICKET_ID']}"><span class='glyphicon glyphicon-remove-circle'></span></a></td>
</tr>
DELIMETER;
            echo $product;
        }


        mysqli_stmt_close($stmt);

    }


    ?>