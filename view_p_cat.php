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
                    Dashboard/Insert product
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
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover-table-striped">
                            <thead>
                                <tr>
                                <td>Product Category Id</td>
                                    <td>Product category Title</td>
                                    <td>Product category description </td>
                                    <td>delete product category</td>
                                    
                                    <td>edit product category</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                $get_p_cat="select * from product_categories";
                                $run_p_cat=mysqli_query($con,$get_p_cat);
                                while($row=mysqli_fetch_array($run_p_cat)){
                                    $p_cat_id=$row['p_cat_id'];
                                    $p_cat_title=$row['p_cat_title'];
                                    $p_cat_desc=$row['p_cat_desc'];
                                    
                                    $i++;
                                    ?>
                                    <tr>
                                   
                                   <td> <?php echo $i;?></td>
                                   <td> <?php echo $p_cat_title;?></td>
                                   <td width="300"><?php echo $p_cat_desc; ?></td>
                                   <td>
                                   <a href="index.php?delete_p_cat=<?php echo $p_cat_id;?>">
                                   <i class="fa fa-trash-o"></i> Delete
                                </a>
                               </td>
                               <td>
                                   <a href="index.php?edit_p_cat=<?php echo $p_cat_id;?>">
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