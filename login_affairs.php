<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$user_code = $_POST['usercode'];
		$pass = $_POST['password'];
		
		if(!empty($user_code) && !empty($pass))
		{
			$query = "SELECT * FROM affairs WHERE code = '$user_code' LIMIT 1";

			$result = mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$aff_data = mysqli_fetch_assoc($result);
					if($aff_data['pass_hash'] === $pass)
					{
						$_SESSION['code'] = $aff_data['code'];
						header("Location: homepage_affairs.php");
					}
					else{
						header("Location: error.php");
					}
				}
			}
			else{
				header("Location: error.php");
			}
		}
		else
		{
			header("Location: error.php");
		}
	}
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" href="login.css">
</head>
<header>
	<div class="logo">
		<img src="your-logo.jpg" alt="Your Logo">
	</div>
</header>
<body>
	
	<div>
		
	</div>
	<div class="login">
		<h1>SIGN IN</h1>
		<form method="post" action="">
			<label for="usercode">Code:</label>
			<input type="text" id="usercode" name="usercode" placeholder="Code" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Password" required>

			<input type="submit" value="Login">
		</form>
		
	</div>
	
</body>
</html>