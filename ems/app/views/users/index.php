<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
        <h1>Students</h1>
 <table border="0">

        <?php 
            if ($users):
            foreach  ($users as $user): ?>
			 <tr>
				<td><?php echo $user->email; ?></td>
			</tr>
        <?php 
            endforeach;
			?>
			
			</table>
			<?php
            else: ?>
 
        <h1>Welcome!</h1>
        <p>We currently do not have any articles.</p>
 
        <?php endif; ?>
		<?php include HOME . DS . 'includes' . DS . 'footer.inc.php'; ?>