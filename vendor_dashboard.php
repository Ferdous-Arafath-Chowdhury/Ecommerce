<?php
@ob_start();
session_start();
include('ConnectionProvider.php');
if(!isset($_SESSION['vendor'])){
    header("location: vendor_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Kufam:wght@400;600&family=Lobster&family=Montserrat:wght@400;700&family=Poppins:wght@400;500;700&family=Roboto:wght@400;700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <!-- <link rel="icon" href="/icons/logo2.png" type="image/png"> -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <title>Dashboard</title>
</head>
<style>
    <?php 
    include('./css/common.css');
    include('vendor_dashboard.css');
    ?>
</style>
<body>
    <div class="top">
        <div class="logo">
            <img src="../ferdous/<?php echo $_SESSION['logo'];?>" alt="">
            <!-- <h1>hlkh</h1> -->
        </div>
        <div class="title">
            <h1><?=$_SESSION['vendor']?> Shop Dashboard</h1>
        </div>
        <div class="user" >
        <!-- <div class="dropdown"> -->
            <button class="dropbtn">
                <?php
                    echo $_SESSION['vendor'];
                ?>
            </button>
            <div class="content">
                <a href="vendor_logout.php">Logout</a>
                <!-- <a href="#">Link 2</a>
                <a href="#">Link 3</a> -->
            </div>
        <!-- </div> -->
        </div>
    </div>
    <div class="nav">
        <div class="home flex-col">
            <img src="./icons/landing-page.png" alt="">
            <h1>Home</h1>
        </div>
        <div class="messages flex-col">
        <img src="./icons/customer-support.png" alt="">
            <h1>Messages</h1>
        </div>
        <div class="orders flex-col">
        <img src="./icons/clipboard.png" alt="">
            <h1>Orders </h1>
        </div>
        <div class="warrenty flex-col">
        <img src="./icons/guarantee (1).png" alt="">
            <h1>Warrenty</h1>
        </div>
        <div class="reviews flex-col">
        <img src="./icons/reviews.png" alt="">
            <h1>Reviews</h1>
        </div>
        <div class="qna flex-col">
        <img src="./icons/feedback.png" alt="">
            <h1>Q & A</h1>
        </div>
    </div>
    <div class="container">

        <div class="left">
            <div class="product flex">
                <div class="num">
                    <h1>
                <?php
                include('ConnectionProvider.php');
                $vendor_id=$_SESSION['vendor_id'];
                $venmail=$_SESSION['email'];
                // echo $a;
                $result= mysqli_query($con, "SELECT COUNT(product_id) as num FROM `products` WHERE `vendor_id`= '$vendor_id'");
                while($row= $result->fetch_assoc()){
                    echo $row['num'];
                }
                ?></h1>
                </div>
                <div class="title">
                    <a href="viewproduct.php"><h1>Products</h1></a>
                    <p>
                        Total Product
                    </p>
                </div>
                <div class="icon">
                    <img src="./icons/box.png" alt="">
                </div>
            </div>
            <div class="product flex">
                <div class="num">
                    <h1>
                <?php
                include('ConnectionProvider.php');
                $result= mysqli_query($con, "SELECT COUNT(product_id) AS counts FROM orders WHERE `status`= 'pending' AND `vendor_id`= '$vendor_id'");
                while($row= $result->fetch_assoc()){
                    $pid=$row['counts'];
                    echo $pid;
                    // echo "<br>";
                    // $result= mysqli_query($con, "SELECT COUNT(product_id) FROM products WHERE `product_id`= '$pid' AND `vendor_id`= $vendor_id");
                }
                ?></h1>
                </div>
                <div class="title">
                    <h1>Orders</h1>
                    <p>
                        Total Pending Orders
                    </p>
                </div>
                <div class="icon">
                    <img src="./icons/clipboard.png" alt="">
                </div>
            </div>
            <div class="product flex">
                <div class="num">
                    <h1> 
                        
                    <?php
                include('ConnectionProvider.php');
                 $result= mysqli_query($con, "SELECT COUNT(id) AS counts FROM sugg_product WHERE `vendor_no`= '$venmail'");
                while($row= $result->fetch_assoc()){
                    $pid=$row['counts'];
                    echo $pid;
                    // echo "<br>";
                    // $result= mysqli_query($con, "SELECT COUNT(product_id) FROM products WHERE `product_id`= '$pid' AND `vendor_id`= $vendor_id");
                }
                ?>


                    </h1>
                </div>
                <div class="title">
                    
                  <a href="view_suggested_product.php"> <h1>Product Request</h1></a>
                    <p>
                        Total Product Request
                    </p>
                </div>
                <div class="icon">
                    <img src="./icons/clipboard.png" alt="">
                </div>
            </div>
            <div class="product flex">
                <div class="num">
                    <h1>
                <?php
                include('ConnectionProvider.php');
                $today = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
                $today = $today->format("Y-m-d");
                // echo $today;
                $date = new DateTimeImmutable($today);
                $newDate = $date->sub(new DateInterval('P30D'));
                $newDate= $newDate->format('Y-m-d') . "\n";
                
                // $result= mysqli_query($con, "SELECT SUM(`amount`) as num FROM `payment_details` WHERE time > '$newDate' AND `vendor_id`= '$vendor_id';");
                // if(mysqli_num_rows($result)>0){
                //     while($row= $result->fetch_assoc()){
                //         echo $row['num'];
                //         // print_r($row);
                //     }
                // }
                ?></h1>
                </div>
                <div class="title">
                    <h1>Sales</h1>
                    <p>
                        Last 1 month sales
                    </p>
                </div>
                <div class="icon">
                    <img src="./icons/increasing.png" alt="">
                </div>
            </div>
        </div>
        <div class="right">
            <!-- <canvas id="g"></canvas> -->
            <canvas id="myChart" width="700" height="400"></canvas>
        </div>
    </div>
    <!-- <script> -->
        <!-- <canvas id="myChart" width="400" height="400"></canvas> -->
<?php
$var = 'Metallica';
$var= array("12", "19", "3", "5", "2", "3");
// print_r($var);  
$users= json_encode($var);
// print_r($users);

include('ConnectionProvider.php');
$today = new DateTime('now', new DateTimeZone('Asia/Dhaka'));
$today = $today->format("Y-m-d");
// echo $today;
// $date = new DateTime($today);
$date_d = $date->format("d");
// echo "<br>".$date_d;
// $date = new DateTimeImmutable($today);
$newDate = $date->sub(new DateInterval('P'.$date_d.'D'));
$newDate= $newDate->format('Y-m-d') . "\n";
// echo "<br>".$newDate;
$i=0;
$sum = [];
$result1=mysqli_query($con, "SELECT DISTINCT SUBSTRING(`time_and_date`, 1, 10) AS year_mon FROM `orders` WHERE `time_and_date` > '$newDate' ORDER BY `time_and_date` ASC");
while($row= mysqli_fetch_assoc($result1)){
    $datemain = $row['year_mon'];
    // echo "<br>".$datemain."<br>";
    // $date_m_y = new DateTime($datemain);
    // $date_m_y = $date_m_y->format('M Y');
    // echo "<h2 class='year'>".$date_m_y."</h2>";

    $result=mysqli_query($con, "SELECT SUM(`quantity`) AS counts FROM `orders` WHERE `time_and_date` LIKE '$datemain%';");
    // print_r($result);
    // if(mysqli_num_rows($result)>0){
    // $i= 0;
    // $sum = [];
    while($rows= mysqli_fetch_assoc($result)){
        // echo $rows['counts'];
        // $count= array();
        $count=$rows['counts'];
        // echo $count;
        // $i++;
        //         // if($rows['time'] != NULL){
            //         $date = new DateTime($rows['time']);
    //         $date_y = $date->format("Y-m");
    
    //         // }
    //         $date_m = $date->format("m");
    //         echo "
    //         <div class='flex'>
    //             <div class='date'>".
    //                 $date_m."
    //             </div>
    //             <div class='details'><h3 class='name'>".
    //                 $rows['name']."</h3>
    //                 <p>".$rows['description']."</p>
    //                 <p>".$rows['place']."</p>
    //             </div>
    //         </div>";
    
    //     }
    }
    // print_r($count);
    $sum[$i]= $count;
    $i++;
    

    
}
// print_r($sum);
$users= json_encode($sum);
// print_r($users);
$length= count($sum)+2;
// echo $length;

?>
<script>
    function logout(){
        
    }
// const ctx = document.getElementById('myChart').getContext('2d');
// const ctx = document.getElementById('g').getContext('2d');
    <?php
        echo "var jsvar ='$users';";
    ?>
    // var jsvar=<?=$users?>.toString();
    console.log(jsvar); 
    var arr = [...Array(<?=$length?>+2).keys()].map(x => x);
    // var arr=arr.toString();
    // console.log("arr=" + arr.toString());
const ctx = document.getElementById('myChart').getContext('2d');
// var a=[]
// for (var i=0;i<30;i++){
//     a[i]=i
// }
// console.log(a)
// var yValues = [50,60,70,180,90,100,10,120,10,140,150];
var yValues = jsvar;
// var xValues = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29,30, 31];
var xValues = arr;
const myChart = new Chart(ctx, {

  type: "line",
  data: {
        labels: xValues,
        datasets: [{
            label: "Orders in this month",
            data: yValues,
            backgroundColor: '#c8e1f1',
            borderColor: '#0084db',
            fill: true,
            lineTension: 0,
            pointRadius: 3
        }
        ]
    },
    options: {
        plugins: {
            legend: {
                labels: {
                    color: '#000',
                    boxWidth: 0,
                    font: {
                        size: 19
                    }
                }
            }
        },
        scales: {
            xAxes: {
                title: {
                    color: 'black',
                    display: true,
                    text: 'Month',
                    font: {
                        size: 18
                    }
                },
                ticks:{
                    color: 'black',
                    font: {
                        size: 14
                    }
                }

            },
            y: {
                min: 0,
                title: {
                    color: 'black',
                    display: true,
                    text: 'Amount',
                    font: {
                        size: 18
                    }
                },
                ticks:{
                    color: 'black',
                    stepSize: 10000,
                    font: {
                        size: 14
                    }
                }

            }
        }
    }
});
</script>
    </script>
</body>
</html>