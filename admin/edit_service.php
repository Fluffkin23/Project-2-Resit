<?php include("header.php");
require_once("functions.php") ;

if(isset($_GET['id']))
{
    $query = query("SELECT * FROM services WHERE SERVICE_ID = " . escape_string($_GET['id']) . " ");
    while ($row = fetch_array($query))
    {
        $name = escape_string($row['SERVICE_NAME']);
        $description = escape_string($row['SERVICE_DESCRIPTION']);
        $price = escape_string($row['SERVICE_PRICE']);
    }
}
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
                    <h1 class="page-header"> Edit Services </h1>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <!--Main Content Start Here-->
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="product-title">Service name </label>
                            <input type="text" name="service_name" class="form-control" value="<?php echo $name ?>" required ;
                        </div>
                        <div class="form-group">
                            <label for="product-title">Service Description</label>
                            <textarea name="service_description" id="" cols="30" rows="10"  class="form-control" required> <?php echo $description?></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-3">
                                <label for="product-price">Service Price</label>
                                <input type="number" name="service_price" class="form-control" size="60" value = "<?php echo $price?>" required>
                            </div>
                        </div>
                    </div>
                    <!--Main Content End here-->

                    <!-- Update Button Start here -->
                    <aside id="admin_sidebar" class="col-md-4">
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-warning btn-lg" value="Update Service">
                            <?php  updateService();?>
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

