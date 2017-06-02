<section class="section">
  <div class="container">
    <?php
    $message = user_message();
    ?>
    <div class="columns">
      <div class="column is-1">
      </div>

      <div class="column is-3">
        <div class="card">
          <div class="card-content">
            <figure class="image">
              <?php
              if($_SESSION['avatar'] == ''){
              ?>
              <p>You do not have an avatar</p>
              <?php } else {?>
              <img src="../view/images/<?php echo $_SESSION['avatar']; ?>">
              <?php } ?>
            </figure>
          </div>
        </div>
      </div>
      <div class="column is-6">
        <form class="form register" onsubmit="return confirm_password()" action="../controller/update_user_information.php" method="post">
          <h2 class="form-title">Update Your Information</h2>
          <?php
          $user = get_user_information();
          ?>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Username</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input name="username" class="input" type="text" placeholder="<?php echo $user['username'];?>" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Email</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input name="email" class="input" type="email" placeholder="<?php echo $user['email'];?>">
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Enter Password</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input id="password" class="input" type="password" placeholder="Enter Password" name="password" required>
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Confirm Password</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <input id="password_confirm" onkeyup="confirm_password()" class="input" type="password" placeholder="Confirm your Password" name="password_confirm" required>
                  <p id="passwordnotification" class="help is-danger"></p>
                </div>
              </div>
            </div>
          </div>
          <p id="registernotification" class="help is-danger"></p>
          <div class="field is-horizontal">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control">
                  <button type="submit" class="button is-primary">
                    Update Information
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
          <form class="form" action="../controller/uploadprofilepicture.php" method="post" enctype="multipart/form-data">
            <h2 class="form-title">Change Profile Picture</h2>
            <div class="field is-horizontal">
              <div class="field-label">
                <label class="label">Upload Image</label>
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input id="imageupload" type="file" name="uploadedimage">
                  </div>
                </div>
              </div>
            </div>
            <div class="field is-horizontal">
              <div class="field-label">
                <!-- Left empty for spacing -->
              </div>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input id="imagesubmit" type="submit" class="button is-primary" name="submit" value="Change Picture" disabled>
                  </div>
                </div>
              </div>
            </div>
          </form>
          </p>
        </footer>
      </div>
      <div class="column is-2">
      </div>
    </div>
  </div>
</section>
