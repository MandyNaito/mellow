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
								<?php if(!empty($urlnovo)){ ?>
									<ul class="header-dropdown m-r--5">
										<li class="dropdown">
											<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
												<i class="material-icons">more_vert</i>
											</a>
											<ul class="dropdown-menu pull-right">
												<li><a href="<?=$urlnovo;?>"><?=$this->lang->str(100030);?></a></li>
											</ul>
										</li>
									</ul>
								<?php } ?>
							</div>
							<div class="body">
								<div id="grid_table"></div>
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
			
			$(document).ready(function(){	
				$('.btn-inactive').prop('title', s_100134).off().click(function(){
					confirmClose($(this).attr('data-index'));
				});
			});	
			
			function confirmClose(id) {
				swal({
					title: s_100136,
					text: '',
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#FB483A",
					confirmButtonText: s_100134,
					closeOnConfirm: false
				}, function () {
					inactiveRegister(id)
				});
			}
		</script>
	</body>
</html>
