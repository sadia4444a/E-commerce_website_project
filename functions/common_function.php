<?php

//include('./includes/connect.php');
//getting product

function getproducts()
{

  global $conn;

  if (!isset($_GET['category'])) {

    if (!isset($_GET['brand'])) {

      $select_query = "select * from products order by rand() limit 0,8";
      $result_query = mysqli_query($conn, $select_query);

      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img1 = $row['product_img1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo " <div class='col-md-3 mb-1 shadow-sm bg-light rounded'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1'>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>View more</a>
  </div>

</div>

</div>";
      }
    }
  }
}

function get_all_products()
{
  global $conn;

  if (!isset($_GET['category'])) {

    if (!isset($_GET['brand'])) {

      $select_query = "select * from products order by rand()";
      $result_query = mysqli_query($conn, $select_query);

      while ($row = mysqli_fetch_assoc($result_query)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_description = $row['product_description'];
        $product_img1 = $row['product_img1'];
        $product_price = $row['product_price'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        echo " <div class='col-md-3 mb-1'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1'>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>View more</a>
  </div>

</div>

</div>";
      }
    }
  }
}


//getting unique category

function getuniquecategory()
{

  global $conn;

  if (isset($_GET['category'])) {

    $category_id = $_GET['category'];

    $select_query = "select * from products where category_id=$category_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'>Sorry! No Stock for this category.</h2>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo " <div class='col-md-3 mb-1'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1'>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>View more</a>
  </div>

</div>

</div>";
    }
  }
}

//get unique brand


function getuniquebrands()
{

  global $conn;

  if (isset($_GET['brand'])) {

    $brand_id = $_GET['brand'];

    $select_query = "select * from products where brand_id=$brand_id";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'> Sorry! This brand is not available for service.</h2>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo " <div class='col-md-3 mb-1'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1 '>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>View more</a>
  </div>

</div>

</div>";
    }
  }
}






//display brands

function getbrand()
{
  global $conn;
  $select_brands = "select * from brands ";
  $result_brand = mysqli_query($conn, $select_brands);
  while ($row_data = mysqli_fetch_assoc($result_brand)) {
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "  <li class=nav-item'>
<a href='index.php?brand=$brand_id' class='nav-link text-light'>
$brand_title
</a>
</li> ";
  }
}

function getcategory()
{
  global $conn;
  $select_cat = "select * from categories ";
  $result_cat = mysqli_query($conn, $select_cat);
  while ($row_data = mysqli_fetch_assoc($result_cat)) {
    $cat_title = $row_data['category_title'];
    $cat_id = $row_data['category_id'];
    echo "  <li class=nav-item'>
<a href='index.php?category=$cat_id' class='nav-link text-light'>
$cat_title
</a>
</li> ";
  }
}

//search product

function search_product()
{
  global $conn;
  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    $search_query = "select * from products where product_keyword like '%$search_data_value%' ";
    $result_query = mysqli_query($conn, $search_query);

    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows == 0) {
      echo "<h2 class='text-center text-danger'> Sorry! No results match. No products found on this category.</h2>";
    }

    while ($row = mysqli_fetch_assoc($result_query)) {
      $product_id = $row['product_id'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];
      $product_img1 = $row['product_img1'];
      $product_price = $row['product_price'];
      $category_id = $row['category_id'];
      $brand_id = $row['brand_id'];
      echo " <div class='col-md-3 mb-1'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1'>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>View more</a>
  </div>

</div>

</div>";
    }
  }
}


//view details function
function view_details()
{
  global $conn;
  if (isset($_GET['product_id'])) {


    if (!isset($_GET['category'])) {

      if (!isset($_GET['brand'])) {
        $product_id = $_GET['product_id'];
        $select_query = "select * from products where product_id=$product_id";
        $result_query = mysqli_query($conn, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
          $product_id = $row['product_id'];
          $product_title = $row['product_title'];
          $product_description = $row['product_description'];
          $product_img1 = $row['product_img1'];
          $product_img2 = $row['product_img2'];
          $product_img3 = $row['product_img3'];
          $product_price = $row['product_price'];
          $category_id = $row['category_id'];
          $brand_id = $row['brand_id'];
          echo " <div class='col-md-3 mb-1'>
     <div class='card'>
    <img src='./admin_area/uploads/$product_img1' class='card-img-top' alt='$product_title'>
       <div class='card-body'>
    <h6 class='card-title mb-1'>$product_title </h6>
    <p class='card-text mb-1'>$product_description</p>
    <p class='card-text mb-1'><strong>Price:</strong>$product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-outline-danger mb-1' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Add to Cart</a>
    <a href='index.php' class='btn btn-outline-warning' style='--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;'>Go Home</a>
  </div>

</div>

</div>
<div class='col-md-9'>
            <!-- images -->

            <div class='row'>
              <div class='col-md-12'>
                <h2 class='text-center text-danger mb-5'>Related Product</h2>
              </div>
              <div class='col-md-6'>
              <img src='./admin_area/uploads/$product_img2' class='card-img-top' alt='$product_title'>
              </div>
              <div class='col-md-6'>
              <img src='./admin_area/uploads/$product_img3' class='card-img-top' alt='$product_title'>
              </div>
            </div>

          </div>";
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
// $ip = getIPAddress();
// echo 'User Real IP Address - ' . $ip;


//cart function
function cart()
{
  if (isset($_GET['add_to_cart'])) {

    global $conn;
    $get_ip_address = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $select_query = "select * from cart_details where ip_address='$get_ip_address' and product_id =$get_product_id ";
    $result_query = mysqli_query($conn, $select_query);
    $num_of_rows = mysqli_num_rows($result_query);
    if ($num_of_rows > 0) {
      echo "<script> alert('This item is already present inside cart.') </script>";
      echo "<script> window.open('index.php','_self')</script>";
    } else {
      $insert_query = "insert into cart_details (product_id,ip_address,quantity) values($get_product_id,'$get_ip_address',0)";
      $result_query = mysqli_query($conn, $insert_query);
      echo "<script>alert('item is  added to cart.')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
}
//function to get cart item number
function get_cart_number()
{

  if (isset($_GET['add_to_cart'])) {
    global $conn;
    $get_ip_address = getIPAddress();
    $select_query = "select * from cart_details where ip_address='$get_ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  } else {
    global $conn;
    $get_ip_address = getIPAddress();
    $select_query = "select * from cart_details where ip_address='$get_ip_address'";
    $result_query = mysqli_query($conn, $select_query);
    $count_cart_items = mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
}

//total cart price

function total_cart_price()
{

  global $conn;
  $total_price = 0;
  $get_ip_address = getIPAddress();
  $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
  $result_query = mysqli_query($conn, $cart_query);
  while ($row = mysqli_fetch_array($result_query)) {
    $product_id = $row['product_id'];
    $select_products = "select * from  products where product_id='$product_id'";
    $result_products = mysqli_query($conn, $select_products);
    while ($row_product_price = mysqli_fetch_array($result_products)) {
      $product_price = array($row_product_price['product_price']);
      $product_value = array_sum($product_price);
      $total_price += $product_value;
    }
  }
  echo $total_price;
}




//get user order details
function get_user_order_details()
{
  global $conn;
  $username = $_SESSION['username'];
  $get_details="Select * from user_table where user_name='$username'";
  $result_query=mysqli_query($conn,$get_details);
  while($row_query=mysqli_fetch_array($result_query))
  {
    $user_id = $row_query['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account']))
        {
          $get_orders="Select * from user_orders where user_id='$user_id' and 
          order_status='pending' ";
          $result_orders_query=mysqli_query($conn,$get_orders);
          $row_count=mysqli_num_rows($result_orders_query);
          if($row_count>0)
          {
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</
            span> pending orders</h3>
            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          }else{

            echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
            <p class='text-center'><a href='../index.php'class='text-dark'>Explore Products</a></p>";
          }
        }
      }
    }
  }
}
