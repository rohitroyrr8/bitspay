<?php

	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Withdrawal History | Bitspay </title>
   
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
     <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
     <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
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
                            <li class="header-notification">
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
                            </li>
                           
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
                                            <a href="auth-lock-screen">
                                            <i class="feather icon-lock"></i> Lock Screen

                                        </a>
                                        </li>
                                        <li>
                                            <a href="logout">
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
                                            <a href="user-profile.html">
                                            <i class="feather icon-user"></i>View Profile
                                        </a>
                                            <a href="#!">
                                            <i class="feather icon-settings"></i>Settings
                                        </a>
                                            <a href="auth-normal-sign-in.html">
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
                                            <span class="pcoded-mtext">Balance</span>
                                        </a>
                                        </li>
                                        <li class="">
                                            <a href="trade_history" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Deposit</span>
                                        </a>
                                        </li>
                                        <li class="">
                                            <a href="trade_history" class="waves-effect waves-dark">
                                            <span class="pcoded-mtext">Withdraw</span>
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
                                            <a href="trade_history" class="waves-effect waves-dark">
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
                                    <a href="trade_history" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-share"></i>
									</span>
                                    <span class="pcoded-mtext">Send/Recieve</span>
                                </a>
                                </li>
                                 <li class="">
                                    <a href="trade_history" class="waves-effect waves-dark">
									<span class="pcoded-micon">
										<i class="feather icon-share"></i>
									</span>
                                    <span class="pcoded-mtext">Buy/ Sell</span>
                                </a>
                                </li>
                               
                                <li class="">
                                    <a href="trade_history" class="waves-effect waves-dark">
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
                                            <h4 class="m-b-10">Withdrawal</h4>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html">
                                                    <i class="feather icon-home"></i>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Withdrawal History</a> </li>
                                            
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
                                      
                                             <!-- Alternative Pagination table start -->
                                                <div class="card">
                                                    <div class=" card-header">
                                                       
                                                    <div class="card-block ">
                                                       <div class="row">
                                                       <div class="col-md-12">
                                                        <div class="dt-responsive table-responsive">
                                                            <table id="alt-pg-dt" class="table table-striped table-bordered nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Date</th>
                                                                        
                                                                        <th>Volume</th>
                                                                       <th>Currency</th>
                                                                        <th>Reference No.</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>26 Mar 2018</td>
                                                                        <td>0.0034</td>
                                                                        <td>Ethereum</td>
                                                                        
                                                                        <td>34534</td>
                                                                        <td>Completed</td>
                                                                    </tr>
                                                                   <tr>
                                                                        <td>26 Mar 2018</td>
                                                                        <td>0.0034</td>
                                                                        <td>Bitcoin</td>
                                                                        
                                                                        <td>34534</td>
                                                                        <td>Completed</td>
                                                                    </tr>  
                                                                    <tr>
                                                                        <td>26 Mar 2018</td>
                                                                        <td>0.0034</td>
                                                                        <td>Bitcoin</td>
                                                                        
                                                                        <td>34534</td>
                                                                        <td>Pending</td>
                                                                    </tr>
                                                                   
                                                                </tbody>
                                                              
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <!-- Alternative Pagination table end -->
						</div>
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
    <!-- Custom js -->
<script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
<script src="../files/assets/js/pcoded.min.js"></script>
<script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../files/assets/js/script.js"></script>
	    <!-- data-table js -->
	<script src="../files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
	<script src="../files/assets/pages/data-table/js/jszip.min.js"></script>
	<script src="../files/assets/pages/data-table/js/pdfmake.min.js"></script>
	<script src="../files/assets/pages/data-table/js/vfs_fonts.js"></script>
	<script src="../files/bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
	<script src="../files/bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
	<script src="../files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
</body>

</html>