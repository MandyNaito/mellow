<!DOCTYPE html>
<html style="height: 100%; width: 100%;">
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
		<?=link_tag('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')."\n";?>
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
		<?=script_tag('assets/plugins/momentjs/moment.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/locale/pt-br.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')."\n";?>
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
	
	<body class="login-page">
		<div class="login-box">
			<div class="logo">
				<a href="javascript:void(0);"><?=img('assets/images/logo/sm-preta.png', FALSE, array('class' => 'p-b-10 p-t-10', 'height' => '250'))."\n";?></a>
			</div>
			<div class="card">
				<div class="body">
				<?php
					$url_action = "login/login_process/";
					$attributes = array('id' => 'form', 'class'=>'login-form', 'role'=> 'form', 'method'=> 'post');
					$hidden = array();
				?>
				<?=form_open($url_action, $attributes, $hidden)?>
						<div class="msg"></div>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">person</i>
							</span>
							<div class="form-line">
								<?=form_input(array('name' => 'idlogin','id' => 'idlogin'), set_value('idlogin'), array('class' => 'form-control', 'placeholder' => $this->lang->str(100012), 'autofocus' => true, 'required' => true))?>
							</div>
						</div>
						<div class="input-group">
							<span class="input-group-addon">
								<i class="material-icons">lock</i>
							</span>
							<div class="form-line">
								<?=form_password(array('name' => 'idsenha', 'id' => 'idsenha'), set_value('idsenha'), array('class' => 'form-control','placeholder' => $this->lang->str(100032)))?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?=form_submit('submit', $this->lang->str(100031), array('class' => 'btn btn-block bg-pink waves-effect')); ?>
							</div>
						</div>
						
						<div class="row m-t-15 m-b--20">
							<div class="col-xs-12">
								<a href="<?=site_url('inscricao');?>"><?=$this->lang->str(100098);?></a>
							</div>
						</div>
					<?=form_close();?>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				'use strict';
	
				var $slides = $('.login-page');
				var images = [
					"../assets/images/background/slide_1.jpg", 
					"../assets/images/background/slide_2.jpg", 
					"../assets/images/background/slide_3.jpg",
					"../assets/images/background/slide_4.jpg",
					"../assets/images/background/slide_5.jpg",
					"../assets/images/background/slide_6.jpg",
					"../assets/images/background/slide_7.jpg",
					"../assets/images/background/slide_8.jpg",
					"../assets/images/background/slide_9.jpg"
				];
				var count = images.length;
				
				var slideshow = function() {
					$slides
						.css('background-image', 'url("' + images[Math.floor(Math.random() * count)] + '")')
						.show(0, function() {
							setTimeout(slideshow, 5000);
						});
				};
				
				slideshow();
			});	
		</script>
	</body>
</html>
