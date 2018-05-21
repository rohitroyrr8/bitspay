<?php
	session_start();
	
	if(isset($_GET['base_currency'])){
		$bsym = $_GET['base_currency'];
		$_SESSION['base_currency'] = $bsym;
	}else{
		$bsym = 'USD';	
		$_SESSION['base_currency'] = $bsym;
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Exchange Data</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet"> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/bootstrap-select.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->       
  
    
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
   <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
  padding-right: 10px;
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
  padding-top: 60px;
}

.table100-head {
  position: absolute;
  width: 100%;
  top: 0;
  left: 0;
}

.table100-body {
    overflow: auto;
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


/*==================================================================
[ Ver2 ]*/

.table100.ver2 .table100-head {
  box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -o-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: 0 5px 20px 0px rgba(0, 0, 0, 0.1);
}

.table100.ver2 th {
 font-family: 'Roboto', sans-serif;
  font-size: 18px;
  color: #fa4251;
  line-height: 1.4;

  background-color: transparent;
}

.table100.ver2 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
}

.table100.ver2 .table100-body tr {
  border-bottom: 1px solid #f2f2f2;
}

/*---------------------------------------------*/

.table100.ver2 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver2 .ps__rail-y {
  right: 5px;
}

.table100.ver2 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver2 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}

/*==================================================================
[ Ver3 ]*/

.table100.ver3 {
  background-color: #393939;
}

.table100.ver3 th {
 font-family: 'Roboto', sans-serif;
  font-size: 15px;
  color: #00ad5f;
  line-height: 1.4;
  text-transform: uppercase;
  background-color: #393939;
}

.table100.ver3 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
  background-color: #222222;
}


/*---------------------------------------------*/

.table100.ver3 {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -moz-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -o-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
  -ms-box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);
}

.table100.ver3 .ps__rail-y {
  right: 5px;
}

.table100.ver3 .ps__rail-y::before {
  background-color: #4e4e4e;
}

.table100.ver3 .ps__rail-y .ps__thumb-y::before {
  background-color: #00ad5f;
}


/*==================================================================
[ Ver4 ]*/
.table100.ver4 {
  margin-right: -20px;
}

.table100.ver4 .table100-head {
  padding-right: 20px;
}

.table100.ver4 th {
 font-family: 'Roboto', sans-serif;
  font-size: 18px;
  color: #4272d7;
  line-height: 1.4;

  background-color: transparent;
  border-bottom: 2px solid #f2f2f2;
}

.table100.ver4 .column1 {
  padding-left: 7px;
}

.table100.ver4 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;
}

.table100.ver4 .table100-body tr {
  border-bottom: 1px solid #f2f2f2;
}

/*---------------------------------------------*/

.table100.ver4 {
  overflow: hidden;
}

.table100.ver4 .table100-body{
  padding-right: 20px;
}

.table100.ver4 .ps__rail-y {
  right: 0px;
}

.table100.ver4 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver4 .ps__rail-y .ps__thumb-y::before {
  background-color: #cccccc;
}


/*==================================================================
[ Ver5 ]*/
.table100.ver5 {
  margin-right: -30px;
}

.table100.ver5 .table100-head {
  padding-right: 30px;
}

.table100.ver5 th {
 font-family: 'Roboto', sans-serif;
  font-size: 14px;
  color: #555555;
  line-height: 1.4;
  text-transform: uppercase;

  background-color: transparent;
}

.table100.ver5 td {
  font-family: Lato-Regular;
  font-size: 15px;
  color: #808080;
  line-height: 1.4;

  background-color: #f7f7f7;
}

.table100.ver5 .table100-body tr {
  overflow: hidden; 
  border-bottom: 10px solid #fff;
  border-radius: 10px;
}

.table100.ver5 .table100-body table { 
  border-collapse: separate; 
  border-spacing: 0 10px; 
}
.table100.ver5 .table100-body td {
    border: solid 1px transparent;
    border-style: solid none;
    padding-top: 10px;
    padding-bottom: 10px;
}
.table100.ver5 .table100-body td:first-child {
    border-left-style: solid;
    border-top-left-radius: 10px; 
    border-bottom-left-radius: 10px;
}
.table100.ver5 .table100-body td:last-child {
    border-right-style: solid;
    border-bottom-right-radius: 10px; 
    border-top-right-radius: 10px; 
}

.table100.ver5 tr:hover td {
  background-color: #ebebeb;
  cursor: pointer;
}

.table100.ver5 .table100-head th {
  padding-top: 25px;
  padding-bottom: 25px;
}

/*---------------------------------------------*/

.table100.ver5 {
  overflow: hidden;
}

.table100.ver5 .table100-body{
  padding-right: 30px;
}

.table100.ver5 .ps__rail-y {
  right: 0px;
}

.table100.ver5 .ps__rail-y::before {
  background-color: #ebebeb;
}

.table100.ver5 .ps__rail-y .ps__thumb-y::before {
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

                   <a class="navbar-brand" href="index">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="index">Home</a></li>
                                         
                        <li class="active"><a href="#">Exchange Data</a></li>                    
                         <li ><a href="aboutus2">About Us</a></li>                    
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
              <h1 class="w3-center" style="color: #3ff999" style="text-transform: uppercase"><?php echo $bsym; ?> Market     </h1>
              <div class="container">
                           <div class="dropdown--pills">
            <div class="dropdown">
                <button style="background-color: #33f999; color: #fff" class="btn  dropdown-toggle input-lg" type="button" data-toggle="dropdown" id="currency-btn">USD Market                   <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="?base_currency=USD"  >USD Market</a>
                    </li>
                     <li><a href="?base_currency=BTC"  >BTC Market</a>
                    </li>
                     <li><a href="?base_currency=ETH" >ETH Market</a>
                    </li>
                </ul>
            </div>
        </div>
                        </div>
                        <div id="result" >
		<div class="container-table100" style="font-family: inherit">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head  w3-responsive">
					<table class="">
					<thead>
					<tr class="row100 head">
									
					<th class="cell100 column1">Pair</th>
					<th class="cell100 column3">Market</th>
					<th class="cell100 column4">Price</th>
					<th class="cell100 column5">Supply</th>
                                   
	                                <th class="cell100 column7">Change(1h)</th>
	                                <th class="cell100 column8">Change(24h)</th>
                                    
					</tr>
					</thead>
					</table>
					</div>
                    

					<div class="table100-body js-pscroll">
						<table class="w3-left">
							<tbody>
								
                                    <?php
                                    
                                    require('connection.php');
                                    $sql ="Select * from listed_coins ";
                        	    $result= mysqli_query($connection, $sql) or die(mysqli_error($connection));

	                            if ($result->num_rows > 0) {
	                                // output data of each row
	                                while($row = $result->fetch_assoc()) {
						                                
					$symbol = $row['symbol'];
					
					
					
					$url1= 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms='.$symbol.'&tsyms='.$bsym.'';
					
				 	$str1 = file_get_contents($url1);
					$json1 = json_decode($str1, true);
                                         
                                    $price = $json1["RAW"][$symbol][$bsym]["PRICE"];

				    $market_cap = $json1["RAW"][$symbol][$bsym]["MKTCAP"];
				    $supply = $json1["RAW"][$symbol][$bsym]["SUPPLY"];
				    $last_24_hour = $json1["RAW"][$symbol][$bsym]["CHANGEPCT24HOUR"];
				    $last_1_hour = $json1["RAW"][$symbol][$bsym]["CHANGEPCTDAY"];

                                    

                        ?>          <tr class="row100 body">
									
				<td class="cell100 column1"><a style="color: #8c8c8c" href="/historical_price?bsyn=<?php echo $symbol; ?>"> <?php echo $symbol; ?>/<?php echo $bsym; ?></a></td>
				<td class="cell100 column3"><?php echo number_format($market_cap); ?> <? echo $bsym ; ?></td>
				<td class="cell100 column4"> <?php echo $price; ?> <? echo $bsym ; ?></td>
                                    <td class="cell100 column5"> <?php echo number_format($supply); ?> <? echo $symbol ; ?></td>
                                         
                                     <?php
                                        
                                        if($last_1_hour < '0'){ ?>
                                        <td class="cell100 column7" style="color: red;"><?php echo round($last_1_hour, 2); ?>%</td>
                                        <?php }else{ ?>
                                        <td class="cell100 column7" style="color: green;"><?php echo round($last_1_hour, 2); ?>%</td>
                                      <?php    }
                                        
                                        ?>
                                       <?php
                                        
                                        if($last_24_hour < '0'){ ?>
                                        <td class="cell100 column8" style="color: red;"><?php echo round($last_24_hour, 2); ?>%</td>
                                        <?php }else{ ?>
                                        <td class="cell100 column8" style="color: green;"><?php echo round($last_24_hour, 2); ?>%</td>
                                      <?php    }
                                        
                                        ?>
                                    
                                    </tr>
                                    <?php   }  } ?>
									
								

								
							</tbody>
						</table>
					</div>
				</div>
				
				
				

				

				
			</div>
			</div>
		</div>
	</div>
    </section>
   

    <section id="coming-soon-footer" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>&copy; Bitspay <?php echo date('Y'); ?>. All Rights Reserved.</p>
                    
                </div>
            </div>
        </div>       
    </section>
    
  <script>
 function autoRefresh_div()
 {
      $("#result").load("crypto_price");// a function which will load data from other file after x seconds
  }
 
  setInterval('autoRefresh_div()', 5000); // refresh div after 5 secs
            </script>
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