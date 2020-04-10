<?php

/*

Settings page for the Account option.

*/
?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';?>
		<h3>Settings</h3>
		<?php
				if (isset($_SESSION['userId'])) // if logged in display this message
			{
				echo 'Coming Soon';	
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
	</body>
</html>