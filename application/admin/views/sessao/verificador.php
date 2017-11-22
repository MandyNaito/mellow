<!DOCTYPE html>
<html lang="pt-br">
	<body> 
        <section class="content">
            <div class="container-fluid">
				<div class="block-header">
					<h2><?=$this->breadcrumbs->show();?></h2>
				</div>
				<div class="row clearfix">
					<div class="col-xs-12">
						<?=form_open($target, array('id' => $controller.'-form', 'role' => 'form', 'accept-charset' => 'utf-8'));?>
							
							<input type="file" id="qrcode" name="qrcode" accept="image/*" capture="camera" />
							
							<div class="row clearfix">
								<div id="actions" class="pull-right">
									<div id="btn_actions" class="col-sm-12">
										<?=form_reset('cancel', $this->lang->str(100044), array('class' => 'btn btn-default btn-cancel waves-effect', 'onclick' => 'window.location.replace(\''.site_url($controller).'\')')); ?>
										<?=form_button('btn_submit', $this->lang->str(100068), array('class' => 'btn btn-success waves-effect')); ?>
									</div>
								</div>	
							</div>
						<?=form_close();?>
					</div>
				</div>
			</div>
		</section>
		<script>
			var site_url = '<?=site_url($controller);?>';
			var controller = '<?=$controller;?>';
			
			function qrCodeDecoder(){
				var imagem = $('#qrcode').attr('src');
			  
				qrcode.decode(imagem);
			 }
			
			$(document).ready(function(){		

					$('#qrcode').change(function() {
						
						var fr = new FileReader;
						
						fr.onload = function() {
							var img = new Image;
							
							img.src = fr.result;

							   $('<img style="border-radius:5px; border:1px #FFD42A solid; width:180px; height:180px;" id="imgs" src="'+img.src+'"/>').insertAfter('#cvs');
						};
						
						fr.readAsDataURL(this.files[0]);
						
					});
	   
					qrcode.callback = showInfo;
					$("button[name='btn_submit']").click(qrCodeDecoder); // a função click do botao tambem foi inserida aqui dentro!
	
			});	
		</script>
	</body>
</html>
