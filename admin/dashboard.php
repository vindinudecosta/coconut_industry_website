<?php include('../includes/connect.php');

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
} ?>
<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php') ?>



<div class="container p-5 ">





    <div class="pb-5">
        <h1 class="fw-bolder"> Customer Orders</h1>
    </div>
    <div class="row  card">

        <table class="table  text-center">
            <thead class="card-header">

                <tr>
                    <th> Order Id</th>
                    <th> Customer Id</th>
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
                $order_product = "select * from `user_orders`";
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
                                    <td> $order_userid</td>
                                    <td> $order_product_id</td>
                                    <td>$order_amount</td>
                                    <td> $order_invoice_num </td>
                                  
                                    <td> $order_quantity </td>
                                    <td>   $order_data </td>

     
                                   <form action='' method ='get'> 
                                   <td class='text-center'>
                                  <a href='dashboard.php?current_order_id=$order_id' name='current_order_id' > <i class='fa-solid fa-trash'></i></a>
                                  </td>
                                 </form>
                                   </tr>";
                }

                if (isset($_GET['current_order_id'])) {

                    $current_order_id = $_GET['current_order_id'];
                    $delete_order_query = "delete from `user_orders` where order_id = $current_order_id ";
                    $run_delete_query = mysqli_query($con, $delete_order_query);
                    echo '<script> window.open("dashboard.php","_self")  </script>';
                }


                ?>
            </tbody>


        </table>







    </div>




</div>

<div class="container p-5 ">

    <div class="pb-5">
        <h1 class="fw-bolder"> Customer Details</h1>
    </div>
    <div class="row   card ">

        <table class="table  text-center ">
            <thead class="card-header">

                <tr>
                    <th> Customer Id</th>
                    <th> Customer Image</th>
                    <th> Customer Name</th>
                    <th> Customer Email</th>

                    <th> Customer mobile</th>
                    <th> Customer Address</th>
                </tr>



            </thead>
            <tbody>


                <?php
                $select_users = "select * from `user_info`";
                $result_users = mysqli_query($con, $select_users);
                while ($row_users = mysqli_fetch_array($result_users)) {

                    $user_id = $row_users['user_id'];
                    $user_name = $row_users['user_username'];
                    $user_email = $row_users['user_email'];
                    $user_image = $row_users['user_image'];
                    $user_mobile = $row_users['user_mobile'];
                    $user_address = $row_users['user_address'];



                    echo " <tr class='text-center '>

                                                     <td>$user_id</td>
                                                     <td><img src='../login_registration/user_images/$user_image' alt='' width='80px' height='80px' class='rounded-circle'></td>
                                                     <td>$user_name</td>
                                                     <td>  $user_email </td>
                                                     <td>$user_mobile</td>
                                                     <td>$user_address</td>
    
                            
                ";
                }


                ?>











            </tbody>


        </table>







    </div>




</div>






<div class="container p-5">

    <div class="pb-5">
        <h1 class="fw-bolder">Administrator Details</h1>
    </div>
    <div class="row card ">

        <table class="table  text-center ">
            <thead class="card-header">

                <tr>
                    <th> Admin Id</th>
                    <th> Admin Image</th>
                    <th> Admin Name</th>
                    <th>Admin Email</th>
                    <th> Company name</th>
                    <th> Company mobile no</th>
                    <th> Company Address</th>
                </tr>



            </thead>
            <tbody>


                <?php
                $select_admin = "select * from `admin_info`";
                $result_admin = mysqli_query($con, $select_admin);
                while ($row_admin = mysqli_fetch_array($result_admin)) {

                    $admin_id = $row_admin['admin_id'];
                    $admin_name = $row_admin['admin_username'];
                    $admin_email = $row_admin['admin_email'];
                    $admin_image = $row_admin['admin_image'];
                    $company_name = $row_admin['company_name'];
                    $company_mobile = $row_admin['contact_no'];
                    $company_address = $row_admin['company_address'];



                    echo " <tr class='text-center'>

                                         <td>$admin_id</td>
                                         <td><img src='../login_registration/admin_images/$admin_image' alt='' width='80px' height='80px' class='rounded-circle'></td>
                                         <td>$admin_name</td>
                                         <td>  $admin_email</td>
                                         <td>  $company_name</td>
                                         <td>  $company_mobile</td>
                                         <td>$company_address</td>
                                 ";
                }


                ?>











            </tbody>


        </table>







    </div>


</div>
















<?php include('../includes/footer.php') ?>