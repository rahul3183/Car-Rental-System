<?php
session_start();
error_reporting(0);
include('./includes/config.php');

if(isset($_POST['register']))
{
$name=$_POST['name']; 
$email=$_POST['email']; 
$password=md5($_POST['password']); 

$sql="INSERT INTO users(Name,Email,Password) VALUES(:Name,:Email,:Password)";
$query = $conn->prepare($sql);
$query->bindParam(':Name',$name,PDO::PARAM_STR);
$query->bindParam(':Email',$email,PDO::PARAM_STR);
$query->bindParam(':Password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull');</script>";
echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
}
else 
{
echo "<script>alert('Error');</script>";
}
}

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Register</title>
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
                            <h3 class="text-center text-warning">Register</h3>
                            <div class="form-group">
                                <label for="username">Name:</label><br>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <label for="username">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="submit"></label><br>
                                <input type="submit" name="register" value="Register" class="btn btn-danger ">
                                <div class="form-group"style="margin-top:20px;">
                                <p>Already have an account ? <a href="login.php" class="text-danger">Sign Here</a></p>
                                </div>
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