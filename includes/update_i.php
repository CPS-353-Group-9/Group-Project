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

                    session_start();
                    
                    $_SESSION['user_level'] = $row['user_stats.user_level'];
                }
                

                
                /*
                $sql = "SELECT * FROM User WHERE Username='$_POST[prevuser]'";
                $row = mysqli_fetch_array($sql);

                $_SESSION['email'] = $row['Email'];
                $_SESSION['userId'] = $row['ID'];
                $_SESSION['user'] = $row['Username'];
                $_SESSION['level'] = $row['Level'];
                $_SESSION['create'] = $row['createDate'];
                $_SESSION['first'] = $row['FName'];
                $_SESSION['last'] = $row['LName'];
                $_SESSION['mi'] = $row['MI'];
                $_SESSION['country'] = $row['Country'];
                $_SESSION['state'] = $row['State'];
                $_SESSION['city'] = $row['City'];
                $_SESSION['occ'] = $row['Occupation'];
                */
                header("Location: ../settings.php?update=success");
                exit();
            }
        }
        else if(!empty($account) && !empty($username) && !empty($email) && !empty($fname) && !empty($lname) && !empty($mi) && !empty($country) && !empty($state) && !empty($city) && !empty($occupation)) // all fields filled
        {
            //update query
            $sql = "UPDATE user_profile SET user_name = '$_POST[prevuser]', email = '$_POST[email]', first_name = '$_POST[first]', last_name = '$_POST[last]', middle_initial = '$_POST[middle]', country = '$_POST[country]', state = '$_POST[state]', city = '$_POST[city]', occupation = '$_POST[occupation]' WHERE user_name = '$_POST[prevuser]'";

            //execute
            if (mysqli_query($connect, $sql))
            {
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