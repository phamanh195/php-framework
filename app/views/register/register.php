<?php $this->setSiteTitle('Register - MVC Framework'); ?>
<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<h2 class="my-3 text-center">REGISTER</h2>
<form action="<?=PROOT?>register/register" method="POST">

    <div><?= $this->displayErrors ?></div>

    <div class="form-group mt-1">
        <label for="fname">First name</label>
        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your first name">
    </div>

    <div class="form-group mt-1">
        <label for="lname">Last name</label>
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your last name">
    </div>

    <div class="form-group mt-1">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your last name">
    </div>

    <div class="form-group mt-1">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Choose a userame">
    </div>

    <div class="form-group mt-1">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Choose a Password">
    </div>

    <div class="form-group mt-1">
        <label for="cpassword">Confirm Password</label>
        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm your Password">
    </div>

    <button type="submit" class="btn btn-primary mt-2 mb-5">Register</button>
</form>
<?php $this->end(); ?>