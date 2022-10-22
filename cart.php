<?php
@ob_start();
session_start();
if(isset($_REQUEST['product_id'])){
    include('db.php');
    $id=$_SESSION['cust_id'];
    $pid= $_REQUEST['product_id'];
    $result= mysqli_query($con, "SELECT * FROM `cart` WHERE `product_id`= '$pid' AND `cust_id`='$id'");
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $idd=$row['id'];
            mysqli_query($con, "UPDATE cart SET qty = qty + 1 WHERE id = $idd");
        }
    }
    else{
        mysqli_query($con, "INSERT INTO `cart` (`cust_id`, `product_id`, `qty`) VALUES ('$id', '$pid', '1');");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>My Cart</title>
</head>
<script>
    
    // $(document).ready(function(){
    //     var a=2;
    //     var val= [];
    //     var d={};
    //     var valu={"1":"fds"};
    //     var v=["hd"];
    //     var inputs = document.getElementsByClassName('vehicle');
    //     function valued(){
    //         for(var k = 0, l = inputs.length; k < l; ++k) {
    //         var nn=inputs.length;
    //         if(inputs[k].checked) {
    //             var j='vehicle'+k;
    //             v=document.getElementById(j).value;
    //             var v=["hdd"];
    //             d[k]=v;
    //             console.log(v);
    //         }
    //         console.log(d);
    //         }
    //         return d;
    //     }
    //     valu = valued();
    //     var postData = JSON.stringify({ lst: valu });
    //     for(var i = 0, l = inputs.length; i < l; ++i) {
    //         if(inputs[i].checked) {
    //             var j='vehicle'+i;
    //             v=document.getElementById(j).value;
    //             val[i]=v;
    //             // value=inputs[i].value;
    //             console.log("dfjghdkl");
    //             console.log(v);
    //         }
    //         console.log(val);
    //     }
    //     $("form").change(function(){
    //         // a=a+2
    //         // $.ajax({
    //         // type: "POST",
    //         // url: 'cartAjax.php',
    //         // data: valu,
    //         // dataType: 'json',
    //         // success: function(){
    //         // //success code here
    //         // console.log("success");
    //         // },
    //         // error: function(){
    //         // //error code here
    //         // console.log("fail");
    //         // }
    //         // });
    //         $("#right").load("cartAjax.php", {
    //             a:a,
    //             b:v,
    //             val:val,
    //             valu:JSON.stringify(val),
    //             value:postData,
    //             c:"f"
    //         });
            
    //     })
    // })
</script>
<style>
    <?php
		include "./css/cart.css";
		include "./css/common.css";
    ?>
    .topbar{
        width: 100%;
    }
</style>
<body>
    <div class="topbar">
        <div class="row">
            <div class="col-lg-5">
                <div class="buttonn">
                
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
            <form action="checkout.php" method="post" id="form">
                    <div class="left">
                    <!-- <table> -->
                    <div class="item grid-container">
                    <?php
                    include('db.php');
                    if(isset($_SESSION['cust_id'])){
                        $id=$_SESSION['cust_id'];
                        $result1=mysqli_query($con, "SELECT * FROM `cart` WHERE cust_id=$id");
                        if(mysqli_num_rows($result1)>0){
                            $i=0;
                            while($pr = mysqli_fetch_assoc($result1)){ 
                                $pid= $pr['product_id'];
                                $qty=$pr['qty'];
                                $product=mysqli_query($con, "SELECT * FROM `products` WHERE `product_id`= '$pid'");
                                while($pro=mysqli_fetch_assoc($product)){
                                    $price=$pro['price'];
                                    $product_id=$pro['product_id'];
                                    $name=$pro['name'];
                                    $image=$pro['image'];
                                    $vendor= mysqli_query($con, "SELECT `company_name` FROM `valid_v`");
                                    if($v=mysqli_fetch_assoc($vendor)){
                                        echo "<div class='company'><h3>".$v['company_name']."</h3></div>";
                                    }
                                    ?>
                                        
    
                                        
                                    <!-- <tr>
                                        <td> -->
    
                                            <div class="center">
                                                <input type="checkbox" class="vehicle input"  id="vehicle0" name="vehicle<?=$i?>" value="<?=$pid?>" onchange="hand(this)">
                                                <!-- <input type="checkbox" class="vehicle input"  id="vehicle<?=$i?>" name="vehicle<?=$i?>" value="<?=$pid?>" onchange="hand(this)"> -->
                                            </div>
                                        <!-- </td>
                                        <td> -->
                                            <div class="product center">
                                                <div class="img">
                                                    <img src="../ferdous/<?=$image?>" alt="">
                                                </div>
                                                <div class="name">
                                                    <?php
                                                    // $i++;
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
                                                            <input type="hidden" name="delet<?=$i?>" value="<?=$pr['id']?>">
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
                                                <input type="number" name="qty<?=$i?>" value="<?=$qty?>">
                                            </div>
                                        <!-- </td>
                                    </tr> -->
                                    <?php 
                                    $i++;
                                
                                }
                            }
                        }
                        // if(isset($_POST['delet'.$i])){
                        //     $cid=$_POST['delet'.$i];
                        //     mysqli_query($con, "DELETE FROM cart WHERE id = $cid");
                        // }
                    }
                    else{
                        echo "something went wrong or you should login";
                    }
                    
                    ?>
                    </div> 
                    <!-- </table> -->
                    <!-- <button   type="submit" onclick="submi()">PROCEED TO CHECKOUT1</button> -->
                    <!-- <button type="button" onclick="my_button_click_handler()">Click this button</button> -->
                    
                </div>

                <div class="right" id="right">

                    <h2>Order Summary</h2>
                    <div class="sTotal flex">
                        <h3>Sub Total</h3>
                        <!-- <h4>435</h4> -->
                        <input type="button" name="amountt" id="amount" value="0">
                        <input type="hidden" name="amount" id="a" value="0">
                    </div>
                    <div class="shippingFee flex">
                        <h3>Shipping Fee</h3>
                        <!-- <h4>3534</h4> -->
                        <input type="button" name="shipp" id="ship" value="0">
                        <input type="hidden" name="ship" id="s" value="0">
                    </div>
                    <div class="total flex">
                        <h1>Total</h1>
                        <!-- <h4>3534</h4> -->
                        <input type="button" name="totall" id="total" value="0">
                        <input type="hidden" name="total" id="t" value="0">
                    </div>
                    <button   type="submit" onclick="submi()" class="btn btn-info">PROCEED TO CHECKOUT</button>
                    <!-- <button type="button" class="btn btn-info">Info</button> -->
                </div>

            </form>
        </div>
    </div>
        <script>
            function hand(checkbox){
                if(checkbox.checked==true){
                    var datas="add=1&vehicle="+checkbox.value;
                    $.ajax({
                        type:"post",
                        url:"cartAjax.php",
                        data:datas,
                        cache:false,
                        success:function(data){
                            // alert(data);
                            var doc= document.getElementById('amount');
                            var tot= document.getElementById('total');
                            var shp= document.getElementById('ship');
                            var amount=doc.value;
                            var total=tot.value;
                            var ship=shp.value;
                            var a= parseInt(amount)+parseInt(data);
                            var s= parseInt(ship)+100;
                            var t= parseInt(amount)+parseInt(data)+s;
                            doc.value=a;
                            shp.value=s;
                            tot.value=t;
                            document.getElementById('a').value=a;
                            document.getElementById('s').value=s;
                            document.getElementById('t').value=t;

                        },
                        error: function(){
                        console.log("fail");
                        }
                        
                    });
                }
                else{
                    var datas="add=1&vehicle="+checkbox.value;
                    $.ajax({
                        type:"post",
                        url:"cartAjax.php",
                        data:datas,
                        cache:false,
                        success:function(data){
                            // alert(data);
                            // var doc= document.getElementById('amount');
                            // var amount=doc.value;
                            // var a= parseInt(amount)-parseInt(data);
                            // doc.value=a;
                            var doc= document.getElementById('amount');
                            var tot= document.getElementById('total');
                            var shp= document.getElementById('ship');
                            var amount=doc.value;
                            var total=tot.value;
                            var ship=shp.value;
                            var a= parseInt(amount)-parseInt(data);
                            var s= parseInt(ship)-100;
                            // var t= parseInt(amount)-parseInt(ship);
                            var t= parseInt(amount)-parseInt(data)-100;
                            doc.value=a;
                            shp.value=s;
                            tot.value=t;
                            document.getElementById('a').value=a;
                            document.getElementById('s').value=s;
                            document.getElementById('t').value=t;
                        },
                        error: function(){
                        console.log("fail");
                        }
                        
                    });
                }
            }
            function my_button_click_handler(){
                var n=[];
                var d={};
                var n={};
                var inputs = document.getElementsByClassName('vehicle');
                function values(){
                    for(var k = 0, l = inputs.length; k < l; ++k) {
                    var nn=inputs.length;
                    if(inputs[k].checked) {
                        var j='vehicle'+k;
                        v=document.getElementById(j).value;
                        d[k]=v;
                        // console.log(v);
                    }
                    // console.log(n);
                    }
                    return d;
                }
                var val = values();
                var post = JSON.stringify({ lst: val });
                for(var i = 0, l = inputs.length; i < l; ++i) {
                    var nn=inputs.length;
                    if(inputs[i].checked) {
                        var j='vehicle'+i;
                        v=document.getElementById(j).value;
                        n[i]=v;
                        // console.log(v);
                    }
                    // console.log(n);
                }
                alert(val);
                console.log(val);
                console.log(n+"sdlkglksd");
                console.log(post);
            }
            function submit(){
                alert("lfgflkdg");
                var pickedOne = false;
                var inputs = document.getElementsByTagName('input');
                for(var i = 0, l = inputs.length; i < l; ++i) {
                    if(inputs[i].checked) {
                    pickedOne = true;
                    alert("lfgflkdg");
                    alert('You picked ' + inputs[i].className);
                    break;
                    }
                }
                if(!pickedOne) {
                    alert('none');
                }
            }
            function submi(){
                document.getElementById('form').submit();
            }
        </script>
</body>
</html>