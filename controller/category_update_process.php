<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	//retrieve the functions
	require('../model/functions_categories.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$cat_id = $_POST['cat_id']; //the value in the hidden form field
	$cat_name = $_POST['cat_name'];
	$cat_description = $_POST['cat_description'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($cat_name) || empty($cat_description))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the product_update_form page to display the message
		header("location:../view/category_update_form.php?cat_id=". $cat_id);
		exit();
	} else {

	//END SERVER-SIDE VALIDATION

		//call the update_category() function
		$result = update_category($cat_id, $cat_name, $cat_description);

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the category page
			$_SESSION['success'] = 'Category successfully updated.';
			//redirect to category_update_form.php
			header("location:../view/category_update_form.php?cat_id=". $cat_id);
		}
		else
		{
			//if product is not successfully added, create an error message to display on the add product page
			$_SESSION['error'] = 'An error has occurred with the database. Please try again.';
			//redirect to category_update_form.php
			header("location:../view/categories.php");
		}
	}

?>
