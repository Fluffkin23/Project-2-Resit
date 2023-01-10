<?php
require_once("functions.php");
include("header.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Bootstrap Admin Template</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="row">
                    <h1 class="page-header">Tickets </h1>
                    <a href="ticket_new.php" >Tickets just received </a> <br>
                    <a  href="ticket_done.php" >Tickets Done </a><br>
                    <a  href="ticket_in_progress.php" >Tickets In Progress </a><br>
                    <a  href="ticket_asc.php" >Ticket in Asc way </a><br>
                    <a  href="ticket_desc.php" >Ticket in Desc way </a><br>
                    <a  href="ticket.php" >All tickets </a><br>



                </div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Ticket_ID</th>
                            <th>Customer_ID</th>
                            <th>Service_ID</th>
                            <th>Service_Name</th>
                            <th>Service_Description</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php ticket_Desc(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>
</html>




