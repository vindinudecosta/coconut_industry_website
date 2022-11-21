<?php include('../includes/connect.php') ?>
<?php include('../includes/header.php');
include('../functions/common_functions.php');
?>


<?php if (isset($_POST['admin_register'])) {

    $admin_username = $_POST['admin_username'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_conf_password = $_POST['admin_conf_password'];
    $company_address = $_POST['company_address'];
    $company_name = $_POST['company_name'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $company_contact = $_POST['company_contact'];
    $admin_img = $_FILES['admin_img']['name'];
    $admin_img_tmp = $_FILES['admin_img']['tmp_name'];
    $admin_ip = getIPAddress();



    $select_query = "select * from `admin_info` where `admin_username` ='$admin_username' or `admin_email` ='$admin_email'";
    $result = mysqli_query($con, $select_query);
    $rows = mysqli_num_rows($result);


    if ($rows > 0) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
             <i class="bi-exclamation-octagon-fill"></i>
             <strong class="mx-2">Sorry!</strong> Account already registered <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
       </div>';
    } elseif ($admin_password != $admin_conf_password) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
        <i class="bi-exclamation-octagon-fill"></i>
        <strong class="mx-2">Sorry!</strong> Password does not match <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>';
    } else {

        move_uploaded_file($admin_img_tmp, "./admin_images/$admin_img");
        $insert_query = "insert into `admin_info` (admin_email,admin_username,admin_password,admin_image,admin_ip_address,company_name,company_address,contact_no) values('$admin_email',' $admin_username','$hash_password','$admin_img','$admin_ip',' $company_name',' $company_address','$company_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {

            echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show">
            <i class="bi-check-circle-fill"></i>
             <strong class="mx-2">Success!</strong> Account registered.
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
         </div>';
        }
    }
} ?>












<?php


if (!isset($_SESSION['admin_username'])) {


    echo '<main class="p-5 container">

        <div class="pb-5">
            <h1 class="fw-bolder text-center">~ Admin registration ~</h1>
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
                                    <input type="text" name="admin_username" id="username" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
                                </div>
    
                                <div class="mb-4">
    
                                    <label for="email" class="form-label fw-bolder">Email</label>
                                    <input type="text" name="admin_email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
                                </div>
    
    
                                <div class="mb-4">
    
                                    <label for="password" class="form-label fw-bolder">Password</label>
                                    <input type="password" name="admin_password" id="password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                                </div>
    
                                <div class="mb-4">
    
                                    <label for="conf_password" class="form-label fw-bolder">Confirm password</label>
                                    <input type="password" name="admin_conf_password" id="conf_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                                </div>
                                <div class="mb-4">
    
                                <label for="companyname" class="form-label fw-bolder">Company name</label>
                                <input type="text" name="company_name" id="companyname" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
                            </div>
                                <div class="mb-4">
    
                                    <label for="address" class="form-label fw-bolder"> Company Address</label>
                                    <textarea type="text" name="company_address" id="address" class="form-control" placeholder="Enter Address" autocomplete="off" required="required"></textarea>
                                </div>
                                <div class="mb-4">
    
                                    <label for="contact_no" class="form-label fw-bolder">Company contact number</label>
                                    <input type="text" name="company_contact" id="contact_no" class="form-control" placeholder="Enter contact number" autocomplete="off" required="required">
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
    
    
    
                                    <label for="admin_img" class="form-label fw-bolder pb-2 pt-4"> Add image for profile</label>
                                    <input type="file" name="admin_img" id="admin_img" class="form-control " placeholder="Enter keyword" autocomplete="off" required="required">
    
    
    
    
    
                                </div>
    
                            </div>
                            <div class="form-outline text-center">
    
    
                                <input type="submit" name="admin_register" class="btn btn-outline-dark mb-3 px-5 fw-bolder" value="Click to register">
                                <p class="small fw-bold">Already have an account? <a href="admin_login.php" class="text-success">Login</a></p>
                            </div>
    
    
                        </div>
    
                    </div>
    
    
    
    
    
    
    
    
    
    
    
    
                </div>
            </form>
    
    
    
    
    
    
    
    
    
        </section>
    
    
    
    
    </main>';
} else {

    include('user_profile.php');
}

?>



<?php include('../includes/footer.php') ?>