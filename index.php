<?php 
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<title>Car Rental</title>
<link rel="stylesheet" href="utils/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/styling.css" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat">
</head>
<body>

<?php include('header.php');?>

<!-- carousel Banner -->
<div id="container">
<div id="carouselExampleControls" class="carousel slide">
  <div class="carousel-inner">
    <div class="banner">
      <div class="banner-text">
        <p class="banner-textStyle">Book a Car Near You <br> Drive in Minutes! </p>
        <A href="car-listing.php"><button type="button" class="btn btn-warning">Rent Now</button></a>
      </div>
      <div class="banner-image">
        <img src="img/BannerCar.png" alt="Car">
      </div>
    <div class="carousel-item active">
      <img src="img/mainBanner.png" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<!-- Cars Listing -->
<section style="padding-top:50px">
<div class="container">
    <div class="text-center">
      <h2 class="header-text">Browse our Inventory</h2>
    </div>
    <div class="row" style="margin-top:50px">
      <?php $sql = "SELECT * from cars limit 8";
      $query = $conn -> prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      foreach($results as $result)
      {  
      ?>  
    
          <div class="col-sm-3" style="margin-top: 28px;">
              <div class="card " style="width: 18rem;">
                <a href="car-details.php?id=<?php echo htmlentities($result->id);?>" > 
                <img src="img/cars/<?php echo htmlentities($result->Image1);?>" class="card-img-top img-fluid" alt="image" style="width: 24rem; height: 11rem;">
                </a>
              <div class="card-block " style="padding:10px">
                <h4 class="card-title"><a href="car-details.php?id=<?php echo htmlentities($result->id);?>" style="color: black; text-decoration: none;"> <?php echo htmlentities($result->CarName);?></a></h4>
                <h6 class="card-subtitle text-muted">$<?php echo htmlentities($result->CarPrice);?>/Day</h6>
                <p class="card-text"><?php echo substr($result->CarOverview,0,70);?></p>
              </div>
            </div>
        </div>  

      <?php }?>

      <div class="d-flex justify-content-center" style="margin-top:40px">
      <A href="car-listing.php"> <button type="button" class="btn btn-warning">View More</button></a>
     </div>
  </div>
</div>
</section>

<?php include('footer.php');?>

<script src="utils/js/bootstrap.min.js"></script> 
</body>
</html>