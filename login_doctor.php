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
			$query = "SELECT * FROM doctors WHERE Doctor_Code = '$user_code' LIMIT 1";

			$result = mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$doc_data = mysqli_fetch_assoc($result);
					if($doc_data['Password_Hash'] === $pass)
					{
						$_SESSION['Doctor_Code'] = $doc_data['Doctor_Code'];
						header("Location: doctor_homepage.php");
					}
				}
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
			<label for="usercode">Doctor Code:</label>
			<input type="text" id="usercode" name="usercode" placeholder="Doctor Code" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Password" required>

			<input type="submit" value="Login">
		</form>
		
		<p>Are you a <a href="login.php">Student</a>?</p>
		
	</div>
	
</body>
</html>