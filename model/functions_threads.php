<?php

	//create a function to retrieve all products in a specific category
	function get_threads_by_category()
	//Use the GET method to retrieve a category, retrieve all products from that category
	{
		global $conn;

		//retrieve the categoryID from the URL
		$cat_id = $_GET['cat_id'];
		//query the database to select all data from the product table
		$sql = 'SELECT * FROM thread WHERE cat_id = :cat_id ORDER BY thread_id';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':cat_id', $cat_id);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	//create a function to retrieve a thread from the thread_id using the GET method
	function get_thread()
	{
		global $conn;
		//retrieve the cat_id from the URL
		$thread_id = $_GET['thread_id'];
		$sql = 'SELECT * FROM thread WHERE thread_id = :thread_id';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':thread_id', $thread_id);
		$statement->execute();
		//use the fetch() method to retrieve a single row
		$result = $statement->fetch();
		$statement->closeCursor();
		return $result;
	}


	//create a function to add a new thread to the database
	function add_thread($subject, $content, $cat_id, $user_id, $created)
	{
		global $conn;
		$sql = "INSERT INTO thread (subject, content, cat_id, user_id, created, updated) VALUES (:subject, :content, :cat_id, :user_id, :created, :updated)";
		$statement = $conn->prepare($sql);
		$statement->bindvalue(':subject', $subject);
		$statement->bindValue(':content', $content);
		$statement->bindValue(':cat_id', $cat_id);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':created', $created);
		$statement->bindValue(':updated', '');
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
	}

	function update_thread($content, $updated, $thread_id)
	{
		global $conn;
		$sql = "UPDATE thread SET content = :content, updated = :updated WHERE thread_id = :thread_id";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':content', $content);
		$statement->bindValue(':updated', $updated);
		$statement->bindValue(':thread_id', $thread_id);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
	}

	function get_replies_by_thread()
	//Use the GET method to retrieve a category, retrieve all products from that category
	{
		global $conn;
		//retrieve the categoryID from the URL
		$thread_id = $_GET['thread_id'];
		//query the database to select all data from the product table
		$sql = 'SELECT * FROM reply WHERE thread_id = :thread_id ORDER BY created';
		//use a prepared statement to enhance security
		$statement = $conn->prepare($sql);
		$statement->bindValue(':thread_id', $thread_id);
		$statement->execute();
		$result = $statement->fetchAll();
		$statement->closeCursor();
		return $result;
	}

	function add_reply($content, $thread_id, $user_id, $created)
	{
		global $conn;
		$sql = "INSERT INTO reply (content, thread_id, user_id, created) VALUES (:content, :thread_id, :user_id, :created)";
		$statement = $conn->prepare($sql);
		$statement->bindValue(':content', $content);
		$statement->bindValue(':thread_id', $thread_id);
		$statement->bindValue(':user_id', $user_id);
		$statement->bindValue(':created', $created);
		$result = $statement->execute();
		$statement->closeCursor();
		return $result;
	}

	function get_threads_by_user($user){
		global $conn;

	}
?>
