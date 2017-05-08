<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<?php if (isset($_GET['error']) && $_GET['error'] == 1) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Captcha entered is incorrect", {
				type : 'danger',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<?php if (isset($_GET['success']) && $_GET['success'] == 2) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Password has been reset successfully.", {
				type : 'success',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<?php if (isset($_GET['error']) && $_GET['error'] == 3) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Invalid password link.", {
				type : 'danger',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<?php if (isset($_GET['error']) && $_GET['error'] == 4) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Password reset link has expired. Please try again.", {
				type : 'danger',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<?php if (isset($_GET['error']) && $_GET['error'] == 5) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Password and confirm does not match. Please try again.", {
				type : 'danger',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<?php if (isset($_GET['error']) && $_GET['error'] == 6) {
	?>
	<script>
		setTimeout(function() {
			$.bootstrapGrowl("Reset link has already been used.", {
				type : 'danger',
				align : 'center',
				width : 'auto',
				allow_dismiss : false
			});
		}, 1);
	</script>
	<?php } ?>
	<div class="panel panel-info" >
		<div class="panel-heading">
			<div class="panel-title">
				Reset Password
			</div>
		</div>

		<div style="padding-top:30px" class="panel-body" >

			<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

			<form class="form-horizontal" role="form" id="loginform" action="<?php echo $this -> config -> base_url(); ?>login_content/password_reset_submit" name="login" method="post">
				<div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        
                        <form class="form-horizontal" role="form" id="loginform" action="<?php echo $this->config->base_url();?>login_content/forgot_submit" name="login" method="post">            
                            <div style="margin-bottom: 25px" class="input-group">
                                  
                          <label>New Password:</label> 
                <input type="password" placeholder="New Password" name="password" id="password" ><br>
                <label>Confirm Password:</label> 
                <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" >
  </div>
                         
				<label>Prove you're not a robot:</label> 
                <div class="myCaptcha" id="myCaptcha">
                	<input type="hidden" name="word" value="<?php echo $word; ?>" >
                	<?php echo $image;?>
                </div>
	            <a class="captcha" style="color: #fff" id="change-image" href="#">[ Different Image ]</a>
               
                 <label>Type the character you see in the picture above:</label><br><br>
                <input type="text" name="captcha_code" size="10" maxlength="6" />
                <input type="hidden" name="reset_code" value="<?php echo $_GET['code'] ?>" />
				<div style="margin-top:10px" class="form-group">
					<!-- Button -->

					<div class="col-sm-12 controls">
						<input id="btn-login" class="btn btn-success" type="submit" name="submit" value="Reset my password" />

					</div>
					Back to <a href='<?php echo $this -> config -> base_url(); ?>login'>login page</a> 
				</div>

			</form>

		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery('#change-image').click(function(event){ 	
		jQuery("#myCaptcha").load(location.href + " #myCaptcha");
	});
	jQuery.validator.addMethod("notEqual", function(value, element, param) {
	  return this.optional(element) || value != param;
	}, "Please specify a different (non-default) value");

	$("#loginform").validate({

		rules : {
			password: { notEqual: "password", "required":true },
			cpassword: { equalTo: "#password",  "required":true },
			captcha_code: "required"
		},
		messages : {
			password : "new password required",
			//cpassword : "confirm password required",
			captcha_code: "You must enter above code"
		},
		tooltip_options : {
			password : {
				placement : 'right',
				html : true
			},
			cpassword : {
				placement : 'right',
				html : true
			},
			captcha_code : {
				placement : 'right',
				html : true
			}
		}
	});

</script>