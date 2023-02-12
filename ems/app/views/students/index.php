<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>


<div class="leftBar">
<h3>Students</h3>
 <ul>
				<table border=3 class="table table-hover">
				<tr class="head">
					<th><label for="inputUser" class=" control-label">Name</label></th>
					<th><label for="inputUser" class=" control-label">Course Name</label></th>
					<th><label for="inputUser" class=" control-label">Faculty</label></th>
					<?php if($_SESSION["role_id"] ==3):?>
					<th><label for="inputUser" class=" control-label">Mobile No</label></th>
					<?php endif;?>
					<th><label for="inputUser" class=" control-label">SkypeId</label></th>
					<th><label for="inputUser" class=" control-label">Address</label></th>
					<?php if($_SESSION["role_id"] ==3):?>
					<th><label for="inputUser" class=" control-label">Action</label></th>
					<?php endif;?>
				</tr>
				<?php 
					foreach($students as $student):
					?>
				<tr>
					<td>
					<?=$student->name; ?></a>
					</td>
					<td>
					<?=$student->course_name; ?></a>
					</td>
					
					<td>
					<?php if($student->alias_name!=""){echo"$student->alias_name";}
					else	{echo"-----";}	?>
					</td>
					<?php if($_SESSION["role_id"] ==3):?>
					<td>
					<?=$student->mobile; ?></a>
					</td>
					<?php endif;?>
					<td>
					<?php if($student->skype_id!=""){echo"$student->skype_id";}
					else	{echo"-----";}	?>
					</td>
					<td>
					<?=$student->address; ?></a>
					</td>
					<?php if($_SESSION["role_id"] ==3):?>
					
					<td>
					<button onclick="window.location.href='<?=BaseURL."students/deleteStudent/".$student->id?>'" type="button" class="btn btn-danger"><i class="fa fa-trash color" aria-hidden="true"></i></button>
				    <button onclick="window.location.href='<?=BaseURL."students/editstudent/".$student->id?>'" type="button" class="btn btn-success"><i class="fa fa-edit color" aria-hidden="true"></i></button>
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