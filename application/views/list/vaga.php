<!DOCTYPE html>
<html lang="pt-br">
	<body> 
		<section class="global-page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="block">
							<h2><?=$title;?></h2>
						</div>
					</div>
				</div>
			</div>   
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="block">
							<h2 class="subtitle wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s"></h2>
							<div class="list-form">
								<form id="list-form" method="post" role="form">    

									<div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
										<div class="input-group">
											<input type="text" placeholder="<?=$this->lang->str(100020);?>" class="form-control" name="buscarapida" id="buscarapida">
											<span class="input-group-btn">
												<a class="btn btn-info" id="buscar" href="#" title="<?=$this->lang->str(100020);?>"><i class="glyphicon glyphicon-search"></i></a>
											</span>
										</div>
									</div>	   

									<?php if(!empty($urlnovo)){ ?>
									<div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
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
		</section>
		<script>
			site_url = '<?=site_url('vaga');?>';
			base_url = '<?=base_url();?>';
		</script>
	</body>
</html>
