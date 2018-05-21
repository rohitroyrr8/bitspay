$contents = '<div class="table100 ver1 m-b-110">
					<div class="table100-head  w3-responsive">
						<table class="">
							<thead>
								<tr class="row100 head">
									
									<th class="cell100 column1">Pair</th>
									<th class="cell100 column3">Market Cap</th>
									<th class="cell100 column4">Price</th>
									<th class="cell100 column5">Volume(24h)</th>
                                   
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
                                    $str = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?convert=ETH');
                                    // decode JSON
                                    $json = json_decode($str, true);
                                        
                                    for($i=2; $i<12; $i++){
                                        
                                        $rank = $json[$i]['rank'];
                                        $name = $json[$i]['name'];
                                        $price = $json[$i]['price_eth'];
                                        $volume = $json[$i]['24h_volume_eth'];
                                        $market_cap = $json[$i]['market_cap_eth'];
                                        
                                        $symbol = $json[$i]['symbol'];
                                        $last_1_hour = $json[$i]['percent_change_1h'];
                                        $last_24_hour = $json[$i]['percent_change_24h'];

                                    

                        ?>          <tr class="row100 body">
									
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
				</div>';

echo json_encode($content);