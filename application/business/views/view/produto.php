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
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100077), 'cdtipoproduto', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdtipoproduto','id' => 'cdtipoproduto', 'selected' => set_value('cdtipoproduto')), $list_tipoproduto, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
											</div>
										</div>
										
										<?php if(empty($cdestabelecimento)) { ?>
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
											</div>
										</div>
										<?php } ?>
									</div>

									<div class="row clearfix">
										<div class="col-sm-8">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100066), 'nmproduto', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmproduto','id' => 'nmproduto'), set_value('nmproduto'), array('class' => 'form-control', 'disabled'=>''))?>
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100092), 'vlproduto', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'vlproduto','id' => 'vlproduto'), set_value('vlproduto'), array('class' => 'form-control moneyZero', 'disabled'=>''))?>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100080), 'dsproduto', array('class'=> 'form-label'))?>
													<?=form_textarea(array('name' => 'dsproduto','id' => 'dsproduto'), set_value('dsproduto'), array('class' => 'form-control no-resize', 'disabled' => ''))?>
												</div>
											</div>
										</div>
									</div>
									
									
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="input-group input-group-lg">
												<span class="input-group-addon">
													<?=form_checkbox(array('name' => 'fgalergenio','id' => 'fgalergenio'), 1, set_checkbox('fgalergenio', 1, !empty(set_value('fgalergenio'))), array('class' => 'filled-in chk-col-pink', 'disabled' => ''));?>
													<?=form_label('', 'fgalergenio', array('class'=> 'form-label'))?>
												</span>
												<?=form_label($this->lang->str(100008), 'cdalergenio', array('class'=> 'form-label'))?>
												<?=form_multiselect(array('name' => 'cdalergenio[]', 'id' => 'cdalergenio', 'selected' => set_value('cdalergenio[]', $list_alergenio)), $list_alergenio, array(), array('class' => 'ms', 'disabled' => ''));?>
											</div>
										</div>
									</div>
									
								<div class="row clearfix">
									<div id="actions" class="pull-right">
										<div id="btn_actions" class="col-sm-12">	
											<?=form_button('btn_edit', $this->lang->str(100039), array('class' => 'btn btn-success waves-effect', 'onclick' => 'window.location.replace(\''.site_url($controller).'/editar/'.$cdfield.'\')')); ?>
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
		