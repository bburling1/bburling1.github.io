<?php
	//database connection details
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'lof';

	//connect to database with a try/catch statement
	//if the connection is not successful display the error message via database_error.php
	//the PDOException class represents the error raised by PDO
	//the PDO error is stored in the variable $e
	//the PDO error is returned as a string via the getMessage() function
	try
	{
		//tries to connect to the database using variables defined
		$conn = new PDO("mysql:host=$host;dbname=$database", $user, $password);
	}
	catch(PDOException $e)
	{
		//Store the error message in $e
		$error_message = $e->getMessage();
		//Display the database_error.php file
		include('../view/database_error.php');
		//end the statement
		exit();
	}
?>