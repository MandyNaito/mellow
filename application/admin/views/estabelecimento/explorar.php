<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>
				<div class="row clearfix">
					<?php foreach($data_estabelecimento as $key => $estabelecimento){ ?>
						<a href="<?=site_url($target).'/'.$estabelecimento['cdestabelecimento'];?>">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="card-box hover-expand-effect" title="<?=$estabelecimento['nmfantasia'];?>">
									<div class="icon bg-<?=rand_card_colors($key);?>" style="background-image: url('<?=base_url((!empty($estabelecimento['txfoto']) ? $estabelecimento['txfoto'] : 'assets/images/business-default.png'));?>');"></div>
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
