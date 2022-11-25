<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>




<div class="container p-5">
    <div class="pb-5 pt-5">
        <h1 class="fw-bolder text-center">~ Cart ~</h1>

    </div>

    <div class="row ">
        <form action="" method="post">
            <table class="table table-bordered border-dark text-center">
                <thead>

                    <tr>
                        <th> Product Title</th>
                        <th> Product Image</th>
                        <th>Quantity</th>
                        <th> Price</th>

                        <th colspan="2">Edit or delete item</th>



                    </tr>



                </thead>
                <tbody>

                    <?php

                    $total = 0;

                    $ip = getIPAddress();

                    $cart_query = "select * from `cart_details` where ip_address='$ip'";

                    $result = mysqli_query($con, $cart_query);
                    while ($row = mysqli_fetch_array($result)) {
                        $quantities = $row['quantity'];
                        $product_id = $row['Biproduct_id'];
                        $select_products = "select * from `biproducts` where Biproduct_id=$product_id";
                        $result_product = mysqli_query($con, $select_products);
                        while ($row_product_price = mysqli_fetch_array($result_product)) {

                            $product_price = array($row_product_price['price'] * $quantities);
                            $product_title = $row_product_price['BiproductName'];
                            $product_image1 = $row_product_price['product_img1'];
                            $product_prices = $row_product_price['price'];

                            $product_values = array_sum($product_price);
                            $total += $product_values;
                            echo "<tr>
                            <td class='pt-4 fw-bolder'>  $product_title  </td>
                            <td><img src='../admin/product_images/$product_image1' alt='' width='70px' height='70px'></td>
                            <td class='pt-4'>x $quantities </td>


                            <td class='pt-4 fw-bolder'>Rs  $product_prices </td>
                            
                            <td class='pt-4'> <a href='UD_item.php?product_id=$product_id' class='btn   mx-1 '><i class='fa-solid fa-gear'></i></a></td>


                        </tr>";
                        }
                    } ?>

                </tbody>


            </table>



            <div class=" container p-5" style="margin-left:15rem">
                <div class="d-flex container">
                    <h4 class="px-3">SUB TOTAL: <strong>RS <?php echo $total ?></strong></h4>
                    <a href='all_products.php' class='btn btn-outline-dark mx-3 '> Continue shopping </a>




                    <a href='../login_registration/checkout.php' class='btn btn-outline-dark mt-auto'> Place order </a>
                </div>
            </div>


        </form>




    </div>




</div>







<?php include('../includes/footer_main.php') ?>