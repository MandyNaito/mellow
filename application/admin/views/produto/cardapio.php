<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>
				<?php foreach($data_tipoproduto as $key => $tipoproduto){ ?>
					<div class="block-header">
						<h2><?=$tipoproduto['nmtipoproduto'];?></h2>
					</div>
					<div class="row clearfix">
						<?php foreach($tipoproduto['produto'] as $k => $produto){ ?>
							<a href="<?=site_url($target).'/'.$produto['cdproduto'];?>">
								<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
									<div class="info-box-3 hover-zoom-effect  bg-<?=rand_card_colors($key);?>" title="<?=$produto['nmproduto'];?>">
										<div class="icon">
											<i class="material-icons"><?=rand_card_icons($key);?></i>
										</div>
										<div class="content">
											<div class="text"><?=str_pad($produto['cdproduto'], 5, '0', STR_PAD_LEFT);?> - <?=$produto['nmproduto'];?></div>
											<div class="number  currency-count-to">R$ <?=number_format(floatval($produto['vlproduto']), 2, ',', '.');?></div>
										</div>
									</div>
								</div>
							</a>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
		<script>
			controller 	= '<?=$controller;?>';
			site_url 	= '<?=site_url($controller);?>';
			base_url 	= '<?=base_url();?>';
		</script>
	</body>
</html>
