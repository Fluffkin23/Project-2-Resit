<?php
require_once("../resources/functions.php");
require_once("../resources/config.php");

if(isset($_GET['id']))
{
    $query = query("DELETE FROM services WHERE ID = ".escape_string($_GET['id'])." ");
    redirect("services.php");
    exit();
}
else
{
    redirect("services.php");
    exit();
}
?>