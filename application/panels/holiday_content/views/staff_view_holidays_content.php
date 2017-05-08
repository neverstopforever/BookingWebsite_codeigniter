

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>holiday/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						 <text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>holiday/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				
				<?php		
				}
				 ?>
			
				<form class="form-inline">
					<div class="table-elements">
					<div class="row">
					</div> <!-- /. table-elements -->
					
					<div class="table-responsive booking-details">
								<a class="btn add-new-guest" data-title="Delete" data-toggle="modal" data-target="#approveModal" >ADD PUBLIC HOLIDAY</a>
				
						<table id="users_table" class="table table-striped">
							<thead>
								<tr>
									<th class="col1">Date<i class="fa fa-sort"></i></th>
									<th class="col2">Public Holiday<i class="fa fa-sort"></i></th>
									<th class="col3" style="border:0;"></th>
									
								</tr>
							</thead>
							<tbody>
								<?php foreach ($view_holiday as $key => $value) {
								?>
								<tr>
									<td class="col2"><?php echo $value->holiday_date?></td>
									<td class="col1"><?php echo $value->public_holiday?></td>
										<td class="col5 nobg">
										
										<a class="open-AddBookDialog-approved remove-underline" data-id="<?php echo $value->holidayid?>" data-title="Delete" data-toggle="modal" data-target="#editModal" ><img src="<?php echo $this->config->base_url();?>r/img/icon-pencil-on.png"></button>
										<a class="open-AddBookDialog-cancel" data-id="<?php echo $value->holidayid?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" ><img src="<?php echo $this->config->base_url();?>r/img/icon-delete-off.png"></button>
									</td>
								</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div>

					<div class="table-elements" style="margin-top:0; margin-bottom:40px;">
<!--						<a class="btn add-new-guest export pull-right" href="#" style="margin-right:185px; width: 160px;">EXPORT</a>-->
					</div> <!-- /. table-elements -->
					
				</form>
			</div>
		</div>
		
		<!-- pop up view guest -->

		<!-- Modal -->
		<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-body">
		    	<form id="holiday_add" class="form-inline" method="post" action="<?php echo $this->config->base_url();?>holiday_content/staff_holiday_add_content">
		    	<br><br>	
		        <div class="col-md-12">
			    <p style="text-align: left;">
		        	<strong>Date</strong>
		        	<input type="date" class="form-control right" id = "inputdate" name="inputdate"/>
		        </div>
			    <div class="col-md-12">
			    <p style="text-align: left;">
		        	<strong>Public Holiday</strong>
		        	<input type="text" class="right" name="inputholiday" id="inputholiday" value="" />
		        </p>
		        </div>
			    <div class="col-md-6">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			   	</div>
			    
			     <div class="col-md-6">
			    	<button type="submit" class="btn btn-default" id="approved">Add</button>
			    </div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
			    </form>
			    </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to remove selected date?</h4></center></p>
		        <div class="col-md-4 col-md-offset-2">
			        <a href="<?php echo $this->config->base_url();?>holiday_content/staff_delete_holiday_content" id="cancel" class="btn btn-default">YES, DELETE</a>
			      </div>
		        <div class="col-md-4">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">NO, KEEP IT</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>

			<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-body">
		    	<form id="holiday_edit" class="form-inline" method="post" action="<?php echo $this->config->base_url();?>holiday_content/staff_holiday_update_content">
		    	<input type="hidden" id = "inputholidayid_edit" name="inputholidayid_edit"/>
		        
		    	<br><br>	
		        <div class="col-md-12">
			    <p style="text-align: left;">
		        	<strong>Date</strong>
		        	<input type="date" class="form-control right" id = "inputdate_edit" name="inputdate_edit"/>
		        </div>
			    <div class="col-md-12">
			    <p style="text-align: left;">
		        	<strong>Public Holiday</strong>
		        	<input type="text" class="right" name="inputholiday_edit" id="inputholiday_edit" value="" />
		        </p>
		        </div>
			    <div class="col-md-6">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
			   	</div>
			    
			     <div class="col-md-6">
			    	<button type="submit" class="btn btn-default right" id="approved">Save</button>
			    </div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
			    </form>
			    </div>
		    </div>
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
    
        $("#holiday_add").validate({
            rules: {
					  	inputdate: "required",
					  	inputholiday: "required"
					  },
					  messages: {
					                inputdate: "Date Required",
					                inputholiday: "Holiday Required"
					            },
					            tooltip_options: {
					            	inputdate: {placement:'top',html:true},
					                inputholiday: {placement:'top',html:true}
					            }
					});
					
		 $("#holiday_edit").validate({
            rules: {
					  	inputdate_edit: "required",
					  	inputholiday_edit: "required"
					  },
					  messages: {
					                inputdate_edit: "Date Required",
					                inputholiday_edit: "Holiday Required"
					            },
					            tooltip_options: {
					            	inputdate_edit: {placement:'top',html:true},
					                inputholiday_edit: {placement:'top',html:true}
					            }
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
	$(document).on("click", ".open-AddBookDialog-approved", function () {

	 var orgid = $(this).data('id');
     // old_href=$('#holiday_edit').attr("action");
     // new_href= old_href+"/"+orgid;
//    
     // $("#holiday_edit").prop("action", new_href)
//    	
   	
   	var base_url="<?php echo $this->config->base_url(); ?>";
	if(orgid!=''){
		$.ajax({
	    	type: 'GET',
	    	async: false,
	    	url: base_url+"holiday_content/holiday_content/staff_get_holiday_data?holiday_id="+orgid,
	    	cache: false,
        	
        	success: function(result) {
          	  response=JSON.parse(result);
          	  if(response.length!=0 && response!=0){
           		$("#inputholidayid_edit").val(orgid);
           		$("#inputholiday_edit").val(response['public_holiday']);
           		$("#inputdate_edit").val(response['holiday_date']);
           		// $("#not_available_msg").show();
           	 }
            else{
            // $("#available_msg").show();
            	// $("#not_available_msg").hide();
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            
        }
});
	}
	else{
		// $("#available_msg").hide();
        // $("#not_available_msg").hide();
	}
  });
</script>


