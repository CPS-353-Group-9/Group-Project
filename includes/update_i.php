<?php
    require "db_i.php"; // database connection file to get the UPID

    $sql = "SELECT * FROM user_profile WHERE user_profile.user_name = '$_POST[user]'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);

        session_start();
        $_SESSION['user_id'] = $row['UPID'];
    }

    // handles the unpdating user info process
    if(isset($_POST['edit-submit']))
    {
        //require "db_i.php"; // database connection file

        $account = $_POST['uid'];
        // fetch inputed data
        $email = $_POST['email'];
        $fname = $_POST['first'];
        $lname = $_POST['last'];
        $mi = $_POST['middle'];
        $file_temp = $_FILES['avatar']['tmp_name'];
        $file_name = $_FILES['avatar']['name'];
        $file_path = 'img/profiles/'.$file_name;
        $country = $_POST['country'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $occupation = $_POST['occupation'];
        $new_password = $_POST['newpass'];
        $old_password = $_POST['oldpass'];

        
        if (empty($account))
        {
            header("Location: ../edit_settings.php?error=serverconnectionfailed");
		    exit();		
        }
        else
        {
            if (empty($email)) // if email field is empty, break. else change the email on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET email = '$_POST[email]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($fname)) // if first name field is empty, break. else change the first name on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET first_name = '$_POST[first]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($lname)) // if last name field is empty, break. else change the last name on that account
            {
                echo ""; 
            }
            else
            {
                $sql = "UPDATE user_profile SET last_name = '$_POST[last]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($mi)) // if middle initial field is empty, break. else change the middle initial on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET middle_initial = '$_POST[middle]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            // profile pic
            //$sql = "UPDATE user_profile SET avatar = ('$file_path') WHERE UPID = '$_POST[uid]'";
            //mysqli_query($connect, $sql);
            

            if (empty($country)) // if country field is empty, break. else change the country field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET country = '$_POST[country]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($state)) // if state field is empty, break. else change the country field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET state = '$_POST[state]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($city)) // if city is empty, break. else change the city field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET city = '$_POST[city]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($phone))
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET phone = '$_POST[phone]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            if (empty($occupation)) // if occupation field is empty, break. else change the occupation field on that account
            {
                echo "";
            }
            else
            {
                $sql = "UPDATE user_profile SET occupation = '$_POST[occupation]' WHERE UPID = '$_POST[uid]'";
                mysqli_query($connect, $sql);
            }

            //password reset
            if (empty($new_password))
            {
                echo "";
            }
            else
            {
                if ($new_password == $old_password)
                {
                    header("Location: ../edit_settings.php?error=samepass");
		            exit();		
                }
                else
                {
                    $sql = "UPDATE user_profile SET password = '$_POST[newpass]' WHERE UPID = '$_POST[uid]'";
                    mysqli_query($connect, $sql);
                }
            }


        header("Location: ../settings.php?update=success");
        exit();
        }
    }
    else if(isset($_POST['back-submit']))
    {
        header("Location: ../settings.php?");
		exit();
    }
?>