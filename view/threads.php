<?php
//connect to the database
require('../model/database.php');
require('../model/functions_categories.php');
require('../model/functions_threads.php');
require('../model/functions_users.php');
$result = get_category();
$title = $result['cat_name'];
include "header.php"
?>

<div class="container content">
<section class="section">
    <?php
    //user messages
    $message = user_message();
    //retrieve the category from the URL
    $result = get_category();
    ?>
    <div class="columns">
      <div class="column is-left">
        <h2>Threads from <?php echo $result['cat_name'];?></h2>
      </div>
      <?php
        if(isset($_SESSION['user'])){
      ?>
      <div class="column level-right is-one-quarter">
        <a href="../view/thread_add_form.php?cat_id=<?php echo $result['cat_id']?>" class="button is-info level-item">Create a New Thread</a>
      </div>
      <?php
        }
      ?>
    </div>
    <?php
    //call the get_categories() function
    $result = get_threads_by_category();
    ?>
    <div class="box">
      <div class="column is-gapless">
      <?php foreach($result as $row):?>
        <div class="columns box">
          <div class="column">
              <h3><a href='../view/post.php?thread_id=<?php echo $row['thread_id'];?>'><?php echo $row['subject'];?></a></h3>
              <p>Created on <?php $created = $row['created']; echo substr($created,0,10) . " at " . substr($created,11,5);?> by <?php $user_id = $row['user_id']; $username = get_username_by_user_id($user_id); echo $username[0];?></p>
              <?php
                if($row['updated'] != "0000-00-00 00:00:00"){
              ?>
              <p>Last updated on <?php $updated = $row['updated']; echo substr($updated,0,10) . " at " . substr($updated,11,5); ?> </p>
              <?php
                }
              ?>
          </div>
          <div class="column is-one-quarter">
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>
  </section>
</div>

<?php
include "footer.php"
?>
