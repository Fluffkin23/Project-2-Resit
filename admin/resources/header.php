<?php session_start() ?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../indexAdmin/index.php">SB Admin</a>
    </div>
    <!-- Top Menu Items(Admin Name and the logOut Button) -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="fa fa-user"></i> <?php echo $_SESSION['adminUsername'] ?> <b class="caret"></b></a>
            <a href="../../login/logout-inc.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
    </ul>
    <!-- Sidebar Menu Items --->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="../indexAdmin/index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="../services/services.php"><i class="fa fa-fw fa-bar-chart-o"></i> View Services</a>
            </li>
            <li>
                <a href="../services/add_Service.php"><i class="fa fa-fw fa-table"></i> Add Services</a>
            </li>

            <li>
                <a href="../adminFunctionality/addAdmin.php"><i class="fa fa-fw fa-desktop"></i> Add admin</a>
            </li>
            <li>
                <a href="../ticket/ticket.php"><i class="fa fa-fw fa-wrench"></i>Tickets</a>
            </li>
            <li>
                <a href="../customer/users.php"><i class="fa fa-fw fa-wrench"></i>Customers</a>
            </li>
            <li>
                <a href="../request_Services/request_Services.php"><i class="fa fa-fw fa-wrench"></i>Request
                    Services</a>
            </li>
        </ul>
    </div>
</nav>