<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>My Bookings</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<div class="container">
    <div class="text-center" style="margin-top:60px">
      <h2 class="header-text">User Profile</h2>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-14">
            <div class="card"  style="padding:40px">
                <h4 class="header-textSm">My Bookings</h4>
                    <div class="product p-4">
                    <?php 
                    $useremail=$_SESSION['login'];
                    $sql = "SELECT cars.CarName,cars.Image1,cars.id,cars.CarPrice,userbookings.BookingDate,userbookings.TotalDays,userbookings.BookingStatus,userbookings.BookingNumber  from userbookings join cars on userbookings.VehicleID=cars.id where userbookings.email=:useremail order by userbookings.id desc";
                    $query = $conn -> prepare($sql);
                    $query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {  ?>
                    <div class="card" style="width: 500px;">
                    <div class="row no-gutters">
                        <div class="col-sm-5">
                            <img class="card-img" src="img/cars/<?php echo htmlentities($result->Image1);?>">
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h4 class="text-danger">#<?php echo htmlentities($result->BookingNumber);?></h4>
                                <h5 ><?php echo htmlentities($result->CarName);?></h5>
                                <p class="card-text">Booked Till : <?php echo htmlentities($result->BookingDate);?></p>
                                <p class="card-text">Booked Days : <?php echo htmlentities($result->TotalDays);?></p>
                                <?php if($result->BookingStatus==1)
                                { ?>
                                <a href="#" class="btn btn-success">Booked</a>
                                <?php } else {?>
                                <a href="#" class="btn btn-danger">Not Confirmed</a>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php }}?>
            </div>
        </div>
    </div>
</div>
</div>

<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
</body>
</html>