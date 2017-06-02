<?php
  //connect to the database
  require('../model/database.php');
  //retrieve functions
  require('../model/functions_categories.php');

  $title = "Add Category";

  include "header.php";
  $user = is_user_admin();
?>

<section class="section">
  <div class="container content">
    <form class="form" action="../controller/category_add_process.php" method="post">
      <h2 class="form-title">Add a Discussion Category</h2>
      <?php
        //user messages
        $message = user_message();
      ?>
      <div class="field">
        <label class="label"><b>Category Name*</b></label>
        <p class="control">
          <input class="input" type="text" placeholder="Category Name" name="cat_name" required>
        </p>
      </div>
      <div class="field">
        <label class="label"><b>Category Description*</b></label>
        <p class="control">
          <textarea class="textarea" placeholder="Description" name="cat_description"></textarea>
        </p>
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-primary" type="submit">Register</button>
        </p>
      </div>
    </form>
  </div>
</section>

<?php
require('footer.php');
?>
