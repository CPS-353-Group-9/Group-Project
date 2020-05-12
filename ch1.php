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
		<h3>Chapter 1</h3>
		
		<div class="textbook-body">
			<section>
				<h4>What is Programming?</h4>
					
				<p> As defined by Wikipedia, "Computer programming is the process of designing and building an executable computer program to accomplish a specific computing result." Basically, programming is telling a computer to do something--as simple as that!</p>
				
				<p>Different programming languages have been developed (and continue to be developed) to make it easier for people to do this. Python is arguably one of the simplest to learn but has a lot of great functionality and is quite versatile in its use. That is why we chose the language as the basis for our site--we want to make it easy for you to jump right in and be able to call yourself a programmer!</p>
			</section>
			
			<section>
				<h4>Data Types and Variables</h4>

				<p>
					In every coding language, there are what are called <span class="keywords">data types</span>. As the name suggests, a data type is a category of data into which a piece of information falls. The four basic ones that every programmer should know are int, float, char, and void.<sup>1</sup> 
					<span class="keywords">Integers (ints)</span> and <span class="keywords">floats</span> are both types of numbers. The difference is that integers are whole numbers only while floats include decimals. Both include negative numbers. 
					The <span class="keywords">char</span> data type stands for character, but it is more often thought of as a <span class="keywords">string</span>. A string is just a series of one or more characters. You can think of it as a word or phrase. Strings are denoted by being put in quotation marks. 
					Lastly, <span class="keywords">void</span> just means empty. It is also referred to as <span class="keywords">null</span>. To denote a value as "null" in Python, we use the <span class="keywords">None</span> keyword.
				</p>
				<p> 
					No matter the type of data, it is important to be able to store information. In programming, this is done with <span class="keywords">variables</span>. Just like in math, a variable is a placeholder for a <span class="keywords">value</span> except it doesn't just have to be a number. In Python, a variable can be called anything you want, as long as it starts with a letter or character that is not a number. Let's look at an example.
				</p>
				<p>
					Let's say you want to store a person's name and age. Their name would be stored as a string, and their age would be stored as an int (unless of course it is for a young child who insists that they are 5 "and three quarters"). Unlike many coding languages, Python does not require you to specify the data type of a variable when declaring one,<sup>2</sup> so you can just create and use variables right then and there. To create a variable and assign a value to it, simply type what you want to call it followed by the equal sign (=) and its value. Like this:
					<br>
					<!--To be implemented later
					Enter you name and age.
					<form id="variables">
						Name: <input type="text" name="name" id="name">
						Age: <select>
								<?php /*
									for ($i=0; $i<=100; $i++){
										echo('<option value="'.$i.'">'.$i.'</option>');
									}*/
								?>
							</select>
					</form>
					Python code:-->
					<code>
						name = Karen
						age = 25
					</code>
				</p>
				<p>
					<sup>1</sup> Another common data type is <span class="keywords">boolean</span>, which is either true or false. However, booleans don't fall under the basic data types because they are technically just ints, as <i>true</i> is interpreted as 1, and <i>false</i> is interpreted as 0.
				</p>
				<p>
					<sup>2</sup> Many other coding languages (such as Java and C) allow and/or require you to <span class="keywords">declare</span> a variable before you can use it. To declare a variable just means to define it for the first time, not necessarily <span class="keywords">assigning</span> a value it. 
				</p>
			</section>

			<section>
				<h4>Print Statements</h4>

				<p>Now say we have some variables, what if we wanted to see them on our screen? This is where <span class="keywords">print statements</span> come in.</p>
			</section>
			
			<section>
				<h4 style="padding-bottom: none">Making Calculations</h4>
				<h6 style="padding-bottom: none">Just a little math, don't be scared :)</h6>
			
				<p>Just like a regular calculator, we can use Python to perform operations on numbers and show us the results. </p>
				<br/>
			</section>
			
		</div>

		<footer>
			<p>	<a class="link" href="explore.php">Go back to chapter list</a> <br> </p>
		</footer>
	</body>
</html>