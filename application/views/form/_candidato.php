<!DOCTYPE html>
<html lang="pt-br">
	<body> 
		<section class="global-page-header">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="block">
							<h2><?=$title;?></h2>
						</div>
					</div>
				</div>
			</div>   
		</section>
		
        <section>
            <div class="container content">
				<?php if(!empty($idvaga)){?>
				<div class="row">
                    <div class="col-sm-12">
						<h2 class="subtitle fadeInDown"><?=$this->lang->str(100072);?></h2>
						<div class="panel panel-success">
							<div class="panel-heading"><?=$nmvaga;?></div>
							<div class="panel-body"><?=$dsvaga;?></div>
						</div>
					</div>
				</div>
				<?php }?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="block">
                            <div class="candidato-form">
                                <form id="candidato-form" method="post" action="<?=$target;?>" role="form">	
									<?=form_hidden('cdcandidato', set_value('cdcandidato', -1));?>
									<?=form_hidden('dtcadastro', set_value('dtcadastro'));?>
									
									<div id="infoVaga">
										<div class="row">
											<?php if(empty($fgvaga)){?>
												<?=form_hidden('idvaga', set_value('idvaga'));?>
											<?php } else{?>
												<div class="form-group col-sm-12 fadeInDown">
													<?=form_label($this->lang->str(100072), 'idvaga')?>
													<?=form_dropdown(array('name' => 'idvaga','id' => 'idvaga', 'selected' => set_value('idvaga'), 'data-value'=>set_value('idvaga')), $list_vaga, array(), array('class' => 'form-control'))?>
													<?=form_error('idvaga');?>
												</div>
											<?php }?>
										</div>
									</div>
									<div id="infoDadosPessoais">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100093);?></h2>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100031), 'nmcandidato', array('class'=> 'control-label'))?>
												<?=form_input(array('name' => 'nmcandidato','id' => 'nmcandidato'), set_value('nmcandidato'), array('class' => 'form-control','placeholder' => $this->lang->str(100031)))?>
												<?=form_error('nmcandidato');?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100033), 'dtnascimento')?>
												<?=form_input(array('name' => 'dtnascimento','id' => 'dtnascimento'), set_value('dtnascimento'), array('class' => 'form-control date','placeholder' => $this->lang->str(100033)))?>
												<?=form_error('dtnascimento');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100046), 'idcpf')?>
												<?=form_input(array('name' => 'idcpf','id' => 'idcpf'), set_value('idcpf'), array('class' => 'form-control cpf','placeholder' => $this->lang->str(100046)))?>
												<?=form_error('idcpf');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100045), 'idrg')?>
												<?=form_input(array('name' => 'idrg','id' => 'idrg'), set_value('idrg'), array('class' => 'form-control','placeholder' => $this->lang->str(100045)))?>
												<?=form_error('idrg');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100094), 'fggenero')?>
												<?=form_dropdown(array('name' => 'fggenero','id' => 'fggenero', 'selected' => set_value('fggenero'), 'data-value'=>set_value('fggenero')),  array('1'=> 'Feminino','2'=> 'Masculino'), array(), array('class' => 'form-control'))?>
												<?=form_error('fggenero');?>
											</div>
										</div>									
										<div class="row">
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100095), 'cdnacionalidade')?>
												<?=form_dropdown(array('name' => 'cdnacionalidade','id' => 'cdnacionalidade', 'selected' => set_value('cdnacionalidade'), 'data-value'=>set_value('cdnacionalidade')), $list_nacionalidade, array(), array('class' => 'form-control'))?>
												<?=form_error('cdnacionalidade');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100096), 'cdestadocivil')?>
												<?=form_dropdown(array('name' => 'cdestadocivil','id' => 'cdestadocivil', 'selected' => set_value('cdestadocivil'), 'data-value'=>set_value('cdestadocivil')), $list_estadocivil, array(), array('class' => 'form-control'))?>
												<?=form_error('cdestadocivil');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100127), 'cdhabilitacao')?>
												<?=form_dropdown(array('name' => 'cdhabilitacao','id' => 'cdhabilitacao', 'selected' => set_value('cdhabilitacao'), 'data-value'=>set_value('cdhabilitacao')), $list_habilitacao, array(), array('class' => 'form-control'))?>
												<?=form_error('cdhabilitacao');?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100097), 'nrfilho')?>
												<?=form_input(array('name' => 'nrfilho','id' => 'nrfilho'), set_value('nrfilho'), array('class' => 'form-control','placeholder' => $this->lang->str(100097)))?>
												<?=form_error('nrfilho');?>
											</div>
										</div>        
									</div>
									
									<div id="infoEndereco">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100054);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100010), 'nmestado')?>											
												<?=form_input(array('name' => 'nmestado','id' => 'nmestado'), set_value('nmestado'), array('class' => 'form-control','placeholder' => $this->lang->str(100010)))?>
												<?=form_error('nmestado');?>
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100011), 'nmcidade')?>
												<?=form_input(array('name' => 'nmcidade','id' => 'nmcidade'), set_value('nmcidade'), array('class' => 'form-control','placeholder' => $this->lang->str(100011)))?>
												<?=form_error('nmcidade');?>
											</div>
										</div>
									</div>
									
									<div id="infoContato">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100098);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100048), 'nrtelefone')?>
												<?=form_input(array('name' => 'nrtelefone','id' => 'nrtelefone'), set_value('nrtelefone'), array('class' => 'form-control phone','placeholder' => $this->lang->str(100048)))?>
												<?=form_error('nrtelefone');?>
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100049), 'nrcelular')?>
												<?=form_input(array('name' => 'nrcelular','id' => 'nrcelular'), set_value('nrcelular'), array('class' => 'form-control cellphone','placeholder' => $this->lang->str(100049)))?>
												<?=form_error('nrcelular');?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100032), 'nmemail')?>
												<?=form_email(array('name' => 'nmemail','id' => 'nmemail'), set_value('nmemail'), array('class' => 'form-control email','placeholder' => $this->lang->str(100032)))?>
												<?=form_error('nmemail');?>
											</div>
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100118), 'nmskype')?>
												<?=form_input(array('name' => 'nmskype','id' => 'nmskype'), set_value('nmskype'), array('class' => 'form-control','placeholder' => $this->lang->str(100118)))?>
												<?=form_error('nmskype');?>
											</div>
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100119), 'nmlinkedin')?>
												<?=form_input(array('name' => 'nmlinkedin','id' => 'nmlinkedin'), set_value('nmlinkedin'), array('class' => 'form-control','placeholder' => $this->lang->str(100119)))?>
												<?=form_error('nmlinkedin');?>
											</div>
										</div>
									</div>

									<div id="infoObjetivo">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100099);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100116), 'cdpretensao')?>
												<?=form_dropdown(array('name' => 'cdpretensao','id' => 'cdpretensao', 'selected' => set_value('cdpretensao'), 'data-value'=>set_value('cdpretensao')), $list_pretensao, array(), array('class' => 'form-control'))?>
												<?=form_error('cdpretensao');?>
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100117), 'cdtipocontrato')?>
												<?=form_dropdown(array('name' => 'cdtipocontrato','id' => 'cdtipocontrato', 'selected' => set_value('cdtipocontrato'), 'data-value'=>set_value('cdtipocontrato')), $list_tipocontrato, array(), array('class' => 'form-control'))?>
												<?=form_error('cdtipocontrato');?>
											</div>
										</div>
									</div>

									<div id="infoFormacao">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100100);?></h2>
										<div id="listFormacaoAcademica" class="list-group"></div>
									</div>
									
									<div id="infoExperiencia">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100101);?></h2>
										<div id="listExperienciaProfissional" class="list-group"></div>
									</div>
									
									<div id="infoQualificacao">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100102);?></h2>
										<div id="listQualificacao" class="list-group"></div>										
									</div>
									
									<div id="infoIdioma">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100103);?></h2>
										<div id="listIdioma" class="list-group"></div>
									</div>
									
									<div id="infoComplementar">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100104);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<div class="checkbox">
													<?=form_label(form_checkbox(array('name' => 'fgviajar','id' => 'fgviajar'),1, set_checkbox('fgviajar', 1, !empty(set_value('fgviajar')))).$this->lang->str(100126), 'fgviajar');?>
													<?=form_error('fgviajar');?>
												</div>
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<div class="checkbox">
													<?=form_label(form_checkbox(array('name' => 'fgmudar','id' => 'fgmudar'), 1, set_checkbox('fgmudar', 1, !empty(set_value('fgmudar')))).$this->lang->str(100125), 'fgmudar')?>
													<?=form_error('fgmudar');?>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100124), 'fgdeficiencia')?>
												<div class="input-group">
													<span class="input-group-addon">
														<?=form_checkbox(array('name' => 'fgdeficiencia','id' => 'fgdeficiencia'), 1, set_checkbox('fgdeficiencia', 1, !empty(set_value('fgdeficiencia'))));?>
													</span>
													<?=form_input(array('name' => 'nmdeficiencia','id' => 'nmdeficiencia'), set_value('nmdeficiencia'), array('class' => 'form-control','placeholder' => $this->lang->str(100139)))?>
												</div>
												<?=form_error('fgdeficiencia');?>
												<?=form_error('nmdeficiencia');?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100123), 'txcurso');?>
												<?=form_textarea(array('name' => 'txcurso','id' => 'txcurso'), set_value('txcurso'), array('class' => 'form-control','placeholder' => $this->lang->str(100123)))?>
												<?=form_error('txcurso');?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100122), 'txinformacao')?>
												<?=form_textarea(array('name' => 'txinformacao','id' => 'txinformacao'), set_value('txinformacao'), array('class' => 'form-control','placeholder' => $this->lang->str(100122)))?>
												<?=form_error('txinformacao');?>
											</div>
										</div>
									</div>
									
									<div id="infoReferencia">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100105);?></h2>
										<div id="listReferencia" class="list-group"></div>
									</div>
									
									<div class="row">
										<div class="col-sm-12 hidden-print fadeInDown">
											<div id="actions" class="row  pull-right">
												<div id="btn_actions" class="col-sm-12">
													<?=form_reset( 'cancel', $this->lang->str(100056), array('class' => 'btn btn-default btn-cancel', 'onclick' => 'window.location.replace(\''.site_url($controller).'\')')); ?>
													<?=form_button( 'btn_submit', $this->lang->str(100055), array('class' => 'btn btn-success')); ?>
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
			var listaIdioma 	= <?=json_encode($list_idioma);?>;
			var listaNivel	 	= <?=json_encode($list_nivel);?>;
			var listaCargo	 	= <?=json_encode($list_cargo);?>;
			var listaGrau	 	= <?=json_encode($list_grau);?>;
			var listaSegmento	= <?=json_encode($list_segmento);?>;
			
			var site_url 		= '<?=site_url($controller);?>';
			var formacao 		= [];
			var experiencia		= [];
			var qualificacao 	= [];
			var idioma 			= [];
			var referencia 		= [];
			
			function loadCombo(obj, model, param){
				if(typeof param == 'undefined')
					param = {};
				
				$.ajax({
					url:  site_url+'/combolist/'+model,
					dataType: 'json', 
					async: false,
					data: param,
				}).
				done(function (data) {
					if(data.status){
						var str = "";
						$.each(data.records, function(k,v){
							str += "<option value='"+k+"' "+(k == $(obj).attr('data-value') ? "selected" : '')+">"+v+"</option>";
						});
						$(obj).html(str);
					}
				});
			}
			
			function loadComboList(obj, list){
				var str = "";
				$.each(list, function(k,v){
					str += "<option value='"+k+"' "+(k == $(obj).attr('data-value') ? "selected" : '')+">"+v+"</option>";
				});
				$(obj).html(str);
			}

			function prepareDataTable(nmArray){
				var arr = eval(nmArray);
				$.ajax({
					method: "POST",
					dataType: 'json', 
					url:  site_url+'/childData/'+nmArray,
					data:{
						cdcandidato: $('#cdcandidato').val()
					}
				}).
				done(function (data) {
					if(data.status)
					{
						$.each(data.records, function(index, value){
							arr.push(value);
						});
					}
					
					dataTable(nmArray);
				});
			}
			
			function dataTable(nmArray){
				eval('dataTable'+ucfirst(nmArray)+'();');
			}
			
			function removeDataTable(id, nmArray){
				var key = '';
				var arr = eval(nmArray);
				$.each(arr, function(k, v){
					var name = (nmArray == 'idioma') ? 'candidato_idioma' : nmArray;
					if(eval("v.cd"+name) == id)
						key = k;
				});
				
				arr.splice(key, 1);
				
				$('#modal_div .close').click();
				
				eval('dataTable'+ucfirst(nmArray)+'();');
			}
			
			function saveFormModal(key, functionName){
				
				var validou = verifyRequired($('#frmModal'));
				if(validou)
					validou = verifyMail($('#frmModal'));
				
				if(validou){
					functionName(key, objectifyForm(formValue($("#frmModal"), true)));
					$('#modal_div .close').click();
				}
			}
			
			function getBtnModal(id, key, fgnew, functionAdd, model){
				var btn = [];
				
				if(!fgnew)
					btn.push({label:"<?=$this->lang->str(100024);?>", className:"btn-danger", onclick: "removeDataTable('"+id+"', '"+model+"')"});
				btn.push({label:"<?=$this->lang->str(100115);?>", className:"btn-default", onclick:'', attributes:{ 'data-dismiss': 'modal'}});
				btn.push({label:"<?=$this->lang->str(100055);?>", className:"btn-success", onclick: "saveFormModal('"+key+"', "+functionAdd+");"});

				return btn;
			}
			
			
			function addDataTableFormacao(key, data){
				if(key !== '')
					formacao[key] = data;
				else
					formacao.push(data);
				dataTable('formacao');
			}
			
			function dataTableFormacao() {
				
				$('#listFormacaoAcademica').find('a').click(function(){
					modalFormacao();
				});

				html = "";
				if(formacao.length > 0){
					$.each(formacao, function(index, value){
						html += '<a onclick="modalFormacao(\''+value.cdformacao+'\');" class="list-group-item">';
						html += '	<div class="row">';
						if(!empty(value['nminstituicao'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100120), 'nminstituicao')?>';
							html += '		<span class="form-span">'+value['nminstituicao']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmgrau'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100129), 'cdgrau')?>';
							html += '		<span class="form-span">'+value['nmgrau']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmcurso'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100130), 'cdcurso')?>';
							html += '		<span class="form-span">'+value['nmcurso']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['dtinicio'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100062), 'dtinicio')?>';
							html += '		<span class="form-span">'+$.datepicker.formatDate('MM/yy', new Date(convertStrToDate(value['dtinicio'])))+'</span>';
							html += '	</div>';
						}
						if(!empty(value['dttermino'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100063), 'dttermino')?>';
							html += '		<span class="form-span">'+$.datepicker.formatDate('MM/yy', new Date(convertStrToDate(value['dttermino'])))+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmsituacao'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100058), 'fgsituacao')?>';
							html += '		<span class="form-span">'+value['nmsituacao']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmpais'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100009), 'nmpais')?>';
							html += '		<span class="form-span">'+value['nmpais']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmestado'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100010), 'nmestado')?>';
							html += '		<span class="form-span">'+value['nmestado']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmcidade'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100011), 'nmcidade')?>';
							html += '		<span class="form-span">'+value['nmcidade']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}
				
				html += '<a id="add_btn" onclick="modalFormacao();" class="list-group-item list-group-item-success active">';
				html += '	<div class="row add-btn">';
				html += '		<span class="pull-right"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?=$this->lang->str(100064);?></span>';
				html += '	</div>';
				html += '</a>';
				
				$('#listFormacaoAcademica').html(html);
			}

			function modalFormacao(id){
				var fgnew = false;
				if(typeof id == 'undefined'){
					id = randomText(10);
					fgnew = true;
				}
				
				var key = nminstituicao = cdgrau = cdcurso = dtinicio = dttermino = fgsituacao = nmpais = nmestado = nmcidade = ''; 
				$.each(formacao, function(k, v){
					if(v.cdformacao == id){
						key = k;
						nminstituicao 	= v.nminstituicao;
						cdgrau 			= v.cdgrau;
						cdcurso 		= v.cdcurso;
						dtinicio 		= v.dtinicio;
						dttermino 		= v.dttermino;
						fgsituacao 		= v.fgsituacao;
						nmpais 			= v.nmpais;
						nmestado 		= v.nmestado;
						nmcidade 		= v.nmcidade;
					}
				});
				
				var html = '';
				html += '<form name="frmModal" id="frmModal" method="post">';
				html += '	<div class="row">';
				html += '		<input type="hidden" id="cdformacao" name="cdformacao" value="'+id+'" />';
				html += '		<input type="hidden" id="nmgrau" name="nmgrau" value="" />';
				html += '		<input type="hidden" id="nmcurso" name="nmcurso" value="" />';
				html += '		<input type="hidden" id="nmsituacao" name="nmsituacao" value="" />';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100120), 'nminstituicao', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nminstituicao" value="'+nminstituicao+'" id="nminstituicao"  class="form-control required" placeholder="<?=$this->lang->str(100120);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100129), 'cdgrau', array('class'=> 'control-label'))?>';
				html += '			<select name="cdgrau" id="cdgrau" data-value="'+cdgrau+'" class="form-control  required"></select>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown" style="display:none;">';
				html += '			<?=form_label($this->lang->str(100130), 'cdcurso', array('class'=> 'control-label'))?>';
				html += '			<select name="cdcurso" id="cdcurso" data-value="'+cdcurso+'" class="form-control required"></select>';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100062), 'dtinicio', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="dtinicio" value="'+dtinicio+'" id="dtinicio"  class="form-control required dateMonth" placeholder="<?=$this->lang->str(100062);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100063), 'dttermino', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="dttermino" value="'+dttermino+'" id="dttermino"  class="form-control required dateMonth" placeholder="<?=$this->lang->str(100063);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100058), 'fgsituacao', array('class'=> 'control-label'))?>';
				html += '			<select name="fgsituacao" id="fgsituacao" data-value="'+fgsituacao+'" class="form-control required"></select>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100009), 'nmpais', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmpais" value="'+nmpais+'" id="nmpais"  class="form-control required" placeholder="<?=$this->lang->str(100009);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100010), 'nmestado')?>';
				html += '			<input type="text" name="nmestado" value="'+nmestado+'" id="nmestado"  class="form-control" placeholder="<?=$this->lang->str(100010);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100011), 'nmcidade', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmcidade" value="'+nmcidade+'" id="nmcidade"  class="form-control required" placeholder="<?=$this->lang->str(100011);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '</form>';
				
				doModal('modal_div', '<?=$this->lang->str(100100);?>', html, getBtnModal(id, key, fgnew, addDataTableFormacao, 'formacao'));
				
				var $modal 		= $('#modal_div');
				var $cdgrau		= $modal.find('#cdgrau');
				var $cdcurso 	= $modal.find('#cdcurso');
				var $fgsituacao = $modal.find('#fgsituacao');
				
				$('#modal_div').on('shown.bs.modal', function () {
					
					loadComboList($cdgrau, listaGrau);	
					loadGrauCurso($cdcurso, $cdgrau);
					loadComboSituacao($fgsituacao);
					
					$cdgrau.change(function () {						
						loadGrauCurso($cdcurso, $(this));
						$modal.find('#nmgrau').val($(this).find('option:selected').text());
					});	
					
					$cdcurso.change(function(){
						$modal.find('#nmgrau').val($cdgrau.find('option:selected').text());
						$modal.find('#nmcurso').val($(this).find('option:selected').text());
					});
					
					$fgsituacao.change(function(){
						$modal.find('#nmsituacao').val($(this).find('option:selected').text());
					});
				});
			}

			function loadGrauCurso($cdcurso, $cdgrau){
				$cdgrau.parent().find('#nmgrau').val($cdgrau.find('option:selected').text());

				if(empty($cdgrau.val()))
					$cdcurso.val('').parent().css('display', 'none');
				else
					$cdcurso.parent().css('display', 'block');

				loadCombo($cdcurso, 'curso', {cdgrau: $cdgrau.val()});
				
				$cdcurso.val($cdcurso.attr('data-value'));
			}
			
			function loadComboSituacao(obj){
				var str = "<option value=''><?=$this->lang->str(100106);?></option>";
				str += "<option value='1' "+(parseInt($(obj).attr('data-value')) == 1? "selected" : '')+"><?=$this->lang->str(100142);?></option>";
				str += "<option value='2' "+(parseInt($(obj).attr('data-value')) == 2? "selected" : '')+"><?=$this->lang->str(100143);?></option>";
				str += "<option value='3' "+(parseInt($(obj).attr('data-value')) == 3? "selected" : '')+"><?=$this->lang->str(100144);?></option>";
				$(obj).html(str);
			}

			
			function addDataTableExperiencia(key, data){
				if(key !== '')
					experiencia[key] = data;
				else
					experiencia.push(data);
				dataTable('experiencia');
			}
			
			function dataTableExperiencia() {
				
				$('#listExperienciaProfissional').find('a').click(function(){
					modalExperiencia();
				});

				html = "";
				if(experiencia.length > 0){
					$.each(experiencia, function(index, value){						
						html += '<a onclick="modalExperiencia(\''+value.cdexperiencia+'\');" class="list-group-item">';
						html += '	<div class="row">';
						if(!empty(value['nmempresa'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100131), 'nmempresa')?>';
							html += '		<span class="form-span">'+value['nmempresa']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['nmsegmento'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100132), 'cdsegmento')?>';
							html += '		<span class="form-span">'+value['nmsegmento']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmcargo'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100128), 'cdcargo')?>';
							html += '		<span class="form-span">'+value['nmcargo']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['dtentrada'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100133), 'dtentrada')?>';
							html += '		<span class="form-span">'+$.format.date(convertStrToDate(value['dtentrada']), "dd/MM/yyyy")+'</span>';
							html += '	</div>';
						}
						if(!empty(value['dtsaida'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100134), 'dtsaida')?>';
							html += '		<span class="form-span">'+$.format.date(convertStrToDate(value['dtsaida']), "dd/MM/yyyy")+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmatual'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100135), 'fgatual')?>';
							html += '		<span class="form-span">'+value['nmatual']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['nmpais'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100009), 'nmpais')?>';
							html += '		<span class="form-span">'+value['nmpais']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmestado'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100010), 'nmestado')?>';
							html += '		<span class="form-span">'+value['nmestado']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmcidade'])){
							html += '	<div class="form-group col-sm-4 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100011), 'nmcidade')?>';
							html += '		<span class="form-span">'+value['nmcidade']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['txresponsabilidade'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100136), 'txresponsabilidade')?>';
							html += '		<span class="form-span">'+value['txresponsabilidade']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['txcase'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100137), 'txcase')?>';
							html += '		<span class="form-span">'+value['txcase']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['txmotivosaida'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100138), 'txmotivosaida')?>';
							html += '		<span class="form-span">'+value['txmotivosaida']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}	
				
				html += '<a id="add_btn" onclick="modalExperiencia();" class="list-group-item list-group-item-success active">';
				html += '	<div class="row add-btn">';
				html += '		<span class="pull-right"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?=$this->lang->str(100064);?></span>';
				html += '	</div>';
				html += '</a>';
				
				$('#listExperienciaProfissional').html(html);
			}

			function modalExperiencia(id){
				var fgnew = false;
				if(typeof id == 'undefined'){
					id = randomText(10);
					fgnew = true;
				}

				var key = nmempresa = cdsegmento = cdcargo = dtentrada = dtsaida = fgatual = nmpais = nmestado = nmcidade = txresponsabilidade = txcase = txmotivosaida = ''; 
				$.each(experiencia, function(k, v){
					if(v.cdexperiencia == id){
						key = k;
						nmempresa 			= v.nmempresa;
						cdsegmento			= v.cdsegmento;
						cdcargo 			= v.cdcargo;
						dtentrada			= v.dtentrada;
						dtsaida 			= v.dtsaida;
						fgatual 			= v.fgatual;
						nmpais 				= v.nmpais;
						nmestado 			= v.nmestado;
						nmcidade 			= v.nmcidade;
						txresponsabilidade 	= v.txresponsabilidade;
						txcase 				= v.txcase;
						txmotivosaida 		= v.txmotivosaida;
					}
				});
				
				var html = '';
				html += '<form name="frmModal" id="frmModal" method="post">';
				html += '	<div class="row">';
				html += '		<input type="hidden" id="cdexperiencia" name="cdexperiencia" value="'+id+'" />';
				html += '		<input type="hidden" id="nmsegmento" name="nmsegmento" value="" />';
				html += '		<input type="hidden" id="nmcargo" name="nmcargo" value="" />';
				html += '		<input type="hidden" id="nmatual" name="nmatual" value="" />';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100131), 'nmempresa', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmempresa" value="'+nmempresa+'" id="nmempresa"  class="form-control required" placeholder="<?=$this->lang->str(100131);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100132), 'cdsegmento', array('class'=> 'control-label'))?>';
				html += '			<select name="cdsegmento" id="cdsegmento" data-value="'+cdsegmento+'" class="form-control required"></select>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100128), 'cdcargo', array('class'=> 'control-label'))?>';
				html += '			<select name="cdcargo" id="cdcargo" data-value="'+cdcargo+'" class="form-control required"></select>';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100133), 'dtentrada', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="dtentrada" value="'+dtentrada+'" id="dtentrada"  class="form-control date required" placeholder="<?=$this->lang->str(100133);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100134), 'dtsaida', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="dtsaida" value="'+dtsaida+'" id="dtsaida"  class="form-control date" placeholder="<?=$this->lang->str(100134);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<div class="form-checkbox checkbox">';
				html += '				<?=preg_replace( "/\r|\n/", "", form_label(form_checkbox(array('name' => 'fgatual','id' => 'fgatual')).$this->lang->str(100135), 'fgatual', array('class'=> 'control-label')));?>';
				html += '			</div>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100009), 'nmpais', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmpais" value="'+nmpais+'" id="nmpais"  class="form-control required" placeholder="<?=$this->lang->str(100009);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100010), 'nmestado')?>';
				html += '			<input type="text" name="nmestado" value="'+nmestado+'" id="nmestado"  class="form-control" placeholder="<?=$this->lang->str(100010);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-4 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100011), 'nmcidade', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmcidade" value="'+nmcidade+'" id="nmcidade"  class="form-control required" placeholder="<?=$this->lang->str(100011);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100136), 'txresponsabilidade')?>';
				html += '			<textarea name="txresponsabilidade" cols="40" rows="5" id="txresponsabilidade" class="form-control required" placeholder="<?=$this->lang->str(100136);?>">'+txresponsabilidade+'</textarea>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100137), 'txcase')?>';
				html += '			<textarea name="txcase" cols="40" rows="5" id="txcase" class="form-control" placeholder="<?=$this->lang->str(100137);?>">'+txcase+'</textarea>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100138), 'txmotivosaida')?>';
				html += '			<textarea name="txmotivosaida" cols="40" rows="5" id="txmotivosaida" class="form-control" placeholder="<?=$this->lang->str(100138);?>">'+txmotivosaida+'</textarea>';
				html += '		</div>';
				html += '	</div>';
				html += '</form>';

				doModal('modal_div', '<?=$this->lang->str(100101);?>', html, getBtnModal(id, key, fgnew, addDataTableExperiencia, 'experiencia'));
				
				$('#modal_div').on('shown.bs.modal', function () {
					var $modal 		= $(this);
					var $fgatual 	= $modal.find('#fgatual');
					var $cdsegmento = $modal.find('#cdsegmento');
					var $cdcargo 	= $modal.find('#cdcargo');
					
					$fgatual.prop('checked', (fgatual ? true: false)).val(fgatual ? 1 : 0);
					
					$fgatual.change(function(){
						var fg = $(this).is(":checked");
						$(this).val(fg ? 1 : 0);
						$modal.find('#nmatual').val(fg ? "<i class='fa fa-check text-success'></i>" : "<i class='fa fa-ban text-danger'></i>");
						
						loadRequiredExperiencia($modal);
					}).change();
					
					loadComboList($cdsegmento, listaSegmento);	
					$cdsegmento.change(function(){
						$modal.find('#nmsegmento').val($(this).find('option:selected').text());
					}).change();
					
					loadComboList($cdcargo, listaCargo);
					$cdcargo.change(function(){
						$modal.find('#nmcargo').val($(this).find('option:selected').text());
					}).change();
				})
			}
			
			function loadRequiredExperiencia(modal){
				if(!$(modal).find('#fgatual').is(":checked")){
					$(modal).find('#dtsaida').prop('disabled', false).addClass('required');
					$(modal).find('#dtsaida-display').prop('disabled', false).addClass('required');
					$(modal).find('#txmotivosaida').prop('disabled', false).addClass('required');
				} else{
					$(modal).find('#dtsaida').val('').prop('disabled', true).removeClass('required').parent().removeClass('has-error has-feedback');
					$(modal).find('#dtsaida-display').val('').prop('disabled', true).removeClass('required').parent().removeClass('has-error has-feedback');
					$(modal).find('#dtsaida').next().remove();
					
					$(modal).find('#txmotivosaida').val('').removeClass('required').parent().removeClass('has-error has-feedback');
					$(modal).find('#txmotivosaida').prop('disabled', true).next().remove();
				}
			
			}			

			
			function addDataTableQualificacao(key, data){
				if(key !== '')
					qualificacao[key] = data;
				else
					qualificacao.push(data);
				dataTable('qualificacao');
			}
			
			function dataTableQualificacao() {
				
				$('#listQualificacao').find('a').click(function(){
					modalQualificacao();
				});

				html = "";
				if(qualificacao.length > 0){
					$.each(qualificacao, function(index, value){					
						html += '<a onclick="modalQualificacao(\''+value.cdqualificacao+'\');" class="list-group-item">';
						html += '	<div class="row">';
						if(!empty(value['nmqualificacao'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100019), 'nmqualificacao')?>';
							html += '		<span class="form-span">'+value['nmqualificacao']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['nminstituicao'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100120), 'nminstituicao')?>';
							html += '		<span class="form-span">'+value['nminstituicao']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['dtqualificacao'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100084), 'dtqualificacao')?>';
							html += '		<span class="form-span">'+$.format.date(convertStrToDate(value['dtqualificacao']), "dd/MM/yyyy")+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['dsqualificacao'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100107), 'dsqualificacao')?>';
							html += '		<span class="form-span">'+value['dsqualificacao']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}	
				
				html += '<a id="add_btn" onclick="modalQualificacao();" class="list-group-item list-group-item-success active">';
				html += '	<div class="row add-btn">';
				html += '		<span class="pull-right"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?=$this->lang->str(100064);?></span>';
				html += '	</div>';
				html += '</a>';
				
				$('#listQualificacao').html(html);
			}

			function modalQualificacao(id){
				
				var fgnew = false;
				if(typeof id == 'undefined'){
					id = randomText(10);
					fgnew = true;
				}

				var key = nmqualificacao = nminstituicao = dtqualificacao = dsqualificacao = ''; 
				$.each(qualificacao, function(k, v){
					if(v.cdqualificacao == id){
						key = k;
						nmqualificacao 		= v.nmqualificacao;
						nminstituicao		= v.nminstituicao;
						dtqualificacao		= v.dtqualificacao;
						dsqualificacao 		= v.dsqualificacao;
					}
				});
				
				var html = '';
				html += '<form name="frmModal" id="frmModal" method="post">';
				html += '	<input type="hidden" id="cdqualificacao" name="cdqualificacao" value="'+id+'" />';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100019), 'nmqualificacao', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmqualificacao" value="'+nmqualificacao+'" id="nmqualificacao"  class="form-control required" placeholder="<?=$this->lang->str(100019);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100120), 'nminstituicao', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nminstituicao" value="'+nminstituicao+'" id="nminstituicao"  class="form-control required" placeholder="<?=$this->lang->str(100120);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100084), 'dtqualificacao', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="dtqualificacao" value="'+dtqualificacao+'" id="dtqualificacao"  class="form-control date required" placeholder="<?=$this->lang->str(100084);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-12 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100107), 'dsqualificacao')?>';
				html += '			<textarea name="dsqualificacao" cols="40" rows="5" id="dsqualificacao" class="form-control" placeholder="<?=$this->lang->str(100107);?>">'+dsqualificacao+'</textarea>';
				html += '		</div>';
				html += '	</div>';
				html += '</form>';

				doModal('modal_div', '<?=$this->lang->str(100102);?>', html, getBtnModal(id, key, fgnew, addDataTableQualificacao, 'qualificacao'));
			}
	

			function addDataTableIdioma(key, data){
				if(key !== '')
					idioma[key] = data;
				else
					idioma.push(data);
				dataTable('idioma');
			}
	
			function dataTableIdioma() {
				
				$('#listIdioma').find('a').click(function(){
					modalIdioma();
				});

				html = "";
				if(idioma.length > 0){
					$.each(idioma, function(index, value){					
						html += '<a onclick="modalIdioma(\''+value.cdcandidato_idioma+'\');" class="list-group-item">';
						html += '	<div class="row">';
						if(!empty(value['nmidioma'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100103), 'nmidioma')?>';
							html += '		<span class="form-span">'+value['nmidioma']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmnivel'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100121), 'nmnivel')?>';
							html += '		<span class="form-span">'+value['nmnivel']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}	
				
				html += '<a id="add_btn" onclick="modalIdioma();" class="list-group-item list-group-item-success active">';
				html += '	<div class="row add-btn">';
				html += '		<span class="pull-right"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?=$this->lang->str(100064);?></span>';
				html += '	</div>';
				html += '</a>';
				
				$('#listIdioma').html(html);
			}

			function modalIdioma(id){
				
				var fgnew = false;
				if(typeof id == 'undefined'){
					id = randomText(10);
					fgnew = true;
				}

				var key = cdidioma = cdnivel = ''; 
				$.each(idioma, function(k, v){
					if(v.cdcandidato_idioma == id){
						key = k;
						cdidioma	= v.cdidioma;
						cdnivel		= v.cdnivel;
					}
				});
				
				var html = '';
				html += '<form name="frmModal" id="frmModal" method="post">';
				html += '	<input type="hidden" id="cdcandidato_idioma" name="cdcandidato_idioma" value="'+id+'" />';
				html += '	<input type="hidden" id="nmidioma" name="nmidioma" value="" />';
				html += '	<input type="hidden" id="nmnivel" name="nmnivel" value="" />';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100103), 'cdidioma', array('class'=> 'control-label'))?>';
				html += '			<select name="cdidioma" id="cdidioma" data-value="'+cdidioma+'" class="form-control required"></select>';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100121), 'cdnivel', array('class'=> 'control-label'))?>';
				html += '			<select name="cdnivel" id="cdnivel" data-value="'+cdnivel+'" class="form-control required"></select>';
				html += '		</div>';
				html += '	</div>';
				html += '</form>';

				doModal('modal_div', '<?=$this->lang->str(100103);?>', html, getBtnModal(id, key, fgnew, addDataTableIdioma, 'idioma'));
			
				
				$('#modal_div').on('shown.bs.modal', function () {
					var $modal 		= $(this);
					var $cdidioma 	= $modal.find('#cdidioma');
					var $cdnivel 	= $modal.find('#cdnivel');

					loadComboList($cdidioma, listaIdioma);
					$cdidioma.change(function(){
						$modal.find('#nmidioma').val($(this).find('option:selected').text());
					}).change();	
					
					loadComboList($cdnivel, listaNivel);
					$cdnivel.change(function(){
						$modal.find('#nmnivel').val($(this).find('option:selected').text());
					}).change();
				});
			}
	

			function addDataTableReferencia(key, data){
				if(key !== '')
					referencia[key] = data;
				else
					referencia.push(data);
				dataTable('referencia');
			}
	
			function dataTableReferencia() {
				$('#listReferencia').find('a').click(function(){
					modalReferencia();
				});

				html = "";
				if(referencia.length > 0){
					$.each(referencia, function(index, value){					
						html += '<a onclick="modalReferencia(\''+value.cdreferencia+'\');" class="list-group-item">';
						html += '	<div class="row">';
						if(!empty(value['nmreferencia'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100019), 'nmreferencia')?>';
							html += '		<span class="form-span">'+value['nmreferencia']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmcargo'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100128), 'nmcargo')?>';
							html += '		<span class="form-span">'+value['nmcargo']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['nrtelefone'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100048), 'nrtelefone')?>';
							html += '		<span class="form-span">'+value['nrtelefone']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nrcelular'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100049), 'nrcelular')?>';
							html += '		<span class="form-span">'+value['nrcelular']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmemail'])){
							html += '	<div class="form-group col-sm-6 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100032), 'nmemail')?>';
							html += '		<span class="form-span">'+value['nmemail']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}
				html += '<a id="add_btn" onclick="modalReferencia();" class="list-group-item list-group-item-success active">';
				html += '	<div class="row add-btn">';
				html += '		<span class="pull-right"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> <?=$this->lang->str(100064);?></span>';
				html += '	</div>';
				html += '</a>';
				
				$('#listReferencia').html(html);
			}

			function modalReferencia(id){
				
				var fgnew = false;
				if(typeof id == 'undefined'){
					id = randomText(10);
					fgnew = true;
				}

				var key = nmreferencia = cdcargo = nrtelefone = nrcelular = nmemail = ''; 
				$.each(referencia, function(k, v){
					if(v.cdreferencia == id){
						key = k;
						nmreferencia 	= v.nmreferencia;
						cdcargo			= v.cdcargo;
						nrtelefone		= v.nrtelefone;
						nrcelular		= v.nrcelular;
						nmemail			= v.nmemail;
					}
				});
				
				var html = '';
				html += '<form name="frmModal" id="frmModal" method="post">';
				html += '	<input type="hidden" id="cdreferencia" name="cdreferencia" value="'+id+'" />';
				html += '	<input type="hidden" id="nmcargo" name="nmcargo" value="" />';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100019), 'nmreferencia', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nmreferencia" value="'+nmreferencia+'" id="nmreferencia"  class="form-control required" placeholder="<?=$this->lang->str(100019);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100128), 'cdcargo', array('class'=> 'control-label'))?>';
				html += '			<select name="cdcargo" id="cdcargo" data-value="'+cdcargo+'" class="form-control required"></select>';
				html += '		</div>';
				html += '	</div>';
				html += '	<div class="row">';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100048), 'nrtelefone', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nrtelefone" value="'+nrtelefone+'" id="nrtelefone"  class="form-control phone" placeholder="<?=$this->lang->str(100048);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100049), 'nrcelular', array('class'=> 'control-label'))?>';
				html += '			<input type="text" name="nrcelular" value="'+nrcelular+'" id="nrcelular"  class="form-control cellphone required" placeholder="<?=$this->lang->str(100049);?>" />';
				html += '		</div>';
				html += '		<div class="form-group col-sm-6 fadeInDown">';
				html += '			<?=form_label($this->lang->str(100032), 'nmemail', array('class'=> 'control-label'))?>';
				html += '			<input type="email" name="nmemail" value="'+nmemail+'" id="nmemail"  class="form-control email" placeholder="<?=$this->lang->str(100032);?>" />';
				html += '		</div>';
				html += '	</div>';
				html += '</form>';
				
				doModal('modal_div', '<?=$this->lang->str(100105);?>', html, getBtnModal(id, key, fgnew, addDataTableReferencia, 'referencia'));
			
				
				$('#modal_div').on('shown.bs.modal', function () {					
					var $modal 		= $(this);
					var $cdcargo 	= $modal.find('#cdcargo');

					loadComboList($cdcargo, listaCargo);
					$cdcargo.change(function(){
						$modal.find('#nmcargo').val($(this).find('option:selected').text());
					}).change();
				});
			}

			function form_submit() {
				$('#candidato-form').submit(); 
			} 	
			
			$(document).ready(function(){
				prepareDataTable('formacao');
				prepareDataTable('experiencia');
				prepareDataTable('qualificacao');
				prepareDataTable('idioma');
				prepareDataTable('referencia');
				
				$('#modal_div').on('show.bs.modal', function () {
					$('#loading').show();
				});
				
				$('#modal_div').on('shown.bs.modal', function () {
					$('#loading').hide();
					loadMasks($(this));
				});

				$('#modal_div').on('hide.bs.modal', function () {
					$('#loading').show();
				});
				
				$('#modal_div').on('hidden.bs.modal', function () {
					$('#loading').hide();
				});
				
				$fgdeficiencia 	= $( "#candidato-form" ).find('#fgdeficiencia');
				$nmdeficiencia	= $( "#candidato-form" ).find('#nmdeficiencia');
				$fgmudar 		= $( "#candidato-form" ).find('#fgmudar');
				$fgviajar 		= $( "#candidato-form" ).find('#fgviajar');
				
				$fgdeficiencia.change(function(){
					if($(this).is(":checked"))
						$nmdeficiencia.prop('disabled', false);
					else
						$nmdeficiencia.prop('disabled', true).val('');
				}).change();
				
				$( "#candidato-form" ).find("button[name='btn_submit']").on('click', function (e) {
					if(experiencia.length < 3){
						var btn = [];
						btn.push({label:"<?=$this->lang->str(100115);?>", className:"btn-default", onclick:'', attributes:{ 'data-dismiss': 'modal'}});
						btn.push({label:"<?=$this->lang->str(100055);?>", className:"btn-success", onclick: "form_submit();"});
						
						doModal('modal_div', '<?=$this->lang->str(100069);?>', '<?=$this->lang->str(100070);?>', btn);
					}
					else
						form_submit();
				});
				
				$( "#candidato-form" ).submit(function(e) {
					$(this).append($("<input>").attr("type", "hidden").attr("name", "formacao").val(JSON.stringify(formacao)));
					$(this).append($("<input>").attr("type", "hidden").attr("name", "experiencia").val(JSON.stringify(experiencia)));
					$(this).append($("<input>").attr("type", "hidden").attr("name", "qualificacao").val(JSON.stringify(qualificacao)));
					$(this).append($("<input>").attr("type", "hidden").attr("name", "idioma").val(JSON.stringify(idioma)));
					$(this).append($("<input>").attr("type", "hidden").attr("name", "referencia").val(JSON.stringify(referencia)));
					
					$.each($(this).find('select'), function(){
						if(parseInt($(this).val()) == 0)
							$(this).val('');
					});
				});
			});	
			
		</script>
	</body>
</html>

		<?php /*
		
		$(document).ready(function(){
				$.getJSON(base_url + "assets/js/json/brasil.json", function (data) {
					var items = [];
						var options = '<option value=""><?=$this->lang->str(100106);?></option>';	
						$.each(data, function (key, val) {
							options += '<option value="' + val.nome + '"  ' + (val.nome == $("#nmestado").attr('data-value') ? 'selected = "selected"' : '') +' >' + val.nome + '</option>';
						});					
						$("#nmestado").html(options);				
						
						$("#nmestado").change(function () {	
							if($(this).val() == '')
								$("#nmcidade").parent().css('display', 'none');
							else
								$("#nmcidade").parent().css('display', 'block');
						
							var options_cidades = '';
							var str = "";					
							
							$("#nmestado option:selected").each(function () {
								str += $(this).text();
							});
							
							$.each(data, function (key, val) {
								if(val.nome == str) {							
									$.each(val.cidades, function (key_city, val_city) {
										options_cidades += '<option value="' + val_city + '" ' + (val_city == $("#nmcidade").attr('data-value') ? 'selected = "selected"' : '') +'>' + val_city + '</option>';
									});							
								}
							});
							$("#nmcidade").html(options_cidades);
							
						}).change();			
				});
			});
		function loadCountryFields(obj){
			var value = $(obj).find('#nmpais').val();
			if($(obj).find('#nmpais').length && (value == '' || value == 0 || value == null))
			{
				$(obj).find('#nmestado').val('').parent().css('display', 'none');
				$(obj).find('#nmcidade').val('').parent().parent().css('display', 'none');
			}
			else
			{
				if(value == 'Brasil')
					$(obj).find('#nmestado').parent().css('display', 'block');
				
				var v = $(obj).find('#nmestado').val()
				if(value == 'Brasil' && (v == '' || v == 0 || v == null))
					$(obj).find('#nmcidade').val('').parent().parent().css('display', 'none');
				else
					$(obj).find('#div_cidade').parent().css('display', 'block');
			}
		}*/ ?>
		