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
				
				echo('<form action="test1res.php" method="post" id="quiz">');

				echo("<h6>" . "What does a variable do?" . "</h6>");
				
				echo('<input type="radio" id="1" name="1" id="1-A" value = "A"  >
				<label for="1-A">Store different types of data.</label><br>');
				echo('<input type="radio" id="1" name="1" id="1-B" value = "B" >
				<label for="1-B">A feeling.</label><br>');
				echo('<input type="radio" id="1" name="1" id="1-C" value = "C" >
				<label for="1-C">Not real.</label><br>');
				echo('<input type="radio" id="1" name="1" id="1-D" value = "D" >
				<label for="1-D">Ummmmmm</label><br>');
				
				echo("<br/><h6>" . "What does a print statement do?" . "</h6>");
				
					echo('<input type="radio" id="2" name="2" value = "A" >
				<label for="2-A">Outputs something to the console.</label><br>');
				echo('<input type="radio" id="2" name="2" value = "B" >
				<label for="2-B">Probably a simulation</label><br>');
				echo('<input type="radio" id="2" name="2" value = "C" >
				<label for="2-C">I\'m bored</label><br>');
				echo('<input type="radio" id="2" name="2" value = "D" >
				<label for="2-D">Answer #4</label><br>');
				
				echo("<br/><h6>" . "Can Python be used as a calculator?" . "</h6>");
				
					echo('<input type="radio" id="3" name="3" value = "A" >
				<label for="3-A">Yes</label><br>');
				echo('<input type="radio" id="3" name="3" value = "B" >
				<label for="3-B">4</label><br>');
				echo('<input type="radio" id="3" name="3" value = "C" >
				<label for="3-C">3</label><br>');
				echo('<input type="radio" id="3" name="3" value = "D" >
				<label for="3-D">Dog</label><br>');
				
				echo("<br/><h6>" . "What is programming?" . "</h6>");
				
					echo('<input type="radio" id="4" name="4" value = "A" >
				<label for="4-A">Telling the computer to do something.</label><br>');
				echo('<input type="radio" id="4" name="4" value = "B" >
				<label for="4-B">Facebook machine.</label><br>');
				echo('<input type="radio" id="4" name="4" value = "C" >
				<label for="4-C">Youtube machine.</label><br>');
				echo('<input type="radio" id="4" name="4" value = "D" >
				<label for="4-D">Big calculator.</label><br>');
				
				echo("<br/><h6>" . "What is the name of this website?" . "</h6>");
				
					echo('<input type="radio" id="5" name="5" value = "A" >
				<label for="5-A">Easy As Pie-thon</label><br>');
				echo('<input type="radio" id="5" name="5" value = "B" >
				<label for="5-B">The sky</label><br>');
				echo('<input type="radio" id="5" name="5" value = "C" >
				<label for="5-C">Not your bro.</label><br>');
				echo('<input type="radio" id="5" name="5" value = "D" >
				<label for="5-D">My day has been fraught with conflict.</label><br>');
				echo('<br/>');
				
				echo('</div>');
				echo('<br/><input type="submit" class="button primary testbutton2"></a>');	
				echo('<br/><br/>');
				
				echo('</form>');
				
			}
			else
			{
				echo ('<p> <a class="link" href="signup.php">Create an account</a> or <a class="link" href="login.php">log in</a> to start learning and test your programming knowledge! </p>');
			}
		?>
		
	</body>
</html>