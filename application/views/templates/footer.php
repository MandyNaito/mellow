<!DOCTYPE HTML>
<html>
	<body>		
		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-select/js/bootstrap-select.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')."\n";?>
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-mask/jquery.mask.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-maskmoney/jquery.maskMoney.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/js/admin.js')."\n";?>
		<?=script_tag('assets/js/main.js')."\n";?>		
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