<?php

/*

Settings page for the Account option.

*/
/*
	$sql = "SELECT * FROM User";
	$stmt = mysqli_stmt_init($connect);

	if (!mysqli_stmt_prepare($stmt, $sql))
	{
		header("Location: settings.php?error=sqlerror");
		exit();	
	}
	else
	{
		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result))
		{
			$_SESSION['first'] = $row['FNAME'];
            $_SESSION['last'] = $row['Last'];
            $_SESSION['mi'] = $row['MI'];
            $_SESSION['country'] = $row['Country'];
            $_SESSION['state'] = $row['State'];
            $_SESSION['city'] = $row['City'];
            $_SESSION['occ'] = $row['Occupation'];
		}
	}
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
						<th> <div id="subsetting-border" class="secondary"> <h6>BIO</h6> </div> </th>
						<th> <a class="button primary" href="edit_settings.php">EDIT PROFILE</a> </th>
					</tr>

					</table>
					</div>');
				// USER DETAILS AND ACTIVITY FEED BORDERS
				echo(
					'<div id="setting-border" class="secondary">
					<table>

					<tr>
						<th> <div id="subsetting-border" class="secondary"> 
							<h4> USER DETAILS </h4>

							<h6> NAME <h6>
							<h2> FIRST: '. $_SESSION['first'] .'</h2>
							<h2> LAST: '. $_SESSION['last'] .'</h2>
							<h2> MIDDLE: '. $_SESSION['mi'] .'</h2> <br>

							<h6> LOCATION </h6>
							<h2> COUNTRY: '. $_SESSION['country'] .'</h2>
							<h2> STATE: '. $_SESSION['state'] .'</h2>							
							<h2> CITY: '. $_SESSION['city'] .'</h2> <br>

							<h2> OCCUPATION: '. $_SESSION['occ'] .'</h2>
							<h2> Email: '. $_SESSION['email'] .'</h2>
						</div> 
						</th>

						<th> <div id="subsetting-border" class="secondary">
							<h4> ACTIVITY FEED </h4>
						
						</div>
						</th>
					</tr>

					</table>
					</div>');
				// BADGES
				echo(
					'<div id="setting-border" class="secondary">

					<h4>BADGES</h4>

				</div>');
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
	</body>
</html>