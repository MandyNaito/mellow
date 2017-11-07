<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description"	content="">
		<meta name="keywords" 		content="">
		<meta name="author" 		content="">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<title><?=$wintitle?></title>
		<script>
			<?php
				foreach($this->lang->all() as $index => $value)
					echo " var {$index} = '{$value}'; \n";
			?>
		
			var base_url = '<?=base_url();?>';
		</script>
		
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		
		<?=link_tag('assets/plugins/bootstrap/css/bootstrap.css')."\n";?>
		<?=link_tag('assets/plugins/node-waves/waves.css')."\n";?>
		<?=link_tag('assets/plugins/animate-css/animate.css')."\n";?>
		<?=link_tag('assets/css/style.css')."\n";?>
		
		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-notify/bootstrap-notify.js')."\n";?>
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-mask/jquery.mask.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-maskmoney/jquery.maskMoney.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/js/main.js')."\n";?>
		<?=script_tag('assets/js/pages/examples/sign-in.js')."\n";?>
		
		
		<?=link_tag('assets/images/favicon/apple-icon-57x57.png',   'apple-touch-icon', 'image/png', '', '', '57x57');?>
		<?=link_tag('assets/images/favicon/apple-icon-60x60.png',   'apple-touch-icon', 'image/png', '', '', '60x60');?>
		<?=link_tag('assets/images/favicon/apple-icon-72x72.png',   'apple-touch-icon', 'image/png', '', '', '72x72');?>
		<?=link_tag('assets/images/favicon/apple-icon-76x76.png',   'apple-touch-icon', 'image/png', '', '', '76x76');?>
		<?=link_tag('assets/images/favicon/apple-icon-114x114.png', 'apple-touch-icon', 'image/png', '', '', '114x114');?>
		<?=link_tag('assets/images/favicon/apple-icon-120x120.png', 'apple-touch-icon', 'image/png', '', '', '120x120');?>
		<?=link_tag('assets/images/favicon/apple-icon-144x144.png', 'apple-touch-icon', 'image/png', '', '', '144x144');?>
		<?=link_tag('assets/images/favicon/apple-icon-152x152.png', 'apple-touch-icon', 'image/png', '', '', '152x152');?>
		<?=link_tag('assets/images/favicon/apple-icon-180x180.png', 'apple-touch-icon', 'image/png', '', '', '180x180');?>
		<?=link_tag('assets/images/favicon/android-icon-192x192.png', 'icon', 'image/png', '', '', '192x192');?>
		<?=link_tag('assets/images/favicon/android-icon-32x32.png', 'icon', 'image/png', '', '', '32x32');?>
		<?=link_tag('assets/images/favicon/android-icon-96x96.png', 'icon', 'image/png', '', '', '96x96');?>
		<?=link_tag('assets/images/favicon/android-icon-16x16.png', 'icon', 'image/png', '', '', '16x16');?>
		<?=link_tag('assets/images/favicon/manifest.json', 'manifest', '');?>
		<!--
		<meta name="msapplication-TileColor" content="#ffffff">
		<?=meta('msapplication-TileImage', 'assets/images/favicon/ms-icon-144x144.png', 'image/png');?>
		<meta name="theme-color" content="#ffffff">
		
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
		<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>-->
		
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
	</head>
	<body class="portal-page content bg-black">
        <div class="portal-box container">
            <div class="logo">
				<a href="javascript:void(0);"><?=img('assets/images/logo/sm-colorida.png', FALSE, array('class' => 'm-b-10 m-t-50', 'height' => '100'))."\n";?></a>
				<small><?=$this->lang->str(100097);?></small>
			</div>
           
			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div class="info-box-3 bg-pink hover-zoom-effect">
						<div class="icon">
							<i class="material-icons">face</i>
						</div>
						<div class="content">
							<div class="text"><?=$this->lang->str(100031);?></div>
							<div class="number"><?=$this->lang->str(100096);?></div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="info-box-3 bg-cyan hover-zoom-effect">
						<div class="icon">
							<i class="material-icons">location_city</i>
						</div>
						<div class="content">
							<div class="text"><?=$this->lang->str(100031);?></div>
							<div class="number"><?=$this->lang->str(100095);?></div>
						</div>
					</div>
				</div>
				<div class="col-sm-4 col-xs-12">
					<div class="info-box-3 bg-orange hover-zoom-effect">
						<div class="icon">
							<i class="material-icons">settings</i>
						</div>
						<div class="content">
							<div class="text"><?=$this->lang->str(100031);?></div>
							<div class="number"><?=$this->lang->str(100094);?></div>
						</div>
					</div>
				</div>
			</div>
        </div>
	</body>
</html>
