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
	if (isset($error_message) && $error_message!="" ){
		?>
	
	<script>
	       setTimeout(function() {
	            $.bootstrapGrowl('<?php echo $error_message;?>', {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
	   <?php
		
		$error_message =  strip_tags($user_add_data['error_message']);
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
        	} ?>
 
<!DOCTYPE html>

		<div class="content-edit">
			<div class="row">
				<div class="container-fluid">
					<div class="back-guest-list">
						<a href="<?php echo $this->config->base_url();?>user/view"><img src="<?php echo $this->config->base_url();?>r/img/icon-back-to-GL.png">Back to Users List</a>
					</div>
					<form id = "user_add"class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>user_content/staff_add_user">
					<div class="row">
						<div class="col-md-6">
							
							<label for="inputResidentName" class="col-sm-4 control-label">Username*</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="username" id="username" placeholder="Username">
								<label for="inputResidentBlock" id="available_msg" class="col-sm-3 control-label" hidden>Available</label>
								<label for="inputResidentBlock" id="not_available_msg" class="col-sm-3 control-label" hidden> Not Available</label>
							</div>
							
							<label for="inputResidentName" class="col-sm-4 control-label">Password*</label>
							<div class="col-sm-7">
								<input type="password" class="form-control" name="password" id="password" placeholder="Password">
							</div>
							
							<label for="inputResidentName" class="col-sm-4 control-label">Retype Password*</label>
							<div class="col-sm-7">
								<input type="password" class="form-control" name="retype_password" id="retype_password" placeholder="Retype Password">
							</div>
							
							<label for="inputResidentName" class="col-sm-4 control-label">Account Type*</label>
							<div class="col-sm-7">
								<select name="usertype" place>
									<option value="admin">Administrator</option>
									<option value="staff">Staff</option>
									<option value="guard">Guard</option>
									<option value="resident">Resident</option>
								</select>
							</div>
							
							<label for="inputResidentBlock" class="col-sm-6 control-label">Status*</label>
							<div class="col-sm-6">
								<div class="radio">
								  <label><input type="radio" name="status" value="1" checked>Active</label>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="radio">
								 <label><input type="radio" name="status" value="2">Inactive</label>
								</div>
							</div>
							<label for="inputResidentName" class="col-sm-4 control-label">First Vehicle Reg No.</label>
							<div class="col-sm-7">
									<input type="text" class="form-control" name="first_vehicle_registration_no" id="first_vehicle_registration_no" placeholder="First Vehicle Registration No">
							</div>
							<label for="inputResidentName" class="col-sm-4 control-label">Second Vehicle Reg No.</label>
							<div class="col-sm-7">
									<input type="text" class="form-control" name="second_vehicle_registration_no" id="second_vehicle_registration_no" placeholder="Second Vehicle Registration No">
							</div>
							
							
						</div>
						<div class="col-md-6">
							
							<label for="inputResidentName" class="col-sm-3 control-label">First Name</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name">
							</div>
							
							<label for="inputResidentName" class="col-sm-3 control-label">Last Name</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name">
							</div>
							<label for="inputResidentBlock" class="col-sm-3 control-label">Email Address</label>
							<div class="col-sm-7">
								<input type="email" class="form-control" name="email" id="email" placeholder="Email">
							</div>
								
							<label for="inputResidentBlock" class="col-sm-3 control-label">Contact No.</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="contactnumber" id="contactnumber" placeholder="Contact Number">
							</div>
							<label for="inputResidentBlock" class="col-sm-3 control-label">Blk. No.</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="block" id="block" placeholder="Block Name">
							</div>
							<label for="inputResidentUnitNo" class="col-sm-3 control-label">Unit No. </label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="unitno" id="unitno" placeholder="Unit Number">
							</div>
							<label for="inputResidentName" class="col-sm-3 control-label">First Vehicle IU No.</label>
							<div class="col-sm-7">
									<input type="text" class="form-control" name="first_vehicle_iu_no" id="first_vehicle_iu_no" placeholder="First Vehicle IU No">
							</div>
							<label for="inputResidentName" class="col-sm-3 control-label">Second Vehicle IU No.</label>
							<div class="col-sm-7">
									<input type="text" class="form-control" name="second_vehicle_iu_no" id="second_vehicle_iu_no" placeholder="Second Vehicle IU No">
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
					</form>
				</div>
			</div>
		</div>
<script type="text/javascript" src="http://rickharrison.github.io/validate.js/validate.js"></script>
        
<script type="text/javascript">
   		 jQuery.validator.addMethod("alphanumeric", function(value, element) {
      	  return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
		}); 
	
        $("#user_add").validate({
            rules: {  
					  	 password: {
	               	     required: true,
	                     alphanumeric: true
	                 },
					  	 retype_password: {
						 required: true,
						 alphanumeric: true,
						 equalTo: "#password"
					  },
					  	 contactnumber: "required",
					  	 first_vehicle_iu_no: {
	                     alphanumeric: true
	                },
	               		 second_vehicle_iu_no: {
	                     alphanumeric: true
	                },
	                first_vehicle_registration_no: {
	                     alphanumeric: true
	                },
	                second_vehicle_registration_no: {
	                     alphanumeric: true
	                },
	                firstname: {
	               	     required: true,
	                     alphanumeric: true
	                },
	                lastname: {
	               	     required: true,
	                     alphanumeric: true
	                },
	                email: {
					     required: true,
					     email: true
					},
					contactnumber: {
					     digits: true
					},
					block: {
					     required: true
					},
					unitno: { 
					     required: true
					}

				},
					  messages: {
					                password: {
					                	required: "Password required",
					                	alphanumeric: "Password must be alphanumerically"
									},
					                retype_password: {
					                	required: "Confirm Password required",
					                	alphanumeric: "Confirm Password must be alphanumerically",
					                	equalTo: "Enter same password as above"
									},
					                firstname: {
	               	     				required: "First Name is required",
	                     				alphanumeric: "First Name must be alphanumerically"
	                 			},
	                 			 lastname: {
	               	     				required: "Last Name is required",
	                     				alphanumeric: "Last Name must be alphanumerically"
	                 			},
	                 			email: {
	               	     				required: "email is required",
	                     				email: "Your email address must be in the format of name@domain.com"
	                 			},
	                 			contactnumber: {
	                     				digits: "Your contact will be number only"
	                 			},
	                 			block: {
	               	     				required: "Block Number is required"
	                 			},
	                 			unitno: {
	               	     				required: "Unit Number is required"
	                 			},
	                 			 first_vehicle_iu_no: {
	                     				alphanumeric: "First vehicle IU must be alphanumerically"
	                 			},
		                 			second_vehicle_iu_no: {
		                     				alphanumeric: "Second vehicle IU must be alphanumerically"
		                 			},
		                 			first_vehicle_registration_no: {
		                     				alphanumeric: "First vehicle registration must be alphanumerically"
		                 			},
		                 			second_vehicle_registration_no: {
		                     				alphanumeric: "Second vehicle registration must be alphanumerically"
		                 			},
					            },
					             tooltip_options: {
					                	password: {placement:'top',html:true},
					                	retype_password: {placement:'top',html:true},
					                	contactnumber: {placement: 'top', html: true},
					                	firstname: {placement: 'top', html: true},
					                	lastname: {placement: 'top', html: true},
					                	email: {placement: 'top', html: true},
					                	contactnumber: {placement: 'top', html: true},
					                	block: {placement: 'top', html: true},
					                	unitno: {placement: 'top', html: true},
					                	first_vehicle_iu_no: {placement: 'top', html: true},
					                	second_vehicle_iu_no: {placement: 'top', html: true},
					                	first_vehicle_registration_no: {placement: 'top', html: true},
					                	second_vehicle_registration_no: {placement: 'top', html: true},
					             }
					});
    
</script>

<script>
	 $("#username").keyup(function() {
	
	var base_url="<?php echo $this->config->base_url(); ?>";
	var email = $('#username').val();

	if(email!=''){
		$.ajax({
	    	type: 'GET',
	    	async: false,
	    	url: base_url+"user_content/user_content/admin_check_email?email="+email,
	    	cache: false,
        	
        	success: function(result) {
          	  response=JSON.parse(result);
          	  if(response.length!=0 && response!=0){
           		 
            	$("#available_msg").hide();
            	$("#not_available_msg").show();
           	 }
            else{
            $("#available_msg").show();
            	$("#not_available_msg").hide();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            
        }
});
	}
	else{
		$("#available_msg").hide();
        $("#not_available_msg").hide();
	}
  });
</script>


