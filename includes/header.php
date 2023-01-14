    <?php
    session_start();
    require_once 'database.php';
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <title>Document</title>
    </head>
    <body>
    <nav class="navbar">

        <div class="logo">
            <img src="/res/logo.png" alt="logo">
        </div>

        <ul class="nav-links">

            <div class="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="contracts.php">Contracts</a></li>
                <li><a href="ticket.html">Ticket</a></li>
                <?php
                if (isset($_SESSION["sessionId"])) {
                    echo "<li><a href='includes/logout-inc.php'>Log Out</a></li>";
                    echo "<li><a href='services.php'>Services</a></li>";
                    echo "<li><a href='myservices.php'>My Services</a></li>";
                } else {
                    echo "<li><a href='Registration.php'>Sign Up</a></li>";
                    echo "<li><a href='login.php'>Log in</a></li>";
                }
                ?>
            </div>

        </ul>
</nav>