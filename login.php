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
	<link rel="stylesheet" type="text/css" href="./login.css">
	
    <title>Login</title>
	<style>
		<?php
		include "./css/login.css";
		?>
	</style>

</head>
<body>
	<div class="content ">

		<div class="top">
			
		</div>
		<div class="container">
			
			<div class="st">
				<i class="fa-solid fa-location-arrow icon"></i>
				<p class="join">Join Us</p>
				<p class="p">Shop with us for fast, secure and safe delivery</p>
				<!-- <input class="btn content-center self center" type="submit" onclick="" value="About Us"> -->
				<div class="btn">About Us</div>

			</div>
			<div class="nd">

			<form class="form " action="" method="post" id="form">
				<div class="text-center">
					<h1 class="text-red-600">Login</h1>
				</div>
				<div class="error ">
					<?php
					// session_start();
					if(isset($_SESSION['error'])&&$_SESSION['error']!=""&&!empty($_SESSION['error'])){
						echo "<p>".$_SESSION['error']."</p>";
						
						session_unset();
						// session_destroy();
					}
					?>
				</div>

					<input class="input" type="text" name="username" id="username" placeholder="Username" required>

					<input class="input" type="password" name="password" id="password" placeholder="Password" required>
				<div class="">
					
					<!-- <input class="button" type="submit" onclick="" value="Login"> -->
					<button class="button" type="submit">Login</button>
				</div>
				
				<div class="d end">
					
					<p class="color text-center en">Don't have an account?</p>
					<p class="text-center">
						<a href="registration.php">Create New Nccount</a>
					</p>
					
				</div>
			</form>
			</div>
		</div>
		<?php
		if(isset($_POST['username']) && isset($_POST['password'])){
			include('ConnectionProvider.php');
			$username = mysqli_real_escape_string($con, $_REQUEST['username']);
			$password= mysqli_real_escape_string($con, $_REQUEST['password']);
			$q="SELECT * FROM `customers` WHERE  `username` = '$username' and `password`= '$password'";
			$result= mysqli_query($con,$q);
			if(mysqli_num_rows($result)>=1)
			{
				echo"login_succesfull";
				while($row= $result->fetch_assoc()){
					$_SESSION['username']= $username;
					$_SESSION['cust_id']= $row['cust_id'];
					$_SESSION['name']= $row['name'];
					$_SESSION['email']= $row['email'];
					$_SESSION['mobile']= $row['mobile'];
				}
				header("location: index.php");
			}
			else
			{
				// echo "not found";
				$_SESSION['error']="Username or password is not correct.";
				header("location: login.php");
			}
		}
		?>
	</div>
	<script>
		
	</script>
</body>
</html>