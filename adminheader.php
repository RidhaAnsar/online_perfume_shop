<?php include 'connection.php' ;

$user_type=$_SESSION['user_type'];



extract($_GET);

if ($user_type=="Staff") {

	$cid=$_SESSION['staff_id'];

}else if ($user_type=="admin") {

	$cid="0";
}




?>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	if ($user_type=="admin") { ?>

	<a href="admin_managestaff.php">Manage Staff</a> 

<?php  }
 ?> -->
	
	<!-- <a href="admin_managevendor.php"> Manage Vendor</a>
		<a href="admin_managecourier.php">Manage Courier</a>
		<a href="admin_managecategory.php">Manage category</a>
		<a href="admin_managetype.php"> Manage Fragrance Type</a>
		<a href="admin_managebrand.php">Manage Brands</a>
		<a href="admin_manageproduct.php">Manage product</a>
		<a href="admin_managepurchase.php">Manage Purchase</a>
		<a href="admin_viewcustomer.php"> View customer</a>
		<a href="admin_viewsales.php">View Sales</a>
		<a href="public_login.php">Logout</a> -->

			<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Perfume</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bethany - v4.9.1
  * Template URL: https://bootstrapmade.com/bethany-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
         <h1 class="text-light"><a href="public_home.php" style="color: #E7A099 ; font-family: Freestyle Script Regular;font-size: 40px "><span>Zephyr Fragrances</span></a></h1>
          <!-- Uncomment below if you prefer to use an image logo -->
          <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto" href="admin_home.php">Home</a></li>

<?php 
	if ($user_type=="admin") { ?>

<!-- 	<a href="admin_managestaff.php">Manage Staff</a> -->
 <li><a class="nav-link scrollto" href="admin_managestaff.php">Manage Staff</a></li>

<?php  }
 ?>


          
            <li class="dropdown"><a href="#"><span>Manage</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="admin_managevendor.php">Vendor</a></li>
                 <li><a href="admin_managecourier.php">Courier</a></li>
                    <li><a href="admin_managecategory.php">Category</a></li>
                    <li><a href="admin_managetype.php">Fragrance Type</a></li>
                    <li><a href="admin_managebrand.php">Brands</a></li>
                    <li><a href="admin_manageproduct.php">Products</a></li>
                    <li><a href="admin_managepurchase.php">Purchase</a></li>
                    <li><a href="purchase.php">Purchased products</a></li>
               
              </ul>

            </li>
              <li class="dropdown"><a href="#"><span>Views</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="admin_viewcustomer.php">Customer</a></li>
                 <li><a href="admin_viewsales.php">Sales</a></li>
                    
               
              </ul>

            </li>
                  <li><a class="nav-link scrollto" href="salesreport.php">Sales Report</a></li>
                  <li><a class="nav-link scrollto" href="custrep.php">Customer Report</a></li>
            <li><a class="nav-link scrollto" href="public_login.php">Logout</a></li>
           
          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

  