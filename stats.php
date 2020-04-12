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
				if (isset($_SESSION['userId'])) // if logged in display this message
			{
				echo '<p> User: ' . $_SESSION['user'] . "</p>";
				echo '<p> Level: 0 </p>'; //get level from database	
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
		
	</body>
</html>