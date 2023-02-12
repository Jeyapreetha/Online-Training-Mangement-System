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
<form method="post" action="<?=BaseURL."webinar/editWebinar"?>">
<section class="row forms">
<h1 class="head">Edit Webinar Details </h1>
	<div class="col-sm-8 form">
	<div class="form-group">
			<label for="name">Title</label><span></span>
			<input value="<?=$webinar->title?>" type="text" name="title" class="form-control" id="title" placeholder="title">
		</div>
	<div class="form-group">
			<label for="name">Description</label><span></span>
			<input value="<?=$webinar->description?>" type="text" name="description" class="form-control" id="description" placeholder="description">
		</div>
	<div class="form-group">
			<label for="course">Course</label><span></span>
			<select  name="course" class="form-control" id="course" placeholder="course">
					<option value ="0">--- Select Courses---</option>
					<?php 
						foreach($courses as $course):
					?>
						<option value="<?=$course->id?>" <?php if($course->id == $webinar->course_id) echo "selected"; ?> > <?=$course->course_name?></option>
					<?php
						endforeach;
					?>
					</select>
	</div>
	<div class="form-group">
			<label for="topic">Topics</label><span></span>
			<select name="topic" class="form-control" id="topic" placeholder="topic">
					<option value ="0">--- Select Topics---</option>
					<?php 
						foreach($topics as $topic):
					?>
						<option value="<?=$topic->id?>" <?php if($topic->id == $webinar->topic_id) echo "selected"; ?>><?=$topic->topic_name?></option>
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
						<option value="<?=$trainer->id?>" <?php if($trainer->id == $webinar->trainer_id) echo "selected"; ?> ><?=$trainer->alias_name?></option>
					<?php
						endforeach;
					?>
					</select>
	</div>
	<div class="form-group">
			<label for="Schedule">Schedule  Date </label><span></span><br>
			<input value= "<?=date_format(date_create($webinar->schedule),"d-m-Y");?>" type="text" name="schedule" class="form-control" id="schedule" placeholder="Schedule Date">
	</div>
	<div class="form-group">
			<label for="Schedule">Schedule  Time </label><span></span><br>
			<input value="<?=date_format(date_create($webinar->schedule),"H:i");?>" type="text" name="scheduleTime" class="form-control" id="scheduleTime" placeholder="Schedule Time">
	</div>
	<div class="form-group">
		<label for="webinarURL">Webinar URL</label><span></span>
		<input value="<?=$webinar->webinar_url?>" type="text" name="webinarURL" class="form-control" id="webinarURL" placeholder="webinarURL">
	</div>
	<div class="form-group">
		<label for="meetingNumber">Meeting Number</label><span></span>
		<input value="<?=$webinar->meeting_number?>" type="text" name="meetingNumber" class="form-control" id="meetingNumber" placeholder="meetingNumber">
	</div>
	<div class="form-group">
		<label for="meetingPassword">Meeting Password</label><span></span>
		<input value="<?=$webinar->meeting_password?>" type="text" name="meetingPassword" class="form-control" id="meetingPassword" placeholder="meetingPassword">
	</div>

	<center><button type="submit" class="btn btn-primary">Update</button></center>
	</section>
	</div>
</form>