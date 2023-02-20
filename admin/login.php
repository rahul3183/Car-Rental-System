<?php
session_start();
error_reporting(0);
include('./includes/config.php');

if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT Email,Password FROM admin WHERE Email=:email and Password=:password";
$query= $conn -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
unset($_SESSION['login']);
$_SESSION['adminlogin']=$_POST['email'];
echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Login | Admin</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<div id="login" style="margin-top:60px;">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-warning">Login</h3>
                            <div class="form-group">
                                <label for="username">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="remember-me"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <label for="submit"></label><br>
                                <input type="submit" name="login" value="Login" class="btn btn-danger ">
                            </div>
                            <div class="form-group"style="margin-top:20px;">
                            <p>Register a Admin Account   ? <a href="register.php" class="text-danger">Signup Here</a></p>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>


<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
</body>
</html>