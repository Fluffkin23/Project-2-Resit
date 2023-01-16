<?php
    include_once '../includes/header.php';
?>
</header>
<div class="reg-container">
    <main class="reg">
        <div class="reg-title">
            Ready? Create your account.
        </div>
        <form action="register-inc.php" method="post">
            <div class="reg-form">
                <div class="reg-name">
                    <label for="name">Name</label>
                    <input type="text" placeholder="enter your name" name="name" id="name">
                </div>
                <div class="reg-email">
                    <label for="email">Email</label>
                    <input type="email" placeholder="enter your email" name="email" id="email">
                </div>
                <div class="reg-surname">
                    <label for="password">Password</label>
                    <input type="password" placeholder="enter your password" name="password" id="password">
                </div>
                <div class="reg-surname">
                    <label for="password">re-type password</label>
                    <input type="password" placeholder="enter your password" name="confirmPassword" id="password">
                </div>
                <div class="reg-phone">
                    <label for="phone">Phone Number</label>
                    <input type="text" placeholder="enter your phone" name="number" id="number">
                </div>
            </div>
            <div class="reg-submit">
                <input type="submit" name="submit" value="Create Account"></input>
            </div>
        </form>
    </main>