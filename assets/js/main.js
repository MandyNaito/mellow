function doModal(placementId, heading, formContent, btn){
    html =  '<div id="modalWindow" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirm-modal" aria-hidden="true">';
    html += '	<div class="modal-dialog modal-lg">';
    html += '		<div class="modal-content">';
    html += 			'<div class="modal-header">';
    html += '				<a class="close" data-dismiss="modal">×</a>';
    html += '				<h4>'+heading+'</h4>'
    html += '			</div>';
    html += '			<div class="modal-body">';
    html += 				formContent;
    html += '			</div>';
	
	
	if(typeof btn != 'undefined' && btn.length > 0)
	{
		html += ' <div class="modal-footer">';
		$.each(btn, function(index, value){
			html += '<span class="btn '+value.className+'" onclick="'+value.onclick+'" ';
			if(typeof value.attributes != 'undefined'){
				$.each(value.attributes, function(k, v){
					html += ' '+k+'="'+v+'"';
				});
			}
			html += '>'+value.label+'</span>';
		});
		html += ' </div>';
	}

    html += '		</div>';
    html += '	</div>';
    html += '</div>';
	
    $("#"+placementId).html(html);
    $("#modalWindow").modal({backdrop: 'static', keyboard: false});
    $("#dynamicModal").modal('show');
}

function nl2br (str, is_xhtml) {   
    var breakTag = (is_xhtml || typeof is_xhtml === 'undefined') ? '<br />' : '<br>';    
    return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1'+ breakTag +'$2');
}

function empty (mixedVar) {
  //  discuss at: http://locutus.io/php/empty/
  // original by: Philippe Baumann
  //    input by: Onno Marsman (https://twitter.com/onnomarsman)
  //    input by: LH
  //    input by: Stoyan Kyosev (http://www.svest.org/)
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // improved by: Onno Marsman (https://twitter.com/onnomarsman)
  // improved by: Francesco
  // improved by: Marc Jansen
  // improved by: Rafał Kukawski (http://blog.kukawski.pl)
  //   example 1: empty(null)
  //   returns 1: true
  //   example 2: empty(undefined)
  //   returns 2: true
  //   example 3: empty([])
  //   returns 3: true
  //   example 4: empty({})
  //   returns 4: true
  //   example 5: empty({'aFunc' : function () { alert('humpty'); } })
  //   returns 5: false
  var undef
  var key
  var i
  var len
  var emptyValues = [undef, null, false, 0, '', '0']
  for (i = 0, len = emptyValues.length; i < len; i++) {
    if (mixedVar === emptyValues[i]) {
      return true
    }
  }
  if (typeof mixedVar === 'object') {
    for (key in mixedVar) {
      if (mixedVar.hasOwnProperty(key)) {
        return false
      }
    }
    return true
  }
  return false
}

function objectifyForm(formArray) {
	var returnArray = {};
	for (var i = 0; i < formArray.length; i++)
		returnArray[formArray[i]['name']] = formArray[i]['value'];

	return returnArray;
}

function randomText(tamanho){
    var alfa = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz';
    var text = '';
    for (var i = 0; i < tamanho; i++) {
        var rnum = Math.floor(Math.random() * alfa.length);
        text += alfa.substring(rnum, rnum + 1);
    }
    return text;
}

function convertStrToDate(date){
	var aux = date.split("-");
	return new Date(aux[0], aux[1] - 1, aux[2]);
}

function verifyRequired(formObj){
	
	var noError = true;
	
	$.each($(formObj).find('.required'), function (){
		if(empty($(this).val())){
			$(this).parent().addClass('has-error has-feedback');
			if($(this).next().hasClass('form-control-feedback'))
				$(this).next().addClass('glyphicon-remove');
			else
				$(this).after('<span class="glyphicon form-control-feedback glyphicon-remove"></span>');
			
			if(noError)
				noError = false;
		}
		else{
			$(this).parent().removeClass('has-error');
			if($(this).next().hasClass('form-control-feedback'))
				$(this).next().remove();
		}
	});
	
	if(noError)
		return true;
	
	addErrorMsg(s_100141);
	return false;
}



function verifyMail(formObj){
	var noError = true;
	
	$.each($(formObj).find('.email'), function (){
		if($(this).hasClass('required')){
			if($(this).val().indexOf('@', 0) == -1){
				$(this).parent().addClass('has-error has-feedback');
				if($(this).next().hasClass('form-control-feedback'))
					$(this).next().addClass('glyphicon-remove');
				else
					$(this).after('<span class="glyphicon form-control-feedback glyphicon-remove"></span>');
				
				if(noError)
					noError = false;
			}
			else{
				$(this).parent().removeClass('has-error');
				if($(this).next().hasClass('form-control-feedback'))
					$(this).next().remove();
			}
		}
	});
	
	if(noError)
		return true;

	
	addErrorMsg(s_100066);
	return false;
}


function verifyCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g,'');
    if(cpf == '') return false;
    // Elimina CPFs invalidos conhecidos
    if (cpf.length != 11 ||
        cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999")
        return false;
    // Valida 1o digito
    add = 0;
    for (i=0; i < 9; i ++)
        add += parseInt(cpf.charAt(i)) * (10 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(9)))
        return false;
    // Valida 2o digito
    add = 0;
    for (i = 0; i < 10; i ++)
        add += parseInt(cpf.charAt(i)) * (11 - i);
    rev = 11 - (add % 11);
    if (rev == 10 || rev == 11)
        rev = 0;
    if (rev != parseInt(cpf.charAt(10)))
        return false;
    return true;
}

function verifyCNPJ(cnpj) {
 
    cnpj = cnpj.replace(/[^\d]+/g,'');
 
    if(cnpj == '') return false;
     
    if (cnpj.length != 14)
        return false;
 
    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" || 
        cnpj == "11111111111111" || 
        cnpj == "22222222222222" || 
        cnpj == "33333333333333" || 
        cnpj == "44444444444444" || 
        cnpj == "55555555555555" || 
        cnpj == "66666666666666" || 
        cnpj == "77777777777777" || 
        cnpj == "88888888888888" || 
        cnpj == "99999999999999")
        return false;
         
    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0,tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;
         
    tamanho = tamanho + 1;
    numeros = cnpj.substring(0,tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
      soma += numeros.charAt(tamanho - i) * pos--;
      if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
          return false;
           
    return true;
    
}

function formValue($formulario, disabled)
{
	if(typeof disabled == 'undefined')
		disabled = false;
	
	if(disabled)
		var disabledFields = $formulario.find(':disabled').prop('disabled', false);

	var serialized = $formulario.serializeArray();

	if(disabled)
		disabledFields.prop( "disabled", true);
	
	return serialized;
}

function addErrorMsg(error_message) {
	$.notify({
		message: error_message
	},{
		type: "danger",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "right"
		},
		delay: 5000,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		}
	});
}

function addSuccessMsg(success_message) {
	$.notify({
		message: success_message
	},{
		type: "success",
		allow_dismiss: true,
		placement: {
			from: "top",
			align: "right"
		},
		delay: 5000,
		animate: {
			enter: 'animated bounceInDown',
			exit: 'animated bounceOutUp'
		}
	});
}

function loading() {
	var html = '';
	html += '<div class=\"alert-processing-fade  modal-backdrop fade in\"></div>';
	html += '<div class="alert processing-msg">';
	html += '	<div class="text-center">';
	html += '		<span" class="loader" />';
	html += '	</div>';
	html += '</div>';
	
    $('#loading').append(html);
}

function ucfirst(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function loadDefault(){
	loading();
	$('#loading').hide();
	
	loadMasks(document);
	
	$("#alerts").bind("DOMSubtreeModified",function(){
		
		$(".alert-msg").fadeTo(2000, 500).slideUp(500, function(){
			$(".alert-msg-fade").fadeTo(500, 0);
			$(".alert-msg").slideUp(500);
			$("#alerts").html('');
		});
		
		$(this).find('.close').click(function(){
			$(".alert-msg-fade").fadeTo(500, 0);
			$("#alerts").html('');
		});
	});
	
	
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
}

function loadMasks(obj){	
	$(obj).find(".ms").multiSelect({ selectableOptgroup: true });

	$(obj).find(".cpf").mask("999.999.999-99");
	$(obj).find(".cnpj").mask("99.999.999/9999-99");
		
	$(obj).find(".number").mask( "0#" );
	$(obj).find(".interger").mask( "9?999" );

	$(obj).find(".float").maskMoney({prefix:'', thousands:'.', decimal:',', affixesStay: false});
	$(obj).find(".floatZero").maskMoney({prefix:'', thousands:'.', decimal:',', affixesStay: false, allowZero: true});
	
	$(obj).find(".money").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, selectAllOnFocus : true});
	$(obj).find(".moneyZero").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, allowZero: true, selectAllOnFocus : true});
	$(obj).find(".moneyZeroNegative").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, allowZero: true, allowNegative: true, selectAllOnFocus : true});
	
	$(obj).find(".percent").maskMoney({suffix:' %', thousands:'.', decimal:',', affixesStay: false});
	$(obj).find(".percentZero").maskMoney({suffix:' %', thousands:'.', decimal:',', affixesStay: false, allowZero: true});

	$.each($(obj).find(".float, .floatZero, .percent, .percentZero, .money, .moneyZero, .moneyZeroNegative"), function(){
		var value = $(this).val();
		$(this).maskMoney('mask', Number(value));
	});
	
	$(obj).find(".phone").mask("(99)9999-9999");
	$(obj).find(".cellphone").mask("(99)99999-9999");
	
	$(obj).find(".day").mask("9?9");
	$(obj).find(".month").mask("9?9");
	$(obj).find(".year").mask( "9999" );	
	$(obj).find(".dateMonth").mask("99/9999");
	$(obj).find(".datetime").mask("99/99/9999 99:99");
	
	$(obj).find(".date").mask("99/99/9999", {
		completed: function() {
			if (empty(verificaDataValida($(this).val()))) {
				addErrorMsg("Data inválida!");
				$(this).val('');
			}
		}
	});
	
	$(obj).find(".hour").mask("99:99", {
		completed: function() {
			var valor_array = $(this).val().split(":");
			var horas 	= valor_array[0];
			var minutos = valor_array[1];
			if ((horas > 24) || (minutos > 59)) {
				addErrorMsg("Hora inválida!");
				$(this).val('');
			}
		}
	});
	
	
	$.each($(obj).find('.span-date'), function() {
		var value = $(this).html();
		$(this).html($.datepicker.formatDate('dd/mm/yy', new Date(convertStrToDate(value))));
	});
	
	$.each($(obj).find('.date:not(.clone-display)'), function() {
		var id = $(this).attr('id');
		
		if($('#'+ id+ '-display').length == 0){
			var clone = $(this).clone();
			clone.insertAfter(this);
			clone.hide();
			
			$(this).attr('id', id + '-display').attr('name', id + '-display');
			$(this).addClass('clone-display').removeClass('date required');
		}

        $(this).datepicker({ dateFormat: "dd/mm/yy", altField: "#" + id, altFormat: "yy-mm-dd", gotoCurrent: true });

		if ($(this).attr('value')) {
			var date = $.datepicker.parseDate("yy-mm-dd", $(this).attr('value'));
			$('#'+ id+ '-display').attr('value', $.datepicker.formatDate("dd/mm/yy", date));
		}
		
		$('#'+ id+ '-display').mask("99/99/9999");
		
	});

	$.each($(obj).find('.dateMonth:not(.clone-display)'), function() {
		var id = $(this).attr('id');

		if($('#'+ id+ '-display').length == 0){
			var clone = $(this).clone();
			clone.insertAfter(this);
			clone.hide();
			
			$(this).attr('id', id + '-display').attr('name', id + '-display');
			$(this).addClass('clone-display').removeClass('dateMonth required');
		}
		
		$(this).datepicker({
			dateFormat: 'mm/yy',
			changeMonth: true,
			changeYear: true,
			yearRange: "c-100:c+20",
			showButtonPanel: true,
			onClose: function(dateText, inst) {
				var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
				var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
				$(this).val($.datepicker.formatDate('MM/yy', new Date(year, month, 1)));
				$("#" + id).val($.datepicker.formatDate('yy-mm-dd', new Date(year, month, 1)));
			}
		});
		
		$(this).focus(function () {
			$(".ui-datepicker-calendar").hide();
			$("#ui-datepicker-div").position({
				my: "center top",
				at: "center bottom",
				of: $(this)
			});
		});		
		
		if ($(this).attr('value')) {
			var date = $.datepicker.parseDate("yy-mm-dd", $(this).attr('value'));
			$('#'+ id+ '-display').attr('value', $.datepicker.formatDate("MM/yy", date));
		}
	});
}

$(document).ready(function(){
	loadDefault();
});

 




