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
            $sql = "UPDATE User SET Username = '$_POST[prevuser]', Email = '$_POST[email]', FName = '$_POST[first]', LName = '$_POST[last]', MI = '$_POST[middle]', Country = '$_POST[country]', State = '$_POST[state]', City = '$_POST[city]', Occupation = '$_POST[occupation]' WHERE Username = '$_POST[prevuser]'";

            //execute
            if (mysqli_query($connect, $sql))
            {

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

                header("Location: ../settings.php?update=success");
                exit();
            }
        }
        else if(!empty($account) && !empty($username) && !empty($email) && !empty($fname) && !empty($lname) && !empty($mi) && !empty($country) && !empty($state) && !empty($city) && !empty($occupation)) // all fields filled
        {
            //update query
            $sql = "UPDATE User SET Username = '$_POST[user]', Email = '$_POST[email]', FName = '$_POST[first]', LName = '$_POST[last]', MI = '$_POST[middle]', Country = '$_POST[country]', State = '$_POST[state]', City = '$_POST[city]', Occupation = '$_POST[occupation]' WHERE Username = '$_POST[prevuser]'";

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