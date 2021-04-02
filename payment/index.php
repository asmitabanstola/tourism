<?php
include('header.php');
$id=$_GET['id'];
?>
<title> Stripe Payment Gateway Integration in PHP</title>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="payment.js"></script>
<style>
	body{
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  background-image: url("../images/payment.jpg");
  /* Center and scale the image nicely */
  /* background-position: center; */
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
	}
	.container{
    position:absolute;
    left:50%;
  width:350px;
  margin-top:50px;
  box-sizing:border-box;
  background:rgba(0,0,0,0.4);
  }
  @media (min-width: 992px){
.col-md-6 {
    width: 100%; 
}
  }
  h3,label,span{
  color:white;
}
	</style>
<body>
<div class="container">	
	<div class="row">		
		<span class="paymentErrors"></span>	
		<br>
		<div class="col-md-6 offset-md-3">
			<div class="card card-outline-secondary">
			<div class="card-body">
			<h2>Payment</h2>
			<hr>
			<form action="process.php?id=<?php echo $id;?>" method="POST" id="paymentForm">				
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="custName" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="custEmail" class="form-control">
				</div>
				<div class="form-group">
					<label>Card Number</label>
					<input type="text" name="cardNumber" size="20" autocomplete="off" id="cardNumber" class="form-control" />
				</div>	
				<div class="row">
				<div class="col-xs-4">
				<div class="form-group">
					<label>CVC</label>
					<input type="text" name="cardCVC" size="4" autocomplete="off" id="cardCVC" class="form-control" />
				</div>	
				</div>	
				</div>
				<div class="row">
				<div class="col-xs-10">
				<div class="form-group">
					<label>Expiration (MM/YYYY)</label>
					<div class="col-xs-6">
						<input type="text" name="cardExpMonth" placeholder="MM" size="2" id="cardExpMonth" class="form-control" /> 
					</div>
					<div class="col-xs-6">
						<input type="text" name="cardExpYear" placeholder="YYYY" size="4" id="cardExpYear" class="form-control" />
					</div>
				</div>	
				</div>
				</div>
				<br>	
				<div class="form-group">
					<input type="submit" id="makePayment" class="btn btn-success" value="Make Payment">
				</div>			
			</form>	
			</div>
			</div>
		</div>		
	</div>		
</div>
</body>

