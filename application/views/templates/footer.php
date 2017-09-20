<!DOCTYPE HTML>
<html>
	<body>		
		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-select/js/bootstrap-select.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')."\n";?>
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-countto/jquery.countTo.js')."\n";?>
		<?=script_tag('assets/plugins/raphael/raphael.min.js')."\n";?>
		<?=script_tag('assets/plugins/morrisjs/morris.js')."\n";?>
		<?=script_tag('assets/plugins/chartjs/Chart.bundle.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-mask/jquery.mask.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-maskmoney/jquery.maskMoney.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/plugins/autosize/autosize.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/moment.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')."\n";?>
		<!--
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.resize.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.pie.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.categories.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.time.js')."\n";?>
		-->
		<?=script_tag('assets/plugins/jquery-sparkline/jquery.sparkline.js')."\n";?>

		<?=script_tag('assets/js/admin.js')."\n";?>
		<?=script_tag('assets/js/pages/index.js')."\n";?>		
		<?=script_tag('assets/js/pages/forms/basic-form-elements.js')."\n";?>
		<?=script_tag('assets/js/main.js')."\n";?>		
		<?=script_tag('assets/js/mod.js')."\n";?>		
		<?=script_tag('assets/js/demo.js')."\n";?>		


		<?php
			if(null !== $this->session->flashdata('error_message'))
				$error_message = $this->session->flashdata('error_message');
			if (isset($error_message)) 
				echo "<script>$(document).ready(function(){addErrorMsg('{$error_message}');});</script>";
			
			if(null !== $this->session->flashdata('success_message'))
				$success_message = $this->session->flashdata('success_message');
			if (isset($success_message)) 
				echo "<script>$(document).ready(function(){addSuccessMsg('{$success_message}');});</script>";
		?>
	</body>
</html>