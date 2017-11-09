<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description"	content="">
		<meta name="keywords" 		content="">
		<meta name="author" 		content="">
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<title><?=$wintitle;?></title>
		
		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		
		<?=link_tag('assets/plugins/bootstrap/css/bootstrap.css')."\n";?>
		<?=link_tag('assets/plugins/node-waves/waves.css')."\n";?>
		<?=link_tag('assets/css/style.css')."\n";?>
		
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
	</head>

	<body class="four-zero-four">
		<div class="four-zero-four-container">
		
			<h1></h1>
			<div class="error-code"><?=$heading;?></div>
			<div class="error-message"><?=$message;?></div>
			<div class="button-place">
				<a href="<?=$url;?>" class="btn btn-default btn-lg waves-effect"><?=$this->lang->str(100053);?></a>
			</div>
		</div>

		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
	</body>
</html>