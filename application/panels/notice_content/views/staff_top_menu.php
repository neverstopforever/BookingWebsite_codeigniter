<div class="brand">
			CONDO
		</div>
		<nav class="navbar navbar-top">
			<div class="container-fluid">
				<div class="row">	
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse mynavbar" id="navbar-collapse">
				
					<ul class="nav navbar-nav">
						<li class="dropdown active">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								FACILITIES BOOKING
							</a>	
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo $this->config->base_url();?>booking/prenew">NEW BOOKING</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo $this->config->base_url();?>booking/view">VIEW BOOKINGS</a>
								</li>
							</ul>
						</li>
							
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								VISITORS LIST
							</a>	
							<ul class="dropdown-menu">
								<li>
									<a href="#">GUEST LIST</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="#">RENOVATION LIST</a>
								</li>
							</ul>
						</li>		
						<li>
							<a href="<?php echo $this->config->base_url();?>notice">
								NOTICES & CIRCULARS
							</a>	
						</li>
						<li>
									<a href="<?php echo $this->config->base_url();?>application/download">APPLICATION FORMS</a>
						</li>
						<li class="dropdown active">
								
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo $this->config->base_url();?>user/view">USER</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo $this->config->base_url();?>holiday/view">HOLIDAY</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo $this->config->base_url();?>notice/view">NOTICE</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo $this->config->base_url();?>application/view">FORM</a>
								</li>
								
							</ul>
						</li>
					</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</nav>