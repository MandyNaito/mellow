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
						 <ul class="header-dropdown m-r--5">
							<li>
								<a href="javascript:void(0);" onclick="verifyTab(true);" data-toggle="cardloading" data-loading-effect="pulse">
									<i class="material-icons">loop</i>
								</a>
							</li>
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="<?=site_url($target);?>"><?=$this->lang->str(100121);?></a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">
						<div class="row clearfix text-center">
							<div class="col-md-offset-4 col-md-4 col-xs-12">
								<?=img(base_url($qrcode), false, array('id' => 'qrcode', 'class' => 'qrcode'));?>
								<?=$nrcode;?>
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
			
			function verifyTab(bool) {
				$.ajax({
					url : site_url+'/../ajax/verifica_comanda/',
					dataType: 'json',
					beforeSend	: function () {
						$('.card').waitMe('hide');
					},
					success: function (response) {
						if( response.status === true )
							document.location.href = response.redirect;
					}
				});  
				
				if(empty(bool))
					setTimeout(verifyTab, 5000); 
			}

			$(document).ready(function() {
				setTimeout(verifyTab, 5000);
			});
		</script>
	</body>
</html>
