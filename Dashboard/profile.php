<?php

			 session_start();
	  
		  	if(!isset($_SESSION['email'])){
			        header('Location: ../Account/login.php');
			    }
			    
			    
			    $name = $_SESSION['username'];
			    $phone = $_SESSION['phone'];
			    $dob = $_SESSION['dob'];
			    
		require('connection.php');
		    $email_address= $_SESSION["email"];
		    $query = "SELECT * FROM `kyc_status` WHERE email='$email_address'";
                    
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
	                   
                            
                            $id_no = $row['id_no'];
                            $id_type = $row['id_type'];
                            $sex = $row['sex'];
                            $zipcode = $row['zipcode'];
                            $city = $row['city'];
                            $status = $row['status'];
                            $date_applied = $row['date_applied'];
                            $date_updated = $row['date_updated']; 
                            
                            $bank_name = $row['bank_name']; 
                            $bank_branch = $row['bank_branch']; 
                            $ifsc = $row['ifsc']; 
                            $account_no = $row['account_no']; 
                            $account_name = $row['account_name']; 
                            $account_type = $row['account_type']; 
                       
                    } 	    
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Profile | Bitspay </title>
    
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
                                            <li class="breadcrumb-item"><a href="#!">Profile</a> </li>
                                            
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
                                                    
                                                    <div class="card-block">

                                          <!-- Row start -->
                                                        <div class="row m-b-30">
                                                            <div class="col-md-12 col-sm-12">
                                                                
                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="feather icon-user" style="font-size: 20px; "></i> Personal Details</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="feather icon-file-text" style="font-size: 20px; "></i> KYC Details</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                  <li class="nav-item">
                                                                        <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-university" style="font-size: 20px; "></i> Bank Details</a>
                                                                        <div class="slide"></div>
                                                                    </li>
                                                                   
                                                                </ul>
                                                                <!-- Tab panes -->
                                                                <div class="tab-content card-block">
                                                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                                                       <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-12 ">
                                                                                        <div class="table-responsive w3-center ">
                                                                                            <table class="table m-0" >
                                                                                                <tbody class="">
                                                                                                 <tr>
                                                                                                        <th scope="row">Bitspay Unique ID</th>
                                                                                                        <td><b><?php echo $_SESSION['id']; ?></b></td>
                                                                                                    </tr> 
                                                                                                    <tr>
                                                                                                        <th scope="row"> Name</th>
                                                                                                        <td style="text-transform: uppercase;"><?php echo $_SESSION['username']; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Email</th>
                                                                                                        <td><?php echo $_SESSION['email']; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Mobile Number</th>
                                                                                                        <td><?php echo $_SESSION['phone']; ?></td>
                                                                                                    </tr>
                                                                                                   
                                                                                                    <tr>
                                                                                                        <th scope="row">Birth Date</th>
                                                                                                        <td><?php echo $_SESSION['dob']; ?></td>
                                                                                                    </tr>
                                                                                                   
                                                                                                    <tr>
                                                                                                        <th scope="row">Country</th>
                                                                                                        <td><?php echo $_SESSION['country']; ?></td>
                                                                                                    </tr>
                                                                                                    
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->

                                                                    </div>
                                                                    <div class="tab-pane" id="profile3" role="tabpanel">
                                                                       <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-12 ">
                                                                                        <div class="table-responsive w3-center ">
                                                                                           <?php if(!isset($id_no)){  ?>
                                                                                           	<p style="background:  #405147;color: white;padding: 2%;border-radius: 5px;font-size: 20px;"><i class="icon feather icon-alert-triangle  " style="color: #33f999"></i> Please update yout KYC to start trading on Bitspay</p>
                                                                                           <?php      } else {  ?>
                                                                                           <table class="table m-0" >
                                                                                                <tbody class="">
                                                                                                   
                                                                                                    <tr>
                                                                                                        <th scope="row">Name</th>
                                                                                                        <td><?php echo $name; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Identity Card Number</th>
                                                                                                        <td><?php echo $id_no; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Identity Card</th>
                                                                                                        <td><?php echo $id_type; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">City</th>
                                                                                                        <td><?php echo $city; ?></td>
                                                                                                    </tr>
                                                                                                   
                                                                                                    <tr>
                                                                                                        <th scope="row">Zipcode</th>
                                                                                                        <td><?php echo $zipcode; ?></td>
                                                                                                    </tr>
                                                                                                                                                                                                        <tr>
                                                                                                        <th scope="row">Status</th>
                                                                                                        <td><b><?php echo $status; ?></b></td>
                                                                                                    </tr>
                                                                                                    
                                                                                                     <tr>
                                                                                                        <th scope="row">KYC Applied</th>
                                                                                                        <td><?php echo $date_applied; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">KYC Updated</th>
                                                                                                        <td><?php echo $date_updated; ?></td>
                                                                                                    </tr>
                                                                                                    
                                                                                                </tbody>
                                                                                            </table>
                                                                                            <?php     }  ?>
                                                                                            
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                    </div>
                                                                    
                                                                    <div class="tab-pane" id="settings3" role="tabpanel">
                                                                        <div class="general-info">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12 col-xl-12 w3-margin ">
                                                                                        <div class="table-responsive w3-center ">
                                                                                        <?php if(!isset($id_no)){  ?>
                                                                                           	<p style="background:  #405147;color: white;padding: 2%;border-radius: 5px;font-size: 20px;"><i class="icon feather icon-alert-triangle  " style="color: #33f999"></i> Please update yout KYC to start trading on Bitspay</p>
                                                                                           <?php      } else {  ?>
                                                                                            <table class="table m-0">
                                                                                                <tbody class="w3-center">
                                                                                                    <tr>
                                                                                                        <th scope="row"> IFSC Code</th>
                                                                                                        <td><?php echo $ifsc; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Bank Name</th>
                                                                                                        <td><?php echo $bank_name; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Branch Name</th>
                                                                                                        <td><?php echo $bank_branch; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Account No.</th>
                                                                                                        <td><?php echo $account_no; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Account Holder's Name</th>
                                                                                                        <td><?php echo $account_name; ?></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <th scope="row">Account Type</th>
                                                                                                        <td><?php echo $account_type; ?></td>
                                                                                                    </tr>
                                                                                                   
                                                                                                   
                                                                                                </tbody>
                                                                                            </table>
                                                                                             <?php     }  ?>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p><b>Note:</b> This bank account will be linked to your Bitspay account. All transactions will be processed for only the linked bank account.</p>
                                                                                    <!-- end of table col-lg-6 -->
                                                                                    
                                                                                </div>
                                                                                <!-- end of row -->
                                                                            </div>
                                                                            <!-- end of general info -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                        <!-- Row end -->
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
