<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>

<div class="leftBar">
<h3>Courses</h3>
<span>
		<ul>
		<?php if($_SESSION["role_id"] ==3):?>
					
			<button onclick="window.location.href='<?=BaseURL."courses/addCourse"?>'" type="button" class="btn btn-info">
			<i class="fa fa-plus-square" aria-hidden="true"> Add Courses</i>
		<?php endif;?>
		</ul>
	</span>

 <ul>
		<table border=3 class="table table-hover">
					<tr class="head">
					<th><label for="inputUser" class=" control-label">Course name</label></th>
					<?php if($_SESSION["role_id"] ==3):?>
					<th><label for="inputUser" class=" control-label">Action</label></th>
					<?php endif;?>
					</tr>
		<?php 
			foreach($courses as $course):
		?>			<tr><td>
					
					<?=$course->course_name; ?>
					</td>
					<?php if($_SESSION["role_id"] ==3):?>
					
					<td>
					<button onclick="window.location.href='<?=BaseURL."courses/deleteCourse/".$course->id?>'" type="button" class="btn btn-danger"><i class="fa fa-trash color" aria-hidden="true"></i></button>
				     <button onclick="window.location.href='<?=BaseURL."courses/editCourse/".$course->id?>'" type="button" class="btn btn-success "><i class="fa fa-edit color" aria-hidden="true"></i></button>
					</td>
					<?php endif;?>
					</tr>
		<?php
			endforeach;
		?>
		</table>
	</li>
</ul>
</div>	