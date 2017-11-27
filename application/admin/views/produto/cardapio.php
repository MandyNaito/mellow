<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>
				<div class="row clearfix">
					<?php foreach($data_produto as $key => $produto){ ?>
						<a href="<?=site_url($target).'/'.$produto['cdproduto'];?>">
							<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<div class="card-box hover-expand-effect" title="<?=$produto['nmproduto'];?>">
									<div class="content">
										<div class="text"><?=$produto['nmtipoproduto'];?></div>
										<div class="number"><?=$produto['vlproduto'];?></div>
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
