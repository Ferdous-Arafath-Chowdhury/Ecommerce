<html>
    <head>
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
    

        <style>

*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Quicksand', sans-serif;

}

body{
	height: 100vh;
	width: 100%;
	
	
}

.container{
	position: relative;
	width: 100%;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 5px 100px;
	
}


.contact-box{
	max-width: 650px;
   justify-content: center;
	align-items: center;
	text-align: center;
	background-color: white;
	box-shadow: 0px 0px 19px 5px rgba(0,0,0,0.19);
	
}



.right{
	padding: 25px 40px;
}

h2{
	/* position: relative; */
	padding: 0 0 10px;
	/* margin-bottom: 2px; */
	color: #2EB0AC;  
}



.field{
	width: 100%;
	border: 2px solid rgba(0, 0, 0, 0);
	outline: none;
	background-color: rgba(230, 230, 230, 0.6);
	padding: 0.5rem 1rem;
	font-size: 1.1rem;
	margin-bottom: 22px;
	transition: .3s;
}

.field1{
	width: 100%;
	border: 25px solid rgba(0, 0, 0, 0);
	outline: none;
	background-color: rgba(230, 230, 230, 0.6);

	font-size: 1.1rem;
	margin-bottom: 22px;
	transition: .3s;
}

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

/* textarea{
	min-height: 100px;
} */

.btn{
	width: 60%;
	padding: 0.5rem 1rem;
	/* background-color: #2ecc71; */
	background-color: #2EB0AC; 
	color: #fff;
	color: white;
	cursor: pointer;
	transition: .3s;
}

.btn:hover{
   
	background-color: green;
}

</style>
    </head>
    <body style = "background-color: #2EB0AC;" >


    <form action="" method="POST" enctype="multipart/form-data" >

	<?php
    session_start();
    include('ConnectionProvider.php');





    if(isset($_POST['submit']))
    {

        if(isset($_SESSION['username'])){
            $email = $_SESSION['username'];
       
       

   $name =  $_POST['Name'];
   $serial_no = $_POST['com'];
   $des = $_POST['des'];
   
 

//    echo $name;
//    echo $serial_no;

   $Image = $_FILES['myfile'];
   $filename = $Image['name'];
   $iserror  =  $Image['error'];
   $ftemp = $Image['tmp_name']; 

  $loc = 'suggested_product/'.$filename;
  move_uploaded_file($ftemp,$loc);

  $sql = "INSERT INTO sugg_product(`vendor_no`, `name`, `product_des`,`pic`,`suggested_by`) 
  VALUES('$serial_no', '$name', '$des','$loc','$email')"; 
  $run = mysqli_query($con,$sql);

  if($run)
  {
    echo"
          
    <script> 
          alert('Successfully  run');
         
          
       </script>
       
    
    
    ";
  }

  else{
    echo"
          
    <script> 
          alert(' NOT NSuccessfully  run');
         
          
       </script>
       
    
    
    ";
  }



  echo"
          
  <script> 
        alert('Successfully  sent');
       
        
     </script>
     
  
  
  ";

    }

    else
{
    echo"
          
    <script>
          alert('Plasese go back login first to suggest product');
         
          
       </script>
       
    
    
    ";
    
  

}
}




?> 

<div class="topbar">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm"> <?php
              if(isset($_SESSION['username']))
            
                    echo $_SESSION['username']?> </a>
                    
                    
                    
                
                    
                
            
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                  <li><a href="login.php">Login<span>&nbsp;|</span></a></li>
                
                  <li><a href="index.php">Back To Hopage</a></li>
                </ul>
              </div>
            </div>
          </div>
    </div>
  
<div class="container">
    <div class="contact-box">
        <div class="left"></div>
        <div class="right">
            <h2> <b> Suggest Product </b> </h2>
            <input type="text" name="Name" class="field"   placeholder="Product Name" required>
           <input type="text" class="field1" name="des" placeholder="Description" required>

           <label for="myfile">Please insert a demo picture of the  Product:</label>
          <input type="file" id="myfile" name="myfile"> <br> <br>
         
         
          <label for="com"> <strong> Choose a vendor : </strong></label>
          <select name= "com"  style = "background-color: #2EB0AC"  class="form-control" required>
             <?php
                 include 'ConnectionProvider.php';
                
                 $sql = "SELECT * FROM valid_v";
                 $result=mysqli_query($con,$sql);
              
                 if(!$result)
                 {
                     echo "Error ".$sql."<br>".mysqli_error($con);
                 }
                 while($rows = mysqli_fetch_assoc($result)) {
 
                     
             ?>
                      <option class=""  style = "background-color: white;" value="<?php echo $rows['email'];?>" >
                
                <?php echo $rows['company_name'] ;?> 
                 
           
            </option>

            <?php
                 }
                 ?> 

                </select> 
    
    
     <button class="btn" type="submit" name = "submit" > Suggest</button>
        </div>
    </div>
</div>

</form>








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