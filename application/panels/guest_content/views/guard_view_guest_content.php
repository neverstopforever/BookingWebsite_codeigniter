

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>guest/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						 <text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>guest/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				
				<?php		
				}
				 ?>
			
	  
	    <div class="container-fluid app-form">
		  <form class="form-inline">
			
			<div class="table-responsive guard-table">
			  <table id="users_table"class="table table-striped">
			    <thead>
				 	<tr>
									<th class="col1">Username<i class="fa fa-sort"></i><span style="position:absolute; margin-left:20px; width:1px; line-height:0;">
									</th>
									<th class="col2">Date<i class="fa fa-sort"></i><span style="position:absolute; margin-left:20px; width:1px; line-height:0;">
									</th>
									<th class="col3">Vehicle No.<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
									</th>
									<th class="col4">Visitor Name<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
									</th>
									<th class="col5">Visitor Contact<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
									</th>
									<th class="col6">Purpose<i class="fa fa-sort"></i><span style="position:absolute; margin-left:5px; width:1px; line-height:0;">
									</th>
									<th class="col7" style="border:0;"></th>
					</tr>
				</thead>
				<tbody>
					
				  	<?php 
				  	
				  	foreach ($view_guest as $key => $value) {
						?>
				 <tr>
				 		<td class="col1"><?php echo $value->user_name?></td>
						<td class="col2"><?php echo date_format(date_create($value->date_start),"d F Y")." - ".date_format(date_create($value->date_end),"d F Y") ?></td>
						<td class="col3"><?php echo $value->vehicle_no ?></td>
						<td class="col4 tleft"><?php echo $value->visitor_name ?></td>
						<td class="col5"><?php if($value->visitor_contact != ""){echo $value->visitor_contact;}else{ echo "-";} ?></td>
						<td class="col6 tleft"><?php echo $value->purpose; ?></td>
						<td class="col7 tleft">
						<a class="edit-AddBookDialog" data-toggle="modal" data-id="<?php echo $value->visitor_id?>" data-target=".ViewGuest"><img src="<?php echo $this->config->base_url();?>r/img/icon-magni.png"></a>
						</td>
				 </tr>
				 			
						<?php  
					  } ?>
					
				</tbody>
			  </table>
			</div>
		  </form>

	    </div>
		  
	  </div><!-- .row -->
	  </div>
	  
		<div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to delete the selected guest?</h4></center></p>
		        <div class="col-md-4 col-md-offset-2">
		            <a href="<?php echo $this->config->base_url();?>guest_content/staff_delete_guest_content" id="cancel" class="btn btn-default">YES, DELETE</a>
			      </div>
		        <div class="col-md-2">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">NO, KEEP IT</button>
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
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><img src="<?php echo $this->config->base_url();?>r/img/times.png"></button>
					<div class="ViewGuestLabel modal-head"><b>Guest information</b></div>
					<div class="modal-body">
						
						<form class="form-horizontal" action="">
						  <input type="hidden" class="form-control" id="visitor_id" name="visitor_id" placeholder="">
						
						  <div class="form-group">
							<label for="inputResidentName" class="col-sm-4 control-label">Username</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="username" name="username" placeholder="" readonly>
							</div>
						  </div>
						  
						  <div class="form-group">
							<label for="inputResidentBlock" class="col-sm-4 control-label">RESIDENT BLOCK</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control"  id="resident_block" name="resident_block"  placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputResidentUnit" class="col-sm-4 control-label">RESIDENT UNIT NO</label>
							<div class="col-sm-4">
							  <input type="text" class="form-control"  id="resident_unit" name="resident_unit"  placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputDateofVisit" class="col-sm-4 control-label">DATE OF VISIT</label>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control"  id="date_start" name="date_start"  placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/icon-calendar.png" class="date"></span>
							</div>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control"  id="date_end" name="date_end"  placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/icon-calendar.png" class="date"></span>
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
							  <span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/dropdown.png"></span>
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
							  
							 
							  <span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/dropdown.png"></span>
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVehicle" class="col-sm-4 control-label">VEHICLE NO.</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control"  id="vehicle_no" name="vehicle_no"  placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVisitorName" class="col-sm-4 control-label">VISITOR NAME</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control"  id="visitor_name" name="visitor_name"  placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputVisitorContact" class="col-sm-4 control-label">VISITOR CONTACT</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" id="visitor_no" name="visitor_no"  placeholder="">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPurpose" class="col-sm-4 control-label">PURPOSE</label>
							<div class="col-sm-8">
							  <input type="text" class="form-control"  id="purpose" name="purpose"   placeholder="">
							</div>
						  </div>
					</div>
					
						</form>					
				</div>
			</div>
		</div>

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
	var visitor_id = $(this).data('id');
    	$.ajax({
	    	type: 'GET',
	    	async: false,
	    	url: base_url+"guest_content/guest_content/guard_get_guest_record?visitor_id="+visitor_id,
	    	cache: false,
        	
        	success: function(result) {
          	  response=JSON.parse(result);
          	  if(response.length!=0 && response!=0){
           		document.getElementById('visitor_id').value=response[0]['visitor_id'];
           		document.getElementById('username').value=response[0]['user_name'];
           	//	document.getElementById('resident_name').value=response[0]['resident_name'];
           		document.getElementById('resident_block').value=response[0]['resident_block'];
           		document.getElementById('resident_unit').value=response[0]['resident_unit_no'];
           		document.getElementById('vehicle_no').value=response[0]['vehicle_no'];
           		document.getElementById('visitor_name').value=response[0]['visitor_name'];
           		document.getElementById('visitor_no').value=response[0]['visitor_contact'];
           		document.getElementById('purpose').value=response[0]['purpose'];
           		document.getElementById('date_start').value=response[0]['date_start'];
           		document.getElementById('date_end').value=response[0]['date_end'];
           		document.getElementById('time_start').value=response[0]['time_start'];
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
	<script type="text/javascript">
    
        $("#user_update").validate({
            rules: {
					  	username: "required",
					  	resident_block: "required", 
					  	resident_unit: "required", 
					  	date_start: "required", 
					  	date_end: "required", 
					  	time_start: "required", 
					  	time_end: "required", 
					  	vehicle_no: "required", 
					  	visitor_name: "required", 
					  	visitor_no: "required", 
					  	purpose: "required"
					  	 },
					  messages: {
					               	username: "Status Required",
					 			  	resident_block: "Block Required", 
								  	resident_unit: "Unit Required", 
								  	date_start: "Start Date Required", 
								  	date_end: "End Date Required", 
								  	time_start: "Start Time Required", 
								  	time_end: "End Time Required", 
								  	vehicle_no: "Vehicle No Required", 
								  	visitor_name: "Vehicle Name Required", 
								  	visitor_no: "Visitor Number Required", 
								  	purpose: "Purpose Required"
					            },
					            tooltip_options: {
					            	username: {placement:'top',html:true},
					 			  	resident_block: {placement:'top',html:true}, 
								  	resident_unit: {placement:'top',html:true},
								  	date_start:{placement:'top',html:true},
								  	date_end: {placement:'top',html:true},
								  	time_start: {placement:'top',html:true},
								  	time_end: {placement:'top',html:true},
								  	vehicle_no: {placement:'top',html:true}, 
								  	visitor_name: {placement:'top',html:true}, 
								  	visitor_no: {placement:'top',html:true},
								  	purpose: {placement:'top',html:true}
					               
					            }
					});
    
</script>
