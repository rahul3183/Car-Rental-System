<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            <img src="img/logo.png" height="56" alt="Car Rental">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="car-listing.php" class="nav-item nav-link">Cars</a>
                <a href="#" class="nav-item nav-link">About</a>
            </div>
            <div class="navbar-nav ms-auto">
                
            <?php if(strlen($_SESSION['login'])==0)
	        {	
            ?>
            <div>
            <a href="admin/index.php"><button type="button" class="btn btn-danger">Admin</button></a>
            <?php if(strlen($_SESSION['adminlogin'])==0 )
	        {	
            ?>
            <a href="login.php"><button type="button" class="btn btn-warning">Login / Register</button></a>
            </div>
            <?php } ?>
            <?php }
            else{ ?>

            <?php 
            $email=$_SESSION['login'];
            $sql ="SELECT Name FROM users WHERE email=:email ";
            $query= $conn -> prepare($sql);
            $query-> bindParam(':email', $email, PDO::PARAM_STR);
            $query-> execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount() > 0)
            {     
                foreach($results as $result)
	            {  
            ?>
            <div>
                <a href="user-bookings.php"><button type="button" class="btn btn-warning"> <div class="fa fa-user"> </div><?php echo htmlentities($result->Name);?></button></a>
                <a href="logout.php"><button type="button" class="btn btn-danger"> <div class="fa fa-sign-out"> </div></button></a>
            </div>
            <?php
            }}} ?>
            </div>
        </div>
    </div>
</nav>
</header>