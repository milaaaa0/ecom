<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";

}else{

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
            <div class="breadcrumb">
                <li class="active">
                    <l class="fa fa-dashboard"></l>
                    Dashboard/Insert products Category
                </li>
            </div>
        </div>
</div>
        <div class="row">
        

        <div class="col-lg-12">
            <div class="panel panel default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa a-money fa-w"></i> Insert Product category 
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" >
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Title</label>
                            <div class="col-md-6">
                            <input type="text" name="p_cat_title" class="form-control"">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                           <textarea name="p_cat_desc" type="text">
                               
                           </textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">

                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control" id="">
                            
                        </div>
                        </div>
</form>
    </div>
</div>
</div>
</div>

</body>
</html>
<?php
if(isset($_POST['submit'])){
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];
    

    

    $insert_p_cat="insert into product_categories (p_cat_title,p_cat_desc)values('$p_cat_id','$p_cat_desc')";
    $run_p_cat=mysqli_query($con,$insert_p_cat);

    if($run_p_cat){
        echo "<script>alert('Product category has been inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_p_cat','_self')</script>";
    }
   
}
?>


<?php } ?>
