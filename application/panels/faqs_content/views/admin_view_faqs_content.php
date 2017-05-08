

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>faqs">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						 <text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>faqs">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				
				<?php		
				}
				 ?>
			
	  
	    <div class="container-fluid app-form">
		  <form class="form-inline">
			<div class="table-elements table-elements-header">
			  <a class="btn upload-new-form" href="<?php echo $this->config->base_url();?>faqs/add">Add Category</a>	
			</div> <!-- /. table-elements -->
			
			<div class="table-responsive">
			  <table id="users_table"class="table table-striped app-form-table">
			    <thead>
				  <tr>
					<th class="col1">
					  Category Name
					</th>
					<th class="col2">
					  Status
					</th>
					<th class="col3">
					  Faqs
					</th>
					<th class="col7" style="border:0;"></th>
				  </tr>
				</thead>
				<tbody>
				  	<?php foreach ($info as $key => $value) {
						?>
				 <tr>
				 		<td class="col1 tleft"><?php echo $value->cat_name?></td>
						<td class="col2 tleft"><?php if($value->status==1){echo "Active";}else{echo "Inactive";} ?></td>
						<td class="col3 tleft"><a href="<?php echo $this->config->base_url();?>faqs/question/<?php echo $value->cat_id ?>"> view</a></td>
						<td class="col7 tleft">
						<a href="<?php echo $this->config->base_url();?>faqs/edit/<?php echo $value->cat_id?>"><img src="<?php echo $this->config->base_url();?>r/img/icon-magni-off.png" /></a>
						<a class="open-AddBookDialog-cancel" data-id="<?php echo $value->cat_id?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" ><img src="<?php echo $this->config->base_url();?>r/img/icon-delete-off.png"></a>
						</td>
				 </tr>
				 		<?php  
					  } ?>
					
				</tbody>
			  </table>
			</div>
			
			
			
			<!-- div class="table-elements table-elements-footer" style="margin-top:0; margin-bottom:40px;">
			  <div class="pagination">
				<li><a href="#" aria-label="Previous" class="previous"><span aria-hidden="true"><i class="glyphicon glyphicon-backward"></i></span></a></li>
				<li><a href="#" aria-label="Previous" class="previous"><span aria-hidden="true"><i class="glyphicon glyphicon-triangle-left"></i></span></a></li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#" aria-label="Next" class="next"><span aria-hidden="true"><i class="glyphicon glyphicon-triangle-right"></i></span></a></li>
				<li><a href="#" aria-label="Next" class="next"><span aria-hidden="true"><i class="glyphicon glyphicon-forward"></i></span></a></li>
			  </div>

			</div>  --><!-- /. table-elements -->
		  </form>

	    </div>
		  
	  </div><!-- .row -->
	  
	  	<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-body">
		        <p style="text-align: center;"><strong>Do you want to confirm this booking?</strong></p>
		        <div class="col-md-6">
			        <a href="<?php echo $this->config->base_url();?>booking_content/admin_update_booking_content/Conformed" class="btn btn-default" id="approved">YES</a>
			      </div>
		        <div class="col-md-6">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">NO</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
			    </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><strong>Do you want to remove this notice?</strong></p>
		        <div class="col-md-6">
		            <a href="<?php echo $this->config->base_url();?>faqs_content/admin_faqs_delete_content" id="cancel" class="btn btn-default">YES, DELETE</a>
			      </div>
		        <div class="col-md-6">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">NO, KEEP IT</button>
			    	</div>
			    	<div class="col-md-12">&nbsp;</div>
			    	<div style="clear:both"></div>
		      </div>
		    </div>
		  </div>
		</div>
	  
    </div>
    

<script type="text/javascript">
$(document).ready(function(){
$('#users_table').dataTable( {
           "lengthMenu": [[10, 20, 50,100, -1], [10, 20, 50,100, "All"]]
        });
     });
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
