<?php
      session_start();
       include('connection/db.php');
      if(isset($_POST['submit'])){
       $email=  $_POST['email'];
       $pass = $_POST['password'];
        $pass=md5($pass);
       $sql = "select * from user where user_email='$email' and password='$pass'";
        $query=mysqli_query($conn,$sql);
        if($query){
        if(mysqli_num_rows($query)>0){
          $_SESSION['login'] = true;
          $_SESSION['user_email'] = $email;
          header('location:user_dashboard.php');
        }else{
          echo "<script>alert('Email or Password is Incorrect,Please try again');</script>";
        }
       } else {
        echo "Errorrrrrr";
       }
      }
?>
<div class="container-fluid">
<?php include_once('include/header.php'); ?>
<?php include_once('include/slider.php'); ?>
<div class="container-fluid">
  <link rel="stylesheet" type="text/css" href="css/login.css">
<fieldset style="padding: 20px;">
<form method="post" style="border:1px solid #ccc">
  <div class="container">
    <h1 style="font-family: Comic Sans MS;">User Login</h1>
    <hr>
    <div class="form-group">
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>
  </div>
    <div class="form-group">
    <label for="psw"><b>Password</b></label><br>
    <input type="password" placeholder="Enter Password" name="password" required>
  </div>
    <div class="clearfix">
      <button type="submit" value="Login" name="submit" class="signupbtn">Login</button>
      <button type="button" onclick="window.location.href='index.php'" class="cancelbtn">Cancel</button>
    </div>
  </div>
</form>
</fieldset>
</div>
<?php include_once('include/footer.php'); ?>
</div>


    