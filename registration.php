<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>

<div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "Welcome Guest";
                    }else{
                        echo "Welcome: " .$_SESSION['customer_email'] ;
                    }
                    ?>
                </a>
                <a href="#">Shopping cart total price: BDT <?php totalPrice(); ?>,total items <?php item();?></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="registration.php">registration</a></li>
                    <li><a href="customer/account.php">my account</a></li>
                    <li><a href="cart.php">goto cart</a></li>
                    <li>
                        <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='checkout.php'>Login </a>";
                        }else{
                            echo "<a href='logout.php'>Logout</a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default" id=navbar>
<div class="container">
    <div class="navbar-header">
        <a href="index.php" class="navbar-brand home">
            <img src="images/2499873.jpg" alt=""class="logo">
        </a>
        <button type="button" class="navbar-toggle" data-toggle="collapse " data-target="#navigation">
            <span class="sr-only">Toggle Navigation</span>
            <i class="fa fa-align-justify"></i>
        </button>
        <button type="button" class="navbar-toggle" data-toggle="navbar-toggle" data-target="#search">
            <span class="sr-only"></span>
            <i class="fa fa-search"></i>
        </button>
    </div>
    <div class="navbar-collapse collapse" id="navigation">
        <div class="padding-nav">
            <ul class="nav navbar-nav navbar-left">
                <li class="active" >
                    <a href="index.php">home</a>
                </li>
                <li > <a href="shop.php">shop</a></li>
                <li> <a href="customer/account.php">my account</a></li>
                <li> <a href="cart.php">shopping cart</a></li>

                <li > <a href="contact.php">contact us</a></li>
            </ul>
        </div>
        <a href="cart.php" class="btn btn-primary navbar-btn right">
            <i class="fa fa-shopping-cart"></i>
            <span><?php item();?> items in the cart</span>
        </a>
        <div class="navbar-collapse collapse-right">
            <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                <span class="sr-only">toggle search</span>
                <i class="fa fa-search"></i>
            </button>
        </div>
        <div class="collpase clearfix" id="search">
            <form action="" class="navbar-form" method="get" action="result.php">
                <div class="input-group">
                    <input type="text" name="user_query" placeholder="search" class="form-control" required="" id="">
                    <span class="input-group"></span>
                    <button type="submit" value="search" name="search" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="" id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                   Registration
                </li>
            </ul>
        </div>
        <div class="col-md-3">
            <?php
            include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Customer Registration</h2>
                        
                    </center>
                </div>
                <form action="registration.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Customer Name</label>
                        <input type="text " name="c_name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Customer Email</label>
                    <input type="email" name="c_email" requird="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Customer Password</label>
                    <input type="password" name="c_pass" requird="" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="text " name="c_country" class="form-control" requird="">
                    </div>
                    <div class="form-group">
                    <label for=""> City</label>
                    <input type="text" name="c_city" requird="" class="form-control">
                    </div>
                    <div class=
                    <div class="form-group">
                    <label for="">Contact Number</label>
                    <input type="text" name="c_number" requird="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="c_address" requird="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" name="c_image" requird="" class="form-control">
                    </div>
                    
                    
                    
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i> Register
                    </div>
                </form>
            </div>
        </div>



        </div>
</div>


    
<?php
include("includes/footer.php");
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_password=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_contact=$_POST['c_number'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['c_image']['name'];
    $c_tmp_image=$_FILES['c_image']['tmp_name'];
    $c_ip=getUserIp();

    move_uploaded_file($c_tmp_image,"customer/c_images/$c_image");
    $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values('$c_name','$c_email','$c_password','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    $run_customer=mysqli_query($con,$insert_customer);
    $sel_cart="select * from cart where ip_add='$ip_add'";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo " <script>window.open('checkout.php','_self')</script>";
    }else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo " <script>window.open('index.php','_self')</script>";

    }

}
?>