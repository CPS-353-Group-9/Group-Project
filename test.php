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
			if (isset($_SESSION['userId'])) 
			{
				
				# This page is a menu for selecting your test. It is important because it sends
				# post data to test_page.php and tells it which test questions to fetch from the 
				# database.
				
				echo('<div id ="testlandingpage">');
				
					echo('<form action="test_page.php" method="post">');
				
					# Loops to display all test options the user has access to 
					# based on their current level
				
					for ($x = 0; $x < $_SESSION['user_level']; $x++) {
						
						echo('<div id = "testbuttondiv">');
					
							$testnum = $x + 1;
					
							echo('<input type = "submit" class="button primary testbutton" 
							name= "gotoTest" value = "Test '. $testnum . '">');
							
						echo('</div>');
						
					}
				
					echo('</form>');
				
				echo('</div>');
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
	</body>
</html>