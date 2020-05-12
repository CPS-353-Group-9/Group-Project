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
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';?>
		<h3 style="padding-top: 0%"> 
			<img src="img\EAPlogo.png" alt="EAP Logo" style="height: 100px; transform: translate(0, 25%)"> 
			Easy As Pie-thon 
			<img src="img\EAPlogo-mirrored.png" alt="EAP Logo" style="height: 100px; transform: translate(0, 25%)"> 
		</h3>
		<?php
			if (isset($_SESSION['userId'])) // if logged in display this message
			{
				echo ('<p> You are logged in as <a class ="link" href="stats"> ' . $_SESSION['user'] . '</a>.</p>'); 
			}
		?>
		<br>
		<div id="statement1">
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
		
		<div id="meet-the-team">
			<h3>Meet the Team</h3>
			<br>
			<div class="columns">
				<div class="column">
					<h4>Skyler Young</h4>
					<h6>Software Developer, Team Leader</h6>
					Skyler is responsible for the Test Your Knowledge portion of the interactive textbook and the user stats page. 
				</div>
				<div class="column">
					<h4>Imani Taylor</h4>
					<h6>Software Developer</h6>
					Imani is responsible for the navbar, the Explore the Text portion of the interactive textbook, and the primary styling for the site. 
				</div>
				<div class="column">
					<h4>Luc Caccioppoli</h4>
					<h6>Software Developer</h6>
					Luc is responsible for the sign-up/log-in/log-out functionality and the user settings page, including the Edit Profile functionality. 
				</div>			
				<div class="column">
					<h4>Miranda Mudlock</h4>
					<h6>Creative Director</h6>
					A late addition to the team, Miranda is the brains behind the clever name and logo for our project. She took the time to draw out the logo by hand and frequently contributes by giving input and feedback regarding both aesthetics and functionality. 
				</div>
			</div>
		</div>
	</body>
</html>