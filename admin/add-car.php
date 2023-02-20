<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['adminlogin'])==0)
{	
    header('location:login.php');
}
else{

if(isset($_POST['submit']))
{
$vehicletitle=$_POST['name'];
$priceperday=$_POST['price'];
$vehicleoverview=$_POST['overview'];
$fueltype=$_POST['fuel'];
$seatingcapacity=$_POST['seats'];

$Image1=$_FILES["img1"]["name"];
$Image2=$_FILES["img2"]["name"];
$Image3=$_FILES["img3"]["name"];

$target_dir1 = "../img/cars/".$_FILES["img1"]["name"];
$target_dir2 = "../img/cars/".$_FILES["img2"]["name"];
$target_dir3 = "../img/cars/".$_FILES["img3"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],$target_dir1);
move_uploaded_file($_FILES["img2"]["tmp_name"],$target_dir2);
move_uploaded_file($_FILES["img3"]["tmp_name"],$target_dir3);

$sql="INSERT INTO cars(CarName,CarOverview,CarPrice,FuelType,SeatingCapacity,Image1,Image2,Image3) VALUES(:CarName,:CarOverview,:CarPrice,:FuelType,:SeatingCapacity,:Image1,:Image2,:Image3)";
$query = $conn->prepare($sql);
$query->bindParam(':CarName',$vehicletitle,PDO::PARAM_STR);
$query->bindParam(':CarOverview',$vehicleoverview,PDO::PARAM_STR);
$query->bindParam(':CarPrice',$priceperday,PDO::PARAM_STR);
$query->bindParam(':FuelType',$fueltype,PDO::PARAM_STR);
$query->bindParam(':SeatingCapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':Image1',$Image1,PDO::PARAM_STR);
$query->bindParam(':Image2',$Image2,PDO::PARAM_STR);
$query->bindParam(':Image3',$Image3,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $conn->lastInsertId();
if($lastInsertId)
{
    echo "<script>alert('Successfully Added');</script>";
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

<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<div class="container">
    <div class="text-center" style="margin-top:60px">
      <h2 class="header-text">Add a New Car</h2>
        </div>
        <div class="col-md-12">
            <div class="card" style="padding:40px">
                <div class="card-body">
                  <h4 class="card-title">Enter Car Details</h4>
                  <form method="post" enctype="multipart/form-data" >
                    <div class="form-group row">
                      <div class="col">
                        <label>Car Name:</label>
                        <input class="form-control" type="text"  name="name">
                      </div>
                      <div class="col">
                        <label>Price Per Day:</label>
                        <input class="form-control"  type="number"  name="price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Car Overview</label>
                      <textarea class="form-control" name="overview"></textarea>
                    </div>
                    <div class="form-group">
                      <label>Seating Capacity:</label>
                      <input class="form-control" name="seats" type="number">
                    </div>
                    <div class="form-group">
                      <label>Fuel Type:</label>
                      <input class="form-control" name="fuel">
                    </div>
                    <div class="form-group">
                      <label>Car Images:</label>
                      <div>
                      <span style="color:red">*</span><input type="file" name="img1" required>
                      <span style="color:red">*</span><input type="file" name="img2" required>
                      <input type="file" name="img3">
                    </div>
                    </div>
                    <div class="form-group">
						<button class="btn btn-primary" name="submit" type="submit">ADD</button>
					</div>
                    </div>
                  </form>
              </div>           
        </div>
        </div>
</div>


<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
</body>
</html>
<?php } ?>