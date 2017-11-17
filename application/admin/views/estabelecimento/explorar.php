<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>
				<div class="row clearfix">
					<?php foreach($data_estabelecimento as $estabelecimento){ ?>
						<a href="<?=site_url($controller).'/visualizar/'.$estabelecimento['cdestabelecimento'];?>">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="card-box hover-expand-effect">
									<div class="icon" style="background-image: url('<?=(!empty($estabelecimento['txfoto']) ? base_url($estabelecimento['txfoto']) : 'assets/images/business-default.png')?>');"></div>
									<div class="content">
										<div class="text"><?=$estabelecimento['nmtipoestabelecimento'];?></div>
										<div class="title"><?=$estabelecimento['nmfantasia'];?></div>
									</div>
								</div>
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
		</section>
		<script>
			controller 	= '<?=$controller;?>';
			site_url 	= '<?=site_url($controller);?>';
			base_url 	= '<?=base_url();?>';
		</script>
	</body>
</html>
