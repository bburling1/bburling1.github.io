<?php
  //connect to the database
  require('../model/database.php');
  //retrieve functions
  require('../model/functions_categories.php');
  require('../model/functions_threads.php');

  $title = "Create a Thread";

  include "header.php";
  $user = is_user_logged_in();
?>

<section class="section">
  <div class="container content">
    <form class="form" action="../controller/thread_add_process.php" method="post">
      <h2 class="form-title">Create a New Thread</h2>
      <?php
        //user messages
        $message = user_message();
      ?>
      <div class="field">
        <label class="label"><b>Subject</b></label>
        <p class="control">
          <input class="input" type="text" placeholder="Thread Title/Subject" name="subject" required>
        </p>
      </div>
      <div class="field">
        <label class="label"><b>Thread Content</b></label>
        <p class="control">
          <textarea class="textarea" placeholder="Thread Content" name="content"></textarea>
        </p>
      </div>
      <div class="field">
        <label class="label"><b>Category</b></label>
        <p class="control">
          <span class="select">
            <select name="cat_id">
            <?php
              $result = get_categories();
              foreach ($result as $row):
            ?>
              <option value="<?php echo $row['cat_id'];?>"
              <?php
              if (!empty(array_diff($_GET, ['']))) {
                if($row['cat_id'] == $_GET['cat_id']){
                  echo "selected";
                }
              }?>><?php echo $row['cat_name']; ?></option>
            <?php endforeach; ?>
            </select>
          </span>
        </p>
      </div>
      <div>
        <!-- the table has a hidden form field to pass the userID from the Session to the next page -->
        <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
        <!-- the table has a hidden form field to pass the current date to the next page -->
        <input name="created" type="hidden" value="<?php echo date("Y-m-d H:i:s");?>">
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
