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
								<?php if(empty($session_cdestabelecimento)) { ?>
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group">
											<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
											<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick', 'disabled'=>''));?>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100066), 'nmtipoproduto', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmtipoproduto','id' => 'nmtipoproduto'), set_value('nmtipoproduto'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-12">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100080), 'dstipoproduto', array('class'=> 'form-label'))?>
												<?=form_textarea(array('name' => 'dstipoproduto','id' => 'dstipoproduto'), set_value('dstipoproduto'), array('class' => 'form-control no-resize', 'readonly'=>''))?>
											</div>
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
		