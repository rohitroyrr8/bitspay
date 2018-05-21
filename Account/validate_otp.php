<!DOCTYPE html>
<html>
   <title>Authenicate | Bitspay</title>
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
      max-width: 450px;
      }
      .card .card-block{
      padding : 2.25rem;
      }
      </style>
  </head>
    
    
    
  <body themebg-pattern="theme1">
    
            <?php 
                    session_start();

                    if(isset($_SESSION["data"])){
                         require('connection.php');
                        $entered_code = $_POST["pin"];
                        $email_address= $_SESSION["data"];
                        $query = "SELECT * FROM `users` WHERE email='$email_address'";

	                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
	                   
	                    $row = mysqli_fetch_assoc($result);
	                   if($row){
	                   	
	                   	
	                        $google_auth_code = $row['google_auth_code'];
	                        if($google_auth_code == ""){
	                            
	                             require('client_addr.php');
	                             require('current_location.php');
	                             
	                            
	                             $source = $obj->showInfo('browser');
	                             $ip = $obj->getRealIpAddr();
	                             $os =$obj->showInfo('os');;
	                             $location = ip_info($ip, "Address");
	                             
	                            $timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
				   $date = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
	                        	
	                             require('connection.php');
	                             $sql = "INSERT INTO login_log (action, email, source,  ip , os, location, date )
                         	     VALUES ('Login', '$email_address', '$source', '$ip', '$os', '$location', '$date' );";
                            
                            
	                            if ($connection->query($sql) === TRUE) {
	                            
	                            
	                             $_SESSION["email"]= $email_address;
	                             header("Location: ../Dashboard/");
	                            
	                            }else{
	                            	echo $connection->error;
	                            	
	                            }
	                        
	                        }
	                   }
                       
                    }
                    else{
                   
                   	header('location: login');
                   }
                   
                   if(isset($_POST["validate"])){
                        require('connection.php');
                        $entered_code = $_POST["pin"];
                        $email_address= $_SESSION["data"];
                        $query = "SELECT * FROM `users` WHERE email='$email_address'";

                    $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
                   
                    $row = mysqli_fetch_assoc($result);
                   if($row){
                        $google_auth_code = $row['google_auth_code'];
                        
                   }
                       
                    require_once( 'qr_generator/vendor/autoload.php' );

                    require_once( 'qr_generator/vendor/PHPGangsta/GoogleAuthenticator.php' );

                    $autenticador = new GoogleAuthenticator();
                       
                   $resultado = $autenticador->verifyCode( $google_auth_code, $entered_code, 0 );

                    if( $resultado ){
                    
            		     require('client_addr.php');
                             require('current_location.php');
                             
                            
                             $source = $obj->showInfo('browser');
                             $ip = $obj->getRealIpAddr();
                             $os =$obj->showInfo('os');;
                             $location = ip_info($ip, "Address");
                             
                              $timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
				   $date = gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
	                        	
                             require('connection.php');
                             $sql = "INSERT INTO login_log (action, email, source,  ip , os, location, date )
                 	     VALUES ('Login', '$email_address', '$source', '$ip', '$os', '$location', '$date' );";
                    
                    
                            if ($connection->query($sql) === TRUE) {
                            
                            }else{
                            	echo $connection->error;
                            	
                            }
	                            
                           $_SESSION["email"]= $email_address;
                        header("Location: ../Dashboard/index");

                    }else{
			
                        $_SESSION["msg"]="Incorect 6-digit PIN";
                        header("Location: validate_otp");

                    }

                    
                }
            else{  ?>
    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    
                        
                            <div class="text-center">
                                <a href="../"><img src="../files/assets/images/bitspay.png" alt="logo.png" style="width:15%;"></a>
                            </div>
                            <div class="auth-box card">
                                <div class="card-block">
                                    <div class="row m-b-20">
                                        <div class="col-md-12">
                                            <h3 class="text-center" style="color: #8c8c8c">Authenticator  </strong><span> PIN</span></h3>
                                            <p>Enter your 6-digit pin generated through Google Authenticator App. to login securely into your account. <br><br><b>Don't share your 6-digit pin to anyone</b> </p>
                                        </div>
                                    </div>
          
              
            
           
			                <?php if(isset($_SESSION["msg"])){  ?>
			         <div style="" class="alert alert-danger w3-large w3-margin w3-padding-24" >
			                <?php echo $_SESSION["msg"]; ?>
			                </div>   
			       <?php      unset($_SESSION["msg"]);
			         } ?>
		            <form id="login-form" method="post" action="validate_otp.php">
		            
		              <div class="form-group form-primary">
			              <div class="input-group">
			               <input id="login-password" type="text" name="pin" required="" class="form-control" placeholder="Enter 6-digit PIN">
			            </div>
		                
		                
		              </div>
		              <div class="input-group">
		              <input type="submit" id="login" name="validate"  class="btn btn-primary form-group" value="Validate">
		              </div>
		              <!-- This should be submit button but I replaced it with <a> for demo purposes-->
		            </form>
          		
		            
		               
		           </div> 
             </div>
      </div>
      </div>
   </section>
           <?php }
            ?>
          
          
       
    <!-- Javascript files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
   
   
  </body>
</html>
