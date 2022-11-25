<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>


<?php if (isset($_POST['user_register'])) {

    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_conf_password = $_POST['user_conf_password'];
    $user_address = $_POST['user_address'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_contact = $_POST['user_contact'];
    $user_img = $_FILES['user_img']['name'];
    $user_img_tmp = $_FILES['user_img']['tmp_name'];
    $user_ip = getIPAddress();



    $select_query = "select * from `user_info` where `user_username` ='$user_username' or `user_email` ='$user_email'";
    $result = mysqli_query($con, $select_query);
    $rows = mysqli_num_rows($result);


    if ($rows > 0) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
             <i class="bi-exclamation-octagon-fill"></i>
             <strong class="mx-2">Sorry!</strong> Account already registered <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       </div>';
    } elseif ($user_password != $user_conf_password) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="bi-exclamation-octagon-fill"></i>
        <strong class="mx-2">Sorry!</strong> Password does not match <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>';
    } else {

        move_uploaded_file($user_img_tmp, "./user_images/$user_img");
        $insert_query = "insert into `user_info` (user_email,user_username,user_password,user_image,user_ip_address,user_mobile,user_address) values('$user_email',' $user_username','$hash_password','$user_img','$user_ip','$user_contact','$user_address')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {

            echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
            <i class="bi-check-circle-fill"></i>
             <strong class="mx-2">Success!</strong> Account registered.
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
         </div>';
        }
    }



    //select_cart_items

    $select_cart_item = "Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_item);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['user_username'] = $user_username;
        echo "<script>  window.open('checkout.php','_self')</script>";
    } else {

        echo "<script>  window.open('../user/main.php','_self')</script>";
    }
} ?>








<?php include('../includes/header_main.php') ?>



<?php


if (!isset($_SESSION['user_username'])) {


    echo '<main class="p-5 container">

        <div class="pb-5">
            <h1 class="fw-bolder text-center">~ User registration ~</h1>
        </div>
        <section class="section" style="padding-bottom: 10rem;">
    
    
            <form action="" method="post" enctype="multipart/form-data">
    
                <div class="row " style="padding-left: 10rem;padding-right:10rem">
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-header fw-bolder">
                                <h4>Basic</h4>
                            </div>
    
                            <div class="card-body " style="margin-top:20px ;">
    
    
                                <div class="mb-4">
    
                                    <label for="username" class="form-label fw-bolder">Username</label>
                                    <input type="text" name="user_username" id="username" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
                                </div>
    
                                <div class="mb-4">
    
                                    <label for="email" class="form-label fw-bolder">Email</label>
                                    <input type="text" name="user_email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
                                </div>
    
    
                                <div class="mb-4">
    
                                    <label for="password" class="form-label fw-bolder">Password</label>
                                    <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                                </div>
    
                                <div class="mb-4">
    
                                    <label for="conf_password" class="form-label fw-bolder">Confirm password</label>
                                    <input type="password" name="user_conf_password" id="conf_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                                </div>
                                <div class="mb-4">
    
                                    <label for="address" class="form-label fw-bolder">Address</label>
                                    <textarea type="text" name="user_address" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required"></textarea>
                                </div>
                                <div class="mb-4">
    
                                    <label for="contact_no" class="form-label fw-bolder">Contact number</label>
                                    <input type="text" name="user_contact" id="contact_no" class="form-control" placeholder="Enter contact number" autocomplete="off" required="required">
                                </div>
    
    
                            </div>
    
    
    
    
    
                        </div>
    
    
    
    
                    </div>
    
                    <div class="col-lg-4 ">
    
                        <div class="row mb-5">
                            <div class="card mb-4 p-0">
                                <div class="card-header fw-bolder ">
                                    <h4>Media</h4>
                                </div>
                                <div class="card-body">
                                    <img style="max-width:100px;
                                                        margin-top: 20px;
                                                        margin-bottom: 20px;
                                                        display: block;
                                                        margin-left: auto;
                                                        margin-right: auto;
                                                        width: 50%;" src="../images/icons8-add-image-80.png" alt="">
    
    
    
                                    <label for="user_img" class="form-label fw-bolder pb-2 pt-4"> Add image for profile</label>
                                    <input type="file" name="user_img" id="user_img" class="form-control " placeholder="Enter keyword" autocomplete="off" required="required">
    
    
    
    
    
                                </div>
    
                            </div>
                            <div class="form-outline text-center">
    
    
                                <input type="submit" name="user_register" class="btn btn-outline-dark mb-3 px-5 fw-bolder" value="Click to register">
                                <p class="small fw-bold">Already have an account? <a href="user_login.php" class="text-success">Login</a></p>
                            </div>
    
    
                        </div>
    
                    </div>
    
    
    
    
    
    
    
    
    
    
    
    
                </div>
            </form>
    
    
    
    
    
    
    
    
    
        </section>
    
    
    
    
    </main>';
} else {

    echo '<script> window.open("user_profile.php","_self")  </script>';
}

?>



<?php include('../includes/footer_main.php') ?>