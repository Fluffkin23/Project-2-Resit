<?php
    if(isset($_POST["submit"])){

        $username = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];
        $phone = $_POST["number"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';


        if(emptyInputSignup($username, $surname, $email, $phone, $password, $rpassword) !== false){
            header("location: ../signup.php?error=emptyInput");
            exit();
        }

        if(invalidUid($username) !== false){
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
            $conn, $username, $email) !== false){
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $username, $surname, $email, $phone, $password, $rpassword);


    }
    else{
        header("location: ../signup.php");
        exit();
    }