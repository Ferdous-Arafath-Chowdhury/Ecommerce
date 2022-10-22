<?php
   include 'ConnectionProvider.php';
  $id = $_GET['id']; 
 
  $sql = "DELETE  FROM products WHERE product_id = '$id' " ; 
  $run = mysqli_query($con,$sql);

  ?> 
