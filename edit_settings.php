<?php

/*

Settings page for the Account option.

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
        <h6>Enter the information that you want to fill and hit submit to update you personal information</h6>
        <h6>Anything starred must be filled</h6>
    </body>
    <form action = "includes/update_i.php" method="post">
        <?php
            if (isset($_SESSION['userId']))
            {
                echo(
                '<div id="setting-border" class="secondary">
                
                <div id = "fid1"><input type="text" name="prevuser" placeholder="Previous Username *">
                <div id = "fid1"><input type="text" name="user" placeholder="New Username">
                <div id = "fid1"><input type="text" name="email" placeholder="Email">
                <div id = "fid1"><input type="text" name="first" placeholder="First Name">
                <div id = "fid1"><input type="text" name="last" placeholder="Last Name">
                <div id = "fid1"><input type="text" name="middle" placeholder="Middle I">
                <div id = "fid1"><input type="text" name="country" placeholder="Country">
                <div id = "fid1"><input type="text" name="state" placeholder="State">
                <div id = "fid1"><input type="text" name="city" placeholder="City">
                <div id = "fid1"><input type="text" name="occupation" placeholder="Occupation"> <br>

                <table align = "center">
                    <tr>
                        <th> <div id = "fid1"><button type="submit" name="edit-submit">Update</button></div> </th>
                        <th> <div id = "fid1"><button type="submit" name="back-submit">Back</button></div> </th>
                    </tr>
                </table>
                </div>');

                if (isset($_GET["error"])) // getting the error checks from 'update_i.php'
                {
                    if ($_GET["error"] == "mustfillprevuserfield")
                    {
                        echo 'Must fill the previous username field';
                    }
                }
            }
            else
            {
                echo('<h4> Uh oh, something went wrong...</h4>');
            }
        ?>
    </form>
</html>