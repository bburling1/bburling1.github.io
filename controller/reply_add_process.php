<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_categories.php');
  require('../model/functions_threads.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$content = $_POST['content'];
  $thread_id = $_POST['thread_id'];
	$user_id = $_POST['user_id'];
	$created = $_POST['created'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($content) || empty($thread_id) || empty($user_id) || empty($created))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = "Error submitting reply";
		//redirect to the category_add_form page to display the message
		header("location:../view/post.php?thread_id=$thread_id");
		exit();
	} else {
		//END SERVER-SIDE VALIDATION

		//call the add_thread() function
		$result = add_reply($content, $thread_id, $user_id, $created);

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the threads page
			$_SESSION['success'] = 'Reply successfully added.';
			//redirect to threads.php
			header("location:../view/post.php?thread_id=$thread_id");
		}
		else
		{
			//if category is not successfully added, create an error message to display on the add thread page
			$_SESSION['error'] = "Error submitting reply";
			//redirect to threads.php
			header("location:../view/post.php?thread_id=$thread_id");
		}
	}
?>
