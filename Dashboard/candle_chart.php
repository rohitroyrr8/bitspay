<?php
 
$dataPoints = array( 
	array("x" => 1514485800000, "y" => array(54.15 ,54.55 ,53.65 ,53.85)),
	array("x" => 1514399400000, "y" => array(54.6 ,54.7 ,53.75 ,54.15)),
	array("x" => 1514313000000, "y" => array(55.4 ,55.5 ,54.05 ,54.85)),
	array("x" => 1513881000000, "y" => array(56 ,56.2 ,54.9 ,55.4)),
	array("x" => 1513794600000, "y" => array(54.85 ,56.15 ,54.6 ,56.05)),
	array("x" => 1513708200000, "y" => array(55.8 ,56 ,54.45 ,54.75)),
	array("x" => 1513621800000, "y" => array(56.5 ,56.5 ,55.65 ,55.75)),
	array("x" => 1513535400000, "y" => array(55.15 ,56.8 ,55.1 ,56.55)),
	array("x" => 1513276200000, "y" => array(55.35 ,55.4 ,54.75 ,55.1)),
	array("x" => 1513189800000, "y" => array(55.95 ,56.2 ,54.2 ,55.45)),
	array("x" => 1513103400000, "y" => array(53.75 ,56.5 ,53.7 ,55.9)),
	array("x" => 1513017000000, "y" => array(53.5 ,53.95 ,53 ,53.8)),
	array("x" => 1512930600000, "y" => array(53 ,53.1 ,52.15 ,52.65)),
	array("x" => 1512671400000, "y" => array(53.15 ,53.5 ,52.7 ,52.9)),
	array("x" => 1512585000000, "y" => array(52.7 ,53.45 ,52.6 ,52.85)),
	array("x" => 1512498600000, "y" => array(52.85 ,52.85 ,51.6 ,52.4)),
	array("x" => 1512412200000, "y" => array(52.45 ,53.45 ,52.1 ,53.25)),
	array("x" => 1512325800000, "y" => array(52.4 ,53.8 ,52.2 ,52.65)),
	array("x" => 1512066600000, "y" => array(52.5 ,52.95 ,51.85 ,51.95))
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Ericsson Stock Price - December 2017"
	},
	subtitles: [{
		text: "Currency in Swedish Krona"
	}],
	axisX: {
		valueFormatString: "DD MMM"
	},
	axisY: {
		includeZero: false,
		suffix: " kr"
	},
	data: [{
		type: "line",
		xValueType: "dateTime",
		yValueFormatString: "#,##0.0 kr",
		xValueFormatString: "DD MMM",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>         