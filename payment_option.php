<div class="box">
    <?php
    $session_email=$_SESSION['customer_email'];
    $select_customer="select * from customers where customer_email='$session_email'";
    $run_cust=mysqli_query($con,$select_customer);
    $row_customer=mysqli_fetch_array($run_cust);
    $customer_id=$row_customer['customer_id'];
    ?>
    <h1 class="text-center">
        <p class="lead text-center">
            <a href="order.php?c_id=<?php echo $customer_id ;?>">Pay Offline</a>
        </p>
        <center>
            <p class="lead">
                <a href="#">Pay with Bkash
                <img src="images/bkash.png" width="500" height="270" alt="" class="img-responsive"></a>
            </p>
        </center>
    </h1>
</div>