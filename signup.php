<?php
/*

	The signup page.
	
	This is a shell for the signup_i.php script which communicates with the database.

*/
?>

<main>
	
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
		<link rel="stylesheet" href="newStyles1.css">
		<title>Easy As Pie-thon</title>
	</head>	
	
	<title>Easy As Pie-thon</title>

	<?php include 'navbar.php';?>
	<body>
		<h3>Sign Up</h3>
		Already have an account? <a id="loglink" href="login.php">Log in here.</a>
	</body>
	
	<div id= "logform">
	<form action = "includes/signup_i.php" method="post">
		<div id = "fid1"><input type="text" name="user" placeholder="Username">
		<input type="text" name="email" placeholder="Email"></div>
		<div id = "fid1"><input type="password" name="pass" placeholder="Password">
		<input type="password" name="pass_repeat" placeholder="Repeat Password"></div>
		<div id = "fid1"><button type="submit" name="signup-submit">Sign Up</button></div>
	</form>
	</div>
</main>