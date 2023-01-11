<?php

    include "dbh.inc.php";

    function emptyInputSignup($username, $surname, $email, $phone, $password, $rpassword){
        $result;

        if(empty($username) || empty($surname) || empty($email) || empty($phone) || empty($password) || empty($rpassword)){
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


    function uidExists($conn, $username, $email){
       $sql = "SELECT * FROM customer WHERE NAME = ? OR EMAIL = ?;";
       $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt, $sql)){
           header("location: ../signup.php?error=stmtfailed");
           exit();
       }

       mysqli_stmt_bind_param($stmt, "ss", $username, $email);
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

    function createUser($conn, $username, $surname, $email, $phone, $password){
        $sql = "INSERT INTO customer (NAME, surname, EMAIL, PHONE_NUMBER, password) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "sssss", $username,
            $surname, $email, $phone, $hashedpassword);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../signup.php?error=none");
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

