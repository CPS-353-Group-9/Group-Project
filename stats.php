<?php

/*

Stats page for the Account option.

*/

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
		<link rel="stylesheet" href="newStyles1.css">
		<title>Easy As Pie-thon</title>
	</head>	

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