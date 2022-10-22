<?php
@ob_start();
session_start();
include('db.php');
$vamount=0;
$total= $_REQUEST['total'];
$ship= $_REQUEST['ship'];
$vouchar= $_REQUEST['vouchar'];
$amount= $_REQUEST['amount'];
$q1=mysqli_query($con,"SELECT MAX(`order_id`) as 'max' FROM `orders`");
if(mysqli_num_rows($q1)>0){
    if($ro=mysqli_fetch_assoc($q1)){
        $moid=$ro['max']+1;
        // echo $moid;
    }
}
$q2=mysqli_query($con,"SELECT * FROM `vouchars`");
if(mysqli_num_rows($q2)>0){
    if($vo=mysqli_fetch_assoc($q2)){
        $code=$vo['code'];
        $type=$vo['type'];
        $vamount=$vo['amount'];
        if($code==$vouchar){
            $total=$total-$vamount;
        }
        // echo $moid;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <title>Payment</title>
    <style>
		<?php
		include "./css/common.css";
		include "./css/pay.css";
		?>
        .container{
            margin-top: 30px;
        }
	</style>
</head>
<body>
<div class="topbar">
        <div class="row">
            <div class="col-lg-5">
                <div class="button">
                
                </div>
            </div>
            <div class="col-lg-7">
                <div class="topmenu">
                    <ul>
                        <li><a href="index.php">Home<span>&nbsp;|</span></a></li>
                        <li><a href="login.php">Login<span>&nbsp;|</span></a></li>
                        <li><a href="registration.php">Register <span>|</span></a></li>
                        <li><a href="aboutus.php">Contact <span>|</span></a></li>
                        <li><a href="#">FAQ <span>|</span> </a></li>
                        <li><a href="busireq.html">Become A Vendor <span>|</span> </a></li>
                        <li><a href="logout.php">Logout<span>&nbsp;|</span></a></li>
                    </ul>
                </div>
            </div>
            </div>
    </div>

    <div class="nav">
        <a href="#" class="logo">Online Store</a>

        <nav class="navbar">
            <a href="#">Home</a>
            <a href="#">Shop</a>
            <a href="#">Categories</a>
            <a href="discount.php">Sale</a>
            <a href="aboutus.php">About</a>

        </nav>

        <table>
            <table>
                <form method="get" action="search.php">
                    <td><input type="search" placeholder="Search..." name="q" class="input"></td>
                    <td>
                        <button type="submit"><i class="fas fa-search ic"></i></button>
                    </td>
                </form>
            </table>
        </table>
        <div class="icons">
            <a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-shopping-cart"></a>
        </div>
    </div>
    <div class="order">
        <!-- <h1>My Orders</h1> -->
    </div>
    <div class="container">
        <div class="container p-0">
            <div class="card px-4">
                <p class="h8 py-3">Payment Details</p>
                <div class="row gx-3">
                    <form action="payment.php" method="post">
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Sender Number</p>
                                <input class="form-control mb-3" type="number" name="sender" placeholder="01XXXXXXXXX" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex flex-column">
                                <p class="text mb-1">Transaction Id</p>
                                <input class="form-control mb-3" type="text" name="trid" placeholder="12345678435678" >
                            </div>
                        </div>
                        <div class="col-12">
                            <button>
                                <div class="btn btn-primary mb-3">
                                    <span class="ps-3">Pay <?=$total?> ৳</span>
                                    <span class="fas fa-arrow-right"></span>
                                </div>
                                
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // alert("gfsl");
    </script>
    <?php
    include('db.php');
    $uid=$_SESSION['cust_id'];
    $pid= $_REQUEST['pid'];
    $address= $_REQUEST['address'];
    $mobile= $_REQUEST['mobile'];
    $email= $_REQUEST['email'];
    $ship= $_REQUEST['ship'];
    $amount= $_REQUEST['amount'];
    $p=json_encode($pid);
    $_SESSION['pid']=$p;
    $_SESSION['address']=$address;
    $_SESSION['mobile']=$mobile;
    $_SESSION['email']=$email;
    $_SESSION['total']=$total;
    $_SESSION['moid']=$moid;
    // print_r($p);
    
    $qty= $_REQUEST['qty'];
    $len=count($pid);
    $vid="";
    for ($i = 0; $i <$len; $i++) {
        $q=mysqli_query($con,"SELECT `vendor_id` FROM `products` WHERE `product_id` ='$pid[$i]'");
        if(mysqli_num_rows($q)>0){
            if($row=mysqli_fetch_assoc($q)){
                $vid=$row['vendor_id'];
            }
        }
        mysqli_query($con,"INSERT INTO `orders`(`product_id`,`vendor_id`, `quantity`, `user_id`, `status`,`address`) VALUES ('$pid[$i]','$vid','$qty[$i]','$uid','pending','$address')");
    }
    $_SESSION['vid']=$vid;
    
    if(isset($_REQUEST['trid'])&&isset($_REQUEST['sender'])){
        $trid=$_REQUEST['trid'];
        $sender=$_REQUEST['sender'];
        mysqli_query($con,"INSERT INTO `payment_details`(`id`, `cust_id`, `product_id`, `vendor_id`, `amount`, `transaction_id`, `status`) VALUES ('$moid','$uid','$p','$vid','$total','$trid','request')");
    }

    // header('Location: cart.php');
    ?>
</body>
</html>