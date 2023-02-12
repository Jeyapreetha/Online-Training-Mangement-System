<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h3><?=$msg;?></h3>

<form method="post" action="<?=BaseURL."topics/addTopic"?>">
<section class="row forms">
<h1 class="head">Add Topic </h1>
	<div class="col-sm-8 form ">
		<div class="form-group">
			<label for="course">Course</label><span></span>
			<select  name="course" class="form-control" id="course" placeholder="course">
					<option value ="0">--- Select Courses---</option>
					<?php 
						foreach($courses as $course):
					?>
						<option value="<?=$course->id?>" ><?=$course->course_name?></option>
					<?php
						endforeach;
					?>
					</select>
		</div>
		<div class="form-group">
			<label for="name">Topic</label><span></span>
			<input  type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<div class="form-group">
		<label for="duration">Duration</label><span></span>
		<input class="form-control" type="text" name="duration" placeholder="duration Time"></td>
		</div>
	
	<center>	<button type="submit" class="btn btn-primary">ADD</button></center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/book20review_65263741.jpg" >
</form>