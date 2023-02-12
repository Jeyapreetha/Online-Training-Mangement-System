<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<form method="post" action="<?=BaseURL."trainers/editTrainer"?>">
<section class="row forms">
<h1 class="head">EDIT TRAINER </h1>

	<div class="col-sm-8 form">
	<div class="form-group">
	<label for="role">Role</label><span></span>
	<select  name="role" class="form-control" id="role" placeholder="role">
			<option value ="0">--- Select Role---</option>
			<?php 
				foreach($roles as $role):
			?>
				<?php if($role->id != 1): ?>

				<option value="<?=$role->id?>" <?php if($trainer->role_id==$role->id) echo "selected";?>><?=$role->name?></option>
				<?php endif;?>
			<?php
				endforeach;
			?>
			
			</select>
	</div>
		<div class="form-group">
			<label for="name">Trainer </label><span></span>
			<input value="<?=$trainer->trainer_name?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="aliasname">AliasName</label><span></span>
			<input value="<?=$trainer->alias_name?>" type="text" name="aliasname" class="form-control" id="aliasname" placeholder="aliasname">
		</div>
		<div class="form-group">
			<label for="password">Password</label><span></span>
			<input value="<?=$trainer->password?>" type="password" name="password" class="form-control" id="password" placeholder="password">
		</div>
		<div class="form-group">
			<label for="emailId">Email Id </label><span></span>
			<input value="<?=$trainer->trainer_email?>" type="text" name="emailId" class="form-control" id="emailId" placeholder="emailId">
		</div>
		<div class="form-group">
			<label for="skypeId">Skype Id</label><span></span>
			<input value="<?=$trainer->trainer_skype_id?>" type="text" name="skypeId" class="form-control" id="skypeId" placeholder="skypeId">
		</div>
		<center><button type="submit" class="btn btn-primary ">Update</button></center>
		
	</div>
</section>	
<img class="side" src="<?=BaseURL?>images/elearning.jpg" >
		</form>
		
		