<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<h3><?=$message;?></h3>
<form id="addSyllabus" method="post" enctype="multipart/form-data" action="<?=BaseURL."syllabus/addSyllabus"?>">
<section class="row forms">
<h1 class="head">Add Syllabus </h1>
<div class="col-sm-8 form">
		<div class="form-group">
			<label for="topic">Topics</label><span></span>
			<select  name="topic" class="form-control" id="topic" placeholder="topic">
					<option value ="0">--- Select Topics---</option>
					<?php 
						foreach($topics as $topic):
					?>
						<option value="<?=$topic->id?>"><?=$topic->topic_name?></option>
					<?php
						endforeach;
					?>
					</select>
		</div>
		<div class="form-group">
			<label for="name">File Description</label><span></span>
			<input type="text" name="name" class="form-control" id="name" placeholder="name">
		</div>
		<div class="form-group">
			<label for="name">Upload File</label><span></span>
			<input type="file" name="productImage" class="form-control" id="productImage" placeholder="productImage">
		</div>
		<center><button type="submit" class="btn btn-primary">ADD</button><center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/filing.jpg" >
	
</form>