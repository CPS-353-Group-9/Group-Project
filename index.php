<?php

/*

This is the index page/main page of the website.
Mainly just a landing page from which the user will navigate
to the other areas of the site.

Includes the style sheets and the navbar.php file which contains 
most of the real functionality.

*/
	// session_start(); // if credentials match the database in the login.php page, user will be taken back to the home page and be succefully logged in
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
		<link rel="stylesheet" href="newStyles1.css">
		<title>Easy As Pie-thon</title>
	</head>	

	<body>
		<?php include 'navbar.php';?>
		<h3>Home</h3>
		<?php
			if (isset($_SESSION['userId'])) // if logged in display this message
			{
				echo '<p> Login Status: Logged in </p>'; 
			}
			else
			{
				echo '<p> Login Status: Logged out </p>';
			}
		?>
		
		<div id = "statement1">
		
		Welcome to Easy As Pie-thon! This project is a web application / website to help guide people through 
		learning the fundamentals of computer science. 
		It will probably be a game of some sort that keeps points and possibly some sort of progression system.
		
		<br/><br/> The target group is going to be 9th graders, who we believe are sophisticated enough to 
		meaningfully engage with computer concepts. 
		Our goal is to make the process of learning to use technology an easily accessible
		and rewarding experience for high schoolers.
		
		<br/><br/>Computer technology is the future, the field is diverse, and we hope that our tool can 
		act as a catalyst for the next generation of students to navigate these technologies effectively.
		</div>

		</body>
</html>