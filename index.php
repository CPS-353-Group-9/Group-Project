<?php

/*

This is the index page/main page of the website.
Mainly just a landing page from which the user will navigate
to the other areas of the site.

Includes the style sheets and the navbar.php file which contains 
most of the real functionality.

*/
	session_start(); // if credentials match the database in the login.php page, user will be taken back to the home page and be succefully logged in
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
		<title>Easy As Pie-thon</title>
	</head>	

	<body>
		<?php include 'navbar.php';?>
		<h3>Welcome to the Home Page.</h3>
		<?php
			if (isset($_SESSION['userId'])) // if logged in display this message
			{
				echo "<p Login Status: Logged in </p>"; 
			}
			else // when logged out default displayed message
			{
				echo "<p Login Status: Logged out </p>";
			}
		?>
	</body>
</html>