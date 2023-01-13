<?php
    session_start();
    session_unset();
    session_destroy();
echo
"
          <script>
          alert('logged out successfully');
          document.location.href = '../Index/index.php';
          </script>
      ";
?>