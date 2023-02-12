<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>

<div class="leftBar">
<h3>Courses</h3>
<ul>

		<?php 
			foreach($courses as $course):
		?>
				<li>
					<a href="<?=BaseURL."courses/topics/".$course->id?>" >
						<?=$course->course_name; ?>
					</a>
				</li>
		<?php
			endforeach;
		?>
	</li>
</ul>
</div>	