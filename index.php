<?php

/*

This is the index page/main page of the website.
Mainly just a landing page from which the user will navigate
to the other areas of the site.

Includes the style sheets and the navbar.php file which contains 
most of the real functionality.

*/

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
		<header> Easy As Pie-thon </header>
		<h3>Welcome to the Home Page.</h3>
	</body>
</html>