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
									
									<div id="infoDadosPessoais">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100093);?></h2>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100031), 'nmcandidato', array('class'=> 'control-label'))?>
												<?=form_span('nmcandidato', set_value('nmcandidato'), array('class' => 'form-span'))?>
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100033), 'dtnascimento')?>
												<?=form_span('dtnascimento', set_value('dtnascimento'), array('class' => 'form-span span-date'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100046), 'idcpf')?>
												<?=form_span('idcpf', set_value('idcpf'), array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100045), 'idrg')?>
												<?=form_span('idrg', set_value('idrg'), array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100094), 'fggenero')?>
												<?=form_span('fggenero', array('1'=> 'Feminino','2'=> 'Masculino')[set_value('fggenero')], array('class' => 'form-span'))?>
											</div>
										</div>									
										<div class="row">
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100095), 'cdnacionalidade')?>
												<?=form_span('cdnacionalidade', $list_nacionalidade[set_value('cdnacionalidade')], array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100096), 'cdestadocivil')?>
												<?=form_span('cdestadocivil', $list_estadocivil[set_value('cdestadocivil')], array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100127), 'cdhabilitacao')?>
												<?=form_span('cdhabilitacao', $list_habilitacao[set_value('cdhabilitacao')], array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-3 fadeInDown">
												<?=form_label($this->lang->str(100097), 'nrfilho')?>
												<?=form_span('nrfilho', set_value('nrfilho'), array('class' => 'form-span'))?>
											</div>
										</div>        
									</div>
									
									<div id="infoEndereco">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100054);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100010), 'nmestado')?>		
												<?=form_span('nmestado', set_value('nmestado'), array('class' => 'form-span'))?>	
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100011), 'nmcidade')?>
												<?=form_span('nmcidade', set_value('nmcidade'), array('class' => 'form-span'))?>	
											</div>
										</div>
									</div>
									
									<div id="infoContato" class="hidden-pt">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100098);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100048), 'nrtelefone')?>
												<?=form_span('nrtelefone', set_value('nrtelefone'), array('class' => 'form-span'))?>	
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100049), 'nrcelular')?>
												<?=form_span('nrcelular', set_value('nrcelular'), array('class' => 'form-span'))?>	
											</div>
										</div>
										<div class="row">
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100032), 'nmemail')?>
												<?=form_span('nmemail', set_value('nmemail'), array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100118), 'nmskype')?>
												<?=form_span('nmskype', set_value('nmskype'), array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-4 fadeInDown">
												<?=form_label($this->lang->str(100119), 'nmlinkedin')?>
												<?=form_span('nmlinkedin', set_value('nmlinkedin'), array('class' => 'form-span'))?>
											</div>
										</div>
									</div>

									<div id="infoObjetivo">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100099);?></h2>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100116), 'cdpretensao')?>
												<?=form_span('cdpretensao', $list_pretensao[set_value('cdpretensao')], array('class' => 'form-span'))?>
											</div>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100117), 'cdtipocontrato')?>
												<?=form_span('cdtipocontrato', $list_tipocontrato[set_value('cdtipocontrato')], array('class' => 'form-span'))?>
											</div>
										</div>
									</div>

									<div id="infoFormacao">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100100);?></h2>
										<div id="listFormacao" class="list-group"></div>
									</div>
									
									<div id="infoExperiencia">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100101);?></h2>
										<div id="listExperiencia" class="list-group"></div>
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
											<?php if(!empty(set_value('fgviajar'))) {?>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_span('fgviajar', $this->lang->str(100148), array('class' => 'label label-success'))?>
											</div>
											<?php } ?>
											<?php if(!empty(set_value('fgmudar'))) {?>
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_span('fgmudar', $this->lang->str(100149), array('class' => 'label label-success'))?>
											</div>
											<?php } ?>
										</div>
										<?php if(!empty(set_value('fgdeficiencia'))) {?>
										<div class="row">
											<div class="form-group col-sm-6 fadeInDown">
												<?=form_label($this->lang->str(100124), 'nmdeficiencia')?>
												<?=form_span('nmdeficiencia', set_value('nmdeficiencia'), array('class' => 'form-span'))?>
											</div>
										</div>
										<?php } ?>
										<?php if(!empty(set_value('txcurso'))) {?>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100123), 'txcurso');?>
												<?=form_span('txcurso', nl2br(set_value('txcurso')), array('class' => 'form-span'))?>
											</div>
										</div>
										<?php } ?>
										<?php if(!empty(set_value('txinformacao'))) {?>
										<div class="row">
											<div class="form-group col-sm-12 fadeInDown">
												<?=form_label($this->lang->str(100122), 'txinformacao')?>
												<?=form_span('txinformacao', nl2br(set_value('txinformacao')), array('class' => 'form-span'))?>
											</div>
										</div>
										<?php } ?>
									</div>
									
									<div id="infoReferencia">
										<h2 class="subtitle fadeInDown"><?=$this->lang->str(100105);?></h2>
										<div id="listReferencia" class="list-group"></div>
									</div>
									
									<div class="row">
										<div class="col-sm-12 hidden-print fadeInDown">
											<div id="actions" class="row  pull-right">
												<div id="btn_actions" class="col-sm-12">
													<?=form_reset( 'cancel', $this->lang->str(100092), array('class' => 'btn btn-warning btn-cancel', 'onclick' => 'window.location.replace(\''.site_url('candidato').'\')')); ?>
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
			var site_url 		= '<?=site_url($controller);?>';
			var formacao 		= [];
			var experiencia		= [];
			var qualificacao 	= [];
			var idioma 			= [];
			var referencia 		= [];

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
			
			function dataTableFormacao() {

				html = "";
				if(formacao.length > 0){
					$.each(formacao, function(index, value){
						html += '<a class="list-group-item">';
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
				else
				{
					html += '<a id="no_records" class="list-group-item list-group-item-danger active">';
					html += '	<div class="row add-btn">';
					html += '		<span><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?=$this->lang->str(100085);?></span>';
					html += '	</div>';
					html += '</a>';
					
					$('#listFormacao').parent().addClass('hidden-pt');
				}
				
				$('#listFormacao').html(html);
			}
			
			function dataTableExperiencia() {
				html = "";
				if(experiencia.length > 0){
					$.each(experiencia, function(index, value){						
						html += '<a class="list-group-item">';
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
							html += '		<span class="form-span">'+nl2br(value['txresponsabilidade'])+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['txcase'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100137), 'txcase')?>';
							html += '		<span class="form-span">'+nl2br(value['txcase'])+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '	<div class="row">';
						if(!empty(value['txmotivosaida'])){
							html += '	<div class="form-group col-sm-12 fadeInDown">';
							html += '		<?=form_label($this->lang->str(100138), 'txmotivosaida')?>';
							html += '		<span class="form-span">'+nl2br(value['txmotivosaida'])+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}
				else
				{
					html += '<a id="no_records" class="list-group-item list-group-item-danger active">';
					html += '	<div class="row add-btn">';
					html += '		<span><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?=$this->lang->str(100085);?></span>';
					html += '	</div>';
					html += '</a>';
					
					$('#listExperiencia').parent().addClass('hidden-pt');
				}
				
				$('#listExperiencia').html(html);
			}
			
			function dataTableQualificacao() {
				
				html = "";
				if(qualificacao.length > 0){
					$.each(qualificacao, function(index, value){					
						html += '<a class="list-group-item">';
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
				else
				{
					html += '<a id="no_records" class="list-group-item list-group-item-danger active">';
					html += '	<div class="row add-btn">';
					html += '		<span><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?=$this->lang->str(100085);?></span>';
					html += '	</div>';
					html += '</a>';
					
					$('#listQualificacao').parent().addClass('hidden-pt');
				}
				
				$('#listQualificacao').html(html);
			}
	
			function dataTableIdioma() {
				html = "";
				if(idioma.length > 0){
					$.each(idioma, function(index, value){					
						html += '<a class="list-group-item">';
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
				else
				{
					html += '<a id="no_records" class="list-group-item list-group-item-danger active">';
					html += '	<div class="row add-btn">';
					html += '		<span><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?=$this->lang->str(100085);?></span>';
					html += '	</div>';
					html += '</a>';
					
					
					$('#listIdioma').parent().addClass('hidden-pt');
				}
				
				$('#listIdioma').html(html);
			}
			
			function dataTableReferencia() {
				html = "";
				if(referencia.length > 0){
					$.each(referencia, function(index, value){					
						html += '<a class="list-group-item">';
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
							html += '	<div class="form-group col-sm-6 fadeInDown hidden-pt">';
							html += '		<?=form_label($this->lang->str(100048), 'nrtelefone')?>';
							html += '		<span class="form-span">'+value['nrtelefone']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nrcelular'])){
							html += '	<div class="form-group col-sm-6 fadeInDown hidden-pt">';
							html += '		<?=form_label($this->lang->str(100049), 'nrcelular')?>';
							html += '		<span class="form-span">'+value['nrcelular']+'</span>';
							html += '	</div>';
						}
						if(!empty(value['nmemail'])){
							html += '	<div class="form-group col-sm-6 fadeInDown hidden-pt">';
							html += '		<?=form_label($this->lang->str(100032), 'nmemail')?>';
							html += '		<span class="form-span">'+value['nmemail']+'</span>';
							html += '	</div>';
						}
						html += '	</div>';
						html += '</a>';
					});
				}
				else
				{
					html += '<a id="no_records" class="list-group-item list-group-item-danger active">';
					html += '	<div class="row add-btn">';
					html += '		<span><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span> <?=$this->lang->str(100085);?></span>';
					html += '	</div>';
					html += '</a>';
					
					$('#listReferencia').parent().addClass('hidden-pt');
				}
				
				$('#listReferencia').html(html);
			}
			
			$(document).ready(function(){
				prepareDataTable('formacao');
				prepareDataTable('experiencia');
				prepareDataTable('qualificacao');
				prepareDataTable('idioma');
				prepareDataTable('referencia');
				
				
				$(".btn-cancel").prop("disabled", false);		


				$.each($("#candidato-form .form-span"), function (){
					if($(this).html() == '  ')
						$(this).parent().addClass('hidden-pt');
				});			
				
			});	
			
		</script>
	</body>
</html>