<?php
	if (isset($error_message) && $error_message!=""){ ?>
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
<?php } ?>
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
  
<div class="content-edit">
			<div class="row">
				<div class="container-fluid">
					<div class="back-guest-list">
						<a href="<?php echo $this->config->base_url(); ?>renovation/view"><img src="<?php echo $this->config->base_url(); ?>r/img/icon-back-to-GL.png">Back to Renovation List</a>
					</div>
					<form class="form-horizontal" id="renovation_add" method="post" action="<?php echo $this->config->base_url(); ?>renovation_content/admin_add_renovation">
					<div class="row">
						<div class="col-md-6">
							<label for="inputResidentName" class="col-sm-4 control-label" style="padding-right:0;">RESIDENT NAME:</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="user_name" id="inputResidentName" placeholder="">
							</div>
							<label for="inputResidentContact"  class="col-sm-4 control-label" style="padding-right:0;">RESIDENT CONTACT:</label>
							<div class="col-sm-6">
								<input type="text" name="resident_contact" class="form-control" id="inputResidentContact" placeholder="">
							</div>
							<label for="inputResidentBlock"   class="col-sm-4 control-label" style="padding-right:0;">RESIDENT BLOCK:</label>
							<div class="col-sm-6">
								<input type="text" name="resident_block" class="form-control" id="resident_block" placeholder="">
							</div>
							<label for="inputResidentUnitNo"  class="col-sm-4 control-label">RESIDENT UNIT NO:</label>
							<div class="col-sm-5">
								<input type="text" name="resident_unit_no"  class="form-control" id="inputResidentUnitNo" placeholder="">
							</div>
							<label for="inputVisitorName" class="col-sm-4 control-label">CONTRACTOR NAME:</label>
							<div class="col-sm-5">
								<input type="text" name="contractor_name"  class="form-control" id="contractor_name" placeholder="">
							</div>
							<label for="inputVisitorContact" class="col-sm-4 control-label">CONTRACTOR CONTACT:</label>
							<div class="col-sm-5">
								<input type="text" name="contractor_contact"  class="form-control" id="inputVisitorContact" placeholder="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="inputDateofVisit"  class="col-sm-4 control-label">DATE OF VISIT</label>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" name="date_start"  class="form-control" id="date_start" placeholder="">
								<span class="input-group-addon" style="height:100%; top:0;"><img src="<?php echo $this->config->base_url(); ?>r/img/calendar-icon.png" class="date"></span>
							</div>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" name="date_end"  class="form-control" id="date_end" placeholder="">
								<span class="input-group-addon" style="height:100%; top:0;"><img src="<?php echo $this->config->base_url(); ?>r/img/calendar-icon.png" class="date"></span>
							</div>
							<label for="inputTimeofVisit" class="col-sm-3 control-label">TIME OF VISIT</label>
							<div class="col-sm-1 hypme">-</div>
							<div class="col-sm-4">
								<div class="input-group select-div">
									<!-- <span class="selectDefault1"></span> -->
									<select name="time_start" id="time_start" class="selectBox1">
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
							<div class="col-sm-4">
								<div class="input-group select-div">
									<!-- <span class="selectDefault2"></span> -->
									<select name="time_end" id="time_end" class="selectBox2">
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
							<label for="inputVehicleNo" class="col-sm-4 control-label">VEHICLE NO :</label>
							<div class="col-sm-5">
								<input type="text" name="vehicle_no"  class="form-control" id="inputVehicleNo" placeholder="">
							</div>
							
							<label for="inputPurpose" class="col-sm-4 control-label">REMARKS:</label>
							<div class="col-sm-5">
								<textarea class="form-control" name="remarks"  id="remarks" rows="5" style="height:75px;"></textarea>
							</div>

							<label class="col-sm-4 control-label">CREATED BY :</label>
							<div class="col-sm-5">
								<input type="text" class="form-control" value="<?= $this->session->userdata('first_name'). ' ' .$this->session->userdata('last_name') ?>" placeholder="" disabled>
							</div>
						
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
						<div class="col-sm-2 compulsory">
							</br></br><span >* Compulsory</span><br> <text style="margin-left:10px;">fields</text>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-default">SUBMIT</button>
						</div>
						<div class="col-sm-8">
							</br></br><span class="correctly">Please fill out all fields correctly</span>
						</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
<script type="text/javascript">
   		 jQuery.validator.addMethod("alphanumeric", function(value, element) {
      	  return this.optional(element) || /^[a-zA-Z0-9-]+$/.test(value);
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

function deleteRow(row)
{
    var i=row.parentNode.parentNode.rowIndex;
    document.getElementById('POITable').deleteRow(i);
}


function insRow()
{
    var x=document.getElementById('POITable');
    var y=document.getElementById('hash');
       // deep clone the targeted row
       // get the total number of rows
    var new_row = x.rows[1].cloneNode(true);
    var len = x.rows.length;
       // set the innerHTML of the first row 
    new_row.cells[0].innerHTML = len;

       // grab the input from the first cell and update its ID and value
    var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
    inp1.id += len;
    inp1.value = '';

       // grab the input from the first cell and update its ID and value
    var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
    inp2.id += len;
    inp2.value = '';

	var inp3 = new_row.cells[3].getElementsByTagName('input')[0];
    inp3.id += len;
    inp3.value = '';

       // grab the input from the first cell and update its ID and value
    var inp4 = new_row.cells[4].getElementsByTagName('input')[0];
    inp4.id += len;
    inp4.value = '';
    y.appendChild( new_row );
}


$(document).ready(function(){
$('#users_table').dataTable( {
           "lengthMenu": [[10, 20, 50,100, -1], [10, 20, 50,100, "All"]]
        });
     });
</script>
<script>
	 $(".view_img").click(function() {
	 var id = $(this).attr("id");
     var path = "<?php echo $this->config->base_url();?>application_form/"+id;
	 $('#show_img').attr("src",path);
	 $("#show_img").show();
    });
</script>
	