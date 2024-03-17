<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Shop</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="style.css">
  <style>
    .cart_image {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
  </style>

</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <img src="./image/cart.png" alt="cart" class="logo">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="text-danger"><?php get_cart_number(); ?></sup></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- calling cart function -->
    <?php
    cart();
    ?>
    <!-- second navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 ">
      <ul class="navbar-nav me-auto">
      <?php
      if(!isset($_SESSION['username'])){
                echo  " <li class='nav-item'>
                <a class='nav-link text-danger' href='#'>Welcome Guest</a>
              </li>";
              }else{
                echo  "<li class='nav-item'>
                <a class='nav-link text-danger' href='#'>Welcome ".$_SESSION['username']."</a>
              </li>"; 
              }

     
              if(!isset($_SESSION['username'])){
                echo  "<li class='nav-item'>
                <a class='nav-link text-danger' href='./users_area/user_login.php'>Login</a>
              </li>";
              }else{
                echo  "<li class='nav-item'>
                <a class='nav-link text-danger' href='./users_area/user_logout.php'>Logout</a>
              </li>"; 
              }
            ?>
      </ul>
    </nav>

    <!-- third child -->
    <!-- <div class="bg-light">
      <h3 class="text-center"> Hidden store</h3>
      <p class="text-center">Communication is at the heart of e-commerce and community!</p>
    </div> -->
    <!-- child table -->
    <div class="container">
      <div class="row">
        <form action="" method="POST">
          <table class="table table-bordered text-center">

            <tbody>
              <!-- php code for cart -->
              <?php
              global $conn;
              $total_price = 0;
              $get_ip_address = getIPAddress();
              $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
              $result_query = mysqli_query($conn, $cart_query);
              $result_count = mysqli_num_rows($result_query);
              if ($result_count > 0) {
                echo "<thead>
                <tr>
                  <th>Product Title</th>
                  <th> Product Image</th>
                  <th>Quantity</th>
                  <th>Total Price</th>
                  <th>Remove</th>
                  <th colspan='2'>Operation</th>
                </tr>
              </thead>";
                while ($row = mysqli_fetch_array($result_query)) {
                  $product_id = $row['product_id'];
                  $select_products = "select * from  products where product_id='$product_id'";
                  $result_products = mysqli_query($conn, $select_products);
                  while ($row_product_price = mysqli_fetch_array($result_products)) {
                    $product_price = array($row_product_price['product_price']);
                    $price_table = $row_product_price['product_price'];
                    $product_title = $row_product_price['product_title'];
                    $product_img1 = $row_product_price['product_img1'];
                    $product_value = array_sum($product_price);
                    $total_price += $product_value;

              ?>
                    <tr>
                      <td><?php echo $product_title ?></td>
                      <td>
                        <img src="./admin_area/uploads/<?php echo $product_img1 ?>" alt="<?php echo $product_title ?>" class="cart_image">
                      </td>

                      <td><input type="text" name="qty" value="" class="form-input w-50 "></td>
                      <?php
                      $get_ip_address = getIPAddress();
                      if (isset($_POST['update_cart'])) {
                        $quantities = $_POST['qty'];
                        $update_cart = "update cart_details set quantity=$quantities where ip_address='$get_ip_address'";
                        $result_products_quantities = mysqli_query($conn, $update_cart);
                        $total_price = $total_price * $quantities;
                      }
                      ?>

                      <td><?php echo $price_table ?>/-</td>
                      <td><input type="checkbox" name="remove_item[]" value="<?php echo $product_id ?>" id=""></td>
                      <td>
                        <!-- <button class="btn btn-light btn-outline-danger">Update</button> -->
                        <input type="submit" value="Update cart" name="update_cart" class="btn btn-light btn-outline-danger">
                        <input type="submit" value="Remove cart" name="remove_cart" class="btn btn-light btn-outline-danger">
                      </td>
                      </td>
                    </tr>
              <?php
                  }
                }
              } else {
                echo "<h3 class='text-center text-danger'>Cart is empty.</h3>";
              }

              ?>
            </tbody>
          </table>
          <!-- subtotal-->
          <div class="d-flex">
            <?php
            global $conn;
            $get_ip_address = getIPAddress();
            $cart_query = "select * from cart_details where ip_address='$get_ip_address'";
            $result_query = mysqli_query($conn, $cart_query);
            $result_count = mysqli_num_rows($result_query);
            if ($result_count > 0) {
              echo "<h5 class='px-4 mt-2'>Subtotal:<strong class='text-danger'>$total_price/-</strong></h5>
              <button class='btn btn-light btn-outline-dark mx-2 px-3'><a href='index.php' class='nav-link text-danger'>Continue Shopping</a></button>
              <button class='btn btn-light btn-outline-dark mx-2 px-3'><a href='./users_area/checkout.php' class='nav-link text-danger'>Check Out</a></button>
            ";
            } else {
              echo "<button class='btn btn-light btn-outline-dark mx-2 px-3'><a href='index.php' class='nav-link text-danger'>Continue Shopping</a></button>";
            }
            ?>

          </div>
      </div>

    </div>
    </form>

    <?php
    function remove_cart()
    {
      global $conn;
      if (isset($_POST['remove_cart'])) {
        foreach ($_POST['remove_item'] as $remove_id) {
          echo $remove_id;
          $delete_query = "delete from cart_details where product_id=$remove_id";
          $run_delete = mysqli_query($conn, $delete_query);
          if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
          }
        }
      }
    }
    echo $remove_item = remove_cart();
    ?>



    <!-- include footer -->

    <?php
    include("./includes/footer.php");
    ?>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>