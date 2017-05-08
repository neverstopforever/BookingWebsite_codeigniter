

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
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
						<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
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
						
						<!-- <div class="input-group add-on">
						  <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
						  <div class="input-group-btn">
							<button class="btn btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						  </div>
						</div> -->
						
						<!-- <div class="input-group select-div itemsperpage-select-box">
							<label for="facility-select" style="font-size:14px;font-weight:normal;">Items per page:</label>
							<select id="facility-select" name="facilitySelect">
								<option value="1">15</option>
								<option value="2">30</option>
								<option value="3">45</option>
							</select>
						</div> -->
						
					</div> <!-- /. table-elements -->
					
					<div class="table-responsive booking-details">
							<a class="btn add-new-guest" href="<?php echo $this->config->base_url();?>user/add">ADD NEW USER</a>	
					
						<table id="users_table" class="table table-striped">
							<thead>
								<tr>
									<th class="col1">Username<i class="fa fa-sort"></i></th>
									<th class="col2">Account Type<i class="fa fa-sort"></i></th>
									<th class="col3">Status<i class="fa fa-sort"></i></th>
									<th class="col4">Last Logged In<i class="fa fa-sort"></i></th>
									<th class="col5" style="border:0;"></th>
									
								</tr>
							</thead>
							<tbody>
								<?php foreach ($view_user as $key => $value) {
								?>
								<tr>
									<td class="col1"><?php echo $value->username?></td>
									<td class="col2"><?php echo $value->user_type?></td>
									<td class="col3"><?php echo $value->status?></td>
									<td class="col4"><?php echo  str_replace(" ","&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;",date('d/m/Y H:i',strtotime($value->last_logged_in)))?></td>
									<td class="col5 nobg">
									
										<a href="<?php echo $this->config->base_url();?>user/edit/<?php echo $value->userid?>"><img src="<?php echo $this->config->base_url();?>r/img/icon-magni.png"></a>
										<a class="open-AddBookDialog-cancel" data-id="<?php echo $value->userid?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" ><img src="<?php echo $this->config->base_url();?>r/img/icon-delete-on.png"></button>
										<!-- <a href="<?php echo $this->config->base_url();?>user/delete/<?php echo $value->userid?>"><img src="<?php echo $this->config->base_url();?>r/img/icon-delete-off.png"></a>
						 -->			</td>
								</tr>
								<?php
								} ?>
							</tbody>
						</table>
					</div>

					<div class="table-elements" style="margin-top:0; margin-bottom:40px;">
						<div class="pagination">
							<!-- <li><a href="#" aria-label="Previous" class="previous"><span aria-hidden="true"><i class="glyphicon glyphicon-backward"></i></span></a></li>
							<li><a href="#" aria-label="Previous" class="previous"><span aria-hidden="true"><i class="glyphicon glyphicon-triangle-left"></i></span></a></li>
							<li><a href="#">1</a></li>
							<li class="active"><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#" aria-label="Next" class="next"><span aria-hidden="true"><i class="glyphicon glyphicon-triangle-right"></i></span></a></li>
							<li><a href="#" aria-label="Next" class="next"><span aria-hidden="true"><i class="glyphicon glyphicon-forward"></i></span></a></li>
						 --></div>
<!--						<a class="btn add-new-guest export pull-right" href="#" style="margin-right:185px; width: 160px;">EXPORT</a>-->
					</div> <!-- /. table-elements -->
					
				</form>
			</div>
		</div>
		
		<!-- pop up view guest -->

		<!-- Modal -->
		
	<div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to Remove this user?</h4></center></p>
		        <div class="col-md-4 col-md-offset-2">
		            <a href="<?php echo $this->config->base_url();?>user_content/staff_delete_user_content" id="cancel" class="btn btn-default">YES, DELETE</a>
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
	$(document).on("click", ".open-AddBookDialog-cancel", function () {
	 var orgid = $(this).data('id');
     old_href=$('#cancel').attr("href");
     new_href= old_href+"/"+orgid;
     $("#cancel").prop("href", new_href)
     return false;
 	});
</script>
