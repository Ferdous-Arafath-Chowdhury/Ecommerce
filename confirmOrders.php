<?php
@ob_start();
session_start();
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

    <title>Orders</title>
    <style>
		<?php
		include "./css/common.css";
		include "./css/confirmOrder.css";
		?>
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
        <h1>Orders</h1>
    </div>
    <div class="container">
        <?php
        include('db.php');
        // session_start();
        // if(!isset($_SESSION['cust_id'])){
        //     $uid="";
        // }
        // else{
        //     $uid = $_SESSION['cust_id'];
        // }
        $result= mysqli_query($con,"SELECT * FROM `orders`");
        if(mysqli_num_rows($result)>0){
            while($row= mysqli_fetch_assoc($result)){
                echo '<div class="content"><div class="idDate">';
                    echo "<h4 class='id'>Order <span>#".$row['order_id']."</span></h4>";
                    $date=$row['time_and_date'];
                    $formate=new datetime($date);
                    $formate=$formate->format("d-M-Y H:i:s");
                    echo "<p class='date'>Placed on date ".$formate."</p>";
                echo '</div>';?>
                <div class="orders">
                    <?php
                    $id=$row['product_id'];
                    $result1= mysqli_query($con, "SELECT * FROM `products` WHERE `product_id` = '$id'");
                    if($nam=mysqli_fetch_assoc($result1)){
                        // print_r(
                        $name=$nam['name'];
                        $image=$nam['image'];
                    ?>
                    <div class="name center">
                        <div class="img">
                            <img src="../ferdous/<?=$image?>" alt="">
                        </div>
                        <div class="namee">
                            <?=$name;?>
                        </div>
                        
                    </div>
                    <?php }
                    ?>
                    <div class="qty center">
                        <span>Qty:</span><?=$row['quantity']?>
                    </div>
                    <div class="status center">
                        <span><?=$row['status']?></span>
                    </div>
                    <div class="dDate center">
                        <!-- <?=$row['delivery']?> -->
                        <form action="confirmOrder.php" method="post">
                            <input type="hidden" name="pid" value="<?=$id?>">
                            <input type="hidden" name="pid" value="<?php echo $id;?>">

                            <button type="submit">Confirm</button>
                        </form>
                    </div>
                </div>
                </div>
                <!-- <script> alert("slkfj")</script> -->
            <?php }
        }
        if(isset($_REQUEST['pid'])){
            $id=$_REQUEST['pid'];
            echo $id;
            include('db.php');
            echo "<script> alert('$id')</script>";
            mysqli_query($con,"UPDATE `orders` SET `status`='paid' WHERE `order_id`= $id");
        }
        ?>
    </div>
</body>
</html>