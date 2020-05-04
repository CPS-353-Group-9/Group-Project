<?php

    // handles the unpdating user info process
    if(isset($_POST['edit-submit']))
    {
        require "db_i.php"; // database connection file

        $account = $_POST['prevuser'];
        // fetch inputed data
        $username = $_POST['user'];
        $email = $_POST['email'];
        $fname = $_POST['first'];
        $lname = $_POST['last'];
        $mi = $_POST['middle'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $occupation = $_POST['occupation'];

        
        if (empty($account))
        {
            header("Location: ../edit_settings.php?error=mustfillprevuserfield");
		    exit();		
        }
        else if(empty($username)) // if username field is empty, use same username
        {
            //update query
            $sql = "UPDATE user_profile SET user_name = '$_POST[prevuser]', email = '$_POST[email]', first_name = '$_POST[first]', last_name = '$_POST[last]', middle_initial = '$_POST[middle]', country = '$_POST[country]', state = '$_POST[state]', city = '$_POST[city]', occupation = '$_POST[occupation]' WHERE user_name = '$_POST[prevuser]'";

            //execute
            if (mysqli_query($connect, $sql))
            {
                $sql = "SELECT * FROM user_profile INNER JOIN user_stats ON user_profile.UPID = user_stats.UPID WHERE user_profile.user_name = '$_POST[prevuser]'";
                $result = mysqli_query($connect, $sql);

                if (mysqli_num_rows($result) > 0)
                {
                    $row = mysqli_fetch_array($result);

                    session_unset(); // deletes all the values from current session
                    session_destroy(); // destroys current session on the website (logs out user so a new user with different values can use the website)
                    session_start(); // restarts the session
                    
                    $_SESSION['email'] = $row['email'];
					$_SESSION['userId'] = $row['UPID']; // getting the ID so we can later get their linked rpg info
					$_SESSION['user'] = $row['user_name']; // getting Username
					$_SESSION['create'] = $row['account_creation'];
					$_SESSION['first'] = $row['first_name'];
					$_SESSION['last'] = $row['last_name'];
					$_SESSION['mi'] = $row['middle_initial'];
					$_SESSION['country'] = $row['country'];
					$_SESSION['state'] = $row['state'];
					$_SESSION['city'] = $row['city'];
					$_SESSION['occ'] = $row['occupation'];
                    $_SESSION['user_level'] = $row['user_level'];
                }
                header("Location: ../settings.php?update=success");
                exit();
            }
        }
    }
    else if(isset($_POST['back-submit']))
    {
        header("Location: ../settings.php?");
		exit();
    }
?>