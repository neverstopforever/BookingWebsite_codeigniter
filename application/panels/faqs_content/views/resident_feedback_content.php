


<div class="content">
	
		<div class="content-edit">
			<div class="row">
				<div class="container-fluid">
							<?php 
				if (isset($success_message) && $success_message!=""){ ?>
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
					<div class="error-message">
						<!-- <img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						 --><text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				
				<?php		
				}
				 ?>
			
					
					
					<form id = "user_add"class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>contact_content/resident_add_feedback">
					<div class="row">
						<div class="col-md-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Feed Back</label>
							<div class="col-sm-7">
								<textarea type="text" class="form-control" name="firstname" id="firstname" placeholder="Message.."></textarea>
							</div>
							
					</div>
					<div class="row">
						<div class="col-md-12">
											
					
						<div class="col-sm-2 col-sm-offset-1">
							<button type="submit" class="btn btn-default">SUBMIT</button>
						</div>
					
						</div>
					</div>
					</div>
					</form>
				
			</div>
 	</div>
 	</div> 
 	</div>      
<script type="text/javascript">
    
        $("#user_add").validate({
            rules: {
					  	firstname: "required"
					  	// lastname: "required",
					  	// contactnumber: "required",
					  	// block: "required",
					  	// email: "required",
///					  	usertype: "required",
	//				  	unitno: "required",
					  },
					  messages: {
					                firstname: "Contact Message Required"
					                // lastname: "Last Name Required",
					                // contactnumber: "Contact No Required",
					                // block: "Block Name Required",
					                // email: "Email Required",
					                // usertype: "User Type Required",
					                // unitno: "Unit Number Required",
					            },
					            tooltip_options: {
					            	firstname: {placement:'top',html:true}
					                // lastname: {placement:'top',html:true},
					                // contactnumber: {placement:'top',html:true},
					                // block: {placement:'top',html:true},
					                // email: {placement:'top',html:true},
					                // usertype: {placement:'top',html:true},
					                // unitno: {placement:'top',html:true},
					               
					            }
					});
    
</script>

