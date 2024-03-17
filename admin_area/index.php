<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> E-shop Admin Dashboard</title>
  <!-- bootstrap css link -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css file -->
  <link rel="stylesheet" href="../style.css">
  <style>
    .admin-img {
      width: 120px;
      object-fit: contain;
      padding: 10px;
    }

    body{
      overflow-x:hidden;
    }
    .product_img{
      width:100px;
      object-fit:contain;
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <!-- <nav class="navbar navbar-expand-lg bg-light navbar-light">
      <div class="container-fluid">
        <img src="../image/cart.png" alt="logo" class="logo">
        <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="" class="nav-link"> Welcome Guest</a>
            </li>
          </ul>
        </nav>
      </div>
    </nav> -->
    <!-- second child -->
    <div class="bg-light">
      <br>
      <h3 class="text-center p-2" style="font-weight:bold;color:#a00000"> Manage Details</h3>
      <br>
    </div>
    <!-- third -->
    <div class="row"style="margin:auto">
      <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
        <div class="p-3">
          <a href="#"><img src="../image/admin.jpg" alt="photo" class="admin-img"></a>
          <p class="text-light p-2"> Srabonti Deb</p>
        </div>

        <div class="button text-center"style="margin:auto">

          <button class="btn btn-light btn-outline-dark my-3" style="margin-right:10px"><a href="insert_product.php" 
          class="nav-link text-danger my-1">Insert Products</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?view_products" 
          class="nav-link text-danger my-1">View Products</a></button>


          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?insert_category" 
          class="nav-link text-danger  my-1">Insert Categories</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?view_categories" 
          class="nav-link text-danger  my-1">View Categories</a></button>

          <button class="btn btn-light btn-outline-dark my-3" style="margin-right:10px"><a href="index.php?insert_brand" 
          class="nav-link text-danger my-1">Insert Brands</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?view_brands" 
          class="nav-link text-danger my-1">View Brands</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?list_orders" 
          class="nav-link text-danger  my-1">All Orders</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?list_payments" 
          class="nav-link text-danger  my-1">All Payments</a></button>

          <button class="btn btn-light btn-outline-dark" style="margin-right:10px"><a href="index.php?list_users" 
          class="nav-link text-danger  my-1">List Users</a></button>

          <!-- <button class="btn btn-light btn-outline-dark"><a href="" 
          class="nav-link text-danger  my-1">Logout</a></button> -->




        </div>

      </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
      <?php
      if (isset($_GET['insert_category'])) {
        include('insert_categories.php');
      }
      if (isset($_GET['insert_brand'])) {
        include('insert_brands.php');
      }
      if (isset($_GET['view_products'])) {
        include('view_products.php');
      }
      if (isset($_GET['edit_products'])) {
        include('edit_products.php');
      }
      if (isset($_GET['delete_product'])) {
        include('delete_product.php');
      }
      if (isset($_GET['view_categories'])) {
        include('view_categories.php');
      }
      if (isset($_GET['view_brands'])) {
        include('view_brands.php');
      }
      if (isset($_GET['edit_category'])) {
        include('edit_category.php');
      }
      if (isset($_GET['edit_brands'])) {
        include('edit_brands.php');
      }
      if (isset($_GET['delete_category'])) {
        include('delete_category.php');
      }
      if (isset($_GET['delete_brands'])) {
        include('delete_brands.php');
      }
      if (isset($_GET['list_orders'])) {
        include('list_orders.php');
      }
      if (isset($_GET['list_payments'])) {
        include('list_payments.php');
      }
      if (isset($_GET['list_users'])) {
        include('list_users.php');
      }
      ?>
    </div>





    <!-- last child -->

    <!-- <div class="bg-info p-3 text-center footer">
      <p>All reserved @- Designed By Sadia Sultana,Srabonti deb,Fatema Tuj Johra-2022</p>
    </div>-->
    <?php
  include("../includes/footer.php");
  ?>
  </div> 


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>