<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>
<?php cart(); ?>

<main class="container p-5 mt-4">
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/img2.jpg" alt="" style="background-position: center center cover; height: 70vh; width:100%;background-repeat: no-repeat;filter: brightness(90%);" class="rounded">

                <div class="container">
                    <div class="carousel-caption text-start" style="padding-bottom:16rem;">
                        <h1>Example headline.</h1>
                        <p>Some representative placeholder content for the first slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-dark" href="#">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/img1.jpg" alt="" style="background-position: center center cover; height: 70vh; width:100%;background-repeat: no-repeat;" class="rounded">

                <div class="container">
                    <div class="carousel-caption" style="padding-bottom:16rem;">
                        <h1>Another example headline.</h1>
                        <p>Some representative placeholder content for the second slide of the carousel.</p>
                        <p><a class="btn btn-lg btn-dark" href="#">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">

                <img src="../images/img3.png" alt="" style="background-position: center center cover; height: 70vh; width:100%;background-attachment: fixed;background-repeat: no-repeat;filter: brightness(90%);" class="rounded">

                <div class="container">
                    <div class="carousel-caption text-end" style="padding-bottom:16rem;">
                        <h1>One more for good measure.</h1>
                        <p>Some representative placeholder content for the third slide of this carousel.</p>
                        <p><a class="btn btn-lg btn-dark" href="#">Browse gallery</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>



</main>
<div class=" text-center" style="padding:5rem;">

    <div class="container ">

        <div class="row">

            <div class="col-md-3 col-sm-3">

                <div>

                    <i class="fa fa-check" style="
   
   color: #fff;
   font-size: 35px;
   border: 3px solid #198754;
   border-radius: 50%;
   padding: 20px;
   background: #198754;

"></i>

                    <h3>Choose a Product</h3>

                    <p>The European languages are members the same family. Their separate existence science </p>

                </div>

            </div>

            <div class="col-md-3 col-sm-3">

                <div>

                    <i class="fa fa-cart-arrow-down" style="
   
   color: #fff;
   font-size: 35px;
   border: 3px solid #198754;
   border-radius: 50%;
   padding: 20px;
   background: #198754;

"></i>

                    <h3>Add to Cart</h3>

                    <p>The European languages are members the same family. Their separate existence science </p>

                </div>

            </div>

            <div class="col-md-3 col-sm-3">

                <div class="single-process">

                    <i class="fa-solid fa-money-check" style="
   
   color: #fff;
   font-size: 35px;
   border: 3px solid #198754;
   border-radius: 50%;
   padding: 20px;
   background:#198754;

"></i>

                    <h3>Make Order</h3>

                    <p>The European languages are members the same family. Their separate existence science </p>

                </div>

            </div>

            <div class="col-md-3 col-sm-3">

                <div class="single-process">

                    <i class="fa-solid fa-truck-fast" style="
   
   color: #fff;
   font-size: 35px;
   border: 3px solid #198754;
   border-radius: 50%;
   padding: 20px;
   background: #198754;

"></i>

                    <h3>Deliver For Free</h3>

                    <p>The European languages are members the same family. Their separate existence science </p>

                </div>

            </div>

        </div>

    </div>

</div>

<div class="container-fluid mt-3" style="padding-bottom:10rem;" id="products">
    <div class=" pt-5">
        <h1 class="fw-bolder text-center">~ Top products ~</h1>

    </div>
    <div style="padding:2rem; text-align:center;">


        <button class="btn btn-outline-dark mt-auto m-1 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">BRANDS</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">BRANDS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush text-center">

                    <?php

                    displaybrand();
                    ?>



                </ul>
            </div>
        </div>

        <button class="btn m-1 btn-outline-dark mt-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">CATEGORIES</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title  fw-bolder" id="offcanvasLeftLabel">CATEGORIES</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush text-center">
                    <?php
                    displaycategories();
                    ?>

                </ul>
            </div>
        </div>

    </div>
    <div class="container text-center">
        <div style="padding-left: 0.5rem;">

            <div class=" row">

                <!-- fetching products -->
                <?php

                getproducts();
                get_unique_categories();
                get_unique_brands();


                ?>
            </div>
        </div>




    </div>
</div>

<?php include('../includes/footer_main.php') ?>