<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>
<?php cart(); ?>
<div class="container-fluid mt-5 container" style="padding-bottom:5rem;" id="products">

    <div class="pt-5">
        <h1 class="fw-bolder text-center">~ Similar products ~</h1>

    </div>
    <div style="padding:2rem; text-align:center;">


        <button class="btn btn-outline-dark m-1 " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">BRANDS</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasRightLabel">BRANDS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush text-center">

                    <?php

                    displaybrand_for_all_products_page();
                    ?>



                </ul>
            </div>
        </div>

        <button class="btn btn-outline-dark  m-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft" aria-controls="offcanvasLeft">CATEGORIES</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasLeftLabel">CATEGORIES</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-group list-group-flush text-center">
                    <?php
                    displaycategories_for_all_products_page();
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

                search_products();
                get_unique_categories();
                get_unique_brands();

                ?>
            </div>
        </div>




    </div>
</div>

<?php include('../includes/footer_main.php') ?>