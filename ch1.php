<?php

/*

Test page for the Learn option.

*/

?>

<!DOCTYPE html>
<html>
	<?php
		include "header.php";
	?>

	<body>
		<?php include 'navbar.php';?>
		
		<?php
				require "includes/db_i.php";
		
				$sql = "SELECT ch_text FROM chapters WHERE CHID = 1";
				$result = mysqli_query($connect, $sql);
			
				$row = mysqli_fetch_assoc($result); //creates an array of values from the result
				
				$chapter_text = "";
				
				foreach($row as &$value){ //pulls values out of array
				
					$chapter_text = $value;
					
				}
				
				echo $chapter_text;
				
		
		?>
		
		<footer>
			<p>	<a class="link" href="explore.php">Go back to chapter list</a> <br> </p>
		</footer>
	</body>
</html>