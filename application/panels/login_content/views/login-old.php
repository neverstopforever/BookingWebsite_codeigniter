<div class="loginpanel">
    <div class="loginpanelinner">
        
        <div class="logo animate0 bounceIn">
            <?php if($this->session->userdata('is_subdomain')==1){ ?>
            <img style="width:250px;height: 90px;" src="http://img.digisite.us/logo.png?w=250&h=200&n=<?php echo $this->session->userdata('subdomain');?>" alt="logo" />
        <?php } else{ ?>
        <img style="width:250px;height: 90px;" src="<?php echo $this->config->base_url();?>images/company_logo/<?php echo $this->session->userdata('logo'); ?>" alt="logo" />
        <?php } ?>
        </div>
        <form role="form" id="signin" action="<?php echo $this->config->base_url();?>login/login_validate" name="login" method="post">
            
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Invalid username or password</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Email Address" <?php if($username != "") echo "value='$username'"; ?>  />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="password / pin" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">Login</button>
            </div>
            <div class="inputwrapper animate4 bounceIn">
                <div class="pull-right"><a href="<?php echo $this->config->base_url();?>page_login/forgot_password">Forgot password?</a></div>
                <label><input type="checkbox" class="remember" name="remember_me" <?php if($username != ""){?> checked="checked" <?php }  ?> id="remember_me" /> Remember me</label>
            </div>
            
        </form>
        
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<?php 
if(isset($message) && $message=='yes'){
echo "
<script>
    
    jQuery.growl('Your Login Or Password is Incorrect', {
	
	placement: {
		from: 'top',
		align: 'center'
	},
        offset: {
          x: 100,
          y: 20
        },
        type: 'danger'
});  
</script>
";
}
?>

<script type="text/javascript">
    
    jQuery.validator.addMethod("notEqual", function(value, element, param) {
        return this.optional(element) || value != param;
    });
   
    
        jQuery("#signin").validate({
            
            rules: {
                username: "required",
                password: "required"
            },
            messages: {
                username: "Username Required",
                password: "Password Required"
            },
            tooltip_options: {
                username: {placement:'right',html:true},
                password: {placement:'right',html:true}
            }
        });
    
</script>