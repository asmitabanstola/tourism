
<?php
session_start();
if(isset($_SESSION['user_email'])){

}else{
  header('location:login.php');
}
include('connection/db.php');
$email=$_SESSION['user_email'];
$sql = "SELECT * from user where user_email = '$email'";
$res = mysqli_query($conn,$sql);
$user = mysqli_fetch_array($res);
$id=$user['user_id'];
     if (isset($_POST['submit'])){
        $location=$_POST['location'];
        $date=$_POST['date'];
        $booking_type=$_POST['type'];
        $package_id=$_GET['id'];
        $sql="INSERT INTO booking (booking_type,date,user_id ,current_location,package_id) 
        VALUES ('$booking_type','$date','$id','$location','$package_id')";
         $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
         
         if($query){
            header('location:payment/index.php?id='.$package_id);
        } else {
        echo "Errorrrrrr";
   }
}
?>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome.css">
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
      <style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("images/background.jpeg");
  /* Center and scale the image nicely */
  /* background-position: center; */
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  
}

* {
  box-sizing: border-box;
}
.book{
  position:absolute;
 margin-top:100px;
 left:50%;
  width:350px;
  padding:50px 40px;
  box-sizing:border-box;
  background:rgba(0,0,0,0.5);
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
h1,label{
  color:white;
}
</style>
<body>
  <div class="book">
  <form method="post" onsubmit="return validate()" name="form">
  <h1>Booking</h1>
  <div class="form-group">
    <label for="location">Current Location</label>
    <input type="text" class="form-control" id="location" name="location">
  </div>
  <div class="form-group">
    <label for="date">Date</label>
    <input type="date" class="form-control" id="date" name="date">
    <span id="date_error"style="font-weight: bold;color:red;"></span>
  </div>
  <div class="form-group">
  <div class="radio">
  <label><input type="radio" name="type" value="oneway" checked>One way</label>
</div>
<div class="radio">
  <label><input type="radio" name="type" value="twoway">Two way</label>
</div>
</div>
    <div class="clearfix">
      <input type="submit" value="Book" name="submit" class="btn btn-primary"/>
    </div>
</form>
</div>
<script type="text/javascript"src="js/validate.js" ></script>
  </body>
  </html>

