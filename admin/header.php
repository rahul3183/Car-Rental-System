<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
        <img src="../img/logo.png" height="56" alt="Car Rental">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link">Dashboard</a>
                <a href="../car-listing.php" class="nav-item nav-link">Cars</a>
                <a href="#" class="nav-item nav-link">About</a>
            </div>
            <div class="navbar-nav ms-auto">
            <?php if(strlen($_SESSION['adminlogin'])==0)
	        {	
            ?>
            <a href="login.php"><button type="button" class="btn btn-warning">Login / Register</button></a>
            <?php }
            else{ ?>
            <div>
            <a href="index.php"><button type="button" class="btn btn-warning"> <div class="fa fa-home"> Admin </div></button></a>
            <a href="logout.php"><button type="button" class="btn btn-danger"> <div class="fa fa-sign-out"> </div></button></a>
            </div>
            <?php
            } ?>
            </div>
        </div>
    </div>
</nav>
</header>