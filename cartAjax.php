<?php
if(isset($_POST['add']) && isset($_POST['vehicle'])){
    // echo $_POST['vehicle'];
    session_start();
    include('db.php');
    $id=$_SESSION['cust_id'];
    $pid= $_POST['vehicle'];
    // echo $id;
    // echo $pid;
    $pro=mysqli_query($con, "SELECT price FROM products WHERE product_id = $pid");
    if(mysqli_num_rows($pro)>0){
        if($pr=mysqli_fetch_assoc($pro)){
            $price=$pr['price'];
            // echo $price;
            $cart=mysqli_query($con,"SELECT qty FROM cart WHERE product_id=$pid AND cust_id=$id");
            if(mysqli_num_rows($cart)>0){
                if($q=mysqli_fetch_assoc($cart)){
                    $qty= $q['qty'];
                    $total= $price*$qty;
                    // echo  $price*$qty;
                    echo $total;
                    // echo $price;
                }
            }
        }
    }
}

?>
