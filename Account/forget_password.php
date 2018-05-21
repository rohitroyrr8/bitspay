<?php
		session_start();	
            
                if(isset($_POST['reset'])){
                
               
                    require('connection.php');
                    
                	
                	
                	$input_email =$_POST["loginUsername"];
                   
                     	 $current_date = date("Y-m-d h:i:sa");	
                       	 $hash = md5($current_date);
                
                    $query = "SELECT * FROM `users` WHERE email='$input_email'";
                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                    $count= mysqli_num_rows($result);
                    if($count==1){
                
	                 

                       	  
                       	  $query1 = "update `users` SET forget_identity='$hash' WHERE email='$input_email'";
                       	  if(mysqli_query($connection, $query1)){
                       	                         	
                       	     $to      = $input_email;
	                    $subject = 'Password Reset Requset';
	                    
	                    $reset_link = 'https://bitspay.co/Account/change_password.php?fid='.$hash;
	                    $message = "<html>
					<head>
					<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto' >
					<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css' crossorigin='anonymous'>
					<style> body{  font-family: 'Roboto', sans-serif;}</style>
					</head>
					<body>
					<div class='container' style='padding: 5%;  '>
					<div><img src='https://bitspay.co/images/logo.png'></div>
					
					
					<p style='font-size: 18px; color: #8c8c8c; margin-top: 5%;' >Hello ".$name.".<br><br>
					To reset your password please click on the button below. <br><br></p>
					
					<div style=' margin: 52px 0px !important; '>
					<a href=".$reset_link." style='background: #405149 ; color: white; padding: 10px 33px !important; text-decoration: none !important' class='btn'>Reset Password</a>
					
					</div> 

					<p style='font-size: 18px; color: #8c8c8c; margin-top: 5%;'>If you did not request this, please ignore this email.</p>
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
	                      
	
	                   	 mail($to, $subject, $message, $headers);

                                $_SESSION["msg"] = "We have sent you a mail to your registered email-address for reseting your password.";
                                header('Location: login.php');
                                
                            }
                            else{
                                        
		                         $_SESSION["error"] =  "Password reset request can't be processed right now. Please try after some time.";
		                         
		                        header('Location: forget_password.php');          	
                            }
                            
                	}else{
                		$_SESSION["error"] = "Sorry, No account found with that email-address";
					
					 header('Location: forget_password.php');            	
                	}   
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Password | Bitspay</title>
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
      <link rel="stylesheet" href="../files/assets/pages/waves/css/waves.min.css" type="text/css" media="all"><!-- feather icon --> <link rel="stylesheet" type="text/css" href="../files/assets/icon/feather/css/feather.css">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/themify-icons/themify-icons.css">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/icofont/css/icofont.css">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="../files/assets/icon/font-awesome/css/font-awesome.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css"><link rel="stylesheet" type="text/css" href="../files/assets/css/pages.css">
       <style>
      .login-block .auth-box{
      max-width: 400px;
      }
      .card .card-block{
      padding : 2.25rem;
      }
      .alert-danger{
       color: #fff;
       background: #c71a1a;
       border-color: transparent;
      }
      .alert-success{
       color: #fff;
       background: #405147;
       border-color: transparent;
      }
      </style>
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
            
              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        <form class="md-float-material form-material" method="post" action="#">
                            <div class="text-center">
                               <a href="../"><img src="../files/assets/images/bitspay.png" alt="logo.png" style="width:15%;"></a>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center">Forget Password</h3>
                                        </div>
                                    </div>
                                     <?php 
                 	
                 if(isset($_SESSION["msg"])){ ?>
                 <div style="text-align: center" class="alert alert-success w3-large w3-margin w3-padding-24" >
		               <?php echo $_SESSION["msg"]; ?>
		                </div> 
                 
                <?php 
                unset($_SESSION["msg"]);
                 } 
                  ?>

	 <?php 
                 	
                 if(isset($_SESSION["error"])){ ?>
                 <div style="text-align: center" class="alert alert-danger w3-large w3-margin w3-padding-24" >
		               <?php echo $_SESSION["error"]; ?>
		                </div> 
                 
                <?php 
                unset($_SESSION["error"]);
                 } 
                  ?>
                                    <div class="form-group form-primary">
                                        <input type="email"  class="form-control" name="loginUsername"  required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Your Email Address</label>
                                    </div>
                                   
                                   
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <input type="submit" style="background: #33f999; color: #fff" type="button" class="btn  btn-md btn-block waves-effect waves-light text-center m-b-20" name="reset" >
                                        </div>
                                    </div>
                                     
                                    <hr/>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="text-inverse text-left"><a href="https://bitspay.co/"><b>Back to website</b></a></p>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="../files/assets/images/auth/Logo-small-bottom1.png" alt="small-logo.png" style="float: right">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
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
<!-- modernizr js -->
<script type="text/javascript" src="../files/bower_components/modernizr/js/modernizr.js"></script>
<script type="text/javascript" src="../files/bower_components/modernizr/js/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="../files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="../files/assets/js/common-pages.js"></script>
</body>

</html>
