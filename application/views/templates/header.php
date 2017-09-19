<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">
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
		<?=link_tag('assets/plugins/morrisjs/morris.css')."\n";?>
		<?=link_tag('assets/css/style.css')."\n";?>
		<?=link_tag('assets/css/themes/theme-black-custom.css')."\n";?>		
		
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
		
	</head>
	<body class="theme-black">
	
		<div id="alerts"></div>
		
		<div class="page-loader-wrapper">
			<div class="loader">
				<div class="preloader">
					<div class="spinner-layer pl-red">
						<div class="circle-clipper left">
							<div class="circle"></div>
						</div>
						<div class="circle-clipper right">
							<div class="circle"></div>
						</div>
					</div>
				</div>
				<p>Aguarde...</p>
			</div>
		</div>
		
		<div class="overlay"></div>
		
		<div class="search-bar">
			<div class="search-icon">
				<i class="material-icons">search</i>
			</div>
			<input type="text" placeholder="Pesquisar...">
			<div class="close-search">
				<i class="material-icons">close</i>
			</div>
		</div>
		<nav class="navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
					<a href="javascript:void(0);" class="bars"></a>
					<a class="navbar-brand" href="<?=site_url('home');?>"><?=img('assets/images/logo/lg-branca.png', FALSE, array('height' => '35'))."\n";?></a>
				</div>
				<div class="collapse navbar-collapse" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
					</ul>
				</div>
			</div>
		</nav>
		
		<section>
			<aside id="leftsidebar" class="sidebar">
				<div class="user-info">
					<div class="image">
						<?=img('assets/images/user.png', FALSE, array('width' => '48', 'height' => '48'))."\n";?>
					</div>
					<div class="info-container">
						<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Verdant</div>
						<div class="email">Casa noturna</div>
						<div class="btn-group user-helper-dropdown">
							<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
							<ul class="dropdown-menu pull-right">
								<li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
								<li role="seperator" class="divider"></li>
								<li><a href="<?=site_url('login/logout');?>"><i class="material-icons">input</i>Sair</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="menu">
					<?=$this->multi_menu->render(isset($item_active) ? $item_active : '');?>
				</div>
				
				<div class="legal">
					<div class="copyright">
						<a href="javascript:void(0);">MellowTeam</a> &copy; 2017.
					</div>
				</div>
			</aside>
		</section>
	</body>
</html>
