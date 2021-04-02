<div class="container-fluid">
<?php include_once('include/header.php'); ?>
<?php include_once('include/slider.php'); ?>
<style>
 h3{
   padding:10px;
   font-size:20px;
   font-family:sans-serif;
 }
</style>
<div class="container-fluid">
<h3>Package List</h3>
<div class="main">
<!-- Portfolio Gallery Grid -->
    <?php
        include('connection/db.php');
        $query=mysqli_query($conn,"select * from package");
        while($row=mysqli_fetch_array($query)){
          ?>
         <div class="col-md-4">
    <div class="thumbnail">
      <a href="img/<?php echo $row['image'];?>">
        <img src="img/<?php echo $row['image'];?>" alt="place" style="height:300px;"></a>
        <h2 class="title" style="padding:10px;"><b>
    Package Name: <?php echo $row['package_name'];?></b>
    </h2>
        <div class="paragraph">
          <p><?php echo $row['description'];?></p>
        </div>
        <div class="cost"><i class="fa fa-money" aria-hidden="true"></i>: <span id="cost"><?php echo $row['price'];?></span> <span id="nepali">Rs</span> </div>
        <p class="paragraph">Package Quantity : <?php echo $row['quantity'];?></p>
    <div class="button1">
    <a href="login.php" ><button class="btn btn-primary" style="padding:10px;">Book</button></a>
        </div>
    </div>
  </div>
      <?php  } ?>
      </div>
      </div>
      <div class="services">
<section >
<h2 class="section-title">Our Major Services</h2>
<ul class="services-list three-col">
<li>
<img src="images/heli.png">
<h3>Charter Flights</h3>
<p>Helicopters flights can easily be chartered to make the difficult trips easier. A helicopter flight&hellip;</p>
<a href="services.php" class="link">Find Out More</a>
</li>
<li>
<img src="images/aid.png">
<h3>Rescue Operations</h3>
<p>When it comes to running airline operations, rescue flights and medical evacuations are unequivocally the&hellip;</p>
<a href="services.php" class="link">Find Out More</a>
</li>
<li>
<img src="images/aerial.png">
<h3>Aerial Sight Seeing</h3>
<p>Nepal is a land filled with snow-clad mountains and exquisite terrains. But if you’re short&hellip;</p>
<a href="services.php" class="link">Find Out More</a>
</li>
<li>
<img src="images/customize.png">
<h3>Customized Tours</h3>
<p>We also cater customized services to our customers. If there is any destination that our&hellip;</p>
<a href="services.php" class="link">Find Out More</a>
</li>
<li>
<img src="images/picnic.png">
<h3>Heli Picnic</h3>
<p>The Helicopter Picnic in Nepal is a new adventure trip among other exciting services on&hellip;</p>
<a href="services.php" class="link">Find Out More</a>
</li>
</ul>
</div>
</section>
        </div>
<?php include_once('include/footer.php'); ?>
</div>