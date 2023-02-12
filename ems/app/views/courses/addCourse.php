<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h3><?=$msg;?></h3>
<form method="post" action="<?=BaseURL."courses/addCourse"?>">
<section class="row forms">
	<h1 class="head">Add COURSE </h1>
	<div class="col-sm-8 form">
		<div class="form-group">
			<label for="name">Course</label><span></span>
			<input  type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
	
	<center><button type="submit" class="btn btn-primary">ADD</button></center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/bigstock-Stack-Of-Books-70033240-675x320.jpg" >
</form>