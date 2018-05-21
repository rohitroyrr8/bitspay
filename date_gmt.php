<?php 
$timezone  = 5.50; //(GMT -5:00) EST (U.S. & Canada) 
echo gmdate("Y/m/j H:i:s", time() + 3600*($timezone+date("I"))); 
?> 