<?php

	  session_start();
	  
		  if(!isset($_SESSION['email'])){
			        header('Location: ../Account/login.php');
			    }
	 	    
	 	    if($_SESSION['email']=="admin"){
			    
		    	$_SESSION['user_type']="admin";
		    	 header("location: ../admin/index.php");	
		    }
		    
		 require('connection.php');
		    $email_address= $_SESSION["email"];
		    $query = "SELECT * FROM `users` WHERE email='$email_address'";
                    
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
	                   
                            $_SESSION["id"]= $row['user_id'];
                            $_SESSION["phone"]= $row['phone'];
                            $_SESSION["username"] = $row['name'];
                            $_SESSION["kyc_status"]= $row['KYC_Status'];
                            
                            $_SESSION["dob"]= $row['date_of_birth'];
                            $_SESSION["country"]= $row['country'];
                            
                       
                    } 
                    
                    require('connection.php');
		    $email = $_SESSION['email'];
		    $query = "SELECT * FROM `user_portfolilo` WHERE email='$email_address'";
                    
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
                   	
                   	$bitcoin_value =$row['BTC_value'];
                   	$ripple_value = $row['XRP_value'];
                   	$bitcoin_cash_value = $row['BCH_value'];
                   	$litecoin_value = $row['LTC_value'];
                   	$ethereum_value = $row['ETH_value'];
                   	$usd_value = $row['usd_value'];
                   }
                   
                  	$url= 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD';
		 	$str = file_get_contents($url);
			$json = json_decode($str, true);
			$btc_price = $json['USD'];
			
			$url= 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD';
		 	$str = file_get_contents($url);
			$json = json_decode($str, true);
			$eth_price = $json['USD'];
			
			$url= 'https://min-api.cryptocompare.com/data/price?fsym=BCH&tsyms=USD';
		 	$str = file_get_contents($url);
			$json = json_decode($str, true);
			$bch_price = $json['USD'];
			
			$url= 'https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=USD';
		 	$str = file_get_contents($url);
			$json = json_decode($str, true);
			$ltc_price = $json['USD'];
			
			$url= 'https://min-api.cryptocompare.com/data/price?fsym=XRP&tsyms=USD';
		 	$str = file_get_contents($url);
			$json = json_decode($str, true);
			$xrp_price = $json['USD'];
                    
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>BitsPay | Dashboard </title>
   
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
     
     
     
     
<style>
   h2{
   font-size: 20px !important;
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
                            <!-- <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-white">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut" >
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="../files/trade_icon.png" >
                                                <div class="media-body">
                                                    <h5 class="notification-user">Trade Successful</h5>
                                                    
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="../files/withdrawal_icon.png" >
                                                <div class="media-body">
                                                    <h5 class="notification-user">Withdrawal Successfu</h5>
                                                    
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius" src="../files/deposit_icon.png" >
                                                <div class="media-body">
                                                    <h5 class="notification-user">Deposit Successful</h5>
                                                    <span class="notification-time">30 minutes ago</span> 
                                                </div>
                                            </div>
                                        </li>
                                          <li>
                                            <div class="media">
                                                <img class="img-radius" src="../files/deposit_icon.png" >
                                                <div class="media-body">
                                                    <h5 class="notification-user">Deposit Successful</h5>
                                                    
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                           
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
                               
                                 <li class="active">
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
                                            <a href="account_history" class="waves-effect waves-dark">
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
                                            <li class="breadcrumb-item"><a href="#!">Dashboard</a> </li>
                                            
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
                                        <!-- [ page content ] start -->
                                        <div class="row">
                                             <!-- order  start -->
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card bg-c-yellow order-card">
                                                    <a href="trade?name=Bitcoin&symbol=BTC" style="color: white !important">
                                                    <div class="card-block">
                                                    
                                                        <img class="f-28" src="../files/assets/icon/cryptocoins/btc.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>Bitcoin</h6>
                                                        <h2><?php echo $bitcoin_value; ?> BTC</h2>
                                                        <p class="m-b-0"> ≈ $ <?php echo round($bitcoin_value*$btc_price, 2); ?> </p>
                                                       
                                                    </div>
                                                     </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card bg-c-dark-grey order-card">
                                                  <a href="trade?name=Ethereum&symbol=ETH" style="color: white !important">
                                                    <div class="card-block">
                                                        <img class="f-28" src="../files/assets/icon/cryptocoins/eth.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>Ethereum</h6>
                                                        <h2><?php echo $ethereum_value; ?> ETH</h2>
                                                        <p class="m-b-0">≈ $ <?php echo round($ethereum_value*$eth_price, 2); ?> </p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card bg-c-blue order-card">
                                                  <a href="trade?name=Ripple&symbol=XRP" style="color: white !important">
                                                    <div class="card-block">
                                                        <img class="f-28" src="../files/assets/icon/cryptocoins/xrp.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>Ripple</h6>
                                                        <h2><?php echo $ripple_value; ?> XRP</h2>
                                                        <p class="m-b-0">≈ $ <?php echo round($ripple_value*$xrp_price, 2); ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xl-4">
                                                <div class="card bg-c-orange order-card">
                                                  <a href="trade?name=BitcoinCash&symbol=BCH" style="color: white !important">
                                                    <div class="card-block">
                                                        <img class="f-28" src="../files/assets/icon/cryptocoins/btc_cash.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>Bitcoin Cash</h6>
                                                        <h2><?php echo $bitcoin_cash_value; ?> BCH</h2>
                                                        <p class="m-b-0">≈ $ <?php echo round($bitcoin_cash_value*$bch_price, 2); ?> </p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card bg-c-grey order-card">
                                                    <div class="card-block">
                                                      <a href="trade?name=Litecoin&symbol=LTC" style="color: white !important">
                                                        <img class="f-28" src="../files/assets/icon/cryptocoins/ltc.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>Litecoin</h6>
                                                        <h2><?php echo $litecoin_value; ?> LTC</h2>
                                                        <p class="m-b-0"> ≈$ <?php echo round($litecoin_value*$ltc_price, 2); ?> </p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-4">
                                                <div class="card bg-c-dark-blue order-card">
                                                  <a href="#" style="color: white !important">
                                                    <div class="card-block" style="padding-bottom: 11%">
                                                        <img class="f-28" src="../images/dollar_white.png" style="width: 30%; float:right; opacity:0.5;">
                                                        <h6>US Dollar</h6>
                                                        <h2>$ <?php echo $usd_value; ?> </h2>
                                                        
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- order  end -->
                               

                                            
                                           
					<!-- customar project  start -->
					<div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="fa fa-usd f-30 icon " style="color: #33f999; font-size: 25px"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">USD Wallet</h6>
                                                                <h6 class="m-b-0"> $ 0</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0"> 
                                                        <!--  pending, approved,  -->
                                                        <?php  if($_SESSION['kyc_status'] == 'Pending'){  ?>
                                                        
                                                        	<div class="col-auto">
                                                               <i class="icon feather icon-alert-triangle f-30 " style="color: #33f999"></i>
                                                            
                                                            </div>
                                                            
                                                            
                                                        <?php	}else{   ?>
                                                        	<div class="col-auto">
                                                               <i class="icon feather icon-user-check f-30 text-c-purple" style="color: #33f999"></i>
	                                                        </div>
                                                            
                                                        <?php	}  ?>
                                                           	<div class="col-auto">
                                                                <h6 class="text-muted m-b-10">KYC Status</h6>
                                                                <h6 class="m-b-0"><?php  echo $_SESSION["kyc_status"]; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                            <i class="icon feather icon-file-text f-30 " style="color: #33f999"></i>
                                                             <!--   <i class="icon feather icon-user-check f-30 text-c-purple"></i>-->
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Tickets Solved</h6>
                                                                <h6 class="m-b-0">0</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-3 col-md-6">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center m-l-0">
                                                            <div class="col-auto">
                                                                <i class="icon feather icon-users f-30 " style="color: #33f999"></i>
                                                            </div>
                                                            <div class="col-auto">
                                                                <h6 class="text-muted m-b-10">Referred Users</h6>
                                                                 <?php
				                                    require('connection.php');
				                                    $referal_id = $_SESSION["id"];
				                                    $query = "SELECT * FROM `users` WHERE SPONSER_ID='$referal_id'";
				                    
						                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
						                    $count= mysqli_num_rows($result);  ?>
                                                                <h6 class="m-b-0"><?php echo $count; ?></h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- customar project  end -->

                                        </div>
                                        <!-- [ page content ] end -->
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
