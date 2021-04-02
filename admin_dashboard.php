<?php include_once('dashboard.php'); ?>
<style>
  .section {
  border: 1px solid #ccc;
  display: flex;
  flex-direction: row;
  font-family: sans-serif;
 
}
img{
  width:400px;
}
.paragraph {
  color: #555;
  display: flex;
  flex-direction: column;
}

.content {
  padding: 20px;
}

.title {
  font-size: 24px;
  color: #222;
  line-height: 24px;
}
@media screen and (max-width:860px){
.section img.image{
    height:300px;
    width:350px;
  }
  .title {
  font-size: 20px;
  color: #222;
  line-height: 18px;
}
.content{
  padding-top:0px;
}
}
</style>
<div class="main">
<!-- Portfolio Gallery Grid -->

    <?php
        include('connection/db.php');
        $query=mysqli_query($conn,"select * from package");
        while($row=mysqli_fetch_array($query)){
          ?>
          <section class="section">
                <img src="img/<?php echo $row['image'];?>" class="image" />
  <div class="content">
    <h2 class="title">
    Package Name: <?php echo $row['package_name'];?>
    </h2>
    <p class="paragraph">
   <?php echo $row['description'];?>
    </p>
    <p class="paragraph">
    Package Price : <?php echo $row['price'];?>
    </p>
    <p class="paragraph">Package Quantity : <?php echo $row['quantity'];?></p>
    <div class="button1">
        <a href="update_package.php?package_id=<?php echo $row['package_id'];?>" ><button class="btn btn-primary">UPDATE</button></a>
        <a href="delete.php?delete=<?php echo $row['package_id'];?>" onclick=" return confirm('Are you sure you want to delete this record?')">
        <button class="btn btn-danger">DELETE</button></a>
        </div>
  </div>
</section> 
      <?php  } ?>
      </div>
     
</body>
</html>
