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
		<h3>Test 1 Results</h3>

		<?php
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				
				$totalCorrect = 0;
				
				if (isset($_POST['1'])){
					$answer1 = $_POST['1'];
					if ($answer1 == "A") { $totalCorrect++; }
				}
				
				if (isset($_POST['2'])){
					$answer2 = $_POST['2'];
					if ($answer2 == "A") { $totalCorrect++; }
				}
				
				if (isset($_POST['3'])){
					$answer3 = $_POST['3'];
					if ($answer3 == "A") { $totalCorrect++; }
				}
				
				if (isset($_POST['4'])){
					$answer4 = $_POST['4'];
					if ($answer4 == "A") { $totalCorrect++; }
				}
				
				if (isset($_POST['5'])){
					$answer5 = $_POST['5'];
					if ($answer5 == "A") { $totalCorrect++; }
				}
				
				$score = ($totalCorrect / 5.00) * 100;
		
				echo ("<h4> Score:    $score%</h4> ");
				if ($score > 65){
					echo("You passed the test. Good job! <br/><br/>");
				}
				else{
					echo( "You failed the test. Study more and try again later. <br/> ");
				}
				
				echo("<br/><p> <a class='link' href='index.php'>Return to the home page.</a> </p>");
	
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
	</body>
</html>