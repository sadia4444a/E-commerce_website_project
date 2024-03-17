<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
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

</head>
<body class="bg-light">
  <div class="container mt-3">
    <h1 class="text-center">New User Registration</h1>
  </div>

  <!-- form -->
  <form action=" " method="post" enctype="multipart/form-data">
    <!-- name -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_name" class="form-label">User Name</label>
      <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" autocomplete="off" required="required">
    </div>

    <!-- email -->

    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_email" class="form-label">Email</label>
      <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required="required">
    </div>

    

    <!-- insert image -->

    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_image" class="form-label">User Image</label>
      <input type="file" name="user_image" id="user_image" class="form-control" required="required">
    </div>


    <!-- password -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required="required">
    </div>

    
    <!-- confirming password -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="confirm_password" class="form-label">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required">
    </div>

    
    <!-- address -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_address" class="form-label">Address</label>
      <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Your Address" autocomplete="off" required="required">
    </div>

    <!-- contact -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="user_contact" class="form-label">Contact Number</label>
      <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Your Phone Number" autocomplete="off" required="required">
    </div>

    <!-- button -->

    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" name="user_register" class="btn btn-light btn-outline-danger mb-3 px-3" value="Register">
      <p class="small fw-bold mt-2 pt-1 mb-2">Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
    </div>

  </form>





  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

<!--php code-->
<?php
if(isset($_POST['user_register']))
{
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_confirm_password=$_POST['confirm_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_image']['name'];  
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();

    //select query

  $select_query = "Select * from user_table where user_name='$user_name' or user_email='$user_email'";
  $result=mysqli_query($conn,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username and email already exist')</script>";
  }else if($user_password != $user_confirm_password){
    echo "<script>alert('Passwords don't match')</script>";
  }
  else{
    // insert query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query = "INSERT INTO user_table(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_execute = mysqli_query($conn,$insert_query);
  }   


// selecting cart items
$select_cart_items="Select * from cart_details where 
ip_address='$user_ip'";
$result_cart=mysqli_query($conn,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_name;
  echo "<script>alert('you have items in your cart')</script>";
  echo "<script>window.open('checkout.php','_self'</script>";
}else{
  echo "<script>window.open('../index.php','_self'</script>";
}
}
?>