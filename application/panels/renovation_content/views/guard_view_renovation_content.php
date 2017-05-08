

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>renovation/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						 <text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>renovation/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				
				<?php		
				}
				 ?>
			<form class="form-inline">
					<div class="table-elements">
					<div class="table-responsive booking-details guard-table">
						<table id="users_table" class="table table-striped">
								<thead>
								<tr>
									<th class="col1">Resident Name<i class="fa fa-sort"></i><span style="position:absolute; margin-left:20px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col2">Vehicle No<i class="fa fa-sort"></i><span style="position:absolute; margin-left:20px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><br><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col3">Date<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><br><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col4">Contractor Name<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><br><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col5">Contractor Contact<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><br><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col6">Remarks<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
										<a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-top"></i></a><br><a style="display:none;" href="#"><i class="glyphicon glyphicon-triangle-bottom"></i></a></span>
									</th>
									<th class="col7" style="border:0;"></th>
								</tr>
							</thead>
							<tbody>
							<?php foreach ($view_renovation as $key => $value): ?>
								<tr>
									<td class="col1 tleft"><?php echo $value->user_name; ?></td>
									<td class="col2"><?php echo $value->vehicle_no; ?></td>
									<td class="col3"><?php echo $value->date_end; ?></td>
									<td class="col4 tleft"><?php echo $value->contractor_name; ?></td>
									<td class="col5"><?php echo $value->contractor_contact; ?></td>
									<td class="col6 tleft"><?php echo $value->remarks; ?></td>
									<td class="col7 tleft">
										<a data-toggle="modal" class="edit-AddBookDialog" data-id="<?php echo $value->renovation_id?>" data-target=".ViewGuest"><img src="<?php echo $this->config->base_url(); ?>r/img/icon-magni.png"></a>
									</td>
								</tr>
								
							<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="table-elements" style="margin-top:0; margin-bottom:40px;">
						<div class="pagination">
								</div>

					</div> <!-- /. table-elements -->
					
				</form>
			</div>
		</div>
		</div>
		
		<!-- pop up view guest -->
		<div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to Remove this Renovation?</h4></center></p>
		        <div class="col-md-4 col-md-offset-2">
		            <a href="<?php echo $this->config->base_url();?>renovation_content/admin_delete_renovation_content" id="cancel" class="btn btn-default">YES, DELETE</a>
			    </div>
		        <div class="col-md-4">
			        <button type="button"  class="btn btn-primary" id="no" data-dismiss="modal">NO, KEEP IT</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade ViewGuest" tabindex="-1" role="dialog" aria-labelledby="ViewGuestLabel" id="viewguest" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo $this->config->base_url(); ?>r/img/times.png"></button>
					<div class="ViewGuestLabel modal-head"><b>Renovation information</b></div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="renovation_add" >
							<input type="hidden" class="form-control" id="renovation_id" name="renovation_id" placeholder="">
						  <div class="form-group">
							<label for="inputResidentName" class="col-sm-4 control-label">Username</label>
							<div class="col-sm-8">
							  <input type="text" disabled class="form-control" name="user_name" id="user_name" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputResidentName" class="col-sm-4 control-label">RESIDENT CONTACT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="resident_contact" id="resident_contact" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputResidentBlock" class="col-sm-4 control-label">RESIDENT BLOCK</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="resident_block" id="resident_block" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputResidentUnit" class="col-sm-4 control-label">RESIDENT UNIT NO</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control" name="resident_unit_no" id="resident_unit_no" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputDateofVisit" class="col-sm-4 control-label">DATE OF VISIT</label>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control" name="date_start" id="date_start" placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url(); ?>r/img/icon-calendar.png" class="date"></span>
							</div>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control" name="date_end" id="date_end" placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url(); ?>r/img/icon-calendar.png" class="date"></span>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputTimeofVisit" class="col-sm-4 control-label">TIME OF VISIT</label>
							<div class="col-sm-4 date form_time">
							 	<div class="input-group select-div">
							 	<div class="test1">
									<select id="time_start" name="time_start">
												<option  value="12:00 AM">12:00 AM</option>
												<option  value="12:30 AM">12:30 AM</option>
												<option  value="01:00 AM">01:00 AM</option>
												<option  value="01:30 AM">01:30 AM</option>
												<option  value="02:00 AM">02:00 AM</option>
												<option  value="02:30 AM">02:30 AM</option>
												<option  value="03:00 AM">03:00 AM</option>
												<option  value="03:30 AM">03:30 AM</option>
												<option  value="04:00 AM">04:00 AM</option>
												<option  value="04:30 AM">04:30 AM</option>
												<option  value="05:00 AM">05:00 AM</option>
												<option  value="05:30 AM">05:30 AM</option>
												<option  value="06:00 AM">06:00 AM</option>
												<option  value="06:30 AM">06:30 AM</option>
												<option  value="07:00 AM">07:00 AM</option>
												<option  value="07:30 AM">07:30 AM</option>
												<option  value="08:00 AM">08:00 AM</option>
												<option  value="08:30 AM">08:30 AM</option>
												<option  value="09:00 AM">09:00 AM</option>
												<option  value="09:30 AM">09:30 AM</option>
												<option  value="10:00 AM">10:00 AM</option>
												<option  value="10:30 AM">10:30 AM</option>
												<option  value="11:00 AM">11:00 AM</option>
												<option  value="11:30 AM">11:30 AM</option>
												<option  value="12:00 PM">12:00 PM</option>
												<option  value="12:30 PM">12:30 PM</option>
												<option  value="01:00 PM">01:00 PM</option>
												<option  value="01:30 PM">01:30 PM</option>
												<option  value="02:00 PM">02:00 PM</option>
												<option  value="02:30 PM">02:30 PM</option>
												<option  value="03:00 PM">03:00 PM</option>
												<option  value="03:30 PM">03:30 PM</option>
												<option  value="04:00 PM">04:00 PM</option>
												<option  value="04:30 PM">04:30 PM</option>
												<option  value="05:00 PM">05:00 PM</option>
												<option  value="05:30 PM">05:30 PM</option>
												<option  value="06:00 PM">06:00 PM</option>
												<option  value="06:30 PM">06:30 PM</option>
												<option  value="07:00 PM">07:00 PM</option>
												<option  value="07:30 PM">07:30 PM</option>
												<option  value="08:00 PM">08:00 PM</option>
												<option  value="08:30 PM">08:30 PM</option>
												<option  value="09:00 PM">09:00 PM</option>
												<option  value="09:30 PM">09:30 PM</option>
												<option  value="10:00 PM">10:00 PM</option>
												<option  value="10:30 PM">10:30 PM</option>
												<option  value="11:00 PM">11:00 PM</option>
												<option  value="11:30 PM">11:30 PM</option>
									</select>
									</div>
								</div>
							  <span class="input-group-addon"><img src="<?php echo $this->config->base_url(); ?>r/img/dropdown.png"></span>
							</div>
							<div class="col-sm-4 date form_time">
							  <div class="input-group select-div">
							 		<div class="test">
									<select id="time_end" name="time_end">
													<option  value="12:00 AM">12:00 AM</option>
												<option  value="12:30 AM">12:30 AM</option>
												<option  value="01:00 AM">01:00 AM</option>
												<option  value="01:30 AM">01:30 AM</option>
												<option  value="02:00 AM">02:00 AM</option>
												<option  value="02:30 AM">02:30 AM</option>
												<option  value="03:00 AM">03:00 AM</option>
												<option  value="03:30 AM">03:30 AM</option>
												<option  value="04:00 AM">04:00 AM</option>
												<option  value="04:30 AM">04:30 AM</option>
												<option  value="05:00 AM">05:00 AM</option>
												<option  value="05:30 AM">05:30 AM</option>
												<option  value="06:00 AM">06:00 AM</option>
												<option  value="06:30 AM">06:30 AM</option>
												<option  value="07:00 AM">07:00 AM</option>
												<option  value="07:30 AM">07:30 AM</option>
												<option  value="08:00 AM">08:00 AM</option>
												<option  value="08:30 AM">08:30 AM</option>
												<option  value="09:00 AM">09:00 AM</option>
												<option  value="09:30 AM">09:30 AM</option>
												<option  value="10:00 AM">10:00 AM</option>
												<option  value="10:30 AM">10:30 AM</option>
												<option  value="11:00 AM">11:00 AM</option>
												<option  value="11:30 AM">11:30 AM</option>
												<option  value="12:00 PM">12:00 PM</option>
												<option  value="12:30 PM">12:30 PM</option>
												<option  value="01:00 PM">01:00 PM</option>
												<option  value="01:30 PM">01:30 PM</option>
												<option  value="02:00 PM">02:00 PM</option>
												<option  value="02:30 PM">02:30 PM</option>
												<option  value="03:00 PM">03:00 PM</option>
												<option  value="03:30 PM">03:30 PM</option>
												<option  value="04:00 PM">04:00 PM</option>
												<option  value="04:30 PM">04:30 PM</option>
												<option  value="05:00 PM">05:00 PM</option>
												<option  value="05:30 PM">05:30 PM</option>
												<option  value="06:00 PM">06:00 PM</option>
												<option  value="06:30 PM">06:30 PM</option>
												<option  value="07:00 PM">07:00 PM</option>
												<option  value="07:30 PM">07:30 PM</option>
												<option  value="08:00 PM">08:00 PM</option>
												<option  value="08:30 PM">08:30 PM</option>
												<option  value="09:00 PM">09:00 PM</option>
												<option  value="09:30 PM">09:30 PM</option>
												<option  value="10:00 PM">10:00 PM</option>
												<option  value="10:30 PM">10:30 PM</option>
												<option  value="11:00 PM">11:00 PM</option>
												<option  value="11:30 PM">11:30 PM</option>
									</select>
									</div>
								</div>
							  <span class="input-group-addon"><img src="<?php echo $this->config->base_url(); ?>r/img/dropdown.png"></span>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVehicle" class="col-sm-4 control-label">VEHICLE NO.</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="vehicle_no" id="vehicle_no" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVisitorName" class="col-sm-4 control-label">CONTRACTOR NAME</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="contractor_name" id="contractor_name" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVisitorContact" class="col-sm-4 control-label">CONTRACTOR CONTACT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="contractor_contact" id="contractor_contact" placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPurpose" class="col-sm-4 control-label">REMARKS</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="remarks" id="remarks" placeholder="">
							</div>
						  </div>
							<div class="form-group">
								<label for="inputPurpose" class="col-sm-4 control-label">CREATED BY</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="created_by" disabled placeholder="">
								</div>
							</div>
					</div>
					<div class="modal-footer">
						  <div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
							  <!--<button type="submit" class="btn btn-default">SAVE</button>-->
							</div>
						  </div>
						</form>					
					</div>
				</div>
			</div>
		</div>
  <script type="text/javascript">
   		 jQuery.validator.addMethod("alphanumeric", function(value, element) {
      	  return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
		}); 
	
        $("#renovation_add").validate({
            rules: {  
					  	resident_contact: {
					     digits: true
					}, 
					  	
					  	 resident_block: {
					  	 required: true,
	                     alphanumeric: true
	                },
	                 	 resident_unit_no: {
					  	 required: true,
	                     alphanumeric: true
	                },
	                 vehicle_no: {
					  	 required: true,
	                     alphanumeric: true
	                },
	                	contractor_contact: {
					     digits: true
					} 
					  	
	                
				},
					  messages: {
							  	resident_contact: {
			                     				digits: "Resident contact will be number only"
			                 			},
							               
					                resident_block: {
	               	     				required: "Resident Block is required",
	                     				alphanumeric: "Resident Block must be alphanumerically"
	                 			},
	                 			 resident_unit_no: {
	               	     				required: "Resident Unit No is required",
	                     				alphanumeric: "Resident Unit No  must be alphanumerically"
	                 			},
	                 			 vehicle_no: {
	               	     				required: "Vehicle No is required",
	                     				alphanumeric: "Vehicle No  must be alphanumerically"
	                 			},
	                 			contractor_contact: {
			                     				digits: "Contractor contact will be number only"
			                 			}
	                 			
	                 			
					            },
					             tooltip_options: {
					                	resident_contact: {placement:'top',html:true},
					                	resident_block: {placement:'top',html:true},
					                	resident_unit_no: {placement: 'top', html: true},
					                	vehicle_no: {placement: 'top', html: true},
					                	contractor_contact: {placement: 'top', html: true},
					             }
					});
    
</script>      
<script type="text/javascript">

$('#users_table').dataTable( {
    lengthMenu: [[10, 20, 50,100, -1], [10, 20, 50,100, "All"]],
    language: {
        search: "_INPUT_",
        searchPlaceholder: "Search..."
    },
    oLanguage: { sSearch: '<a style="float:right;" class="btn searchBtn" id="searchBtn"><i class="fa fa-search"></i></a>' }
    
});
$( "#users_table_length label").attr( "for", "users_table_length" );
$( "#users_table_filter input").attr( "placeholder", "Search..." );

</script>
<script type="text/javascript">
	$(document).on("click", ".open-AddBookDialog-approved", function () {
	 var orgid = $(this).data('id');
     old_href=$('#approved').attr("href");
     new_href= old_href+"/"+orgid;
     $("#approved").prop("href", new_href)
     return false;
 	});
</script>
<script type="text/javascript">
	$(document).on("click", ".open-AddBookDialog-cancel", function () {
	 var orgid = $(this).data('id');
     old_href=$('#cancel').attr("href");
     new_href= old_href+"/"+orgid;
     $("#cancel").prop("href", new_href)
     return false;
 	});
</script>

<script>
	var x="l";
	$(document).on("click", ".edit-AddBookDialog", function () {
 
	var base_url="<?php echo $this->config->base_url(); ?>";
	var renovation_id = $(this).data('id');
    	$.ajax({
	    	type: 'GET',
	    	async: false,
	    	url: base_url+"renovation_content/renovation_content/guard_get_renovation_record?renovation_id="+renovation_id,
	    	cache: false,
        	
        	success: function(result) {
          	  response=JSON.parse(result);
          	  if(response.length!=0 && response!=0){
           		document.getElementById('renovation_id').value=response[0]['renovation_id'];
           		document.getElementById('user_name').value=response[0]['user_name'];
           		document.getElementById('resident_contact').value=response[0]['resident_contact'];
           		document.getElementById('resident_block').value=response[0]['resident_block'];
           		document.getElementById('resident_unit_no').value=response[0]['resident_unit_no'];
           		document.getElementById('vehicle_no').value=response[0]['vehicle_no'];
           		document.getElementById('contractor_name').value=response[0]['contractor_name'];
           		document.getElementById('contractor_contact').value=response[0]['contractor_contact'];
           		document.getElementById('remarks').value=response[0]['remarks'];
           		document.getElementById('date_start').value=response[0]['date_start'];
           		document.getElementById('date_end').value=response[0]['date_end'];
           		document.getElementById('time_start').value=response[0]['time_start'];
                document.getElementById('created_by').value=response['created_by_user'][0]['first_name'] + ' ' + response['created_by_user'][0]['last_name'];
				  show_selected_val=$( "#time_start option:selected" ).text();
           		$('.test1').children('.sod_select').children('.sod_label').text(show_selected_val); 
           	
           	 	document.getElementById('time_end').value=response[0]['time_end'];
           	 	show_selected_val=$( "#time_end option:selected" ).text();
           		$('.test').children('.sod_select').children('.sod_label').text(show_selected_val); 
           	 }
            else{
            
            }
            
        },
        error: function(xhr, ajaxOptions, thrownError) {
            
        }
	});
});

           	
  // $('#time_start option[value="4"]').attr("selected", "selected");
  	
// document.getElementById('time_start').value=4;       	

</script>
	