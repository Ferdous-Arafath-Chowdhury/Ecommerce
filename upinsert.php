<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
</head>
<body>
    <?php
             include 'ConnectionProvider.php';

            //   if(isset($_POST['submit']))
            //   {
              $id  = $_POST['id'];
              $name = $_POST['Name'];
              $Image = $_FILES['myfile'];
              $filename = $Image['name'];
              $iserror  =  $Image['error'];
              $ftemp = $Image['tmp_name']; 

              $loc = 'products/'.$filename;
              move_uploaded_file($ftemp,$loc);
             $desc = $_POST['des'];
              $cat= $_POST['cat'];
              $price=  $_POST['price'];
              $discount=  $_POST['discount'];
              $price=  $_POST['price'];
              $qnt=  $_POST['qnt'];
              $venid=  $_POST['venid'];
             
              $brand=  $_POST['brand'];
             
             
             
          
               $q = "UPDATE `products` SET `name`= '$name',`description` ='$desc',`category`='$cat',`price`='$price',`category_id`='$discount',`quantity`='$qnt',`image`='$loc',`vendor_id`='$venid',`brand`='$brand' WHERE product_id = '$id'";
          
          $run= mysqli_query($con,$q);
            echo  "unamepass: ".$name.", ".$loc.",  ".$desc;
          if($run)
          {
          echo"
          
          <script>
                alert('Successfully  Updated');
               
                
             </script>
             
          
          
          ";
           header("location: viewproduct.php");
          
             }

             else
             {
              die("Could not connect to the database ".mysqli_connect_error());
             }
            

    
             
          
          
          
            
            

          



    ?>
</body>
</html>