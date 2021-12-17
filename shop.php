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
                    <li> <?php
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
            </ul>
        </div>
        <div class="col-md-3">
            <?php
            include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <?php
            if(!isset($_GET['p_cat'])){
                if(!isset($_GET['cat_id'])){
                    echo "<div class='box'>
                    <h1>Shop</h1>
                    <p>  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ut quos nisi, fuga dolorem est.
                    </P> 
                    </div>
                    ";
                }
            }
            ?>
            <div class="row">
                <?php
                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat_id'])){

                        $per_page=6;
                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                        }else{
                            $page=1;
                        }
                        $start_from=($page-1) * $per_page;
                        $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page ";
                        $run_pro=mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array($run_pro)){
                            $pro_id=$row['product_id'];
                            $pro_title=$row['product_title'];
                            $pro_price=$row['product_price'];
                            $pro_img1=$row['product_img1'];
                            
                            echo "
                            <div class='col-md-4 col-sm-6 center-responsive'>
                            <div class='product'>
                            <a href='details.php?pro_id=$pro_id'>
                            <img src='admin/product_images/$pro_img1' class='img-responsive'>
                            </a>
                            <div class='text'>
                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title </a> </h3>
                            <p class='price'> BDT $pro_price </p>
                            <p class='buttons'>
                            <a href='details.php?pro_id=$pro_id' class='btn btn-default'> View Details
                            </a>
                            <a href='details.php?pro_id=$pro_id ' class='btn btn-primary'>
                            <i class='fa fa-shopping-cart'></i> Add to cart
                            </a>
                            </p>
                            </div>
                            </div>
                            </div>

                            ";
                        }

                        
                            
                        ?>
                
            </div>
            <center>
                <ul class="pagination">
                    <?php

                    $query="select * from products";
                    $result=mysqli_query($con,$query);
                    $total_record=mysqli_num_rows($result);
                    $total_pages=ceil($total_record / $per_page);
                    echo "
                    <li><a href='shop.php?page=1'> " . 'First Page' ."</a></li>

                    ";
                    for($i=1; $i<=$total_pages; $i++){
                        echo "
                    <li><a href='shop.php?page=".$i."'>".$i." </a> </li>
                    ";
                        
                    };
                    echo "
                    <li><a href='shop.php?page=$total_pages'> ". 'Last Page'."</a></li>
                    ";

                    
                    }
                }    
                ?>
                </ul>
            </center>
           
                <?php
                getPcatPro();
                getCatPro();
                ?>
           
        </div>
    </div>
</div>


    
<?php
include("includes/footer.php");
?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>