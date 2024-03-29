<?php @session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CocoMart|Administrator</title>
    <link href="../images/logo2.png" rel="icon">
    <!-- Bootstrap css link-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        .card-img-top {

            width: 100%;
            object-fit: contain;
            height: 200px;
        }
    </style>
</head>

<body class="bg-light ">
    <!-- navbar -->
    <header>

        <div class="container-fluid p-0">
            <nav class="navbar bg-light border-bottom border-success py-lg-2 ">
                <div class="container-fluid " style="margin-left:3rem;">
                    <a class="navbar-brand"><img src="../images/logo2.png" alt="" height="30px" width="30px"> COCO-MART</a>
                    <form class="d-flex" role="search" style="margin-right: 3rem;" action="../user/search_products.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">

                        <input type="submit" value="Search" class="btn btn-outline-dark" name="search_data_product">
                    </form>
                </div>
            </nav>
            <nav class="navbar navbar-expand-lg bg-light bg-gradient container ">
                <div class="container-fluid fw-bolder ">
                    <li class="nav-item dropdown navbar-nav" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" style="margin-left: 3.7rem;">
                        <i class="fa-solid fa-circle-user"></i>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li class="dropdown-item" id="link_3"> login as user</li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    &nbsp;~ Hi <?php if (!isset($_SESSION['admin_username'])) {
                                    echo "Admin";
                                } else {
                                    echo $_SESSION['admin_username'];
                                }

                                ?> ~ <?php if (!isset($_SESSION['admin_username'])) {
                                            echo "<a class='nav-link fw-bolder ' role='button' href='../login_registration/admin_login.php' aria-expanded='false' style='margin-left: 0.5rem;'> Login</a>";
                                        } else {
                                            echo "<a class='nav-link fw-bolder ' role='button' href='../login_registration/admin_logout.php' aria-expanded='false' style='margin-left: 0.5rem;'> Logout</a>";
                                        }

                                        ?>




                </div>
            </nav>


        </div>
    </header>

    <script>
        document.getElementById("link_3").onclick = function() {
            location.href = "../login_registration/user_login.php";
        };
    </script>