<!DOCTYPE html>
<html>
<head>
	<title>Add medicine</title>
	<!-- <link rel="stylesheet" type="text/css" href="fstyle.css"> -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

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
	padding: 20px 100px;
	
}


.contact-box{
	max-width: 750px;
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

.field:hover{
	background-color: rgba(0, 0, 0, 0.1);
}

textarea{
	min-height: 100px;
}

.btn{
	width: 100%;
	padding: 0.5rem 1rem;
	/* background-color: #2ecc71; */
	background-color: #2EB0AC; 
	 
	 
	cursor: pointer;
	transition: .3s;
}

.btn:hover{
   
	/* background-color: green; */
}




</style>

</head>
<body style = "background-color: white;">


<div class="topbar" style = "background-color: #2EB0AC; ">
        <div class="row">
            <div class="col-lg-5">
              <div class="button">
                <a href="" class="btn btn-success btn-sm">LOTO</a>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="topmenu">
                <ul>
                  
                  <li><a href="index.php">Dashboard <span></span></a></li>
				  <li><a href="index.php">View Product<span></span></a></li>
                  <!-- <li><a href="#">My Account <span>|</span></a></li>
                  <li><a href="busireq.html">Become A Vendor<span>|</span></a></li> -->
                  <!-- <li><a href="adminlogin.html">Admin?<span>|</span></a></li>
                  <li><a href="addproduct.php">Add product<span>|</span></a></li> -->
                  <!-- <li><a href="#">Contact</a></li> -->
                  <!-- <li><a href="logout.php">Logout</a></li> -->
                </ul>
              </div>
            </div>
          </div>
    </div>

  <?php
   include 'ConnectionProvider.php';
  $id = $_GET['id']; 
 
  $sql = "SELECT * FROM products WHERE product_id = '$id' " ; 
  $run = mysqli_query($con,$sql);
  $data = mysqli_fetch_assoc($run); 
  ?>
  <form action="upinsert.php" method="POST" enctype="multipart/form-data" >

	
  
	<div class="container">
		<div class="contact-box">
			<div class="left"></div>
			<div class="right">
				<h2 style = "color: #2EB0AC;"> <b> Update Product </b></h2>
				<input type="text" name="Name" class="field" value = "<?php echo $data['name'] ?> "   placeholder="Product Name" required>
                <label for="myfile">Please insert the picture of Product:</label>
         <input type="file" id="myfile" name="myfile"> <br> <br>
         <img src="<?php echo $data['image']?> " height = "100px" width = "100px">
		 <input type="text" class="field" name="des" value = "<?php echo $data['description'] ?> " placeholder="Description" required>
				<input type="text" class="field" name="cat" value = "<?php echo $data['category'] ?> " placeholder="Category" required>
				<input type="text" class="field" name="price"  value = "<?php echo $data['price'] ?> "placeholder="Price" required>
                <input type="text" class="field" name="discount"  value = "<?php echo $data['category_id'] ?> "placeholder="Discount ID" required>
                <input type="text" class="field" name="qnt" value = "<?php echo $data['quantity'] ?> " placeholder="Quantity" required>
                <input type="text" class="field" name="venid" value = "<?php echo $data['vendor_id'] ?> "placeholder="Vendor ID" required>
                <input type="text" class="field" name="brand" value = "<?php echo $data['brand'] ?> " placeholder="Brand" required>
       
				<input type="hidden" class="field" name="id" value = "<?php echo $data['product_id'] ?>">
        
		
<!-- 				
				<button class="btn" type="submit" name = "upload" >Update</button> -->
			<button  name = "submit" class="btn" style=" background-color: #2EB0AC ; color: white">Update</button>
			</div>
		</div>
	</div>

  </form>



  
</body>
</html>