<?php
	if (isset($success_message) && $success_message!=""){ ?>
	<script>
	       setTimeout(function() {
	            $.bootstrapGrowl('<?php echo $success_message;?>', {
	                type: 'success',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
<?php } ?>



<?php
      if (isset($error_message) && $error_message!="no validation error"){
		$error_message =  strip_tags($error_message);
	    $error_message = str_replace(array("\r", "\n"), '', $error_message);
		$error_message= explode('.',$error_message);
	 	for($i=0; $i<count($error_message)-1; $i++){
  			$error = $error_message[$i];
        	if (isset($error)){ ?>
	        	
        		<script>
	       setTimeout(function() {
	            $.bootstrapGrowl("<?php echo $error;?>", {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
        		
        		
        	<?php }	}
      		}
 		?>

<div class="loginColumns animated fadeInDown">
    <div style="
    margin: 0 auto;
    width: 600px;
"><img alt="logo" src="<?php echo $this->config->base_url();?>r/img/saas-walden2-logo.png" style="
    width: 500px;
    margin: 0 auto;
    display: block;
    padding-bottom:30px;">
    </div>
    <div class="accent-bar"></div>
    <div class="row login">
        <div class="col-md-2">
            <img alt="logo" src="<?php echo $this->config->base_url();?>r/img/ab_phone_ad.png" />
        </div>
        <div class="col-md-4">
            <h2 class="font-bold">Welcome to IN+</h2>

            <p>
                Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p>

            <p>
                <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
            </p>
            <p>Already have an account?</p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo $this->config->base_url();?>login">Login now</a>

        </div>
        <div class="col-md-6 left-b">
            <div class="ibox-content">
                <h2 style="margin-top:20px; margin-bottom:40px;">Register</h2>
                <form class="m-t" role="form"  id="registerform" action="<?php echo $this->config->base_url();?>login_content/create_user" name="register" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" id="first_name" value="<?php if(isset($first_name))echo $first_name; ?>">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" id="last_name" value="<?php if(isset($last_name))echo $last_name; ?>">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php if(isset($email))echo $email; ?>">
                        <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone" value="<?php if(isset($phone))echo $phone; ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                        <input type="password" class="form-control" placeholder="Password Confirmation" name="confirm_password" id="confirm_password">
                    </div>

                
                <p class="m-t">
                    <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                </p>
            </div>
        </div>
    </div>
    <div class="row login bottom" style="background:#dddddd;">

        <div class="col-md-4 pull-right">
            <button type="submit" class="btn btn-w-m btn-success block full-width m-b">Register</button>
        </div>
    </div>
    </form>
    <div class="row">
        <div class="col-md-6">
            Review our <a href="register"><strong>Privacy Policy</strong></a>
        </div>

    </div>
</div>

        <script type="text/javascript">
    
    $.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != param;
    });
   
    
        $("#registerform").validate({
            
            rules: {
                first_name: "required",
                last_name: "required",
                email: "required",
                phone: "required",
                password: "required",
                confirm_password: "required"
            },
            messages: {
                first_name: "First Name Required",
                last_name: "Last Name Required",
                email: "Email Required",
                phone: "Phone Required",
                password: "Password Required",
                confirm_password: "Password Required"
            },
            tooltip_options: {
                first_name: {placement:'top',html:true},
                last_name: {placement:'top',html:true},
                email: {placement:'top',html:true},
                phone: {placement:'top',html:true},
                password: {placement:'top',html:true},
                confirm_password: {placement:'top',html:true}
            }
        });
    
</script>