<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>
<div class="leftBar">
<h3>Trainers</h3>

<span>
		<ul>
		<button onclick="window.location.href='<?=BaseURL."trainers/addTrainer"?>'" type="button" class="btn btn-info">
		<i class="fa fa-plus-square" aria-hidden="true"> Add Trainer</i>
		</button>
		</ul>
	</span>

 <ul>
		<table border=3 class="table table-hover">
		<tr class="head">
			<th><label for="inputUser" class=" control-label">Faculty</label></th>
			<th><label for="inputUser" class=" control-label">Alias Name</label></th>
			<th><label for="inputUser" class=" control-label">Email Id</label></th>
			<th><label for="inputUser" class=" control-label">Skype Id</label></th>
			<th><label for="inputUser" class=" control-label">Action</label></th>
		</tr>
		<?php 
			foreach($trainers as $trainer):
		?>
					<tr>
					<td>					
					<?=$trainer->trainer_name; ?>
					</td>
					<td>					
					<?=$trainer->alias_name; ?>
					</td>
					<td>					
					<?=$trainer->trainer_email; ?>
					</td>
					<td><?=$trainer->trainer_skype_id; ?>
					</td>
					<td>
					<button onclick="window.location.href='<?=BaseURL."trainers/deleteTrainer/".$trainer->id?>'" type="button" class="btn btn-danger"><i class="fa fa-trash color" aria-hidden="true"></i></button>
				     <button onclick="window.location.href='<?=BaseURL."trainers/editTrainer/".$trainer->id?>'" type="button" class="btn btn-success "><i class="fa fa-edit color" aria-hidden="true"></i></button>
					 </td></tr>
		<?php
			endforeach;
		?>
		</table>
	</li>
</ul>
</div>	