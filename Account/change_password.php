<?php
			session_start();
			
			require('connection.php');
                  		$identity = $_GET["fid"]; ;
                  		$query = "SELECT * FROM `users` WHERE forget_identity='$identity'";
		                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
		                    $count= mysqli_num_rows($result);
		                    if($count==1){
		                    
		                    	 $_SESSION['msg']= "Create a new password .";
		                    
		                    }else{
                             		 $_SESSION['error']= "Sorry, this link has been expired";
                  			 header('Location: login.php');  
                  			exit;
                            }
			
                    	
                    
                  	if(isset($_POST["reset"])){
                  	
                  		$current_id = $_POST["input_reset_link"];
                  		$new_password = $_POST["password"];
                  		$confirm_password = $_POST["confirm_password"];
                  		
                  		if($new_password != $confirm_password){
                  		
                  			
                  			$_SESSION['error']= 'Password does not match . Please try again';
                  			 header('Location: login.php');  
                  			exit;
                  			
                  		}
                  		
                  		
                  		
                  		$encrypt_password = sha1($new_password);

                  		$query1 = "update `users` SET Password='$encrypt_password' WHERE forget_identity = '$current_id'";
                       	  if(mysqli_query($connection, $query1)){    

   
   				  $_SESSION['msg']=  "You have successfully change your password. <br> Login now";
                  			 header('Location: login.php');  
                  			exit;
	                       exit;
                            }else{
                           
                            	
	                        $_SESSION['error']= "Sorry, this link has been expired";
                  			 header('Location: login.php');  
                  			exit;
                            } 
                            
                            
                            
		 
               }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset Password | Bitspay</title>
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
       border-color: none;
      }
      .alert-success{
       color: #fff;
       background: #405147;
       border-color: transparent ;
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
                                            <h3 class="text-center">Reset Password</h3>
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
                                        <input type="password"  class="form-control" name="password"  required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">New Password</label>
                                    </div>
                                   <div class="form-group form-primary">
                                        <input type="text"  class="form-control" name="confirm_password"  required>
                                        <span class="form-bar"></span>
                                        <label class="float-label">Confirm Password</label>
                                    </div>
                                    <input type="hidden" name="input_reset_link" value="<?php echo $_GET["fid"]; ?>">
                                   
                                    <div class="row m-t-30">
                                        <div class="col-md-12">
                                            <input type="submit" style="background: #33f999; color: #fff" type="button" class="btn  btn-md btn-block waves-effect waves-light text-center m-b-20" name="reset" value="Reset">
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
