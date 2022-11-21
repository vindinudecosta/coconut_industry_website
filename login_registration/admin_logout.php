<?php
session_start();
unset($_SESSION['admin_username']);
require '../login_registration/user_login.php';
// echo "<script> window.open('../login_registration/user_login.php','_self')</script>";
