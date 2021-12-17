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
                   insert slide
                </li>
            </div>
        </div>
    
    <div class="row">
        <div class="col-lg-3">

        </div>
        <div class="col-lg-6">
            <div class="panel panel default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa a-money fa-w"></i> Insert slide
                    </h3>
                </div>
                <div class="panel-body">
                    <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">slide name</label>
                            <div class="col-md-6">
                            <input type="text" name="slide_name" class="form-control" required="">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">slide image</label>
                            <div class="col-md-6">
                            <input type="file" name="slide_image" class="form-control" required="">
                        </div>
                        </div>
                               
                        <div class="form-group">
                        <label for="" class="col-md-3 control-label"></label>
                        <div class="col-md-6">

                            <input type="submit" name="submit" value="submit now" class="btn btn-primary form-control" id="">
                            
                        </div>
                        </div>
                            </form>
                            </div>
                            </div></div>

</div>




</body>
</html>
<?php
if(isset($_POST['submit'])){
    $slide_name=$_POST['slide_name'];
    

    $slide_image=$_FILES['slide_image']['name'];
    


    $temp_name=$_FILES['slider_image']['tmp_name'];
    $view_slides="select * from slider";
    $view_run_slides=mysqli_query($con,$view_slides);
    $count=mysqli_num_rows($view_run_slides);
    if($count<4){
    move_uploaded_file($temp_name, "slider_images/$slide_image");
    

    $insert_slide="insert into slider (slide_name,slide_image) values ('$slide_name','$slide_image')";
    $run_slide=mysqli_query($con,$insert_slide);

    
        echo "<script>alert('new slide inserted Successfully')</script>";
        echo "<script>window.open('index.php?view_slider','_self')</script>";
    }else{
        echo "<script>alert('you have alredy inserted 4 slides')</script>";
    }
   
}
?>
<?php } ?>