<?php
  //connect to the database
  require('../model/database.php');
  require('../model/functions_categories.php');
  require('../model/functions_threads.php');
  require('../model/functions_users.php');

  $title = "Post";
  include "header.php";
  $t = get_thread();

?>

<section class="section">
  <div class="container">
    <?php
      //user messages
      $message = user_message();
    ?>
    <div class="box" id="threadbox">
      <article class="media">
        <div class="media-left">
          <h6 class="subtitle has-text-centered"><strong><?php $user_id = $t['user_id']; $username = get_username_by_user_id($user_id); echo $username[0];?></strong></h6>
          <figure class="image is-128x128">
            <img src="../view/images/tier-icons/base-icons/challenger.png" alt="Image">
          </figure>
        </div>
        <div class="media-content">
          <div class="content box">
              <p><h4 class="title is-4"><?php echo $t['subject'];?></h4><?php echo $t['content'];?></p>
          </div>
        </div>
      </article>
    </div>
    <?php
    $result = get_replies_by_thread();
    foreach($result as $row):
      ?>
      <div class="box" id="threadbox">
        <article class="media">
          <div class="media-left">
            <h6 class="subtitle has-text-centered"><strong><?php $user_id = $row['user_id']; $username = get_username_by_user_id($user_id); echo $username[0];?></strong></h6>
            <figure class="image is-128x128">
              <img src="../view/images/tier-icons/base-icons/bronze.png" alt="Image">
            </figure>
          </div>
          <div class="media-content">
            <div class="content box">
              <p>
                <?php echo $row['content'];?>
              </p>
            </div>
          </div>
        </article>
      </div>
    <?php endforeach;
    if(isset($_SESSION['user'])){?>
    <div class="box" id="threadbox">
      <article class="media">
        <figure class="media-left">
          <p class="image is-128x128">
            <img src="http://bulma.io/images/placeholders/128x128.png">
          </p>
        </figure>
        <div class="media-content">
          <form action="../controller/reply_add_process.php" method="post">
            <div class="field">
              <p class="control">
                <textarea name="content" class="textarea" placeholder="Add a comment..."></textarea>
              </p>
            </div>
            <div>
              <!-- the table has a hidden form field to pass the userID from the Session to the next page -->
              <input name="user_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
              <!-- the table has a hidden form field to pass the current date to the next page -->
              <input name="created" type="hidden" value="<?php echo date("Y-m-d H:i:s");?>">
              <!-- the table has a hidden form field to pass the thread id to the next page -->
              <input name="thread_id" type="hidden" value="<?php echo $_GET['thread_id'];?>">
            </div>
            <div class="field">
              <p class="control">
                <button class="button is-primary" type="submit">Submit</button>
              </p>
            </div>
          </form>
        </div>
      </article>
    </div>
    <?php } ?>
  </div>
</section>


<?php
  include "footer.php"
?>
