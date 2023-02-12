<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h1>Dashboard</h1>
<script>
	activateIconButtons();
	jQuery(document).ready(function(){
		jQuery("ul.alerts").height(jQuery("ul.alerts li").width());
	});
</script>
<ul class="enquiryDashoard alerts">

		<?php 
						foreach($courses as $course):
						?>
						<li>
						<?php
						
						echo $course->id."<br>".$course->course_name;
				?>
				</li>
				<?php
						endforeach;
					?>
	</li>
</ul>	