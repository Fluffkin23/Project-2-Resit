<?php
include_once "../header.php";
?>

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

<main class="login_container">
    <div class="login-title">
        <h1> Fantastic! Log in. </h1>
    </div>
    <div class="login-form">
        <form action="login.inc.php" method="post">
            <div class="login-data">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
            </div>
            <div class="submit-button">
                <input type="submit" value="Log In">
            </div>
        </form>
        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all field </p>";
            }
            elseif ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information </p>";
            }
        }
        ?>
    </div>
</main>
<!-- <footer class="login-footer">
    <div class="footer">
    <h1>The future of change: are you ready?</h1>
</div>
</footer> -->


</body>
</html>