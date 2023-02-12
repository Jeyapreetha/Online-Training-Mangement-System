<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
<form method="post"  enctype="multipart/form-data" action="<?=BaseURL."syllabus/editSyllabus"?>">
<section class="row forms">
<h1 class="head">EDIT Syllabus </h1>
	<div class="col-sm-8 form">
	<div class="form-group">
			<label for="topic">Topics</label><span></span>
			<select name="topic" class="form-control" id="topic" placeholder="topic">
					<option value ="0">--- Select Topics---</option>
					<?php 
						foreach($topics as $topic):
					?>
						<option value="<?=$topic->id?>" <?php if($topic->id == $syllabus->topic_id) echo "selected"; ?>><?=$topic->topic_name?></option>
					<?php
						endforeach;
					?>
					</select>
		</div>	
		<div class="form-group">
			<label for="name">File name</label><span></span>
			<input value="<?=$syllabus->name?>" type="text" name="name" class="form-control" id="name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="name">File Upload</label><span></span>
			<input type="file" name="productImage" class="form-control">
		</div>
	<center><button type="submit" class="btn btn-primary">Update</button></center>
	</div>
	</section>
	<img class="side" src="<?=BaseURL?>images/filing.jpg" >
</form>