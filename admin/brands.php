<?php include '../includes/connect.php';

if (isset($_POST['create_brand'])) {

    $brand_name = $_POST['brand_name'];
    $brand_description = $_POST['brand_description'];
    $company_name = $_POST['company_name'];

    $select_query = "SELECT * FROM `brand` WHERE `brand_title`='$brand_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show ">
        <i class="bi-exclamation-octagon-fill"></i>
      <strong class="mx-2">Error!</strong> Brand already added <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>';
    } else {

        $insert_query = "INSERT INTO brand (brand_title,brand_description,CoconutProcessorName) VALUES ('$brand_name','$brand_description','$company_name')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show ">
            <i class="bi-check-circle-fill"></i>
          <strong class="mx-2">Success!</strong> Category Added .
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>';
        }
    }
}

?>

<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php') ?>

<main class=" container p-5">

    <div class="pb-4">
        <h1 class="fw-bolder">Brands</h1>

    </div><!-- End Page Title -->
    <br>
    <section class="section" style="padding-bottom: 10rem;">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add, edit or delete Brands</h5>

                    <!-- General Form Elements -->
                    <div class="row">
                        <div class="col-md-3">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <div class="mb-4">
                                    <label for="brand_name" class="form-label fw-bolder">Name</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="brand_name" name="brand_name" />
                                </div>
                                <div class="mb-4">
                                    <label for="company_name" class="form-label fw-bolder">Company name</label>
                                    <input type="text" placeholder="Type here" class="form-control" name="company_name" id="company_name" />
                                </div>

                                <div class="mb-4">
                                    <label class="form-label fw-bolder">Description</label>
                                    <textarea placeholder="Type here" class="form-control" name="brand_description"></textarea>
                                </div>
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-dark" name="create_brand" value="Create Brand">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Slug</th>
                                            <th class="text-center">Edit</th>
                                            <th class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            <td>21</td>
                                            <td><b>Men clothes</b></td>
                                            <td>Men clothes</td>
                                            <td>/men</td>
                                            <td class="text-center">
                                                <a><i class="bi bi-brush-fill"></i></a>
                                            </td>
                                            <td class="text-center">
                                                <a> <i class="bi bi-trash"></i></a>
                                            </td>
                                        </tr>

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