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
								<div id="grid_historico">
									<?=$grid_historico;?>
								</div>
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
				$('.grid_datatable').DataTable({
					responsive: true,
					columnDefs: [
					   { orderable: false, targets: -1 }
					],
					"language": {
						"sEmptyTable": s_100054,
						"sInfo": s_100014,
						"sInfoEmpty": s_100015,
						"sInfoFiltered": s_100016,
						"sInfoPostFix": "",
						"sInfoThousands": ".",
						"sLengthMenu": s_100017,
						"sLoadingRecords": s_100018,
						"sProcessing": s_100019,
						"sZeroRecords": s_100054,
						"sSearch": s_100020,
						"oPaginate": {
							"sNext": s_100021,
							"sPrevious": s_100022,
							"sFirst": s_100023,
							"sLast": s_100024
						},
						"oAria": {
							"sSortAscending": s_100025,
							"sSortDescending": s_100026
						}
					}
				});
				
				btnGrid();				
			});
		</script>
	</body>
</html>
