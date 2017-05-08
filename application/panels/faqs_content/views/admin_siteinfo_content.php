
    <div class="content">
	  <div class="row">
      
	    <!-- Success Alert -->
		<?php 
	if (isset($success_message) && $success_message!=""){ ?>
		<div class="success-message">
			<img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
			<text><?php echo $success_message?></text>
			<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
				<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
			</a>
		</div> <!-- /. success-deleted -->
	<?php }
	if (isset($error_message) && $error_message!=""){ ?>
		<div class="error-message">
			<!-- <img src="<?php echo $this->config->base_url();?>r/img/success-deleted.png">
			 --><text><?php echo $error_message?></text>
			<a class="close-button" href="<?php echo $this->config->base_url();?>user/view">
				<img src="<?php echo $this->config->base_url();?>r/img/btn-close.png">
			</a>
		</div> <!-- /. success-deleted -->
	
	<?php		
	}
	 ?>
	        <!-- <text>Content has been successfully updated</text>
		 -->
		  
	    <div class="container-fluid contact-header">
		  <span><b>Contacts</b></span>
		  <a class="btn edit-contact" href="<?php echo $this->config->base_url()?>contact/edit">EDIT</a>
	    </div>
	  
	    <div class="container-fluid contact-detail">
	  
		  <p><span style="font-size:18px"><strong>Management Office</strong></span><br />
		  <br />
		  <?php echo $info[0]->name?><br />
		  <?php echo $info[0]->address?><br />
		  <?php echo $info[0]->tel?><br />
		  <?php echo $info[0]->email?><br />
		  
		  <p>&nbsp;</p>

		  <p><span style="font-size:18px"><strong>Operating Hours</strong></span><br />
		  <br />
		 <?php echo $info[0]->operating_hours?><br />
		  <?php echo $info[0]->operating_sat_hours?><br />
		  <?php echo $info[0]->operating_closed?><br />
		  
		  <p>&nbsp;</p>

		  <p><span style="font-size:18px"><strong>Emergency Contacts</strong></span><br />
		  <br />
		  <?php echo $info[0]->police?><br />
		  <?php echo $info[0]->ambulance?><br />
		  <?php echo $info[0]->fire?><br />
		  
		  <p>&nbsp;</p>

		  <p><span style="font-size:18px"><strong>Useful Contacts</strong></span><br />
		  <br />
		  <?php echo $info[0]->uc_1?><br />
		  <?php echo $info[0]->uc_2?><br />
		  <?php echo $info[0]->uc_3?><br />
		  <?php echo $info[0]->uc_4?><br />
		  <?php echo $info[0]->uc_5?><br />
		  
	    </div>
		  
	  </div><!-- .row -->
    </div>
    
