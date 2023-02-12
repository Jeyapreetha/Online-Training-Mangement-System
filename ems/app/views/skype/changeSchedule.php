<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<script>
$(function(){
	$('#rescheduleTime').pickatime({
		formatSubmit:'HH:i',
		hiddenName:true
	});
	$("#reschedule").datepicker({
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
<form method="post"  action="<?=BaseURL."skype/changeSchedule"?>">
<section class="row forms">
<h1 class="head">Change schedule</h1>

	<div class="col-sm-8 form">
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
			<label for="reSchedule">ReSchedule  Date </label><span></span><br>
			<input value= "<?=date_format(date_create($skype->reschedule),"d-m-Y");?>" type="text" name="reschedule" class="form-control" id="reschedule" placeholder="Schedule Date">
	</div>
	<div class="form-group">
			<label for="reSchedule">ReSchedule  Time </label><span></span><br>
			<input value="<?=date_format(date_create($skype->reschedule),"H:i");?>" type="text" name="rescheduleTime" class="form-control" id="rescheduleTime" placeholder="Schedule Time">
	</div>
	
	<center><button type="submit" class="btn btn-primary">Update</button></center>
	</div>
	</section>
</form>