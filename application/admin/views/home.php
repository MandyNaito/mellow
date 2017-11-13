<!DOCTYPE HTML>
<html>
	<body>
		<section class="content">
			<div class="container-fluid">
				<div class="row clearfix">
					<div class="col-xs-12">
						<div class="card">
							<div class="body">
								<div class="carousel slide" data-ride="carousel">
									<div class="carousel-inner" role="listbox">
										<div class="item active">
										   <?=img('assets/images/background/'.CURRENT_APP.'.jpg')."\n";?>
											<div class="carousel-caption">
												<h3><?=$welcome?></h3>
												<p><?=$session_nmusuario;?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>