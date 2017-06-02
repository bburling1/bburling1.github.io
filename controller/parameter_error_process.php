<?php
    if (empty(array_diff($_GET, ['']))) {
      header('location:../index.php');
    }
?>
