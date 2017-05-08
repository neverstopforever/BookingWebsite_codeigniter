
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
						
					<form id = "user_add"class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>contact_content/admin_update_siteinfo_content">
					<div class="row">
				   	<div class="row">
				   <span style="font-size:18px"><strong>Management Office</strong></span><br />
					<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="name.." value="<?php echo $info[0]->name;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Address</label>
								<input type="text" class="form-control" name="address" id="address" placeholder="address.." value="<?php echo $info[0]->address;?>"/>
							</div>
					</div>
						<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Tel</label>
								<input type="text" class="form-control" name="tel" id="tel" placeholder="tel.." value="<?php echo $info[0]->tel;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Email</label>
								<input type="text" class="form-control" name="email" id="email" placeholder="eamil.." value="<?php echo $info[0]->email;?>"/>
							</div>
					</div>
					</div>
					
					<div class="row">
				   
					<br /><span style="font-size:18px"><strong>Operating Hours</strong></span><br />
					<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="operating_hours" id="operating_hours" placeholder="Operating hours.." value="<?php echo $info[0]->operating_hours;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="operating_sat_hours" id="operating_sat_hours" placeholder="Operating Sat Hours.." value="<?php echo $info[0]->operating_sat_hours;?>"/>
							</div>
					</div>
						<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="operating_closed" id="operating_closed" placeholder="Operating Closed.." value="<?php echo $info[0]->operating_closed;?>"/>
							</div>
							
					</div>
					</div>
					<div class="row">
				   
					<br /><span style="font-size:18px"><strong>Emergency Contacts</strong></span><br />
					<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Police</label>
								<input type="text" class="form-control" name="police" id="police" placeholder="police.." value="<?php echo $info[0]->police;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Ambulance</label>
								<input type="text" class="form-control" name="ambulance" id="ambulance" placeholder="Ambulance.." value="<?php echo $info[0]->ambulance;?>"/>
							</div>
					</div>
						<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Fire</label>
								<input type="text" class="form-control" name="fire" id="fire" placeholder="Fire.." value="<?php echo $info[0]->fire;?>"/>
							</div>
							
					</div>
					</div>
					<div class="row">
				   
					<br /><span style="font-size:18px"><strong>Useful Contacts</strong></span><br />
					<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="uc_1" id="uc_1" placeholder="uc_1.." value="<?php echo $info[0]->uc_1;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="uc_2" id="uc_2" placeholder="uc_2.." value="<?php echo $info[0]->uc_2;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="uc_3" id="uc_3" placeholder="uc_3.." value="<?php echo $info[0]->uc_3;?>"/>
							</div>
					</div>
						<div class="col-md-8">
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="uc_4" id="uc_4" placeholder="uc_4.." value="<?php echo $info[0]->uc_4;?>"/>
							</div>
							<div class="col-sm-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Name</label>
								<input type="text" class="form-control" name="uc_5" id="uc_5" placeholder="uc_5.." value="<?php echo $info[0]->uc_5;?>"/>
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
					  	address: "required",
					  	tel: "required",
					  	email: "required",
					  	operating_hours: "required",
					  	operating_sat_hours: "required",
					  	operating_closed: "required",
					  	police: "required",
					  	ambulance: "required",
					  	fire: "required",
					  	uc_1: "required",
					  	uc_2: "required",
					  	uc_3: "required",
					  	uc_4: "required",
					  	uc_5: "required"
					  	 },
					  messages: {
					                name: "Name Required",
					                address: "Address Required",
					                tel: "Tel Required",
					                email: "Email Required",
					                operating_hours: "Operating Hours Required",
					                operating_sat_hours: "Operating Hours Required",
					                operating_closed: "Operating Closed Required",
					                police: "Police Required",
					                ambulance: "Ambulance Required",
					                fire: "Fire Required",
					               	uc_1: "Useful Contacts Required",
					               	uc_2: "Useful Contacts Required",
					               	uc_3: "Useful Contacts Required",
					               	uc_4: "Useful Contacts Required",
					               	uc_5: "Useful Contacts Required"
					            },
					            tooltip_options: {
					            	name: {placement:'top',html:true},
					            	address: {placement:'top',html:true},
					            	tel: {placement:'top',html:true},
					            	email: {placement:'top',html:true},
					            	operating_hours: {placement:'top',html:true},
					            	operating_sat_hours: {placement:'top',html:true},
					            	operating_closed: {placement:'top',html:true},
					            	police: {placement:'top',html:true},
					            	ambulance: {placement:'top',html:true},
					            	fire: {placement:'top',html:true},
					            	uc_1: {placement:'top',html:true},
					                uc_2: {placement:'top',html:true},
					                uc_3: {placement:'top',html:true},
					                uc_4: {placement:'top',html:true},
					                uc_5: {placement:'top',html:true}
					               
					            }
					});
    
</script>
		
