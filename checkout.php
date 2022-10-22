<?php
session_start();
$amount =$_REQUEST['amount'];
$ship =$_REQUEST['ship'];
$total =$_REQUEST['total'];

$_SESSION['amount'] = $amount;
$_SESSION['total'] = $total;
?>
<?php
if(isset($_REQUEST['delete'])){
    header("location: ../index.php");
    echo "lsdfs";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>Proceed to Checkout</title>
</head>
<script>
</script>
<style>
    <?php
		include "./css/checkout.css";
		include "./css/common.css";
    ?>
</style>
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
    <div class="container">
        <div class="content">
            <form action="pay.php" method="post" id="form">
                    <div class="left">
                    <!-- <table> -->
                    <div class="item grid-container">
                        <div class="product aaa">
                            Items
                        </div>
                        <div class="price aaa">
                            Price
                        </div>
                        <div class="qty aaa">
                            Quantity
                        </div>
                    <?php
                    include('db.php');
                    // if(isset($_POST['vehicle0']) && isset($_POST['qty1'])){
                    //     echo "ljlhfghgfdlkhngkjghdskjgkjfdshghkjfsdhgkjd jkg hjkdf gkjrsdhgj hghfdkjghfdk ";
                    // }
                    $j="";
                    $k = 0;
                    $pidd=[];
                    for($i=0;$i<10;$i++){
                        $id="vehicle".$i;
                        $q="qty".$i;
                        
                        // echo $qty;
                        if(isset($_REQUEST["$id"])){
                            // array_push($pidd, $_REQUEST["$id"]);
                            $pidd[$i]= $_REQUEST["$id"];
                            $pid['prd'.$i]= $_REQUEST["$id"];
                            $qty['qnt'.$i]= $_REQUEST["$q"];
                            $_SESSION['qnt'.$i] = $qty['qnt'.$i];
                            $_SESSION['prd'.$i] =  $pid['prd'.$i];
                            $k = $k+1;
                            $pd[$i] = $pid['prd'.$i];
                             
                            // $_SESSION['qnt'] = $qty[$i];
                            // echo $pid;
                            // echo "<br>";

                            // }
                            
                            // $result1=mysqli_query($con, "SELECT * FROM `cart`");
                            // if(mysqli_num_rows($result1)>0){
                            //     // $i=0;
                            //     while($pr = mysqli_fetch_assoc($result1)){ 
                            // $pid= $pr['product_id'];
                            // $qty=$pr['qty'];
                            $product=mysqli_query($con, "SELECT * FROM `products` WHERE `product_id`= '$pd[$i]'");
                            while($pro=mysqli_fetch_assoc($product)){
                                // echo "ldfgjlkfdjgklfdjglkdf";
                                $j = 0;
                                $price=$pro['price'];
                                $_SESSION['price'.$i] = $price;
                                $name = $pro['name'];
                                $Name['nm'.$i] = $pro['name'];//gggg
                                $_SESSION['nm'.$i] = $Name['nm'.$i];//ggggggggggg
                                // $product_id=$pro['product_id'];
                                // $name=$pro['name'];
                                $image=$pro['image'];
                                $vendor= mysqli_query($con, "SELECT `company_name` FROM `valid_v`");
                                if($v=mysqli_fetch_assoc($vendor)){
                                    echo "<div class='company'><h3>".$v['company_name']."</h3></div>";
                                }
                                ?>
                                    

                                    
                                    <!-- <tr>
                                        <td> -->
                                            <!-- </td>
                                            <td> -->
                                                <div class="product center">
                                                    <div class="img">
                                                    <img src="../ferdous/<?=$image?>" alt="fghgdf">
                                                </div>
                                                <div class="name">
                                                    <?php
                                                    echo $name;
                                                    ?>
                                                </div>
                                            </div>
                                            
                                            <!-- </td>
                                            <td> -->
                                                
                                            <div class="price centerr">
                                                <div class="colflex">
                                                    <div class="pric">
                                                        <?php
                                                    $a=11;
                                                    echo "৳ ".$price;
                                                    ?>
                                                    </div>
                                                    <div class="flex">
                                                        <span class="iconify" data-icon="icon-park-outline:oval-love-two"></span>
                                                        <for action="" method="post">
                                                            <input type="hidden" name="delet" value="">
                                                            <button type="submit">
                                                                <span class="iconify" data-icon="fluent:delete-28-regular"></span>
                                                            </button>
                                                        </for>
                                                    </div>
                                                </div>
                                            </div>
                                        <!-- </td>
                                        <td> -->
                                            <div class="qty  centerrr">
                                                <?=$qty['qnt'.$i]?>
                                            </div>
                                            <!-- </td>
                                    </tr> -->
                                    <!-- <?php 
                                     $j = $j+1;
                                    // $j = $j-1;
                                
                                } ?>
                                <input type="hidden" name="pid" value="<?php print_r($pid)?>">
                                <input type="hidden" name="pidd" value="<?php print_r($pidd)?>">
                                <input type="hidden" name="qty" value="<?php print_r($qty)?>"> -->
                                <?php
                            }


                           //  $_SESSION['qnt'] = $qty;
                        }

                        $_SESSION['n_of_product'] = $k;
                        ?>
                                <!-- <input type="hidden" name="address" value="<?php echo $ro['address'];?>"> -->
                                <input type="hidden" name="pidd" value="<?php print_r($pidd)?>">
                                <?php foreach ($pid as $key => $value) {
                                ?>
                                <input type="hidden" name="pid[]" value="<?php echo $value;?>">
                                <?php }?>
                                <!-- <input type="hidden" name="qty" value="<?php print_r($qty)?>"> -->
                                <?php foreach ($qty as $key => $value) {
                                ?>
                                <input type="hidden" name="qty[]" value="<?php echo $value;?>">
                                <?php }?>
                                <?php 
                    // }
                        // if(isset($_REQUEST['delete']))
                    ?>
                    </div> 
                    <!-- </table> -->
                    <!-- <button   type="submit" onclick="submit()">Submit</button>
                    <button type="button" onclick="my_button_click_handler()">Click this button</button> -->
                    
                </div>
                <div class="right" id="right">
                    <div class="info">
                        <!-- <form action="" method="post"> -->
                        <div class="flex ">
                            <div class="name">
                                <?php
                                include('db.php');
                                $q= mysqli_query($con, "SELECT `name` FROM `customers`");
                                if(mysqli_num_rows($q)>0){
                                    if($row= mysqli_fetch_assoc($q)){ 
                                        echo $row['name'];
                                    }
                                }
                                ?>
                            </div>
                            <div class="edit">
                                <button class="btn bn-info" id="editBtn" onclick="edit()">Edit</button>
                            </div>
                        </div>
                        <div id="ed" class="margin">
                            <span> <i class="fa-solid fa-location-pin"> </i> </span>
                        <?php
                        include('db.php');
                        $r= mysqli_query($con, "SELECT `address` FROM `customers`");
                        if(mysqli_num_rows($r)>0){
                            if($ro= mysqli_fetch_assoc($r)){
                                ?>
                                <input type="button" class="input" id="edit" value="<?php echo $ro['address'];?>">
                                <input type="hidden" name="pidd" value="<?php print_r($pidd)?>">
                                <input type="hidden" name="address" value="<?php echo $ro['address'];?>">
                                <?php 
                            }
                        }
                        ?>
                        </div>
                        <div class="flex margin">
                            <div class="mobile">
                            <span><i class="fa-solid fa-phone"> </i> </span>
                                <?php
                                include('db.php');
                                $q= mysqli_query($con, "SELECT `mobile` FROM `customers`");
                                if(mysqli_num_rows($q)>0){
                                    if($mo= mysqli_fetch_assoc($q)){ 
                                        ?>
                                        <input type="button" class="input" id="mobile" value="<?php echo $mo['mobile'];?>">
                                        <input type="hidden" name="mobile" value="<?php echo $mo['mobile'];?>">
                                        <?php 
                                    }
                                }
                                else{
                                    echo "Mobile Number";
                                }
                                ?>
                            </div>
                            <div class="edit">
                                <button class="btn btn-ifo" id="mBtn" onclick="mobile()">Edit</button>
                            </div>
                        </div>
                        <div class="flex margin">
                            <div class="email">
                                <span><i class="fa-solid fa-envelope"> </i> </span>
                                <?php
                                include('db.php');
                                $q= mysqli_query($con, "SELECT `email` FROM `customers`");
                                if(mysqli_num_rows($q)>0){
                                    if($em= mysqli_fetch_assoc($q)){ 
                                        ?>
                                        <input type="button" class="input" id="email" value="<?php echo $em['email'];?>">
                                        <input type="hidden" name="email" value="<?php echo $em['email'];?>">
                                        <?php 
                                    }
                                }
                                else{
                                    echo "Mobile Number";
                                }
                                ?>
                            </div>
                            <div class="edit">
                                <button class="btn btn-ifo" id="eBtn" onclick="email()">Edit</button>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                    <div class="summery">
                        <h2>Order Summary</h2>
                        <div class="sTotal flex">
                            <h3>Sub Total</h3>
                            <input type="button" class="input" id="amount" value="<?=$amount?>">
                            <input type="hidden" class="input" name="amount" value="<?=$amount?>">
                        </div>
                        <div class="shippingFee flex">
                            <h3>Shipping Fee</h3>
                            <input type="button" class="input" id="ship" value="<?=$ship?>">
                            <input type="hidden" class="input" name="ship" value="<?=$ship?>">
                        </div>
                        <div class="vouchar">
                            <input type="text" id="vouchar" name="vouchar">
                            <!-- <button onclick="apply()">Apply</button> -->
                        </div>
                        <div class="total flex">
                            <h1>Total</h1>
                            <input type="button" class="input"  id="total" value="<?=$total?>">
                            <input type="hidden" class="input" name="total" value="<?=$total?>">
                        </div>
                        <button   type="submit" onclick="submi()" class="btn btn-info">PROCEED TO CHECKOUT</button>
                        <!-- <button type="button" class="btn btn-info">Info</button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
        <script>
            function edit(){
                // alert("lgjsls")
                var a=document.getElementById("edit");
                var b=document.getElementById("editBtn");
                b.style.display="none"
                // document.getElementById("myDIV").style.display = "none";
                // document.getElementById("edit").type="input";
                // document.getElementById("myDIV").classList
                a.classList.add("shown");
                a.classList.remove("input");
                a.type="input"
            }
            function mobile(){
                var a=document.getElementById("mobile");
                var b=document.getElementById("mBtn");
                b.style.display="none"
                a.classList.add("shown");
                a.classList.remove("input");
                a.type="input"
            }
            function email(){
                var a=document.getElementById("email");
                var b=document.getElementById("eBtn");
                b.style.display="none"
                a.classList.add("shown");
                a.classList.remove("input");
                a.type="input"
            }
            function apply(){
                var a=document.getElementById("vouchar");
                
            }
            // function my_button_click_handler(){
            //     var n=[];
            //     var d={};
            //     var n={};
            //     var inputs = document.getElementsByClassName('vehicle');
            //     function values(){
            //         for(var k = 0, l = inputs.length; k < l; ++k) {
            //         var nn=inputs.length;
            //         if(inputs[k].checked) {
            //             var j='vehicle'+k;
            //             v=document.getElementById(j).value;
            //             d[k]=v;
            //             // console.log(v);
            //         }
            //         // console.log(n);
            //         }
            //         return d;
            //     }
            //     var val = values();
            //     var post = JSON.stringify({ lst: val });
            //     for(var i = 0, l = inputs.length; i < l; ++i) {
            //         var nn=inputs.length;
            //         if(inputs[i].checked) {
            //             var j='vehicle'+i;
            //             v=document.getElementById(j).value;
            //             n[i]=v;
            //             // console.log(v);
            //         }
            //         // console.log(n);
            //     }
            //     alert(val);
            //     console.log(val);
            //     console.log(n+"sdlkglksd");
            //     console.log(post);
            // }
            // function submit(){
            //     alert("lfgflkdg");
            //     var pickedOne = false;
            //     var inputs = document.getElementsByTagName('input');
            //     for(var i = 0, l = inputs.length; i < l; ++i) {
            //         if(inputs[i].checked) {
            //         pickedOne = true;
            //         alert("lfgflkdg");
            //         alert('You picked ' + inputs[i].className);
            //         break;
            //         }
            //     }
            //     if(!pickedOne) {
            //         alert('none');
            //     }
            // }
            function submi(){
                document.getElementById('form').submit();
            }
        </script>
</body>
</html>