<?php include '../includes/connect.php';

if (isset($_POST['create_cat'])) {

    $catergory_name = $_POST['cat_name'];
    $catergory_description = $_POST['cat_description'];

    $select_query = "SELECT * FROM `categories` WHERE `catergory_name`='$catergory_name'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);

    if ($number > 0) {
        echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show ">
        <i class="bi-exclamation-octagon-fill"></i>
      <strong class="mx-2">Error!</strong> Category already added <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>';
    } else {

        $insert_query = "INSERT INTO categories (catergory_name,category_description) VALUES ('$catergory_name','$catergory_description')";
        $result = mysqli_query($con, $insert_query);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show ">
            <i class="bi-check-circle-fill"></i>
          <strong class="mx-2">Success!</strong> Category added.
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>';
        }
    }
}

?>

<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php') ?>

<main class="container  p-5">

    <div class="pb-4">
        <h1 class="fw-bolder">Categories</h1>

    </div><!-- End Page Title -->
    <br>
    <section class="section" style="padding-bottom: 10rem;">

        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">

                    <!-- General Form Elements -->
                    <div class="row">
                        <div class="col-md-3">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label fw-bolder">Name</label>
                                    <input type="text" placeholder="Type here" class="form-control" id="product_name" name="cat_name" />
                                </div>
                                <!-- <div class="mb-4">
                                <label for="product_slug" class="form-label">Slug</label>
                                <input type="text" placeholder="Type here" class="form-control" id="product_slug" />
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Parent</label>
                                <select class="form-select">
                                    <option>Clothes</option>
                                    <option>T-Shirts</option>
                                </select>
                            </div> -->
                                <div class="mb-4">
                                    <label class="form-label fw-bolder">Description</label>
                                    <textarea placeholder="Type here" class="form-control" name="cat_description"></textarea>
                                </div>
                                <div class="d-grid">
                                    <input type="submit" class="btn btn-outline-dark" name="create_cat" value="Create category">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table table-hover text-center">
                                    <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>

                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $select_categories = "select * from `categories`";
                                        $result_categories = mysqli_query($con, $select_categories);
                                        while ($row_categories = mysqli_fetch_array($result_categories)) {

                                            $categories_titles = $row_categories['catergory_name'];
                                            $categories_id = $row_categories['catergory_id'];
                                            $categories_descriptions = $row_categories['category_description'];


                                            echo " <tr class='text-center'>

                                                     <td>$categories_id</td>
                                                     <td><b>$categories_titles</b></td>
                                                     <td>$categories_descriptions</td>
    
                                                     <form action='' method ='get'  > 
                                                        <td class='text-center'>
                                                          <a href='categories.php?current_categories_id=$categories_id' name='current_categories_id' > <i class='fa-solid fa-trash'></i></a>
                                                         </td>
                                                     </form>
                                                     </tr>";

                                            if (isset($_GET['current_categories_id'])) {
                                                $current_categories_id = $_GET['current_categories_id'];
                                                $delete_query = "delete from `categories` where catergory_id = $current_categories_id";
                                                $result_delete = mysqli_query($con, $delete_query);

                                                echo '<script> window.open("categories.php","_self")  </script>';
                                            }
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