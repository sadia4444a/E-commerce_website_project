<?php
include('../includes/connect.php');

if (isset($_POST['insert_cat'])) {

  $category_t = $_POST['cat_title'];
  //select data
  $select_query = "Select * from categories where category_title='$category_t'";
  $result_select = mysqli_query($conn, $select_query);
  $num = mysqli_num_rows($result_select);
  if ($num > 0) {
    echo "<script> alert(' This categories present in side the database') </script>";
  } else {
    $insert_query = "insert into categories (category_title) values ('$category_t')";
    $result = mysqli_query($conn, $insert_query);

    if ($result) {
      echo "<script> alert(' Categories has been inserted Successfully') </script>";
    }
  }
}
?>


<h2 class="text-center">Insert categories</h2>

<form action="" method="post" class="mb-2">

  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-danger" id="basic-addon1">
      <i class="fa-solid fa-receipt"></i>
    </span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
  </div>


  <div class="input-group w-90 mb-2 m-auto">

    <input type="submit" class="border-0 p-2 btn btn-danger btn-outline-dark my-3" name="insert_cat" value="Insert Categories">

    <!-- <button class="btn btn-light btn-outline-dark">Insert Categories</button> -->
  </div>
</form>