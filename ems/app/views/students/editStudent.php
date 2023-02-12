<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<form method="post" action="<?=BaseURL."students/editStudent"?>">
<section class="row forms">
<div class="col-sm-8 form">
<h1 class="head">EDIT STUDENT </h1>

		<div class="form-group">
			<label for="name">Name</label><span></span>
			<input value="<?=$student->name?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="course">Course</label><span></span>
			<select  name="course" class="form-control" id="course" placeholder="course">
					<option value ="0">--- Select Courses---</option>
					<?php 
						foreach($courses as $course):
					?>
						<option value="<?=$course->id?>" <?php if($student->course_id==$course->id) echo "selected";?>><?=$course->course_name?></option>
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
						<option value="<?=$trainer->id?>" <?php if($student->alias_id==$trainer->id) echo "selected";?>><?=$trainer->alias_name?></option>
					<?php
						endforeach;
					?>
					</select>
		</div>
		<div class="form-group">
			<label for="mobile">Mobile</label><span></span>
			<input value="<?=$student->mobile?>" type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile">
		</div>
		<div class="form-group">
			<label for="skypeId">Skype Id</label><span></span>
			<input value="<?=$student->skype_id?>" type="text" name="skypeId" class="form-control" id="skypeId" placeholder="skypeId">
		</div>
		<div class="form-group">
			<label for="address">Address</label><span></span>
			<input value="<?=$student->address?>" type="text" name="address" class="form-control" id="address" placeholder="Address">
		</div>
	
	
	<center><button type="submit" class="btn btn-primary">Update</button></center>
	</div>
	
</section>
<img class="side" src="<?=BaseURL?>images/BL31_elearn_jpg_1924959f.jpg" >
	
</form>