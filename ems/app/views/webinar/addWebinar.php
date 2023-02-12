<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<script>
$(function(){
	$('#scheduleTime').pickatime({
		formatSubmit:'HH:i',
		hiddenName:true
	});
	$("#schedule").datepicker({
		minDate:new Date(),
		changeMonth:true,
		changeYear:true,
		 showOn: "button",
      buttonImage: "<?=BaseURL?>images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date",
	  dateFormat:"yy-mm-dd"
	});
});
</script>

<h3><?=$message;?></h3>
<form id="addSyllabus" method="post"  action="<?=BaseURL."webinar/addWebinar"?>">
<section class="row forms">
<h1 class="head">Add Title </h1>
<div class="col-sm-8 form">
	<div class="form-group">
		<label for="topic">Title</label><span></span>
		<input value="" type="text" name="title" class="form-control" id="title" placeholder="title">
	</div>
	<div class="form-group">
		<label for="description">Description</label><span></span>
		<input value="" type="text" name="description" class="form-control" id="description" placeholder="description">
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
			<label for="trainer">Trainer</label><span></span>
			<select  name="trainer" class="form-control" id="trainer" placeholder="trainer">
					<option value ="0">--- Select Trainer---</option>
					<?php 
						foreach($trainers as $trainer):
					?>
						<option value="<?=$trainer->id?>" ><?=$trainer->alias_name?></option>
					<?php
						endforeach;
					?>
					</select>
	</div>
	
		<div class="form-group">
			<label for="Schedule">ScheduleDate </label><span></span><br>
			<input value= "" type="text" name="schedule" class="form-control" id="schedule" placeholder="Schedule Date">
	</div>
	<div class="form-group">
			<label for="Schedule">ScheduleTime </label><span></span><br>
			<input value="" type="text" name="scheduleTime" class="form-control" id="scheduleTime" placeholder="Schedule Time">
	</div>
	<div class="form-group">
		<label for="webinarURL">Webinar URL</label><span></span>
		<input value="" type="text" name="webinarURL" class="form-control" id="webinarURL" placeholder="webinarURL">
	</div>
	<div class="form-group">
		<label for="meetingNumber">Meeting Number</label><span></span>
		<input value="" type="text" name="meetingNumber" class="form-control" id="meetingNumber" placeholder="meetingNumber">
	</div>
	<div class="form-group">
		<label for="meetingPassword">Meeting Password</label><span></span>
		<input value="" type="text" name="meetingPassword" class="form-control" id="meetingPassword" placeholder="meetingPassword">
	</div>
<center><button type="submit" class="btn btn-primary">ADD</button></center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/download.jpg" >
	
</form>