<?php
	session_start();
?>

<!DOCTYPE html>
<html>

	<head>
	<!--
		Group Project
		
	-->
	
		<meta charset="UTF-8" />
		<title>Group 9 Project</title>
		
		<link href="mainStyles.css" rel="stylesheet" />
	</head>	
	
	<body>
		<header> Group 9 Project </header>

		<div>
			<form action = "includes/login_i.php" method = "post">
				<input type="text" name="email" placeholder="Username">
				<input type="password" name="pass" placeholder="Password">
				<button type = "submit" name="login-submit">Login</button>
				
			</form>

			<a href="signup.php">Signup</a>

			<form action = "includes/logout_i.php" method = "post">
				<button type = "submit" name="logout-submit">Logout</button>
				
			</form>
		</div>
		
	</body>

</html>