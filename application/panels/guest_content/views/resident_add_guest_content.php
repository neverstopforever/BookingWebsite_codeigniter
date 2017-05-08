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
						<a href="<?php echo $this->config->base_url();?>guest/view"><img src="<?php echo $this->config->base_url();?>r/img/icon-back-to-GL.png">Back to Guest List</a>
					</div>
					<form id="user_update" class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>guest_content/resident_add_guest">
					<div class="row">
						<div class="col-md-6">
							<label for="inputResidentName" class="col-sm-3 control-label">Username</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="username" name="username"  value = "<?php echo $resident_detail[0]->username?>" readonly=""> 
							</div>
						
							<label for="inputResidentBlock" class="col-sm-3 control-label">RESIDENT BLOCK</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" id="resident_block" name="resident_block" value = "<?php echo $resident_detail[0]->block?>" readonly="">
							</div>
							<label for="inputResidentUnitNo" class="col-sm-3 control-label">RESIDENT UNIT NO</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="resident_unit_no" name="resident_unit_no" value = "<?php echo $resident_detail[0]->unit?>" readonly="">
							</div>
						</div>
						<div class="col-md-6">
							<label for="inputDateofVisit" class="col-sm-3 control-label">DATE OF VISIT</label>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control" id="start_date" name="start_date" placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/calendar-icon.png" class="date"></span>
							</div>
							<div class="col-sm-4 date form_date input-group date" data-date="" data-date-format="dd-M-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
								<input type="text" class="form-control" id="end_date" name="end_date" placeholder="">
								<span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/calendar-icon.png" class="date"></span>
							</div>
							<label for="inputTimeofVisit" class="col-sm-3 control-label">TIME OF VISIT</label>
							<div class="col-sm-4 date form_time">
							 	<!-- <span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/dropdown.png"></span>
								 --> 	 	<select id="time_start" name="time_start">
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
							<div class="col-sm-4 date form_time">
							 	<!-- <span class="input-group-addon"><img src="<?php echo $this->config->base_url();?>r/img/dropdown.png"></span>
								 --> 	 	<select id="time_end" name="time_end">
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
					</div>
					<div class="row">
						<div class="col-md-12">
						<label for="inputVehicle" class="col-sm-1 control-label">VEHICLE</label>

						<div class="table-responsive">
							<table class="table table-striped" id="POITable">
								<thead>
									<tr>
										<th>#</th>
										<th class="col1 tleft">Vehicle No<i class="fa fa-sort"></i></th>
										<th class="col2 tleft">Visitor Name<i class="fa fa-sort"></i></th>
										<th class="col3 tleft">Visitor Contact<i class="fa fa-sort"></i></th>
										<th class="col4">Purpose<i class="fa fa-sort"></i></th>
										<th class="col5">Action<i class="fa fa-sort"></i></th>
									</tr>
								</thead>
								<tbody id="hash">
									<tr>
										<td>1</td>
										<td><input size=25 type="text" name="vehicle_no[]" /></td>
        							    <td><input size=25 type="text"  name="visitor_name[]"/></td>
            							<td><input size=25 type="text"  name="visitor_contact[]"/></td>
            							<td><input size=25 type="text"  name="purpose[]"/></td>
            							<td><!-- <a type="button" id="addmorePOIbutton" value="Add More POIs" onclick="insRow()"/>edit</a> --> <a id="delPOIbutton" value="Delete" onclick="deleteRow(this)"/>delete</a></td>
       							   </tr>
								</tbody>
							</table>
						</div>
						<div class="col-sm-11 col-sm-offset-1">
							<a class="add-new" onclick="insRow()">+ add new</a>
						</div>
						<div class="col-sm-2 col-sm-offset-1">
							<button type="submit" class="btn btn-default">SUBMIT</button>
						</div>
						<!-- <div class="col-sm-8">
							</br></br><span class="correctly">Please fill out all fields correctly</span>
						</div> -->
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>

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
	<script type="text/javascript">
    
        $("#user_update").validate({
            rules: {
					  	username: "required",
					 // 	resident_name: "required", 
					  	resident_block: "required", 
					  	resident_unit: "required", 
					  	start_date: "required", 
					  	end_date: "required", 
					  	time_start: "required", 
					  	time_end: "required", 
					  	resident_unit_no: "required",
					  	"vehicle_no[]": "required", 
					  	"visitor_name[]": "required", 
					  	"visitor_contact[]": "required", 
					  	"purpose[]": "required"
					  	 },
					  messages: {
					               	username: "Status Required",
					   //            	resident_name: "Name Required", 
								  	resident_block: "Block Required", 
								  	resident_unit: "Unit Required", 
								  	start_date: "Start Date Required", 
								  	end_date: "End Date Required", 
								  	time_start: "Start Time Required", 
								  	time_end: "End Time Required", 
								  	resident_unit_no: "Unit No Required", 
								  	"vehicle_no[]": "Vehicle No Required", 
								  	"visitor_name[]": "Visitor Name Required",
								  	"visitor_contact[]": "Visitor Number Required", 
								  	"purpose[]": "Purpose Required"
					            },
					            tooltip_options: {
					            	username: {placement:'top',html:true},
					     //       	resident_name: {placement:'top',html:true}, 
								  	resident_block: {placement:'top',html:true}, 
								  	resident_unit: {placement:'top',html:true},
								  	start_date:{placement:'top',html:true},
								  	end_date: {placement:'top',html:true},
								  	time_start: {placement:'top',html:true},
								  	time_end: {placement:'top',html:true},
								  	resident_unit_no: {placement:'top',html:true},
								  	"vehicle_no[]": {placement:'top',html:true}, 
								  	"visitor_name[]": {placement:'top',html:true}, 
								  	"visitor_contact[]": {placement:'top',html:true},
								  	"purpose[]": {placement:'top',html:true}
					               
					            }
					});
    
</script>
