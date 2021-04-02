<?php
//check if stripe token exist to proceed with payment
if(!empty($_POST['stripeToken'])){
    // get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $custName = $_POST['custName'];
    $custEmail = $_POST['custEmail'];
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    
    //include Stripe PHP library
    require_once('stripe-php/init.php');    
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"      => "sk_test_51IVDk0JSIOj84Y4AnnafLNq91vEospU7Px5CiCj3bdqTRuohXbBJiRLQCCDbX1kG5UNcptw5uQ9FnMah6UBOh6yD00RjwTQ6UZ",
      "publishable_key" => "pk_test_51IVDk0JSIOj84Y4AondaJ95zIPiewPYrvUdY2Ef6oJVSUBlLxVaxQOIWU59SWAnDHTIkk85Pz1tS4agYS2CA1nbT00szU1vuFP"
    );    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $custEmail,
        'source'  => $stripeToken
    ));    
    // item details for which payment made
    include('../connection/db.php');
    $id=$_GET['id'];
    $sql = "SELECT * from package where package_id = '$id'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($res);
    $package_name = $row['package_name'];
    $price = $row['price'];
    $currency = "usd";
    $bookID = "";    
    // details for which payment performed
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $price,
        'currency' => $currency,
        'description' => $package_name,
        'metadata' => array(
            'book_id' => $bookId
        )
    ));    
    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        // transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");        
        //insert tansaction details into database
		include_once("db_connect.php");
        $insertTransactionSQL = "INSERT INTO transaction(cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year,item_name, item_number, item_price, item_price_currency, paid_amount, paid_amount_currency, txn_id, payment_status, created, modified) 
		VALUES('".$custName."','".$custEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."','".$cardExpYear."','".$itemName."','".$itemNumber."','".$itemPrice."','".$paidCurrency."','".$amountPaid."','".$paidCurrency."','".$balanceTransaction."','".$paymentStatus."','".$paymentDate."','".$paymentDate."')";
		mysqli_query($conn, $insertTransactionSQL) or die("database error: ". mysqli_error($conn));
        $lastInsertId = mysqli_insert_id($conn); 
       //if order inserted successfully
       if($lastInsertId && $paymentStatus == 'succeeded'){
            $paymentMessage = "<strong>The payment was successful.";
            header('location:../applied_package.php');
       } else{
          $paymentMessage = "Payment failed!";
       }
    } else{
        $paymentMessage = "Payment failed!";
    }
} else{
    $paymentMessage = "Payment failed!";
}
echo $paymentMessage;