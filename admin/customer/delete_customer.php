<?php
require_once("../resources/functions.php");
require_once("../resources/config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM customer WHERE CUSTOMER_ID = ".escape_string($_GET['id'])." ");
  // confirm($query);
    header("Location:users.php");
    exit();
}
else
{
    redirect("users.php");
}
?>
