
<div class="content">
			<div class="row">
				<?php
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>booking/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						<!-- <img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						 --><text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>booking/view">
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
							
						
					</div>
					
					<div class="table-responsive booking-details">
						<a class="btn add-new-guest" href="<?php echo $this->config->base_url();?>booking/prenew">MAKE NEW BOOKING</a>
						<table id="users_table" class="table table-striped">
							<thead>
								<tr>
									<th class="col1">Created By<i class="fa fa-sort"></i></th>
									<th class="col2">Created On<i class="fa fa-sort"></i></th>
									<th class="col3">Username<i class="fa fa-sort"></i></th>
									<th class="col4">Date<i class="fa fa-sort"></i></th>
									<th class="col5">Time<i class="fa fa-sort"></i></th>
									<th class="col6">Facility<i class="fa fa-sort"></i></th>
									<th class="col6">Status<i class="fa fa-sort"></i></th>
									<th class="col8">Action<i class="fa fa-sort"></i></th>
									<th class="col9" style="border:0;"></th>
									</tr>
							</thead>
							<tbody>
								<?php foreach ($view_booking as $key => $value) {
									?>
								<tr>
									<td class="col1"><?php echo $value->username?></td>
									<td class="col2"><?php echo  substr($value->booking_date, 0, strpos($value->booking_date, ' '))?></td>
									<td class="col3"><?php echo $value->user_name?></td>
									<td class="col4"><?php echo  substr($value->booking_end_date, 0, strpos($value->booking_end_date, ' '))?></td>
									<td class="col5"><?php echo $value->booking_hours?></td>
									<td class="col6"><?php echo $value->booking_facility_name?></td>
									<td class="col6"><?php echo ($value->status == "Conformed" ? "Confirmed" : $value->status)?></td>
									<td class="col6">
										<?php   	
										if($value->status=="Pending"){
											?>
											<a href="#"  class="open-AddBookDialog-approved" data-id="<?php echo $value->booking_id?>" data-title="Delete" data-toggle="modal" data-target="#approveModal" >Approve</a>
											<!-- &nbsp; | &nbsp; 
										 -->	<a href="#"  class="open-AddBookDialog-cancel" data-id="<?php echo $value->booking_id?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" >Cancel</a>
											<?php	
											}elseif($value->status=="Conformed"){
											?>
											<a href="#" class="open-AddBookDialog-cancel"  data-id="<?php echo $value->booking_id?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" >Cancel</a>
											<?php	
										}else{
											
										}
										
										?>
										
									</td>
									<td class="col9 nobg">
										<a href="<?php echo $this->config->base_url();?>booking/detail/<?php echo $value->booking_id?>"><img src="<?php echo $this->config->base_url();?>r/img/icon-magni.png"></a>
								 </td>
								</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div>

					<div class="table-elements" style="margin-top:0; margin-bottom:40px;">
						<div class="pagination">
							</div>
						<a href="<?php echo $this->config->base_url();?>booking_content/admin_export_content" class="btn add-new-guest export pull-right" id="btnExport" style="margin-right:185px; width: 160px;">EXPORT</a>
					</div> <!-- /. table-elements -->
					
				</form>
			</div>
		</div>
		
		<!-- pop up view guest -->

		<!-- Modal -->
		<div class="modal fade delete-modal" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to confirm this booking?</center></h4></p>
		        <div class="col-md-3 col-md-offset-3">
			        <a href="<?php echo $this->config->base_url();?>booking_content/admin_update_booking_content/Conformed" class="btn btn-default" id="approved">YES</a>
			      </div>
		        <div class="col-md-3">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
			    </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to cancel this booking?</center></h4></p>
		        <div class="col-md-4 col-md-offset-2">
			        <a href="<?php echo $this->config->base_url();?>booking_content/admin_update_booking_content/Cancelled" id="cancel" class="btn btn-default">YES, DELETE</a>
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

		</div>
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>		 -->
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