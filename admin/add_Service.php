<?php
include("header.php");
include ("functions.php");
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
                        <h1 class="page-header"> Add Services </h1>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <!--Main Content Start Here-->
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="service-name">Service name </label>
                                <input type="text" name="service_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="service_description">Service Description</label>
                                 <textarea name="service_description" id="" cols="30" rows="10" class="form-control" required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-xs-3">
                                    <label for="service-price">Service Price</label>
                                    <input type="number" name="service_price" class="form-control" size="60" required>
                                </div>
                            </div>
                        </div>
                        <!--Main Content End here-->
                        <!-- SIDE Buttons Start here -->
                        <aside id="admin_sidebar" class="col-md-4">
                            <div class="form-group">
                                <input type="submit" name="addService" class="btn btn-primary btn-lg" value="Add Service">
                                <?php
                                    add_Service();
                                ?>
                            </div>
                            <!--SIDE buttons end here-->
                        </aside>
                    </form>
                </div>
            </div>
        </div>
    </div>
<foote></foote>
</body>
</html>

