<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['adminlogin'])==0)
	{	
    header('location:login.php');
}
else{
	?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Admin Dashboard</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<div class="container">
    <div class="text-center" style="margin-top:60px">
      <h2 class="header-text">Admin Dashboard</h2>
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding:40px">
                    <div class="card" style="width: 500px;">
                    <div class="row">
                        <div class="row-md-5">
                            <div class="card-body">
                                <h5 >View All Booking</h5>
                                <a href="bookings.php"><button type="button" class="btn btn-primary">View</button></a>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card" style="width: 500px;">
                    <div class="row">
                        <div class="row-md-5">
                            <div class="card-body">
                                <h5 >Add new Car</h5>
                                <a href="add-car.php"> <button type="button" class="btn btn-primary">Add</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card" style="width: 500px;">
                    <div class="row">
                        <div class="row-md-5">
                            <div class="card-body">
                                <h5 >View All Cars</h5>
                                <a href="carlist.php"> <button type="button" class="btn btn-primary">View</button></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
</body>
</html>
<?php } ?>