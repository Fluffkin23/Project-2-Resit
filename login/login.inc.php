<?php
 if(isset($_POST["submit"])) {
     $email = $_POST["email"];
     $password = $_POST["password"];

     require_once 'functions.inc.php';

     if (emptyInputLogin($email, $password) !== false) {
         header("location: login.php?error=emptyInput");
         exit();
     }
     loginUser();
     print_r($_SESSION);


 }
 else{
     header("location: login.php");
     exit();
 }
 ?>