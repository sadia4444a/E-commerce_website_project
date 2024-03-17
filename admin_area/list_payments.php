<br><h3 class="text-center"style="color:#a00000">All payments</h3>
<table class="table table-bordered mt-5">
    <thead class=""style="background-color:#a00000;color:white">

    <?php
$get_payments="Select * from user_payments";
$result=mysqli_query($conn,$get_payments);
$row_count=mysqli_num_rows($result);


if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No payments received yet</h2>";
}else{
    echo "<tr>
<th>SI no</th>
<th>Invoice number</th>
<th>Amount</th>
<th>Payment mode</th>
<th>Order date</th>


</tr>
</thead>
<tbody class='bg-dark text-light'>";
    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $payment_id=$row_data['payment_id'];
        $order_id=$row_data['order_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo " <tr>
    <td>$number</td>
    <td>$invoice_number</td>
    <td>$amount</td>
    <td>$payment_mode</td>
    <td>$date</td>
    
    </tr>";

    }
}

    ?>
      
    </tbody>
</table>