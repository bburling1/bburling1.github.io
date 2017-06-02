<div id="loginmodal" class="modal">
  <div onClick="closemodal()" class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Login to League of Forums</p>
      <button onClick="closemodal()" class="delete"></button>
    </header>
    <section class="modal-card-body">
      <form class="form login" action="../controller/login_process.php" method="post">
        <div class="field">
          <label class="label"><b>Username</b></label>
          <p class="control">
            <input class="input is-medium" type="text" placeholder="Username" name="username" required>
          </p>
        </div>
        <div class="field">
          <label class="label"><b>Password</b></label>
          <p class="control">
            <input class="input is-medium" type="password" placeholder="Password" name="password" required>
          </p>
        </div>
        <p>Don't have an account? <a href="registration_form.php">Register</a> here!</p>
        <div class="field is-grouped">
          <p class="control">
            <button class="button is-primary" type="submit">Login</button>
          </p>
          <a onClick="closemodal()" class="button">Cancel</a>
        </div>
      </form>
    </section>
    <footer class="modal-card-foot">
    </footer>
  </div>
</div>
