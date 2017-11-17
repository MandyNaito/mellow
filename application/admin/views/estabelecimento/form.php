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
									<?=form_hidden('cdestabelecimento', set_value('cdestabelecimento', -1));?>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<?=form_upload(array('name' => 'txfoto', 'id' => 'txfoto'),set_value('txfoto'), array('placeholder' => $this->lang->str(100087),'class' => 'hidden', 'enabled' => true, 'accept' => 'image/*', 'onchange' => 'readURL(this);'));?>
												<?=img(set_value('txfoto', 'assets/images/business-default.png'), false, array('id' => 'img_txfoto', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
												<?=form_error('txfoto');?>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100077), 'cdtipoestabelecimento', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdtipoestabelecimento','id' => 'cdtipoestabelecimento', 'selected' => set_value('cdtipoestabelecimento'), 'data-value'=>set_value('cdtipoestabelecimento')), $list_tipoestabelecimento, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdtipoestabelecimento');?>
											</div>
										</div>
									</div>

									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100081), 'idcnpj', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idcnpj','id' => 'idcnpj'), set_value('idcnpj'), array('class' => 'form-control cnpj', 'required'=>''))?>
												</div>
												<?=form_error('idcnpj');?>
											</div>
										</div>
									</div>
									
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100078), 'nmrazaosocial', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmrazaosocial','id' => 'nmrazaosocial'), set_value('nmrazaosocial'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('nmrazaosocial');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100079), 'nmfantasia', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmfantasia','id' => 'nmfantasia'), set_value('nmfantasia'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('nmfantasia');?>
											</div>
										</div>
									</div>
									
									
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100080), 'dsestabelecimento', array('class'=> 'form-label'))?>
													<?=form_textarea(array('name' => 'dsestabelecimento','id' => 'dsestabelecimento'), set_value('dsestabelecimento'), array('class' => 'form-control no-resize'))?>
												</div>
												<?=form_error('dsestabelecimento');?>
											</div>
										</div>
									</div>
									
									<div class="row clearfix">
										<div class="col-sm-4">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100086), 'nrcapacidade', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nrcapacidade','id' => 'nrcapacidade'), set_value('nrcapacidade'), array('class' => 'form-control number', 'required'=>''))?>
												</div>
												<?=form_error('nrcapacidade');?>
											</div>
										</div>
									</div>
									
									<h2 class="card-inside-title"><?=$this->lang->str(100103);?></h2>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100082), 'idtelefone', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'idtelefone','id' => 'idtelefone'), set_value('idtelefone'), array('class' => 'form-control phone', 'required'=>''))?>
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
									</div>
									
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100084), 'nmemail', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmemail','id' => 'nmemail'), set_value('nmemail'), array('class' => 'form-control email'))?>
												</div>
												<?=form_error('nmemail');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100085), 'nmsite', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmsite','id' => 'nmsite'), set_value('nmsite'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmsite');?>
											</div>
										</div>
									</div>
									
									<h2 class="card-inside-title"><?=$this->lang->str(100109);?></h2>
									<?=form_hidden('nrlatitude', set_value('nrlatitude'));?>
									<?=form_hidden('nrlongitude', set_value('nrlongitude'));?>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100110), 'idcep', array('class'=> 'form-label'))?>
													<?=form_input('idcep', set_value('idcep'), array('class' => 'form-control cep'))?>
												</div>
												<?=form_error('idcep');?>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100109), 'dsendereco', array('class'=> 'form-label'))?>
													<?=form_input('dsendereco', set_value('dsendereco'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('dsendereco');?>
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100111), 'nrnumero', array('class'=> 'form-label'))?>
													<?=form_input('nrnumero', set_value('nrnumero'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nrnumero');?>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100112), 'nmcomplemento', array('class'=> 'form-label'))?>
													<?=form_input('nmcomplemento', set_value('nmcomplemento'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmcomplemento');?>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100113), 'nmbairro', array('class'=> 'form-label'))?>
													<?=form_input('nmbairro', set_value('nmbairro'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmbairro');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100114), 'nmcidade', array('class'=> 'form-label'))?>
													<?=form_input('nmcidade', set_value('nmcidade'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmcidade');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100115), 'nmestado', array('class'=> 'form-label'))?>
													<?=form_input('nmestado', set_value('nmestado'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmestado');?>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100116), 'nmpais', array('class'=> 'form-label'))?>
													<?=form_input('nmpais', set_value('nmpais'), array('class' => 'form-control'))?>
												</div>
												<?=form_error('nmpais');?>
											</div>
										</div>
									</div>									
									
									
									<div class="row clearfix">
										<div id="actions" class="pull-right">
											<div id="btn_actions" class="col-sm-12">
												<?=form_reset('cancel', $this->lang->str(100044), array('class' => 'btn btn-default btn-cancel waves-effect', 'onclick' => 'window.location.replace(\''.site_url($controller).'\')')); ?>
												<?=form_button('btn_submit', $this->lang->str(100068), array('class' => 'btn btn-success waves-effect')); ?>
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
			var controller = '<?=$controller;?>';
			
			$(document).ready(function(){			
				$('#img_txfoto').on('click', function() {
					$('#txfoto').click();
				});	
				
				$('#idcep').blur(function(){
					$('.card').waitMe({effect: 'pulse'});
	
					var data =  getCepData($(this).val());
					if(!empty(data)){
						$('#dsendereco').val(data.rua);
						$('#nmbairro').val(data.bairro);
						$('#nmcidade').val(data.cidade);
						$('#nmestado').val(data.estado);
						$('#nrlatitude').val(data.latitude);
						$('#nrlongitude').val(data.longitude);
						$('#nrnumero').focus();
					}
				});
				   
				$( "#"+controller+"-form" ).find("button[name='btn_submit']").on('click', function (e) {
					$.validator.addMethod("valueNotEquals", function(value, element, arg){
						return arg !== value;
					}, s_100074);
					 
					$( "#"+controller+"-form" ).validate({
						rules: {
							'cdtipoestabelecimento': {
								valueNotEquals: '0'
							}
						},
						highlight: function (input) {
							$(input).parents('.form-line').addClass('error');
							$(input).parents('.form-control').addClass('error');
						},
						unhighlight: function (input) {
							$(input).parents('.form-line').removeClass('error');
							$(input).parents('.form-control').removeClass('error');
						},
						errorPlacement: function (error, element) {
							$(element).parents('.form-group').append(error);
						}
					});
					 
					$( "#"+controller+"-form" ).submit(); 
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
		