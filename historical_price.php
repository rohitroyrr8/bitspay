<?php
	if(!isset($_GET['bsyn'])){
	
       		$symbol = 'BTC';
       		
   	 }
	else{
		$symbol = $_GET['bsyn'];
		
	}
	
	
	   require('connection.php');
	 $query0 = "SELECT * FROM `listed_coins` WHERE symbol='$symbol' ";
         $result0= mysqli_query($connection, $query0) or die(mysqli_error($connection));
	                   
            $row0 = mysqli_fetch_assoc($result0);
          	 if($row0){
			$name = $row0['name'];
			$website = $row0['website'];
			$logo = $row0['image'];
			$explorer = $row0['explorer'];
			$source_code = $row0['source_code'];

		}
		
		
	
	//for rendering price chart
	$dataPoints = array();
	$url1= 'https://www.cryptocurrencychart.com/price-and-volume-data/'.$symbol.'/';
 	$str1 = file_get_contents($url1);
	$json1 = json_decode($str1, true);
	
	
	//$x = 1491204055000;
	$x = strtotime($json1["chartData"]["data"]["columns"][0][1]).'000';
	
	for($i = 0; $i < 365; $i++){
	$x += 86400000;
	
	
	$y = $json1["chartData"]["data"]["columns"][1][$i];
	
	
	
	array_push($dataPoints, array("x" => $x, "y" => $y));
	}
	
	//for price chart
	$url1= 'https://min-api.cryptocompare.com/data/price?fsym='.$symbol.'&tsyms=USD';
 	$str1 = file_get_contents($url1);
	$json1 = json_decode($str1, true);
	$price = $json1['USD'];
	
	//image, favicoin, name, source code, website, explorer, symbol
	
	
	
	
?>	


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $name; ?> | Bitspay</title>
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
      <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,

	title: {
		text: "Price Chart",
		 fontColor: "#8c8c8c"
	},
	data: [{
		lineColor: "#33f999",
		prefix: "$",
		type: "line",  //line, area, candle
		
                 xValueType: "dateTime",
		xValueFormatString: "DD-MMM-YYYY",
		interval: 10,
		yValueFormatString: "$ #0.00",
		

		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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



/*//////////////////////////////////////////////////////////////////
[ Table ]*/
.table100 {
  background-color: #fff;
}

table {
  width: 100%;
}


td{
	border-top: 0px !important;
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

                    <a class="navbar-brand" href="./">
                    	<h1><img src="images/logo.png" alt="logo"></h1>
                    </a>
                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="./">Home</a></li>
                                         
                        <li class="active" ><a href="exchange_data">Exchange Data</a></li>                    
                         <li><a href="aboutus2">About Us</a></li>                    
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
    
    
    <section style="margin: 1% 10%">
    <div>
			<div class="row" >
			<div class="col-md-4">
			<img src="images/<?php echo $logo; ?>" style="width: 40%">
			
			</div>
			<div class="col-md-8" style="padding: 1%">
			<h2 style="margin-bottom: 1%"><?php echo $name; ?> (<?php echo $symbol ; ?>)</h2>
			<h4 style="margin-bottom: 2%" >Price: $ <?php echo $price; ?></h4>
			<div class="row w3-large">
			<div class="col-md-4 ">
			<p class="glyphicon glyphicon-link text-gray" title="Website" style="color: #33f999"></p> <a href="<?php echo $website; ?>" target="_blank" rel="noopener" style="color: #8c8c8c">Website</a>
			</div>
			<div class="col-md-4">
			<p class="glyphicon glyphicon-link text-gray" title="Explorer" style="color: #33f999"></p> <a href="<?php echo $explorer; ?>" target="_blank" rel="noopener" style="color: #8c8c8c">Explorer</a>
			</div>
			<div class="col-md-4">
			<p class="glyphicon glyphicon-link text-gray" title="Source Code" style="color: #33f999"></p> <a href="<?php echo $source_code; ?>" target="_blank" rel="noopener" style="color: #8c8c8c">Source Code</a>
			</div>
			
			</div>
			
			</div>		
			
					
			
					
			</div>
    </div>
    </section>
            
        
	
	<section class="container" style="width:90%; height:500px; box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);   margin: 2% 5% !important; border-radius: 10px">
		
      				 <div id="chartContainer" style="margin-top: 4%"></div>
      			
      			
        </section>			
	
<section class="container w3-padding" style="width:90%;  box-shadow: 0 0px 40px 0px rgba(0, 0, 0, 0.15);   margin: 2% 5% !important; border-radius: 10px">
	
<div class="col-lg-12 col-md-12 col-sm-12 card margin-bottom-10 padding-right-0 order-transactions white-background" style="padding-top: 20px">
<div class="row padding-top-15 margin-right-0"></div>
<div class="row margin-right-0">
<div class="col-lg-7">
<div class="row">

<div class="col-lg-6 white-background padding-bottom-10 height-375 ng-scope" ng-if="!vm.isLoading" style="">
<div class="title w3-large" style="background: #33f999; color: white; padding: 10px">
<b>BUY ORDERS</b>
</div>
<table class="table-striped table orders" width="100%">
<thead class="ng-scope">
	<tr>
	     <td  style="color: #33f999">VOLUME</td>
	     <td style="color: #33f999">PRICE/USD</td>
       </tr>
</thead>
<tbody class="sell-orders">
	<?php
	require('connection.php');
	 $query = "SELECT * FROM order_book WHERE coin='$symbol' AND type='BUY' limit 10;";
         $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
	                   
        
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	?>


        <tr ng-class="vm.buyHighlight(order.updated_at)" ng-repeat="order in vm.buyOrders" class="ng-scope">
          <td  style="cursor:pointer;"><?php echo $row['volume']; ?></td>
	  <td style="cursor:pointer;"><?php echo $row['price_per_unit']; ?></td>
      	</tr>
	<?php } } ?>

</tbody>
</table>

</div>

<div class="col-lg-6 white-background padding-bottom-10 border-light height-450 ng-scope">
<div class="title w3-large" style="background: #33f999; color: white; padding: 10px">
<b>SELL ORDERS</b>
</div>
<table class="table-striped table orders" width="100%">
<thead class="ng-scope">
	<tr>
	     <td  style="color: #33f999">VOLUME</td>
	     <td style="color: #33f999">PRICE/USD</td>
       </tr>
</thead>

<tbody class="sell-orders">
<?php
	require('connection.php');
	 $query = "SELECT * FROM order_book WHERE coin='$symbol' AND type='SELL' limit 10;";
         $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
	                   
        
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	?>

        <tr ng-class="vm.buyHighlight(order.updated_at)" ng-repeat="order in vm.buyOrders" class="ng-scope">
          <td  style="cursor:pointer;"><?php echo $row['volume']; ?></td>
	  <td style="cursor:pointer;"><?php echo $row['price_per_unit']; ?></td>
      	</tr>

        <?php }  }  ?>

</tbody>
</table>


</div>
</div>
</div>
<div class="col-lg-5 col-md-5 col-sm-12 white-background padding-bottom-10 height-375 trade-book">
<div class="title w3-large" style="background: #33f999; color: white; padding: 10px">
<b>TRADE HISTORY</b>
</div>
<table class=" table orders table-striped" width="100%">
<thead class="ng-scope">
<tr>
	<td style="color: #33f999">TIME</td>
	<td style="color: #33f999">VOLUME</td>
	<td style="color: #33f999">PRICE/USD</td>
</tr>
</thead>
<tbody>
<?php
	require('connection.php');
	 $query = "SELECT * FROM trade_history WHERE coin='$symbol' limit 10;";
         $result= mysqli_query($connection, $query) or die(mysqli_error($connection));
	                   
        
	    if ($result->num_rows > 0) {
	        // output data of each row
	        while($row = $result->fetch_assoc()) {
	?>
	<tr>
	<td><?php echo $row['date']; ?></td>
	<td><?php echo $row['volume']; ?></td>
	<td><?php echo $row['price_per_unit']; ?></td>
	</tr>
	
	<?php } } ?>

</tbody>

</table>
<!-- ngIf: vm.orderTransactions.length == 0 -->
</div>
</div>
</div>
	</section>
                
    
    <section id="coming-soon-footer" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-center">
                    <p>&copy; Bitspay 2018. All Rights Reserved.</p>
                    
                </div>
            </div>
        </div>       
    </section>

    <script>
 function autoRefresh_div()
 {
      $("#result").load("crypto_price.php");// a function which will load data from other file after x seconds
  }
 
  setInterval('autoRefresh_div()', 8000); // refresh div after 5 secs
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