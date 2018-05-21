<?php
	session_start();

	if(isset($_POST['verify'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$mobile = $_POST['mobile'];
		$dob = $_POST['dob'];
		$referrals = $_POST['referrals'];
		$country = $_POST['country'];
		$otp = $_POST['otp'];
		$entered_otp = $_POST['entered_otp'];
		
		 if($otp == $entered_otp){
		 	
		 	$encrypt_pwd = sha1($password);
		 	$date = Date('Y-m-d');
		 	
		 	require('connection.php');
		 	$sql = "INSERT INTO users (user_id, name, email, phone,  country , date_registered, date_of_birth, SPONSER_ID, Password )
                            VALUES ('$otp', '$name', '$email', '$mobile', '$country', '$date', '$dob', '$referrals', '$encrypt_pwd' );";
                            
                            
                            if ($connection->query($sql) === TRUE) {
                            	
                            	$sql1 = "INSERT INTO user_portfolilo (portfolio_id, email, XRP_value,  LTC_value , BCH_value, BTC_value, ETH_value , usd_value)
                            VALUES ('$otp', '$email', '0.00', '0.000', '0.0000', '0.0000', '0.00000', '0.00');";
                            
                            
	                            if ($connection->query($sql1) === TRUE) {
	                            
					     require('client_addr.php');
		                             require('current_location.php');
		                             
		                            
		                             $source = $obj->showInfo('browser');
		                             $ip = $obj->getRealIpAddr();
		                             $os =$obj->showInfo('os');;
		                             $location = ip_info($ip, "Address");
		                             
		                              $timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
						   $date = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
			                        	
		                             require('connection.php');
		                             $sql = "INSERT INTO login_log (action, email, source,  ip , os, location, date )
		                 	     VALUES ('Registration', '$email', '$source', '$ip', '$os', '$location', '$date' );";
		                    
		                    
		                            if ($connection->query($sql) === TRUE) {
		                            
		                             
		                            
		                            }	                            	
	                            	     
	                            	    $_SESSION['email']=$email;
		                             header('location: ../Dashboard/index.php');
		                             exit;
	                            
	                            }else{
	                            	echo $connection->error;
	                            	exit;
	                            }
                            
                            }
                            else{
		 		$_SESSION['error'] =  'We are having problem while creating your account. Please try again later'.$connection->error;
                            	header('location: sign-up.php');
			 	exit;
                            }
		 		
		 
		 	
		 }
		 else{
		 	$_SESSION['error'] =  'In-correct PIN. Please try agin later';
		 	header('location: sign-up.php');
		 	exit;
		 }
		
				
		
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account | FXCoin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.blue.css" id="theme-stylesheet">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
       <script src='https://www.google.com/recaptcha/api.js'></script>
      
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.0.3/bootstrap-show-password.min.js"></script>
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114735243-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-114735243-1');
	</script>
	<style>
	
	 @media only screen and (max-width: 600px) {
	 
		.verify{
			margin: 2% 10%;
		}
		.logo{
			width: 30%;
		}
	}
	@media only screen and (min-width: 1200px) {
		.verify{
			margin: 2% 30%;
		}
		.logo{
			width: 15%;
		}
	}
	</style>
  </head>
 <body>
<?php

if($_POST['register']){
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$mobile = $_POST['mobile'];
	$dob = $_POST['dob'];
	$referrals = $_POST['referrals'];
	$country = $_POST['country'];
	$otp = mt_rand(10000, 999999);

	if($password != $confirm_password){
		$_SESSION['error'] = 'Password does not match. Please try again ';
		header('location: sign-up.php');
		exit;
	}
	
	else{ 
				 $to = $email;		
				$subject = "Welcome to Bitspay";
				$txt = "<html>
					<head>
					<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
					<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' crossorigin='anonymous'>
					<style> body{  font-family: 'Roboto', sans-serif;}</style>
					</head>
					<body>
					<div class='container' style='padding: 5%;  '>
					<div><img src='https://bitspay.co/images/logo.png'></div>
					
					
					<p style='font-size: 18px; color: #8c8c8c; margin-top: 5%;' >Hello ".$name.".<br><br>
					Your One Time Password (OTP) is: ".$otp." .<br><br>
					
					If you have any questions, please contact to us at @bitspay .<br>
We hope you enjoy using Bitspay.
					
					</p>
					
					<!--<div style=' margin: 52px 0px !important; '>
					<a href='https://bitspay.co/' style='background: #405149 ; color: white; padding: 10px 33px !important; text-decoration: none !important' class='btn'>Check Activity</a>
					
					</div> -->
					<p style='font-size: 24px; color: #8c8c8c;' >Team Bitspay</p>
					
					<div style='margin: 30px'>
					
					
					<p style='text-align: center; color: #8c8c8c '>Copyright 2018 | Bitspay <br> All rights reserved.</p>
					</div>
					
					</div>
					</body>
					</html>";
				 $headers = 'From: no-reply@bitspay.co' . "\r\n" . 'Reply-To: no-reply@bitspay.co';
				    // To send HTML mail, the Content-type header must be set
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				
				mail($to,$subject,$txt,$headers);
	
	
	?>
		<div class="  w3-center alert alert-success " style=" padding:30px; margin: 10%; border-radius: 5px;">
		<img class="logo" src="../files/assets/images/bitspay_logo.png" alt="logo.png" style="">
                <h3>Verify your email address</h3>

			                       <p>We have sent an <b>OTP </b>to  the email address that you have entered. Please enter code below to complete sign-up process </p>
				<!--   <?php echo $otp; ?>            -->
                <form method="post" action="#" style="align-content: center; text-align: center">
                       
		<div class="verify" style="">
		    <div class="input-group">
		    
		      <input type="text"  class="form-control" name="entered_otp" placeholder="Enter verification Code " style="">
		      <input type="hidden" name="name" value="<?php  echo $name; ?>">
		      <input type="hidden" name="email" value="<?php  echo $email; ?>">
		      <input type="hidden" name="password" value="<?php  echo $password; ?>">
		      <input type="hidden" name="mobile" value="<?php  echo $mobile; ?>">
		      <input type="hidden" name="dob" value="<?php  echo $dob; ?>">
		      <input type="hidden" name="referrals" value="<?php  echo $referrals; ?>">
		      <input type="hidden" name="country" value="<?php  echo $country; ?>">
		      <input type="hidden" name="otp" value="<?php  echo $otp; ?>">
		      <span class="input-group-btn">
		      <input type="submit"   value="Verify" class="btn " name="verify">

		      </span>
		    </div>
		  </div>

                        
                         
               </form>
               <p id="sent" class="w3-text-green"></p>
              <p onclick="myFunction()">Resend Verification</p><br>
              <p><b>Note: </b> It might take upto 2-3 minutes  for verification link to arrive. Please check your Spam/Promotions folder as well if you dont recieve the mail in your inbox. </p>
            </div> 
	<? }
	
	}
?>

<script>
function myFunction() {
	document.getElementById("sent").innerHTML= "OTP sent";

    location.reload();
}
</script>
</body>
</html>