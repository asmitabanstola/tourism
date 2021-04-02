<?php include_once('dashboard.php');
 ?>
<div class="main">
<table border="1px" class="table">
            <thead>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Package</th>
    <th>Date</th>
    <th>Booking Type</th>
    <th>Actions</th>
  </tr>
</thead>
<tbody>
  <?php
include('connection/db.php');
$sql = "SELECT booking.booking_id,user.name,user.user_email,user.address,user.phone,package.package_name,booking.date,booking.booking_type from user join booking on 
 booking.user_id=user.user_id join package on 
  package.package_id=booking.package_id";
$query=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($query)){
  ?>
<tr>
  <td><?php echo $row['name']?></td>
  <td><?php echo $row['user_email']?></td>
  <td><?php echo $row['address']?></td>
  <td><?php echo $row['phone']?></td>
  <td><?php echo $row['package_name']?></td>
  <td><?php echo $row['date']?></td>
  <td><?php if(($row['booking_type'])==0){
    echo "One way";
    }else{
      echo "Two Way";
      }?></td>
  <td><a href="#"><button class="btn btn-primary">Confirm</button></a><a href="delete_booking.php?delete=<?php echo $row['booking_id'];?>" onclick=" return confirm('Are you sure you want to delete this record?')"><button class="btn btn-danger">Cancel </button></a></td>
  </tr>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</body>
