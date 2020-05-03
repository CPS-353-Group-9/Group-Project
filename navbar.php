<?php

	/*
	
		The navbar.php file.
		
		Spits out an html document which creates the navigation bar on the top of the website.
		Included on most pages.
	
    */
    
    session_start();

	$logged_in =
    ('<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #f58426;">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php" style="height: 50px;">
            <img src="img\EAPlogo.png" alt="EAP Logo" style="height: 50px; padding: 5px 10px 0 10px;">
            </a>
        
            <a :class="{ \'is-active\':isOpen }" @click="isOpen = !isOpen" role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    
        <div id=:class="{ \'is-active\':isOpen }" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item primary" href="index.php">
                Home
                </a>
        
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link primary" href="explore.php">
                        Learn
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item secondary" href="explore.php">
                        Explore The Text
                        </a>
                        <a class="navbar-item secondary" href="test.php">
                        Test Your Knowledge
                        </a>
                    </div>
                </div>
        
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link primary" href="stats.php">
                        Account
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item secondary" href="stats.php">
                        Stats
                        </a>
                        <a class="navbar-item secondary" href="settings.php">
                        Settings
                        </a>
                    </div>
                </div>
            </div>
        
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <!--
                        <a class="button primary" href="signup.php">
                        <strong>Sign up</strong>
                        </a>
                        <a class="button secondary" href="login.php">
                        Log in
                        </a>
                        -->
                        <a class="button secondary" href="includes/logout_i.php" type = "submit" name="logout-submit">
                            Log out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        export default {
            data: ()=>({
                isOpen: false
            })
        }
    </script>');

    $logged_out = 
    ('<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #f58426;">
        <div class="navbar-brand">
            <a class="" href="index.php" style="height: 50px;">
                <img src="img\EAPlogo.png" alt="EAP Logo" style="height: 50px; padding: 5px 10px 0 10px;">
            </a>
        
            <a :class="{ \'is-active\':isOpen }" @click="isOpen = !isOpen" role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
    
        <div id=:class="{ \'is-active\':isOpen }" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item primary" href="index.php">
                Home
                </a>
        
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link primary" href="explore.php">
                        Learn
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item secondary" href="explore.php">
                        Explore The Text
                        </a>
                        <a class="navbar-item secondary" href="test.php">
                        Test Your Knowledge
                        </a>
                    </div>
                </div>
                <!--
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link primary" href="stats.php">
                        Account
                    </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item secondary" href="stats.php">
                        Stats
                        </a>
                        <a class="navbar-item secondary" href="settings.php">
                        Settings
                        </a>
                    </div>
                </div>
                -->
            </div>
        
            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        <a class="button primary" href="signup.php">
                        <strong>Sign up</strong>
                        </a>
                        <a class="button secondary" href="login.php">
                        Log in
                        </a>
                        <!--
                        <a class="button secondary" href="includes/logout_i.php" type = "submit" name="logout-submit">
                            Log out
                        </a>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        export default {
            data: ()=>({
                isOpen: false
            })
        }
    </script>');

    if (isset($_SESSION['userId'])){ //if logged in, do not show login or signup buttons
        echo $logged_in;
    }
    else{ //if logged out, do not show account tab
        echo $logged_out; 
    }
?>