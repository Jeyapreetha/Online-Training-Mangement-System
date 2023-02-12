<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Eyeopen Management System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="<?=BaseURL?>css/jquery-ui.css">
		<link rel="stylesheet" href="<?=BaseURL?>js/themes/default.css">
		<link rel="stylesheet" href="<?=BaseURL?>js/themes/default.time.css">
		<link rel="stylesheet" href="<?=BaseURL?>css/lightbox.min.css">
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
	<script src="<?=BaseURL?>js/lightbox-plus-jquery.min.js"></script>
		
		<div class="col-md-2">
			<img class="logo" src="<?=BaseURL?>images/logo.png">
		</div>

		<header id="branding" role="banner">
			<header id="header" class="ic-app-header no-print ">
					
				<section class="row leftnav">
					<div class="ic-app-header__layout">
					
						<div class="ic-app-header__primary">
				
							<ul class="social2">
								<?php
								
									if(isset($_SESSION["role_id"])):
									    switch($_SESSION["role_id"]):
											case 1:
									?>
								
								<h5><i class="fa fa-graduation-cap" aria-hidden="true"> Student: <?php echo 	$_SESSION["name"]; ?></i></h5>
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
								<button onclick="window.location.href='<?=BaseURL."users/logout/"?>'" type="submit" class="btn btn-primary logout">
								<i class="fa fa-cog logout" aria-hidden="true"> LogOut</i></button>
								<?php 
											break;
											case 2:
								?>
								<h5><i class="fa fa-tumblr-square" aria-hidden="true"> Trainer: <?php echo $_SESSION["trainer_name"] ?></i></h5>
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
											<i class="foo fa fa-skype" > TSkype</i>
											<span class="sr-only"></span>
										</a>
									</li>						
									<li>
										<a href="<?=BaseURL."webinar/twebinar/"?>" >
											<i class="foo fa fa-comments" > TWebinar</i>
											<span class="sr-only"></span>
										</a>
									</li>							
								<button onclick="window.location.href='<?=BaseURL."users/logout/"?>'" type="submit" class="btn btn-primary logout">
								<i class="fa fa-cog logout" aria-hidden="true"> LogOut</i></button>
								<?php 
											break;
											case 3:
								?>
								
								<h5><i class="fa fa-adn" aria-hidden="true"> Admin: <?php echo 	$_SESSION["trainer_name"]; ?></i></h5>
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
								<button onclick="window.location.href='<?=BaseURL."users/logout/"?>'" type="submit" class="btn btn-primary logout">
								<i class="fa fa-cog logout" aria-hidden="true"> LogOut</i></button>									
								<?php
											break;
										endswitch;
									endif;
								?>
								</ul>
							</div>
						</div>
					</section>	
				</header>
			</header>