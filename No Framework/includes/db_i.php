<?php

	$host = 'localhost';
	$user = 'se_20s_g09';
	$pass = '6j1v7u';
	$db_name = 'se_20s_g09_db';

	$connect = mysqli_connect($host, $user, $pass, $db_name);

	if ($connect == false)
	{
		die("ERROR: Could not connect to server. " . mysqli_connect_error());
	}