<?php
session_start();
include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";

}else{
    ?>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard/ view product
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> View Products
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover-table-striped">
                            <thead>
                                <tr>
                                    <td>Product Id</td>
                                    <td>Product Title</td>
                                    <td>Product Image</td>
                                    <td>Product Price</td>
                                    
                                    <td>Product Keyword</td>
                                    <td>Product Date</td>
                                    <td>Product Delete</td>
                                    <td>Product Edit</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_product="select * from products";
                                $run_p=mysqli_query($con,$get_product);
                                while($row=mysqli_fetch_array($run_p)){
                                    $pro_id=$row['product_id'];
                                    $pro_title=$row['product_title'];
                                    $pro_img1=$row['product_img1'];
                                    $pro_price=$row['product_price'];
                                    $pro_keyword=$row['product_keyword'];
                                    $date=$row['date'];
                                    $i++;
                                    ?>
                               
                               <tr>
                                   
                               <td> <?php echo $i;?></td>
                               <td> <?php echo $pro_title;?></td>
                               <td><img src="product_images/<?php echo $pro_img1 ?>" width="50 " height="40"></td>
                               <td> <?php echo $pro_price;?></td>
                              
                             
                               <td> <?php echo $pro_keyword;?></td>
                               <td> <?php echo $date;?></td>
                               <td>
                                   <a href="index.php?delete_product=<?php echo $pro_id;?>">
                                   <i class="fa fa-trash-o"></i> Delete
                                </a>
                               </td>
                               <td>
                                   <a href="index.php?edit_product=<?php echo $pro_id;?>">
                                   <i class="fa fa-pencil"></i> Edit
                                </a>
                               </td>
                               </tr>
                               <?php }?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php } ?>  