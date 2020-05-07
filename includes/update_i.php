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

        
        if (empty($account)) // user must fill the previous username field
        {
            header("Location: ../edit_settings.php?error=mustfillprevuserfield");
		    exit();		
        }
        else
        {
            if(empty($username)) // if username field empty, break. else change username to new inputed username 
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET user_name = '$_POST[user]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($email)) // if email field is empty, break. else change the email on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET email = '$_POST[email]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($fname)) // if first name field is empty, break. else change the first name on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET first_name = '$_POST[first]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($lname)) // if last name field is empty, break. else change the last name on that account
            {
                echo ""; 
            }
            else
            {
                $sql = "UPDATE user_profile SET last_name = '$_POST[last]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($mi)) // if middle initial field is empty, break. else change the middle initial on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET middle_initial = '$_POST[middle]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($country)) // if country field is empty, break. else change the country field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET country = '$_POST[country]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($state)) // if state field is empty, break. else change the country field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET state = '$_POST[state]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($city)) // if city is empty, break. else change the city field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET city = '$_POST[city]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (empty($occupation)) // if occupation field is empty, break. else change the occupation field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET occupation = '$_POST[occupation]' WHERE user_name = '$_POST[prevuser]'";
                mysqli_query($connect, $sql);
            }

            if (mysqli_query($connect, $sql))
            {
                // restart the session to update the fields on the user account page
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