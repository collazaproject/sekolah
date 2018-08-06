<?php echo form_open('users/login');?>
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
	    <div class="page-header">
        <h2><?= $title ?> <small>Man Koto Baru solok</small</h2>
      </div>
	    <div class="form-group">
	      <label>Username</label>
	      <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
	    </div>
      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password" required autofocus>
      </div>
      <button class="btn btn-primary btn-block" type="submit">Login</button>
    </div>
  </div>
<?php echo form_close(); ?>