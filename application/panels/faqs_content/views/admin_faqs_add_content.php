
		<div class="content-edit">
			<div class="row">
						<?php 
				if (isset($success_message) && $success_message!=""){ ?>
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>contact/siteinfo">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
					<div class="error-message">
						<!-- <img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						 --><text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>contact/siteinfo">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				
				<?php		
				}
				 ?>
			
				<div class="container-fluid">
					<div class="back-guest-list">
						<a href="<?php echo $this->config->base_url()?>contact/siteinfo"><img src="<?php echo $this->config->base_url()?>r/img/icon-back-to-GL.png">Back to Contact us</a>
					</div>
						
					<form id = "user_add"class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>faqs_content/admin_faqs_save_content">
					
				   	<div class="row">
				   <span style="font-size:18px"><strong>Add Category</strong></span><br />
					<div class="col-md-8 ">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-6 control-label">Category Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="name.." value=""/>
							</div>
				
					</div>
					<br/><br/><br/><br/>
					<div class="col-md-8">
						
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Status</label>
								<select class="form-control" name="status" id="status">
									<option value="1"> Active</option>	
									<option value="0"> Inactive</option>	
								</select>
								
							</div>
						
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
		<script type="text/javascript">
    
        $("#user_add").validate({
            rules: {
					  	name: "required",
					  	status: "required"
					  	 },
					  messages: {
					                name: "Name Required",
					               	status: "Status Required"
					            },
					            tooltip_options: {
					            	name: {placement:'top',html:true},
					                status: {placement:'top',html:true}
					               
					            }
					});
    
</script>
		
