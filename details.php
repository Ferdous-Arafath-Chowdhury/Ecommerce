<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Multivendor E-commerce</title>
    <style>


<?php

session_start();
?>
  
    form{
      margin:30px;
      margin-top:10px;
    }
    input,textarea{
      width:90%;
      margin-top:30px;
    }
    
    textarea{
      height:130px;
      width: 60px;
      background-color: green ;
    }
    button{
      margin-top:20px;
      text-align:center;
    }
    <style>
        #ques{
            min-height: 433px;
        }

        .headtips{
        margin: 8px auto 0px 30px;
      }
      .tips{
          margin: 8px auto 0px 30px;
          border: 1px solid gray;
          padding:5px;
          width: 60%; 
         
      }
      .aa
      {
           background-color: black; 
      }
      .hd 
      {
        margin: 3px auto 0px 30px;
      }
      .media-body 
      {
      
   //    margin-bottom: 3px;  ; 
      }
    .media tips
      {
        width: 60% ; 
      }
      .checked 
      {
        color:orange ; 
      }

      * {box-sizing: border-box;}

.img-magnifier-container {
  position: relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
 
  width: 100px;
  height: 100px;
}
    </style>


  <script>

  function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

 
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  img.parentElement.insertBefore(glass, img);

 
  glass.style.backgroundImage = "url('" + img.src + "')"; // background
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;


  glass.addEventListener("mousemove", moveMagnifier); // moving mouse
  img.addEventListener("mousemove", moveMagnifier);

  
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
   
    e.preventDefault();
 
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
 
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    
    glass.style.left = (x - w) + "px"; // posiition
    glass.style.top = (y - h) + "px";

    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    
    a = img.getBoundingClientRect();
    x = e.pageX - a.left;
    y = e.pageY - a.top;

    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
      </script>
  </head>
  <body>

  <?php
   // session_start();
   include 'ConnectionProvider.php';
    $id = $_GET['product_id'];
    // echo  "$id";
    $sql = "SELECT * FROM products WHERE product_id = '$id' " ; 
    $run = mysqli_query($con,$sql) ;


    $sql1 = "SELECT AVG(Rating) AS AverageRating FROM review_rating WHERE product_id = '$id' ";
    $run1 = mysqli_query($con,$sql1) ;
    $output = mysqli_fetch_assoc($run1);
    if(!$run1)
    {
      die("Could not connect to the database ".mysqli_connect_error());
    }



?> 



 
 <div class="topbar">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm"> Guest</a>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                  <li><a href="login.php">Login<span>&nbsp;|</span></a></li>
                  <li><a href="#">Register <span>|</span></a></li>
                  <li><a href="#">My Account <span>|</span></a></li>
                  <li><a href="#">Contact</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
    </div>


<div class="container">

<h2 style = "color: green;  ">Product Details</h2>
<br><br>

<?php
   while($rows = mysqli_fetch_assoc($run))
   {

?> 
<div class="row">
    <div class="col-md-5">
    <div class="img-magnifier-container">
    <img id = "myimage" src=  " <?php echo $rows['image']; ?> " 
               height = "300px" width = "300px"> 
               <button onclick = "magnify_start(myimage,2) "  style = "color:green;">Magnify Image</button>
      </div>
    </div>
   

    <script>

      function  magnify_start()
      {

        magnify("myimage", 2);
        

      }
        </script>


    <div class="col-md-7">
         <h3> <?php echo $rows['name'] ?> </h3>
         <p>  <strong> Price:  <?php   echo $rows['price'] ?> </strong>  </p>
         <?php
          if($rows["quantity"]  == 0)
          {
              echo ' <h4>   Out Of Stock   </h4>';
          }

          else

        {
            echo ' <h3 style = "color: green">   In  Stock   </h3>';
        }

?> 
      <h3 style = "color: black"> Avalable Items:  <?php echo $rows['quantity'] ?> </h3> 
      <h3 style = "color: black">  Brand Name :  <?php echo $rows['brand'] ?> </h3><br>
        <h3 style  = "color: black">Product Description</h3>
      <p>  <b></b> <?php   echo $rows['description'] ?> </b>  </p>


        </div>
</div>
</div>

<?php
   }
   ?> 

    <?php
$method = $_SERVER['REQUEST_METHOD'];
if($method == 'POST')
{
   
  if(isset($_SESSION['username'])){
   
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $email =  $_SESSION['username']; 
 
   
    // echo "$id"; 

    $sql = "INSERT INTO  review_rating(`Review`, `Rating` , `rev_by`, `product_id`) Values('$review', '$rating', '$email', '$id'  )";
    $run  = mysqli_query($con,$sql);
  
if($run)
{
// echo"found";

}
else
{

$aler =  "<script>alert('Something Wrong')</script>";
echo $aler;


}
}

else 
{
  $aler =  "<script>alert('Please Login first to add review')</script>";
  echo $aler;

}
}
?> 



    <form action= "<?php $_SERVER['REQUEST_URI'] ?> " method="POST">
    <label for="ratings">Put Your Ratings</label> 

<select name="rating" id="rating">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
 <br>
 <h5 > <b>Review This Product </b> </h5>
  <textarea style="margin-top:20px;  width: 1000px; background-color:  blanchedalmond; " class="form-control" placeholder="Put Your Review here" id="floatingTextarea" name = "review" ></textarea>

<button style="margin-top:15px" type="submit" class="btn btn-primary" name='submit'>Submit</button> 
</form>

<?php

  $avg = $output['AverageRating'];
?>

<p  style = "color: orange; font-size:30px; margin-left: 30px  ;" > <strong>Avarage Rating:   <?php echo     number_format($avg,2)  ?>  </strong>   </p>
<h4 style = "color: green ; margin-left: 30px; ">View All Reviews</h4>
<br>

<?php
    
   // $sql = "SELECT * FROM `review_rating` WHERE product_id =$id"; 
     $sql = "SELECT * FROM `review_rating`  WHERE product_id =$id  ORDER BY review_id DESC "; 

//     SELECT * FROM Customers
// ORDER BY Country DESC;
    $result = mysqli_query($con, $sql);
    while($row = mysqli_fetch_assoc($result)){
       
        // $desc = $row['des'];
        // $id = $row['id']; 
        // $time = $row['time_data'];
          $sender =  $row['rev_by'];
          $rating = $row['Rating'];
          $review = $row['Review']; 
          $time = $row['time_and_date']; 

          

?>



 
   <p class = "hd"  style > <strong>  Reviewed by <?php echo $sender ?>  at  </strong>  <?php echo $time ?>  </p>
    <p class = "hd"  style >  <strong> 
      
    <?php
    for ($i=0; $i <$rating ; $i++) { 
      echo ' <i class="fa fa-star" style =  "color: orange" aria-hidden="true"></i>';
    }
    
    
    ?>  </strong> </p>
   
    

<div class="media tips" style="padding: 3t;" >
      <div class="media-body" style = " background-color:  #a9e7e4f9;; " >
 <?php echo $review ?>
</div>

</div>
<?php
        

    }
    
    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>