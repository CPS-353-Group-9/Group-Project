<?php

/*

Test page for the Learn option.

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>
	<head>
	<style>
	</style>
	</head>

	<body>
		<?php include 'navbar.php';?>
		<h3>Test Your Knowledge</h3>

		<?php
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo('<div id ="testlandingpage">');
				echo('<a class="button primary testbutton" href="test1.php">Begin</a>');	
				echo('</div>');
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
	</body>
</html>