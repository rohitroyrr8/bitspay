<?php  

$str1 = file_get_contents('https://api.fixer.io/latest?base=USD');
// decode JSON
$json1 = json_decode($str1, true);

 $usd_inr = $json1['rates']['INR'];

// get the data


 //for bitcoin price 
	$url= 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD';
 	$str = file_get_contents($url);
	$json = json_decode($str, true);
	$btc_usd = $json['USD'];
	
  
 //for ethereum price 
	$url1= 'https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD';
 	$str1 = file_get_contents($url1);
	$json1 = json_decode($str1, true);
	$eth_usd = $json1['USD'];
	
	// $btc_inr = $json[0][price_usd]*$usd_inr ;
     //	$buy_btc = $btc_inr + (0.08*$btc_inr);

?>
<html>

<head>
</head>
<body>
	<span style="font-size: 14px">Bitcoin : $ <?php echo number_format(round($btc_usd, 3 )); ?></span> <span>&#124;</span> 
  <span style="font-size: 14px">Ethereum : $ <?php echo number_format(round($eth_usd, 3 )); ?></span>
</body>