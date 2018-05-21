<?php
	session_start();
	
	
		if(isset($_POST['buy_token'])){
		
		$email = $_SESSION['email'];
                $usd_balance = $_POST['usd_balance'];
                $name = $_POST['name'];
            	$volume = $_POST['volume'];
            	$price_per_unit = round($_POST['price_per_unit'], 2);
            	
            	$coin = $_POST['symbol'];
            	$type = 'BUY';
            	$amount = round($volume*$price_per_unit, 2);
            	$fee = round($volume*$price_per_unit*0.0025, 2);
            	$id = mt_rand();
            	
            	$total =round($amount + $fee, 2);
            	
            	if($total > $usd_balance){
            	
            		$_SESSION['error'] = "Sorry, You do not have enough balance for this order. Please deposit first."; 
            		header('location: trade?name='.$name.'&symbol='.$coin.'');
            		exit;
            	}
            	
            	$timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
		$date =  gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
		
            	require('connection.php');
		 $sql = "INSERT INTO order_book (order_id, email, date,  coin , type, volume, price_per_unit, price, fee, total , trade_id )
                    VALUES ('$id','$email', '$date', '$coin', '$type', '$volume', '$price_per_unit', '$amount', '$fee' , '$total', ''  );";
           
            	if ($connection->query($sql) === TRUE) {
            	
            	
            	/*	  */
            		
            		//to check if there  opposit bid with same price
            		$sql ="SELECT *  FROM  `order_book`  WHERE  `coin` LIKE  '$coin' AND  `type` LIKE  'SELL' AND  `price_per_unit` LIKE  '$price_per_unit' AND `trade_Id` = ''LIMIT 1";
                	$result= mysqli_query($connection, $sql) or die(mysqli_error($connection));
			   
	                    $row = mysqli_fetch_assoc($result);
	                   if($row){
	                   
	                   	$amount_1 = $row['volume'];
	                   	$seller_price = $row['price'];
	                   	$seller_fee = $row['fee'];
	                   	$seller_order = $row['order_id'];
	                   	$seller_email = $row['email'];
	                   	
	                   	
	                   	if($volume > $amount_1){
	                   	
	                   	echo "1";
	                   	exit;
	                   		
	                   	}else if($volume < $amount_1){
	                   	
	                   	echo "2";
	                   	exit;
	                   	
	                   	}else{
	                   	
		                   	$trade_id = mt_rand();
		                   	
		                   	//  update trade_id in order_book
		                   	$query1 = "update `order_book` SET trade_id='$trade_id' WHERE order_id='$seller_order'";
	                           	if(mysqli_query($connection, $query1)){
	                           	
	                           	   //  insert in trade_id
	                           	   
	                           	   $sql = "INSERT INTO trade_history (trade_id, volume, price_per_unit, date,  coin ) VALUES ('$trade_id','$volume', '$price_per_unit', '$date', '$coin' );";
           
            				   if ($connection->query($sql) === TRUE) {
            				   	
            				   	//  update trade_id in order_book
			                   	$query1 = "update `order_book` SET trade_id='$trade_id' WHERE order_id='$id'";
		                           	if(mysqli_query($connection, $query1)){
		                           	
		                           	    //  update buyer's usd balance
				                   	$query1 = "select * from `user_portfolilo`  WHERE email='$email'";
							$result= mysqli_query($connection, $query1) or die(mysqli_error($connection));
			   
					                   $row = mysqli_fetch_assoc($result);
					                   if($row){
					                   	
					                   	//addition
			                           		$new_usd_balance = $usd_balance - $total;
			                           		$coin_type = $coin.'_value';
			                           		$buyer_crypto_balance = $row[$coin_type];
			                           		
			                           		$new_crypto_balance = $buyer_crypto_balance + $volume;
			                           		
			                           		
			                           		
			                           		
					                   }
					                   $query1 = "update `user_portfolilo` SET usd_value='$new_usd_balance', ".$coin."_value='$new_crypto_balance'  WHERE email='$email'";
				                             if(mysqli_query($connection, $query1)){
				                            
				                                   $query1 = "select * from `user_portfolilo`  WHERE email='$seller_email'";
								   $result= mysqli_query($connection, $query1) or die(mysqli_error($connection));
				   
						                   $row = mysqli_fetch_assoc($result);
						                   if($row){
						                   
						                   	//  deduction
						                   	$seller_usd_balance = $row['usd_value'];
				                           		$new_usd_balance = $seller_usd_balance + $seller_price;
				                           		$coin_type = $coin.'_value';
				                           		$buyer_crypto_balance = $row[$coin_type];
				                           		$new_crypto_balance = $buyer_crypto_balance - $volume;
						                   }
						                   $query1 = "update `user_portfolilo` SET usd_value='$new_usd_balance', ".$coin."_value='$new_crypto_balance'  WHERE email='$seller_email'";
					                             if(mysqli_query($connection, $query1)){
					                             
					                             $query1 = "select * from `user_portfolilo`  WHERE email='admin'";
								   $result= mysqli_query($connection, $query1) or die(mysqli_error($connection));
				   
						                   $row = mysqli_fetch_assoc($result);
						                   if($row){
						                   
						                   	//  deduction
						                   	$current_balance = $row['usd_value'];
						                   	
				                           		$updated_balance = $fee + $seller_fee + $current_balance;
				                           		
						                   }
						                   $query1 = "update `user_portfolilo` SET usd_value='$updated_balance'  WHERE email='admin'";
					                             if(mysqli_query($connection, $query1)){
					                             
					                             $_SESSION['msg'] = "Your order for buying ".$volume." ".$name." @ $ ".$price_per_unit." has been traded successfully."; 
	            		header('location: trade?name='.$name.'&symbol='.$coin.'');
					                             
					                             }
					                             
					                             	
	            		exit;
					                             
					                             }
				                             }
		                           	
		                           	}
            				   	
            				   	echo $connection->error;
            				   
            				   }else{
            				   
            				   echo $connection->error;
            				   
            				   }
	                           	   
	                           	   
	                           	
	                           	}else{
	                           	 echo $connection->error;
	                           	}
	                   	
	                   	
	                   	
	                   	
	                   	
	                   	     
	                   	}
	                   	
	                   }else{
	                   
	                   	$_SESSION['msg'] = "Your order for buying ".$volume." ".$name." @ $ ".$price_per_unit." has been placed successfully."; 
	            		header('location: trade?name='.$name.'&symbol='.$coin.'');
	            		exit;
	                   }
            		
            	}else{
            		$_SESSION['error'] = "Sorry, Please try after some time.";
            		header('location: trade?name='.$name.'&symbol='.$coin.'');
            		exit;
            	}
            	
            	
            }
            
             if(isset($_POST['sell_token'])){
             
            	$email = $_SESSION['email'];
                $usd_balance = $_POST['crypto_balance'];
                $name = $_POST['name'];
            	$volume = $_POST['volume'];
            	$price_per_unit = round($_POST['price_per_unit'], 2);
            	
            	$coin = $_POST['symbol'];
            	$type = 'SELL';
            	
            	$amount = round($volume*$price_per_unit, 2);
            	$fee = round($volume*$price_per_unit*0.0025, 2);
            	
            	$total =round($amount - $fee, 2);
            	
            	if($volume > $usd_balance){
            	
            		$_SESSION['error'] = "Sorry, You do not have enough balance for this order. Please deposit first."; 
            		header('location: trade?name='.$name.'&symbol='.$coin.'');
            		exit;
            	}
            	$timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
		$date =  gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
		
            	require('connection.php');
		 $sql = "INSERT INTO order_book (email, date,  coin , type, volume, price_per_unit, price, fee, total , trade_id )
                    VALUES ('$email', '$date', '$coin', '$type', '$volume', '$price_per_unit', '$amount', '$fee' , '$total', ''  );";
           
            	if ($connection->query($sql) === TRUE) {
            	$_SESSION['msg'] = "Your order for selling ".$volume." ".$name." @ $ ".$price_per_unit." has been placed successfully."; 
            		header('location: trade?name='.$name.'&symbol='.$coin.'');
            		exit;
            	}else{
            		$_SESSION['error'] = "Sorry, Please try after some time";
            		header('location: trade?name='.$name.'&symbol='.$coin.'');
            		exit;
            	
            	}
            
            }


?>