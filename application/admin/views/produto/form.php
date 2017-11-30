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
									<?=form_hidden('cdproduto', set_value('cdproduto', -1));?>
									
									
									<div class="row clearfix">
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100077), 'cdtipoproduto', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdtipoproduto','id' => 'cdtipoproduto', 'selected' => set_value('cdtipoproduto')), $list_tipoproduto, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdtipoproduto');?>
											</div>
										</div>
										<?php if(empty($session_cdestabelecimento)) { ?>
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100002), 'cdestabelecimento', array('class'=> 'form-label'))?>
												<?=form_dropdown(array('name' => 'cdestabelecimento','id' => 'cdestabelecimento', 'selected' => set_value('cdestabelecimento')), $list_estabelecimento, array(), array('class' => 'form-control show-tick', 'required'=>''));?>
												<?=form_error('cdestabelecimento');?>
											</div>
										</div>
										<?php } else { ?>
											<?=form_hidden('cdestabelecimento', $session_cdestabelecimento);?>
										<?php } ?>
									</div>

									<div class="row clearfix">
										<div class="col-sm-8">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100066), 'nmproduto', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'nmproduto','id' => 'nmproduto'), set_value('nmproduto'), array('class' => 'form-control', 'required'=>''))?>
												</div>
												<?=form_error('nmproduto');?>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100092), 'vlproduto', array('class'=> 'form-label'))?>
													<?=form_input(array('name' => 'vlproduto','id' => 'vlproduto'), set_value('vlproduto'), array('class' => 'form-control moneyZero', 'required'=>''))?>
												</div>
												<?=form_error('vlproduto');?>
											</div>
										</div>
									</div>
									
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="form-group form-float">
												<div class="form-line">
													<?=form_label($this->lang->str(100080), 'dsproduto', array('class'=> 'form-label'))?>
													<?=form_textarea(array('name' => 'dsproduto','id' => 'dsproduto'), set_value('dsproduto'), array('class' => 'form-control no-resize'))?>
												</div>
												<?=form_error('dsproduto');?>
											</div>
										</div>
									</div>
									
									
									<div class="row clearfix">
										<div class="col-sm-12">
											<div class="input-group input-group-lg">
												<span class="input-group-addon">
													<?=form_checkbox(array('name' => 'fgalergenio','id' => 'fgalergenio'), 1, set_checkbox('fgalergenio', 1, !empty(set_value('fgalergenio'))), array('class' => 'filled-in chk-col-pink'));?>
													<?=form_label('', 'fgalergenio', array('class'=> 'form-label'))?>
												</span>
												<?=form_label($this->lang->str(100008), 'cdalergenio', array('class'=> 'form-label'))?>
												<?=form_multiselect(array('name' => 'cdalergenio[]', 'id' => 'cdalergenio', 'selected' => set_value('cdalergenio[]', $list_alergenio)), $list_alergenio, array(), array('class' => 'ms'));?>
											
												<?=form_error('fgalergenio');?>
												<?=form_error('cdalergenio');?>
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
				$("#fgalergenio").change(function () {
					var checked = $(this).is(":checked");
					$('#cdalergenio').prop('disabled', (!checked));
					
					if(!checked)
						$('#cdalergenio').val('');
						
					$('#cdalergenio').multiSelect('refresh');
				}).change();
	
				$( "#"+controller+"-form" ).find("button[name='btn_submit']").on('click', function (e) {
					$.validator.addMethod("valueNotEquals", function(value, element, arg){
						return arg !== value;
					}, s_100074);
					
					$( "#"+controller+"-form" ).validate({
						rules: {
							'cdtipoproduto': {
								valueNotEquals: '0'
							}
						},
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
					
					$.each($(".moneyZero"), function(){
						var value = $(this).maskMoney('unmasked')[0];
						$(this).val(value);
					});
					 
					$( "#"+controller+"-form" ).submit(); 
				});
			});	
		</script>
	</body>
</html>
		