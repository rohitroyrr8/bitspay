<?php

	session_start();
	
	if(!isset($_SESSION['email'])){
        header('Location: ../Account/login.php');
    }
    
		require('connection.php');
		    $email_address= $_SESSION["email"];
		    $query = "SELECT * FROM `users` WHERE email='$email_address'";
                    
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
                            $_SESSION["id"]= $row['user_id'];
                           
                            $_SESSION["phone"]= $row['phone'];
                            $_SESSION["password"]= $row['Password'];
                            
	                    $_SESSION["google_code"]= $row['google_auth_code'];        
	                            
	                     
			
                            
                       
                    } 
	require_once( '../../fxcoin.uk/User/qr_generator/vendor/autoload.php' );

	require_once( '../../fxcoin.uk/User/qr_generator/vendor/PHPGangsta/GoogleAuthenticator.php' );

	$autenticador = new GoogleAuthenticator();

	

	    if(!$_SESSION["codigo_secreto"]){
	       $_SESSION["codigo_secreto"] =  $autenticador->createSecret();
	        
	    }
	    $codigo_secreto = $_SESSION["codigo_secreto"];

	$website = "Bitspay";
	$titulo = $_SESSION["email"];
	$url_qr_code = $autenticador->getQRCodeGoogleUrl( $titulo, $codigo_secreto, $website );
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Security | Bitspay </title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Able Pro 7.0 Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="../files/assets/images/favicon.png" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
    <!-- cryptocoins icon -->
     <link rel="stylesheet" href="../files/assets/icon/cryptocoins/cryptocoins.css">
 <!-- cryptocoins icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/cryptocoins/cryptocoins-colors.css">
    <!-- feather icon -->
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/widget.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/css/pages.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/cryptofont/cryptofont.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/cryptofont/cryptofont.min.css">
     <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->
<style>
   
   p{
   	font-size: 15px !important;
   }
  
   i.cc:hover { color: #0060BD; transform: rotate(-20deg); transform-origin: 0.49em 0.7em; }
</style>
</head>

<body>
  <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>
    <!-- [ Pre-loader ] end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- [ Header ] start -->
            <nav class="navbar header-navbar pcoded-header" style="position:fixed !important; z-index: 1; ">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                        <i class="feather icon-toggle-right"></i>
                    </a>
                        <a href="./">
                        <img class="img-fluid" src="../files/assets/images/bitspay.png" alt="Theme-Logo" width="50%" />
                    </a>
                        <a class="mobile-options waves-effect waves-light">
                        <i class="feather icon-more-horizontal"></i>
                    </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
										<i class="feather icon-x input-group-text"></i>
									</span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
										<i class="feather icon-search input-group-text"></i>
									</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                <i class="full-screen feather icon-maximize"></i>
                            </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                           
                           
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon feather icon-user f-30 text-c-green w3-large" style="font-size: 20px"></i>
                                        <span><?php  echo $_SESSION["username"]; ?></span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="security">
                                            <i class="feather icon-settings"></i> Settings

                                        </a>
                                        </li>
                                        <li>
                                            <a href="profile">
                                            <i class="feather icon-user"></i> Profile

                                        </a>
                                        </li>
                                   	<li>
                                            <a href="referrals">
                                            <i class="feather icon-users"></i> Referrals

                                        </a>
                                        </li>
                                        
                                        <li>
                                            <a href="../Account/logout">
                                            <i class="feather icon-log-out"></i> Logout

                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- [ Header ] end -->

            
           
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- [ navigation menu ] start -->
                     <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-menu-user img-radius" src="../files/user_dark_green.png" style="width: 23%">
                                    <div class="user-details">
                                        <p id="more-details"><?php  echo $_SESSION["username"]; ?><i class="feather icon-chevron-down m-l-10"></i></p>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="profile">
                                            <i class="feather icon-user"></i>View Profile
                                        </a>
                                            <a href="security">
                                            <i class="feather icon-settings"></i>Settings
                                        </a>
                                            <a href="../Account/logout">
                                            <i class="feather icon-log-out"></i>Logout
                                        </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                            <ul class="pcoded-item pcoded-left-item">
                               
                                 <li>
                                    <a href="./" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-home"></i>
									</span>
                                    <span class="pcoded-mtext">Dashboard</span>
                                </a>
                                </li>
                                <li class="">
                                    <a href="update_kyc" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-file-text"></i>
									</span>
                                    <span class="pcoded-mtext">KYC Update</span>
                                </a>
                                </li>
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
					<span class="pcoded-micon">
						<i class="feather icon-clock"></i>
					</span>
                                     <span class="pcoded-mtext">Accounts </span>
                                   
                                </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="coins_wallet" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Crypto Wallet</span>
                                        </a>
                                        </li>
                                        <li class="">
                                            <a href="usd_wallet" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">USD Wallet</span>
                                        </a>
                                        </li>
                                        <li class="">
                                            <a href="trade_history" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">History</span>
                                        </a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-activity"></i>
									</span>
                                     <span class="pcoded-mtext">Trades </span>
                                   
                                </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="open_order" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Open Order</span>
                                        </a>
                                        </li>
                                        <li class="">
                                            <a href="trade_history" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Trade History</span>
                                        </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                
                                <li class="">
                                    <a href="#" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-edit"></i>
									</span>
                                    <span class="pcoded-mtext">Support</span>
                                </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">Security</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Security & Preferences</a> </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        
                        
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body"> 
                                    	
                                    	<!-- Material tab card start -->
                                           <div class="card">
                                            <?php if(isset($_SESSION["msg"])){ ?>
                                            <div id="msg" class="alert " style="background: #405149; color: white; padding: 19px; margin: 25px;">
	                                    	<i class="feather icon-info"></i> <?php echo $_SESSION["msg"]; ?>
	                                    	</div>
	                                     <?php  unset($_SESSION["msg"]);    }      ?>	
	                                     
	                                      <?php if(isset($_SESSION["error"])){ ?>
                                            <div id="msg" class="alert " style="background: #a2071de3; color: white; padding: 19px; margin: 25px;">
	                                    	<i class="feather icon-alert-circle"></i> <?php echo $_SESSION["error"]; ?>
	                                    	</div>
	                                     <?php  unset($_SESSION["error"]);    }      ?>
	                                     
	                                    
                                          	<div class="card-block">
                                          	<div class="card-header">
                                                <h4>Change Mobile Number</h4>
                                                <button class="w3-right btn " style="background: #33f999; color:white;  float:right;"  data-toggle="modal" data-target="#phone-Modal">Change</button>
                                                <p style="font-weight:initial; color:#666;">Your verified mobile number is used to send login codes when suspicious or unusual activity is detected, and to send payment alerts when you receive funds.</p>
                                                
                                                
                                            </div>
                                            
                                            <div class="card-header">
                                                <h4>Change Password</h4>
                                                <button class="w3-right btn " style="background: #33f999; color:white; float:right;"  data-toggle="modal" data-target="#password-Modal">Change</button>
                                                <p style="font-weight:initial; color:#666;">Your password is never shared with our servers, which means we cannot help reset your password if you forget it. Make sure youwrite down your recovery phrase which can restore access to your wallet in the event of a lost password.</p>
                                                
                                            </div>
                                            
                                            <div class="card-header">
                                                <h4>Enable/Disable 2-step Verification</h4>
                                               <?php if($_SESSION["google_code"]==""){ ?>
           <button class="w3-right btn " style="background: #33f999; color:white;" data-toggle="modal" data-target="#authenticate_Modal1">Enable</button>
           <?php } else {  ?>
		           <button class="w3-right btn " style="background: #33f999; color:white;" data-toggle="modal" data-target="#authenticate_Modal2">Disable </button>
		           <?php } ?>  
                                                <p style="font-weight:initial; color:#666;">Enable / Disable two factor authentication for enhance security ensuring complete account security from unauthorised access.Once you enable two factor authentication, please note-down your verification key in a safe place in case you lost/reset your phone.</p>
                                                
                                              
                                      </div>        
                                          <!--modal -->      
					<div class="modal fade" id="phone-Modal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content text-center">
                                                    
                                                    <div class="modal-body w3-padding">
                                                    <h4 class="modal-title">Change Mobile No.</h4>
                                                    <p>Your verified mobile number is used to send login codes when suspicious or unusual activity is detected, and to send payment alerts when you receive funds.</p>
                                                      <form action="change_email.php" method="post">
                					<div class="form-group label-floating">
                                                   	
                                                	<input class="form-control" type="text" name="new_phone_no" value="<?php echo  $_SESSION["phone"]; ?>" placeholder="New Mobile Number">
             						 </div>
             						 <div class="form-group" style="padding-left:10%; padding-right:10%; margin-top-40px" > 
						                <input class="btn btn-primary w3-right" type="submit" value="Submit" name="change_phone">
						              </div>
             					      </form>
                  				    </div>
                                                
                                                </div>
                                            </div>
                   			 </div>
                                            <!--close modal -->
                                            <!--modal -->
                                            <div class="modal fade" id="password-Modal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content text-center">
                                                   <div class="modal-body">
                                                      <form action="change_email.php" method="post">
                					  <h4 class="modal-title">Change Password</h4>
            						<p>Your password is never shared with our servers, which means we cannot help reset your password if you forget it</p>
							<div class="form-group label-floating">

							 <input class="form-control" type="password" name="old_password" placeholder="Old Password">
							</div>
							
							
							<div class="form-group label-floating">

			                                <input class="form-control" type="password" name="new_password1" placeholder="New Password">
							</div>
							  <div class="form-group label-floating">

			                                <input class="form-control" type="text" name="new_password2" placeholder="Confirm Password" >
			                                </div>
							<input class="form-control" type="hidden" name="password" value="<?php  echo $_SESSION['password']; ?>" >
							
							<div class="form-group" style="padding-left:10%; padding-right:10%; margin-top-40px" > 
							<input class="btn btn-primary w3-right" type="submit" value="Submit" name="change_password">
							</div>
							</form> 
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            </div>
                                           <!--close modal -->
                                           <!--modal -->
                                            <div class="modal fade" id="authenticate_Modal1" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                  
                                                     <div class="modal-body text-center">
                                                     <h4 class="modal-title ">Enable 2 Factor Authentication</h4>
                                                        <p>Once you enable two factor authentication, please note-down your verification key in a safe place in case you lost/reset your phone. Otherwise you will be not be able to access your account.</p>
          					     <form action="change_email.php" method="post">
                   					 <div style="text-align: center;">
                        

			                            <img style="text-align: center; width: 30%" class="img-fluid" src="<?php   echo $url_qr_code ?>" 	alt="Verify this Google Authenticator" ><br><br>    
				<p class="w3-large w3-text-red">Verification Key <?php echo $_SESSION['codigo_secreto'];  ?>  </p>  
                             <input type="hidden" name="google_auth_code" value="<?php echo $_SESSION['codigo_secreto'];  ?>">
                            <input name="enable_authenticator" type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px; "  value="Enable" >

                   					 </div>
                   					

              					     </form>
                
      						    </div>
                                                    
                                       		 </div>
                                   
				            </div>
				            </div>
                                            <!--close modal -->
                                            <!--modal -->
                                                 
				    <div class="modal fade`" id="authenticate_Modal2" role="dialog">
				    <div class="modal-dialog modal-lg ">
				      <div class="modal-content text-center">
				        
				        <div class="modal-body" style="padding: 2% 10% !important">

				        <h3 class="modal-title" style="color: #405149">Disable 2 Factor Authentication</h3>
				            <p class"w3-margin">Once you disable two factor authentication, other who have your password can also able to access to your account . We recommend you to choose two-factor authentication</p>
				           <form action="change_email.php" method="post">
			                    <div style="text-align: center;">
			                     <input name="disable_authenticator" type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px; "  value="Disable" >
					   </div>
				
				           </form>
				                
				        </div>
				        
				      </div>
				    </div>
				  </div> 
                                            <!--close modal -->
                                            
                                            <div class="card-header" style="margin-top:30px; border-bottom:none;">
                                                <h4>Account Activity</h4>
                                               
                                            <div class="table-responsive">
                                                    <table class="table">
                                                    
                                                    
                                                        <thead>
                                                            <tr>
                                                                <th>ACTION</th>
                                                                <th>OS</th>
                                                                <th>Browser</th>
                                                                <th>IP ADDRESS</th>
                                                                <th>LOCATION</th>
                                                                <th>WHEN</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                             <?php
	                                                    require('connection.php');
	                                                    $query = "SELECT * FROM `login_log` WHERE email='$email_address' ORDER BY `login_log`.`date` DESC  LIMIT 0 , 10  ";
	                    
					                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
					                   
					                     if ($result->num_rows > 0) {
				                                // output data of each row
				                                while($row0 = $result->fetch_assoc()) {
					                  	 if($row0){   ?>
					                  	 <tr>
                                                                <td><?php echo $row0['action']; ?></td>
                                                                <td><?php echo $row0['os']; ?></td>
                                                                 <td><?php echo $row0['source']; ?></td>
                                                                <td><?php echo $row0['ip']; ?></td>
                                                                <td><?php echo $row0['location']; ?></td>
                                                                <td><?php echo $row0['date']; ?></td>
                                                            	</tr>
					                  	<? }else{  ?>
					                  	<tr>No record found</tr>
	                                                    	
	                                                    	<?  } } } ?>
                                                            
                                                            
                                                       </tbody>   
                                                    </table>     
                                           	</div>
                                           	</div>
                                          </div>
                                                 
                                           </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade
            <br/>to any of the following web browsers to access this website.
        </p>
        <div class="iew-container">
            <ul class="iew-download">
                <li>
                    <a href="http://www.google.com/chrome/">
                        <img src="../files/assets/images/browser/chrome.png" alt="Chrome">
                        <div>Chrome</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.mozilla.org/en-US/firefox/new/">
                        <img src="../files/assets/images/browser/firefox.png" alt="Firefox">
                        <div>Firefox</div>
                    </a>
                </li>
                <li>
                    <a href="http://www.opera.com">
                        <img src="../files/assets/images/browser/opera.png" alt="Opera">
                        <div>Opera</div>
                    </a>
                </li>
                <li>
                    <a href="https://www.apple.com/safari/">
                        <img src="../files/assets/images/browser/safari.png" alt="Safari">
                        <div>Safari</div>
                    </a>
                </li>
                <li>
                    <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                        <img src="../files/assets/images/browser/ie.png" alt="">
                        <div>IE (9 & above)</div>
                    </a>
                </li>
            </ul>
        </div>
        <p>Sorry for the inconvenience!</p>
    </div>
<![endif]-->
	
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
    <!-- Custom js -->
    <script src="../files/assets/js/pcoded.min.js"></script>
    <script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="../files/assets/js/script.min.js"></script>
</body>

</html>
