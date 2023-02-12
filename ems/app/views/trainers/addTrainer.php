<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h3><?=$msg;?></h3>

<form method="post" action="<?=BaseURL."trainers/addTrainer"?>">
<section class="row forms">
					<center><h1 class="head">Add Trainer </h1></center>

	<div class="col-sm-8 form" >
	<div class="form-group">
			<label for="role">Role</label><span></span>
			<select  name="role" class="form-control" id="role" placeholder="role">
					<option value ="0">--- Select Role---</option>
					<?php 
						foreach($roles as $role):
					?>
					<?php if($role->id != 1): ?>
						<option value="<?=$role->id?>" ><?=$role->name?></option>
						<?php endif;?>
					<?php
						endforeach;
					?>
					</select>
		</div>
		<div class="form-group">
			<label for="username">User name</label><span></span>
			<input  type="text" name="username" class="form-control" id="username" placeholder="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label><span></span>
			<input  type="password" name="password" class="form-control" id="password" placeholder="password">
		</div>
		<div class="form-group">
			<label for="name">Trainer</label><span></span>
			<input  type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="aliasname">Alias name</label><span></span>
			<input  type="text" name="aliasname" class="form-control" id="aliasname" placeholder="aliasname">
		</div>
		<div class="form-group">
			<label for="emailId">Email Id</label><span></span>
			<input  type="text" name="emailId" class="form-control" id="emailId" placeholder="emailId">
		</div>
		
		<div class="form-group">
			<label for="skypeId">Skype Id</label><span></span>
			<input  type="text" name="skypeId" class="form-control" id="skypeId" placeholder="skypeId">
		</div>
	<center>	<button type="submit" class="btn btn-primary">ADD</button></center>

	</div>
</section>
<img class="side" src="<?=BaseURL?>images/elearning.jpg" >

</form>
