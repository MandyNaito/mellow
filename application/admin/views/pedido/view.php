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
								<h2><?=$title;?></h2>
							</div>
							<div class="body">
								<div class="row clearfix">
									<?php if(empty($session_cdestabelecimento)) { ?>
										<div class="col-sm-6">
											<div class="form-group">
												<?=form_label($this->lang->str(100002), 'nmestabelecimento', array('class'=> 'form-label'))?>
												<?=form_input('nmestabelecimento', set_value('nmestabelecimento'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									<?php }  ?>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100004), 'nmusuario', array('class'=> 'form-label'))?>
												<?=form_input('nmusuario', set_value('nmusuario'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row clearfix">
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100122), 'dtentrada', array('class'=> 'form-label'))?>
												<?=form_datetime('dtentrada', set_value('dtentrada'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group form-float">
											<div class="form-line">
												<?=form_label($this->lang->str(100123), 'dtsaida', array('class'=> 'form-label'))?>
												<?=form_datetime('dtsaida', set_value('dtsaida'), array('class' => 'form-control', 'disabled'=>''))?>
											</div>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
						<div class="card">
							<div class="header">
								<h2><?=$this->lang->str(100126);?></h2>
							</div>
							<div id="grid_extrato"></div>
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

		<script>
			var site_url 	= '<?=site_url($controller);?>';
			var controller 	= '<?=$controller;?>';
			var cdcomanda 	= '<?=$cdfield;?>';

			$(document).ready(function(){	
				$.each($(':input:not(button)'), function(){
					if(empty($(this).val()))
						$(this).parent().parent().parent().hide();
					
					$(this).parent().removeClass('form-line');
				});
				
				getExtrato();
				
			});	
			
			function getExtrato(){
				$.ajax({
					url : site_url+'/childGrid/pedido/'+cdcomanda,
					dataType: 'json', 
					data: request,
					success: function (response) {
						if(response.status)
						{
							$("#grid_extrato").html(response.data);
							$('.grid_datatable').DataTable({
								responsive: true,
								columnDefs: [
								   { orderable: false, targets: -1 }
								],
								"language": {
									"sEmptyTable": s_100054,
									"sInfo": s_100014,
									"sInfoEmpty": s_100015,
									"sInfoFiltered": s_100016,
									"sInfoPostFix": "",
									"sInfoThousands": ".",
									"sLengthMenu": s_100017,
									"sLoadingRecords": s_100018,
									"sProcessing": s_100019,
									"sZeroRecords": s_100054,
									"sSearch": s_100020,
									"oPaginate": {
										"sNext": s_100021,
										"sPrevious": s_100022,
										"sFirst": s_100023,
										"sLast": s_100024
									},
									"oAria": {
										"sSortAscending": s_100025,
										"sSortDescending": s_100026
									}
								}
							});
						}
					},
					error: function (response) {
						console.log('error');
					}
			   }); 
			}
		</script>
	</body>
</html>
		