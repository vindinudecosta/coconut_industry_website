 <?php @session_start(); ?>


 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>CocoMart|User</title>

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
                 <div class="container-fluid">
                     <li class="nav-item dropdown navbar-nav" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" style="margin-left: 3.7rem;">
                         <i class="fa-solid fa-circle-user"></i>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                             <li class="dropdown-item" id="link_3"> login as admin</li>
                             <li><a class="dropdown-item" href="#">Another action</a></li>
                             <li><a class="dropdown-item" href="#">Something else here</a></li>
                         </ul>
                     </li>
                     &nbsp;Hi <?php if (!isset($_SESSION['user_username'])) {
                                    echo "Guest";
                                } else {
                                    echo $_SESSION['user_username'];
                                }

                                ?> | <?php if (!isset($_SESSION['user_username'])) {
                                            echo "<a class='nav-link fw-bolder ' role='button' href='../login_registration/user_login.php' aria-expanded='false' style='margin-left: 0.5rem;'> Login</a>";
                                        } else {
                                            echo "<a class='nav-link fw-bolder ' role='button' href='../login_registration/user_logout.php' aria-expanded='false' style='margin-left: 0.5rem;'> Logout</a>";
                                        }

                                        ?>




                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse " id="navbarNavDropdown">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="margin-left:8rem;">

                             <li class="nav-item " style="padding-left:1rem ;">
                                 <a class="nav-link" aria-current="page" href="../user/main.php"> <i class="fa-sharp fa-solid fa-house"></i>&nbsp; HOME</a>
                             </li>
                             <li class="nav-item " style="padding-left:1rem ;">
                                 <a class="nav-link " aria-current="page" href="../user/all_products.php"><i class="fa-solid fa-bag-shopping"></i>&nbsp; PRODUCTS</a>
                             </li>
                             <li class="nav-item " style="padding-left:1rem;">
                                 <a class="nav-link " aria-current="page" href="#"><i class="fa-solid fa-address-book"></i>&nbsp; CONTACTS</a>
                             </li>

                             <li class="nav-item"> <a class="nav-link " style="padding-left:1rem;" aria-current="page" href="../login_registration/user_registration.php">

                                     <?php if (!isset($_SESSION['user_username'])) {
                                            echo "<i class='fa-solid fa-address-card'></i>&nbsp; REGISTER</a></li>";
                                        } else {
                                            echo "<i class='fa-solid fa-circle-user'></i>&nbsp; PROFILE</a></li>";
                                        }

                                        ?>



                             <li class="nav-item"><a class=" nav-link " style="padding-left:1rem;" aria-current=" page" href="../user/cart.php"><i class="fa-solid fa-cart-shopping"></i>
                                     <sup><?php cart_item(); ?></sup> CART</a>
                             </li>
                             <li class="nav-item  " style="padding-left:8rem;">
                                 <a class="nav-link active fw-bolder text-success " aria-current="page"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp; TOTAL: RS. <?php total_cart_price(); ?> </a>
                             </li>
                         </ul>

                     </div>
                 </div>
             </nav>


         </div>
     </header>

     <script>
         document.getElementById("link_3").onclick = function() {
             location.href = "../login_registration/admin_login.php";
         };
     </script>