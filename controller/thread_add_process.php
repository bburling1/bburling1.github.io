<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_categories.php');
  require('../model/functions_threads.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$subject = $_POST['subject'];
	$content = $_POST['content'];
  $cat_id = $_POST['cat_id'];
	$user_id = $_POST['user_id'];
	$created = $_POST['created'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($subject) || empty($content) || empty($cat_id) || empty($user_id) || empty($created))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the category_add_form page to display the message
		header("location:../view/category_add_form.php");
		exit();
	} else {
		//END SERVER-SIDE VALIDATION

		//call the add_thread() function
		$result = add_thread($subject, $content, $cat_id, $user_id, $created);

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the threads page
			$_SESSION['success'] = 'Thread successfully created.';
			//redirect to threads.php
			header("location:../view/threads.php?cat_id=$cat_id");
		}
		else
		{
			//if category is not successfully added, create an error message to display on the add thread page
			$_SESSION['error'] = 'An error has occurred with the database. Please try again.';
			//redirect to threads.php
			header("location:../view/threads.php?cat_id=$cat_id");
		}
	}
?>
