<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<div class="leftBar">
<h3>Topics</h3>
<ul>
	<?php if($topics): ?>
		<?php foreach($topics as $topic): ?>
			<li>
				<a href="<?=BaseURL."courses/material/".$topic->id?>"><?=$topic->topic_name?></a>
			</li>
		<?php endforeach; ?>
	<?php else: ?>
		No Topics Found
	<?php endif; ?>
</ul>	
</div>