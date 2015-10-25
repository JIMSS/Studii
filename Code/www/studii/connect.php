<?php
	$server = 'localhost';
	$username = 'test';
	$password = 'test';
	$database = 'studiidb';
	
	$connection = mysqli_connect($server, $username, $password, $database);
	if(!$connection)
	{
		exit('oops cannnot connect');
	}
?>