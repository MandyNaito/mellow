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
											<?=img(set_value('txfoto', 'assets/images/business-default.png'), false, array('id' => 'img_txfoto', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group">
											<?=form_label($this->lang->str(100077), 'cdtipoestabelecimento', array('class'=> 'form-label'))?>
											<?=form_dropdown(array('name' => 'cdtipoestabelecimento','id' => 'cdtipoestabelecimento', 'selected' => set_value('cdtipoestabelecimento'), 'data-value'=>set_value('cdtipoestabelecimento')), $list_tipoestabelecimento, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
										</div>
									</div>
								</div>

								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100078), 'nmrazaosocial', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmrazaosocial','id' => 'nmrazaosocial'), set_value('nmrazaosocial'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
											<?=form_error('nmrazaosocial');?>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100079), 'nmfantasia', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmfantasia','id' => 'nmfantasia'), set_value('nmfantasia'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
											<?=form_error('nmfantasia');?>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100081), 'idcnpj', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idcnpj','id' => 'idcnpj'), set_value('idcnpj'), array('class' => 'form-control cnpj', 'readonly'=>''))?>
											</div>
											<?=form_error('idcnpj');?>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100080), 'dsestabelecimento', array('class'=> 'form-label'))?>
												<?=form_textarea(array('name' => 'dsestabelecimento','id' => 'dsestabelecimento'), set_value('dsestabelecimento'), array('class' => 'form-control no-resize', 'readonly' => ''))?>
											</div>
											<?=form_error('dsestabelecimento');?>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100082), 'idtelefone', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idtelefone','id' => 'idtelefone'), set_value('idtelefone'), array('class' => 'form-control phone', 'readonly'=>''))?>
											</div>
											<?=form_error('idtelefone');?>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100083), 'idcelular', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'idcelular','id' => 'idcelular'), set_value('idcelular'), array('class' => 'form-control cellphone', 'readonly'=>''))?>
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
												<?=form_input(array('name' => 'nmemail','id' => 'nmemail'), set_value('nmemail'), array('class' => 'form-control email', 'readonly'=>''))?>
											</div>
											<?=form_error('nmemail');?>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100085), 'nmsite', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmsite','id' => 'nmsite'), set_value('nmsite'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
											<?=form_error('nmsite');?>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100086), 'nrcapacidade', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nrcapacidade','id' => 'nrcapacidade'), set_value('nrcapacidade'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
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

		<script>
			var site_url = '<?=site_url($controller);?>';
			var controller = '<?=$controller;?>';
		</script>
	</body>
</html>
		