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
                            <h2 class="subtitle fadeInDown"></h2>
                            <div class="candidato-form">
                                <form id="candidato-form" method="post" action="<?=$target;?>" role="form">	
									<?=form_hidden('ID', set_value('ID'));?>
									<div class="row">
										<div class="form-group col-md-2 fadeInDown">
											<?=form_label($this->lang->str(100110), 'post_id')?>
											<p id="post_id"><?=$id;?></p>
										</div>
										<div class="form-group col-md-7 fadeInDown">
											<?=form_label($this->lang->str(100019), 'post_title')?>
											<p id="post_title"><?=$post_title;?></p>
										</div>
										<div class="form-group col-md-3 fadeInDown">
											<?=form_label($this->lang->str(100084), 'post_date')?>
											<p id="post_date"><?=$post_date;?></p>

										</div>
									</div>
                                    <div class="form-group fadeInDown">
										<?=form_label($this->lang->str(100107), 'post_content')?>
										<p id="post_content" class="pre-view"><?=$post_content;?></p>
                                    </div>
									
									
									<div class="row">
										<div class="col-md-12 fadeInDown">
											<div id="actions" class="row pull-right">
												<div class="col-md-12">
													<?=form_reset( 'cancel', $this->lang->str(100092), array('class' => 'btn btn-warning btn-cancel', 'onclick' => 'window.location.replace(\''.site_url('vaga').'\')')); ?>
												</div>
											</div>
										</div>
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
