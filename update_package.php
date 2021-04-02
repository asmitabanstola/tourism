<?php
include_once('dashboard.php'); 
	include('connection/db.php');
	$id=$_GET['package_id'];
	$sql="SELECT * FROM package WHERE package_id= $id";
	$query=mysqli_query($conn,$sql);
  if (!$query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
	$data=mysqli_fetch_assoc($query);
  if(isset($_POST['submit'])){
    $package_name=$_POST['package'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    if($data['image']==$_FILES['image']['name']){
      unlink('img/'.$data['image']);
      $image=$_FILES['image']['name'];
      }else{
    $image=$data['image'];
      }
  $id=$_GET['package_id'];
  $stat="UPDATE package SET package_name='$package_name',description='$description',price='$price',quantity='$quantity',image='$image' WHERE package_id=$id ";
  $result=mysqli_query($conn,$stat);
  if($result){
    move_uploaded_file($_FILES['image']['tmp_name'],"img/".$_FILES["image"]["name"]);
  header('location:admin_dashboard.php');
}
}
?>

<div class="container-fluid main">
<h1>Add Package</h1>
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="location">Package Name</label>
    <input type="text" class="form-control" id="package" name="package"value="<?php echo $data['package_name'];?>" >
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="textarea" class="form-control" id="description" name="description"value="<?php echo $data['description'];?>" >
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="dollar" class="form-control" id="price" name="price"value="<?php echo $data['price'];?>">
  </div>
  <div class="form-group">
  <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $data['quantity'];?>">
  </div>
  <div class="form-group">
          <label for="image">Select image:</label>
  <input type="file" id="image" name="image" value="<?php echo $data['image'];?>">
  </div>
    <div class="clearfix">
      <input type="submit" value="Add" name="submit" class="btn btn-primary"/>
    </div>
</form>
</div>
  </body>

