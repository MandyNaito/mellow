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

function formValue($formulario, disabled){
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

function loadMasks(obj){	
	try{$(obj).find(".ms").multiSelect({ selectableOptgroup: true });} catch(e){};

	$(obj).find(".cpf").mask("999.999.999-99");
	$(obj).find(".cnpj").mask("99.999.999/9999-99");
	$(obj).find(".cep").mask("99999-999");
		
	$(obj).find(".interger").mask( "9?999" );

	$(obj).find(".float").maskMoney({prefix:'', thousands:'.', decimal:',', affixesStay: false});
	$(obj).find(".floatZero").maskMoney({prefix:'', thousands:'.', decimal:',', affixesStay: false, allowZero: true});
	
	$(obj).find(".money").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true}).trigger('mask.maskMoney');
	$(obj).find(".moneyZero").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, allowZero: true}).trigger('mask.maskMoney');
	$(obj).find(".moneyZeroNegative").maskMoney({prefix:'R$ ', thousands:'.', decimal:',', affixesStay: true, allowZero: true, allowNegative: true}).trigger('mask.maskMoney');
	
	
	$(obj).find(".percent").maskMoney({suffix:' %', thousands:'.', decimal:',', affixesStay: false});
	$(obj).find(".percentZero").maskMoney({suffix:' %', thousands:'.', decimal:',', affixesStay: false, allowZero: true});

	//$.each($(obj).find(".float, .floatZero, .percent, .percentZero, .money, .moneyZero, .moneyZeroNegative"), function(){
	//	var value = $(this).val();
	//	$(this).maskMoney('mask', Number(value));
	//});
	
	$(obj).find(".phone").mask("(99) 9999-9999");
	$(obj).find(".cellphone").mask("(99) 99999-9999");
	
	$(obj).find(".day").mask("9?9");
	$(obj).find(".month").mask("9?9");
	$(obj).find(".year").mask( "9999" );	
	$(obj).find(".dateMonth").mask("99/9999");
	$(obj).find(".datetime").mask("99/99/9999 99:99");
		
	$(obj).find(".wDate").mask("99/99/9999", {
		completed: function() {}
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
	
	$.each($(':input[required]:visible'), function(){
		if($(this).parent().hasClass('form-line') || $(this).parent().hasClass('form-control')){
			$(this).parent().addClass('warning');
			$('label[for="'+$(this).attr('id')+'"]').append(' *')
		}
	});
}

$(document).ready(function(){
	loadMasks($(this));
	
	$.ajaxSetup({
		type		: "POST",
		dataType	: "json",
		beforeSend	: function () {
			$('.card').waitMe({effect: 'pulse'});
		},
		complete	: function () {
			setTimeout(function () { $('.card').waitMe('hide'); }, 50);
		},
		error		: function () {
			setTimeout(function () { $('.card').waitMe('hide'); }, 50);
		}	
	});

});

 




