<?php

	//create a function to retrieve data for the category dropdown menu
	function get_categories()
	//Retrieves all the categories to display in a dropdown menu
	{
		global $conn;
		$sql = 'SELECT * FROM categories ORDER BY cat_id';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	//create a function to retrieve a single category
	function get_category()
	//Retrieves a specific category based on the cat_id provided by the GET method
	{
		global $conn;
		//retrieve the cat_id from the URL
		$cat_id = $_GET['cat_id'];
		$sql = 'SELECT * FROM categories WHERE cat_id = :cat_id';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':cat_id', $cat_id);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	}

	//create a function to add a category to the database
	function add_category($cat_name, $cat_description)
	{
		global $conn;
		$sql = "INSERT INTO categories (cat_name, cat_description) VALUES (:cat_name, :cat_description)";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':cat_name', $cat_name);
		$statement->bindValue(':cat_description', $cat_description);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
	}

	//create a function to update an existing category
	function update_category($cat_id, $cat_name, $cat_description)
	{
		global $conn;
		$sql = "UPDATE categories SET cat_name = :cat_name, cat_description = :cat_description WHERE cat_id = :cat_id";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':cat_name', $cat_name);
		$statement->bindValue(':cat_description', $cat_description);
		$statement->bindValue(':cat_id', $cat_id);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
	}

	function delete_category(){
		
	}
?>
