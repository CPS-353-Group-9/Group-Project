<?php
    /*
		The Login page.
		
		Includes the navbar.php script and the login_i.php script, which does most of the work.
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
		<?php include 'navbar.php';?>
		<body>
			<h3>Log In</h3>
			New user? <a id = "loglink" href="signup.php">Sign up here.</a>
		</body>
        
		<div id= "logform">
        <form action = "includes/login_i.php" method = "post">
            <div id = "fid1"><input type="text" name="email" placeholder="Username">
            <input type="password" name="pass" placeholder="Password"></div>
			<?php
				if (isset($_GET["error"])) // getting the error checks from 'login_i.php' and showing the user what they inputed incorrectly
				{
					if ($_GET["error"] == "emptyfields")
					{
						echo '<p> You must fill all fields. </p>';
					}
					else if ($_GET["error"] == "wrongpassword")
					{
						echo '<p> Incorrect username or password. </p>';
					}
					else if ($_GET["error"] == "nouser")
					{
						echo '<p> Incorrect username or password. </p>';
					}
				}
			?>
            <div id = "fid1"><button type = "submit" name="login-submit">Log In</button></div>
        </form>
		</div>
	</body>
</html>