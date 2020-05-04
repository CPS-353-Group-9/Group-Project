<?php

/*

Explore page for the Learn option.

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include 'header.php';
	?>

	<body>
		<?php include 'navbar.php';?>
		<h3>Explore The Text</h3>
		
		<?php
			if (isset($_SESSION['userId'])) { // if logged in display the chapters			
				echo ('
					<div class="textbook-body">
						<h4>Welcome!</h4>
						<p> Welcome to the interactive textbook by Easy as Pie-thon! This is where you will learn the basics of programming in a coding language called Python. Our I-textbook will allow you to read and study programming concepts and the provide exercises at the end of each chapter to make sure you understand. As you successfully complete exercises, you gain experience points and level up to be able to view the next chapter. (You can view your experience points and level under <a class="link" href="stats.php">Account > Stats</a> in the menu above.) Click on a chapter below to begin or continue a lesson. Happy learning, good luck, and remember: it\'s okay to make mistakes! In fact, they are welcome and will help you learn!</p>
					</div>
					<br>
				');

				echo('<div id="explore-list" class="secondary">');
					echo('<br>');
					for ($ch = 1; $ch <= $_SESSION['user_level']; $ch++) { //for i up to user's level, change $ch to match level
						if($ch % 2 != 0){ //if $ch is odd
							//display link to chapter with primary class for chapter button
							echo('<a class="button primary" href="ch'.$ch.'.php">Chapter '.$ch.'</a> <br> <br>');
						}
						else{ //if $ch is even
							//display link to chapter with secondary class for chapter button
							echo('<a style="font-weight: bold;" class="button secondary" href="ch'.$ch.'.php">Chapter '.$ch.'</a> <br> <br>');
						}
					}
				echo('</div>');
			}
			else { //if not logged in, encourage log-in or sign-up
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to view the interactive textbook and start learning Python! </p>');
			}
		?>
	</body>
</html>