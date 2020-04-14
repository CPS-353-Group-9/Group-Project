<?php 

/*
	Handles the signup process.
*/

if (isset($_POST['signup-submit'])) // after sign up button press....
{
	require "db_i.php"; // database connection file

	// fetch user inputed data
	$username = $_POST['user'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$pass_r = $_POST['pass_repeat'];

	// checking for user input errors:
	if (empty($username) || empty($email) || empty($pass) || empty($pass_r)) // if user didnt enter anything in these fields
	{
		header("Location: ../signup.php?error=emptyfields&user=".$username."&email=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) // checking for valid email and username
	{
		header("Location: ../signup.php?error=invalidemailuser&user=");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // checking for valid email
	{
		header("Location: ../signup.php?error=invalidemail&user=".$username);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) // checking for valid characters for username
	{
		header("Location: ../signup.php?error=invalidusername&email=".$email);
		exit();
	}
	else if($pass !== $pass_r) // checking if both password inputs dont match
	{
		header("Location: ../signup.php?error=passcheck&user=".$username."&email=".$email);
		exit();
	}
	else 
	{
		$sql = "SELECT Username FROM User WHERE Username=?";
		$stmt = mysqli_stmt_init($connect);

		if (!mysqli_stmt_prepare($stmt, $sql)) // checking for a sql error
		{
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}
		else 
		{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			$resultcheck = mysqli_stmt_num_rows($stmt);

			if ($resultcheck > 0) // checking if the inputed username is already taken
			{
				header("Location: ../signup.php?error=usertaken&email=".$email);
				exit();
			}
			else // passed all checks, puts users entered credentials to database
			{
				// Inserting credentials into the DB
				$sql = "INSERT INTO User (Username, Email, Password) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($connect);

				if (!mysqli_stmt_prepare($stmt, $sql))
				{
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}
				else
				{
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $pass);
					mysqli_stmt_execute($stmt);


					header("Location: ../signup.php?error=success");
					exit();
				}
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($connect);
}
else // send back to signup page
{
	header("Location: ../signup.php");
	exit();
}

?>