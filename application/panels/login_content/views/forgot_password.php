<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
	<?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
	    <script>
	       setTimeout(function() {
	            $.bootstrapGrowl("Sorry, not a valid email", {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
	<?php } ?>
	<?php if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
	    <script>
	       setTimeout(function() {
	            $.bootstrapGrowl("Password reset link has been sent to email.", {
	                type: 'success',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
	<?php } ?>
	<?php if (isset($_GET['error']) && $_GET['error'] == 2) { ?>
	    <script>
	       setTimeout(function() {
	            $.bootstrapGrowl("Please enter a valid email address.", {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
	<?php } ?>
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Forgot Password</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        
                        <form class="form-horizontal" role="form" id="loginform" action="<?php echo $this->config->base_url();?>login_content/forgot_submit" name="login" method="post">            
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input  type="text" class="form-control"  name="email" id="email" value="" placeholder="username or email">                                        
                                    </div>
                              
                          
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <input id="btn-login" class="btn btn-success" type="submit" name="submit" value="Email me a link to reset my password" />

                                    </div>
                                </div>

                            </form>     



                        </div>                     
                    </div>  
        </div>
        <script type="text/javascript">
    
    $.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != param;
    });
   
    
        $("#loginform").validate({
            
            rules: {
                email: "required"
            },
            messages: {
                email: "email/username required"
            },
            tooltip_options: {
                email: {placement:'right',html:true}
            }
        });
    
</script>