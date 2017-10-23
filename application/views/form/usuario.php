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
								<form action="<?=$target;?>" id="usuario-form" method="post" role="form" enctype="multipart/form-data" accept-charset="utf-8">
									<?=form_hidden('cdusuario', set_value('cdusuario', -1));?>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<?=form_upload(array('name' => 'txfoto', 'id' => 'txfoto'),set_value('txfoto'), array('placeholder' => $this->lang->str(100087),'class' => 'hidden', 'enabled' => true, 'accept' => 'image/*', 'onchange' => 'readURL(this);'));?>
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
													<?=form_label($this->lang->str(100013), 'idlogin', array('class'=> 'form-label'))?>
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
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100009), 'cdperfil', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdperfil','id' => 'cdperfil', 'selected' => set_value('cdperfil'), 'data-value'=>set_value('cdperfil')), $list_perfil, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdperfil');?>
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
				
				$( "#usuario-form" ).find("button[name='btn_submit']").on('click', function (e) {
					
					$.validator.addMethod("valueNotEquals", function(value, element, arg){
						return arg !== value;
					}, s_100074);
					 
					$('#usuario-form').validate({
						rules: {
							'cdperfil': {
								valueNotEquals: '0'
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
		</script>
	</body>
</html>
		