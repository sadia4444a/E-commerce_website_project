<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Welcome <?php echo $_SESSION['username']?></title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="../style.css">
<style>
  .profile_img{
    width:90%;
    height:80%;
    margin:auto;
    display:block;
    object-fit:contain;
  
}
.edit_image{
  width:100px;
  height:100px;
  object-fit:contain;
}
.your_profile{
  color:white;
  text-decoration:underline;
}
  </style>

</head>

<body>
  
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <img src="../image/cart.png" alt="cart" class="logo">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="profile.php">My account</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
            <li class="nav-item">
              <!-- cart2 change -->
              <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup class="text-danger"><?php get_cart_number(); ?></sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Total price:<?php total_cart_price(); ?> /-</a>
            </li>
          </ul>
          <form class="d-flex" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
            <input class="btn btn-danger btn-outline-dark " type="submit" value="Search" name="search_data_product">
          </form>
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
                <a class='nav-link text-danger' href='./users_area/logout.php'>Logout</a>
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


   <!-- fourth child -->
   <div class="row">
     <div class="col-md-2">
     <ul class="navbar-nav bg-dark text-center" style="height:100vh">
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="#"><h5 class="your_profile">Your profile</h5></a>
            </li>
            <?php
              $username = $_SESSION['username'];
              $user_image="Select * from user_table where user_name='$username'";
              $user_image=mysqli_query($conn,$user_image);
              $row_image=mysqli_fetch_array($user_image);
              $user_image=$row_image['user_image'];
              echo "<li class='nav-item bg-dark'>
              <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
              </li>";

            ?>
            
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="profile.php">Pending orders</a>
            </li>
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
            </li>
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="profile.php?my_orders">My order</a>
            </li>
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="profile.php?delete_account">Delete account</a>
            </li>
            <li class="nav-item bg-dark">
              <a class="nav-link text-light" href="logout.php">Logout</a>
            </li>
     </ul>
     </div>
     <div class="col-md-10 text-center">
              <?php get_user_order_details();
              if(isset($_GET['edit_account'])){
                include('edit_account.php');
              }
              if(isset($_GET['my_orders'])){
                include('user_orders.php');
              }
              if(isset($_GET['delete_account'])){
                include('delete_account.php');
              }
              ?>
     </div>
    </div>

  <!-- include footer -->

  <?php
  include("../includes/footer.php");
  ?>
  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>