<?php include '../includes/connect.php';




?>

<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php');

if (isset($_POST['update_brand'])) {

    if (isset($_GET['current_brands_id'])) {
        $current_brands_id = $_GET['current_brands_id'];
        $brand_name = $_POST['brand_name'];
        $brand_description = $_POST['brand_description'];
        $company_name = $_POST['company_name'];


        $update_query = "update `brand` set `brand_title`='$brand_name',`brand_description`='$brand_description',`company_name`='$company_name' where `brand_id` = $current_brands_id";
        $result = mysqli_query($con, $update_query);


        if ($result) {
            echo '<script> window.open("brands.php","_self") </script>';
        }
    }
} ?>


<main class=" container p-5">

    <div class="pb-4">
        <h1 class="fw-bolder">Edit Brand</h1>

    </div><!-- End Page Title -->
    <br>
    <section class="section" style="padding-bottom: 10rem;">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">


                    <!-- General Form Elements -->
                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="post">
                                <div class="mb-4">
                                    <label for="brand_name" class="form-label fw-bolder">Name</label>
                                    <input type="text" class="form-control" id="brand_name" name="brand_name" />
                                </div>
                                <div class="mb-4">
                                    <label for="company_name" class="form-label fw-bolder">Company name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bolder">Description</label>
                                    <textarea placeholder="Type here" class="form-control" name="brand_description"></textarea>
                                </div>
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-dark" name="update_brand" value="Update Brand">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Company Name</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $current_brands_id = $_GET['current_brands_id'];
                                        $select_products = "select * from `brand` where brand_id=$current_brands_id";
                                        $result_product = mysqli_query($con, $select_products);
                                        while ($row_brand = mysqli_fetch_array($result_product)) {

                                            $brand_titles = $row_brand['brand_title'];
                                            $brand_id = $row_brand['brand_id'];
                                            $brand_descriptions = $row_brand['brand_description'];
                                            $brand_company = $row_brand['company_name'];


                                            echo " <tr class='text-center'>

                                                <td>$brand_id</td>
                                                <td><b>$brand_titles</b></td>
                                                <td>$brand_descriptions</td>
                                                <td><b>$brand_company</b></td>
                                                   </tr>";
                                        }




                                        ?>




                                    </tbody>
                                </table>
                            </div>
                        </div> <!-- .col// -->
                    </div> <!-- .row // -->

                </div>
            </div>

        </div>
    </section>
</main>

<?php include('../includes/footer.php') ?>