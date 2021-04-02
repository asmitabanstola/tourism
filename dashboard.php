<?php
session_start();
if(isset($_SESSION['email'])){

}else{
  header('location:adminlogin.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
    <!-- Bootstrap core CSS -->
    <link  rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
  <script src="js/bootstrap.min.js" ></script>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
    <link type="text/css" rel="stylesheet" href="css/dashboard.css">
  </head>
  <body>
  <div class="sidebar">
  <a class="" href="admin_dashboard.php">Dashboard</a>
  <a href="add_package.php">Add Packages</a>
  <a href="manage_booking.php">Manage Bookings</a>
</div>
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">HeliTour</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span>Sign Out</a></li>
    </ul>
</div>
  </div>
</nav>