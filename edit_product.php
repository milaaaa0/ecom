<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";

}else{
    ?>
    <?php 
    if(isset($_GET['edit_product'])){
        $edit_id=$_GET['edit_product'];
        $get_p="select * from products where product_id='$edit_id'";
        $run_edit=mysqli_query($con,$get_p);
        $row_edit=mysqli_fetch_array($run_edit);
        $p_id=$row_edit['product_id'];
        $p_title=$row_edit['product_title'];
        $cat_id=$row_edit['p_cat_id'];
        $p_img1=$row_edit['product_img1'];
        $p_img2=$row_edit['product_img2'];
        $p_img3=$row_edit['product_img3'];
        $p_price=$row_edit['product_price'];
        $p_desc=$row_edit['product_desc'];
        $p_keyword=$row_edit['product_keyword'];
    }
    $get_p_cat="select * from product_categories where p_cat_id='$p_cat'";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_title=$row_p_cat['p_cat_title'];
    $get_cat="select * from categories where cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);
    $cat_title=$row_cat['cat_title'];
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    


<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

  
<script>tinymce.init({selector:'textarea'});</script>
<link rel="stylesheet" href="styles/style.css">
    <title>Document</title>
</head>
<body>
<div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard/ edit product
                </li>
            </ol>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Edit Products
                    </h3>
                </div>

                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Title</label>
                            <div class="col-md-6">
                            <input type="text" name="product_title" class="form-control" required values="<?php echo $p_title; ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category</label>
                            <div class="col-md-6">
                            <select name="product_cat" class="form-control" id="">
                                <option value="<?php echo $p_cat;?>"><?php echo $p_cat_title; ?></option>
                                <?php
                                $get_p_cats="select * from product_categories";
                                $run_p_cats=mysqli_query($con,$get_p_cats);
                                while($row=mysqli_fetch_array($run_p_cats)){
                                    $p_cat_id=$row['p_cat_id'];
                                    $p_cat_title=$row['p_cat_title'];
                                   echo "<option value='$p_cat_id'> $p_cat_title </option>";
                                }
                                ?>
                            </select>
                        </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="col-md-3 control-label">Categories</label>
                            <div class="col-md-6">
                           <select name="cat" class="form-control" id="">
                               <option value="<?php echo $cat;?>"><?php echo $cat_title;?></option>
                               <?php
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($con,$get_cats);
                                while($row=mysqli_fetch_array($run_cats)){
                                    $id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                   echo "<option value='$id'> $cat_title </option>";
                                }
                                ?>
                           </select>
                        </div>
                            </div>
                            <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 1</label>
                            <div class="col-md-6">
                            <input type="file" name="product_img1" class="form-control" required="">
                            <br><img src="product_images/<?php echo $p_img1;?>" width="70" height="70" alt="">
                        </div>
                            </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 2</label>
                            <div class="col-md-6">
                            <input type="file" name="product_img2" class="form-control" required="">
                            <br><img src="product_images/<?php echo $p_img2;?>" width="70" height="70" alt="">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Image 3</label>
                            <div class="col-md-6">
                            <input type="file" name="product_img3" class="form-control" required="">
                            <br><img src="product_images/<?php echo $p_img3;?>" width="70" height="70" alt="">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Price</label>
                            <div class="col-md-3">
                            <input type="text" name="product_price" class="form-control" required="<?php echo $p_price;?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Keyword</label>
                            <div class="col-md-3">
                            <input type="text" name="product_keyword" class="form-control" required="<?php echo $p_keyword;?>">
                        </div>
                            </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Description</label>
                            <div class="col-md-3">
                           <textarea name="product_desc" id="" cols="6" rows="19">
                               <?php echo $p_desc;?>
                           </textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">

                            <input type="submit" name="submit" value="Update Product" class="btn btn-primary form-control" id="">
                            
                        </div>
                        </div>
                            </form>
                            </div>
                            </div></div>

</div>



</body>
</html>

<?php
if(isset($_POST['update'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $cat=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $product_keyword=$_POST['product_keyword'];

    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];


    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");

    $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',date=NOW(),product_title='$product_title',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3,product_price='$product_price',product_desc='$product_desc',product_keyword='$product_keyword', where product_id='$p_id'";
    $run_product=mysqli_query($con,$update_product);

    if($run_product){
        echo "<script>alert('Product has been edited Successfully')</script>";
        echo "<script>window.open('index.php?view_products')</script>";
    }
   
}
?>



<?php } ?>