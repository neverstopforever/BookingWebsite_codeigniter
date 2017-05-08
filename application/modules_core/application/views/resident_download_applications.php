<?php echo Modules::run('header/header/resident_header'); ?>
	
	<body id="admin">
		<?php echo Modules::run('top_header_content/top_header_content/resident'); ?>
		<?php echo Modules::run('top_menu/top_menu/resident'); ?>
			<?php echo Modules::run('application_content/application_content/resident_view_download_application_content'); ?>
	
		<?php echo Modules::run('footer_content/footer_content/resident'); ?>
		
		
		<script type="text/javascript">
			// Mandatory for dropdown styling
			$('select').selectOrDie();
		</script>	
		
		<script type="text/javascript">
			var defaulttext = $('.defualt-text').text();

			$('.selectDefault').text(defaulttext);

			$('.selectBox').on('change',function(){
			   var defaulttext2 = $('.selectBox').find(":selected").text(); 
				$('.selectDefault').text(defaulttext2);
			});
		</script>	
		<script type="text/javascript">

			$('.form_date').datetimepicker({
				weekStart: 1,
				autoclose: 0,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
				});			
		</script>

	</body>
</html>