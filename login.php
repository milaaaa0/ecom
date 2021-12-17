<?php 
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action=""method="post" class="form-login">
            <h2 class="form-login-heading">Admin login</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="email" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Log in


            </button>
            <h4 class="forgot-password">
                <a href="forgot_password.php" >Lost your password?</a>
            </h4>
        </form>
    </div>



</body>
</html>
<?php
if(isset($_POST['admin_login'])){
    $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
    $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
    $run_admin=mysqli_query($con,$get_admin);
    $count=mysqli_num_rows($run_admin);
    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script> alert('You are logged in')</script>";
        echo "<script> window.open('index.php?dashboard','_self')</script>";


    }else{
        echo "<script> alert('Email/password wrong')</script>";
    }



    
    
}
?>