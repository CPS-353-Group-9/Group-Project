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
				echo '<p> Login Status: Logged in </p>' . $_SESSION['user']; 
			}
			else
			{
				echo '<p> Login Status: Logged out </p>';
			}
		?>
		
	</body>
</html>