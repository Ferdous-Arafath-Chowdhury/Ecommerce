!DOCTYPE html>
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
// include 'Nav1.php';

$username =$_REQUEST['Username'];
$pass=$_REQUEST['Password'];

$q="select * from  admin where username ='$username' and password='$pass'";

$result= mysqli_query($con,$q);
$count=mysqli_num_rows($result);

if($count>=1)
{
	echo"found";
	header("location:  adminpage.html");
}
else
{

    $aler =  "<script>alert('Invalid Email or Password')</script>";
    echo $aler;
    // header("location: badminlogin.html");
    
}



?>
 
    

  
</body>
</html>


