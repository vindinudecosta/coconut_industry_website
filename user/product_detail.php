<?php include('../includes/connect.php') ?>
<?php include('../functions/common_functions.php') ?>

<?php include('../includes/header_main.php') ?>



<div class="container p-5">
    <div class="pt-5">
        <h1 class="fw-bolder text-center">~ Product details ~</h1>

    </div>

    <?php cart(); ?>
    <?php


    view_product_detail();

    ?>

</div>

<!-- Related items section-->








<?php include('../includes/footer_main.php') ?>