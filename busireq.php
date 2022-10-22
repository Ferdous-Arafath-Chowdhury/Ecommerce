<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'ConnectionProvider.php';
$company =  $_REQUEST['company'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phn'];
$Nid = $_REQUEST['nid'];
$stype =  $_REQUEST['stype'];
$Image = $_FILES['myfile'];
$filename = $Image['name'];
$iserror  =  $Image['error'];
$ftemp = $Image['tmp_name']; 
$loc = 'venreq/'.$filename;
 move_uploaded_file($ftemp,$loc);


$Image2 = $_FILES['myfilepdf'];
$filename = $Image2['name'];
$iserror  =  $Image2['error'];
$ftemp = $Image2['tmp_name']; 

$loc1 = 'pdf_request/'.$filename;
 move_uploaded_file($ftemp,$loc1);


$st = "Pending";


$q = " INSERT INTO `vendors` (`Company_name`, `Email`, `phone`, `NID`, `seller_type`, `_Status`, `image`,`pdf`,`file_name`) Values('$company','$email','$phone','$Nid','$stype','$st','$loc','$loc1','$filename')";

$run= mysqli_query($con,$q);
 
if($run)
{
echo"

<script>
      alert('Successfully  Added');
     
      
   </script>
   


";


   }

   else
   {
    die("Could not connect to the d ".mysqli_connect_error());
   }



?> 
</body>
</html>