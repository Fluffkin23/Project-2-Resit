<?php
require_once("functions.php");
require_once("config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM services WHERE SERVICE_ID = ".escape_string($_GET['id'])." ");
    redirect("services.php");
    exit();
}
else
{
    redirect("services.php");
    exit();
}
?>