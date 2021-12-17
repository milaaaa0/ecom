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
                <li > <a href="shop.php">shop</a></li>
                <li>  <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo " <a href='checkout.php'>My account </a>";
                        }else{
                            echo "<a href='customer/account.php?my_order'>My account </a>";
                        }
                        ?></li>
                <li class="active"> <a href="cart.php">shopping cart</a></li>
                
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
                <li><a href="home.php">Home</a></li>
                <li>
                     Cart
                </li>
            </ul>
        </div>

        <div class="col-md-9" id="cart">
            <div class="box">
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    
                    <h1>Shopping Cart</h1>
                    <?php
                    $ip_add=getUserIp();
                    $select_cart="select * from cart where ip_add='$ip_add'";
                    $run_cart=mysqli_query($con,$select_cart);
                    $count=mysqli_num_rows($run_cart);
                    ?>
                    <p class="text-muted">Currently you have <?php echo $count; ?> item(s) in your cart</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Size</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="1">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total=0; 
                                while($row=mysqli_fetch_array($run_cart)){
                                    $pro_id=$row['p_id'];
                                    $pro_size=$row['size'];
                                    $pro_qty=$row['qty'];
                                    
                                    $get_product="select * from products where product_id='$pro_id'";
                                    $run_pro=mysqli_query($con,$get_product);
                                    while($row=mysqli_fetch_array($run_pro)){
                                    
                                    $p_title=$row['product_title']; 
                                    $p_img1=$row['product_img1'];   
                                    $p_price=$row['product_price'];   
                                    $sub_total=$row['product_price'] * $pro_qty ;
                                    
                                    $total += $sub_total;     

                                   

                                ?>

                                <tr>
                                    <td><img src="admin/product_images/<?php echo $p_img1; ?>"class="img-responsive" alt=""></td>
                                    <td><?php echo $p_title; ?></td>
                                    <td><?php echo $pro_qty; ?></td>
                                    <td><?php echo $p_price; ?></td>
                                    <td><?php echo $pro_size; ?></td>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                    <td><?php echo $sub_total; ?></td>
                                </tr>
                                <?php }  } ?>
                            
                            </tbody>
                            <tfoot>
                                
                            </tfoot>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <h4>Total Price</h4>
                        </div>
                        <div class="pull-right">
                            <h4> BDT <?php echo $total; ?></h4>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-left"></i> Continue Shopping
                            </a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit" name=" update" value="Update cart">
                                <i class="fa fa-refresh"> Update Cart</i>
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Proceed to checkout <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <?php function update_cart(){
                global $con;
                if(isset($_POST['update'])){
                    foreach($_POST['remove'] as $remove_id){
                        $delete_product="delete from cart where p_id='$remove_id'";
                        $run_del=mysqli_query($con,$delete_product);
                        if($run_del){
                            echo"<script>
                             window.open('cart.php','_self')</script>";
                        }
                    }
                }
            }
            echo @$up_cart=update_cart();
            ?>
            <div id="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">You Also Like These Product</h3>
                    </div>
</div>
                    <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php"><?php echo $p_title; ?></a></h3>
                                <p class="price"><?php echo $p_price;  ?> </p>
                            
                        </div>
                    </div>
                </div>
                <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php"><?php echo $p_title; ?></a></h3>
                                <p class="price">BDT <?php echo $p_price; ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="center-responsive col-md-3">
                        <div class="product same-height">
                            <a href="">
                                <img src="admin/product_images/<?php echo $p_img1; ?>" alt="" class="img-responsive">
                            </a>
                            <div class="text">
                                <h3><a href="details.php"><?php echo $p_title; ?></a></h3>
                                <p class="price">BDT <?php echo $p_price; ?></p>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Order Summary</h3>

                </div>
                <p class="text-muted">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, architecto.</p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Order Subtotal</td>
                                <th> BDT <?php echo $total; ?></th>
                            </tr>
                            <tr>
                                <td>Shipping and handelling</td>
                                <th>BDT 0</th>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <th>BDT 0</td>
                            </tr>
                            <tr class="total">
                                <td>Total</td>
                                <th> BDT  <?php echo $total; ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
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