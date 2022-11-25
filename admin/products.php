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
if (isset($_POST['insert_product'])) {

    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_price = $_POST['product_price'];
    $stocks = $_POST['stocks'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_keyword = $_POST['product_keyword'];
    $product_status = true;
    //acesseing images
    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    //accessing image tmp name
    $temp_img1 = $_FILES['product_img1']['tmp_name'];
    $temp_img2 = $_FILES['product_img2']['tmp_name'];
    $temp_img3 = $_FILES['product_img3']['tmp_name'];


    move_uploaded_file($temp_img1, "./product_images/$product_img1");
    move_uploaded_file($temp_img2, "./product_images/$product_img2");
    move_uploaded_file($temp_img3, "./product_images/$product_img3");

    $products_insert = "INSERT INTO biproducts(BiproductName,catergory_id,Biproduct_Description,brand_id,product_keyword,product_img1,product_img2,product_img3,price,date,status,stocks) VALUES ('$product_title','$product_category','$description','$product_brand','$product_keyword','$product_img1','$product_img2','$product_img3','$product_price',NOW(),'$product_status','$stocks')";

    $results_query = mysqli_query($con, $products_insert);
    if ($results_query) {
        echo '<div class="alert alert-success alert-dismissible d-flex align-items-center fade show ">
        <i class="bi-check-circle-fill"></i>
      <strong class="mx-2">Success!</strong> Producted Added .
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>';
    } else {

        echo 'Error' . mysqli_error($con);
    }
}



?>
<?php include('../includes/header.php') ?>
<?php include('../includes/navbar.php') ?>





<main class="p-5 container">

    <div class="pb-5">
        <h1 class="fw-bolder">Insert products</h1>
    </div>
    <section class="section" style="padding-bottom: 10rem;">


        <form action="" method="post" enctype="multipart/form-data">

            <div class="row ">
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header fw-bolder">
                            <h4>Basic</h4>
                        </div>

                        <div class="card-body " style="margin-top:20px ;">


                            <div class="mb-4">

                                <label for="product-title" class="form-label fw-bolder">Product title</label>
                                <input type="text" name="product_title" id="product-title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
                            </div>

                            <div class="mb-4">

                                <label for="description" class="form-label fw-bolder">Product description</label>
                                <textarea type="text" name="description" id="description" class="form-control" placeholder="Enter description" autocomplete="off" required="required"></textarea>
                            </div>


                            <div class="mb-4">

                                <label for="price" class="form-label fw-bolder"> Product price</label>
                                <input type="text" name="product_price" id="price" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">
                            </div>

                            <div class="mb-4">

                                <label for="stocks" class="form-label fw-bolder"> Product stocks</label>
                                <input type="text" name="stocks" id="stocks" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">
                            </div>




                        </div>





                    </div>

                    <div class="card mb-4">

                        <div class="card-header">
                            <h4>Organization</h4>
                        </div>

                        <div class="card-body">

                            <div class="row gx-2" style="margin-top:20px ;">
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bolder">Category</label>
                                    <select class="form-select" name="product_category">

                                        <?php

                                        $select_query = "Select * from `categories`";
                                        $result_query = mysqli_query($con, $select_query);

                                        while ($row = mysqli_fetch_assoc($result_query)) {


                                            $category_title = $row['catergory_name'];
                                            $category_id = $row['catergory_id'];
                                            echo " <option value='$category_id'> $category_title </option>";
                                        }




                                        ?>

                                    </select>

                                </div>

                                <div class="col-sm-6 mb-3">
                                    <label class="form-label fw-bolder">Brand</label>
                                    <select class="form-select" name="product_brand">
                                        <?php

                                        $select_brands = "Select * from `brand`";
                                        $result_brands = mysqli_query($con, $select_brands);



                                        while ($row_data = mysqli_fetch_assoc($result_brands)) {

                                            $brand_title = $row_data['brand_title'];
                                            $brand_id = $row_data['brand_id'];
                                            echo "<option value='$brand_id'> $brand_title </option> ";
                                        }
                                        ?>

                                    </select>

                                </div>
                                <div class="mb-4">

                                    <label for="keywords" class="form-label fw-bolder"> Product keywords</label>
                                    <input type="text" name="product_keyword" id="keywords" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">
                                </div>

                            </div>




                        </div>

                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="row mb-5">
                        <div class="card mb-4 p-0">
                            <div class="card-header fw-bolder ">
                                <h4>Media</h4>
                            </div>
                            <div class="card-body">
                                <img style="max-width:100px;
                                                    margin-top: 20px;
                                                    margin-bottom: 20px;
                                                    display: block;
                                                    margin-left: auto;
                                                    margin-right: auto;
                                                    width: 50%;" src="../images/icons8-add-image-80.png" alt="">



                                <label for="product_img1" class="form-label fw-bolder"> Product image 1</label>
                                <input type="file" name="product_img1" id="product_img1" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">



                                <label for="product_img2" class="form-label fw-bolder"> Product image 2</label>
                                <input type="file" name="product_img2" id="product_img2" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">



                                <label for="product_img3" class="form-label fw-bolder"> Product image 3</label>
                                <input type="file" name="product_img3" id="product_img3" class="form-control" placeholder="Enter keyword" autocomplete="off" required="required">


                            </div>

                        </div>
                        <div class="form-outline mb-4 w-50 m-auto ">


                            <input type="submit" name="insert_product" class="btn btn-outline-dark mb-3 px-3 fw-bolder" value="Insert product">
                        </div>

                    </div>

                </div>












            </div>
        </form>









    </section>

    <div class="container ">

        <div class="pb-5">
            <h1 class="fw-bolder">View products</h1>
        </div>
        <div class="row ">

            <table class="table  text-center">
                <thead>

                    <tr>
                        <th> Product Id</th>
                        <th> Product Name</th>
                        <th> Product Image</th>
                        <th> Product Description</th>
                        <th> Delete</th>





                    </tr>



                </thead>
                <tbody>

                    <?php
                    $ip = getIPAddress();

                    $admin_query = "select * from `admin_info` where admin_ip_address='$ip'";

                    $result = mysqli_query($con, $admin_query);
                    while ($row = mysqli_fetch_array($result)) {

                        $company_names = $row['company_name'];
                        $select_brands = "select * from `brand` where company_name='$company_names'";
                        $result_brands = mysqli_query($con, $select_brands);
                        while ($row_brand = mysqli_fetch_array($result_brands)) {


                            $brand_id = $row_brand['brand_id'];

                            $select_products = "select * from `biproducts` where brand_id = $brand_id ";
                            $results_products = mysqli_query($con, $select_products);
                            while ($row_products = mysqli_fetch_array($results_products)) {

                                $products_id = $row_products['Biproduct_id'];
                                $products_name = $row_products['BiproductName'];
                                $products_img1 = $row_products['product_img1'];
                                $products_description = $row_products['Biproduct_Description'];


                                echo " <tr class='text-center'>

                                    <td> $products_id</td>
                                    <td><b>$products_name</b></td>
                                    <td><img src='../admin/product_images/$products_img1' alt='' width='80px' height='80px'></td>
                                    <td> $products_description </td>
     
                                   <form action='' method ='get'> 
                                   <td class='text-center'>
                                  <a href='products.php?current_product_id=$products_id' name='current_product_id' > <i class='fa-solid fa-trash'></i></a>
                                  </td>
                                 </form>
                                   </tr>";
                            }
                        }
                        if (isset($_GET['current_product_id'])) {
                            $current_product_id = $_GET['current_product_id'];
                            $delete_products = "delete from `biproducts` where Biproduct_id=$current_product_id  ";
                            $delete_query = mysqli_query($con, $delete_products);

                            echo '<script> window.open("products.php","_self")  </script>';
                        }
                    }
                    ?>
                </tbody>


            </table>







        </div>




    </div>


</main>




<?php include('../includes/footer.php') ?>