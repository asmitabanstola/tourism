<?php
 include_once('dashboard.php'); 
  if($_SESSION['email']==true){
     if (isset($_POST['submit'])){
        include('connection/db.php');
        $package_name=$_POST['package'];
        $description=$_POST['description'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $image=$_FILES['image']['name']; 
        $sql="INSERT INTO package (package_name,description,price,quantity,image) 
        VALUES ('$package_name','$description','$price','$quantity','$image')";
         $query=mysqli_query($conn,$sql);
         if($query){
          move_uploaded_file($_FILES['image']['tmp_name'],"img/".$_FILES["image"]["name"]);
            header('location:admin_dashboard.php');
        } else {
        echo "Errorrrrrr";
   }
}
  }else{
  header('location:admin_login.php');
  }
?>
<div class="container-fluid main">
<h1>Add Package</h1>
  <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="location">Package Name</label>
    <input type="text" class="form-control" id="package" name="package">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" >
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="dollar" class="form-control" id="price" name="price">
  </div>
  <div class="form-group">
  <label for="quantity">Quantity</label>
    <input type="number" class="form-control" id="quantity" name="quantity">
  </div>
  <div class="form-group">
          <label for="image">Select image:</label>
  <input type="file" id="image" name="image">
  </div>
    <div class="clearfix">
      <input type="submit" value="Add" name="submit" class="btn btn-primary"/>
    </div>
</form>
</div>
  </body>

