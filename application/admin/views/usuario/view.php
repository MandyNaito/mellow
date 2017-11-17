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
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<?=img(set_value('txfoto', 'assets/images/user-default.png'), false, array('id' => 'img_txfoto', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100066), 'nmusuario', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmusuario','id' => 'nmusuario'), set_value('nmusuario'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
										</div>
									</div>
								</div>		
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100093), 'nmusuario', array('class'=> 'form-label'))?>
												<?=form_input('idlogin', set_value('idlogin'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group">
											<?=form_label($this->lang->str(100009), 'cdperfil', array('class'=> 'form-label'))?>
											<?=form_dropdown(array('name' => 'cdperfil','id' => 'cdperfil', 'selected' => set_value('cdperfil')), $list_perfil, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
										</div>
									</div>
								
									<div id="informacaoEstabelecimento">
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
												<?=form_error('cdestabelecimento');?>
											</div>
										</div>
									</div>
								</div>
								
								<h2 class="card-inside-title"><?=$this->lang->str(100104);?></h2>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100107), 'idcpf', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idcpf','id' => 'idcpf'), set_value('idcpf'), array('class' => 'form-control cpf', 'readonly' => ''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100106), 'idrg', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idrg','id' => 'idrg'), set_value('idrg'), array('class' => 'form-control'))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100105), 'dtnascimento', array('class'=> 'form-label'))?>
												<?=form_date(array('name' => 'dtnascimento','id' => 'dtnascimento'), set_value('dtnascimento'), array('class' => 'form-control', 'readonly' => ''))?>
											</div>
										</div>
									</div>
								</div>
								
								<h2 class="card-inside-title"><?=$this->lang->str(100103);?></h2>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100082), 'idtelefone', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idtelefone','id' => 'idtelefone'), set_value('idtelefone'), array('class' => 'form-control phone', 'readonly' => ''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100083), 'idcelular', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idcelular','id' => 'idcelular'), set_value('idcelular'), array('class' => 'form-control cellphone', 'readonly' => ''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100084), 'nmemail', array('class'=> 'form-label'))?>
												<?=form_email(array('name' => 'nmemail','id' => 'nmemail'), set_value('nmemail'), array('class' => 'form-control email', 'readonly' => ''))?>
											</div>
										</div>
									</div>
								</div>

								<div class="row clearfix">
									<div id="actions" class="pull-right">
										<div id="btn_actions" class="col-sm-12">
											<?=form_button('btn_edit', $this->lang->str(100039), array('class' => 'btn btn-success waves-effect', 'onclick' => 'window.location.replace(\''.site_url($edit_target).'\')')); ?>
											<?=form_reset('cancel', $this->lang->str(100053), array('class' => 'btn btn-warning btn-cancel waves-effect', 'onclick' => 'window.location.replace(\''.site_url($controller).'\')')); ?>
										</div>
									</div>	
								</div>								
							</div>
						</div>
					</div>
				</div>
			</div>
        </section>
		<script>
			$(document).ready(function(){				
				$('#cdperfil').on('change', function() {
					$('#cdestabelecimento').parent().parent().toggle($('#cdperfil').val() == 2 || $('#cdperfil').val() == 3);						
				}).change();
			});	
		</script>
	</body>
</html>
		