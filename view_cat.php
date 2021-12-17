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
                    Dashboard/view product
                </li>
            </div>
        </div>
</div>
<div class="row">
        

        <div class="col-lg-12">
            <div class="panel panel default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa a-money fa-w"></i> view Product category 
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover-table-striped">
                            <thead>
                                <tr>
                                <td> Category Id</td>
                                    <td> category Title</td>
                                    <td> category description </td>
                                    <td>delete  category</td>
                                    
                                    <td>edit product category</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($con,$get_cats);
                                while($row=mysqli_fetch_array($run_cats)){
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    $cat_desc=$row['cat_desc'];
                                    
                                    $i++;
                                    ?>
                                    <tr>
                                   
                                   <td> <?php echo $i;?></td>
                                   <td> <?php echo $cat_title;?></td>
                                   <td width="300"><?php echo $cat_desc; ?></td>
                                   <td>
                                   <a href="index.php?delete_cat=<?php echo $cat_id;?>">
                                   <i class="fa fa-trash-o"></i> Delete
                                </a>
                               </td>
                               <td>
                                   <a href="index.php?edit_cat=<?php echo $cat_id;?>">
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

</body>
</html>


<?php } ?>