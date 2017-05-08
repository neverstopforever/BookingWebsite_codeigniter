<?php if (isset($_GET['error']) && $_GET['error'] == 1) { ?>
	    <script>
	       setTimeout(function() {
	            $.bootstrapGrowl("Sorry, either your username or password is not valid. Please try again.", {
	                type: 'danger',
	                align: 'center',
	                width: 'auto',
	                allow_dismiss: false
	            });
	        }, 1);
	    </script>
	<?php } ?>

<div class="login">
			<ul>
				<li class="username">  </li>
				<li class="logout"><a href="#"> </a></li>
			</ul>
		</div>
		<div class="brand">
			NV Residences
		</div>
		
		<div class="content-login">
			<div class="row">
				<div class="container-fluid">
					
					<form class="form-horizontal" id="loginform" action="<?php echo $this->config->base_url();?>login_content/login_validate" name="login" method="post">
						<div class="form-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="USERNAME" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>
						</div>
						<div class="form-group forgot-password">
							<a href="#">Forgot password?</a>
						</div>
						
						<div class="form-group">
							<button type="submit" class="btn btn-default">LOGIN</button>
						</div>
						
					</form>
				</div>
			</div>
		</div>
		
		<nav class="navbar navbar-bottom">
			<div class="container-fluid">
				<div class="row">
					<ul class="nav pull-left">
						<li class="first-li">Powered by</li>
						<li><a href="#">Business Buddy Pte Ltd</a></li>
					</ul>	
					<ul class="nav pull-right">
						
					</ul>
				</div>
			</div>
		</nav>