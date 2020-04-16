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
					'<div id="setting-border" class="secondary">
					<table>

					<tr>
						<th rowspan="3"> <img src="img/ACDC_logo.png" height="300" width="300" /> </th>
						<th> <h6> USERNAME: </h6> </th>
						<th> <h6> '. $_SESSION['user'] .' </h6> </th>
						<th> <h6> LEVEL:  </h6> </th>
						<th> <h6> '. $_SESSION['level'] .' </h6> </th>
					</tr>

					<tr>
						<th> <h6> MEMBER SINCE: </h6> </th>
						<th> <h6> '. $_SESSION['create'] .' </h6> </th>
					</tr>

					<tr>
						<th> <h6> </h6> </th>
						<th> <h6> </h6> </th>
						<th> <h6> </h6> </th>
						<th> <a class="button primary" href="edit_settings.php">EDIT PROFILE</a> </th>
					</tr>

					</table>
					</div>');
				// USER DETAILS AND ACTIVITY FEED BORDERS
				echo(
					'<div id="setting-border" class="secondary">
					<table>

					<tr>
						<th> <div id="subsetting-border" class="secondary"> <h6>USER DETAILS</h6> </div> </th>
						<th> <div id="subsetting-border" class="secondary"> <h6>ACTIVITY FEED</h6> </div> </th>
					</tr>

					</table>
					</div>');
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
	</body>
</html>