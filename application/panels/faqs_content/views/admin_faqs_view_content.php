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
	  
	   <div class="content">
	  <div class="row">
		  
	    <div class="container-fluid form-download-header">
		  <span><b>Category</b></span>
	    </div>
		<div class="right scrolable">
    		<img id="show_img" src="" hidden/>
		</div> 
		<div class="container-fluid form-download-detail">
		
		  <ul class="list-group">
		   <?php 
		   	foreach ($info as $key => $value) {
			   ?>
			   <li class="list-group-item"><?php echo $value->cat_name?></a>
			   <div class="right">
			   	<a href="<?php echo $value->cat_id?>"> view</a>
			   </div>
			   </li>
		
			   <?php } ?>
		    
		  </ul>
		
		</div>
		 
	  </div><!-- .row -->
    	
    	
    </div>
	   
	   
	   

<script type="text/javascript">
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

