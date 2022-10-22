<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">


    <title>View Suggested Product</title>

    <style>

      .py-2 
      {
        font-size: 20px; 
        font-weight: bold;
      }

      th
      {
           font-size: 20px; 
      }
    </style>
  </head>
  <body style = "background-color: #2EB0AC">

  <?php
    session_start();
   include 'ConnectionProvider.php';
   if(isset($_SESSION['email']))
   {
    $ven_email = $_SESSION['email'] ;
    $company = $_SESSION['vendor'] ;

    // echo  $ven_email;

    
  
    // $sql = "SELECT * FROM sugg_product WHERE vendor_no = '$ven_email' ";
    // $run = mysqli_query($con,$sql);
    // $output = mysqli_fetch_assoc($run,$sql);
    // $trac = $output['email']; 
    $sql1 = "SELECT * FROM sugg_product WHERE vendor_no = '$ven_email'";
    $run1 = mysqli_query($con,$sql1);

   }


    ?> 
  

<div class="topbar">

        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm"> <?php  echo $company ?> </a>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                  
                  <li><a href="index.php">Go Home <span></span></a></li>
                  <!-- <li><a href="#">My Account <span>|</span></a></li>
                  <li><a href="busireq.html">Become A Vendor<span>|</span></a></li> -->
                  <!-- <li><a href="adminlogin.html">Admin?<span>|</span></a></li>
                  <li><a href="addproduct.php">Add product<span>|</span></a></li> -->
                  <li><a href="#">Contact</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
    </div>
 
 

      <h3  style = "text-align: center; ">  <strong>   Requests for importing new products         </strong>    </h3>
<table class="table table-light table-sm" style = "color : #2EB0AC; ">
<thead style="color : green;">
    <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Product Name</th>
                <th class="text-center">Product Description</th>
                <!-- <th class="text-center">Description</th> -->
                
                <th class="text-center"> <strong> Demo Picture  </strong> </th>
                <th class="text-center"> <strong> Suggested By </strong> </th>
                <th class="text-center">  <strong>  Time And Date </strong> </th>
                <th class="text-center"> <strong>  Action </strong> </th>
                <!-- <th class="text-center">Action</th> -->

    </tr>
    
</thead>

<?php

            

// $sql ="select * from products ";

// $res =mysqli_query($con, $sql);

while($rows = mysqli_fetch_assoc($run1))
{


?>

<tr style="color : black;">
<td class="py-2"><?php echo $rows['id']; ?></td>
<td class="py-2"><?php echo $rows['name']; ?></td>
<td class="py-2"><?php echo $rows['product_des']; ?></td>


<td class="py-2">   <img src=" <?php echo $rows['pic']; ?>"
   height = "130px" width = "130px"
    </td>
<td class="py-2">  <?php echo $rows['suggested_by']; ?>  </td>

<td class="py-2"><?php echo $rows['time_date']; ?> </td>
<td>
<a href="delete_request.php? id= <?php echo $rows['id'] ;?>"> <button  name = "submit" class="btn" style="background-color : red; color: white">Delete</button></a></td> 
</td>     



<?php
}

?>
</tbody>
</table>



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