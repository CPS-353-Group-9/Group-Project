<?php

/*

Reset Stats option page

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';?>
		<h3>Reset</h3>

		<?php
			if (isset($_SESSION['userId'])) 
			{
				# This page simply asks the user for confirmation to reset their stats
				
				echo('<div class="textbook-body">');

				echo("<h6>" . "Are you sure you want to reset your stats?" . "</h6>");
				
				echo("( This cannot be undone. All of your progress will be lost. )");

				echo('<div id ="yesnodiv">');

				echo('<span><br/><a class="button primary testbutton2 yesno" href="reset_stats.php">Yes</a></span>');
				
				echo('<span><a class="button primary testbutton2 yesno" href="stats.php">No</a></span>');
				
				echo("</div>");
				
				echo('</div>');
				
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>