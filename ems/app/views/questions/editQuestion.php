
<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h1>EDIT QUESTION </h1>
<form method="post" action="<?=BaseURL."questions/editQuestion"?>">

	<div class="col-sm-12">
		<div class="form-group">
			<label for="name">Question</label><span></span>
			<input value="<?=$question->question?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
	</div>
	
	<div class="col-sm-12">
		<button type="submit" class="btn btn-primary">Update</button>
	</div>
</form>