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

	<body>
		<?php include 'navbar.php';?>
		<h3>Test 1 Results</h3>

		<?php
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo("This was a practice test, so it will not be graded.");
				echo("<br/> Nice work regardless. <br/><br/>");
				echo("<p>	<a class='link' href='index.php'>Return to the home page.</a> <br> </p>");
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
	</body>
</html>