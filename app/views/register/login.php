<?php $this->setSiteTitle('Login - MVC Framework'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h2 class="my-3 text-center">LOGIN</h2>
<form action="<?=PROOT?>register/login" method="POST">
  <div><?= $this->displayErrors ?></div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username here">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="text" class="form-control" id="password" name="password" placeholder="Enter password here">
  </div>
  <div class="form-check">
      <input class="form-check-input" type="checkbox" id="remember_me">
      <label class="form-check-label" for="remember_me">
        Remember me
      </label>
    </div>
  <button type="submit" class="btn btn-primary my-2">Sign in</button>
</form>
<p>New user? <a href="<?=PROOT?>">Click here to register</a>.</p>
<?php $this->end(); ?>