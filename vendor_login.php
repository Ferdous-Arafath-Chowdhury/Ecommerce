<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Charm:wght@400;700&family=Kufam:wght@400;600&family=Lobster&family=Montserrat:wght@400;700&family=Poppins:wght@400;500;700&family=Roboto:wght@400;700&family=Shadows+Into+Light&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" type="text/css" href="./css/logi.css"> -->
	
    <title>Vendor Login</title>
	<style>
		<?php
		include "login.css";
		?>
	</style>

</head>
<body>
	<div class="content ">

		<div class="top">
			
		</div>
		<div class="container">
			
			<div class="nd">
				<form class="form " action="" method="post" id="form">
					<h1 class="name">Sohoj</h1>
				<div class="text-center">
					<h1 class="text-red-600">Vendor Login</h1>
				</div>
				<div class="error ">
					<?php
					// session_start();
					if(isset($_SESSION['v_l_error'])&&$_SESSION['v_l_error']!=""&&!empty($_SESSION['v_l_error'])){
						echo "<p>".$_SESSION['v_l_error']."</p>";
						
						session_unset();
						// session_destroy();
					}
					?>
				</div>

					<input class="input" type="email" name="email" id="username" placeholder="Email" required>

					<input class="input" type="password" name="password" id="password" placeholder="Vendor unique code" required>
				<div class="">
					
					<!-- <input class="button" type="submit" onclick="" value="Login"> -->
					<button class="button" type="submit">Login</button>
				</div>
				
				<!-- <div class="d end">
					
					<p class="color text-center en">Don't have an account?</p>
					<p class="text-center">
						<a href="registration.php">Create New Nccount</a>
					</p>
					
				</div> -->
			</form>
			</div>
		</div>
		<?php
		if(isset($_POST['email']) && isset($_POST['password'])){
			include('ConnectionProvider.php');
			$email = mysqli_real_escape_string($con, $_REQUEST['email']);
			$password= mysqli_real_escape_string($con, $_REQUEST['password']);
			$q="SELECT * FROM `valid_v` WHERE  `email` = '$email' and `password/vendor_id`= '$password'";
			$result= mysqli_query($con,$q);
			if(mysqli_num_rows($result)>=1)
			{
				echo"login_succesfull";
				while($row= $result->fetch_assoc()){
					$_SESSION['vendor']= $row['company_name'];
					$_SESSION['vendor_id']= $row['password/vendor_id'];
					$_SESSION['vendor_idd']= $row['vendor_id'];
					$_SESSION['logo']= $row['image'];
					$_SESSION['email']= $row['email'];
					
				}
				header("location: vendor_dashboard.php");
			}
			else
			{
				echo "not found";
				$_SESSION['v_l_error']="Email or password is not correct.";
				header("location: vendor_login.php");
			}
		}
		?>
	</div>
	<script>
		
	</script>
</body>
</html>