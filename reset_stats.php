<?php

/*

Reset Stats page

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
			require "includes/db_i.php"; //needs the database connection
		
			if (isset($_SESSION['userId'])) 
			{
				echo('<div class="textbook-body">');

				echo("<h6>" . "Your stats have been reset." . "</h6>");
				
				echo('<a class="link returnlink" href="index.php">Go back to the home page</a> <br>');
				
				echo('</div>');
				
				# Loops through the user_grades table and sets the user's grades to null
				
				for ($y = 0; $y < $_SESSION['user_level']; $y++){
					
					$temp_testgrade = 'test_' . ($y + 1);
				
					$sql = "UPDATE user_grades SET $temp_testgrade = NULL WHERE UPID = '$_SESSION[userId]'";
					mysqli_query($connect, $sql);
					
				}
				
				# Sets the user's level to 1 in the database and exp to 0
					
				$sql_a = "UPDATE user_stats SET user_level = 1 WHERE UPID = '$_SESSION[userId]'";
				mysqli_query($connect, $sql_a);
				$_SESSION['user_level'] = 1;
				
				$sql_b = "UPDATE user_stats SET user_exp = 0.000 WHERE UPID = '$_SESSION[userId]'";
				mysqli_query($connect, $sql_a);
				$_SESSION['user_exp'] = 0.000;
				
				#Clears some session variables relevant to the tests
				
				$_SESSION['current_test'] = null;
				$_SESSION['question_number'] = null;
				$_SESSION['total_correct'] = null;
				
				if (isset($_SESSION['test_length'])){ //Clears post data for any active test
					
					for( $x= 0; $x < $_SESSION['test_length']; $x++ ) {
						
						$temp_str = strval($x + 1);
						
						$_POST[$temp_str] = null;
					}
				
				}
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>