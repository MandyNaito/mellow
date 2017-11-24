<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>			
				<div class="card">
					<div class="header  bg-pink">
						<h2><?=$title;?></h2>
					</div>
					<div class="body">
						<div class="row clearfix">
							<div class="col-md-offset-4 col-md-4 col-xs-12">
								<?=img(base_url($qrcode), false, array('id' => 'qrcode', 'class' => 'qrcode'));?>												
							</div>
						</div>
					</div>
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
