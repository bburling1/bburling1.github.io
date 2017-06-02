<?php
  function is_user_admin(){
    if(!isset($_SESSION['user'])){
      header('location:../index.php');
      exit();
    } elseif($_SESSION['permissions'] != 'admin') {
      //set error message
      $_SESSION['error'] = "You do not have the required permissions to access this page";
      //redirect to homepage if user isn't an admin
      header("location:../index.php");
      exit();
    }
  }

  function is_user_logged_in(){
    if(!isset($_SESSION['user'])){
      //set error message
      $_SESSION['error'] = "Please log in to access this page";
      //redirect to homepage is user isn't logged in
      header("location:../view/categories.php");
    }
  }

  function is_user_owner()
  {
    $thread = get_thread();
    if($_SESSION['user_id'] != $thread['user_id']){
      $_SESSION['error'] = "You don't have permission to access this page";
      header("location:../view/categories.php");
    }
  }
 ?>
