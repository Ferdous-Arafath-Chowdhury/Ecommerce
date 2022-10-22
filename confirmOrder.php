<?php
$id=$_REQUEST['pid'];
echo $id;
include('db.php');
// echo "<script> alert('$id')</script>";
mysqli_query($con,"UPDATE `orders` SET `status`='paid' WHERE `order_id`= $id");
header('Location: confirmOrder.php');
?>