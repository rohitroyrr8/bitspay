<?php

	  session_start();
	  
		  if(!isset($_SESSION['email'])){
			        header('Location: ../Account/login.php');
			    }
	 	    
	 	    if($_SESSION['email']=="admin"){
			    
		    	$_SESSION['user_type']="admin";
		    	 header("location: ../admin/index.php");	
		    }
		    
		 
?>

<!DOCTYPE html>

<html lang="en">

<head>
     <title>Referrals </title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/cryptofont/cryptofont.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/icon/cryptofont/cryptofont.min.css">
     <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

   
   
  
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
                    <!-- [ navigation menu ] end -->
                    <div class="pcoded-content">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h4 class="m-b-10">Dashboard</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Referrals</a> </li>
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                                                        
                                            <div class="col-md-6 col-sm-12">
                                                <!-- Flags card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 style="color: #33f999">Bitspay Referral</h3>
                                                        
                                                    </div>
                                                    <div class="card-block" style="padding-top: 45px;">
                                                    
                                                     <div style="text-align: center"> <i class="icon feather icon-users f-30 " style="color: #33f999; font-size: 80px; "></i></div>
                                                     <h6 class="w3-margin-bottom w3-margin-top"><b>Your unique referral ID</b></h6>
                                                     <div class="form-group ">
		                                            <input type="text" class="form-control " placeholder="" value="<?php echo $_SESSION["id"]; ?>" style="color: #405149 !important"><span class="w3-small">Copy this to share with your friends.</span>
		                                     </div>
		                                     
		                                     
		                                    <h6> Total cash rewards earned: $ 0</h6>
		                                    <?php
		                                    require('connection.php');
		                                    $referal_id = $_SESSION["id"];
		                                    $query = "SELECT * FROM `users` WHERE SPONSER_ID='$referal_id'";
		                    
				                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
				                    $count= mysqli_num_rows($result);  ?>
		                                     <h6>Total referred users who registered: <?php echo $count; ?></h6>
<span class="w3-small">Questions? Contact to our support center.</span>
						</div>
						</div>
					    </div>
					    <div class="col-md-6 col-sm-12">
                                               <div class="card">
                                                    <div class="card-header">

                                                       <h3 style="color: #33f999">Invite Friends & Earn </h3>
                                                    </div>
                                                    <div class="card-block">
                                                    <div style="text-align: center"> 
                                                    <img src="../files/referral.png" style="width: 30%">
                                                    <h6><b>Refer your friends to earn rewards when they join Bitspay.</b></h6>
                                                    <p style="font-size: 14px">Using digital currency is more fun with friends! You can invite your friends by sharing the provided link. Once your friend register with bitspay and start trading, you will both get 5% of that .</p>
                                                    </div>
                                                    <form action="change_email.php" method="post">
                                                    <?php if(isset($_SESSION["msg"])){ ?>
                                            
	                                    	<span style="color: #405147; "> <?php echo $_SESSION["msg"]; ?></span>
	                                    	
	                                     <?php  unset($_SESSION["msg"]);    }      ?>	
	                                     
	                                      <?php if(isset($_SESSION["error"])){ ?>
                                           
	                                    	<span style="color: #405147; "> <?php echo $_SESSION["error"]; ?></span>
	                                    	
	                                     <?php  unset($_SESSION["error"]);    }      ?>
                                                    <div class="input-group w3-margin-top">
                                                    
						<input type="text" class="form-control " name="invited_email"  placeholder="friends email address" style="color: #405149 !important">
						<input type="submit" name="invite" value="Invite" class="btn btn-primary email input-group-addon" data-disable-with="Invite" /> 
						</div>
						</form>
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
