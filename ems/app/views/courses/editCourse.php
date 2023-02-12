<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<form method="post" action="<?=BaseURL."courses/editCourse"?>">
<section class="row forms">
<div class="col-sm-8 form">
<h1 class="head">EDIT COURSE </h1>

	<div class="form-group">
			<label for="name">Course</label><span></span>
			<input value="<?=$course->course_name?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<center><button type="submit" class="btn btn-primary">Update</button></center>
	</div>
	
	
</section>
<img class="side" src="<?=BaseURL?>images/book20review_65263741.jpg.jpg" >
	
</form>