<?php
/*

	The signup page.
	
	This is a shell for the signup_i.php script which communicates with the database.

*/
?>

<main>
	
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
	</head>
	
	<title>Easy As Pie-thon</title>

	<?php include 'navbar.php';?>
	<body>Already have an account? <a href="login.php">Log in here.</a></body>
	<form action = "includes/signup_i.php" method="post">
		<input type="text" name="user" placeholder="Username">
		<input type="text" name="email" placeholder="Email">
		<input type="password" name="pass" placeholder="Password">
		<input type="password" name="pass_repeat" placeholder="Repeat Password">
		<button type="submit" name="signup-submit">Signup</button>
	</form>
</main>