
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


<title>View Vendor Request</title>
  </head>
  <body  style="background-color: #2EB0AC ;">

  <div class="topbar">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <!-- <a href="" class="btn btn-success btn-sm"> Guest</a> -->
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                <li><a href="index.php">Go Home</a></li>
                  <li><a href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
    </div>


       
<?php
        //   include  'navbar.php';
          include 'ConnectionProvider.php';
          
    ?>

<h3 style="text-align: center; color: white;"> List Of Vendor Request</h3>
<br>



<table class="table table-light table-sm"> 
<thead style="color : black;">
    <tr  style="color : black;">
            <th class="text-center">ID</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">NID</th>
                <th class="text-center">Seller Type</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Applicant's File</th>
                <th class="text-center">Download PDF</th>
                <th class="text-center">Time and Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>

    </tr>
    
</thead>
<!-- <tbody> -->
        <?php

            

            $sql ="select * from vendors";

            $res =mysqli_query($con, $sql);

            while($rows = mysqli_fetch_assoc($res))
           {
            

        ?>
          
            <tr style="color : black;">
            <td class="py-2"><?php echo $rows['vid']; ?></td>
            <td class="py-2"><?php echo $rows['Company_name']; ?></td>
            <td class="py-2"><?php echo $rows['Email']; ?></td>
            <td class="py-2"><?php echo $rows['phone']; ?></td>
            <td class="py-2"><?php echo $rows['NID']; ?> </td>
            <td class="py-2"><?php echo $rows['seller_type']; ?> </td>
            <td class="py-2">   <img src=" <?php echo $rows['image']; ?>"
               height = "100px" width = "100px">
                </td>
                <td class="py-2"><?php echo $rows['pdf']; ?> </td>
                <td><a href="downloadpdf.php? id= <?php echo $rows['file_name'] ;?>"> <button  name = "submit" class="btn" style="background-color : green; color: white">Download PDF</button></a> <nbsp>
            <td class="py-2"><?php echo $rows['time_and_date']; ?> </td>
           
            <td class="py-2"><?php echo $rows['_Status']; ?> </td>
            <td><a href="sendmail.php? id= <?php echo $rows['vid'] ;?>"> <button  name = "submit" class="btn" style="background-color : green; color: white">Accept</button></a> <nbsp>
           <a href="sendmail.php? id= <?php echo $rows['vid'] ;?>"> <button  name = "submit" class="btn" style="background-color : red; color: white">Reject</button></a></td> 
           
      
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









