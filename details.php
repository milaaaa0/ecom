<?php
session_start();
include("includes/db.php");
include("functions/functions.php");

?>
<?php
if(isset($_GET['pro_id'])){
    $pro_id=$_GET['pro_id'];
    $get_product="select * from products where product_id='$pro_id'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_array($run_product);
    $p_cat_id=$row_product['p_cat_id'];
    $p_title=$row_product['product_title'];
    $p_price=$row_product['product_price'];
    $p_desc=$row_product['product_desc'];
    $p_img1=$row_product['product_img1'];
    $p_img2=$row_product['product_img2'];
    $p_img3=$row_product['product_img3'];
    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_id=$row_p_cat['p_cat_id'];
    $p_cat_title=$row_p_cat['p_cat_title'];



}

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
                <a href="#">Shopping cart total price: BDT <?php totalPrice();?>,total items <?php item(); ?> </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li><a href="registration.php">registration</a></li>
                    <li><a href="customer/account.php">my account</a></li>
                    <li><a href="cart.php">goto cart</a></li>
                    <li>< <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='checkout.php'>Login </a>";
                        }else{
                            echo "<a href='logout.php'>Logout</a>";
                        }
                        ?></li>
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
                <li class="active"> <a href="shop.php">shop</a></li>
                <li>  <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo " <a href='checkout.php'>My account </a>";
                        }else{
                            echo "<a href='customer/account.php?my_order'>My account </a>";
                        }
                        ?></li>
                <li> <a href="cart.php">shopping cart</a></li>
                
                <li> <a href="contact.php">contact us</a></li>
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
                <li><a href="index.php">Home</a></li>
                <li>
                    Shop
                </li>
                <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $p_title; ?> </li>
            </ul>
        </div>
        <div class="col-md-3">
            <?php
            include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <div class="row" id="productmain">
                <div class="col-sm-6">
                    <div id="mainimage">
                        <div id="mycarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#mycarousel" data-slide-to="1"></li>
                                <li data-target="#mycarousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <center>
                                        <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                                    </center>
                                </div>
                                <div class="item ">
                                    <center>
                                        <img src="admin/product_images<?php echo $p_img1; ?>" alt="" class="img-responsive">
                                    </center>
                                </div>
                                <div class="item ">
                                    <center>
                                        <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                                    </center>
                                </div>

                            </div>
                            <a href="#maycarousel" class="left carousel-control" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#maycarousel" class="right carousel-control" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="box">
                        <h1 class="text-center"><?php echo $p_title; ?></h1>
                        <?php addCart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $pro_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-5 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-7"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                            <div class="form-group">
                                <label for="" class="col-md-5 control-label">Product Size</label>
                                <div class="col-md-7">
                                <select name="product_size" class="form-control" required oninput="setCustomValidity('')" oninvalid="setCustomValidity('Must pick 1 size for the product')"><!-- form-control Begin -->
                                          
                                          <option disabled selected>Select a Size</option>
                                          <option>Small</option>
                                          <option>Medium</option>
                                          <option>Large</option>
                                          
                                      </select><!-- form-control Finish -->
                                </div>
                            </div>
                            <p class="price">BDT <?php echo $p_price; ?> </p>
                            <p class="text-center buttons">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-shopping-cart"> Add to cart</i>
                                </button>
                            </p>

                        </form>


                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="#" class="thumb">
                            <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                        </a>
                    </div>
                </div>
            </div>
            <div class="box" id="details">
                <h4>Product Details</h4>
                <p><?php echo $p_desc; ?></p>
                <h4>Size</h4>
                <ul>
                    <li>Small</li>
                    <li>Medium</li>
                    <li>Large</li>
                    <li>Extra Large</li>
                </ul>
            </div>
            <div id="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">You Also Like These Product</h3>
                    </div>
</div>
                    <?php
                    $get_product="select * from products order by rand()  LIMIT 0,3";
                    $run_product=mysqli_query($con,$get_product);
                    while($row=mysqli_fetch_array($run_product)){
                        $pro_id=$row['product_id'];
                        $product_title=$row['product_title'];
                        $product_price=$row['product_price'];
                        $product_img1=$row['product_img1'];
                        echo "
                        <div class='center-responsive col-md-3 col-sm-6'>
                        <div class='product same-height'>
                        <a href='details.php?pro_id=$pro_id'>
                        <img src='admin/product_images/$product_img1' class='img-responsive'>
                        </a>
                        <div class='text'>
                        <h3><a href='details.php?pro_id=$pro_id'>$product_title </a></h3>
                        <p class='price'>$product_price </p>
                        </div>
                        </div>
                        </div>

                        ";
                        
                    }
                    ?>
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