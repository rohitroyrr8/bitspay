<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Exchange Market</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  
    
     

  <script src="https://code.jquery.com/jquery-3.2.1.slim.js" defer></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js" defer></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>
      
    <style>
    

/*//////////////////////////////////////////////////////////////////
[ FONT ]*/



/*//////////////////////////////////////////////////////////////////
[ RESTYLE TAG ]*/
* {
	margin: 0px; 
	padding: 0px; 
	box-sizing: border-box;
    font-family: 'Roboto', sans-serif;
}

body, html {
  font-family: 'Roboto', sans-serif;
	height: 100%;
	font-family: 'roboto ;
}

/* ------------------------------------ */
a {
	margin: 0px;
	transition: all 0.4s;
	-webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  -moz-transition: all 0.4s;
}

a:focus {
	outline: none !important;
}

a:hover {
	text-decoration: none;
}

/* ------------------------------------ */
h1,h2,h3,h4,h5,h6 {margin: 0px;}

p {margin: 0px;}

ul, li {
	margin: 0px;
	list-style-type: none;
}


/* ------------------------------------ */
input {
  display: block;
	outline: none;
	border: none !important;
}

textarea {
  display: block;
  outline: none;
}

textarea:focus, input:focus {
  border-color: transparent !important;
}

/* ------------------------------------ */
button {
	outline: none !important;
	border: none;
	background: transparent;
}

button:hover {
	cursor: pointer;
}

iframe {
	border: none !important;
}

/*//////////////////////////////////////////////////////////////////
[ Scroll bar ]*/
.js-pscroll {
  position: relative;
  overflow: hidden;
}

.table100 .ps__rail-y {
  width: 9px;
  background-color: transparent;
  opacity: 1 !important;
  right: 5px;
}

.table100 .ps__rail-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #ebebeb;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}

.table100 .ps__rail-y .ps__thumb-y {
  width: 100%;
  right: 0;
  background-color: transparent;
  opacity: 1 !important;
}

.table100 .ps__rail-y .ps__thumb-y::before {
  content: "";
  display: block;
  position: absolute;
  background-color: #cccccc;
  border-radius: 5px;
  width: 100%;
  height: calc(100% - 30px);
  left: 0;
  top: 15px;
}


/*//////////////////////////////////////////////////////////////////
[ Table ]*/

.limiter {
  width: 100%;
  margin: 0 auto;
}

.container-table100 {
  width: 100%;
  min-height: 100vh;
  background: #fff;

  display: -webkit-box;
  display: -webkit-flex;
  display: -moz-box;
  display: -ms-flexbox;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  padding: 33px 30px;
}

.wrap-table100 {
  width: 90%;
}

/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}

th, td {
  font-weight: unset;
  padding: 10px;
}

.column1 {
  width: 15%;
  padding-left: 40px;
}

.column2 {
  width: 15%;
}

.column3 {
  width: 15%;
}

.column4 {
  width: 12%;
}

.column5 {
  width: 15%;
}
.column6 {
  width: 15%;
}
.column7 {
  width: 15%;
}
.column8 {
  width: 15%;
}

.table100-head th {
  padding-top: 18px;
  padding-bottom: 18px;
}

.table100-body td {
  padding-top: 16px;
  padding-bottom: 16px;
}

/*==================================================================
[ Fix header ]*/
.table100 {
  position: relative;

}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
  max-height: 585px;
  overflow: auto;

}

.table-striped > tbody > tr:nth-of-type(odd){
 background-color: #f9f9f9;
}


/*==================================================================
[ Ver1 ]*/

.table100.ver1 th {
  
  font-size: 18px;
  color: #fff;
  line-height: 1.4;

  background-color: #33f999;
}

.table100.ver1 td {
  
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
}

.table100.ver1 .table100-body tr:nth-child(even) {
  background-color: #f8f6ff;
}

/*---------------------------------------------*/

.table100.ver1 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver1 .ps__rail-y {
  right: 5px;
}

.table100.ver1 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver1 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}



    </style>
</head><!--/head-->

<body>
    <header id="header">      
        <div class="container">
            <div class="row">
                <div class="col-sm-12 overflow">
                   <div class="social-icons pull-right">
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                            <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> 
                </div>
             </div>
        </div>
        <div class="navbar navbar-inverse " role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.php">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="index.php">Home</a></li>
                                         
                        <li class="active"><a href="exchange_usd.php ">Exchange Data</a></li>                    
                         <li ><a href="aboutus2.html">About Us</a></li>                    
                    </ul>
                </div>
                <div class="search">
                    <form role="form">
                        <i class="fa fa-search"></i>
                        <div class="field-toggle">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <section>
            
        <div class="limiter">
              <div class="container">
                              <select id="coin_to" class="selectpicker"  data-live-search="false" >
                    <option>ETH Market</option>
                    <option>BTC Market</option>
                  <option>USD Market</option>
                   
                      
                      
               
                
              </select>
                        </div>
		<div class="container-table100" style="font-family: inherit">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="   w3-responsive">
						<table class="table table-striped">
							
									
									<th class="cell100 column1">Pair</th>
									<th class="cell100 column3">Market </th>
									<th class="cell100 column4">Price</th>
									<th class="cell100 column5">Volume(24h)</th>
					                                   
					                                    <th class="cell100 column7">Change(1h)</th>
					                                    <th class="cell100 column8">Change(24h)</th>
                                    
								
							
								
                                    <?php
                                    $str = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?convert=ETH');
                                    // decode JSON
                                    $json = json_decode($str, true);
                                        
                                    for($i=1; $i<12; $i++){
                                        
                                        $rank = $json[$i]['rank'];
                                        $name = $json[$i]['name'];
                                        $price = $json[$i]['price_eth'];
                                        $volume = $json[$i]['24h_volume_eth'];
                                        $market_cap = $json[$i]['market_cap_eth'];
                                        
                                        $symbol = $json[$i]['symbol'];
                                        $last_1_hour = $json[$i]['percent_change_1h'];
                                        $last_24_hour = $json[$i]['percent_change_24h'];

                                    


                        ?>         
                        		<tbody>
                        		 <tr class="row100 body">
						
						<td class="cell100 column1"><?php echo $symbol; ?>/ETH</td>
						<td class="cell100 column3">$ <?php echo $market_cap; ?> ETH</td>
						<td class="cell100 column4"> <?php echo $price; ?> ETH</td>
            					<td class="cell100 column5"> <?php echo $volume; ?> ETH</td>
                                         
                                     <?php
                                        
                                        if($last_1_hour < '0'){ ?>
                                        <td class="cell100 column7" style="color: red;"><?php echo $last_1_hour; ?>%</td>
                                        <?php }else{ ?>
                                        <td class="cell100 column7" style="color: green;"><?php echo $last_1_hour; ?>%</td>
                                    <?php    }
                                        
                                        ?>
                                       <?php
                                        
                                        if($last_24_hour < '0'){ ?>
                                        <td class="cell100 column8" style="color: red;"><?php echo $last_24_hour; ?>%</td>
                                        <?php }else{ ?>
                                        <td class="cell100 column8" style="color: green;"><?php echo $last_24_hour; ?>%</td>
                                    <?php    }
                                        
                                        ?>
                                    
                                    </tr>
                                    <?php } ?>
									
								

								
							</tbody>
						</table>
					
				</div>
				
				
				

				

				
			
			</div>
		</div>
	</div>
    </section>
   

    <section id="coming-soon-footer" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>&copy; bitPay 2018. All Rights Reserved.</p>
                    
                </div>
            </div>
        </div>       
    </section>
    

    <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
</body>
</html>