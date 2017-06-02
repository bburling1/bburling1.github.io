<?php
  //start session management
  session_start();
  //destroy the user session
  unset($_SESSION['user']);
  unset($_SESSION['user_id']);
  unset($_SESSION['permissions']);

  $_SESSION['success'] = "You have successfully logged out.";
  //redirect to the homepage after logout
  header("location:../index.php");
?>
