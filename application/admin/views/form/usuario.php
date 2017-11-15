<!DOCTYPE html>
<html lang="pt-br">
	<body> 		
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>				
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
									<?=$title;?>
								</h2>
							</div>
							<div class="body">
								<h2 class="card-inside-title"></h2>
								<?=form_open_multipart($target, array('id' => $controller.'-form', 'role' => 'form', 'accept-charset' => 'utf-8'));?>
									<?=form_hidden('cdusuario', set_value('cdusuario', -1));?>
									<div class="row clearfix">
										<div class="col-sm-12">
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
									<div class="row clearfix">
										<?php if(empty($alterar)) { ?>
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100009), 'cdperfil', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdperfil','id' => 'cdperfil', 'selected' => set_value('cdperfil'), 'data-value'=>set_value('cdperfil')), $list_perfil, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdperfil');?>
											</div>
										</div>
										<?php } else { ?>
											<?=form_hidden('cdperfil', set_value('cdperfil'));?>
										<?php } ?>
									
										<div id="informacaoEstabelecimento">
											<?php if(empty($alterar)) { ?>
											<div class="col-sm-6">
												<div class="form-group">
													<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
													<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick'));?>
													<?=form_error('cdestabelecimento');?>
												</div>
											</div>
											<?php } else { ?>
												<?=form_hidden('cdestabelecimento', set_value('cdestabelecimento'));?>
											<?php } ?>
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
									
									<div class="row clearfix">
										<div id="actions" class="pull-right">
											<div id="btn_actions" class="col-sm-12">
												<?=form_reset('cancel', $this->lang->str(100044), array('class' => 'btn btn-default btn-cancel waves-effect', 'onclick' => 'window.location.replace(\''.site_url($controller).'\')')); ?>
												<?=form_button( 'btn_submit', $this->lang->str(100068), array('class' => 'btn btn-success waves-effect')); ?>
											</div>
										</div>	
									</div>
								<?=form_close();?>
							</div>
						</div>
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
				
				$('#cdperfil').on('change', function() {
					$('#cdestabelecimento').parent().parent().toggle($('#cdperfil').val() == 2 || $('#cdperfil').val() == 3);						
				}).change();
				
				
				$( "#usuario-form" ).find("button[name='btn_submit']").on('click', function (e) {
					
					$.validator.addMethod("valueNotEquals", function(value, element, arg){
						return arg !== value;
					}, s_100074);
					
					$('#usuario-form').validate({
						rules: {
							'cdperfil': {
								valueNotEquals: '0'
							},
							'cdestabelecimento': {
								required: ($('#cdperfil').val() == 2 || $('#cdperfil').val() == 3),
								valueNotEquals: '0'
							},
							'idcpf': {
								required: ($('#cdperfil').val() == 4)
							},
							'idrg': {
								required: ($('#cdperfil').val() == 4)
							},
							'dtnascimento': {
								required: ($('#cdperfil').val() == 4)
							},
							'idcelular': {
								required: ($('#cdperfil').val() == 4)
							},
							'nmemail': {
								required: ($('#cdperfil').val() == 4)
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
					
					if(!(($('#cdperfil').val() == 2 || $('#cdperfil').val() == 3)))
						$('#cdestabelecimento').rules('remove', 'valueNotEquals');
					
					$('#usuario-form').submit(); 
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
		