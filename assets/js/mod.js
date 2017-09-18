var site_url = '';
var request = '';
var limit = '';
var page = '';
var order = '';
var dir = '';

function renderGrid()
{
	$.ajax({
		url : site_url+'/grid',
		dataType: 'json', 
		data: request,
		success: function (response) {
			if(response.status)
			{
				$("#grid_table").html(response.data);
				btnGrid();
			}
		},
		error: function (response) {
			console.log('error');
		}
   });   
}

function btnGrid()
{
	
    $('.btn-delete').click(function(){
		var id = $(this).attr('data-index');
		$(".btn-modal-delete").attr("data-index" , id);
	});
	
	$(".btn-modal-delete").click(function(){
		deleteRegister($(this).attr('data-index'));
		$(this).attr('data-index', '');
	});
	
    $('.btn-send').click(function(){
		var id = $(this).attr('data-index');
		$(".btn-modal-send").attr("data-index" , id);
	});
	
	$(".btn-modal-send").click(function(){
		sendRegister($(this).attr('data-index'));
		$(this).attr('data-index', '');
	});

    $('.btn-link').click(function(){
		linkRegister($(this).attr('data-index'));
	});
}

function deleteRegister(id)
{
	$.ajax({
		url : site_url+'/deletar/'+id,
		dataType: 'json', 
		data: request,
		success: function (response) {
			if(response.status)
			{
				addSuccessMsg(response.msg);
				renderGrid();
			}
			else
				addErrorMsg(response.msg);
			$('#delete-modal').modal('toggle');
		},
		error: function (response) {
			console.log('error');
		}
   });    
}

function sendRegister(id)
{
	$.ajax({
		url : site_url+'/enviar/'+id,
		dataType: 'json', 
		data: request,
		success: function (response) {
			if(response.status)
			{
				addSuccessMsg(response.msg);
				renderGrid();
			}
			else
				addErrorMsg(response.msg);
			$('#send-modal').modal('toggle');
		},
		error: function (response) {
			console.log('error');
		}
   });    
}

function linkRegister(id)
{
	$.ajax({
		url : site_url+'/gerar/'+id,
		dataType: 'json', 
		data: request,
		success: function (response) {
			if(response.status)
				$('#link-modal').find('.modal-body').html(response.content);
		},
		error: function (response) {
			console.log('error');
		}
   });    
}

$(document).ready(function(){
	
	if($("#grid_table").length)
		renderGrid();
	
	$("#list-form").submit(function(e){ 
		e.preventDefault();
		$('#buscar').click();
	});
	
    $('#buscar').click(function(){
		request += '&buscarapida='+$('#buscarapida').val();
		renderGrid();
	});
});