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
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo('<div class="textbook-body">');

				echo("<h6>" . "What is love?" . "</h6>");
				
				echo('<input type="radio" id="1A" name="1" value = 0 >
				<label for="1A">Baby don\'t hurt me.</label><br>');
				echo('<input type="radio" id="1B" name="1" value = 0 >
				<label for="1B">A feeling.</label><br>');
				echo('<input type="radio" id="1C" name="1" value = 0 >
				<label for="1C">Not real.</label><br>');
				echo('<input type="radio" id="1D" name="1" value = 0 >
				<label for="1D">Ummmmmm</label><br>');
				
				echo("<br/><h6>" . "What is life?" . "</h6>");
				
					echo('<input type="radio" id="1A" name="2" value = 0 >
				<label for="1A">Dunno dude</label><br>');
				echo('<input type="radio" id="1B" name="2" value = 0 >
				<label for="1B">Probably a simulation</label><br>');
				echo('<input type="radio" id="1C" name="2" value = 0 >
				<label for="1C">I\'m bored</label><br>');
				echo('<input type="radio" id="1D" name="2" value = 0 >
				<label for="1D">Answer #4</label><br>');
				
				echo("<br/><h6>" . "What is 2+2?" . "</h6>");
				
					echo('<input type="radio" id="1A" name="3" value = 0 >
				<label for="1A">A</label><br>');
				echo('<input type="radio" id="1B" name="3" value = 0 >
				<label for="1B">4</label><br>');
				echo('<input type="radio" id="1C" name="3" value = 0 >
				<label for="1C">3</label><br>');
				echo('<input type="radio" id="1D" name="3" value = 0 >
				<label for="1D">Dog</label><br>');
				
				echo("<br/><h6>" . "What is a computer?" . "</h6>");
				
					echo('<input type="radio" id="1A" name="4" value = 0 >
				<label for="1A">Videogame machine.</label><br>');
				echo('<input type="radio" id="1B" name="4" value = 0 >
				<label for="1B">Facebook machine.</label><br>');
				echo('<input type="radio" id="1C" name="4" value = 0 >
				<label for="1C">Youtube machine.</label><br>');
				echo('<input type="radio" id="1D" name="4" value = 0 >
				<label for="1D">Big calculator.</label><br>');
				
				echo("<br/><h6>" . "What is up, bro?" . "</h6>");
				
					echo('<input type="radio" id="1A" name="4" value = 0 >
				<label for="1A">Nmu?</label><br>');
				echo('<input type="radio" id="1B" name="4" value = 0 >
				<label for="1B">The sky</label><br>');
				echo('<input type="radio" id="1C" name="4" value = 0 >
				<label for="1C">Not your bro.</label><br>');
				echo('<input type="radio" id="1D" name="4" value = 0 >
				<label for="1D">My day has been fraught with conflict.</label><br>');
				echo('<br/>');
				
				echo('</div>');
				echo('<br/><a class="button primary testbutton2" href="test1res.php">Submit</a>');	
				echo('<br/><br/>');
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>