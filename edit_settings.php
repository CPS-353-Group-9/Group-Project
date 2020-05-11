<?php

/*

Settings page for the Account option.
<div class="avatar"> <label> Select your profile pic: </label> <input type="file" name="avatar" accept="img/profiles/*">
*/
?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
        <?php include 'navbar.php';?>
        <div id= "logform">
        <h3>Edit Your Profile</h3>
        <h6>Enter the information that you want to fill and hit update to update you personal information</h6>
    </body>
    <form action = "includes/update_i.php" method="post">
        <?php
            if (isset($_SESSION['userId']) && isset($_POST['settings-submit']))
            {
                echo(
                '<div id="setting-border" class="secondary">
                
                <h6> PERSONAL </h6>
                <div id = "fid1"><input type="hidden" name="uid" value="'.$_POST['uid'].'">
                <div id = "fid1"><input type="text" name="first" placeholder="First Name">
                <div id = "fid1"><input type="text" name="last" placeholder="Last Name">
                <div id = "fid1"><input type="text" name="middle" placeholder="Middle I">

                <h6> LOCATION </h6>
                <div id = "fid1"><input type="text" name="country" placeholder="Country">
                <div id = "fid1"><input type="text" name="state" placeholder="State">
                <div id = "fid1"><input type="text" name="city" placeholder="City">

                <h6> CONTACT </h6>
                <div id = "fid1"><input type="text" name="email" placeholder="Email">
                <div id = "fid1"><input type="text" name="phone" placeholder="Phone Number">

                <h6> MISC </h6>
                <div id = "fid1"><input type="text" name="occupation" placeholder="Occupation"> <br>

                </div>');

                echo(
                '<div>

                <h6> CHANGE PASSWORD </h6>
                
                <table>

                </table align = "center">

                    <tr>
                        <th> <div id = "fid1"><input type="hidden" name="oldpass" value="'.$_POST['pass'].'"> </th>
                        <th> <div id = "fid1"><input type="text" name="newpass" placeholder="New password"> </th> <br>
                    </tr>

                </div>');

                echo('<div>
                <table align = "center">
                <tr>
                    <th> <div id = "fid1"> <button <a class="button primary" name="edit-submit"> UPDATE </a> </button> </div> </th>
                    <th> <div id = "fid1"> <button <a class="button primary" name="back-submit"> BACK </a> </button> </div> </th>
                </tr>
                </table>

                </div>');

                if (isset($_GET["error"])) // getting the error checks from 'update_i.php'
                {
                    if ($_GET["error"] == "serverconnectionfailed")
                    {
                        echo ('Please try logging out and logging back in, the connection to the server has failed.');
                    }
                }
            }
            else
            {
                echo('<h4> Uh oh, something went wrong...</h4>');

                echo('
                <div id="setting-border" class="secondary">

                <h6> your old password is the same as your newly inputted password.</h6>
                <h6> We are redirecting you back to the settings page, </h6>
                <h6> go back and please try again. </h6>

                <th> <div id = "fid1"> <button <a class="button primary" name="back-submit"> BACK </a> </button> </div> </th>

                </div>');
            }
        ?>
    </form>
</html>