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
		    $email = $_SESSION['email'];
		    $query = "SELECT * FROM `user_portfolilo` WHERE email='$email'";
                    
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
                   	
                   	$bitcoin_value =$row['BTC_value'];
                   	$ripple_value = $row['XRP_value'];
                   	$bitcoin_cash_value = $row['BCH_value'];
                   	$litecoin_value = $row['LTC_value'];
                   	$ethereum_value = $row['ETH_value'];
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
			
			$portfolio_value = $bitcoin_value*$btc_price + $ethereum_value*$eth_price + $bitcoin_cash_value*$bch_price + $litecoin_value*$ltc_price + $ripple_value*$xrp_price
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Crypto Wallet | Bitspay </title>
   
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
   
   
  
   i.cc:hover { color: #0060BD; transform: rotate(-20deg); transform-origin: 0.49em 0.7em; }
   
  a{
  font-size: 14px;
  }
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
                                
                                <li class="pcoded-hasmenu active">
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
                                            <h4 class="m-b-10">Balance</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Account Balance</a> </li>
                                            
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
                                                <h4>Crypto Wallet</h4>
                                                <h6>Portfolio Value : $ <?php echo number_format($portfolio_value, 2); ?></h6>
                                                
                                            </div>
                                            <div class="card-block ">
                                                <div class="table-responsive">
                                                    <table class="table w3-padding" style="margin-top: 20px">
                                                        <thead>
                                                            <tr>
                                                                <th>CRYPTOCURRENCY</th>
                                                                <th>TOTAL</th>
                                                               
                                                                <th>VALUE</th>
                                                                <th colspan="3" style="text-align: center !important;">TRANSACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/btc_sm.png" style="width:10%; margin:0px 10px 0px 0px;">Bitcoin </th>
                                                                <td><?php echo $bitcoin_value; ?> BTC</td>
                                                                <td>$ <?php echo number_format($bitcoin_value*$btc_price, 2); ?></td>
                                                               
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#btc_deposit"><b>DEPOSIT</b></td>
                                                                
                                                      <div class="modal fade" id="btc_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>BITCOIN DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=1Ddiuw3UoZMrM954QS3nf8QxoLmyQUWBWF&choe=UTF-8" style="width: 40%" />
				           <p>1Ddiuw3UoZMrM954QS3nf8QxoLmyQUWBWF</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 0.001 BTC</p>
				           	
                               	<p><b>Note</b><br>Please only transfer Bitcoin to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>           
                                                                
                                                             

                                        <td style="color:#405149; cursor: pointer;" class="" data-toggle="modal" data-target="#btc_withdrawal"><b>WITHDRAW</b></td>
                                         <div class="modal fade" id="btc_withdrawal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content w3-center">
                                                    <div class="modal-body">
                                                    <h4>BITCOIN WITHDRAWAL</h4><hr>
                                                    <form action="change_email.php" method="post">
                                                     <div class="form-group " style="padding: 0% 12%">
					           
					                 <input class="form-control" type="text" name="volume" placeholder="Volume" required>
					            </div>
					            <div class="form-group " style="padding: 0% 12%">
					                 
					                 <input class="form-control" type="text" name="destin_addr" placeholder="Destination Wallet Address" required>
					            </div>
					            <input type="hidden" name="bitcoin_value" value="<?php echo $bitcoin_value; ?>" >
				           <p style="margin: 20px;">WITHDRAWAL FEES 0.0005  BTC</p>
				           	
			       	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
       						 </div>
                                                     <div class="modal-footer w3-center">
                                                     <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_btc">
                                                     </div>
                                                     </form>
                                                </div>
                                            </div>
                                         <td style="color:#405149b; cursor: pointer;" class="" ><a href="trade?name=Bitcoin&symbol=BTC"><b>TRADE</b></a></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/eth_sm.png" style="width:10%; margin:0px 10px 0px 0px;">Ethereum </th>
                                                                <td><?php echo $ethereum_value; ?> ETH</td>
                                                               
                                                                <td>$ <?php echo number_format($ethereum_value*$eth_price, 2); ?></td>
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#eth_deposit"><b>DEPOSIT</b></td>
                                                                 <div class="modal fade" id="eth_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>ETHEREUM DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=0x624bfd4E1216E2d91c54e4A6d4BD7DB680193c4b&choe=UTF-8"  style="width: 40%" />
				           <p>0x624bfd4E1216E2d91c54e4A6d4BD7DB680193c4b</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 0.01 ETH</p>
				           	
                               	<p><b>Note</b><br>Please only transfer ethereum  to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>           
                                                                
                                                                
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#eth_withdrawal"><b>WITHDRAW</b></td>
                                                                <div class="modal fade" id="eth_withdrawal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>ETHEREUM WITHDRAWAL</h4><hr>
                                                                             <form action="change_email.php" method="post">
                                                                             <div class="form-group " style="padding: 0% 12%">
								           
								                 <input class="form-control" type="text" name="volume" placeholder="Volume" required>
								            </div>
								             <input type="hidden" name="ethereum_value" value="<?php echo $ethereum_value; ?>" >
								            <div class="form-group " style="padding: 0% 12%">
								                 
								                 <input class="form-control" type="text" name="destin_addr" placeholder="Destination Wallet Address" required>
								            </div>
				           <p style="margin: 20px;">WITHDRAWAL FEES 0.003 ETH</p>
				           	
                               	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
                               	
                               	 
               

                                                                            </div>
                                                                             <div class="modal-footer w3-center">
                                                                             <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_eth">
                                                                             </div>
                                                                             </form>
                                                                        </div>
                                                                    </div>
                                                               <td style="color:#405149b; cursor: pointer;" class="" ><a href="trade?name=Ethereum&symbol=ETH"><b>TRADE</b></a></td> 
                                                            </tr>
                                                                                                                        <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/xrp_sm.png" style="width:8%; margin:0px 10px 0px 0px;">Ripple</th>
                                                                <td><?php echo $ripple_value; ?> XRP</td>
                                                               
                                                                <td>$ <?php echo number_format($ripple_value*$xrp_price, 2); ?></td>
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#xrp_deposit"><b>DEPOSIT</b></td>
                                                                 <div class="modal fade" id="xrp_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>RIPPLE DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=0x624bfd4E1216E2d91c54e4A6d4BD7DB680193c4b&choe=UTF-8"  style="width: 40%" />
				           <p>0x624bfd4E1216E2d91c54e4A6d4BD7DB680193c4b</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 1 XRP</p>
				           	
                               	<p><b>Note</b><br>Please only transfer ripple  to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>           
                                                                
                                                                
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#xrp_withdrawal"><b>WITHDRAW</b></td>
                                                                <div class="modal fade" id="xrp_withdrawal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>RIPPLE WITHDRAWAL</h4><hr>
                                                                             <form action="change_email.php" method="post">
                                                                             <div class="form-group " style="padding: 0% 12%">
								           
								                 <input class="form-control" type="text" name="volume" placeholder="Volume" >
								            </div>
								            <div class="form-group " style="padding: 0% 12%">
								                 
								                 <input class="form-control" type="text" name="destin_addr" placeholder="Destination Wallet Address" >
								            </div>
								             <input type="hidden" name="ripple_value" value="<?php echo $ripple_value; ?>" >
				           <p style="margin: 20px;">WITHDRAWAL FEES 2 XRP</p>
				           	
                               	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
                               	
                               	 
               

                                                                            </div>
                                                                             <div class="modal-footer w3-center">
                                                                             <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_xrp">
                                                                             </div>
                                                                             </form>
                                                                        </div>
                                                                    </div>
                                                                <td style="color:#405149b; cursor: pointer;" class="" ><a href="trade?name=Ripple&symbol=XRp"><b>TRADE</b></a></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/btc_cash_sm.png" style="width:10%; margin:0px 10px 0px 0px;">Bitcoin Cash </th>
                                                                <td><?php echo $bitcoin_cash_value; ?> BCH</td>
                                                                <td>$ <?php echo number_format($bitcoin_cash_value*$bch_price, 2); ?></td>
                                                                
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#bch_deposit"><b>DEPOSIT</b></td>
                                                                <div class="modal fade" id="bch_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>BITCOIN CASH DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=bitcoincash:qptd54yp54jcjdrcdt7f0pd7ved5eym3tqvk7af0lx&choe=UTF-8" style="width: 40%" />
				           <p>qptd54yp54jcjdrcdt7f0pd7ved5eym3tqvk7af0lx</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 0.001 BCH</p>
				           	
                               	<p><b>Note</b><br>Please only transfer bitcoin cash  to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>   
                                                               
                                                               <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#bch_withdrawal"><b>WITHDRAW</b></td>
                                                                
                                                                <div class="modal fade" id="bch_withdrawal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>BITCOIN CASH WITHDRAWAL</h4><hr>
                                                                             <form action="change_email.php" method="post">
                                                                             <div class="form-group " style="padding: 0% 12%">
								           
								                 <input class="form-control" type="text" name="volume" placeholder="Volume" >
								            </div>
								            <div class="form-group " style="padding: 0% 12%">
								                 
								                 <input class="form-control" type="text" name="destin_addr" placeholder="Destination Wallet Address" >
								            </div>
								             <input type="hidden" name="bitcoin_cash_value" value="<?php echo $bitcoin_cash_value; ?>" >
				           <p style="margin: 20px;">WITHDRAWAL FEES 0.001 BCH</p>
				           	
                               	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
                               	
                               	 
               

                                                                            </div>
                                                                             <div class="modal-footer w3-center">
                                                                             <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_bch">
                                                                             </div>
                                                                             </form>
                                                                        </div>
                                                                    </div>
                                                                <td style="color:#405149b; cursor: pointer;" class="" ><a href="trade?name=Litecoin&symbol=LTC"><b>TRADE</b></a></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/ltc_sm.png" style="width:10%; margin:0px 10px 0px 0px;">Litecoin </th>
                                                                <td><?php echo $litecoin_value; ?> LTC</td>
                                                                <td>$ <?php echo number_format($litecoin_value*$ltc_price, 2); ?></td>
                                                               
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#ltc_deposit"><b>DEPOSIT</b></td>
                                                   <div class="modal fade" id="ltc_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>LITECOIN DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=MFCYXxqWogMxAD54u6p3Dx5eAY7Ykuv5ju&choe=UTF-8" style="width: 40%" />
				           <p>MFCYXxqWogMxAD54u6p3Dx5eAY7Ykuv5ju</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 0.01 LTC</p>
				           	
                               	<p><b>Note</b><br>Please only transfer litecoin to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>                
                                                               
                                                               <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#ltc_withdrawal"><b>WITHDRAW</b></td>
                                                                
                                                      <div class="modal fade" id="ltc_withdrawal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>LITECOIN WITHDRAWAL</h4><hr>
                                                                             <form action="change_email.php" method="post">
                                                                             <div class="form-group " style="padding: 0% 12%">
								           
								                 <input class="form-control" type="text" name="volume" placeholder="Volume" >
								            </div>
								            <div class="form-group " style="padding: 0% 12%">
								                 
								                 <input class="form-control" type="text" name="destin_addr" placeholder="Destination Wallet Address" >
								            </div>
								             <input type="hidden" name="litecoin_value" value="<?php echo $litecoin_value; ?>" >
				           <p style="margin: 20px;">WITHDRAWAL FEES 0.01 LTC</p>
				           	
                               	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
                               	
                               	 
               

                                                                            </div>
                                                                             <div class="modal-footer w3-center">
                                                                             <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_ltc">
                                                                             </div>
                                                                             </form>
                                                                        </div>
                                                                    </div>
                                                                       <td style="color:#405149b; cursor: pointer;" class="" ><b>TRADE</b></td>       
                                                                   
                                                            </tr>
                                                                         </tr>
                                                            
                                                            
                                                           <!-- <tr>
                                                                <th scope="row"><img src="https://bitspay.co/files/assets/icon/cryptocoins/fx_sm.png" style="width:10%; margin:0px 10px 0px 0px;">FXCoin (FXC)</th>
                                                                <td>0.00000000 FXC</td>
                                                                <td>$ 0.00000000</td>
                                                               
                                                                <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#fxc_deposit"><b>DEPOSIT</b></td>
                                                                <div class="modal fade" id="fxc_deposit" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>FXCOIN DEPOSIT</h4><hr>
                                                                            <h6>Your Secure Wallet Address</h6>
                                                                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=0x7b81849834D3eC405c836E3098afD674e81657aCe&choe=UTF-8" title="Your FXCoin QR Code" style="width: 40%" />
				           <p>0xb122673e939d27feccb8456bdb7613747e284ee7</p>   	  			
				           <p>MINIMUM DEPOSIT LIMIT 0.5 AION</p>
				           	
                               	<p><b>Note</b><br>Please only transfer Aion tokens to this wallet address. Sending any others token may result into a loss and no wallet credit.</p>
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>   
                                                              
                                                               <td style="color:#405149b; cursor: pointer;" class="" data-toggle="modal" data-target="#fxc_withdrawal"><b>WITHDRAW</b></td>
                                                         <div class="modal fade" id="fxc_withdrawal" tabindex="-1" role="dialog">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content w3-center">
                                                                            
                                                                            <div class="modal-body">
                                                                            <h4>FXCOIN WITHDRAWAL</h4><hr>
                                                                             <div class="form-group " style="padding: 0% 12%">
								           
								                 <input class="form-control" type="password" name="old_password" placeholder="Volume" >
								            </div>
								            <div class="form-group " style="padding: 0% 12%">
								                 
								                 <input class="form-control" type="password" name="old_password" placeholder="Destination Wallet Address" >
								            </div>
				           <p style="margin: 20px;">WITHDRAWAL FEES 0.03 FXC</p>
				           	
                               	<p><b>Note</b><br>Please verify the destination wallet address. Once submitted, the withdrawal request cannot be reverted back.</p>
                               	
                               	 
               

                                                                            </div>
                                                                             <div class="modal-footer w3-center">
                                                                             <input class="btn btn-primary " type="submit" value="Submit" name="change_password">
                                                                             </div>
                                                                        </div>
                                                                    </div>       
                                                               
                                                               
                                                                
                                                                    
                                                                   
                                                                    
                                                            </tr>-->
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
