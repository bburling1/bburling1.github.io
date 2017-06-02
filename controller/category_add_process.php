<?php
	//start session management
	session_start();
	//connect to the database
	require('../model/database.php');
	require('../model/functions_categories.php');

	//retrieve the data that was entered into the form fields using the $_POST array
	$cat_name = $_POST['cat_name'];
	$cat_description = $_POST['cat_description'];

	//START SERVER-SIDE VALIDATION
	//check if all required fields have data
	if (empty($cat_name) || empty($cat_description))
	{
		//if required fields are empty initialise a session called 'error' with an appropriate user message
		$_SESSION['error'] = 'All * fields are required.';
		//redirect to the category_add_form page to display the message
		header("location:../view/category_add_form.php");
		exit();
	} else {
		//END SERVER-SIDE VALIDATION

		//call the add_category() function
		$result = add_category($cat_name, $cat_description);

		//create user messages
		if($result)
		{
			//if category is successfully added, create a success message to display on the categories page
			$_SESSION['success'] = 'Category successfully added.';
			//redirect to products.php
			header('location:../view/categories.php');
		}
		else
		{
			//if category is not successfully added, create an error message to display on the add category page
			$_SESSION['error'] = 'An error has occurred with the database. Please try again.';
			//redirect to product.php
			header('location:../view/category_add_form.php');
		}
	}
?>
