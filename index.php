<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
    <?php
         include_once "header.php";
    ?>
    <section class="index-intro">
        <?php
        if (isset($_SESSION["customer"])){
            echo "<p> Hello there " . $_SESSION["CUSTOMER_ID"]. " </p>";
            echo "<li><a href='include/logout.inc.php'>Log Out</a></li>";
        }
        else{
            echo "<li><a href='./signup.php'>Sign Up</a></li>";
            echo "<li><a href='./login.php'>Log In</a></li>";
        }
        ?>
    </section>

<div class="description-box">

    <div class="text">
        <h1>Designed for Your Growth</h1>

        <p> We provide personalized, professional systems analysis,
            and computer repair and support services at your home or
            office.
        </p>

        <p> From wireless networking to Windows desktop and server
            networks
            to Apple Mac.
        </p>

        <p> We can provide expert assistance for issues such as virus
            removal, internet security, firewalls and online computer
            help.
        </p>
    </div>

    <div class="text-image">
        <img src="/res/presentation.png" alt="support image for
                    description text">
    </div>

</div>

<div class="footer">
    <h1>The future of change: are you ready?</h1>
</div>
</body>
</html>