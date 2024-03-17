<br><h2 class="text-center"style="color:#a00000">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class=""style="background-color:#a00000;color:white">
        <tr class="text-center">
            <th>SI no</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody class="bg-dark text-light">
        <?php
        $select_cat="Select * from categories";
        $result=mysqli_query($conn,$select_cat);
        $number=0;
        While($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
?>
        <tr class="text-center">
            <td><?php echo $number?></td>
            <td><?php echo $category_title?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>

        </tr>
        <?php

}?>
    </tbody>
</table>