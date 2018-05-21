<?php
	 	session_start();
	 	 if(!isset($_SESSION['email'])){
			        header('Location: ../Account/login.php');
			    }
	 	    
	 	    if($_SESSION['email']=="admin"){
			    
		    	$_SESSION['user_type']="admin";
		    	 header("location: ../admin/index.php");	
		    }
		    
		    
		    if(isset($_POST['update_kyc'])){
		    
		     $name = $_POST['name'];
		    $sex = $_POST['sex'];
		    $city = $_POST['city'];
		    $pincode = $_POST['pincode'];
		    $id_type = $_POST['id_type'];
		    $id_card_no = $_POST['id_card'];
		    
		    $bank_name = $_POST['bank_name'];
		    $bank_branch = $_POST['bank_branch'];
		    $ifsc = $_POST['ifsc'];
		    $account_no = $_POST['account_no'];
		    $confirm_account_no = $_POST['confirm_account_no'];
		    $account_name = $_POST['account_name'];
		    $account_type = $_POST['account_type'];
		    
		    if($name=='' || $city=='' || $pincode==''|| $id_card_no=='' || $account_no=='' || $bank_name=='' || $ifsc==
		   ''){
		    
		      $_SESSION['error'] = " All fields are mandatory. Please try again";
			header('location: update_kyc.php') ;
		     exit;
		    }
		    if($account_no != $confirm_account_no){
		     $_SESSION['error'] = " Account mumber does not match. Please try again.";
			header('location: update_kyc.php') ;
		     exit;
		    }
		    
		    

		 $dir = "../Account/Docs/".$_SESSION["username"];
	        mkdir($dir);
	        $target_dir = "../Account/Docs/".$_SESSION["username"]."/";
	        $target_file1 = $target_dir ."id_card.jpg";
	        $target_file2 = $target_dir ."bank_statement.jpg";
	        $target_file4 = $target_dir ."photo.jpg";
	        $uploadOk = 1;
	        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	        
	        
	        // Check if $uploadOk is set to 0 by an error
	        if ($uploadOk == 0) {
	            echo "Sorry, your file was not uploaded.";
	        // if everything is ok, try to upload file
	        } else {
	           if (move_uploaded_file($_FILES["img_id_card"]["tmp_name"], $target_file1)&&move_uploaded_file($_FILES["img_photo"]["tmp_name"], $target_file4)&&move_uploaded_file($_FILES["img_bank"]["tmp_name"], $target_file2)) {

	     	   
		    $date = Date('Y-m-d');
		    $email = $_SESSION['email'];
		    
		      require('connection.php');
           
                            
                           
                            $sql = "INSERT INTO kyc_status ( email, id_no, id_type, city, sex, zipcode, img_id, img_photo, date_applied, date_updated, bank_name, bank_branch, ifsc, account_no, account_type, account_name, img_bank)
						VALUES ('$email', '$id_card_no', '$id_type', '$city', '$sex', '$pincode ', 'id_card.jpg', ' photo.jpg', '$date', '$date', '$bank_name', '$bank_branch', '$ifsc', '$account_no', '$account_type', '$account_name', 'bank_statement.jpg');";
                            
                            if ($connection->query($sql) === TRUE) {
                            
                           $_SESSION['msg'] =  "Your kyc update has been processed successfully . Wait for 48 hours to complete the process";
			 header('location: update_kyc.php');
			 exit;
                            }else {
					   $_SESSION['error'] = " It seems that your KYC request is already under review. We will send you update regarding your KYC as soon as possible.";
					  header('location: update_kyc.php');
					 exit;
					}
                            
		   
		    
		    
		    }
		    
		    }
		     $_SESSION['error'] = " There is some problem while uploading your documents. Please try again later";
		     header('location: update_kyc.php');
		     exit;
		    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Your KYC </title>
         <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Able Pro 7.0 Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
      <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
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
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!--forms-wizard css-->
      <link rel="stylesheet" type="text/css" href="../files/bower_components/jquery.steps/css/jquery.steps.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
      <link rel="stylesheet" type="text/css" href="../files/assets/css/pages.css">
      <!-- jpro forms css -->
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/j-pro/css/demo.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/j-pro/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="../files/assets/pages/j-pro/css/j-pro-modern.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .btn-primary:hover
    {
      background-color: #405149 !important;
      border-color: #405149 !important;
    }
    </style>

  </head>


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
                                <li class="active">
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
                         
                  <div class="pcoded-content">
                      <!-- [ breadcrumb ] start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                      
                                          <h4 class="m-b-10">Update KYC</h4>
                                      </div>
                                      <ul class="breadcrumb">
                                          <li class="breadcrumb-item">
                                              <a href="index.html">
                                                  <i class="feather icon-home"></i>
                                              </a>
                                          </li>
                                          <li class="breadcrumb-item">
                                              <a href="#!">KYC Update</a>
                                          </li>
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
                                            <div class="col-sm-12">
                                                <!-- Job application card start -->
                                                <div class="card">
                                                    
                                                    <div class="card-block">
                                                    <h4 style="color: #405149">Know Your Customer Form</h4>
                                                    <h5 style="color: #8c8c8c">Your personal information is never shown to other users.</h5>
                                                    
                                                      <?php if(isset($_SESSION["msg"])){ ?>
	                                            <div id="msg" class="alert " style="background: #405149; color: white; padding: 19px; margin: 25px; font-size: 18px">
		                                    	<i class="feather icon-info"></i> <?php echo $_SESSION["msg"]; ?>
		                                    	</div>
		                                     <?php  unset($_SESSION["msg"]);    }      ?>	
		                                     
		                                      <?php if(isset($_SESSION["error"])){ ?>
	                                            <div id="msg" class="alert " style="background: #a2071de3; color: white; padding: 19px; margin: 25px; font-size: 18px">
		                                    	<i class="feather icon-alert-circle"></i> <?php echo $_SESSION["error"]; ?>
		                                    	</div>
		                                     <?php  unset($_SESSION["error"]);    }      ?>
		                                     
					                                                        <div class="j-wrapper j-wrapper-640">
                                                            <form action="#" method="post" class="j-pro" id="j-pro" enctype="multipart/form-data" novalidate>
                                                                <!-- end /.header-->
                                                                <div class="j-content">
                                                                  <label style="margin: 3%; font-weight: bold">Personal Details </label>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="first_name">
                                                                                    <i class="icofont icofont-ui-user"></i>
                                                                                </label>
                                                                                <input type="text"  name="name" placeholder="Name" class="w3-required">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                       <div class="j-span6 j-unit">
                                                                        <label class="j-input j-select">
                                                                            <select name="sex">
                                                                               
                                                                                <option value="Male">Male</option>
                                                                                <option value="Female">Female</option>
                                                                                <option value="Others">Others</option>
                                                                            </select>
                                                                            <i></i>
                                                                        </label>
                                                                    </div>
                                                                   
                                                          
                                                                   
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="email">
                                                                                    <i class="icofont icofont-envelope"></i>
                                                                                </label>
                                                                                <input placeholder="City" type="text"  name="city" id="target2">
                                                                            </div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="phone">
                                                                                    <i class="icofont icofont-phone"></i>
                                                                                </label>
                                                                                <input type="text" placeholder="Zipcode" id="target3" name="pincode">
                                                                                <span class="j-tooltip j-tooltip-right-top">Zipcode</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                        <label class="j-input j-select">
                                                                            <select name="id_type">
                                                                              
                                                                                <option value="Passport">Passport</option>
                                                                                <option value="Driving Licence">Driving Licence</option>
                                                                                <option value="others">any Natinoal ID Card</option>
                                                                            </select>
                                                                            <i></i>
                                                                        </label>
                                                                    </div>
                                                                   
                                                                
                                                                 
                                                                   
                                                                    <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="phone">
                                                                                    <i class="icofont icofont-phone"></i>
                                                                                </label>
                                                                                <input type="text" placeholder="Identity Card No." id="target4" name="id_card">
                                                                                <span class="j-tooltip j-tooltip-right-top">Identity Card Number</span>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                     <div class="j-span6 j-unit">
                                                                            <div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input type="file" id="file2" name="img_id_card" onchange="document.getElementById('file2_input').value = this.value;" id="target5">
                                                                                </div>
                                                                                <input type="text" id="file2_input" readonly="" placeholder="Identity Card">
                                                                                <span class="j-hint">Only: doc / docx / xls /xlsx, less 1Mb</span>
                                                                            </div>
                                                                        </div>
                                                                   
                                                                  
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input id="target6" type="file" name="img_photo" onchange="document.getElementById('file1_input').value = this.value;">
                                                                                </div>
                                                                                <input type="text" id="file1_input" readonly="" placeholder="Photograph">
                                                                                <span class="j-hint">Only: doc / docx / xls /xlsx, less 1Mb</span>
                                                                            </div>
                                                                        </div>
                                                                       
                                                                
                                                                   <label style="margin: 3%; font-weight: bold">Bank Details </label>
                                                                   
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="email">
                                                                                    <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input placeholder="Bank Name" type="text"  name="bank_name" >
                                                                            </div>
                                                                        </div>
                                                                        
                                                                         <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="email">
                                                                                    <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input placeholder="Bank Branch" type="text"  name="bank_branch" >
                                                                            </div>
                                                                        </div>
                                                                         <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="email">
                                                                                   <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input placeholder="IFSC" type="text"  name="ifsc" >
                                                                            </div>
                                                                        </div>
                                                                         <div class="j-span6 j-unit">
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="email">
                                                                                   <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input placeholder="Account Holder's Name" type="text"  name="account_name" >
                                                                            </div>
                                                                        </div>
                                                                        
                                                                   
                                                                
                                                                 
                                                                    
                                                                    <div class="j-span6 j-unit">
                                                                    
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="phone">
                                                                                   <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input type="password" placeholder="Account Number" name="account_no" required >
                                                                            </div>
                                                                        </div>
                                                                        <div class="j-span6 j-unit">
                                                                    
                                                                            <div class="j-input">
                                                                                <label class="j-icon-right" for="phone">
                                                                                   <i class="icofont icofont-bank-alt"></i>
                                                                                </label>
                                                                                <input type="text" placeholder="Confirm Account Number" name="confirm_account_no" >
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <label id="alert" style="margin: 3%; color: red; font-size: 11px"></label>
                                                                        <div class="j-span6 j-unit">
                                                                        <label class="j-input j-select">
                                                                            <select name="account_type">
                                                                              
                                                                                <option value="Savings">Savings</option>
                                                                                <option value="Current">Current</option>
                                                                                <option value="Others">Others</option>
                                                                            </select>
                                                                            <i></i>
                                                                        </label>
                                                                    </div>
                                                                        <div class="j-span6 j-unit">
                                                                            <div class="j-input j-append-small-btn">
                                                                                <div class="j-file-button">
                                                                                    Browse
                                                                                    <input type="file" id="file2" name="img_bank" onchange="document.getElementById('file3_input').value = this.value;" id="target6">
                                                                                </div>
                                                                                <input type="text" id="file3_input" readonly="" placeholder="Bank Passbook/ Statement" >
                                                                                <span class="j-hint">Only: doc / docx / xls /xlsx, less 1Mb</span>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                                
                                                                <!-- end /.content -->
                                                                <div class="j-footer">
                                                                    <button id="sbtbtn" type="submit" class="btn btn-primary" name="update_kyc">Submit</button>
                                                                    <button type="reset" class="btn btn-default m-r-20">Reset</button>
                                                                </div>
                                                                <!-- end /.footer -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Job application card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main-body end -->
 
        </div>
    </div>
        </div>
    </div>
    
    <!--  <script>
    function validation(){
    
    var acc1 = document.getElementById("acc_1").value;
    var acc2 = document.getElementById("acc_2").value;
    if(acc1 != acc2){
   	 document.getElementById("alert").innerHTML = "Account Number does not match"; 
    }
    else {
   		 document.getElementById("alert").style.display='none';  
    }
    
    }
    
    
    </script> -->
    
    


<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="../files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="../files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="../files/bower_components/bootstrap/js/bootstrap.min.js"></script>
<!-- waves js -->
<script src="../files/assets/pages/waves/js/waves.min.js"></script>
<!-- j-pro js -->
<script type="text/javascript" src="../files/assets/pages/j-pro/js/jquery.ui.min.js"></script>
<script type="text/javascript" src="../files/assets/pages/j-pro/js/jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="../files/assets/pages/j-pro/js/jquery.j-pro.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="../files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>


<script src="../files/assets/js/pcoded.min.js"></script>
<script src="../files/assets/js/vertical/vertical-layout.min.js"></script>
<script src="../files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="../files/assets/js/script.js"></script>
</body>

</html>
