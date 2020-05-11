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
			require "includes/db_i.php";
		
			if (isset($_SESSION['userId'])) 
			{
				echo('<div class="textbook-body">');

				echo("<h6>" . "Your stats have been reset." . "</h6>");
				
				echo('<p><a class="link" href="index.php">Go back to the home page</a> <br> </p>');
				
				echo('</div>');
					
				$sql_a = "UPDATE user_stats SET user_level = 1 WHERE UPID = '$_SESSION[userId]'";
				mysqli_query($connect, $sql_a);
				$_SESSION['user_level'] = 1;
				
				$sql = "UPDATE user_grades SET test_1 = NULL WHERE UPID = '$_SESSION[userId]'";
                mysqli_query($connect, $sql);
				$sql = "UPDATE user_grades SET test_2 = NULL WHERE UPID = '$_SESSION[userId]'";
                mysqli_query($connect, $sql);
				$sql = "UPDATE user_grades SET test_3 = NULL WHERE UPID = '$_SESSION[userId]'";
                mysqli_query($connect, $sql);
				$sql = "UPDATE user_grades SET test_4 = NULL WHERE UPID = '$_SESSION[userId]'";
                mysqli_query($connect, $sql);
				$sql = "UPDATE user_grades SET test_5 = NULL WHERE UPID = '$_SESSION[userId]'";
                mysqli_query($connect, $sql);
				
				$_SESSION['current_test'] = null;
				$_SESSION['question_number'] = null;
				$_SESSION['total_correct'] = null;
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>