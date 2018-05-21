<?php

 require('connection.php');
$id = mt_rand(100, 9999);
$name = $_POST['name'];
$phone= $_POST['phone'];
$sql = "INSERT INTO tbl_sample (id, name, phone ) VALUES ('".$id."', '".$_POST['name']."', '".$_POST['phone']."')";
if(mysqli_query($connection, $sql)){
    echo "Data Inserted";
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
else{
    echo $connection->error;
} 



?>