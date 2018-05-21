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
                   	
                   	$usd_value =$row['usd_value'];
                   	
                   }
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>USD Wallet | Bitspay </title>
   
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
  p{
	font-size: 17px
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
                                            <h4 class="m-b-10">USD Wallet</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">USD Wallet</a> </li>
                                            
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
						<button style="background :#405149; color: #fff; float: right; padding: 1% 4%; margin: 2%" class="btn" data-toggle="modal" data-target="#usd_withdrawal">Withdraw</button>
                                                <h4>USD Wallet</h4>
                                                <h6>Total Balance : $ <?php echo $usd_value; ?></h6>
                                                
                                                <!--modal-->
                                                <div class="modal fade" id="usd_withdrawal" tabindex="-1" role="dialog">
	                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content w3-center">
                                                    <div class="modal-body">
                                                    <h4>USD WITHDRAWAL</h4><hr>
                                                    <form action="change_email.php" method="post">
                                                     <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="text" name="volume" placeholder="Amount" required>
					            </div>
					            <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="text" name="remark" placeholder="Remark" required>
					            </div>
					            <input type="hidden" name="usd_value" value="<?php echo $usd_value; ?>" >
				           
				           	
			       	<p><b>Note</b><br>Withdrawal will be processed in 1 to 2 bank working days</p>
       						 </div>
                                                     <div class="modal-footer w3-center">
                                                     <input class="btn btn-primary " type="submit" value="Submit" name="withdraw_usd">
                                                     </div>
                                                     </form>
                                                </div>
                                            </div>
                                              <!-- modal ending -->  
                                            </div>
                                            <div class="card-block ">
                                            <h3>Deposit via Bank Transfer</h3>
                                                <div class="row">
                                                
                                                <div class="col-md-6" style="border-right: 1px solid #8c8c8c">
                                                <p>Bank account Details</p>
	                                                <div class="table-responsive">
	                                                 <table class="table w3-padding" >
	                                                        <tr>
	                                                        <td>Account Number</td>
	                                                        <td id="acc_no">331100100000416</td>
	                                                        
	                                                        
	                                                        </tr>
	                                                        <tr>
	                                                        <td>IFSC No.</td>
	                                                        <td>Account Number</td>
	                                                        
	                                                        </tr>
	                                                        <tr>
	                                                        <td>Accout Holder's Name</td>
	                                                        <td>Account Number</td>
	                                                        
	                                                        </tr>
	                                                        <tr>
	                                                        <td>Remark / Description</td>
	                                                        <td>Account Number</td>
	                                                        
	                                                        </tr>
	                                                   </table>
	                                                 </div>
	                                                
	                                        </div>
                                                 <div class="col-md-6">
                                                <p>IMPS Deposit Instruction</p>
	                                                <div class="table-responsive">
	                                                 <ol class="instructions">
							<li>The minimum deposit amount is ₹1,000.</li>
							<li>The transfer must be made from your linked bank account only.</li>
							<li>Enter your registered mobile number in the Remarks section.</li>
							<li>
							Once the transaction is successful, submit a deposit request by entering the exact amount and the
							<b>12 digit</b>
							Transaction Ref. Number.
							</li>
							<li>We will process your deposit request only after verification.</li>
							</ol>
	                                                 </div>
	                                                  <p>Transaction Fee (IMPS) : 0%</p>
	                                                 <button style="background :#405149; color: #fff; padding: 2% 6%; margin: 2%" class="btn" data-toggle="modal" data-target="#submit_request">Submit Deposit Request</button>
	                                                 
	                                                 <!--modal-->
                                                <div class="modal fade" id="submit_request" tabindex="-1" role="dialog">
	                                        <div class="modal-dialog" role="document">
                                                <div class="modal-content w3-center">
                                                    <div class="modal-body">
                                                    <h4>New Deposit Request</h4><hr>
                                                    <form action="change_email.php" method="post">
                                                     <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="text" name="amount" placeholder="Amount" required>
					            </div>
					            <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="date" name="date" placeholder="Transfer Date" required>
					            </div>
					            <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="password" name="reference" placeholder="Reference Number" required>
					            </div>
					            <div class="form-group " style="padding: 0% 12%">
					              <input class="form-control" type="text" name="confirm_reference" placeholder="Confirm Reference Number" required>
					            </div>
					            
				         
				           	
			       	<p style="font-size: 12px"><b>Note</b><br>It may take up to 1 Bank working day for a new deposit to reflect in the wallet.</p>
       						 </div>
                                                     <div class="modal-footer w3-center">
                                                     <input class="btn btn-primary " type="submit" value="Submit" name="deposit_request">
                                                     </div>
                                                     </form>
                                                </div>
                                            </div>
                                              <!-- modal ending -->
	                                                 
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
