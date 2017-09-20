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
								   <?=$title;?>
								</h2>
							</div>
							<div class="body">
								<h2 class="card-inside-title"></h2>
								
								<div class="list-form">
									<form id="list-form" method="post" role="form"> 
										<div class="form-group">
											<div class="input-group">
												<input type="text" placeholder="<?=$this->lang->str(100020);?>" class="form-control" name="buscarapida" id="buscarapida">
												<span class="input-group-btn">
													<a class="btn btn-info" id="buscar" href="#" title="<?=$this->lang->str(100020);?>"><i class="glyphicon glyphicon-search"></i></a>
												</span>
											</div>
										</div>	   

										<?php if(!empty($urlnovo)){ ?>
											<div class="form-group">
												<a class="btn btn-info btn-md" href="<?=$urlnovo;?>" title="<?=$this->lang->str(100021);?>"><i class="fa fa-plus"> <?=$this->lang->str(100021);?></i></a> 
											</div>	
										<?php } ?>
										<hr />
										<div id="grid_table">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- #END# Input -->
				
			</div>
        </section>
		<script>
			site_url = '<?=site_url('usuario');?>';
			base_url = '<?=base_url();?>';
		</script>
	</body>
</html>
