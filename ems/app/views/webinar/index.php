<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>

<div class="leftBar">
<h3>Webinar</h3>

<span><strong>
		<button onclick="window.location.href='<?=BaseURL."webinar/addWebinar"?>'" type="button" class="btn btn-info">
		<i class="fa fa-plus-square" aria-hidden="true">Add Title</i>
		</button>
		
	</span></strong>
 <ul>
			<table border=3 class="table table-hover">
			<tr class="head">
			<th><label for="inputUser" class=" control-label">Title<label></th>
			<th><label for="inputUser" class=" control-label">Schedule</label></th>
			<th><label for="inputUser" class=" control-label">Course Name<label></th>
			<th><label for="inputUser" class=" control-label">Trainer Name<label></th>
			<th><label for="inputUser" class=" control-label">Duration</label></th>
			<th><label for="inputUser" class=" control-label">Action</label></th>
			</tr>
			
			<?php if($webinar):
			foreach($webinar as $webinars):
			?>
			<tr>
			<td>
			<?=$webinars->title; ?>
			</td>
			<td>
			<?=date_format(date_create($webinars->schedule),"d-m-Y H:i"); ?>
			</td>
			<td>
			<?=$webinars->course_name; ?>
			</td>
			<td>
			<?=$webinars->alias_name; ?>
			</td>
			<td>
			<?=$webinars->duration;?>
			</td>
			<td>
			<ul class="social1">
			<li><a href='<?=BaseURL."webinar/editWebinar/" .$webinars->id?>'" class="foo1 fa fa-pencil" ><span class="sr-only"></span></a></li>
			<li><a href='<?=BaseURL."webinar/deleteWebinar/" .$webinars->id?>'" class="foo1 fa fa-trash" ><span class="sr-only"></span></a></li>
			
			</ul>
			</td>
			</tr>
			<?php
			endforeach;
			endif;
		?>
	</table>
</ul>
</div>	