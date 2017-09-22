<!DOCTYPE html>
<html lang="pt-br">
	<body> 
		
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2>#BREADCRUMB#</h2>
				</div>
				
				<!-- Input -->
				<div class="row clearfix">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="card">
							<div class="header">
								<h2>
								   <?=$this->lang->str(100093);?>
								</h2>
							</div>
							<div class="body">
								<h2 class="card-inside-title"></h2>
								
								<form id="usuario-form" method="post" action="<?=$target;?>" role="form">	
									<?=form_hidden('cdusuario', 		set_value('cdusuario', -1));?>
									<?=form_hidden('cdestabelecimento', set_value('cdestabelecimento'));?>
									<?=form_hidden('cdcliente', 		set_value('cdcliente'));?>
									<?=form_hidden('fgativo', 			set_value('fgativo', 1));?>
									<!--
										cdperfil
										blfoto
									-->
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group form-float">
													<div class="form-line">
														<?=form_input(array('name' => 'nmusuario','id' => 'nmusuario'), set_value('nmusuario'), array('class' => 'form-control','placeholder' => $this->lang->str(100019)))?>
														<?=form_error('nmusuario');?>
													</div>
												</div>
											</div>
										</div>			
										<div class="row clearfix">
											<div class="col-sm-12">
												<div class="form-group form-float">
													<div class="form-line">
														<?=form_input('idlogin', set_value('idlogin'), array('class' => 'form-control','placeholder' => $this->lang->str(100047)))?>
														<?=form_error('idlogin');?>
													</div>
												</div>
											</div>
										</div>	
										<div class="row clearfix">
											<div class="col-sm-4">
												<div class="form-group form-float">
													<div class="form-line">
														<?=form_password('idsenha', set_value('idsenha'), array('class' => 'form-control','placeholder' => $this->lang->str(100034)))?>
														<?=form_error('idsenha');?>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-float">
													<div class="form-line">	
														<?=form_password('idsenhaconfirm', set_value('idsenhaconfirm'), array('class' => 'form-control','placeholder' => $this->lang->str(100035)))?>
														<?=form_error('idsenhaconfirm');?>
													</div>
												</div>
											</div>
										</div>
										<div class="row clearfix">
											<div id="actions" class="pull-right">
												<div id="btn_actions" class="col-sm-12">
													<?=form_reset( 'cancel', $this->lang->str(100056), array('class' => 'btn btn-default btn-cancel waves-effect', 'onclick' => 'window.location.replace(\''.site_url('home').'\')')); ?>
													<?=form_button( 'btn_submit', $this->lang->str(100055), array('class' => 'btn btn-success waves-effect')); ?>
												</div>
											</div>	
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- #END# Input -->
				
			</div>
        </section>

		<script>
			var site_url = '<?=site_url($controller);?>';
			$(document).ready(function(){
				$( "#usuario-form" ).find("button[name='btn_submit']").on('click', function (e) {
					$('#usuario-form').submit(); 
				});
			});	
		</script>
	</body>
</html>
		