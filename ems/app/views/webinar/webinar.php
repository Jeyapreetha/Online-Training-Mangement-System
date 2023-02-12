<?php 
include HOME . DS . 'includes' . DS . 'head.inc.php'; 
?>

<div class="leftBar">
<h3>Webinar Schedule</h3>
 <ul>
			<table border=3 class="table table-hover">
			<tr class="head">
			<th><label for="inputUser" class=" control-label">End Time<label></th>
			<th><label for="inputUser" class=" control-label">Title<label></th>
			<th><label for="inputUser" class=" control-label">Schedule</label></th>
			<th><label for="inputUser" class=" control-label">Course Name<label></th>
			<th><label for="inputUser" class=" control-label">Duration</label></th>
			<th><label for="inputUser" class=" control-label">Status</label></th>
			<th><label for="inputUser" class=" control-label">Action</label></th>
			</tr>
			<?php if($webinar):
			foreach($webinar as $webinars):
			?>
			<tr>
			<td>
			<?php echo $webinars->webinar_end_time;?>
			</td>
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
			<?=$webinars->duration;?>
			</td>
			<td>
			<?php
			$status = "";
			if( new DateTime()> date_create($webinars->webinar_end_time))
			{
				$status .=" Closed,";
			}

				if($webinars->start_time!="" && $webinars->end_time=="")
					{
					if( new DateTime() < date_create($webinars->webinar_end_time))
					{
						$status .= " On Session";
					}
					else
					{
						$status .= " Abundand";
					}
					}	
				 elseif($webinars->status ==3 )
				 { 
					 if(new DateTime() < date_create($webinars->schedule))
					 {
					 $status .= " Enrolled";
					 }
					 elseif(new DateTime() > date_create($webinars->webinar_end_time))
					 {
						$status .= " Absent"; 
					 }
				 }
				 elseif($webinars->status ==1)
				 {
					 $status .=  " Attended (";
					 $status .= $webinars->attended_time."),";
				 }
				 echo rtrim($status, ",");
				 ?>
			</td>
			<td>
			<?php 
			if(new DateTime()< date_create($webinars->webinar_end_time)&&$webinars->status!=3&&$webinars->status!=2&&$webinars->end_time==""):
			?>
			<button onclick="window.location.href='<?=BaseURL."webinar/enroll/".$webinars->id?>'"  	 type="submit" class="btn btn-success">
			<i class="fa fa-cog color" aria-hidden="true"> Enroll</i></button>
			<?php endif ?>
			<?php if($webinars->status ==3 && $webinars->webinar_url!="" && new DateTime() > date_create($webinars->schedule)&&  new DateTime() < date_create($webinars->webinar_end_time)):?>
			<button onclick="window.location.href='<?=BaseURL."webinar/startWebinar/".$webinars->id?>'" type="button" 	class="btn btn-success">
			<i class="fa fa-thumbs-up color" aria-hidden="true"> join</i></button>
			<?php if($webinars->status ==3 && $webinars->status !=2 ): ?>
			<button onclick="window.location.href='<?=BaseURL."webinar/cancel/".$webinars->id?>'" type="button" class="btn btn-danger">
			<i class="fa fa-ban color" aria-hidden="true"></i></button>
			<?php endif ?>
			<?php endif ?>
			<?php if($webinars->status==2): ?>
			<button onclick="window.location.href='<?=BaseURL."webinar/startWebinar/".$webinars->id?>'" type="button" 	class="btn btn-success">
			<i class="fa fa-thumbs-up color" aria-hidden="true"> ReJoin</i></button>
			<?php endif;?>
			</td>
			</tr>
			<?php
			endforeach;
			endif;
			?>
	</table>
</ul>
</div>