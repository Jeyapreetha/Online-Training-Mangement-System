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
		
			<img class="logo" src="<?=BaseURL?>images/header.png">
					<div class="col-md-2">
						
					</div>
					<div class="col-md-10 topbar">
						<nav>
							<?php
								if(isset($_SESSION["user_id"])):
							?>
								<ul class="menu">
								
									<li>
										<a href="<?=BaseURL."Requestskype/index"?>">Request Skype</a>
									</li>
									<li>
									
										<a href="<?=BaseURL."webinar/index"?>">Webinar</a>
									</li>
								</ul>
							<?php 
								endif;
							?>
						</nav>
					</div>
					<div class="col-md-3 welcome">
						 
					</div>
				</div>
			</header>
			<div id="container">