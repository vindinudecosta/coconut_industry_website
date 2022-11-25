<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>

<?php @session_start();  ?>




<div class="container p-5">
    <div class="pb-5 pt-5">
        <h1 class="fw-bolder text-center">~ Profile ~</h1>

    </div>
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-dark" width="110">
                            <div class="mt-3">
                                <h4><?php if (isset($_SESSION['user_username'])) {
                                        echo $_SESSION['user_username'];
                                    }

                                    ?></h4>

                                <br>

                                <button class="btn btn-dark">Follow</button>
                                <button class="btn btn-outline-dark">Message</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="John Doe">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="john@example.com">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(239) 816-9029">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Mobile</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="(320) 380-4539">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <input type="text" class="form-control" value="Bay Area, San Francisco, CA">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9 text-secondary">
                                <input type="button" class="btn btn-outline-dark px-4" value="Save Changes">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row p-3 ">
                    <div class="col-sm-12">
                        <div class="pt-2">
                            <h5> My Orders</h5>
                        </div>
                        <div class="row card card-body">

                            <table class="table  text-center">
                                <thead>

                                    <tr>
                                        <th> Order Id</th>

                                        <th> Product Id</th>
                                        <th> Amount to pay</th>
                                        <th> Invoice number</th>
                                        <th> Quantity</th>
                                        <th> Order date and time</th>

                                        <th> Delete</th>





                                    </tr>



                                </thead>
                                <tbody>

                                    <?php
                                    $ip = getIPAddress();
                                    $select_user = "select * from `user_info` where user_ip_address ='$ip' ";
                                    $results_user = mysqli_query($con, $select_user);
                                    while ($row_user = mysqli_fetch_array($results_user)) {

                                        $user_id = $row_user['user_id'];

                                        $order_product = "select * from `user_orders` where user_id =$user_id";
                                        $order_product_query = mysqli_query($con, $order_product);
                                        while ($order_row_products = mysqli_fetch_array($order_product_query)) {



                                            $order_id = $order_row_products['order_id'];
                                            $order_userid = $order_row_products['user_id'];
                                            $order_amount = $order_row_products['amount_due'];
                                            $order_invoice_num = $order_row_products['invoice_number'];
                                            $order_product_id = $order_row_products['BiproductID'];
                                            $order_quantity = $order_row_products['Quantity'];
                                            $order_data = $order_row_products['order_date'];
                                            echo " <tr class='text-center'>
                                    <td><b>$order_id</b></td>
                                 
                                    <td> $order_product_id</td>
                                    <td>$order_amount</td>
                                    <td> $order_invoice_num </td>
                                  
                                    <td> $order_quantity </td>
                                    <td>   $order_data </td>

     
                                   <form action='' method ='get'> 
                                   <td class='text-center'>
                                  <a href='user_profile.php?current_order_id=$order_id' name='current_order_id' > <i class='fa-solid fa-trash'></i></a>
                                  </td>
                                 </form>
                                   </tr>";
                                        }
                                    }
                                    if (isset($_GET['current_order_id'])) {

                                        $current_order_id = $_GET['current_order_id'];
                                        $delete_order_query = "delete from `user_orders` where order_id = $current_order_id ";
                                        $run_delete_query = mysqli_query($con, $delete_order_query);
                                        echo '<script> window.open("user_profile.php","_self")  </script>';
                                    }


                                    ?>
                                </tbody>


                            </table>







                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php include('../includes/footer_main.php') ?>