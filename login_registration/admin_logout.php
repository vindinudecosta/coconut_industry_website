<?php
session_start();
unset($_SESSION['admin_username']);
// require 'admin_login.php';
echo "<script> window.open('../login_registration/admin_login.php','_self')</script>";
