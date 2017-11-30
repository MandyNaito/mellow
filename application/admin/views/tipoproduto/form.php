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
								<?=form_open($target, array('id' => $controller.'-form', 'role' => 'form', 'accept-charset' => 'utf-8'));?>
									<?=form_hidden('cdtipoproduto', set_value('cdtipoproduto', -1));?>
									<?php if(empty($session_cdestabelecimento)) { ?>
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdestabelecimento');?>
											</div>
										</div>
									</div>
									<?php } else { ?>
										<?=form_hidden('cdestabelecimento', $session_cdestabelecimento);?>
									<?php } ?>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100066), 'nmtipoproduto', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmtipoproduto','id' => 'nmtipoproduto'), set_value('nmtipoproduto'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('nmtipoproduto');?>
											</div>
										</div>
									</div>
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100080), 'dstipoproduto', array('class'=> 'form-label'))?>
													<?=form_textarea(array('name' => 'dstipoproduto','id' => 'dstipoproduto'), set_value('dstipoproduto'), array('class' => 'form-control no-resize'))?>
												</div>
												<?=form_error('dstipoproduto');?>
											</div>
										</div>
									</div>
									
									<div class="row clearfix">
										<div id="actions" class="pull-right">
											<div id="btn_actions" class="col-sm-12">
												<?=form_reset('cancel', $this->lang->str(100044), array('class' => 'btn btn-default btn-cancel waves-effect', 'onclick' => 'history.go(-1)')); ?>
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
				$( "#"+controller+"-form" ).find("button[name='btn_submit']").on('click', function (e) {					 
					$('#'+controller+'-form').validate({
						highlight: function (input) {
							$(input).parents('.form-line').addClass('error');
						},
						unhighlight: function (input) {
							$(input).parents('.form-line').removeClass('error');
						},
						errorPlacement: function (error, element) {
							$(element).parents('.form-group').append(error);
						}
					});
					 
					$('#'+controller+'-form').submit(); 
				});
			});	
		</script>
	</body>
</html>
		