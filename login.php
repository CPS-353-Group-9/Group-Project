<?php
    //login functionality goes here
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Group 9 Project</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<link rel="stylesheet" href="customStyles.css">
	</head>	

	<body>
		<?php include 'navbar.php';?>
		<header> Group 9 Project </header>
        <h3>Login Page</h3>
        
        <form action = "includes/login_i.php" method = "post">
            <input type="text" name="email" placeholder="Username">
            <input type="password" name="pass" placeholder="Password">
            <button type = "submit" name="login-submit">Login</button>
        </form>
	</body>
</html>