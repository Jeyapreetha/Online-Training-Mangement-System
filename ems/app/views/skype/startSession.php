<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
<div id="SkypeButton_Call_1">
 <script type="text/javascript">
 Skype.ui({
 "name": "dropdown",
 "element": "SkypeButton_Call_1",
 "participants": ["<?=$skype->trainer_skype_id; ?>"],
 "imageSize": 32
 });
 </script>
</div>

<style>
				#SkypeButton_Call_1 {
				background:#d9f7f4;
				min-height:200;
				float: right;
				display:-webkit-box;
				position:relative;
				width: 68%;
				}
				</style>

<h3>Skype Session</h3>	
 <ul>
			<table  class="details">
			
			<tr>
			<td>Skype ID :</td>
			<td><?=$skype->trainer_skype_id; ?></td>
			</tr>
			<tr>
			<td>Trainer Name :</td>
			<td><?=$skype->alias_name; ?></td>
			</tr>
			<tr>
			<td>Course Name :</td>
			<td><?=$skype->course_name; ?></td>
			</tr>
			<tr>
			<td>Topic Name: </td>
			<td><?=$skype->topic_name; ?></td>
			</tr>
			<tr>
			<td>Trainer Name :</td>
			<td><?php if($skype->trainer_name!=""){echo"$skype->trainer_name";}
				  else	{echo"-----";}	?></td>
			</tr>
			<tr>
			<td>Date time:</td>
			<td><?=$skype->date_time;?></td>
			</tr>
			<tr>
			<td>Duration:</td>
			<td><?=$skype->duration;?></td>
			</tr>
			<tr>
			<td>Schedule:</td>
			<td><?=$skype->approved_schedule;?></td>
			</tr>
			<tr><td colspan=2>
			<label onclick="window.location.href='<?=BaseURL."skype/stop/".$skype->id?>'" type="label" class="stop">
			<i class="fa fa-stop-circle color" aria-hidden="true"> Stop Session</i></label></td></tr>
			</table>
			
			
			<div class="skype">
			<img class="logo" src="<?=BaseURL?>images/c5.jpg" >
			</div>
	</ul>
