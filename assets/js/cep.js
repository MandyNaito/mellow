function getCepData(cep){
	var data;
	
	$.ajax({
		url : site_url+'/../ajax/consulta_cep/'+cep,
		dataType: 'json',
		async: false,
		success: function (response) {
			if(response.status)
				data = response.data;
		},
		error: function (response) {
			console.log('error');
		}
   });   
   
   return data;
}