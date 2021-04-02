<?php
	session_start();
 	include('connection/db.php');
 	if(isset($_GET['delete'])){
	$id=$_GET['delete'];
	$query=mysqli_query($conn,"select image from package where package_id=$id;");
	$result=mysqli_fetch_assoc($query);
	unlink('img/'.$result['image']);
	$query=mysqli_query($conn,"DELETE FROM package WHERE package_id=$id")or die(mysqli_error());
	}
	header('location:admin_dashboard.php');
?>