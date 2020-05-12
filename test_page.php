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
		
			# This page is where all the heavy-lifting for the testing occurs.
			# However, its contents are dependent on test.php to tell it what to
			# display via post data from the "Test N" buttons
		
			require "includes/db_i.php"; // needs the database connection
			
			# This script keeps the user from selecting another test if they have already
			# started one.
			
			$wrong_test = false; 
			
			if(isset($_POST['gotoTest'])){ //if post data was sent
			
				# substring is created from post data to grab the relevant info (the number)
				# also converts to int so $_SESSION['current_test'] can use it
				$temp_testnumber = (int)substr($_POST['gotoTest'], 5);
				
				#if no test is currently set, the current test is set to the request given by test.php
				if( !isset($_SESSION['current_test']) ){
					$_SESSION['current_test'] = $temp_testnumber;
				}
				
				# else, the alarm is tripped and wrong_test is set to true, which activates
				# an else if statement further down to prevent another test from displaying
				else if ($temp_testnumber !== $_SESSION['current_test']){
					$wrong_test = true;
				}
			}
			
		
			if (isset($_SESSION['userId']) && isset($_SESSION['current_test']) && $wrong_test === false ) 
			{
				
				# if everything is good, (user logged in, a test is going, it's the right test)
				# this option executes
				
				# sets the session variable's questio number to 1 if it isn't already set.
				# having a question_number session variable makes it so that you stay on
				# the same question if you go to another screen
				
				if ( !isset($_SESSION['question_number']) ) {
				
					$_SESSION['question_number'] = 1;
				
				}	
				
				# tally to keep track of right answers
				
				if ( !isset($_SESSION['total_correct']) ) { // if not set, automatically sets to 0
				
					$_SESSION['total_correct'] = 0;
				
				}
				else{
					
					# sets local variable to the session variable so we can use the value
					# for things
					
					$totalCorrect = $_SESSION['total_correct'];
					
					for ($w = 0 ; $w < $_SESSION['test_length'] ; $w++){
						
						# loops through to length of test to check if the user's
						# answer is correct
						
						# grabs the loop value, adds 1, and converts it to string
						# for use with checking the post data
						# formats into answer_string for use in a sql query
						
						$realval = $w + 1; // used for checking if the question number matches the answer number
						
						$post_temp = strval($realval);	
						$answer_string = "answer_" . $post_temp;
						
						# sql query that grabs a question's answer as an array
						
						$sql_a = "SELECT $answer_string FROM test_answers WHERE TEID = $_SESSION[current_test]";
						$result_a = mysqli_query($connect, $sql_a);
						
						$row_a = mysqli_fetch_assoc($result_a); // assigns to variable
						
						foreach($row_a as $value_a){ //pulls value out of array
							$answer= $value_a;
						}

						if (isset($_POST[$post_temp])){ //if an answer was given
							$given_answer = $_POST[$post_temp]; // assigns variable
							
							# checks if the user's answer matches a correct answer in the test_answers table, and also checks
							# if the question number matches the answer's number 
							# if both these conditions are met, the totalCorrect variable is incremented
							
							if ( (trim($given_answer) == trim($answer)) && $_SESSION['question_number'] === $realval ) { $totalCorrect++; }
							
							# question number is incremented as long as post data was sent (an answer was given)
							# even if the answer is not correct
							
							$_SESSION['question_number'] += 1;
						}
					}
					
					# sets the session variable to the value of the local variable we made
					# after the loop has finished
					
					$_SESSION['total_correct'] = $totalCorrect; 
					
				}
				
				# grabs all the questions from the questions table with a query
				
				$sql = "SELECT * FROM questions WHERE TEID = $_SESSION[current_test]";
				$result = mysqli_query($connect, $sql);
			
				$count = 0; //count is used to exclude the first two values from being added to the question array (TEID and QUID)
				$test_length = 0; //used to check how long the test is so it can be set to a session variable
				
				$row = mysqli_fetch_assoc($result); //creates an array of values from the result
				
				foreach($row as &$value){ //pulls values out of array
				
					# if the question exists, it gets added to the question_array and test_length is increased by 1 
					
					if ( ($value != null) && ($count > 1) ){
						$question_array[] = $value;
						$test_length += 1;
					}
					
					$count++; //count increments outside if statement because it exists for excluding the first two table values only
				}
				
				#if test_length session variable is not set, it gets set to the local variable's value 
					
				if ( !isset($_SESSION['test_length']) ) {
					
					$_SESSION['test_length'] = $test_length;
				
				}
				
				
				# The following conditions determines if the test is over 
				
				if ( ($_SESSION['question_number'] > $_SESSION['test_length']) && ($_SESSION['test_length'] !== 0) ){
				
					# When the session question_number is greater than the test_length (and test_length isn't 0, though that
					# usually won't happen), the user's score is calculated
				
					$score = ($_SESSION['total_correct'] / $_SESSION['test_length']) * 100; //creates a percentage based on correct answers
		
					echo ("<h4> Score:    $score%</h4> ");
					if ($score >= 65){ //passing score is a standard 65
						echo("You passed the test. Good job! <br/>");
					}
					else{
						echo( "You failed the test. Study more and try again later. <br/> ");
					}

					echo("<br/><p> <a class='link' href='index.php'>Return to the home page.</a> </p>");
					
					$test_var = "test_" . $_SESSION['current_test'];	//creates a string for query use
					
					# sends the user's score to the user_grades table
					# no matter what, the user's most recent score is sent to the database.
					# however, subsequent attempts do not affect a user's level if they have already
					# passed the test before
					
					$sql = "UPDATE user_grades SET $test_var = '$score' WHERE UPID = '$_SESSION[userId]'";
					mysqli_query($connect, $sql);
					
					# if the user is taking their most current test and they pass it, the user levels up
					# user level is currently capped at 5
				
					if ( ($_SESSION['user_level'] === $_SESSION['current_test']) && ($score >= 65) 
						 && ($_SESSION['user_level'] < 5) ){
					
						$level_up = $_SESSION['user_level'] + 1;
						
						# sends a sql query to update a user's level
					
						$sql_a = "UPDATE user_stats SET user_level = '$level_up' WHERE UPID = '$_SESSION[userId]'";
						mysqli_query($connect, $sql_a);
						$_SESSION['user_level'] += 1;
						echo("<br/><br/>Congratulations! You leveled up!<br/>");
						echo("<br/>Your level is now " . $_SESSION['user_level'] . ".<br/>" );
					
					}
					
					# sets all relevant session variable to null because the test is over
					
					$_SESSION['current_test'] = null;
					$_SESSION['question_number'] = null;
					$_SESSION['total_correct'] = null;
					
					for( $x= 0; $x < $_SESSION['test_length']; $x++ ) {
					
						$temp_str = strval($x + 1);
						
						$_POST[$temp_str] = null;

					}
					
				}
				else{
					
					# this else executes if the test is still going 
					# outputs a form with the post method, and also pulls 
					# the current question out of the question_array
					
					# the questions already have minor HTML attached to them
					# in the database, including their post values
				
					echo('<div class="textbook-body">');
				
					echo('<form action="test_page.php" method="post">');

					echo $question_array[$_SESSION['question_number'] - 1];	
				
					echo('</div>');
					
					echo('<br/><br/>');
				
					echo('</form>');
				}
				
			}
			else if (isset($_SESSION['userId']) && !isset($_SESSION['current_test']) ){
				
				# if no test is currently in session, this pops up and urges the user
				# to go select a test
				
				echo ("<h4>No Test in Session</h4> ");
				
				echo( "You are not currently taking a test. <br/> Please select
				a test by navigating to the Test <br/> Your Knowledge portion of the Learn tab.<br/><br/> ");
				
				echo('<p><a class="link" href="index.php">Return to the home page.</a> <br> </p>');
				
			}
			else if (isset($_SESSION['userId']) && ($wrong_test === true) ){
				
				# if wrong_test is true, this error screen pops up and prompts you to return to the current
				# test before starting a new one
				
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