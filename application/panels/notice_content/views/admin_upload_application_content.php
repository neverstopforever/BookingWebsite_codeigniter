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
						<a class="close-button" href="<?php echo $this->config->base_url();?>notice/view">
							<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
						</a>
					</div> <!-- /. success-deleted -->
				</div>
				<?php } ?>
	  
	   
    <div class="content">
	  <div class="row">
      
	    <div class="container-fluid form-upload">
		
		  <a class="back-to-app-form" href="<?php echo $this->config->base_url();?>notice/view">Back to Notice</a>
		  
		  <form class="form-horizontal" method="post" action="<?php echo $this->config->base_url();?>notice_content/admin_save_application_content"  enctype="multipart/form-data">
		    <div class="form-group select-new-file">
			  <label for="newFile" class="control-label">SELECT NEW FILE*</label>
			  <div class="input-group has-error">
			    <!-- <input type="text" id="fakeInput" name="fakeInput" class="form-control">
				 -->
				 	<span class="input-group-btn">
				 	
				 	
				 	
				  <input type="file" name="userfile"  class="btn" value="BROWSE" required>
				  <!-- <input id="newFile" name="newFile" type="file" style="display:none;"> 
				 --></span>
				<!-- <div class="message-error">max. size - 1Mb</div>
			 -->  </div><!-- /input-group -->
			</div>
			
			<div class="form-group doc-name">
			  <label for="docName" class="control-label">DOCUMENT NAME*</label>
			  <input type="text" name="docName" id="docName" class="form-control" required>
			</div>
			
			<div class="form-group form-footer">
				<span class="footer-note">Compulsory<br> fields</span>
				<input type="submit" class="form-upload-save" value="SAVE">
				<!-- <span class="message-error"><b>The maximum file size is 1Mb</b></span>
		 -->	</div>
  
		  </form>

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

