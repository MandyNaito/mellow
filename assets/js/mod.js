var controller 	= '';
var site_url	= '';
var request 	= '';

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
				$('.grid_datatable').DataTable({
					responsive: true,
					columnDefs: [
					   { orderable: false, targets: -1 }
					],
					"language": {
						"sEmptyTable": s_100013,
						"sInfo": s_100014,
						"sInfoEmpty": s_100015,
						"sInfoFiltered": s_100016,
						"sInfoPostFix": "",
						"sInfoThousands": ".",
						"sLengthMenu": s_100017,
						"sLoadingRecords": s_100018,
						"sProcessing": s_100019,
						"sZeroRecords": s_100013,
						"sSearch": s_100020,
						"oPaginate": {
							"sNext": s_100021,
							"sPrevious": s_100022,
							"sFirst": s_100023,
							"sLast": s_100024
						},
						"oAria": {
							"sSortAscending": s_100025,
							"sSortDescending": s_100026
						}
					}
				});
				
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