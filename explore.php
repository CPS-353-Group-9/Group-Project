<?php

/*

Explore page for the Learn option.

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';?>
		<h3>Explore The Text</h3>
		
		<?php
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo ('
					<div id="explore-list" class="secondary">
						<a href="ch1.php" id="ch">Chapter 1</a>
					</div>
				');
				/* 
				$ch = "ch";
				for i up to user's level
					change $ch to match	level
					display link to $ch_.php
				*/
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to view the interactive textbook and start learning Python! </p>');
			}
		?>

	</body>
</html>