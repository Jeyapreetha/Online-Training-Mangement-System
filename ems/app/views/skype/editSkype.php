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

<form method="post" action="<?=BaseURL."skype/editSkype"?>">
<section class="row forms">
<h1 class="head">Edit Skype Details </h1>

	<div class="col-sm-8 form">
	
	<div class="form-group">
			<label for="student">Students</label><span></span>
			<select  name="student" class="form-control" id="student" placeholder="student">
					<option value ="0">--- Select Student---</option>
					<?php 
						foreach($students as $student):
					?>
						<option value="<?=$student->student_id?>" <?php if($student->student_id == $skype->student_id) echo "selected"; ?>><?=$student->name?></option>
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
						<option value="<?=$course->id?>" <?php if($course->id == $skype->course_id) echo "selected"; ?> > <?=$course->course_name?></option>
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
						<option value="<?=$topic->id?>" <?php if($topic->id == $skype->topic_id) echo "selected"; ?>><?=$topic->topic_name?></option>
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
						<option value="<?=$trainer->id?>" <?php if($trainer->id == $skype->trainer_id) echo "selected"; ?> ><?=$trainer->alias_name?></option>
					<?php
						endforeach;
					?>
					</select>
	</div>
	<div class="form-group">
			<label for="Schedule">Schedule  Date </label><span></span><br>
			<input value= "<?=date_format(date_create($skype->schedule),"d-m-Y");?>" type="text" name="schedule" class="form-control" id="schedule" placeholder="Schedule Date">
	</div>
	<div class="form-group">
			<label for="Schedule">Schedule  Time </label><span></span><br>
			<input value="<?=date_format(date_create($skype->schedule),"H:i");?>" type="text" name="scheduleTime" class="form-control" id="scheduleTime" placeholder="Schedule Time">
	</div>
	<center>	<button type="submit" class="btn btn-primary">Update</button></center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/468946697.jpg" >

</form>