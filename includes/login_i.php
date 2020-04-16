<?php

if (isset($_POST['login-submit']))
{
	require "db_i.php";

	$email = $_POST['email'];
	$password = $_POST['pass'];

	if (empty($email) || empty($password)) // if no fields were entered
	{
		header("Location: ../login.php?error=emptyfields");
		exit();		
	}
	else
	{
		$sql = "SELECT * FROM User WHERE Username=? OR Email=?;"; // grabs from username or email so user can use either field to log in
		$stmt = mysqli_stmt_init($connect);

		if (!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: ../login.php?error=sqlerror");
			exit();	
		}
		else
		{
			mysqli_stmt_bind_param($stmt, "ss", $email, $email);
			mysqli_stmt_execute($stmt);

			$result = mysqli_stmt_get_result($stmt);

			if ($row = mysqli_fetch_assoc($result))
			{
				//$pass_check = password_verify($password, $row['Password']);

				if ($password == $row['Password']) // passwords match
				{
					session_start();
					$_SESSION['userId'] = $row['ID']; // getting the ID so we can later get their linked rpg info
					$_SESSION['user'] = $row['Username']; // getting Username
					$_SESSION['level'] = $row['Level'];
					$_SESSION['create'] = $row['createDate'];

					header("Location: ../index.php?login=success"); // successful login
					exit();
				}
				else
				{
					header("Location: ../login.php?error=wrongpassword");
					exit();
				}
			}
			else // no match to username in the database
			{
				header("Location: ../login.php?error=nouser");
				exit();	
			}
		}

	}
}
else
{
	header("Location: ../index.php");
	exit();
}

?>