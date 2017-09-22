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
						"sEmptyTable": s_100054,
						"sInfo": s_100014,
						"sInfoEmpty": s_100015,
						"sInfoFiltered": s_100016,
						"sInfoPostFix": "",
						"sInfoThousands": ".",
						"sLengthMenu": s_100017,
						"sLoadingRecords": s_100018,
						"sProcessing": s_100019,
						"sZeroRecords": s_100054,
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

function btnGrid(){
    $('.btn-delete').click(function(){
		confirmDelete($(this).attr('data-index'));
	});
}

function confirmDelete(id) {
    swal({
        title: s_100041,
        text: s_100042,
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FB483A",
        confirmButtonText: s_100040,
        closeOnConfirm: false
    }, function () {
		deleteRegister(id)
    });
}

function deleteRegister(id){
	$.ajax({
		url : site_url+'/deletar/'+(parseInt(id)+1),
		dataType: 'json', 
		data: request,
		success: function (response) {
			if(response.status){
				swal(s_100047, response.msg, "success");
				renderGrid();
			}
			else
				swal(s_100048, response.msg, "error");
		},
		error: function (response) {
			swal(s_100049, s_100048, "error");
		}
   });    
}

$(document).ready(function(){
	swal.setDefaults({ 
		confirmButtonText: s_100043,
		cancelButtonText: s_100044
	});

	if($("#grid_table").length)
		renderGrid();
});