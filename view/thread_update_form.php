<?php
  //connect to the database
  require('../model/database.php');
  //retrieve functions
  require('../model/functions_categories.php');
  require('../model/functions_threads.php');

  $title = "Create a Thread";

  include "header.php";
  $user = is_user_logged_in();
  $permissions = is_user_owner();
?>

<section class="section">
  <div class="container content">
    <form class="form" action="../controller/thread_update_process.php" method="post">
      <h2 class="form-title">Edit Thread</h2>
      <?php
        //user messages
        $message = user_message();

        //retrive the thread to autofill form
        $thread = get_thread();
      ?>
      <div class="field">
        <label class="label"><b>Subject</b></label>
        <p class="control">
          <input class="input" type="text" placeholder="Thread Title/Subject" name="subject" value="<?php echo $thread['subject'];?>" disabled>
        </p>
      </div>
      <div class="field">
        <label class="label"><b>Thread Content</b></label>
        <p class="control">
          <textarea class="textarea" placeholder="Thread Content" name="content"><?php echo $thread['content'];?></textarea>
        </p>
      </div>
      <div class="field">
        <label class="label"><b>Category</b></label>
        <p class="control">
          <span class="select">
            <select name="cat_id" disabled>
            <?php
              $result = get_categories();
              foreach ($result as $row):
            ?>
              <option value="<?php echo $row['cat_id'];?>"
              <?php
              if (!empty(array_diff($_GET, ['']))) {
                if($row['cat_id'] == $thread['cat_id']){
                  echo "selected";
                }
              }?>><?php echo $row['cat_name']; ?></option>
            <?php endforeach; ?>
            </select>
          </span>
        </p>
      </div>
      <div>
        <!-- the table has a hidden form field to pass the threadID from the Session to the next page -->
        <input name="thread_id" type="hidden" value="<?php echo $thread['thread_id']; ?>">
        <!-- the table has a hidden form field to pass the current date to the next page -->
        <input name="updated" type="hidden" value="<?php echo date("Y-m-d H:i:s");?>">
      </div>
      <div class="field">
        <p class="control">
          <button class="button is-primary" type="submit">Submit</button>
        </p>
      </div>
    </form>
  </div>
</section>

<?php
require('footer.php');
?>
