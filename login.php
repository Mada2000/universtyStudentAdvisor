<?php
session_start();
    include("connection.php");
    include("functions.php");
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		// something was posted
		$user_code = $_POST['usercode'];
		$pass = $_POST['password'];
		$year = $_POST['year'];
		
		if(!empty($user_code) && !empty($pass))
		{
			$query = "SELECT * FROM student WHERE Student_Code = '$user_code' LIMIT 1";

			$result = mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['Password_Hash'] === $pass && $user_data['Year'] == $year)
					{
						$_SESSION['Student_Code'] = $user_data['Student_Code'];
						header("Location: homepage.php");
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
	<div class="login">
		<h1>SIGN IN</h1>
		<form method="post" action="">
			<label for="year">Year:</label>
			<select name="year" required>
			<option value="">Select year</option>
			<option value="First Year">1st year</option>
			<option value="Second Year">2nd year</option>
			<option value="Third Year">3rd year</option>
			<option value="Fourth Year">4th year</option>
			</select>
			<label for="usercode">Student Code:</label>
			<input type="text" id="usercode" name="usercode" placeholder="Student Code" required>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password" placeholder="Password" required>

			<input type="submit" value="Login">
		</form>
		
			<p>Are you a <a href="login_doctor.php">Doctor</a>?</p>
		
	</div>
	
</body>
</html>