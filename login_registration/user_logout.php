<?php


session_start();
unset($_SESSION['user_username']);
// session_destroy();
echo "<script> window.open('../user/main.php','_self')</script>";
