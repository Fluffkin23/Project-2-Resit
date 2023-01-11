<?php

    include "dbh.inc.php";

    function emptyInputSignup($username, $email, $phone, $password, $rpassword){
        $result;

        if(empty($username)  || empty($email) || empty($phone) || empty($password) || empty($rpassword)){
            $result = true;
        }
        else{
            $result = false;
        }
        return $result;
    }

    function invalidUid($username){
        $result;

        if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
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


    function uidExists($conn, $email){
       $sql = "SELECT * FROM customer WHERE EMAIL = ?;";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location: ../resouce/signup.php?error=stmtfailed");
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

    function insertIntoCustomer($conn,$name,$email, $phoneNumber)
    {
    $sql = "INSERT INTO customer (NAME,EMAIL,PHONE_NUMBER) 
                VALUES (?, ?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssi", $name, $email, $phoneNumber);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
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
    function loginUser($conn, $email, $password){
        $uidExists = uidExists($conn, $email, $password);

        if($uidExists === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $hashedpassword = $uidExists["password"];
        $checkedPassword = password_verify($password, $hashedpassword);

        if($checkedPassword === flase) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkedPassword === true){
            session_start();
            $_SESSION["CUSTOMER_ID"] = $uidExists["CUSTOMER_ID"];
            $_SESSION["useruid"] = $uidExists["userUid"];
            header("location: ../index.php");
            exit();
        }
    }

