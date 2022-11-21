<?php include('../includes/connect.php');
//get ip address function 
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
}

?>
<?php @session_start(); ?>

<?php
if (!isset($_SESSION['admin_username'])) {





    if (isset($_POST['admin_login'])) {


        $admin_username = $_POST['admin_username'];
        $admin_password = $_POST['admin_password'];
        $admin_email = $_POST['admin_email'];

        $select_query = "select * from `admin_info` where `admin_username` = '$admin_username' or `admin_email`='$admin_email'";
        $results = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($results);
        $row_data = mysqli_fetch_assoc($results);
        $admin_ip = getIPAddress();




        if ($rows_count > 0) {
            $_SESSION['admin_username'] = $admin_username;
            if (password_verify($admin_password, $row_data['admin_password'])) {



                $_SESSION['admin_username'] = $admin_username;
                echo "<script> alert('login success') </script>";
                echo "<script> window.open('../admin/dashboard.php','_self') </script>";
            } else {
                echo "<script> alert('invalid password') </script>";
            }
        } else {


            echo "<script> alert('invalid credentials') </script>";
        }
    }
} else {
    echo "<script> alert('already logged in!') </script>";
    echo "<script> window.open('../admin/dashboard.php','_self')</script>";
}
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coco-mart | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            overflow: hidden;
        }
    </style>


</head>

<body>

    <main class="p-5  container " style="margin-top: 4rem;">


        <div class="pb-5">
            <h1 class="fw-bolder text-center">~ Admin Login ~</h1>
        </div>
        <section class="section" style="padding-bottom: 10rem;">



            <form action="" method="post" enctype="multipart/form-data">

                <div style="padding-left: 25rem;padding-right:25rem; margin:auto;">

                    <div class="card mb-4">
                        <div class="card-header fw-bolder text-center">
                            <a class="navbar-brand"><img src="../images/logo2.png" alt="" height="30px" width="30px"> COCO-MART</a>

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
                                <input type="password" name="admin_password" id="price" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                            </div>


                        </div>





                    </div>

                    <div class="form-outline text-center pt-3">


                        <input type="submit" name="admin_login" class="btn btn-outline-dark mb-3 px-5 fw-bolder" value="Click to login">
                        <p class="small fw-bold">Dont't have an admin account? <a href="admin_registration.php" class="text-success">Register</a></p>



                    </div>

                    <div class="container text-center pt-3 ">
                        <p> <a href="../user/main.php" class="text-success"> <i class="fa-solid fa-house"></i> </a></p>

                        <a href='' class='btn btn-outline-success m-2 fw-bolder '><i class="fa-solid fa-user-gear"> </i>&nbsp; login as admin </a>
                        <a href='user_login.php' class='btn btn-outline-dark  mx-2 fw-bolder  '><i class="fa-solid fa-user "></i>&nbsp; login as user </a>
                    </div>



















                </div>
            </form>









        </section>




    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>