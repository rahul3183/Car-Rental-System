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

$id=intval($_GET['id']);
$name=$_POST['name'];
$price=$_POST['price'];
$overview=$_POST['overview'];
$fueltype=$_POST['fuel'];
$seatingcapacity=$_POST['seats'];

$sql="update cars set CarName=:CarName,CarOverview=:CarOverview,CarPrice=:CarPrice,FuelType=:FuelType,SeatingCapacity=:SeatingCapacity where cars.id=:id";
$query = $conn->prepare($sql);
$query->bindParam(':CarName',$name,PDO::PARAM_STR);
$query->bindParam(':CarOverview',$overview,PDO::PARAM_STR);
$query->bindParam(':CarPrice',$price,PDO::PARAM_STR);
$query->bindParam(':FuelType',$fueltype,PDO::PARAM_STR);
$query->bindParam(':SeatingCapacity',$seatingcapacity,PDO::PARAM_STR);
$query->bindParam(':id',$id,PDO::PARAM_STR);

$query->execute();

echo "<script>alert('Successfully Updated');</script>";

}
?>


<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Edit Car | Admin</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<div class="container">
    <div class="text-center" style="margin-top:60px">
      <h2 class="header-text">Edit Car</h2>
        </div>
        <div class="col-md-12">
            <div class="card" style="padding:40px">
                <div class="card-body">
                  <h4 class="card-title">Edit Car Details</h4>
                <?php 
                $id=intval($_GET['id']);
                $sql ="SELECT * from cars where cars.id=:id";
                $query = $conn -> prepare($sql);
                $query-> bindParam(':id', $id, PDO::PARAM_STR);
                $query->execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query->rowCount() > 0)
                {
                foreach($results as $result)
                {	?>
                <form method="post" >
                    <div class="form-group row">
                      <div class="col">
                        <label>Car Name:</label>
                        <input class="form-control" type="text"  name="name" value="<?php echo htmlentities($result->CarName)?>">
                      </div>
                      <div class="col">
                        <label>Price Per Day:</label>
                        <input class="form-control"  type="number"  name="price" value="<?php echo htmlentities($result->CarPrice)?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Car Overview</label>
                      <textarea class="form-control" name="overview"><?php echo htmlentities($result->CarOverview)?></textarea>
                    </div>
                    <div class="form-group">
                      <label>Seating Capacity:</label>
                      <input class="form-control" name="seats" type="number" value="<?php echo htmlentities($result->SeatingCapacity)?>">
                    </div>
                    <div class="form-group">
                      <label>Fuel Type:</label>
                      <input class="form-control" name="fuel" value="<?php echo htmlentities($result->FuelType)?>">
                    </div>
                    <div class="form-group">
                    <div style="margin-top:20px"></div>
                      <label>Car Images:</label>
                      <div>
                        <img src="../img/cars/<?php echo htmlentities($result->Image1);?>" width="150" height="100" >
                      </div>
                      <div>
                        <img src="../img/cars/<?php echo htmlentities($result->Image2);?>" width="150" height="100">
                      </div>
                    </div>
                    <div style="margin-top:20px"></div>
                    <div class="form-group">
						<button class="btn btn-primary" name="submit" type="submit">CONFIRM</button>
					</div>
                    </div>
                    </form>   
                    <?php }}?>
                </div>           
            </div>
        </div>
</div>


<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
</body>
</html>
<?php } ?>