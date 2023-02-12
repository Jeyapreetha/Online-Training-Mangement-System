
<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h1>Add Questuion </h1>
<form method="post" action="<?=BaseURL."questions/addQuestion"?>">
	<div class="col-sm-12">
		<div class="form-group">
			<label for="name">Question</label><span></span>
			<input  type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
	</div>
	
	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary">ADD</button>
	</div>
</form>