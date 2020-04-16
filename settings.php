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
				// TOP BORDER
				echo(
					'<div id="explore-list" class="secondary">
					<table>

					<tr>
						<th rowspan="3"> <img src="img/ACDC_logo.png" height="300" width="300" /> </th>
						<th> <h6>USERNAME: '. $_SESSION['user'] .'</h6> </th>
						<th> <h6>LEVEL: '. $_SESSION['level'] .' </h6> </th>
					</tr>

					<tr>
						<th> <h6>BIO</h6> </th>
						<th> <h6>MEMBER SINCE: '. $_SESSION['create'] .' </h6> </th>
					</tr>

					<tr>
						<th>        </th>
						<th> <a class="button primary" href="edit_settings.php">EDIT PROFILE</a> </th>
					</tr>

					</table>
					</div>');
					
				echo(
					'<table>

					<tr>
						<th> <div id="explore-list" class="secondary"> <h6>USER DETAILS</h6> </div> </th>
						<th> <div id="explore-list" class="secondary"> <h6>ACTIVITY FEED</h6> </div> </th>
					</tr>

					</table>');
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
	</body>
</html>