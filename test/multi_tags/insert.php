<?php
//insert.php

if(isset($_GET["name"]))
{

$servername = "";
$username = "";
$password = "";
$dbname = "";

 
 // Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

$id = mt_rand(1, 100);
$skill= $_GET['skill'];
$name= $_GET['name'];

$sql = "INSERT INTO programmer(id, name, skill) VALUES ('$id', '$name', '$skill');";

 $output = '';
 
 if($connection->query($sql) === TRUE)
 {
  $output = '
  <div class="alert alert-success">
   Your data has been successfully saved into System
  </div>
  ';
 }
 else{
 $output = $connection->error;
 }
 echo $output;
}

?>
