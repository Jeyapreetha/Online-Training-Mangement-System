<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h3><?=$message;?></h3>
<form id="addSyllabus" method="post"  action="<?=BaseURL."skype/requestSkype"?>">
<section class="row forms">
<h1 class="head">Request Skype </h1>
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
			<label for="topic">Topics</label><span></span>
			<select  name="topic" class="form-control" id="topic" placeholder="topic">
					<option value ="0">--- Select Topics---</option>
					<?php 
						foreach($topics as $topic):
					?>
						<option value="<?=$topic->id?>"><?=$topic->topic_name?></option>
					<?php
						endforeach;
					?>
					</select>
		</div>
		
	<center><button type="submit" class="btn btn-primary">ADD</button></center>
	</div>
	</section>
</form>