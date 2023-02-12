		<?php include HOME . DS . 'includes' . DS . 'header1.inc.php'; ?>
		
		<div class="col-sm-12 loginscreen">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 login">
				<h1 class="ribbon">Login</h1>
				<form action="<?=BaseURL."users/loginPost"?>" method="POST" id="login" class="form-horizontal">
				  <div class="form-group">
					<label for="inputUser" class="col-sm-3 control-label">Username</label>
					<div class="col-sm-9">
					  <input name="user" type="text" class="form-control" id="inputUser" placeholder="Username">
					</div>
				  </div>
				  <div class="form-group">
					<label for="inputPassword" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-9">
					  <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password">
					</div>
				  </div>
				 
				  <div class="form-group">
					<div class="col-sm-offset-3 col-sm-3">
					  <button type="submit" class="btn btn-primary btnlogin">Sign in</button>
					</div>
					<div class="col-sm-offset-3 col-sm-3">
					  <button onclick="window.location.href='<?=BaseURL."users/register"?>'" type="button" class="btn btn-primary btnlogin">Register</button>
					</div>
					<div class="col-sm-5">
					  <span id="error"><?=$msg?></span>
					</div>
				  </div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		  </div>