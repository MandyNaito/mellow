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
											<div class="form-line">
												<?=form_label($this->lang->str(100066), 'nmperfil', array('class'=> 'form-label'))?>
												<?=form_input(array('name' => 'nmperfil','id' => 'nmperfil'), set_value('nmperfil'), array('class' => 'form-control', 'readonly'=>''))?>
											</div>
										</div>
									</div>
								</div>
								<div class="row clearfix">
									<div class="col-sm-12">
										<?=form_label($this->lang->str(100013), 'fgpermissao', array('class'=> 'form-label'))?>
										<ul id="fgpermissao" class="list-tree">
										<?php
											if(!empty($list_menu)){
												foreach($list_menu as $cdmenupai => $menupai){
													$id 	= 'fgpermissao_'.$cdmenupai;			
													$name 	= 'fgpermissao['.$cdmenupai.']';			
													
													echo '<li>';												
													echo form_checkbox(array('id' => $id, 'name' => $name), 1, set_checkbox($id, 1, !empty(set_value($id))), array('class' => 'filled-in chk-col-pink', 'disabled'=>''));
													echo form_label($menupai['nmmenu'], $id, array('class'=> 'form-label'));														
													if(!empty($menupai['childs'])){
														echo '<ul>';
														foreach($menupai['childs'] as $cdmenu => $menu){
															$id		 = 'fgpermissao_'.$cdmenu;	
															$name	 = 'fgpermissao['.$cdmenu.']';			
															
															echo '<li>';													
															echo form_checkbox(array('id' => $id, 'name' => $name), 1, set_checkbox($id, 1, !empty(set_value($id))), array('class' => 'filled-in chk-col-orange', 'disabled'=>''));
															echo form_label($menu['nmmenu'], $id, array('class'=> 'form-label'));														
															echo '</li>';
														}
														echo '</ul>';
													}
													
													echo '</li>';
												}
											}
										?>
										</ul>
									</div>
								</div>
								<div class="row clearfix">
									<div id="actions" class="pull-right">
										<div id="btn_actions" class="col-sm-12">
											<?=form_reset('cancel', $this->lang->str(100053), array('class' => 'btn btn-warning btn-cancel waves-effect', 'onclick' => 'history.go(-1);')); ?>
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
			
			$(document).ready(function(){		
				$(".list-tree").tree({});
			});
		</script>
	</body>
</html>
		