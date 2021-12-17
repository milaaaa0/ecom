<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<?php
if(isset($_GET['c_id'])){
    $customer_id=$_GET['c_id'];

}
$ip_add=getUserIp();
$status="pending";
$invoice_no=mt_rand();
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){
    $pro_id=$row_cart['p_id'];
    $size=$row_cart['size'];
    $qty=$row_cart['qty'];
    $get_product="select * from products where product_id='$pro_id'";
    $run_pro=mysqli_query($con,$get_product);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $sub_total=$row_pro['product_price']* $qty;
        $insert_cust = "insert into customer_orders (customer_id,due_amount,invoice_no,qty,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
        $run_cust=mysqli_query($con,$insert_cust);
        
        $insert_pending_order = "insert into pending_orders (customer_id,invoice_no,product_id,qty,size,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$status')";
        
        $run_pending_order = mysqli_query($con,$insert_pending_order);
        $delete_cart="select * from cart where ip_add='$ip_add'";
        $run_del=mysqli_query($con,$delete_cart);
        echo "<script>alert('your order has been submitted')</script>";
        echo "<script>window.open('customer/account.php?my_order','_self')</script>";
    }
}
?>