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
			require "includes/db_i.php";
		
			if (isset($_SESSION['userId'])) 
			{
				
				if ($_SESSION['current_test'] === null){
						$_SESSION['current_test'] = 1;
				}
				
				if ( !isset($_SESSION['question_number']) ) {
				
					$_SESSION['question_number'] = 1;
				
				}	
				
				if ( !isset($_SESSION['total_correct']) ) {
				
					$_SESSION['total_correct'] = 0;
				
				}
				else{
					
					$totalCorrect = $_SESSION['total_correct'];

					if (isset($_POST['1'])){
						$answer1 = $_POST['1'];
						if ($answer1 == "B") { $totalCorrect++; }
						$_SESSION['question_number'] += 1;
					}
				
					if (isset($_POST['2'])){
						$answer2 = $_POST['2'];
						if ($answer2 == "A") { $totalCorrect++; }
						$_SESSION['question_number'] += 1;
					}
				
					if (isset($_POST['3'])){
						$answer3 = $_POST['3'];
						if ($answer3 == "A") { $totalCorrect++; }
						$_SESSION['question_number'] += 1;
					}
				
					if (isset($_POST['4'])){
						$answer4 = $_POST['4'];
						if ($answer4 == "C") { $totalCorrect++; }
						$_SESSION['question_number'] += 1;
					}
				
					if (isset($_POST['5'])){
						$answer5 = $_POST['5'];
						if ($answer5 == "B") { $totalCorrect++; }
						$_SESSION['question_number'] += 1;
					}
					
					$_SESSION['total_correct'] = $totalCorrect;
				}
				
				$sql = "SELECT * FROM questions WHERE TEID = 1";
				$result = mysqli_query($connect, $sql);
				
				$row = mysqli_fetch_assoc($result);
				
				$count = 0;
				$test_length = 0;
				
				$question_array = array();
				
				foreach($row as &$value){
					if ( ($value != null) && ($count > 1) ){
						$question_array[] = $value;
						$test_length += 1;
					}
					
					$count++;
				}
					
				if ( !isset($_SESSION['test_length']) ) {
					
					$_SESSION['test_length'] = $test_length;
				
				}
				
				
				if ($_SESSION['question_number'] > $_SESSION['test_length']){
				
					$score = ($_SESSION['total_correct'] / $_SESSION['test_length']) * 100;
		
					echo ("<h4> Score:    $score%</h4> ");
					if ($score >= 65){
						echo("You passed the test. Good job! <br/>");
					}
					else{
						echo( "You failed the test. Study more and try again later. <br/> ");
					}
				
					$sql = "UPDATE user_grades SET test_1 = '$score' WHERE UPID = '$_SESSION[userId]'";
					mysqli_query($connect, $sql);

					echo("<br/><p> <a class='link' href='index.php'>Return to the home page.</a> </p>");
				
					if ( ($_SESSION['user_level'] === 1) && ($score >= 65) ){
					
						$sql_a = "UPDATE user_stats SET user_level = 2 WHERE UPID = '$_SESSION[userId]'";
						mysqli_query($connect, $sql_a);
						$_SESSION['user_level'] = 2;
						echo("<br/><br/>Congratulations! You leveled up!<br/>");
						echo("<br/>Your level is now " . $_SESSION['user_level'] . ".<br/>" );
					
					}
					
					$_SESSION['current_test'] = null;
					$_SESSION['question_number'] = null;
					$_SESSION['total_correct'] = null;
					$_POST['1'] = null;
					$_POST['2'] = null;
					$_POST['3'] = null;
					$_POST['4'] = null;
					$_POST['5'] = null;
					
				}
				else{
				
					echo('<div class="textbook-body">');
				
					echo('<form action="test1.php" method="post" id="quiz">');

					echo $question_array[$_SESSION['question_number'] - 1];

					echo('<br/>');
				
					echo('</div>');
				
					echo('<br/><input type="submit" class="button primary testbutton2">');	
					
					echo('<br/><br/>');
				
					echo('</form>');
				}
				
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>