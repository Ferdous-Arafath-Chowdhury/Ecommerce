<?php
include 'ConnectionProvider.php' ;


$id = $_GET['id']; 

echo  "$id"; 
 
$sql = "DELETE  FROM sugg_product WHERE  `id`  = '$id' " ; 
$run = mysqli_query($con,$sql);
if(!$run)
{
  
     die("Could not connect to the database ".mysqli_connect_error());
    
}

?>