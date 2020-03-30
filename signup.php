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
		<?php
			if (isset($_GET["error"])) // getting the error checks from 'signup_i.php' and showing the user what they inputed incorrectly
			{
				if ($_GET["error"] == "emptyfields")
				{
					echo '<p> You must fill all fields. </p>';
				}
				else if ($_GET["error"] == "invalidemail")
				{
					echo '<p> You must enter a valid email. </p>';
				}
				else if ($_GET["error"] == "invalidusername")
				{
					echo '<p> Username must only have letters and numbers. </p>';
				}
				else if ($_GET["error"] == "passcheck")
				{
					echo '<p> Passwords do not match. </p>';
				}
				else if ($_GET["error"] == "usertaken")
				{
					echo '<p> Username already taken. </p>';
				}
				else if ($_GET["error"] == "success")
				{
					echo '<p> Signup successful! </p>';
				}
			}
		?>
		<div id = "fid1"><button type="submit" name="signup-submit">Sign Up</button></div>
	</form>
	</div>
</main>