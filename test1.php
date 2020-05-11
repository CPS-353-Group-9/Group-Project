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
		
			if (isset($_SESSION['userId'])) // if logged in display the chapters
			{
				echo('<div class="textbook-body">');
				
				echo('<form action="test1res.php" method="post" id="quiz">');

				$sql = "SELECT question_1, question_2, question_3, question_4, question_5 FROM questions WHERE TEID = 1";
				$result = mysqli_query($connect, $sql);
				
				$row = mysqli_fetch_assoc($result);
				
				foreach($row as &$value){
					if ($value != null){
						echo $value;
					}
				}

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