<?php
	echo 
    ('<nav class="navbar" role="navigation" aria-label="main navigation" style="background-color: #f58426;">
        <div class="navbar-brand">
        <a class="navbar-item" href="index.html">
            <img alt="Group 9 Logo " width="112" height="28">
        </a>
    
        <a :class="{ \'is-active\':isOpen }" @click="isOpen = !isOpen" role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
        </div>
    
        <div id=:class="{ \'is-active\':isOpen }" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item primary">
            Home
            </a>
    
            <a class="navbar-item primary">
            Learn
            </a>
    
            <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link primary">
                Account
            </a>
            <div class="navbar-dropdown">
                <a class="navbar-item secondary">
                Stats
                </a>
                <a class="navbar-item secondary">
                Settings
                </a>
            </div>
            </div>
        </div>
    
        <div class="navbar-end">
            <div class="navbar-item">
            <div class="buttons">
                <a class="button primary" href="signup.php">
                <strong>Sign up</strong>
                </a>
                <a class="button secondary">
                Log in
                </a>
                <a class="button secondary" type = "submit" name="logout-submit">
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
?>