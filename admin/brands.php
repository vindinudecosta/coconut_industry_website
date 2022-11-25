<?php include '../includes/connect.php';
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

        $insert_query = "INSERT INTO brand (brand_title,brand_description,company_name) VALUES ('$brand_name','$brand_description','$company_name')";
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
                                        <tr class="text-center">

                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>


                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php


                                        $ip = getIPAddress();

                                        $admin_query = "select * from `admin_info` where admin_ip_address='$ip'";

                                        $result = mysqli_query($con, $admin_query);
                                        while ($row = mysqli_fetch_array($result)) {

                                            $company_names = $row['company_name'];
                                            $select_products = "select * from `brand` where company_name='$company_names'";
                                            $result_product = mysqli_query($con, $select_products);
                                            while ($row_brand = mysqli_fetch_array($result_product)) {

                                                $brand_titles = $row_brand['brand_title'];
                                                $brand_id = $row_brand['brand_id'];
                                                $brand_descriptions = $row_brand['brand_description'];


                                                echo " <tr class='text-center'>

                                                <td>$brand_id</td>
                                                <td><b>$brand_titles</b></td>
                                                <td>$brand_descriptions</td>
                                            
                                            <form action='' method ='get'  > 
                                                <td class='text-center'>
                                                    <a href='brands.php?current_brand_id=$brand_id' name='current_brand_id' > <i class='fa-solid fa-trash'></i></a>
                                                </td>
                                            </form>
                                            </tr>";

                                                if (isset($_GET['current_brand_id'])) {
                                                    $current_brand_id = $_GET['current_brand_id'];
                                                    $delete_query = "delete from `brand` where brand_id = $current_brand_id";
                                                    $result_delete = mysqli_query($con, $delete_query);

                                                    echo '<script> window.open("brands.php","_self")  </script>';
                                                }
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