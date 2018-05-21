<?php 
	session_start();
	$bsym = $_SESSION['base_currency'];
	
?>
<html>

<head>
</head>
<body>
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
					<th class="cell100 column5">Circulating</th>
                                   
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
</body>