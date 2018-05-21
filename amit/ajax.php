if(isset($_POST) &amp;&amp; count($_POST)){
	$action  = $_POST['action'];
	$fname   = $_POST['fname'];
	$lname   = $_POST['lname'];
	$email   = $_POST['email'];
	$phone   = $_POST['phone'];	
	$item_id = $_POST['item_id'];	
 
	if($action == "save"){
		// Add code to save data into mysql
		echo json_encode(
			array(
				"success" =&gt; "1",
				"row_id"  =&gt; time(),
				"fname"   =&gt; htmlentities($fname),
				"lname"   =&gt; htmlentities($lname),
				"email"   =&gt; htmlentities($email),
				"phone"   =&gt; htmlentities($phone),
			)
		);
	}
	else if($action == "delete"){
		// Add code to remove record from database
		echo json_encode(
			array(
				"success" =&gt; "1",
				"item_id"  =&gt; $item_id					
			)	 
		);
	}
  }else{
	echo json_encode(
		array(
			"success" =&gt; "0",
			"item_id"  =&gt; "No POST data set"					
		)	 
	);
  }