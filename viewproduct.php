
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome/css/all.css">



<title>Product List</title>
  </head>
  <body  style="background-color: #2eb0ac ;">

       
<?php
        //   include  'navbar.php';
          include 'ConnectionProvider.php';
        
    ?>
    
<div class="topbar">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm">LOTO</a>
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

<h2 style="text-align: center; color: white;">Product List</h2>




<table class="table table-light table-sm">
<thead style="color : green;">
    <tr>
            <th class="text-center">ID</th>
                <th class="text-center">Product Name</th>
                <!-- <th class="text-center">Description</th> -->
                <th class="text-center">Category</th>
                <th class="text-center">Price</th>
                <th class="text-center">Category ID</th>
                <th class="text-center">Quantity</th>
                <th class="text-center">Image</th>
                <th class="text-center">Vendor ID</th>
                <th class="text-center">Brand</th>
                <th class="text-center">Time and date</th>
                <th class="text-center">Action</th>

    </tr>
    
</thead>
<!-- <tbody> -->
        <?php

            

            $sql ="select * from products ";

            $res =mysqli_query($con, $sql);

            while($rows = mysqli_fetch_assoc($res))
            {
            

        ?>
          
            <tr style="color : black;">
            <td class="py-2"><?php echo $rows['product_id']; ?></td>
            <td class="py-2"><?php echo $rows['name']; ?></td>
            <!-- <td class="py-2"><?php echo $rows['description']; ?></td> -->
            <td class="py-2"><?php echo $rows['category']; ?></td>
            <td class="py-2"><?php echo $rows['price']; ?> </td>
            <td class="py-2"><?php echo $rows['category_id']; ?> </td>
            <td class="py-2"><?php echo $rows['quantity']; ?> </td>
            <td class="py-2">   <img src=" <?php echo $rows['image']; ?>"
               height = "100px" width = "100px"
                </td>
            <td class="py-2"><?php echo $rows['vendor_id']; ?> </td>
            <td class="py-2"><?php echo $rows['brand']; ?> </td>
            <td class="py-2"><?php echo $rows['time_and_date']; ?> </td>
           
            
            <td><a href="update.php? id= <?php echo $rows['product_id'] ;?>"> <button  name = "submit" class="btn" style="background-color : green; color: white">Update</button></a> <nbsp>
           <a href="deleteproduct.php? id= <?php echo $rows['product_id'] ;?>"> <button  name = "submit" class="btn" style="background-color : red; color: white">Delete</button></a></td> 
           
      
        <?php
            }

        ?>
        </tbody>
    </table>


    

<!-- </body> -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    


    
  </body>
</html>









