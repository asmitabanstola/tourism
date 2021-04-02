<?php include_once('user_dash.php'); 
session_start();
$email = "";
if(!isset($_SESSION['user_email'])){
header('location:login.php');
} else {
  $email = $_SESSION['user_email'];
}
?>
<div class="main">
<table border="1px" class="table">
            <thead>
              <tr>
                <th>SN</th>
                <th>Job Package</th>
                <th>Booked Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 0;
            include('connection/db.php');
            $sql = "SELECT user_id from user where user_email = '$email'";
            $res = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($res);
              $id=$user['user_id'];
            $query=mysqli_query($conn,"SELECT booking.booking_id,booking.package_id,package.package_id,package.package_name,booking.date
             from booking inner join package on package.package_id=booking.package_id where user_id=$id");
            if($query) {
            while($row=mysqli_fetch_array($query)){
              ?>
            <tr>
              <td><?php echo ++$count; ?></td>
              <td><?php echo $row['package_name']?></td>
              <td><?php echo $row['date']?></td>
            </tr>
            <?php }
            } else {
              echo "<h2> No any booked package </h2>";
            }  
                      ?>
            </tbody>
            </table>
          </div>