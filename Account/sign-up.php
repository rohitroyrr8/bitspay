<?php

	session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Account | Bitspay</title>
    
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
      <!-- Select 2 css -->
      <link rel="stylesheet" href="../files/bower_components/select2/css/select2.min.css" />
      <!-- Stylesheets -->
      <link rel="stylesheet" href="../files/assets/pages/multi-step-sign-up/css/reset.min.css">
      <link rel="stylesheet" href="../files/assets/pages/multi-step-sign-up/css/style.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="../files/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="../files/assets/css/pages.css">


  </head>

  <body themebg-pattern="theme1">
	<div class="theme-loader">    
	 <div class="loader-track">   
	       <div class="preloader-wrapper active">     
	               <div class="spinner-layer spinner-blue">  
	                              <div class="circle-clipper left"> 
	                                 <div class="circle"></div>
	                                                                   </div> 
	                          <div class="gap-patch">   
	                                            <div 	class="circle"></div>                 </div>                 <div class="circle-clipper right">                     <div class="circle"></div>                 </div>             </div>             <div class="spinner-layer spinner-red">                 <div class="circle-clipper left">                     <div class="circle"></div>                 </div>                 <div class="gap-patch">                     <div class="circle"></div>                 </div>                 <div class="circle-clipper right">                     <div class="circle"></div>                 </div>             </div>                  <div class="spinner-layer spinner-yellow">                 <div class="circle-clipper left">                     <div class="circle"></div>                 </div>                 <div class="gap-patch">                     <div class="circle"></div>                 </div>                 <div class="circle-clipper right">                     <div class="circle"></div>                 </div>             </div>                  <div class="spinner-layer spinner-green">                 <div class="circle-clipper left">                     <div class="circle"></div>                 </div>                 <div class="gap-patch">                     <div class="circle"></div>                 </div>                 <div class="circle-clipper right">                     <div class="circle"></div>                 </div>             </div>         </div>     </div> </div> <!-- Pre-loader end -->
    <form id="msform" method="POST" action="setup.php">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Personal Details</li>
            <li>More</li>
        </ul>
        <!-- fieldsets -->
        <fieldset>
            <img class="logo" src="../files/assets/images/bitspay_logo.png" alt="logo.png">
            <h2 class="fs-title">Lets have a new Begining</h2>
             <?php 
                 	
                 if(isset($_SESSION["msg"])){ ?>
                 <div style="margin-left: 0%; margin-right: 0%; padding-bottom: 20px" class="alert alert-success w3-large w3-margin w3-padding-24" data-color="blue">
		               <?php echo $_SESSION["msg"]; ?>
		                </div> 
                 
                <?php 
                unset($_SESSION["msg"]);
                 } 
                  ?>

	 <?php 
                 	
                 if(isset($_SESSION["error"])){ ?>
                 <div style="margin-left: 0%; margin-right: 0%; padding-bottom: 20px" class="alert alert-danger w3-large w3-margin w3-padding-24" data-color="blue">
		               <?php echo $_SESSION["error"]; ?>
		                </div> 
                 
                <?php 
                unset($_SESSION["error"]);
                 } 
                  ?>

            
            <div class="input-group">
                <input type="email" class="form-control required" name="email" placeholder="Email address" required=""/>
            </div>
            
            <div class="input-group">
                <input type="password" class="form-control" name="password" placeholder="Password" />
            </div>
            <div class="input-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />
            </div>
            <button type="button" name="next" class="btn  next" value="Next" style="background-color: #33f999; color: white">Next</button>
        </fieldset>
        <fieldset class="">
            <img class="logo" src="../files/assets/images/bitspay_logo.png" alt="logo.png">
             <h2 class="fs-title">Personal Details</h2>
           <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Name" />
            </div>
            <div class="input-group">
                <input type="tel" class="form-control" name="mobile" placeholder="Mobile No." />
            </div>
            <div class="input-group">
            	
                <input type="date" class="form-control" name="dob"  />
            </div>
           
            <button type="button" name="previous" class="btn  previous" value="Previous" style="background-color: #DFDFDf; ">Previous</button>
            <button type="button" name="next" class="btn  next" value="Next" style="background-color: #33f999; color: white">Next</button>
        </fieldset>
        <fieldset>
            <img class="logo" src="../files/assets/images/bitspay_logo.png" alt="logo.png">
            <h2 class="fs-title">A little bit more</h2>
             <div class="input-group">
                <select name="country"  class=" col-sm-12" type="text" style="font-size: 14px; border-radius: 2px; border: 1px solid #ccc; padding:.375rem .75rem;">
                      
                        <option value="" selected="selected">Select Country</option> 
		<option value="United States">United States</option> 
		<option value="United Kingdom">United Kingdom</option> 
		<option value="Afghanistan">Afghanistan</option> 
		<option value="Albania">Albania</option> 
		<option value="Algeria">Algeria</option> 
		<option value="American Samoa">American Samoa</option> 
		<option value="Andorra">Andorra</option> 
		<option value="Angola">Angola</option> 
		<option value="Anguilla">Anguilla</option> 
		<option value="Antarctica">Antarctica</option> 
		<option value="Antigua and Barbuda">Antigua and Barbuda</option> 
		<option value="Argentina">Argentina</option> 
		<option value="Armenia">Armenia</option> 
		<option value="Aruba">Aruba</option> 
		<option value="Australia">Australia</option> 
		<option value="Austria">Austria</option> 
		<option value="Azerbaijan">Azerbaijan</option> 
		<option value="Bahamas">Bahamas</option> 
		<option value="Bahrain">Bahrain</option> 
		<option value="Bangladesh">Bangladesh</option> 
		<option value="Barbados">Barbados</option> 
		<option value="Belarus">Belarus</option> 
		<option value="Belgium">Belgium</option> 
		<option value="Belize">Belize</option> 
		<option value="Benin">Benin</option> 
		<option value="Bermuda">Bermuda</option> 
		<option value="Bhutan">Bhutan</option> 
		<option value="Bolivia">Bolivia</option> 
		<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
		<option value="Botswana">Botswana</option> 
		<option value="Bouvet Island">Bouvet Island</option> 
		<option value="Brazil">Brazil</option> 
		<option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
		<option value="Brunei Darussalam">Brunei Darussalam</option> 
		<option value="Bulgaria">Bulgaria</option> 
		<option value="Burkina Faso">Burkina Faso</option> 
		<option value="Burundi">Burundi</option> 
		<option value="Cambodia">Cambodia</option> 
		<option value="Cameroon">Cameroon</option> 
		<option value="Canada">Canada</option> 
		<option value="Cape Verde">Cape Verde</option> 
		<option value="Cayman Islands">Cayman Islands</option> 
		<option value="Central African Republic">Central African Republic</option> 
		<option value="Chad">Chad</option> 
		<option value="Chile">Chile</option> 
		<option value="China">China</option> 
		<option value="Christmas Island">Christmas Island</option> 
		<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
		<option value="Colombia">Colombia</option> 
		<option value="Comoros">Comoros</option> 
		<option value="Congo">Congo</option> 
		<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
		<option value="Cook Islands">Cook Islands</option> 
		<option value="Costa Rica">Costa Rica</option> 
		<option value="Cote D'ivoire">Cote D'ivoire</option> 
		<option value="Croatia">Croatia</option> 
		<option value="Cuba">Cuba</option> 
		<option value="Cyprus">Cyprus</option> 
		<option value="Czech Republic">Czech Republic</option> 
		<option value="Denmark">Denmark</option> 
		<option value="Djibouti">Djibouti</option> 
		<option value="Dominica">Dominica</option> 
		<option value="Dominican Republic">Dominican Republic</option> 
		<option value="Ecuador">Ecuador</option> 
		<option value="Egypt">Egypt</option> 
		<option value="El Salvador">El Salvador</option> 
		<option value="Equatorial Guinea">Equatorial Guinea</option> 
		<option value="Eritrea">Eritrea</option> 
		<option value="Estonia">Estonia</option> 
		<option value="Ethiopia">Ethiopia</option> 
		<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
		<option value="Faroe Islands">Faroe Islands</option> 
		<option value="Fiji">Fiji</option> 
		<option value="Finland">Finland</option> 
		<option value="France">France</option> 
		<option value="French Guiana">French Guiana</option> 
		<option value="French Polynesia">French Polynesia</option> 
		<option value="French Southern Territories">French Southern Territories</option> 
		<option value="Gabon">Gabon</option> 
		<option value="Gambia">Gambia</option> 
		<option value="Georgia">Georgia</option> 
		<option value="Germany">Germany</option> 
		<option value="Ghana">Ghana</option> 
		<option value="Gibraltar">Gibraltar</option> 
		<option value="Greece">Greece</option> 
		<option value="Greenland">Greenland</option> 
		<option value="Grenada">Grenada</option> 
		<option value="Guadeloupe">Guadeloupe</option> 
		<option value="Guam">Guam</option> 
		<option value="Guatemala">Guatemala</option> 
		<option value="Guinea">Guinea</option> 
		<option value="Guinea-bissau">Guinea-bissau</option> 
		<option value="Guyana">Guyana</option> 
		<option value="Haiti">Haiti</option> 
		<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
		<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
		<option value="Honduras">Honduras</option> 
		<option value="Hong Kong">Hong Kong</option> 
		<option value="Hungary">Hungary</option> 
		<option value="Iceland">Iceland</option> 
		<option value="India">India</option> 
		<option value="Indonesia">Indonesia</option> 
		<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
		<option value="Iraq">Iraq</option> 
		<option value="Ireland">Ireland</option> 
		<option value="Israel">Israel</option> 
		<option value="Italy">Italy</option> 
		<option value="Jamaica">Jamaica</option> 
		<option value="Japan">Japan</option> 
		<option value="Jordan">Jordan</option> 
		<option value="Kazakhstan">Kazakhstan</option> 
		<option value="Kenya">Kenya</option> 
		<option value="Kiribati">Kiribati</option> 
		<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
		<option value="Korea, Republic of">Korea, Republic of</option> 
		<option value="Kuwait">Kuwait</option> 
		<option value="Kyrgyzstan">Kyrgyzstan</option> 
		<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
		<option value="Latvia">Latvia</option> 
		<option value="Lebanon">Lebanon</option> 
		<option value="Lesotho">Lesotho</option> 
		<option value="Liberia">Liberia</option> 
		<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
		<option value="Liechtenstein">Liechtenstein</option> 
		<option value="Lithuania">Lithuania</option> 
		<option value="Luxembourg">Luxembourg</option> 
		<option value="Macao">Macao</option> 
		<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
		<option value="Madagascar">Madagascar</option> 
		<option value="Malawi">Malawi</option> 
		<option value="Malaysia">Malaysia</option> 
		<option value="Maldives">Maldives</option> 
		<option value="Mali">Mali</option> 
		<option value="Malta">Malta</option> 
		<option value="Marshall Islands">Marshall Islands</option> 
		<option value="Martinique">Martinique</option> 
		<option value="Mauritania">Mauritania</option> 
		<option value="Mauritius">Mauritius</option> 
		<option value="Mayotte">Mayotte</option> 
		<option value="Mexico">Mexico</option> 
		<option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
		<option value="Moldova, Republic of">Moldova, Republic of</option> 
		<option value="Monaco">Monaco</option> 
		<option value="Mongolia">Mongolia</option> 
		<option value="Montserrat">Montserrat</option> 
		<option value="Morocco">Morocco</option> 
		<option value="Mozambique">Mozambique</option> 
		<option value="Myanmar">Myanmar</option> 
		<option value="Namibia">Namibia</option> 
		<option value="Nauru">Nauru</option> 
		<option value="Nepal">Nepal</option> 
		<option value="Netherlands">Netherlands</option> 
		<option value="Netherlands Antilles">Netherlands Antilles</option> 
		<option value="New Caledonia">New Caledonia</option> 
		<option value="New Zealand">New Zealand</option> 
		<option value="Nicaragua">Nicaragua</option> 
		<option value="Niger">Niger</option> 
		<option value="Nigeria">Nigeria</option> 
		<option value="Niue">Niue</option> 
		<option value="Norfolk Island">Norfolk Island</option> 
		<option value="Northern Mariana Islands">Northern Mariana Islands</option> 
		<option value="Norway">Norway</option> 
		<option value="Oman">Oman</option> 
		<option value="Pakistan">Pakistan</option> 
		<option value="Palau">Palau</option> 
		<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
		<option value="Panama">Panama</option> 
		<option value="Papua New Guinea">Papua New Guinea</option> 
		<option value="Paraguay">Paraguay</option> 
		<option value="Peru">Peru</option> 
		<option value="Philippines">Philippines</option> 
		<option value="Pitcairn">Pitcairn</option> 
		<option value="Poland">Poland</option> 
		<option value="Portugal">Portugal</option> 
		<option value="Puerto Rico">Puerto Rico</option> 
		<option value="Qatar">Qatar</option> 
		<option value="Reunion">Reunion</option> 
		<option value="Romania">Romania</option> 
		<option value="Russian Federation">Russian Federation</option> 
		<option value="Rwanda">Rwanda</option> 
		<option value="Saint Helena">Saint Helena</option> 
		<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
		<option value="Saint Lucia">Saint Lucia</option> 
		<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
		<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
		<option value="Samoa">Samoa</option> 
		<option value="San Marino">San Marino</option> 
		<option value="Sao Tome and Principe">Sao Tome and Principe</option> 
		<option value="Saudi Arabia">Saudi Arabia</option> 
		<option value="Senegal">Senegal</option> 
		<option value="Serbia and Montenegro">Serbia and Montenegro</option> 
		<option value="Seychelles">Seychelles</option> 
		<option value="Sierra Leone">Sierra Leone</option> 
		<option value="Singapore">Singapore</option> 
		<option value="Slovakia">Slovakia</option> 
		<option value="Slovenia">Slovenia</option> 
		<option value="Solomon Islands">Solomon Islands</option> 
		<option value="Somalia">Somalia</option> 
		<option value="South Africa">South Africa</option> 
		<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
		<option value="Spain">Spain</option> 
		<option value="Sri Lanka">Sri Lanka</option> 
		<option value="Sudan">Sudan</option> 
		<option value="Suriname">Suriname</option> 
		<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
		<option value="Swaziland">Swaziland</option> 
		<option value="Sweden">Sweden</option> 
		<option value="Switzerland">Switzerland</option> 
		<option value="Syrian Arab Republic">Syrian Arab Republic</option> 
		<option value="Taiwan, Province of China">Taiwan, Province of China</option> 
		<option value="Tajikistan">Tajikistan</option> 
		<option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
		<option value="Thailand">Thailand</option> 
		<option value="Timor-leste">Timor-leste</option> 
		<option value="Togo">Togo</option> 
		<option value="Tokelau">Tokelau</option> 
		<option value="Tonga">Tonga</option> 
		<option value="Trinidad and Tobago">Trinidad and Tobago</option> 
		<option value="Tunisia">Tunisia</option> 
		<option value="Turkey">Turkey</option> 
		<option value="Turkmenistan">Turkmenistan</option> 
		<option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
		<option value="Tuvalu">Tuvalu</option> 
		<option value="Uganda">Uganda</option> 
		<option value="Ukraine">Ukraine</option> 
		<option value="United Arab Emirates">United Arab Emirates</option> 
		<option value="United Kingdom">United Kingdom</option> 
		<option value="United States">United States</option> 
		<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
		<option value="Uruguay">Uruguay</option> 
		<option value="Uzbekistan">Uzbekistan</option> 
		<option value="Vanuatu">Vanuatu</option> 
		<option value="Venezuela">Venezuela</option> 
		<option value="Viet Nam">Viet Nam</option> 
		<option value="Virgin Islands, British">Virgin Islands, British</option> 
		<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
		<option value="Wallis and Futuna">Wallis and Futuna</option> 
		<option value="Western Sahara">Western Sahara</option> 
		<option value="Yemen">Yemen</option> 
		<option value="Zambia">Zambia</option> 
		<option value="Zimbabwe">Zimbabwe</option>
		                    
                </select>
            </div>
            
           
            <div class="input-group">
                <input type="number" class="form-control" name="referrals" placeholder="referral (optional)" />
            </div>
             <div class="checkbox-fade fade-in-primary d-" style="margin-bottom: 20px;">
                 <label>
                     
                     
                     <span class="text-inverse">By signing up you agreed to our <a href="">Terms & Conditions</a></span>
                 </label>
            </div><br>
           
            <button type="button" name="previous" class="btn   previous" value="Previous" style="background-color: #DFDFDF;">Previous</button>
             <input type="submit" name="register"  value="Create Account" style="background: #33f999; color: #fff"  class="btn btn-primary btn-md waves-effect waves-light text-center">
            
             
        </fieldset>
	</form>
	
        
        
            
    </div>

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

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src="../files/assets/pages/multi-step-sign-up/js/main.js"></script>
<!-- Select 2 js -->
<script type="text/javascript" src="../files/bower_components/select2/js/select2.full.min.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="../files/bower_components/i18next/js/i18next.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="../files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="../files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
<script type="text/javascript" src="../files/assets/js/common-pages.js"></script>
</body>

</html>
