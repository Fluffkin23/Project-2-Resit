<?php
include("../resources/header.php");
require_once("../resources/functions.php");
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <h1 class="page-header"> Add new Admin </h1>
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="category-title">Username</label>
                        <input type="text" name="username" class="form-control"required>
                        <label for="category-title">Password</label>
                        <input type="text" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="addAdmin" class="btn btn-primary" value="Add Admin">
                        <?php
                            add_Admin();
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div
</body>
</html>

