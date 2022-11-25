<?php

//include data-base connection file

// include('../includes/connect.php');

//displaying products on user page by fetching data from database

function getproducts()
{
    global $con;

    //condition to check isset or not

    if (!isset($_GET['category'])) {

        if (!isset($_GET['brand'])) {


            $select_query = " select * from `biproducts` order by rand() limit 0,4 ";
            $result_query = mysqli_query($con, $select_query);




            while ($row = mysqli_fetch_assoc($result_query)) {

                $product_id = $row['Biproduct_id'];
                $product_title = $row['BiproductName'];
                $product_description = $row['Biproduct_Description'];
                $product_image1 = $row['product_img1'];
                $category_id = $row['catergory_id'];
                $brand_id = $row['brand_id'];
                $product_price = $row['price'];

                echo "  <div class='col-md-3 mb-3'>
                          <div class='card border border-dark' style='width: 18rem;'>
                          <img src='../admin/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                              <div class='card-body border-top border-dark'>
                                <h5 class='card-title fw-bolder'>$product_title</h5><br>
                            
                                <h5>Rs $product_price</h5><br>
                                <a href='main.php?add_to_cart=$product_id' class='btn btn-outline-dark mt-auto'><i class='fa-solid fa-cart-arrow-down'></i> </a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-success '>View Detail</a>
                              </div>
                          </div>
                    </div>";
            }
        }
    }
}









//getting unique categories
function get_unique_categories()
{
    global $con;

    //condition to check isset or not

    if (isset($_GET['category'])) {

        $category_id = $_GET['category'];


        $select_query = "SELECT * FROM biproducts WHERE catergory_id =$category_id ";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {

            echo "<h2 class='text-center text-danger'> No stocks for this category </h2>";
        }




        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['Biproduct_id'];
            $product_title = $row['BiproductName'];
            $product_description = $row['Biproduct_Description'];
            $product_image1 = $row['product_img1'];
            $category_id = $row['catergory_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['price'];

            echo "  <div class='col-md-3 mb-3'>
                          <div class='card border border-dark' style='width: 18rem;'>
                          <img src='../admin/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                              <div class='card-body border-top border-dark'>
                                <h5 class='card-title fw-bolder'>$product_title</h5><br>
                             
                                <h5>Rs $product_price</h5><br>
                                <a href='main.php?add_to_cart=$product_id' class='btn btn-outline-dark mt-auto'><i class='fa-solid fa-cart-arrow-down'></i> </a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-success '>View Detail</a>
                              </div>
                          </div>
                    </div>";
        }
    }
}


//getting unique brand
function get_unique_brands()
{
    global $con;

    //condition to check isset or not

    if (isset($_GET['brand'])) {

        $brand_id = $_GET['brand'];


        $select_query = "SELECT * FROM biproducts WHERE brand_id =$brand_id ";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {

            echo "<h2 class='text-center text-danger'> No stocks for this Brand </h2>";
        }




        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['Biproduct_id'];
            $product_title = $row['BiproductName'];
            $product_description = $row['Biproduct_Description'];
            $product_image1 = $row['product_img1'];
            $category_id = $row['catergory_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['price'];

            echo "  <div class='col-md-3 mb-3'>
                          <div class='card border border-dark' style='width: 18rem;'>
                          <img src='../admin/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                              <div class='card-body border-top border-dark'>
                                <h5 class='card-title fw-bolder'>$product_title</h5><br>
                              
                                <h5>Rs $product_price</h5> <br>
                                <a href='main.php?add_to_cart=$product_id' class='btn btn-outline-dark mt-auto'><i class='fa-solid fa-cart-arrow-down'></i> </a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-success '>View Detail</a>
                              </div>
                          </div>
                    </div>";
        }
    }
}


// getting all products

function get_all_products()
{

    global $con;

    //condition to check isset or not

    if (!isset($_GET['category'])) {

        if (!isset($_GET['brand'])) {


            $select_query = " select * from `biproducts` ";
            $result_query = mysqli_query($con, $select_query);




            while ($row = mysqli_fetch_assoc($result_query)) {

                $product_id = $row['Biproduct_id'];
                $product_title = $row['BiproductName'];
                $product_description = $row['Biproduct_Description'];
                $product_image1 = $row['product_img1'];
                $category_id = $row['catergory_id'];
                $brand_id = $row['brand_id'];
                $product_price = $row['price'];

                echo "  <div class='col-md-3 mb-3'>
                          <div class='card border border-dark' style='width: 18rem;'>
                          <img src='../admin/product_images/$product_image1' class='card-img-top p-2' alt='...'>
                              <div class='card-body border-top border-dark'>
                                <h5 class='card-title fw-bolder'>$product_title</h5><br>
                           
                                <h5>Rs $product_price</h5><br>
                                <a href='all_products.php?add_to_cart=$product_id' class='btn btn-outline-dark mt-auto'><i class='fa-solid fa-cart-arrow-down'></i> </a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-success'>View Detail</a>
                              </div>
                          </div>
                    </div>";
            }
        }
    }
}




//displaying brands list on user page-sidenav  by fetching data from the database.

function displaybrand()
{
    global $con;
    $select_brands = "Select * from `brand`";
    $result_brands = mysqli_query($con, $select_brands);

    echo "<li class='list-group-item'> <a href='main.php?#products' class='nav-link'>All</a> </li>";

    while ($row_data = mysqli_fetch_assoc($result_brands)) {

        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='list-group-item'> <a href='main.php?brand=$brand_id#products' class='nav-link'>$brand_title</a> </li>";
    }
};

//displaying catergory list on user page-sidenav by fetching data from the database.

function displaycategories()
{
    global $con;

    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);


    echo "<li class='list-group-item'> <a href='main.php?#products' class='nav-link'>All</a> </li>";
    while ($row_data = mysqli_fetch_assoc($result_categories)) {

        $category_title = $row_data['catergory_name'];
        $category_id = $row_data['catergory_id'];
        echo "<li class='list-group-item'> <a href='main.php?category=$category_id#products' class='nav-link'>$category_title</a> </li>";
    }
}


function displaybrand_for_all_products_page()
{
    global $con;
    $select_brands = "Select * from `brand`";
    $result_brands = mysqli_query($con, $select_brands);

    echo "<li class='list-group-item'> <a href='all_products.php?#products' class='nav-link'>All</a> </li>";

    while ($row_data = mysqli_fetch_assoc($result_brands)) {

        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='list-group-item'> <a href='all_products.php?brand=$brand_id#products' class='nav-link'>$brand_title</a> </li>";
    }
};

//displaying catergory list on user page-sidenav by fetching data from the database.

function displaycategories_for_all_products_page()
{
    global $con;

    $select_categories = "Select * from `categories`";
    $result_categories = mysqli_query($con, $select_categories);


    echo "<li class='list-group-item'> <a href='all_products.php?#products' class='nav-link'>All</a> </li>";
    while ($row_data = mysqli_fetch_assoc($result_categories)) {

        $category_title = $row_data['catergory_name'];
        $category_id = $row_data['catergory_id'];
        echo "<li class='list-group-item'> <a href='all_products.php?category=$category_id#products' class='nav-link'>$category_title</a> </li>";
    }
}



//searching products

function search_products()
{

    global $con;

    //condition to check isset or not
    if (isset($_GET['search_data_product'])) {

        $search_data_value = $_GET['search_data'];


        $search_query = "select * from `biproducts` where product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows == 0) {

            echo "<h2 class='text-center text-danger'> No result found! </h2>";
        }




        while ($row = mysqli_fetch_assoc($result_query)) {

            $product_id = $row['Biproduct_id'];
            $product_title = $row['BiproductName'];
            $product_description = $row['Biproduct_Description'];
            $product_image1 = $row['product_img1'];
            $category_id = $row['catergory_id'];
            $brand_id = $row['brand_id'];
            $product_price = $row['price'];

            echo "  <div class='col-md-3 mb-3 '>
                          <div class='card border border-dark' style='width: 18rem;'>
                          <img src='../admin/product_images/$product_image1' class='card-img-top p-2' alt='...' >
                              <div class='card-body border-top border-dark'>
                                <h5 class='card-title fw-bolder'>$product_title</h5><br>
                            
                                <h5>Rs $product_price</h5><br>
                                
                                <a href='all_products.php?add_to_cart=$product_id' class='btn btn-outline-dark mt-auto'><i class='fa-solid fa-cart-arrow-down'></i> </a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-outline-success '>View Detail</a>
                              </div>
                          </div>
                    </div>";
        }
    }
}



//view detail function


function view_product_detail()
{
    global $con;

    //condition to check isset or not


    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {

            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];

                $select_query = " select * from `biproducts` where Biproduct_id=$product_id";
                $result_query = mysqli_query($con, $select_query);


                while ($row = mysqli_fetch_assoc($result_query)) {



                    $product_id = $row['Biproduct_id'];
                    $product_title = $row['BiproductName'];
                    $product_description = $row['Biproduct_Description'];
                    $product_image1 = $row['product_img1'];
                    $product_image2 = $row['product_img2'];
                    $product_image3 = $row['product_img3'];
                    $product_stocks = $row['stocks'];

                    $product_price = $row['price'];


                    echo "<section class='py-5 m-3'>
                          <div class='container px-4 px-lg-5 my-5 p-4 '>
                        <div class='row gx-4 gx-lg-5 align-items-center '>


                         <div class='col-md-6 '>
            <div id='myCarousel' class='carousel slide' data-bs-ride='carousel'>
                <div class='carousel-indicators '>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
                </div>
                <div class='carousel-inner'>
                    <div class='carousel-item active'>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image1'  />


                    </div>
                    <div class='carousel-item '>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image2'  />


                    </div>
                    <div class='carousel-item '>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image3'  />


                    </div>
                    
                </div>
                <button class='carousel-control-prev' type='button' data-bs-target='#myCarousel' data-bs-slide='prev' >
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#myCarousel' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                </button>
            </div>





        </div> <div class='col-md-6 pb-5'>

        <h1 class='display-5 fw-bolder'>$product_title</h1>
        <div class='fs-5 mb-5'><br>
        
            <span>Rs $product_price</span><br>
            <span>Available Stocks: $product_stocks</span>
        </div>
        <p class='lead'>$product_description</p>
        
        <div class='d-flex'>
       
            <a href='all_products.php?add_to_cart=$product_id' class='btn btn-outline-dark '><i class='fa-solid fa-cart-shopping'></i>&nbsp; Add to cart</a>
          
            
        </div>
        </div>
        </div>
        </div>
        </section>";
                }
            }
        }
    }
}





function edit_delete_item()
{
    global $con;

    //condition to check isset or not


    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {

            if (!isset($_GET['brand'])) {

                $product_id = $_GET['product_id'];

                $select_query = " select * from `biproducts` where Biproduct_id=$product_id";
                $result_query = mysqli_query($con, $select_query);


                while ($row = mysqli_fetch_assoc($result_query)) {



                    $product_id = $row['Biproduct_id'];
                    $product_title = $row['BiproductName'];
                    $product_description = $row['Biproduct_Description'];
                    $product_image1 = $row['product_img1'];
                    $product_image2 = $row['product_img2'];
                    $product_image3 = $row['product_img3'];
                    $product_stocks = $row['stocks'];

                    $product_price = $row['price'];


                    echo "<section class='py-5 m-3'>
                          <div class='container px-4 px-lg-5 my-5 p-4 '>
                        <div class='row gx-4 gx-lg-5 align-items-center '>


                         <div class='col-md-6 '>
            <div id='myCarousel' class='carousel slide' data-bs-ride='carousel'>
                <div class='carousel-indicators '>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='1' aria-label='Slide 2'></button>
                    <button type='button' data-bs-target='#myCarousel' data-bs-slide-to='2' aria-label='Slide 3'></button>
                </div>
                <div class='carousel-inner'>
                    <div class='carousel-item active'>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image1'  />


                    </div>
                    <div class='carousel-item '>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image2'  />


                    </div>
                    <div class='carousel-item '>
                        <img style='background-position: center center cover; height: 50vh; width:100%;background-repeat: no-repeat;' class='rounded p-5 card-img-top' src='../admin/product_images/$product_image3'  />


                    </div>
                    
                </div>
                <button class='carousel-control-prev' type='button' data-bs-target='#myCarousel' data-bs-slide='prev' >
                    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Previous</span>
                </button>
                <button class='carousel-control-next' type='button' data-bs-target='#myCarousel' data-bs-slide='next'>
                    <span class='carousel-control-next-icon' aria-hidden='true'></span>
                    <span class='visually-hidden'>Next</span>
                </button>
            </div>





        </div> <div class='col-md-6 pb-5'>

        <h1 class='display-5 fw-bolder'>$product_title</h1>
        <div class='fs-5 mb-5'><br>
        
            <span>Rs $product_price</span><br>
            <span>Available Stocks: $product_stocks</span>
        </div>
        <p class='lead'>$product_description</p>
        <form action='' method='post'>
        <div class='d-flex'>
       
            <input type='number' min='1' name='qty' class='form-input-w-50 text-center' value='1' style='max-width:3rem;'>
            <input type='submit' class='btn btn-outline-dark mx-1' value='Add Quantity' name='update_cart'>
            <input type='submit' class='btn btn-outline-danger mx-1' value='Delete Item' name='delete_cart'>
            </form>
            
        </div>
        </div>
        </div>
        </div>
        </section>";
                }
            }
        }
    }
}








//get ip address function 
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


//cart function
function cart()
{
    if (isset($_GET['add_to_cart'])) {


        global $con;
        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "select * from `cart_details` where ip_address='$ip' and Biproduct_id =$get_product_id ";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {

            echo '<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
                      <i class="bi-exclamation-octagon-fill"></i>
                      <strong class="mx-2">Sorry!</strong> Product already  added to cart <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                 </div>';
        } else {



            $insert_query = "INSERT INTO  cart_details (ip_address,quantity,Biproduct_id) VALUES('$ip',1,$get_product_id) ";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>  window.open('../user/cart.php','_self')</script>";
        }
    }
}

// function to get cart item numbers


function cart_item()
{
    if (isset($_GET['add_to_cart'])) {


        global $con;
        $ip = getIPAddress();

        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {


        global $con;
        $ip = getIPAddress();

        $select_query = "select * from `cart_details` where ip_address='$ip'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

//total price function

function total_cart_price()
{


    global $con;
    $total = 0;

    $ip = getIPAddress();

    $cart_query = "select * from `cart_details` where ip_address='$ip'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $quantity = $row['quantity'];
        $product_id = $row['Biproduct_id'];
        $select_products = "select * from `biproducts` where Biproduct_id=$product_id";
        $result_product = mysqli_query($con, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_product)) {

            $product_price = array($row_product_price['price'] * $quantity);

            $product_values = array_sum($product_price);
            $total += $product_values;
        }
    }




    echo "$total";
}
