<div class="page-header">
  <h2><?= $title ?> <small>Man Koto Baru solok</small</h2>
</div>
<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="name" class="form-control" placeholder="input Name">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" placeholder="input Email">
  </div>
  <div class="form-group">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="input Username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="input Password">
  </div>
  <div class="form-group">
    <label>Confirm password </label>
    <input type="password" name="repassword" class="form-control" placeholder="input Password Again">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Submit</button>
<?php echo form_close(); ?>