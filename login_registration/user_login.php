<?php include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>

<?php


if (!isset($_SESSION['user_username'])) {
    if (isset($_POST['user_login'])) {


        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];

        $select_query = "select * from `user_info` where `user_username` = '$user_username' or `user_email`='$user_email'";
        $results = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($results);
        $row_data = mysqli_fetch_assoc($results);
        $user_ip = getIPAddress();


        $select_cart_item = "Select * from `cart_details` where ip_address='$user_ip'";
        $result_cart = mysqli_query($con, $select_cart_item);
        $row_count_cart = mysqli_num_rows($result_cart);

        if ($rows_count > 0) {
            $_SESSION['user_username'] = $user_username;
            if (password_verify($user_password, $row_data['user_password'])) {


                if ($rows_count == 0 or $row_count_cart == 0) {
                    $_SESSION['user_username'] = $user_username;
                    echo "<script> alert('login success') </script>";
                    echo "<script> window.open('../user/main.php','_self') </script>";
                } else {
                    $_SESSION['user_username'] = $user_username;
                    echo "<script> alert('login success') </script>";
                    echo "<script> window.open('payments.php','_self') </script>";
                }
            } else {
                echo "<script> alert('invalid password') </script>";
            }
        } else {


            echo "<script> alert('invalid credentials') </script>";
        }
    }
} else {
    echo "<script> alert('already logged in!') </script>";
    echo "<script> window.open('../user/main.php','_self')</script>";
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



</head>

<!-- <style>
    body {
        overflow: hidden;
    }
</style> -->


<body>

    <main class="p-5  container" style="margin-top: 3rem;">


        <div class="pb-5">
            <h1 class="fw-bolder text-center">~ User Login ~</h1>
        </div>
        <section class="section" style="padding-bottom: 10rem;">



            <form action="" method="post">

                <div style="padding-left: 25rem;padding-right:25rem; margin:auto;">

                    <div class="card mb-4">
                        <div class="card-header fw-bolder text-center">
                            <a class="navbar-brand"><img src="../images/logo2.png" alt="" height="30px" width="30px"> COCO-MART</a>

                        </div>

                        <div class="card-body " style="margin-top:20px ;">


                            <div class="mb-4">

                                <label for="user_username" class="form-label fw-bolder">Username</label>
                                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
                            </div>
                            <div class="mb-4">

                                <label for="email" class="form-label fw-bolder">Email</label>
                                <input type="text" name="user_email" id="email" class="form-control" placeholder="Enter email" autocomplete="off" required="required">
                            </div>



                            <div class="mb-4">

                                <label for="user_password" class="form-label fw-bolder">Password</label>
                                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                            </div>


                        </div>





                    </div>

                    <div class="form-outline text-center pt-3">


                        <input type="submit" name="user_login" class="btn btn-outline-dark mb-3 px-5 fw-bolder" value="Click to login">
                        <p class="small fw-bold">Dont't have an user account? <a href="user_registration.php" class="text-success">Register</a></p>



                    </div>

                    <div class="container text-center pt-3">
                        <p> <a href="../user/main.php" class="text-success"> <i class="fa-solid fa-house"></i> </a></p>

                        <a href='admin_login.php' class='btn btn-outline-dark m-2 fw-bolder '><i class="fa-solid fa-user-gear"> </i>&nbsp; login as admin </a>
                        <a href="user_login.php" class='btn btn-outline-success mx-2 fw-bolder '><i class="fa-solid fa-user "></i>&nbsp; login as user </a>
                    </div>



















                </div>
            </form>









        </section>




    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</html>