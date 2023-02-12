<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<div id="Call_1">
<table  class="table table-striped">
			<tr>
			<td>Meeting Number:  </td>
			<td><?=$webinar->meeting_number; ?></td>
			</tr>
			<tr>
			<td>Meeting Password:   </td>
			<td><?=$webinar->meeting_password; ?></td>
			</tr>
			<button onclick='window.open("<?=$webinar->webinar_url?>", "Webinar", "width=800,height=600");' type="button" class="btn btn-success">
			<i class="fa fa-cog color" aria-hidden="true"> JOIN</i></button>
			
</table>
 </div>
<style>
	#Call_1 {
    background: rgba(255, 255, 255, .15);
    min-height: 85px;
    float: right;
    display: -webkit-box;
    position: inherit;
    color: white;
    width: 74%;
    margin-top: 38px;
}
</style>

<h3>Webinar Session</h3>	
 
			<table  class="details">
			
			<tr>
			<td>Course Name :</td>
			<td><?=$webinar->course_name; ?></td>
			</tr>
			<tr>
			<td>Topic Name: </td>
			<td><?=$webinar->topic_name; ?></td>
			</tr>
			<tr>
			<td>Trainer Name :</td>
			<td><?php if($webinar->alias_name!=""){echo"$webinar->alias_name";}
				  else	{echo"-----";}	?></td>
			</tr>
			<tr>
			<td>Date time:</td>
			<td><?=$webinar->date_time;?></td>
			</tr>
			<tr>
			<td>Duration:</td>
			<td><?=$webinar->duration;?></td>
			</tr>
			<tr>
			<td>Schedule:</td>
			<td><?=$webinar->schedule;?></td>
			</tr>
			<tr><td colspan=2>
			<label onclick="window.location.href='<?=BaseURL."webinar/stop/".$webinar->id?>'" type="submit" class="stop">
			<i class="fa fa-stop-circle color" aria-hidden="true"> Stop Session</i></label>
			</td></tr>
			</table>
			<div class="skype">
			<img class="logo" src="<?=BaseURL?>images/big.jpg" >
			</div>