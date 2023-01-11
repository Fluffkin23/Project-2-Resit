<?php
    if(isset($_POST["submit"])){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["number"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];

        require_once '../login/dbh.inc.php';
        require_once '../login/functions.inc.php';


        if(emptyInputSignup( $name, $email, $phone, $password, $rpassword) !== false){
            header("location: ../signup.php?error=emptyInput");
            exit();
        }

        if(invalidUid($name) !== false){
            header("location: ../signup.php?error=invalidUid");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }

        if(passwordMatch($password, $rpassword) !== false){
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        if(uidExists(
            $conn, $email) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn,$email, $password,$name,$phone);

    }
    else{
        header("location: ../signup.php");
        exit();
    }