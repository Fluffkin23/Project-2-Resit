<?php
    include_once '../includes/header.php';
?>
        <main class="login_container">
            <div class="login-title">
                <h1> Fantastic! Log in. </h1>
            </div>
            <div class="login-form">
                <form action="login-inc.php" method="post">
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
                        <input type="submit" name="submit" value="Log In">
                    </div>
                </form>
            </div>
        </main>
