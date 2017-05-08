

<div class="content">
			<div class="row">
					<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text><?php echo $success_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>application/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php }
				if (isset($error_message) && $error_message!=""){ ?>
				<div class="container-fluid">
					<div class="error-message">
						 <text><?php echo $error_message?></text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>application/view">
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
			</div> <!-- /. table-elements -->
			
			<div class="table-responsive">
					  <a class="btn upload-new-form" href="<?php echo $this->config->base_url();?>application/upload">UPLOAD NEW FORM</a>	
		
			  <table id="users_table"class="table table-striped app-form-table">
			    <thead>
				  <tr>
					<th class="col1">
					  Uploaded by
					  <i class="fa fa-sort"></i> 
					</th>
					<th class="col2">
					  Document Name
					  <i class="fa fa-sort"></i>
					</th>
					<th class="col3">
					  Document Size
					  <i class="fa fa-sort"></i>
					</th>
					<th class="col7" style="border:0;"></th>
				  </tr>
				</thead>
				<tbody>
				  	<?php foreach ($view_application as $key => $value) {
						?>
				 <tr>
				 		<td class="col1 tleft"><?php echo $value->username?></td>
						<td class="col2"><?php echo $value->doc_name?></td>
						<td class="col3"><?php echo $value->file_size?></td>
						<td class="col7 tleft">
					
						<a href="<?php echo $this->config->base_url();?>application/edit/<?php echo $value->file_id?>"><img src="<?php echo $this->config->base_url();?>r/img/icon-magni.png" /></a>
						<a class="open-AddBookDialog-cancel" data-id="<?php echo $value->file_id?>" data-title="Delete" data-toggle="modal" data-target="#cancelModal" ><img src="<?php echo $this->config->base_url();?>r/img/icon-delete-on.png"></a>
					</td>
				 </tr>
				 			
						<?php  
					  } ?>
					
				</tbody>
			  </table>
			</div>
			
			<!-- /. table-elements -->
		  </form>

	    </div>
		  
	  </div><!-- .row -->
	  
	  <div class="modal fade delete-modal" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-body">
		        <p style="text-align: center;"><center><h4>Do you want to cancel this application form?</h4></center></p>
		        <div class="col-md-4 col-md-offset-2">
		            <a href="<?php echo $this->config->base_url();?>application_content/staff_delete_application_content" id="cancel" class="btn btn-default">YES, DELETE</a>
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
$( "#users_table_filter input").attr( "placeholder", "Search..." );;
	    
	
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