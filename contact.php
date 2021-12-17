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
                <a href="#" class="btn btn-success btn-sm"><?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "Welcome Guest";
                    }else{
                        echo "Welcome: " .$_SESSION['customer_email'] . "";
                    }
                    ?></a>
                <a href="#">Shopping cart total price: BDT <?php totalPrice();?> ,total items <?php item(); ?></a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="registration.php">registration</a></li>
                    <li> <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo " <a href='checkout.php'>My account </a>";
                        }else{
                            echo "<a href='customer/account.php?my_order'>My account </a>";
                        }
                        ?></li>
                    <li><a href="cart.php">goto cart</a></li>
                    <li><a href="login.php">login</a></li>
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
                <li >
                    <a href="index.php">home</a>
                </li>
                <li > <a href="shop.php">shop</a></li>
                <li>  <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo " <a href='checkout.php'>My account </a>";
                        }else{
                            echo "<a href='customer/account.php?my_order'>My account </a>";
                        }
                        ?></li>
                <li> <a href="cart.php">shopping cart</a></li>
               
                <li class="active"> <a href="contact.php">contact us</a></li>
            </ul>
        </div>
        <a href="cart.php" class="btn btn-primary navbar-btn right">
            <i class="fa fa-shopping-cart"></i>
            <span><?php item(); ?> items in cart</span>
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
                <li><a href="home.php">Home</a></li>
                <li>
                   Contact Us
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
                        <h2>Contact Us</h2>
                        <p class="text-muted">If you have any question,feel free to contact us</p>
                    </center>
                </div>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text " name="name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" requird="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Subject</label>
                        <input type="text " name="submit" class="form-control" requird="">
                    </div>
                    <div class="form-group">
                        <label for="">Message</label>
                        <textarea name="message" class="from-control" id="" cols="" rows=""></textarea>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Send Message
                        </button>
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
$senderName=$_POST['name'];
$senderEmail=$_POST['email'];
$senderSubject=$_POST['subject'];
$senderMessage=$_POST['message'];
$receiverEmail="nusratshameema@outlook.com";
mail($receiverEmail, $senderName,$senderSubject,$senderMessage,$senderEmail);

$email=$_POST['email'];
$subject="Welcome to our website";
$msg="I will get back to you soon";
$from="nusratshameema@outlook.com";
mail($email,$subject,$msg,$from);
echo "<h2 align='center'>Your mail sent </h2>";
}
?>