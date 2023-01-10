<?php
 if(isset($_POST["submit"])) {
     $email = $_POST["email"];
     $password = $_POST["email"];

     require_once 'dbh.inc.php';
     require_once 'functions.inc.php';

     if (emptyInputLogin($email, $password) !== false) {
         header("location: ../login.php?error=emptyInput");
         exit();
     }

     loginUSer($conn, $email, $password);
 }
 else{
     header("location: ../login.php");
     exit();
 }