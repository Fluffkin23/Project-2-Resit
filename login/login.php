<?php
include_once "../Resources/header.php";
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

<<<<<<< HEAD
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
=======
<main class="login_container">
    <div class="login-title">
        <h1> Fantastic! Log in. </h1>
    </div>
    <div class="login-form">
        <form action="login.inc.php" method="POST">
            <div class="login-data">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
>>>>>>> 3f8bffc4a1f4bcb6c8bdc55a7ff88f8d1f1f4716
                </div>
                <div class="submit-button">
                    <input type="submit" value="Log In">
                </div>
<<<<<<< HEAD
            </form>
            <?php
=======
            </div>
            <div class="submit-button">
                <input type="submit" value="Log In" name = "submit">
            </div>
        </form>
        <?php
>>>>>>> 3f8bffc4a1f4bcb6c8bdc55a7ff88f8d1f1f4716
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all field </p>";
            }
            elseif ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information </p>";
            }
        }
        ?>
<<<<<<< HEAD
        </div>
    </main>
    <!-- <footer class="login-footer">
=======
    </div>
</main>

<!-- <footer class="login-footer">.
>>>>>>> 3f8bffc4a1f4bcb6c8bdc55a7ff88f8d1f1f4716
    <div class="footer">
    <h1>The future of change: are you ready?</h1>
</div>
</footer> -->


</body>

</html>