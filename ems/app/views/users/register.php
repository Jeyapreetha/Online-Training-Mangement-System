		<?php include HOME . DS . 'includes' . DS . 'header.inc.php'; ?>
		<style>
			body
			{
				background:url(<?=BaseURL?>images/Online-Training-Courses.jpg);
				background-size:cover;
			}
			.header, .ic-app-header__primarytop
			{
				background: transparent;
				border-bottom:none;
			}
		</style>
		<div class="col-sm-12 loginscreen">
		
			<div class="col-sm-4"></div>
			<div class="col-sm-4 loginRegister">
				<form action="<?=BaseURL."users/registerPost"?>" method="POST" id="register" class="form-horizontal">
				  <div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
							<div class="col-sm-3"><b class="blue">Name *</b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<input type="text" value="" name="name" id="name" class="form-control input-lg" placeholder="First Name *">
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3 "><b class="blue">MobileNo. *</b> </div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" value="" name="mobile" id="mobile" class="form-control input-lg" placeholder="Mobile No. - With Country Code *">
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3"><b class="blue">Course *</b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<select  name="courses" class="form-control" id="courses" placeholder="courses">
					<option value ="0">--- Select Courses---</option>
					<?php 
						foreach($courses as $course):
					?>
						<option value="<?=$course->id?>"><?=$course->course_name?></option>
					<?php
						endforeach;
					?>
					</select>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3 "><b class="blue">Skype Id *</b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<input type="text" value="" name="skypeId" id="skypeId" class="form-control input-lg" placeholder="skypeId">
								</div>
							</div>
						</div>

						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3"><b class="blue">Email </b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<input type="email" value="" name="email" id="email" class="form-control input-lg" placeholder="Email *">
								</div>
							</div>
						</div>
						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3 "><b class="blue">Password *</b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password *">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3 ">
								<div class="form-group">
										</div>
							</div>
						</div>
						<div class="row" style="margin-top:0;padding-top:0;">
							
						</div>
						<div class="row">
						<div class="col-sm-3 "><b class="blue">Address </b> </div>
							<div class="col-sm-9 ">
								<div class="form-group">
									<textarea name="address" placeholder="Address" class="form-control input-lg" id="address"></textarea>
									
								</div>
							</div>
						</div>

						<div class="row" style="margin-top:0;padding-top:0;">
							<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-sm-offset-3">
								<span class="red">
																	</span>
							</div>
						</div><br>

												<div class="row">
							<div class="col-xs-12 col-sm-6 col-sm-offset-3  col-md-6 col-md-offset-3">
							<button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="7">Register</button></div>
						</div>
					</form>
              </div>