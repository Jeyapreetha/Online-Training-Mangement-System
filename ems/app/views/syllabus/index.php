<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>

<div class="leftBar">
<h3>Syllabus</h3>
<span><strong>
		<?php if($_SESSION["role_id"] !=1):?>
		<button onclick="window.location.href='<?=BaseURL."syllabus/addSyllabus"?>'" type="button" class="btn btn-info">
		<i class="fa fa-plus-square" aria-hidden="true"> Add File</i>
		</button>
		<?php endif;?>
		
	</span></strong>

 <ul>
<table class="table table-hover file">
			
		
		
			<tr class="head">
			<th><label for="inputUser" class=" control-label">Topic Name</label></th>
			<th><label for="inputUser" class=" control-label">File Name</label></th>
			<th><label for="inputUser" class=" control-label">File</label></th>
			<th><label for="inputUser" class=" control-label">Download</label></th>
			<th><label for="inputUser" class=" control-label">Preview</label></th>
			<?php if($_SESSION["role_id"] ==3):?>
			<th><label for="inputUser" class=" control-label">Action</label></th>
			<?php endif;?>
			</tr>
			
			<?php 
			foreach($syllabus as $sylabus):
			?>
			<tr>
			<td>
			<?=$sylabus->topic_name; ?>
			</td>
			<td>
			<?=$sylabus->name; ?>
			</td>
			<td>
			<i class="fa fa-file-text color" aria-hidden="true"></i>
			<?=$sylabus->file_name; ?>
			</td>
			<td>
			<?php if(pathinfo($sylabus->file_name,PATHINFO_EXTENSION)!="ppt" && pathinfo($sylabus->file_name,PATHINFO_EXTENSION)!="docx"):?>
				<button onclick="window.location.href='<?=BaseURL."syllabus/downloadSyllabus/".$sylabus->id?>'" type="button" class="btn btn-success">
				<i class="fa fa-cloud-download color" aria-hidden="true"></i></button>
			<?php endif;?>
			</td>
			<td>
			<?php if(pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="ppt"|| pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="jpg"||
			 pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="gif"|| pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="png"  ||
			 pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="bmp"||pathinfo($sylabus->file_name,PATHINFO_EXTENSION)=="docx"): ?>
				<button onclick="window.location.href='<?=BaseURL."syllabus/viewSyllabus/".$sylabus->id?>'" type="button" class="btn btn-default">
				<i class="fa fa-link color" aria-hidden="true"></i></button>
			<?php endif;?>
			</td>
			<?php if($_SESSION["role_id"] == 3):?>
			<td>
			<button onclick="window.location.href='<?=BaseURL."syllabus/deleteSyllabus/".$sylabus->id?>'" type="button" class="btn btn-danger">
			<i class="fa fa-trash color" aria-hidden="true"></i></button>
			<button onclick="window.location.href='<?=BaseURL."syllabus/editSyllabus/".$sylabus->id?>'" type="button" class="btn btn-success ">
			<i class="fa fa-edit color" aria-hidden="true"></i></button>
			</td><?php endif;?>
			</tr>
			
		<?php
			endforeach;
		?>
	</table>
</ul>
</div>	