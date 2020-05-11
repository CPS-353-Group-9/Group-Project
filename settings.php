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
		<form action = "edit_settings.php" method="post">
		<?php include 'navbar.php';?>
		<h3>Settings</h3>
		<?php
				require "includes/db_i.php"; // database connection file

				$sql = "SELECT * FROM user_profile INNER JOIN user_stats ON user_profile.UPID = user_stats.UPID WHERE user_profile.user_name = '$_SESSION[user]'";
				$result = mysqli_query($connect, $sql);
				
				if (mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_array($result);
				
					$_SESSION['email'] = $row['email'];
					$_SESSION['userId'] = $row['UPID']; // getting the ID so we can later get their linked rpg info
					$_SESSION['user'] = $row['user_name']; // getting Username
					$_SESSION['avatar'] = $row['avatar'];
					$_SESSION['create'] = $row['account_creation'];
					$_SESSION['first'] = $row['first_name'];
					$_SESSION['last'] = $row['last_name'];
					$_SESSION['mi'] = $row['middle_initial'];
					$_SESSION['country'] = $row['country'];
					$_SESSION['state'] = $row['state'];
					$_SESSION['city'] = $row['city'];
					$_SESSION['occ'] = $row['occupation'];
					$_SESSION['phone'] = $row['phone'];
					$_SESSION['user_level'] = $row['user_level'];
					$_SESSION['password'] = $row['password'];
				}
			$uid = $_SESSION['userId'];
			$pass = $_SESSION['password'];

			if (isset($_SESSION['userId'])) // if logged in display this message
			{
				// TOP BORDER
				echo(
					'<div id="setting-border" class="secondary">
					<table>

					<tr>
						<th rowspan="3"> <div class="secondary"> <img src="'.$_SESSION['avatar'].'" height="300" width="300" border = "5" /> </div> </th>
						<th> <h6> USERNAME: </h6> </th>
						<th> <h6> '. $_SESSION['user'] .' </h6> </th>
						<th> <h6> LEVEL:  </h6> </th>
						<th> <h6> '. $_SESSION['user_level'] .' </h6> </th>
					</tr>

					<tr>
						<th> <h6> MEMBER SINCE: </h6> </th>
						<th> <h6> '. $_SESSION['create'] .' </h6> </th>
					</tr>

					<tr>
						<div id = "fid1"><input type="hidden" name="uid" value='.$uid.' />
						<div id = "fid1"><input type="hidden" name="pass" value='.$pass.' />

						<th> <h6>  </h6> </th>
						<th> <div id = "fid1"> <button <a class="button primary" name="settings-submit"> EDIT PROFILE </a> </button> </div> </th>
						
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

							<h6> CONTACT </h6>
							<h2> Phone: '. $_SESSION['phone'] .'</h2>
							<h2> Email: '. $_SESSION['email'] .'</h2> <br>

							<h2> Occupation: '. $_SESSION['occ'] .'</h2>
						</div> 
						</th>

						<th> <div id="subsetting-border" class="secondary">
							<h4> ACTIVITY FEED </h4>
							<h6 align = "center"> COMING SOON <h6>
						
						</div>
						</th>
					</tr>

					</table>
					</div>');
				// BADGES

				require "includes/db_i.php"; // database connection file

				$sql = "SELECT * FROM user_profile INNER JOIN user_badges ON user_profile.UPID = user_badges.UPID WHERE user_profile.user_name = '$_SESSION[user]'";
				$result = mysqli_query($connect, $sql);
			
				if (mysqli_num_rows($result) > 0)
				{
				$row = mysqli_fetch_array($result);
			
					$_SESSION['b1'] = $row['badge_1'];
					$_SESSION['b2'] = $row['badge_2'];
					$_SESSION['b3'] = $row['badge_3'];
					$_SESSION['b4'] = $row['badge_4'];
					$_SESSION['b5'] = $row['badge_5'];
					$_SESSION['b6'] = $row['badge_6'];
					$_SESSION['b7'] = $row['badge_7'];
					$_SESSION['b8'] = $row['badge_8'];
					$_SESSION['b9'] = $row['badge_9'];
					$_SESSION['b10'] = $row['badge_10'];
			
				}

				$locked = ('<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>');
				$complete_ch1 = ('<th> <img src="img/SE_chap1.png" height="50" width="50" /> </th>');
				$complete_ch2 = ('<th> <img src="img/SE_chap2.png" height="50" width="50" /> </th>');
				$lvl2 = ('<th> <img src="img/SE_lvl_2.png" height="50" width="50" /> </th>');
				$perfect_score = ('<th> <img src="img/SE_100.png" height="50" width="50" /> </th>');
				
				echo(
					'<div id="setting-border" class="secondary">

					<h4>BADGES</h4>
					<table align = "center">

					<tr>');
						if ($_SESSION['b1'] == false) // b1 = completing chapter 1
						{
							echo $locked;
						}
						else if($_SESSION['b1'] == true)
						{
							echo $complete_ch1;
						}

						if ($_SESSION['b2'] == false) // b2 = completing chapter 2
						{
							echo $locked;
						}
						else if($_SESSION['b2'] == true)
						{
							echo $complete_ch2;
						}

						if ($_SESSION['b3'] == false) // b3 = reaching level 2
						{
							echo $locked;
						}
						else if($_SESSION['b3'] == true)
						{
							echo $lvl2;
						}

						if ($_SESSION['b4'] == false) // b4 = getting a perfect test score for the first time
						{
							echo $locked;
						}
						else if($_SESSION['b4'] == true)
						{
							echo $perfect_score;
						}

						echo $locked; // placeholder

					// the next 10 badges are placeholders
					echo('</tr>
					
					<tr> 
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
					</tr>

					<tr>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
						<th> <img src="img/SE_locked.png" height="50" width="50" /> </th>
					</tr>

					</table>
				</div>');
			}
			else
			{
				echo '<p> [Not Logged In] </p>';
			}
		?>
	</form>
	</body>
</html>