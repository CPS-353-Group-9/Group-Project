<<?php 
	session_start(); // start session
	session_unset(); // deletes all the values from current session
	session_destroy(); // destroys current session on the website (logs out user so a new user with different values can use the website)

	header("Location: ../index.php?logout=success"); // takes user back to the home page
?>