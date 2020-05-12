<?php

/*

Stats page for the Account option.

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';
				
		?>
		<h3>Stats</h3>
		
		<?php
			require "includes/db_i.php";
		
				if (isset($_SESSION['userId'])) // if logged in display this message
			{
				
				# Outputs username and user level
				
				echo '<p> User: ' . $_SESSION['user'] . "</p>";
				echo '<p> Level: ' . $_SESSION['user_level'] . '</p>'; //get level from database
				
				# The code below runs a database query to grab their EXP based on their UPID
				
				$sql_a = "SELECT user_exp FROM user_stats WHERE UPID = '$_SESSION[userId]'";
				$result = mysqli_query($connect, $sql_a);
				
				$row_a = mysqli_fetch_assoc($result); //basically this grabs the EXP as an array
				
				# This foreach loop pulls the EXP value out of the array and assigns it to a session variable
				
				foreach($row_a as &$value_a){
					$_SESSION['user_exp'] = $value_a;
				}
				
				echo '<p> EXP: ' . $_SESSION['user_exp'] . '</p>';
				
				# The code below automatically outputs a user's tests scores, if they have any
				# It also calculates a user's average and displays it
				
				$total = 0.0;
				$test_count = 0;
				
				$sql = "SELECT * FROM user_grades WHERE UPID = '$_SESSION[userId]'";
				$result = mysqli_query($connect, $sql);
				
				$row = mysqli_fetch_assoc($result); //grabs an array of user's test scores
				
				$count = 0;
				
				foreach($row as &$value){
					if ( ($value != null) && ($count > 0) ){ //skips over the first value so we don't grab UPID
						$total += $value;
						$test_count += 1; //used for averaging purposes
						echo '<p> Test ' . $test_count . ' Grade: ' . $value . '</p>';
					}
					
					$count += 1;
				}
				
				# Calculates the average
				
				if ($test_count !== 0){
					$test_average = $total / $test_count;
					echo '<p> Test Average: ' . $test_average . '</p>';
				}
				
				echo('<div id= "resetbuttondiv">');
				echo('<a class="button primary testbutton2" href="reset_question.php">Reset Stats</a>');	
				echo("</div>");
				
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
		
	</body>
</html>