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

        //update query
        $sql = "UPDATE User SET Username = '$_POST[user]', Email = '$_POST[email]', FName = '$_POST[first]', LName = '$_POST[last]', MI = '$_POST[middle]', Country = '$_POST[country]', State = '$_POST[state]', City = '$_POST[city]', Occupation = '$_POST[occupation]' WHERE Username = '$_POST[prevuser]'";

        //execute
        if (mysqli_query($connect, $sql))
        {    
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