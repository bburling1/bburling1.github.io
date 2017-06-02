<!DOCTYPE html>
<html>
<head>
  <!-- Add variable $title to title tags to insert new value of each page -->
  <title><?php echo $title ?> - League of Forums</title>
  <!-- link to Bulma framework -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.2/css/bulma.css">
  <!-- link to Fonts -->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="fonts/font.css">
  <!-- link to CSS -->
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- link to jquery -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- link to javascript -->
  <script type="text/javascript" src="js/script.js"></script>
</head>

<body>
<?php
  //start session management
  session_start();

  require('../model/functions_messages.php');
  require('../model/functions_permissions.php');

  include "login_form.php";
?>
<div id="container">
  <nav class="level nav has-shadow">
    <p class="level-item has-text-centered">
      <a class="link is-info" href="../index.php">Home</a>
    </p>
    <p class="level-item has-text-centered">
      <a class="link is-info" href="../view/categories.php">Forum</a>
    </p>
    <p class="level-item has-text-centered">
      <a class="nav-item">
        <img src="images/lof_logo.PNG" alt="League of Forums Logo">
      </a>
    </p>
    <p class="level-item has-text-centered">
      <a class="link is-info" href="../view/profile.php">Profile</a>
    </p>
    <p class="level-item has-text-centered">
      <?php
        if(!isset($_SESSION['user'])){
      ?>
      <a onClick="showloginmodal()" class="link is-info">
        Login
      </a>
      <?php
        } else {
      ?>
      <a href="../controller/logout_process.php" class="link is-info">
        Logout
      </a>
      <?php } ?>
    </p>
  </nav>
