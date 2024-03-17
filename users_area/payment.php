<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
<!-- bootstrap link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css file -->
<link rel="stylesheet" href="style.css">
<style>
    .bkash_img{
    width:50%;
    margin:auto;
    display:block;
}
</style>
</head>

<body>
    <!--php code to access user id-->
    <?php
        $user_ip=getIPAddress();
        $get_user="Select * from user_table where user_ip='$user_ip'";
        $result=mysqli_query($conn,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
    ?>
  <div class="container">
    <h2 class="text-center text-info">Payment options</h2>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
        <a href="https://www.bkash.com/" target="_blank"><img src="../image/bKash Logo Vector.jpg" alt="" class="bkash_img"></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id?>"><h2 
        class="text-center">Pay Offline</h2></a>
        </div>
    </div>
  </div>
</body>
</html>