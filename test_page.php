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
			
			$wrong_test = false;
			
			if(isset($_POST['gotoTest'])){
			
				$temp_testnumber = (int)substr($_POST['gotoTest'], 5);
				
				if( !isset($_SESSION['current_test']) ){
					$_SESSION['current_test'] = $temp_testnumber;
				}
				
				else if ($temp_testnumber !== $_SESSION['current_test']){
					$wrong_test = true;
				}
			}
			
		
			if (isset($_SESSION['userId']) && isset($_SESSION['current_test']) && $wrong_test === false ) 
			{
				
				if ( !isset($_SESSION['question_number']) ) {
				
					$_SESSION['question_number'] = 1;
				
				}	
				
				if ( !isset($_SESSION['total_correct']) ) {
				
					$_SESSION['total_correct'] = 0;
				
				}
				else{
					
					$totalCorrect = $_SESSION['total_correct'];
					
					for ($w = 0 ; $w < $_SESSION['test_length'] ; $w++){
						
						$post_temp = strval($w + 1);	
						$answer_string = "answer_" . $post_temp;
						
						$sql_a = "SELECT $answer_string FROM questions WHERE TEID = $_SESSION[current_test]";
						$result_a = mysqli_query($connect, $sql_a);
						
						$row_a = mysqli_fetch_assoc($result_a);
						
						foreach($row_a as $value_a){
							$answer_substring = substr($value_a,8);
						}

						if (isset($_POST[$post_temp])){
							$given_answer = $_POST[$post_temp];
							if (trim($given_answer) == trim($answer_substring)) { $totalCorrect++; }
							$_SESSION['question_number'] += 1;
						}
					}
					
					$_SESSION['total_correct'] = $totalCorrect;
				}
				
				$sql = "SELECT * FROM questions WHERE TEID = $_SESSION[current_test]";
				$result = mysqli_query($connect, $sql);
			
				$count = 0;
				$test_length = 0;
				
				$row = mysqli_fetch_assoc($result);
				
				foreach($row as &$value){
					
					$temp_str = substr($value, 0, 7);
					
					if ( ($value != null) && ($count > 1) && ($temp_str !== "answer:") ){
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

					echo("<br/><p> <a class='link' href='index.php'>Return to the home page.</a> </p>");
					
					$test_var = "test_" . $_SESSION['current_test'];
					
					$sql = "UPDATE user_grades SET $test_var = '$score' WHERE UPID = '$_SESSION[userId]'";
					mysqli_query($connect, $sql);
				
					if ( ($_SESSION['user_level'] === $_SESSION['current_test']) && ($score >= 65)
						 && ($_SESSION['user_level'] < 5) ){
					
						$level_up = $_SESSION['user_level'] + 1;
					
						$sql_a = "UPDATE user_stats SET user_level = '$level_up' WHERE UPID = '$_SESSION[userId]'";
						mysqli_query($connect, $sql_a);
						$_SESSION['user_level'] += 1;
						echo("<br/><br/>Congratulations! You leveled up!<br/>");
						echo("<br/>Your level is now " . $_SESSION['user_level'] . ".<br/>" );
					
					}
					
					$_SESSION['current_test'] = null;
					$_SESSION['question_number'] = null;
					$_SESSION['total_correct'] = null;
					
					for( $x= 0; $x < $_SESSION['test_length']; $x++ ) {
					
						$temp_str = strval($x + 1);
						
						$_POST[$temp_str] = null;

					}
					
				}
				else{
				
					echo('<div class="textbook-body">');
				
					echo('<form action="test_page.php" method="post">');

					echo $question_array[$_SESSION['question_number'] - 1];
					
					echo('<br/><input type="submit" class="button primary testbutton2" value = "Next Question">');	
				
					echo('</div>');
					
					echo('<br/><br/>');
				
					echo('</form>');
				}
				
			}
			else if (isset($_SESSION['userId']) && !isset($_SESSION['current_test']) ){
				
				echo ("<h4>No Test in Session</h4> ");
				
				echo( "You are not currently taking a test. <br/> Please select
				a test by navigating to the Test <br/> Your Knowledge portion of the Learn tab.<br/><br/> ");
				
				echo('<p><a class="link" href="index.php">Return to the home page.</a> <br> </p>');
				
			}
			else if (isset($_SESSION['userId']) && ($wrong_test === true) ){
				
				echo ("<h4>Test Already in Sesson</h4> ");
				
				echo( "You are already taking Test " . $_SESSION['current_test'] . ". <br/> Please finish
				your current exam before <br/> attempting to start a new one.<br/><br/> ");
				
				echo('<p><a class="link" href="test_page.php">Click here to return to the test.</a> <br> </p>');
				
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>