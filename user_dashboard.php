<?php include_once('user_dash.php'); ?>
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
        $email=$_SESSION['user_email'];
        $query1=mysqli_query($conn,"select * from user where user_email='$email'");
        $res=mysqli_fetch_array($query1);
        $id=$res['user_id'];
        $query2=mysqli_query($conn,"select package_id from booking where user_id='$id'");
        $i=0;
        $pid=array();
        while($res1=mysqli_fetch_array($query2)){
          $pid[$i]=$res1['package_id'];
          $i++;
        }
        // $pid=$res1['package_id'];
        $query=mysqli_query($conn,"select * from package order by package_id ASC");
        while($row=mysqli_fetch_array($query)){
         $i=0;
          if(intval($row['package_id'])==intval($pid[$i])){
            continue;
          }
          $i++;
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
    <a href="user_booking.php?id=<?php echo $row['package_id'];?>" ><button class="btn btn-info btn-lg" >Book</button></a>
        </div>
  </div>
</section> 
      <?php  } ?>
      </div>
    </div>
  </div>
</body>
</html>
