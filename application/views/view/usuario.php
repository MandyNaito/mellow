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
											<?=img($src = "assets/images/user-default.png", false, array('id' => 'img_bbfoto', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
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
												<?=form_label($this->lang->str(100013), 'nmusuario', array('class'=> 'form-label'))?>
												<?=form_input('idlogin', set_value('idlogin'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
										</div>
									</div>
								</div>		
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group">
											<?=form_label($this->lang->str(100009), 'cdperfil', array('class'=> 'form-label'))?>
											<?=form_dropdown(array('name' => 'cdperfil','id' => 'cdperfil', 'selected' => set_value('cdperfil'), 'data-value'=>set_value('cdperfil')), $list_perfil, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
										</div>
									</div>
								</div>

								<div class="row clearfix">
									<div id="actions" class="pull-right">
										<div id="btn_actions" class="col-sm-12">
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
	</body>
</html>
		