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
				
				echo '<p> User: ' . $_SESSION['user'] . "</p>";
				echo '<p> Level: ' . $_SESSION['user_level'] . '</p>'; //get level from database
				
				$sql_a = "SELECT user_exp FROM user_stats WHERE UPID = '$_SESSION[userId]'";
				$result = mysqli_query($connect, $sql_a);
				
				$row_a = mysqli_fetch_assoc($result);
				
				foreach($row_a as &$value_a){
					$_SESSION['user_exp'] = $value_a;
				}
				
				echo '<p> EXP: ' . $_SESSION['user_exp'] . '</p>';
				
				$total = 0.0;
				$test_count = 0;
				
				$sql = "SELECT * FROM user_grades WHERE UPID = '$_SESSION[userId]'";
				$result = mysqli_query($connect, $sql);
				
				$row = mysqli_fetch_assoc($result);
				
				$count = 0;
				
				foreach($row as &$value){
					if ( ($value != null) && ($count > 0) ){
						$total += $value;
						$test_count += 1;
						echo '<p> Test ' . $test_count . ' Grade: ' . $value . '</p>';
					}
					
					$count += 1;
				}
				
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