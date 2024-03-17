<?php

include('../includes/connect.php');

if (isset($_POST['insert_product'])) {
  $product_title = $_POST['product_title'];
  $product_description = $_POST['product_description'];
  $product_keyword = $_POST['product_keyword'];
  $product_categories = $_POST['product_categories'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];
  $product_status = 'true';

  //  accessing images

  $product_img1 = $_FILES['product_img1']['name'];
  $product_img2 = $_FILES['product_img2']['name'];
  $product_img3 = $_FILES['product_img3']['name'];

  //accessing image tmp name 
  $temp_img1 = $_FILES['product_img1']['tmp_name'];
  $temp_img2 = $_FILES['product_img2']['tmp_name'];
  $temp_img3 = $_FILES['product_img3']['tmp_name'];

  //checking empty condition
  if ($product_title == ' ' or  $product_description == '' or $product_keyword == '' or  $product_categories == '' or $product_brand == '' or  $product_price == '' or $product_img1 == '' or $product_img2 == '' or $product_img3 == '') {
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
  } else {
    $folder1 = "./uploads/" . $product_img1;
    $folder2 = "./uploads/" . $product_img2;
    $folder3 = "./uploads/" . $product_img3;

    //insert query
    $insert = "INSERT INTO products(product_title,product_description,product_keyword,category_id,brand_id,product_img1,product_img2,product_img3,product_price,date,status) values ('$product_title','$product_description','$product_keyword','$product_categories','$product_brand','$product_img1','$product_img2','$product_img3','$product_price', Now() , '$product_status')";
    $result_query = mysqli_query($conn, $insert);

    move_uploaded_file($temp_img1, $folder1);
    move_uploaded_file($temp_img2, $folder2);
    move_uploaded_file($temp_img3, $folder3);
    if ($result_query) {
      echo "<script>alert('inserted the product successfully')</script>";
    } else {
      echo "<script>alert('E1 not inserted the product successfully')</script>";
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Insert_product-Admin_dashboard</title>
  <!-- bootstrap css link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
  <div class="container mt-3">
    <h1 class="text-center"> Insert Products</h1>
  </div>

  <!-- form -->
  <form action=" " method="post" enctype="multipart/form-data">
    <!-- title -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_title" class="form-label">Product title</label>
      <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required="required">
    </div>

    <!-- description -->

    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_description" class="form-label">Product description</label>
      <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
    </div>

    <!-- keyword -->

    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_keyword" class="form-label">Product keywords</label>
      <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
    </div>
    <!-- categories -->
    <div class="form-outline mb-4 w-50 m-auto">
      <select name="product_categories" class="form-select">
        <option value="">Select Category</option>

        <?php
        $select_query = "Select * from categories";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $category_title = $row['category_title'];
          $category_id = $row['category_id'];
          echo "<option value='$category_id'> $category_title</option> ";
        }
        ?>
      </select>
    </div>
    <!-- brands -->
    <div class="form-outline mb-4 w-50 m-auto">
      <select name="product_brand" class="form-select">
        <option value="">Select Brands</option>
        <?php
        $select_query = "Select * from brands";
        $result_query = mysqli_query($conn, $select_query);
        while ($row = mysqli_fetch_assoc($result_query)) {
          $brand_title = $row['brand_title'];
          $brand_id = $row['brand_id'];
          echo "<option value='$brand_id'> $brand_title</option> ";
        }
        ?>
      </select>
    </div>

    <!-- insert image1 -->

    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_img1" class="form-label">Product Image 1</label>
      <input type="file" name="product_img1" id="product_img1" class="form-control" required="required">
    </div>

    <!-- insert image2 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_img2" class="form-label">Product Image 2</label>
      <input type="file" name="product_img2" id="product_img2" class="form-control" required="required">
    </div>
    <!-- insert image3 -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_img3" class="form-label">Product Image 3</label>
      <input type="file" name="product_img3" id="product_img3" class="form-control" required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 w-50 m-auto">
      <label for="product_price" class="form-label">Product price</label>
      <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
    </div>

    <!-- button -->

    <div class="form-outline mb-4 w-50 m-auto">
      <input type="submit" name="insert_product" class="btn btn-light btn-outline-danger mb-3 px-3" value="Insert Products">
    </div>

  </form>





  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>