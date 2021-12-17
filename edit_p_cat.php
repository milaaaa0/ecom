<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";

}else{
    ?>
<?php 
    if(isset($_GET['edit_p_cat'])){
        $edit_p_id=$_GET['edit_p_cat'];
        $get_p="select * from product_categories where p_cat_id='$edit_p_id'";
        $run_edit=mysqli_query($con,$get_p);
        $row_edit=mysqli_fetch_array($run_edit);
        $p_cat_id=$row_edit['p_cat_id'];
       
       
        $p_cat_title=$row_edit['p_cat_title'];
        $p_cat_desc=$row_edit['p_cat_desc'];
    }
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
                    <i class="fa fa-dashboard"></i> Dashboard/ edit product category
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
                        <i class="fa fa-money fa-fw"></i> Edit Product category
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product category title</label>
                            <div class="col-md-6">
                            <input type="text" name="p_cat_title" class="form-control" required values="<?php echo $p_cat_title; ?>">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product category Description</label>
                            <div class="col-md-3">
                           <textarea name="p_cat_desc" >
                               <?php echo $p_cat_desc;?>
                           </textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">

                            <input type="submit" name="update" value="Update now" class="btn btn-primary form-control" id="">
                            
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
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];
    $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($con,$run_p_cat);

    if($run_p_cat){
        echo "<script>alert('category has been updated Successfully')</script>";
        echo "<script>window.open('index.php?view_p_cat')</script>";
    }
   
}
?>
                        


<?php } ?>