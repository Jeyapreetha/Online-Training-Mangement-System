<?php include HOME . DS . 'includes' . DS . 'head.inc.php'; ?>
<div class="col-md-10 col-md-offset-2">
		<?php 
		switch($ext)
			{
				case "ppt": 
					foreach($files as $file):
						if (!in_array($file,array(".",".."))):
						?>
						<div class="col-md-2">
						  <a class="example-image-link" href="<?=BaseURL?>content/PPT<?=$query."/".$file?>" data-lightbox="<?=$syllabus->file_name?>">
						  <img style="width:100%; margin-bottom:15px;" class="example-image" src="<?=BaseURL?>content/PPT<?=$query."/".$file?>" alt="image-1" />
						  </a>
						</div>  
									
					  <?php
						endif;
					endforeach;
				break;
				
				case "docx":
				    foreach($docxs as $docx):
						if(!in_array($docx,array(".",".."))):
					 ?>
					 <div class="col-md-2">
						  <a class="example-image-link" href="<?=BaseURL?>content/DOC<?=$query."/".$docx?>" data-lightbox="<?=$syllabus->file_name?>">
						  <img style="width:100%; margin-bottom:15px;" class="example-image" src="<?=BaseURL?>content/DOC<?=$query."/".$docx?>" alt="image-1" />
						  </a>
						</div>  
				
					<?php
						 endif;
					endforeach;
				break;
				
				default:
					?>
						<div class="col-md-2">
						  <a class="example-image-link" href="<?=BaseURL?>content/<?=$syllabus->file_name?>" data-lightbox="<?=$syllabus->file_name?>">
						  <img style="width:250%; margin-left:250px; margin-bottom:15px;" class="example-image" src="<?=BaseURL?>content/<?=$syllabus->file_name?>" alt="image-1" />
						  </a>
						</div>  
					
					  <?php
				break;
			}
		
		?>
</div>
	
