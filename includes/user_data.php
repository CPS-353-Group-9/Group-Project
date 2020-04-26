<?php
    /*
        This sets up all the $_SESSION variables for the user to be accessed by all other files/pages
    */

    if (isset($_SESSION['userId'])) {
        
        $userId = $_SESSION['userId'];
	    require "db_i.php";
	
		$user_profile_sql = "SELECT * FROM user_profile WHERE UPID=?;"; 
        $user_stats_sql = "SELECT * FROM user_stats WHERE UPID=?;"; 
		$user_badges_sql = "SELECT * FROM user_badges WHERE USID=?;"; 
		$user_grades_sql = "SELECT * FROM user_grades WHERE UPID=?;"; 

        $stmt = mysqli_stmt_init($connect);

        //user_profile table
		if (!mysqli_stmt_prepare($stmt, $user_profile_sql)) {
			echo('error in sql query');	
		}
		else {//if sql is a valid query
			mysqli_stmt_bind_param($stmt, "i", $userId);
			mysqli_stmt_execute($stmt);

            $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            
            $_SESSION['email'] = $row['email'];
            $_SESSION['userId'] = $row['UPID']; 
            $_SESSION['user'] = $row['user_name']; 
            $_SESSION['create'] = $row['account_creation'];
            $_SESSION['first'] = $row['first_name'];
            $_SESSION['last'] = $row['last_name'];
            $_SESSION['mi'] = $row['middle_initial'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['state'] = $row['state'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['occ'] = $row['occupation'];
		}

        //user_stats table
		if (!mysqli_stmt_prepare($stmt, $user_stats_sql)) {
			echo('error in sql query');	
		}
		else {//if sql is a valid query
			mysqli_stmt_bind_param($stmt, "i", $userId);
			mysqli_stmt_execute($stmt);

            $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            
            $_SESSION['statId'] = $row['USID'];
            $_SESSION['userId'] = $row['UPID']; 
            $_SESSION['exp'] = $row['user_exp']; 
            $_SESSION['level'] = $row['user_level'];
        }
        
        //user_badges table
		if (!mysqli_stmt_prepare($stmt, $user_badges_sql)) {
			echo('error in sql query');	
		}
		else {//if sql is a valid query
            mysqli_stmt_bind_param($stmt, "i", $statId);
            $statId = $_SESSION['statId'];
			mysqli_stmt_execute($stmt);

            $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            
            $_SESSION['badgeId'] = $row['BID'];
            $_SESSION['statId'] = $row['USID']; 
            $_SESSION['badge1'] = $row['badge_1'];
            $_SESSION['badge2'] = $row['badge_2'];
            $_SESSION['badge3'] = $row['badge_3'];
            $_SESSION['badge4'] = $row['badge_4'];
            $_SESSION['badge5'] = $row['badge_5'];
            $_SESSION['badge6'] = $row['badge_6'];
            $_SESSION['badge7'] = $row['badge_7'];
            $_SESSION['badge8'] = $row['badge_8'];
            $_SESSION['badge9'] = $row['badge_9'];
            $_SESSION['badge10'] = $row['badge_10'];
		}

        //user_grades table
		if (!mysqli_stmt_prepare($stmt, $user_grades_sql)) {
			echo('error in sql query');	
		}
		else {//if sql is a valid query
			mysqli_stmt_bind_param($stmt, "i", $userId);
			mysqli_stmt_execute($stmt);

            $row = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
            
            $_SESSION['userId'] = $row['UPID']; 
            $_SESSION['test1'] = $row['test_1']; 
            $_SESSION['test2'] = $row['test_2'];
            $_SESSION['test3'] = $row['test_3'];
            $_SESSION['test4'] = $row['test_4'];
            $_SESSION['test5'] = $row['test_5'];
		}
    }

?>