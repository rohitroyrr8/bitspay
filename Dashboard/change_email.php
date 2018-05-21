<?php
	session_start();
	
	if(isset($_POST["change_password"])){
                    require('connection.php');
                    $current_id= $_SESSION["email"];
                    $input_current_password= $_POST["old_password"];
                    $input_current_password_1 = sha1($input_current_password); 
                    $new_password1= $_POST["new_password1"];
                    $new_password2= $_POST["new_password2"];
                    $current_password = $_POST["password"];
                    
                            
                       if($input_current_password_1 == $current_password && $new_password1 == $new_password2){
                       		$new_password_1  = sha1($new_password1);
                           
                           $query1 = "update`users`SET password='$new_password_1' WHERE email='$current_id'";
                           if(mysqli_query($connection, $query1)){
                                $_SESSION["msg"] = "Password has been updated successfully.";
                                header("location: ../Dashboard/security.php");
                            } 
                        }
                       else{
                            $_SESSION["error"] = "Incorrect combinations of password. Please try again";
                             header("location: ../Dashboard/security");
                       }
                    
    }
      if(isset($_POST["enable_authenticator"])){
                    require('connection.php');
                    $current_id= $_SESSION["email"];
                    $auth_code = $_POST["google_auth_code"];
                          $query1 = "update`users`SET google_auth_code='$auth_code' WHERE email='$current_id'";
                           if(mysqli_query($connection, $query1)){
                                $_SESSION["msg"] = "Two-Factor Authentication has been enabled in your account successfully";
                                header("location: ../Dashboard/security");
                            } else {
                                
                            }
                       
                    
    }
    
    if(isset($_POST["disable_authenticator"])){
                    require('connection.php');
                    $current_id= $_SESSION["email"];
                    $auth_code = "";
                          $query1 = "update`users`SET google_auth_code='$auth_code' WHERE email='$current_id'";
                           if(mysqli_query($connection, $query1)){
                                $_SESSION["msg"] = "Two-Factor Authentication has been disabled in your account successfully";
                                header("location: ../Dashboard/security");
                            } else {
                              
                            }
                       
                    
    }
       if(isset($_POST["change_phone"])){
                    require('connection.php');
                    $current_id= $_SESSION["email"];
                   
                    $new_phone_no= $_POST["new_phone_no"];
                   
                          $query1 = "update`users`SET phone='$new_phone_no' WHERE email='$current_id'";
                           if(mysqli_query($connection, $query1)){
                                $_SESSION["msg"] = "Your Mobile Number has been updated successfully";
                                header("location: ../Dashboard/security");
                            } else {
                               $_SESSION["error"] = "Soory...You Mobile cant be updated right now. Please try agin later";
                                header("location: ../Dashboard/security");
                            }
                       
                    
    }
     if(isset($_POST["update_profile"])){
     
                    require('connection.php');
                    $nominee = "";
                    $nominee_phone = "";
                    $current_id= $_SESSION["email"];
                    $nominee = $_POST["nominee"];
                    $nominee_phone = $_POST["nominee_phone"];
                          $query1 = "update`users`SET nominee='$nominee', nominee_phone='$nominee_phone' WHERE email='$current_id'";
                           if(mysqli_query($connection, $query1)){
                                $_SESSION["msg"] = "Your Details has been updated successfully";
                                header("location: ../Dashboard/user.php");
                            } else {
                                $_SESSION["msg"] = "Sorry..Your Details has not been updated successfully";
                                header("location: ../Dashboard/user"); 
                            }
                       
                    
    }
    
    if(isset($_POST['withdraw_btc'])){
	
	$destin_addr = $_POST['destin_addr'];
	$volume = $_POST['volume'];
	$bitcoin_value = $_POST['bitcoin_value'];
	$fee = '0.0005';
	$recievable = $volume- $fee;
	$ref = '';
	$type = 'Withdraw';
	
	if($volume > $bitcoin_value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 0.0005 Bitcoin";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	
	$new_bitcoin_value = number_format($bitcoin_value- $volume, 8);

	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type = 'Bitcoin';
	$status = 'Processing';
	
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET bitcoin_value='$new_bitcoin_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		           $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type, type  )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type', '$type' );";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/coins_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	            		 header("location: ../Dashboard/coins_wallet");
	                    }
	           }else{
                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	             header("location: ../Dashboard/coins_wallet");
                    }
		
		
	
    }
    if(isset($_POST['withdraw_eth'])){
	
	$destin_addr = $_POST['destin_addr'];
	$volume = $_POST['volume'];
	$value = $_POST['ethereum_value'];
	$fee = '0.003';
	$recievable = $volume- $fee;
	$ref = '';
	$type = 'Withdraw';
	
	if($volume > $value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 0.003 Ethereum";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	
	$new_value =number_format( $value- $volume, 8);

	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type = 'Ethereum';
	$status = 'Processing';
	
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET ethereum_value='$new_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		           $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type , type )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type', '$type' );";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/coins_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	            		 header("location: ../Dashboard/coins_wallet");
	                    }
	           }else{
                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	             header("location: ../Dashboard/coins_wallet");
                    }
		
		
	
    }
    if(isset($_POST['withdraw_xrp'])){
	
	$destin_addr = $_POST['destin_addr'];
	$volume = $_POST['volume'];
	$value = $_POST['ripple_value'];
	$fee = '2';
	$recievable = $volume- $fee;
	$ref = '';

	
	if($volume > $value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 2 Ripple";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	
	$new_value = number_format($value- $volume, 8);

	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type = 'Ripple';
	$status = 'Processing';
	$type = 'Withdraw';
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET ripple_value='$new_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		           $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type , type )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type' , 'type');";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/coins_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
		             header("location: ../Dashboard/coins_wallet");
	                    }
	           }else{
                    $_SESSION["error"] = 'Sorry.. Please try after some time';
	             header("location: ../Dashboard/coins_wallet");
                    }
		
		
	
    }
    if(isset($_POST['withdraw_bch'])){
	
	$destin_addr = $_POST['destin_addr'];
	$volume = $_POST['volume'];
	$value = $_POST['bitcoin_cash_value'];
	$fee = '0.001';
	$recievable = $volume- $fee;
	$ref = '';
	$type = 'Withdraw';
	
	if($volume > $value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 0.001 Bitcoin Cash";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	
	$new_value = number_format($value- $volume, 8) ;
	
	
	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type = 'Bitcoin Cash';
	$status = 'Processing';
	
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET bitcoin_cash_value='$new_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		           $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type , type )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type' , '$type');";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/coins_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
		             header("location: ../Dashboard/coins_wallet");
	                    }
	           }else{
		        $_SESSION["error"] = 'Sorry.. Please try after some time';	
	             	header("location: ../Dashboard/coins_wallet");
                    }
		
		
	
    }
    if(isset($_POST['withdraw_ltc'])){
	
	$destin_addr = $_POST['destin_addr'];
	$volume = $_POST['volume'];
	$value = $_POST['litecoin_value'];
	$fee = '0.01';
	$recievable = $volume- $fee;
	$ref = '';
	$type = 'Withdraw';
	
	if($volume > $value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 0.01 Litecoin";
                 header("location: ../Dashboard/coins_wallet");
                 exit;
	}
	
	$new_value = number_format($value - $volume, 8);

	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type = 'Litecoin';
	$status = 'Processing';
	
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET litecoin_value='$new_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		           $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type , type )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type' '$type');";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/coins_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	          	   header("location: ../Dashboard/coins_wallet");	
	                    }
	           }else{
                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	             header("location: ../Dashboard/coins_wallet");
                    }
		
		
	
    }
     if(isset($_POST['withdraw_usd'])){
	
	
	$volume = $_POST['volume'];
	$value = $_POST['usd_value'];
	$remark = $_POST['remark'];
	$fee = '0';
	$recievable = $volume- $fee;
	$ref = '';
	$type = 'Withdraw';
	
	if($volume > $value){
		 $_SESSION["error"] = "Sorry..You dont have enough amount in your wallet";
                 header("location: ../Dashboard/usd_wallet");
                 exit;
	}
	if($volume < $fee){
		 $_SESSION["error"] = "Sorry..You have to withdraw atleast 1 USD";
                 header("location: ../Dashboard/usd_wallet");
                 exit;
	}
	
	$new_value = number_format($value - $volume, 2);

	
	$date  = Date('Y-m-d');
	$email = $_SESSION['email'];
	$coin_type ='USD';
	$status = 'Processing';
	
	
		require('connection.php');
		$query1 = "update `user_portfolilo` SET usd_value='$new_value' WHERE email='$email'";
	           if(mysqli_query($connection, $query1)){
	           
		            $sql = "INSERT INTO withdrawal (email, date,  volume , fee, recivable, destin_addr, status, reference, coin_type , type )
	                            VALUES ('$email', '$date', '$volume', '$fee', '$recievable', '$destin_addr', '$status', '$ref', '$coin_type', '$type');";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                    	
	                    
	                     $_SESSION["msg"] = "Your withdrawal request has been submitted successfully";
	                     header("location: ../Dashboard/usd_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
		             header("location: ../Dashboard/usd_wallet");
	                    }
	           }else{
                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	             header("location: ../Dashboard/usd_wallet");
                    }
		
		
	
    }
    if(isset($_POST['deposit_request'])){
	$email = $_SESSION['email'];
	$date = $_POST['date'];
	$amount = $_POST['amount'];
	$ref = $_POST['reference'];
	$confirm_ref = $_POST['confirm_reference'];
	
	if($ref != $confirm_ref){
		$_SESSION["error"] = 'Sorry.. Reference No. Does not match';
	        header("location: ../Dashboard/usd_wallet");
	        exit;
	}
	
	
	
	
		require('connection.php');
		
	           
		           $sql = "INSERT INTO deposit_request (email, date,  amount , reference_no )
	                            VALUES ('$email', '$date', '$amount', '$ref' );";
	                   
	                    if ($connection->query($sql) === TRUE) {
	                    
	                     $_SESSION["msg"] = "Your deposit request has been submitted successfully";
	                     header("location: ../Dashboard/usd_wallet");
	                    
	                    }else{
	                     $_SESSION["error"] = 'Sorry.. Please try after some time';
	                     header("location: ../Dashboard/usd_wallet");
	                    }
	         
    }
	if(isset($_POST['invite'])){
	  session_start();
  
    
    	$to= $_POST['invited_email'];
        $sender = $_SESSION["username"];
        $code = $_SESSION["id"];
    
    
    		      
                        $subject = 'Invitation from '.$sender;
                    
                   
                    $message = "<html>
					<head>
					<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
					<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' crossorigin='anonymous'>
					<style> body{  font-family: 'Roboto', sans-serif;}</style>
					</head>
					<body>
					<div class='container' style='padding: 5%;  '>
					<div><img src='https://bitspay.co/images/logo.png'></div>
					
					
					<p style='font-size: 18px; color: #8c8c8c; margin-top: 5%;' >Hello there,<br><br>
					".$sender." has invited you to register on Bitspay. Here is his/her referral ID : ".$code." .<br><br>
					
					If you have any questions, please contact to us at @bitspay .<br>
We hope you enjoy using Bitspay.
					
					</p>
					
					
					<p style='font-size: 24px; color: #8c8c8c;' >Team Bitspay</p>
					
					<div style='margin: 30px'>
					
					
					<p style='text-align: center; color: #8c8c8c '>Copyright 2018 | Bitspay <br> All rights reserved.</p>
					</div>
					
					</div>
					</body>
					</html>";
                    $headers = 'MIME-Version: 1.0'."\r\n";
                     $headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                    $headers .= 'From: no-reply@bitspay.co' . "\r\n" .
                       'Reply-To: no-reply@bitspay.co';
                   
                   if( mail($to, $subject, $message, $headers)){
                   $_SESSION["msg"] = "Invitations sent";
                    header("location: ../Dashboard/referrals");
                   }
                   else{
                   $_SESSION["msg"] = "Pleast try later ";
                    header("location: ../Dashboard/referrals");
                   }
                    
                   
    
    }
?>