<!-- Content JoorxCMS -->
<h1 class="header">Login Page</h1>

<div class="container">
<div class="form-signin">
<?php echo validation_errors(); ?>
<?php echo form_open('login/aksi_login'); ?>
	<label for="Username">Username</label>
	<input class="form-control" type="text" name="username" placeholder="Masukan Username Anda ...">
	<label for="Password">Password</label>
	<input class="form-control" type="password" name="password" placeholder="Masukan Password Anda ...">
	<button name="submit" type="submit" id="myButton" class="btn btn-lg btn-primary btn-block">Login</button>
<?php echo form_close(); ?>
</div>
</div>
<!-- Content JoorxCMS -->
