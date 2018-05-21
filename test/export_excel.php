<?php

require('User/connection.php');
$output = '';

 $query = "SELECT item_id, item_name, item_des, tag, high_price, category, sub_category, vendor, date  FROM `items` ";
 $result = mysqli_query($connection, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                      	  <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Tag</th>
                          <th>Price</th>
                           <th>Category</th>
                           <th>Sub-Category</th>
                           <th>Vendor</th>
     				
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["item_id"].'</td>  
                         <td>'.$row["item_name"].'</td>  
                         <td>FX '.$row["item_des"].'</td>  
                          <td>'.$row["tag"].'</td>  
                        <td>'.$row["high_price"].'</td>  
                         <td>'.$row["category"].'</td>  
                         <td>'.$row["sub_category"].'</td>  
                           <td>'.$row["vendor"].'</td>    
      
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=items.xls');
  echo $output;
 }
 
 ?>
