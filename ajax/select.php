<?php

require('connection.php');


$output = '';
$sql = 'SELECT * FROM tbl_sample ORDER BY  `tbl_sample`.`id` ASC ';
$result = mysqli_query($connection, $sql);

$output .='<div class="table-responsive">
                <table class="table table-bordered table-list">
                <tr>
                    <th width="10%">ID</td>
                    <th width="40%">Name</th>
                    <th width="40%">Phone</th>
                    <th width="10%">Action</th>
                </tr>';
    if(mysqli_num_rows($result) > 0){
    
    
        while($row = mysqli_fetch_array($result)){
            $output .= '<tr>
                        <td>'.$row['id'].'</td>
                        <td class="phone" data-id3="'.$row['name'].'" contenteditable>'.$row['name'].'</td>
                        <td class="name" data-id1="'.$row['phone'].'" contenteditable>'.$row['phone'].'</td>
                        
                        <td><button class="btn btn-xs btn-danger" name="btn_delete" id="btn_delete" data-id3="'.$row['id'].'">x</button></td>';
        }
        
        $output .= '<tr>
                    <td></td>
                    <td id="name" contenteditable></td>
                    <td id="phone" contenteditable></td>
                    <td><button name="btn_add" id="btn_add" class="btn btn-success btn-xs">+</button</td>
                    </tr>';
    }
    else{

        $output .='<tr>
                    <td colspan="4">Data Not Found </td>
                    </tr>';
    }

$output .='</table>
        </div>';
        
        echo $output;


?>