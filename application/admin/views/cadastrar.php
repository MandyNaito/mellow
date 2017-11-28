<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
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
		
		<?=script_tag('assets/plugins/jquery/jquery.min.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap/js/bootstrap.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-select/js/bootstrap-select.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-select/js/i18n/defaults-pt_BR.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/plugins/bootstrap-notify/bootstrap-notify.js')."\n";?>
		
		<?=script_tag('assets/plugins/node-waves/waves.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-countto/jquery.countTo.js')."\n";?>
		<?=script_tag('assets/plugins/raphael/raphael.min.js')."\n";?>
		<?=script_tag('assets/plugins/morrisjs/morris.js')."\n";?>
		<?=script_tag('assets/plugins/chartjs/Chart.bundle.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-mask/jquery.mask.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-maskmoney/jquery.maskMoney.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-validation/jquery.validate.js')."\n";?>
		<?=script_tag('assets/plugins/autosize/autosize.js')."\n";?>
		<?=script_tag('assets/plugins/sweetalert/sweetalert.min.js')."\n";?>
		<?=script_tag('assets/plugins/multi-select/js/jquery.multi-select.js')."\n";?>
		
		<!-- Jquery DataTable Plugin Js -->
		<?=script_tag('assets/plugins/jquery-datatable/jquery.dataTables.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.jS')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/jszip.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js')."\n";?>
				
		<!--
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.resize.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.pie.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.categories.js')."\n";?>
		<?=script_tag('assets/plugins/flot-charts/jquery.flot.time.js')."\n";?>
		
		-->
		
		<?=script_tag('assets/plugins/waitme/waitMe.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-sparkline/jquery.sparkline.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-ui/jquery-ui.min.js')."\n";?>
		<?=script_tag('assets/plugins/jquery-tree/jquery.tree.min.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/moment.js')."\n";?>
		<?=script_tag('assets/plugins/momentjs/locale/pt-br.js')."\n";?>

		<?=script_tag('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')."\n";?>
		
		<?=script_tag('assets/js/admin.js')."\n";?>
		<?=script_tag('assets/js/pages/index.js')."\n";?>		
		<?=script_tag('assets/js/pages/forms/basic-form-elements.js')."\n";?>
		<?=script_tag('assets/js/main.js')."\n";?>		
		<?=script_tag('assets/js/cep.js')."\n";?>		
		<?=script_tag('assets/js/grid.js')."\n";?>		
		<?=script_tag('assets/js/card.js')."\n";?>		
		<?=script_tag('assets/js/demo.js')."\n";?>		
		

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
		
		<?=link_tag('assets/plugins/bootstrap/css/bootstrap.css')."\n";?>
		<?=link_tag('assets/plugins/bootstrap-select/css/bootstrap-select.css')."\n";?>
		<?=link_tag('assets/plugins/node-waves/waves.css')."\n";?>
		<?=link_tag('assets/plugins/animate-css/animate.css')."\n";?>
		<?=link_tag('assets/plugins/morrisjs/morris.css')."\n";?>
		<?=link_tag('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')."\n";?>
		<?=link_tag('assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')."\n";?>
		<?=link_tag('assets/plugins/waitme/waitMe.css')."\n";?>
		<?=link_tag('assets/plugins/sweetalert/sweetalert.css')."\n";?>
		<?=link_tag('assets/plugins/multi-select/css/multi-select.css')."\n";?>
		<?=link_tag('assets/plugins/jquery-ui/jquery-ui.min.css')."\n";?>
		<?=link_tag('assets/plugins/jquery-tree/jquery.tree.min.css')."\n";?>
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
	<body class="portal-page"> 		
        <section class="portal-box">
            <div class="container">
				<div class="logo">
					<a href="javascript:void(0);"><?=img('assets/images/logo/sm-preta.png', FALSE, array('class' => 'p-b-10 p-t-10', 'height' => '250'))."\n";?></a>
				</div>
		
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?=form_open_multipart($target, array('id' => 'signup-form', 'role' => 'form', 'accept-charset' => 'utf-8'));?>
							<?=form_hidden('cdusuario', set_value('cdusuario', -1));?>
							<?=form_hidden('cdperfil', set_value('cdperfil', 4));?>
							<div class="card">							
								<div class="body">
									<h2 class="card-inside-title"></h2>
									<div class="row clearfix">
										<div class="col-sm-12 text-center">
											<div class="form-group form-float">
												<?=form_hidden('hidden_txfoto', set_value('txfoto', 'assets/images/user-default.png'));?>
												<?=form_upload(array('name' => 'txfoto', 'id' => 'txfoto'), set_value('txfoto', 'assets/images/user-default.png'), array('placeholder' => $this->lang->str(100087),'class' => 'hidden', 'enabled' => true, 'accept' => 'image/*'));?>
												<?=img(set_value('txfoto', 'assets/images/user-default.png'), false, array('id' => 'img_txfoto', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
												<?=form_error('txfoto');?>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100066), 'nmusuario', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmusuario','id' => 'nmusuario'), set_value('nmusuario'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('nmusuario');?>
											</div>
										</div>
									</div>		
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100093), 'idlogin', array('class'=> 'form-label'))?>
													<?=form_input('idlogin', set_value('idlogin'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('idlogin');?>
											</div>
										</div>
									</div>		
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100032), 'idsenha', array('class'=> 'form-label'))?>
													<?=form_password('idsenha', '', array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('idsenha');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">	
													<?=form_label($this->lang->str(100067), 'idsenhaconfirm', array('class'=> 'form-label'))?>
													<?=form_password('idsenhaconfirm','', array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('idsenhaconfirm');?>
											</div>
										</div>
									</div>
									<h2 class="card-inside-title"><?=$this->lang->str(100104);?></h2>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100107), 'idcpf', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idcpf','id' => 'idcpf'), set_value('idcpf'), array('class' => 'form-control cpf'))?>
												</div>
												<?=form_error('idcpf');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100106), 'idrg', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idrg','id' => 'idrg'), set_value('idrg'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('idrg');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100105), 'dtnascimento', array('class'=> 'form-label'));?>
													<?=form_date(array('name' => 'dtnascimento','id' => 'dtnascimento'), set_value('dtnascimento'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('dtnascimento');?>
											</div>
										</div>
									</div>
									
									<h2 class="card-inside-title"><?=$this->lang->str(100103);?></h2>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100082), 'idtelefone', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idtelefone','id' => 'idtelefone'), set_value('idtelefone'), array('class' => 'form-control phone'))?>
												</div>
												<?=form_error('idtelefone');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100083), 'idcelular', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idcelular','id' => 'idcelular'), set_value('idcelular'), array('class' => 'form-control cellphone'))?>
												</div>
												<?=form_error('idcelular');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100084), 'nmemail', array('class'=> 'form-label'))?>
													<?=form_email(array('name' => 'nmemail','id' => 'nmemail'), set_value('nmemail'), array('class' => 'form-control email'))?>
												</div>
												<?=form_error('nmemail');?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="btn-box">
								<div class="row clearfix">
									<div id="actions" class="pull-right">
										<div id="btn_actions" class="col-sm-12">
											<?=form_reset('cancel', 		$this->lang->str(100044), array('class' => 'btn btn-warning btn-cancel btn-lg waves-effect', 'onclick' => 'history.go(-1);')); ?>
											<?=form_button('btn_submit', 	$this->lang->str(100068), array('class' => 'btn btn-success btn-lg waves-effect')); ?>
										</div>
									</div>	
								</div>	
							</div>
						<?=form_close();?>
					</div>
				</div>
			</div>
        </section>

		<script>
			var site_url = '<?=site_url($controller);?>';
			
			$(document).ready(function(){
				$('#img_txfoto').on('click', function() {
					$('#txfoto').click();
				});
								
				$( "#signup-form" ).find("button[name='btn_submit']").on('click', function (e) {
					$('#signup-form').validate({
						rules: {
							'idcpf': {
								required: true
							},
							'idrg': {
								required: true
							},
							'dtnascimento': {
								required: true
							},
							'idcelular': {
								required: true
							},
							'nmemail': {
								required: true
							}
						},
						highlight: function (input) {
							$(input).parents('.form-line').addClass('error');
						},
						unhighlight: function (input) {
							$(input).parents('.form-line').removeClass('error');
						},
						errorPlacement: function (error, element) {
							$(element).parents('.form-group').append(error);
						}
					});
					
					$('#signup-form').submit(); 
				});
			});	
						
			function readURL(input){
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#img_txfoto').attr('src', e.target.result);
					};

					reader.readAsDataURL(input.files[0]);
				}
			}
			
			$('#txfoto').change(function(){
				readURL(this);
			});
		</script>
	</body>
</html>
		