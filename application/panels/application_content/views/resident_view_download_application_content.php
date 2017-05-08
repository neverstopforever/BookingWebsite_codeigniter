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

    <div class="content">
	  <div class="row">
        	<?php 
				if (isset($success_message) && $success_message!=""){ ?>
				<div class="container-fluid">
					<div class="success-message">
						<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
						<text>The new form has been successfully uploaded</text>
						<a class="close-button" href="<?php echo $this->config->base_url();?>booking/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php } ?>
	  		  </div><!-- .row -->
	  </div><!-- .content -->
	   <div class="content">
	  <div class="row">
		  
	    <div class="container-fluid form-download-header">
		  <span><b>Application Forms</b></span>
	    </div>
	
		<div class="container-fluid form-download-detail">
		
		  <ul class="list-group">
		   <?php 
		   foreach ($view_application as $key => $value) {
			   ?>
			   <li class="list-group-item"><a href="<?php echo $this->config->base_url();?>application_content/resident_view_download_application/<?php echo $value->full_path?>"> <?php echo $value->doc_name?></a></li>
		
			   <?php } ?>
		    
		  </ul>
		</div>
		  
	  </div><!-- .row -->
    </div>
	   
	   
	   

<script type="text/javascript">

    $(document).ready(function() {
    $('#users_table').DataTable({
    	"lengthMenu": [[10, 20, 50,100, -1], [10, 20, 50,100, "All"]],
           "oLanguage": { "sSearch": '<a style="float:right;" class="btn searchBtn" id="searchBtn"><i class="fa fa-search"></i></a>' }
    });
 $('div.dataTables_filter input').attr('placeholder', 'Search...');
	} );
	    
	
</script>

