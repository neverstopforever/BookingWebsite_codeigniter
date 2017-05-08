<div class="login">
			<ul>
				<li class="username"> <?php echo $this->session->userdata('first_name');?> </li>
				<li> | </li>
				<li class="logout"><a href="<?php echo $this->config->base_url();?>login_content/logout"> Log out </a></li>
			</ul>
		</div>