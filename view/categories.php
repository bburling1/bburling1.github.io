<?php
//connect to the database
require('../model/database.php');
require('../model/functions_categories.php');

$title = "Forum Categories";

include "header.php"
?>
<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        The Forums
      </h1>
      <h2 class="subtitle">
        View the available categories below!
      </h2>
    </div>
  </div>
</section> <!-- Banner -->
<section class="section container content">
  <?php
  //user messages
  $message = user_message();
  ?>
  <div class="columns">
    <div class="column is-left">
      <h2>Forum Categories:</h2>
    </div>
    <?php
      if(isset($_SESSION['user'])){
        if($_SESSION['permissions'] == 'admin'){
    ?>
    <div class="column level-right is-one-quarter">
      <a href="../view/category_add_form.php" class="button is-info level-item">Add Category</a>
    </div>
    <?php
        }
      }
    ?>
  </div>
  <?php
  //call the get_categories() function
  $result = get_categories();
  ?>
  <div class="box">
    <div class="column is-gapless">
    <?php foreach($result as $row):?>
      <div class="columns box">
        <div class="column">
          <h3><a href='threads.php?cat_id=<?php echo $row['cat_id'];?>'><?php echo $row['cat_name'];?></a></h3>
          <p><?php echo $row['cat_description'];?></p>
        </div>
        <div class="field is-grouped column is-one-quarter">
          <?php
            if(isset($_SESSION['user'])){
              if($_SESSION['permissions'] == 'admin'){
          ?>
          <p class="level-item control">
            <a class="button" href="../view/category_update_form.php?cat_id=<?php echo $row['cat_id'];?>">
              Update
            </a>
          </p>
          <p class="level-item control">
            <a class="button is-danger">
              Delete Category
            </a>
          </p>
          <?php
              }
            }
          ?>
        </div>
      </div>
    <?php endforeach; ?>
    </div>
  </div>
</section>

<?php
include "footer.php"
?>
