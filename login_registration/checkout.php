<?php include('../includes/connect.php');
session_start();

?>






    <?php
    if (!isset($_SESSION['user_username'])) {


        include('../login_registration/user_login.php');
    } else {

        include('../user/order.php');
    }

    ?>

