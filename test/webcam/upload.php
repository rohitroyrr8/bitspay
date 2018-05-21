<?php
 
foreach ($_FILES["images"]["error"] as $key => $error) {
  
  	echo "<h2>Successfully Uploaded Images</h2>"; 
    $name = $_FILES["images"]["name"][$key];
    if(move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "saved_images/" . $_FILES['images']['name'][$key]))
    {
	echo "<h2>Successfully Uploaded Images</h2>";    
    }
    else{
    	echo "<h2>Unhopefully Uploaded Images</h2>";
    
  }
}
 
