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
								<h2><?=$title;?></h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-sm-12 text-center">
										<div class="form-group form-float">
											<?=img(set_value('txfoto', 'assets/images/business-default.png'), false, array('id' => 'img_txfoto', 'class' => 'user-profile-photo img-thumbnail', 'title' => $this->lang->str(100087)));?>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100077), 'nmtipoestabelecimento', array('class'=> 'form-label'))?>
												<?=form_input('nmtipoestabelecimento', set_value('nmtipoestabelecimento'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100078), 'nmrazaosocial', array('class'=> 'form-label'))?>
												<?=form_input('nmrazaosocial', set_value('nmrazaosocial'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100079), 'nmfantasia', array('class'=> 'form-label'))?>
												<?=form_input('nmfantasia', set_value('nmfantasia'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100080), 'dsestabelecimento', array('class'=> 'form-label'))?>
												<?=form_textarea('dsestabelecimento', set_value('dsestabelecimento'), array('class' => 'form-control no-resize', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100081), 'idcnpj', array('class'=> 'form-label'))?>
												<?=form_input('idcnpj', set_value('idcnpj'), array('class' => 'form-control cnpj', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100086), 'nrcapacidade', array('class'=> 'form-label'))?>
												<?=form_input('nrcapacidade', set_value('nrcapacidade'), array('class' => 'form-control number', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="header">
								<h2><?=$this->lang->str(100103);?></h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100082), 'idtelefone', array('class'=> 'form-label'))?>
												<?=form_input('idtelefone', set_value('idtelefone'), array('class' => 'form-control phone', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100083), 'idcelular', array('class'=> 'form-label'))?>
												<?=form_input('idcelular', set_value('idcelular'), array('class' => 'form-control cellphone', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100084), 'nmemail', array('class'=> 'form-label'))?>
												<?=form_input('nmemail', set_value('nmemail'), array('class' => 'form-control email', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100085), 'nmsite', array('class'=> 'form-label'))?>
												<?=form_input('nmsite', set_value('nmsite'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="card">
							<div class="header">
								<h2><?=$this->lang->str(100109);?></h2>
							</div>
							<div class="body">
								<?=form_hidden('nrlatitude', set_value('nrlatitude'));?>
								<?=form_hidden('nrlongitude', set_value('nrlongitude'));?>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100110), 'idcep', array('class'=> 'form-label'))?>
												<?=form_input('idcep', set_value('idcep'), array('class' => 'form-control cep', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100109), 'dsendereco', array('class'=> 'form-label'))?>
												<?=form_input('dsendereco', set_value('dsendereco'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-2">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100111), 'nrnumero', array('class'=> 'form-label'))?>
												<?=form_input('nrnumero', set_value('nrnumero'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100112), 'nmcomplemento', array('class'=> 'form-label'))?>
												<?=form_input('nmcomplemento', set_value('nmcomplemento'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100113), 'nmbairro', array('class'=> 'form-label'))?>
												<?=form_input('nmbairro', set_value('nmbairro'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100114), 'nmcidade', array('class'=> 'form-label'))?>
												<?=form_input('nmcidade', set_value('nmcidade'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100115), 'nmestado', array('class'=> 'form-label'))?>
												<?=form_input('nmestado', set_value('nmestado'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100116), 'nmpais', array('class'=> 'form-label'))?>
												<?=form_input('nmpais', set_value('nmpais'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="btn-box">
							<div class="row clearfix">
								<div id="actions" class="pull-right">
									<div id="btn_actions" class="col-sm-12">
										<?php if(empty($session_cdestabelecimento)) { ?>
											<?=form_button('btn_checkin', $this->lang->str(100144), array('class' => 'btn btn-success btn-lg waves-effect', 'onclick' => 'window.location.replace(\''.site_url($checkin_target).'\')')); ?>
										<?php }?>
										<?=form_reset('cancel', $this->lang->str(100053), array('class' => 'btn btn-warning btn-cancel btn-lg waves-effect', 'onclick' => 'history.go(-1);')); ?>
									</div>
								</div>	
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
				$.each($(':input:not(button)'), function(){
					if(empty($(this).val()))
						$(this).parent().parent().parent().hide();
					
					$(this).parent().removeClass('form-line');
				});
				
			});	
		</script>
	</body>
</html>
		