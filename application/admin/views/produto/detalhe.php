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
							<div class="header bg-cyan">
								<h2>
									<?=str_pad(set_value('cdproduto'), 5, '0', STR_PAD_LEFT);?> - <?=set_value('nmproduto');?>
									<small><?=set_value('nmtipoproduto');?></small>
								</h2>
							</div>
							<div class="body">
								<h2 class="card-inside-title"></h2>
								<div class="row clearfix">
									<div class="col-sm-4">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100092), 'vlproduto', array('class'=> 'form-label'));?>
												<?=form_input('vlproduto', set_value('vlproduto'), array('class' => 'form-control', 'disabled'=>''))?>
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
								
								<?php if(!empty($alergenios)){?>
								<h2 class="card-inside-title">
										<small><?=$this->lang->str(100133);?></small>
									<?php foreach($alergenios as $key => $alergenio){?>
										<span class="label bg-<?=rand_card_colors($key);?>"><?=$alergenio['nmalergenio'];?></span>
									<?php }?>
								</h2>
								<?php }?>
							</div>
						</div>
						<div class="btn-box">
							<div class="row clearfix">
								<div id="actions" class="pull-right">
									<div id="btn_actions" class="col-sm-12">
										<?=form_reset('cancel', $this->lang->str(100053), array('class' => 'btn btn-warning btn-cancel btn-lg waves-effect', 'onclick' => 'history.go(-1);')); ?>
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
		