<?php echo Modules::run('header/header/admin_header'); ?>
	
	<body id="admin">
		<?php echo Modules::run('top_header_content/top_header_content/admin'); ?>
		<?php echo Modules::run('top_menu/top_menu/admin'); ?>
		<?php echo Modules::run('faqs_content/faqs_content/admin_faqs_view_content'); ?>
		
		<?php echo Modules::run('footer_content/footer_content/admin'); ?>
		
		
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