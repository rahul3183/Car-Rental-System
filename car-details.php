<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
{
$date=$_POST['date']; 
$days=$_POST['days'];
$email=$_SESSION['login'];
$id=$_GET['id'];
$bookingno=mt_rand(10000,99999);
$CurStatus = 0;

$sql="INSERT INTO  userbookings(BookingNumber,email,VehicleID,TotalDays,BookingDate,BookingStatus) VALUES(:BookingNumber,:email,:VehicleID,:TotalDays,:BookingDate,:BookingStatus)";
$query = $conn->prepare($sql);
$query->bindParam(':BookingNumber',$bookingno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':VehicleID',$id,PDO::PARAM_STR);
$query->bindParam(':TotalDays',$days,PDO::PARAM_STR);
$query->bindParam(':BookingDate',$date,PDO::PARAM_STR);
$query->bindParam(':BookingStatus',$CurStatus,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking Successfull');</script>";
echo "<script type='text/javascript'> document.location = 'user-bookings.php'; </script>";
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
<title>Car Rental | Details</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
<script>
function change_image(image){
    var container = document.getElementById("main-image");
    container.src = image.src;
}
</script>
</head>
<body>

<?php include('header.php');?>

<?php 
$vhid=intval($_GET['id']);
$sql = "SELECT * from cars where cars.id=:vhid";
$query = $conn -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ 
?>  

<!-- Car Description Panel -->
<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-14">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="img/cars/<?php echo htmlentities($result->Image1);?>" width="400" /> </div>
                            <div class="text-center"> <img onclick="change_image(this)" src="img/cars/<?php echo htmlentities($result->Image2);?>" width="120"> <img onclick="change_image(this)" src="img/cars/<?php echo htmlentities($result->Image3);?>" width="120"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i><a href="car-listing.php"  style="color: black; text-decoration: none;">Back</a> </div>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand"><?php echo htmlentities($result->BrandName);?></span>
                                <h4 class="text-uppercase"><?php echo htmlentities($result->CarName);?></h4>
                                <div class="price d-flex flex-row align-items-center">
                                    <div class="ml-2">$ <small class="dis-price"><?php echo htmlentities($result->CarPrice);?>/Day </div>
                                </div>
                            </div>
                            <p class="about"><?php echo htmlentities($result->CarOverview);?></p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">More Details</h6> 
                                <div class="row">
                                    <div class="card align-items-center" style="width: 8rem;">
                                    <div class="card-body ">
                                    <div class="fa fa-gear"></div>
                                        <h6 class="card-title">Fuel</h6>
                                        <h4 class="card-text"><?php echo htmlentities($result->FuelType);?></h4>
                                    </div>
                                    </div>
                                    <div class="card align-items-center" style="width: 8rem;">
                                    <div class="card-body">
                                    <div class="fa fa-user"></div>
                                        <h6 class="card-title">Capacity</h6>
                                        <h4 class="card-text"><?php echo htmlentities($result->SeatingCapacity);?></h4>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="cart mt-4 align-items-center">
                            <form method="post">
                            <?php if($_SESSION['login'])
                            {?>  
                            <div class="form-group" style="margin-bottom:25px;">
                                <label >Total Days</label>
                                <select class="form-control" name="days" id="days">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>

                                </select>
                                <label>Date:</label>
                                <input type="date" class="form-control" name="date" placeholder=" Date" required>
                                </div>
                                 
                                <div class="form-group">
                                <button type="submit" name="submit"  class="btn btn-danger text-uppercase mr-2 px-4">Rent Now</button></div>
                                </form>
                                <?php } 
                                    else {  
                                    if($_SESSION['adminlogin'])
                                    { ?>
                                  <a href="admin/edit-car.php?id=<?php echo htmlentities($result->id);?>">  <button type="button" class="btn btn-danger">Edit</button></a></div>
                                  <?php 
                                    }
                                        else 
                                    { ?>
                                  <a href="login.php">  <button type="button" class="btn btn-danger">Login to book</button></a></div>
                                <?php }} ?>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php }}?>
<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js">
</script> 
</body>
</html>