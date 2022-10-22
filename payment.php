<?php
session_start();
include('db.php');
$uid=$_SESSION['cust_id'];
$address=$_SESSION['address'];
$p=$_SESSION['pid'];
$mobile=$_SESSION['mobile'];
$email=$_SESSION['email'];
$total=$_SESSION['total'];
$vid=$_SESSION['vid'];
$moid=$_SESSION['moid'];
$trid=$_REQUEST['trid'];
$sender=$_REQUEST['sender'];
// echo $trid;

// $q1=mysqli_query($con,"SELECT MAX(`id`) as 'max' FROM `payment_details`");
// if(mysqli_num_rows($q1)>0){
//     if($ro=mysqli_fetch_assoc($q1)){
//         $moid=$ro['max']+1;
//         // echo $moid;
//     }
// }


mysqli_query($con,"INSERT INTO `payment_details`(`id`, `cust_id`, `product_id`, `vendor_id`, `amount`, `transaction_id`, `status`) VALUES ('$moid','$uid','$p','$vid','$total','$trid','request')");
header('Location: cart.php');
?>
