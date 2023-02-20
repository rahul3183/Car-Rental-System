<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['adminlogin'])==0)
{	
    header('location:login.php');
}
else{
    if(isset($_REQUEST['confirmID']))
        {
            $vid=intval($_GET['confirmID']);
            $status="1";
            $sql = "UPDATE userbookings SET BookingStatus=:status WHERE  id=:id";
            $query = $conn->prepare($sql);
            $query -> bindParam(':status',$status, PDO::PARAM_STR);
            $query-> bindParam(':id',$vid, PDO::PARAM_STR);
            $query -> execute();
    
        echo "<script>alert('Successfully Confirmed');</script>";
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
<Style>
    .cell-1 {
  border-collapse: separate;
  border-spacing: 0 4em;
  background: #e8e8e8;
  border-bottom: 5px solid transparent;
  /*background-color: gold;*/
  background-clip: padding-box;
}
    thead {
  background: #dddcdc;
}

</Style>
</head>
<body>

<?php include('header.php');?>

<div class="container">
    <div class="text-center" style="margin-top:60px">
      <h2 class="header-text">User Bookings</h2>
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card" style="padding:40px">

            <div class="d-flex justify-content-center row">
                <div class="col-md-12">
                    <div class="rounded">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Overview</th>
                                        <th>Fuel</th>
                                        <th>Seats</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body">
                                <?php $sql = "SELECT * from cars";
                                $query = $conn -> prepare($sql);
                                $query->execute();
                                $results=$query->fetchAll(PDO::FETCH_OBJ);
                                $cnt=1;
                                if($query->rowCount() > 0)
                                {
                                foreach($results as $result)
                                {?>	
                                    <tr class="cell-1">
                                        <td>#<?php echo htmlentities($result->id);?></td>
                                        <td><?php echo htmlentities($result->CarName);?></td>
                                        <td><?php echo htmlentities($result->CarOverview);?></td>
                                        <td><?php echo htmlentities($result->FuelType);?></a></td>
                                        <td><?php echo htmlentities($result->SeatingCapacity);?></td>
                                        <td>$<?php echo htmlentities($result->CarPrice);?></td>
                                        <td><a href="edit-car.php?id=<?php echo htmlentities($result->id);?>">
                                        <button type="button" class="btn btn-warning">Edit</button></a></td>
                                    </tr>
                                    <?php }}?>
                                </tbody>
                            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
</body>
</html>
<?php } ?>