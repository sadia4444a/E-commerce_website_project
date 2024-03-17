<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="Select * from products where product_id=$edit_id";
    $result=mysqli_query($conn,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    //echo $product_title;
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_img1=$row['product_img1'];
    $product_img2=$row['product_img2'];
    $product_img3=$row['product_img3'];
    $product_price=$row['product_price'];

    $select_category="Select * from categories where category_id=$category_id";
    $result_category=mysqli_query($conn,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    //echo $category_title;

    $select_brand="Select * from brands where brand_id=$brand_id";
    $result_brand=mysqli_query($conn,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
    //echo $brand_title;
}

?>

<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>"
            name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" value="<?php echo $product_description?>" 
            name="product_description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keyword" class="form-label">Product keywords</label>
            <input type="text" id="product_keyword" value="<?php echo $product_keyword?>" name="product_keyword" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product category</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title?>"><?php echo $category_title?></option>

                <?php
                $select_category_all="Select * from categories";
                $result_category_all=mysqli_query($conn,$select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };
              
                ?>

                
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">Product brands</label>
            <select name="product_brands" class="form-select">
            <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option>   
            <?php
                $select_brand_all="Select * from brands";
                $result_brand_all=mysqli_query($conn,$select_brand_all);
                while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                    $brand_title=$row_brand_all['brand_title'];
                    $brand_id=$row_brand_all['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                };
              
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img1" class="form-label">Product img1</label>
            <div class="d-flex">
            <input type="file" id="product_img1" name="product_img1" class="form-control w-90 m-auto" required="required">
            <img src="./uploads/<?php echo $product_img1?>" alt="" class="product_img">
            </div>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img2" class="form-label">Product img2</label>
            <div class="d-flex">
            <input type="file" id="product_img2" name="product_img2" class="form-control w-90 m-auto" required="required">
            <img src="./uploads/<?php echo $product_img2?>" alt="" class="product_img">
            </div>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_img3" class="form-label">Product img3</label>
            <div class="d-flex">
            <input type="file" id="product_img3" name="product_img3" class="form-control w-90 m-auto" required="required">
            <img src="./uploads/<?php echo $product_img3?>" alt="" class="product_img">
            </div>  
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" id="product_price" value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" value="Update product" class="btn btn-dark px-3 mb-3">
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];

    $temp_img1=$_FILES['product_img1']['tmp_name'];
    $temp_img2=$_FILES['product_img2']['tmp_name'];
    $temp_img3=$_FILES['product_img3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keyword=='' or 
    $product_category=='' or $product_brands=='' or $product_price=='' or $product_img1=='' 
    or $product_img2=='' or $product_img3==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_img1,"./uploads/$product_img1");
        move_uploaded_file($temp_img2,"./uploads/$product_img2");
        move_uploaded_file($temp_img3,"./uploads/$product_img3");

        //update products
        $update_product="update products set product_title='$product_title',
        product_description='$product_description',product_keyword='$product_keyword',
        category_id='$product_category',brand_id='$product_brands',product_img1='$product_img1',
        product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',date=NOW()
        where product_id=$edit_id";
        $result_update=mysqli_query($conn,$update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('./insert_product.php','_self')</script>";

        }

    }

}
?>