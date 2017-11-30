<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>			
				
				<?=form_open($target, array('id' => $controller.'-form', 'role' => 'form', 'accept-charset' => 'utf-8'));?>
					<?=form_hidden('qrtoken', set_value('qrtoken'));?>
					<div class="card">
						<div class="header bg-cyan">
							<h2><?=$title;?></h2>
						</div>
						<div class="body">
							<div class="row clearfix text-center">
								<div class="col-md-offset-4 col-md-4 col-xs-12">		
									<?=form_upload(array('name' => 'qrcode', 'id' => 'qrcode'),set_value('qrcode'), array('placeholder' => $this->lang->str(100087),'class' => 'hidden', 'enabled' => true, 'accept' => 'image/*', 'onchange' => 'readURL(this);'));?>
									<?=img(set_value('qrcode', 'assets/images/qrcode-default.png'), false, array('id' => 'img_qrcode', 'class' => 'user-profile-photo img-thumbnail zoom-in', 'title' => $this->lang->str(100087)));?>
									<?=form_error('qrcode');?>
								</div>
							</div>
							<div class="row clearfix text-center">
								<div class="col-md-offset-4 col-md-4 col-xs-12">
									<div class="form-group form-float">
										<div class="form-line">
											<?=form_label($this->lang->str(100138), 'nrcode', array('class'=> 'form-label'))?>
											<?=form_input('nrcode', set_value('nrcode'), array('class' => 'form-control'))?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="btn-box">
						<div class="row clearfix">
							<div id="actions" class="pull-right">
								<div id="btn_actions" class="col-sm-12">
									<?=form_reset('cancel', $this->lang->str(100044), array('class' => 'btn btn-warning btn-cancel btn-lg waves-effect', 'onclick' => 'history.go(-1);')); ?>
									<?=form_button('btn_submit', $this->lang->str(100068), array('class' => 'btn btn-success btn-lg waves-effect')); ?>
								</div>
							</div>	
						</div>	
					</div>
				<?=form_close();?>
			</div>
		</section>
		
		<?=script_tag('assets/plugins/jsqrcode/grid.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/version.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/detector.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/formatinf.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/errorlevel.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/bitmat.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/datablock.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/bmparser.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/datamask.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/rsdecoder.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/gf256poly.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/gf256.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/decoder.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/qrcode.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/findpat.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/alignpat.js')."\n";?>
		<?=script_tag('assets/plugins/jsqrcode/databr.js')."\n";?>
		
		<script>
			var site_url = '<?=site_url($controller);?>';
			var controller = '<?=$controller;?>';
			
			function readQRCode(data){
				$('#qrtoken').val(data);
			}
			
			$(document).ready(function(){			
				qrcode.callback = readQRCode;
				
				$('#img_qrcode').on('click', function() {
					$('#qrcode').click();
				});	
				
				$( "#"+controller+"-form" ).find("button[name='btn_submit']").on('click', function (e) {
					$( "#"+controller+"-form" ).validate({
						rules: {
						},
						highlight: function (input) {
							$(input).parents('.form-line').addClass('error');
							$(input).parents('.form-control').addClass('error');
						},
						unhighlight: function (input) {
							$(input).parents('.form-line').removeClass('error');
							$(input).parents('.form-control').removeClass('error');
						},
						errorPlacement: function (error, element) {
							$(element).parents('.form-group').append(error);
						}
					});
					 
					$( "#"+controller+"-form" ).submit(); 
				});
			});	
			
			
			function readURL(input){
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#img_qrcode').attr('src', e.target.result);
						qrcode.decode(e.target.result);
					};

					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>
	</body>
</html>
