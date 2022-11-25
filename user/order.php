

<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php'); ?>

<?php include('../includes/header_main.php') ?>

<?php

$ip = getIPAddress();

$current_username =  trim($_SESSION['user_username']);
$user_detail_query = "select * from `user_info` where  user_ip_address = '$ip'";
$run_user_query = mysqli_query($con, $user_detail_query);
$row_data = mysqli_fetch_array($run_user_query);
$users_id = $row_data['user_id'];
$total = 0;
$total_quantity = 0;


$cart_query = "select * from `cart_details` where ip_address='$ip'";
$invoice_number = mt_rand();
$status = 'pending';
$result = mysqli_query($con, $cart_query);
while ($row = mysqli_fetch_array($result)) {
    $quantities = $row['quantity'];


    $product_id = $row['Biproduct_id'];
    $select_products = "select * from `biproducts` where Biproduct_id=$product_id";
    $result_product = mysqli_query($con, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_product)) {

        $product_price = array($row_product_price['price'] * $quantities);
        $product_title = $row_product_price['BiproductName'];
        $product_prices = $row_product_price['price'];

        $product_values = array_sum($product_price);
        $total_quantity += $quantities;
        $total += $product_values;
        $insert_query = "insert into `user_orders` (user_id,amount_due,invoice_number,BiproductID,total_products,order_date,order_status) values ($users_id, $total, $invoice_number,$product_id,$total_quantity,NOW(),'$status')";
        $result_insert_query = mysqli_query($con, $insert_query);
    }


    $delete_cart_item_query = "delete from `cart_details` where Biproduct_id=$product_id";
    $delete_result = mysqli_query($con, $delete_cart_item_query);
}






if ($result_insert_query) {

    echo "<script> alert('your order is submitted')</script>";
    echo "<script> window.open('../user/cart.php','_self') </script>";
}
?>



<?php include('../includes/footer_main.php') ?>