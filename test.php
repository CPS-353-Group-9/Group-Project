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
				echo('<div id ="testlandingpage">');
				
				$_SESSION['current_test'] = null;
				
				if($_SESSION['user_level'] >= 1){
					echo('<div id = "testbuttondiv">');
					echo('<a class="button primary testbutton" href="test1.php">Test 1</a>');	
					echo('</div>');
					
				}
				
				if($_SESSION['user_level'] >= 2){
					echo('<div id = "testbuttondiv">');
					echo('<a class="button primary testbutton" href="test2.php">Test 2</a>');	
					echo('</div>');
				}
				
				if($_SESSION['user_level'] >= 3){
					echo('<div id = "testbuttondiv">');
					echo('<a class="button primary testbutton" href="test3.php">Test 3</a>');	
					echo('</div>');
				}
				
				echo('</div>');
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
	</body>
</html>