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
		<h3>Test Your Knowledge</h3>

		<?php
		
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo('<div class="textbook-body">');

				echo("<h6>" . "Test 2 is not available in this demo." . "</h6>");
				
				echo('<p><a class="link" href="index.php">Go back to the home page</a> <br> </p>');
				
				echo('</div>');
				
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>