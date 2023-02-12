<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>
<div class="leftBar">
<h3>Topics</h3>
<span>
		
		<?php if($_SESSION["role_id"] ==3):?>
					
			<button onclick="window.location.href='<?=BaseURL."topics/addTopic"?>'" type="button" class="btn btn-info">
			<i class="fa fa-plus-square" aria-hidden="true"> Add Topic</i>
			</button>
			
			</button>
		<?php endif;?>
		
	</span>
 <ul>

			<table border=3 class="table table-hover " >
			<tr class="head">
			
			<th><label for="inputUser" class=" control-label">Course Name</label></th>
			<th><label for="inputUser" class=" control-label">Topic Name</label></th>
			<th><label for="inputUser" class=" control-label">Duration</label></th>
			<?php if($_SESSION["role_id"] ==3):?>
				<th><label for="inputUser" class=" control-label">Action</label></th>
			<?php endif;?>
			</tr>
			<?php 
			foreach($topics as $topic):
			?>
			<tr>
			
			<td><?=$topic->course_name; ?></td>
			<td><?=$topic->topic_name; ?></td>
			<td><?=$topic->duration ; ?></td>
			<?php if($_SESSION["role_id"] ==3):?>
				<td>
				<button onclick="window.location.href='<?=BaseURL."topics/deleteTopic/".$topic->id?>'" type="button" class="btn btn-danger"><i class="fa fa-trash color" aria-hidden="true"></i></button>
				<button onclick="window.location.href='<?=BaseURL."topics/editTopic/".$topic ->id?>'" type="button" class="btn btn-success "><i class="fa fa-edit color" aria-hidden="true"></i></button>
				</td>
			<?php endif;?>
			</tr>
			
		<?php
			endforeach;
		?>
		</table>
			
	
</ul>
</div>	