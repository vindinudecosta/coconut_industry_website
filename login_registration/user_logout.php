<?php


session_start();
session_unset();
session_destroy();
echo "<script> window.open('../user/main.php','_self')</script>";
