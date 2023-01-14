<?php

include 'includes/header.php';

?>
<?php
 if(isset($_SESSION['sessionEmail'])) {
     echo "You are logged in!" . $_SESSION['sessionEmail'];
 }
?>
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
                <img src="../res/presentation.png" alt="support image for
                    description text">
            </div>
        </div>
<?php
        require_once 'includes/footer.php';
?>