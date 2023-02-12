<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>

	<div class="leftBar">

<h3>Skype Schedule</h3>

 <ul>
			<table border=3 class="table table-hover">
			<tr class="head">
			<th><label for="inputUser" class=" control-label">Student  Skype Id<label></th>
			<th><label for="inputUser" class=" control-label">Student Name<label></th>
			<th><label for="inputUser" class=" control-label">Course Name<label></th>
			<th><label for="inputUser" class=" control-label">Topic Name</label></th>
			<th><label for="inputUser" class=" control-label">Trainer Name</label></th>
			<th><label for="inputUser" class=" control-label">Date_Time</label></th>
			<th><label for="inputUser" class=" control-label">Duration</label></th>
			<th><label for="inputUser" class=" control-label">Schedule</label></th>
			<th><label for="inputUser" class=" control-label">ReSchedule</label></th>
			<th><label for="inputUser" class=" control-label">Action</label></th>
			</tr>
			
			<?php if($skype):
			foreach($skype as $skypes):
			?>
			<tr>
			<td>
			<?=$skypes->skype_id; ?>
			</td>
			<td>
			<?=$skypes->student_name; ?>
			</td>
			<td>
			<?=$skypes->course_name; ?>
			</td>
			<td>
			<?=$skypes->topic_name; ?>
			</td>
			<td>
			<?php if($skypes->alias_name!=""){echo"$skypes->alias_name";}
				  else	{echo"-----";}	?>
				  
			</td>
			<td>
			<?=$skypes->date_time;?>
			</td>
			<td>
			<?=$skypes->duration;?>
			</td>
			<?php if($skypes->status == 0): ?>
			<td>
			<?php if($skypes->schedule!=""){echo date_format(date_create($skypes->schedule),"d-m-Y H:i");}
				  else	{echo"-----";}	?>
			</td>
			<td>
			<?php  if($skypes->reschedule!=""){echo date_format(date_create($skypes->reschedule),"d-m-Y H:i");}
				  else	{echo"-----";}	?>
			</td>
			<?php elseif($skypes->status == 2):?>
				<td colspan="2">
					<?php if($skypes->approved_schedule!=""){echo date_format(date_create($skypes->approved_schedule),"d-m-Y H:i");}
					  else	{echo"------";} ?>
			</td>
			<?php endif; ?>
			
			<td>
			<?php if($skypes->approved_schedule != "" && $skypes->status != 3 ): ?>
			<button onclick="window.location.href='<?=BaseURL."skype/takeSession/".$skypes->id?>'" type="button" class="btn btn-success">
			<i class="fa fa-play color" aria-hidden="true">Take Session</i></button>
			<?php endif; ?>

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