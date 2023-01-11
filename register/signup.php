<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Create account</title>
</head>
<body>
<?php
    include_once "../Resources/header.php";
?>
<div class="reg-container">
    <main class="reg">
        <div class="reg-title">
            Ready?  Create your account.
        </div>
        <form action="singup-inc.php" method="post">
            <div class="reg-form">
                <div class="reg-name">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="reg-email">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>
                <div class="reg-surname">
                    <label for="surname">Surname</label>
                    <input type="text" name="surname" id="surname">
                </div>
                <div class="reg-phone">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="number" id="number">
                </div>
                <div class="reg-password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="reg-rpassword">
                    <label for="rpassword">Repeat Password</label>
                    <input type="password" name="rpassword" id="rpassword">
                </div>
            </div>
            <div class="reg-submit">
                <input type="submit" value="Create Account" name="submit">
            </div>
        </form>

        <?php
        if(isset($_GET["error"])){
            if($_GET["error"] == "emptyinput"){
                echo "<p>Fill in all field </p>";
            }
            elseif ($_GET["error"] == "invalidUid") {
                echo "<p>Choose a proper username </p>";
            }
            elseif ($_GET["error"] == "invalidEmail") {
                echo "<p>Choose a proper Email </p>";
            }
            elseif ($_GET["error"] == "passworddontmatch") {
                echo "<p>Password doesn't match </p>";
            }
            elseif ($_GET["error"] == "usernametaken") {
                echo "<p>Username already taken </p>";
            }
            elseif ($_GET["error"] == "none") {
                echo "<p>You have signed up! </p>";
            }

        }
        ?>
    </main>


    <footer>
        <!-- <div class="footer">
            <h1>The future of change: are you ready?</h1>
        </div> -->
    </footer>
</div>

</body>
</html>