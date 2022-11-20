<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>

<div class="container p-5">
    <div class="pt-5">
        <h1 class="fw-bolder text-center">~ Edit item ~</h1>

    </div>


    <?php


    edit_delete_item()

    ?>

</div>

<!-- Related items section-->
<?php

function update_cart_item()
{
    global $con;
    $ip = getIPAddress();

    if (isset($_POST['update_cart'])) {
        $cart_id = $_GET['product_id'];
        $quantities = $_POST['qty'];

        $update_cart = "UPDATE  `cart_details` SET quantity = $quantities WHERE  ip_address='$ip' AND Biproduct_id=$cart_id ";
        $result_products = mysqli_query($con, $update_cart);


        if ($result_products) {
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}


echo $update_item = update_cart_item();



?>







<?php


function delete_cart_item()
{
    global $con;
    $ip = getIPAddress();

    if (isset($_POST['delete_cart'])) {

        $delete_id = $_GET['product_id'];
        $delete_query = "delete  from `cart_details` where ip_address='$ip' and Biproduct_id = $delete_id ";
        $run_delete = mysqli_query($con, $delete_query);
        if ($run_delete) {

            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}


echo $remove_item = delete_cart_item();



?>

<?php include('../includes/footer_main.php') ?>