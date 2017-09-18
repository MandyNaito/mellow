<!DOCTYPE html>
<html lang="pt-br">
	<body> 
		<section class="global-page-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="block">
							<h2><?=$title;?></h2>
						</div>
					</div>
				</div>
			</div>   
		</section>
		
        <section>
            <div class="container content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="block">
                            <div class="usuario-form">
                                <form id="usuario-form" method="post" action="<?=$target;?>" role="form">	
									<?=form_hidden('cdusuario', set_value('cdusuario', -1));?>
									<div id="infoDadosLogin">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100093);?></h2>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100019), 'nmusuario', array('class'=> 'control-label'))?>
												<?=form_input(array('name' => 'nmusuario','id' => 'nmusuario'), set_value('nmusuario'), array('class' => 'form-control','placeholder' => $this->lang->str(100019)))?>
												<?=form_error('nmusuario');?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100047), 'idlogin', array('class'=> 'control-label'))?>
												<?=form_input('idlogin', set_value('idlogin'), array('class' => 'form-control','placeholder' => $this->lang->str(100047)))?>
												<?=form_error('idlogin');?>
											</div>
										</div>	
										<div class="row">
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100034), 'idsenha', array('class'=> 'control-label'))?>
												<?=form_password('idsenha', set_value('idsenha'), array('class' => 'form-control','placeholder' => $this->lang->str(100034)))?>
												<?=form_error('idsenha');?>
											</div>
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100035), 'idsenhaconfirm', array('class'=> 'control-label'))?>
												<?=form_password('idsenhaconfirm', set_value('idsenhaconfirm'), array('class' => 'form-control','placeholder' => $this->lang->str(100035)))?>
												<?=form_error('idsenhaconfirm');?>
											</div>
										</div>		      
									</div>
									
									<div class="row">
										<div class="col-sm-12 hidden-print fadeInDown">
											<div id="actions" class="row  pull-right">
												<div id="btn_actions" class="col-sm-12">
													<?=form_reset( 'cancel', $this->lang->str(100056), array('class' => 'btn btn-default btn-cancel', 'onclick' => 'window.location.replace(\''.site_url('home').'\')')); ?>
													<?=form_button( 'btn_submit', $this->lang->str(100055), array('class' => 'btn btn-success')); ?>
												</div>
											</div>
										</div>
									</div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
		