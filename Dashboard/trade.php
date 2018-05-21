<?php

			 session_start();
	  
		  	if(!isset($_SESSION['email'])){
			        header('Location: ../Account/login.php');
			    }
			    
			   
	                    if(!$_GET['symbol']){
	                    	$symbol = 'ETH';
	                    	$name = 'Ethereum';
	                    }else{
	                    	$symbol = $_GET['symbol'];
	                    	$name = $_GET['name'];
	                    }
                    
                    
			    $url= 'https://min-api.cryptocompare.com/data/price?fsym='.$symbol.'&tsyms=USD';
		 	    $str = file_get_contents($url);
			    $json = json_decode($str, true);
			    $price = $json['USD'];
	                   	
  			    require('connection.php');
              		    $email = $_SESSION['email'];                   	
                   	    $query = "SELECT * FROM `user_portfolilo` WHERE email='$email'";
                    
                            $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
	                    $row = mysqli_fetch_assoc($result);
	                    if($row){
	                   	$coin_balance = ucfirst($symbol)."_value";
	                   	$crypto_balance =$row[$coin_balance];
                   		$usd_balance = $row['usd_value'];
	                    }
	                    
	                    
	                    
	                    
	              
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>Trade | Bitspay </title>
    
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
   
   
  
   i.cc:hover { color: #0060BD; transform: rotate(-20deg); transform-origin: 0.49em 0.7em; }
   
  	a : hover{
  	color: blue !important;
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
                    </nav>  <!-- [ navigation menu ] end -->
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
                                            <li class="breadcrumb-item"><a href="#!">Trade</a> </li>
                                            
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
                                            	<h2>Trade <?php echo $name; ?></h2>
                                            	<h4>Last Traded Price: $ <?php echo $price ; ?></h4>
                                            	<div class="row">
						<div class="col-md-6" style="padding: 1% 5%; border-right: 1.5px solid #edf0f5;">
						<h3>Buy <?php echo $name ; ?></h3>
                                            	
                                            	<form action="trade_coins" method="post">
                                            	<p>USD Balance: $ <?php echo number_format($usd_balance, 2); ?></p>
        					<div class="form-group label-floating">
        					
                                           	<input id="volume" class="form-control" type="text" name="volume" placeholder="Volume" oninput="temperatureConverter()" onchange="temperatureConverter()" required>
     						 </div>
     						 <div class="form-group label-floating">
                                           	<input id="price_per_unit" class="form-control" type="text" name="price_per_unit" placeholder="Price Per <?php echo $symbol; ?>" oninput="temperatureConverter()" onchange="temperatureConverter()" required>
     						 </div>
     						  <div class="form-group label-floating">
                                           	<input class="form-control" type="text"   id="fee"  placeholder="Amount inclusive Fee" disabled>
     						 </div>
     						 
     						 <input  type="hidden" value="<?php echo $usd_balance; ?>" name="usd_balance">
     						 <input  type="hidden" value="<?php echo $symbol; ?>" name="symbol">
     						 <input  type="hidden" value="<?php echo $name; ?>" name="name">
     						 <div class="form-group" style=" margin-top-40px" > 
					                <input class="btn" style="background: #405149; color: white; padding: 10px 50px;" type="submit" value="Buy" name="buy_token">
					              </div>
     					      </form>

						</div>
						<div class="col-md-6" style="padding: 1% 5%">
						<h3>Sell <?php echo $name ; ?></h3>
                                            	
                                            	<form action="trade_coins" method="post">
                                            	<p><?php echo $symbol; ?> Balance: <?php echo number_format($crypto_balance, 4); ?> <?php echo $symbol; ?></p>
        					<div class="form-group label-floating">
                                           	<input class="form-control" type="text" name="volume" placeholder="Volume" required id="sell_volume" oninput="sell_order()" onchange="sell_order()" >
     						 </div>
     						 <div class="form-group label-floating">
                                           	<input class="form-control" type="text" name="price_per_unit" placeholder="Price Per <?php echo $symbol; ?>"  oninput="sell_order()" onchange="sell_order()" required id="sell_price_per_unit">
     						 </div>
     						  <div class="form-group label-floating">
                                           	<input class="form-control" type="text" id="selling_fee" placeholder="Amount inclusive Fee" disabled>
     						 </div>
     						
     						<input  type="hidden" value="<?php echo $crypto_balance; ?>" name="crypto_balance">
     						 <input  type="hidden" value="<?php echo $symbol; ?>" name="symbol">
     						 <input  type="hidden" value="<?php echo $name; ?>" name="name">
     						 
     						 <div class="form-group" style=" margin-top-40px" > 
					                <input class="btn " style="background: #405149; color: white; padding: 10px 50px;" type="submit" value="Sell" name="sell_token">
					              </div>
     					      </form>
						</div>
                                  		</div>
                                           </div>
                                           </div>
						<div class="page-body">
							 <div class="row">
		                                            <div class="col-sm-12">
		                                              
		                                                <!-- Default ordering table start -->
		                                                <div class="card">
		                                                    <div class="card-header">
		                                                        <h3>Your Open Order</h3>
		                                                       
		                                                    </div>
                                                    		<div class="card-block">
                                                    			<div class="dt-responsive table-responsive">
                                                    			    <table id="order-table" class="table nowrap">
                                                    			    	<tr>
	                                                                        <th>Date</th>
	                                                                        <th>Coin</th>
	                                                                        <th>TYPE</th>
	                                                                        <th>Volume</th>
	                                                                        <th>Price per Unit ($)</th>
	                                                                        <th>Total Price ($)</th>
	                                                                        
	                                                                  	  </tr>
	                                                                  	  <tbody>
                                                               
                                                                    	 <?php
                                                                	require('connection.php');
                                                                	$email = $_SESSION['email'];
                                                                	//$sql ="Select * from order_book where email = '$email' and coin= '$symbol' and trade_id not in (select trade_id from order_book where trade_id not null) ";
                                                                	
                                                                	$sql ="select * from order_book where email = '$email' and coin= '$symbol' and trade_id = ''";
                                                                	$result= mysqli_query($connection, $sql) or die(mysqli_error($connection));
	                   
						                            if ($result->num_rows > 0) {
						                                // output data of each row
						                                while($row = $result->fetch_assoc()) {
						                                 ?>
		                                                                <tr>
		                                                                    <td><?php echo $row["date"];  ?></td>
					                                             <td><?php echo $row["coin"];  ?></td>
					                                              <td><?php echo $row["type"];  ?></td>
					                                              <td><?php echo $row["volume"];  ?></td>
					                                              <td><?php echo $row["price_per_unit"];  ?></td>
					                                              <td><?php echo $row["total"];  ?></td>
					                                            
		                                                                </tr>
		                                                             <?php  } }else{ ?>
                                                                    
                                                                   		<tr>No records found</tr>
                                                                    		<?php  }  ?>
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
    
   <script>
function temperatureConverter() {

  var volume = document.getElementById("volume").value ;
  var price_per_unit = document.getElementById("price_per_unit").value ;
  
  document.getElementById("fee").value = volume*price_per_unit + volume*price_per_unit*0.0025 ;
}
    </script>
    
    <script>
function sell_order() {

  var volume = document.getElementById("sell_volume").value ;
  var price_per_unit = document.getElementById("sell_price_per_unit").value ;
  
  document.getElementById("selling_fee").value = volume*price_per_unit - volume*price_per_unit*0.0025 ;
}
    </script>
    <!-- Required Jquery -->
    <script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
    <script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
    <!-- waves js -->
    <script src="../files/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
  
    
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
	<!-- Custom js -->
	<script src="../files/assets/pages/data-table/js/data-table-custom.js"></script>
	<script src="../files/assets/js/pcoded.min.js"></script>
	<script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
	<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="../files/assets/js/script.js"></script>
	</body>


</html>
