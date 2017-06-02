<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_categories.php');
  require('../model/functions_threads.php');

	//retrieve the data that was entered into the form fields using the $_POST array
  $thread_id = $_POST['thread_id'];
	$content = $_POST['content'];
	$updated = $_POST['updated'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($content) || empty($updated))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the category_add_form page to display the message
		header("location:../view/thread_update_form.php?thread_id=$thread_id");
		exit();
	} else {
		//END SERVER-SIDE VALIDATION

		//call the add_thread() function
		$result = update_thread($content, $updated, $thread_id);

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the threads page
			$_SESSION['success'] = 'Thread successfully updated.';
			//redirect to threads.php
			header("location:../view/thread_update_form.php?thread_id=$thread_id");
		}
		else
		{
			//if category is not successfully added, create an error message to display on the add thread page
			$_SESSION['error'] = 'An error has occurred with the database. Please try again.';
			//redirect to threads.php
			header("location:../view/thread_update_form.php?thread_id=$thread_id");
		}
	}
?>
