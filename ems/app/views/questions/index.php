<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<span>
		<ul>
			
			<li><a href="<?=BaseURL."questions/addQuestion"?>"> Add </a></li>
			<li><a href="<?=BaseURL."questions/importQuestion"?>"> Import </a></li>
			</ul>
	</span>

<div class="leftBar">
<h3>Questions</h3>
 <ul>

		<?php 
			foreach($questions as $question):
		?>
				<li>
					<a href="<?=BaseURL."courses/topics/".$course->id?>" >
						<?=$question->question; ?>
					</a>
					</li>
					<button onclick="window.location.href='<?=BaseURL."questions/deleteQuestion/".$question->id?>'" type="button" class="btn btn-primary">Delete</button>
				     <button onclick="window.location.href='<?=BaseURL."questions/editQuestion/".$question->id?>'" type="button" class="btn btn-primary ">Edit</button>
		
		<?php
			endforeach;
		?>
	</li>
</ul>
</div>	