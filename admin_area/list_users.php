<br>
<h3 class="text-center"style="color:#a00000">All users</h3>
<table class="table table-bordered mt-5">
    <thead class=""style="background-color:#a00000;color:white">

    <?php
$get_payments="Select * from user_table";
$result=mysqli_query($conn,$get_payments);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No users yet</h2>";
}else{
    echo "<tr>
<th>SI no</th>
<th>Username</th>
<th>User email</th>
<th>User Image</th>
<th>User address</th>
<th>User mobile</th>


</tr>
</thead>
<tbody class='bg-dark text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $user_name=$row_data['user_name'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo " <tr>
    <td>$number</td>
    <td>$user_name</td>
    <td>$user_email</td>
    <td><img src='../users_area/user_images/$user_image' alt='$user_name' class='product_img'/>$user_image</td>
    <td>$user_address</td>
    <td>$user_mobile</td>


    </tr>";

    }
}

    ?>
      
    </tbody>
</table>