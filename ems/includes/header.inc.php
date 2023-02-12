<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eyeopen Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?=BaseURL?>css/jquery-ui.css">
		<link rel="stylesheet" href="<?=BaseURL?>js/themes/default.css">
		<link rel="stylesheet" href="<?=BaseURL?>js/themes/default.time.css">
		<script src="<?=BaseURL?>js/jquery-2.1.4.js"></script>
		<script src="<?=BaseURL?>js/picker.js"></script>
		<script src="<?=BaseURL?>js/picker.time.js"></script>
		<script src="<?=BaseURL?>js/legacy.js"></script>
		<script src="<?=BaseURL?>js/jquery-ui.js"></script>
		<script src="<?=BaseURL?>js/filesaver.js"></script>
		<link rel="stylesheet" href="<?=BaseURL?>css/bootstrap.css">
		<link rel="stylesheet" href="<?=BaseURL?>css/bootstrap-theme.css">
		<script src="<?=BaseURL?>js/bootstrap.js"></script>
		<link rel="stylesheet" href="<?=BaseURL?>css/style.css">
		<link href="<?=BaseURL?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container-fluid">
			<header id="branding" role="banner">
				<div class="row show-grid header">
					<div class="col-md-2">
						<img class="logo" src="<?=BaseURL?>images/logo.png">

					</div>
					<div class="col-md-10 topbar">
					<header id="header" class="ic-app-headertop no-print ">
			
					<section class="row leftnavtop">
					<div class="ic-app-header__layouttop">
					
						<div class="ic-app-header__primarytop">
						<ul class="socialtop">
								<?php
								
									if(isset($_SESSION["role_id"])):
										switch($_SESSION["role_id"]):
											case 1:
									?>
									
									<li>
										<a href="<?=BaseURL."syllabus/index/"?>" >
											<i class="foo fa fa-file-text" > Files</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."skype//mySkypes/"?>" >
											<i class="foo1 fa fa-skyatlas" > MySkype</i>
											<span class="sr-only"></span>
										</a>
									</li>												
									<li>
										<a href="<?=BaseURL."webinar/webinar/"?>" >
											<i class="foo fa fa-comment" > Webinar</i>
											<span class="sr-only"></span>
										</a>
									</li>						
							
								<?php 
											break;
											case 2:
								?>
									
									<li>
										<a href="<?=BaseURL."students/index/"?>" >
											<i class="foo fa fa-graduation-cap" > Students</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."courses/index/"?>" >
											<i class="foo fa fa-th-list" > Courses</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."topics/index/"?>" >
											<i class="foo fa fa-list-alt" > Topics</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."syllabus/index/"?>" >
											<i class="foo fa fa-file-text" > Files</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."skype/tindex/"?>" >
											<i class="foo fa fa-skype" >T-Skype</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."webinar/twebinar/"?>" >
											<i class="foo fa fa-comments" > Webinar</i>
											<span class="sr-only"></span>
										</a>
									</li>						
								
								<?php 
											break;
											case 3:
								?>
									<li>
										<a href="<?=BaseURL."trainers/index/"?>" >
											<i class="foo fa fa-user-plus" > Trainers</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."students/index/"?>" >
											<i class="foo fa fa-graduation-cap" > Students</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."courses/index/"?>" >
											<i class="foo fa fa-th-list" > Courses</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
										<a href="<?=BaseURL."topics/index/"?>" >
											<i class="foo fa fa-list-alt" > Topics</i>
											<span class="sr-only"></span>
										</a>
									</li>
									<li>
									   <a href="<?=BaseURL."syllabus/index/"?>" >
											<i class="foo fa fa-file-text" > Files</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."skype/index/"?>" >
											<i class="foo fa fa-skype" > Skype</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."webinar/index/"?>" >
											<i class="foo fa fa-comments" > Webinar</i>
											<span class="sr-only"></span>
										</a>
									</li>	
								<?php
											break;
										endswitch;
									endif;
								?>
								</ul>
					</div>
					<div class="col-md-3 welcome">
						 
					</div>
				</div>
				</div>
			</div>
			</section>	
			</header>
			</header>
			<div id="container">