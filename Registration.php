<?php
    include_once 'includes/header.php';
?>
    </header>
    <div class="reg-container">
        <main class="reg">
            <div class="reg-title">
                Ready?  Create your account.
            </div>
            <form action="includes/register-inc.php" method="post">
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
                    <div class="reg-surname">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password">
                    </div>
                    <div class="reg-surname">
                        <label for="password">Password</label>
                        <input type="password" name="confirmPassword" id="password">
                    </div>
                    <div class="reg-phone">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="number" id="number">
                    </div>
                </div>
                <div class="reg-submit">
                    <input type="submit" name="submit" value="Create Account"></input>
                </div>
            </form>
        </main>
