<?php
  session_start();
 if(isset($_POST['submit'])){
include('connection/db.php');
$username=$_POST['username'];
$email=$_POST['email'];
$p1=$_POST['psw'];
$p2=$_POST['psw-repeat'];
$name=$_POST['name'];
  $address=$_POST['address'];
  $phone=$_POST['phone'];
if($p1!=$p2){
  echo "Password doesn't match!!!";
}else{
  $password=md5($p1);
$sql="INSERT INTO user (username,user_email,password,name,address,phone) VALUES ('$username','$email','$password','$name','$address','$phone')";
 $query=mysqli_query($conn,$sql);
 if($query){
      $_SESSION['email'] = $email;
      header('location:user_dashboard.php');
    } else {
    echo "Errorrrrrr";
   }
}
}
?>
<div class="container-fluid">
<?php include_once('include/header.php'); ?>
<?php include_once('include/slider.php'); ?>
<link rel="stylesheet" href="css/signup.css">
  <div class="container-fluid">

<fieldset style="padding: 20px;">
<form method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1 style="font-family: Comic Sans MS;">Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    <div class="form-group">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter username" name="username" required>
  </div>
    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
  </div>
    <div class="form-group">
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="psw" required>
  </div>
    <div class="form-group">
    <label for="psw-repeat"><b>Repeat Password</b></label><br>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
  </div>
    <div class="form-group">
    <label for="name"><b>Full Name</b></label><br>
    <input type="text" placeholder="Enter Name" name="name" required>
  </div>
    <div class="form-group">
    <label for="address"><b>Address</b></label><br>
    <input type="text" placeholder="Enter Address" name="address" required>
  </div>
    <div class="form-group">
    <label for="phone"><b>Phone</b></label><br>
    <input type="number" placeholder="Enter Phone" name="phone" required>
  </div>
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="submit" value="submit"name="submit" class="signupbtn">Sign Up</button>
       <button type="button" onclick="window.location.href='index.php'" class="cancelbtn">Cancel</button>
    </div>
  </div>
</form>
</fieldset>
</div>
<?php include_once('include/footer.php'); ?>
</div>

