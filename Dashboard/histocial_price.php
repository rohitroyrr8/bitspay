<?php
 
$dataPoints = array();

	$url1= 'https://www.cryptocurrencychart.com/price-and-volume-data/BTC/';
 	$str1 = file_get_contents($url1);
	$json1 = json_decode($str1, true);
	
	
	//$x = 1491204055000;
	$x = strtotime($json1["chartData"]["data"]["columns"][0][1]).'000';
	
	for($i = 0; $i < 365; $i++){
	$x += 86400000;
	
	
	$y = $json1["chartData"]["data"]["columns"][1][$i];
	
	
	
	array_push($dataPoints, array("x" => $x, "y" => $y));
	}



 
?>
<!DOCTYPE HTML>
<html>
<head> 
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	animationEnabled: true,
	zoomEnabled: true,
	title: {
		text: "Bitcoin Price Chart"
	},
	data: [{
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
</head>
<body>

<div id="chartContainer" ></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>                              