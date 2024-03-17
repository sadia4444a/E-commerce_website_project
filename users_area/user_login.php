<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>User Login</title>
  <!-- bootstrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
  <div class="container mt-2">
    <h1 class="text-center">User Login</h1>
  </div>

  <!-- form -->
  <form action=" " method="post">
    <!-- name -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_name" class="form-label">User Name</label>
      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required">
    </div>

    
    <!-- password -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
    </div>

    
    <!-- button -->

    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" name="user_login" class="btn btn-light btn-outline-danger mb-3 px-3" value="Login">
      <p class="small fw-bold mt-2 pt-1 mb-2">Don't have an account?<a href="user_registration.php" class="text-danger"> Register</a></p>
    </div>

  </form>





  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>

<?php

if(isset($_POST['user_login']))
{
  $user_name=$_POST['user_name'];
  $password=$_POST['password'];
  
  $select_query="Select * from user_table where user_name='$user_name'";
  $result=mysqli_query($conn,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  $user_ip=getIPAddress();

  #cart item
  $select_query_cart="Select * from cart_details where ip_address='$user_ip'";
  $select_cart=mysqli_query($conn,$select_query_cart);
  $row_count_cart=mysqli_num_rows($select_cart);
  if($row_count>0){
    $_SESSION['username']=$user_name;
    if(password_verify($password,$row_data['user_password'])){
      //echo "<script>alert('Login successful')</script>";
      if($row_count==1 and $row_count_cart==0){
        $_SESSION['username']=$user_name;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('profile.php','_self')</script>";
      }else{
        $_SESSION['username']=$user_name;
        echo "<script>alert('Login successful')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
      }
    }else{
      echo "<script>alert('Invalid Credentials')</script>";
    }
  }else{
    echo "<script>alert('Invalid Credentials')</script>";
  }

}
?>